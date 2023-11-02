<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Instructor;
use App\Models\InstructorPasswordReset;
use App\Models\InstructorCourse;
use App\Models\InstructorCourseLession;
use App\Models\CourseCategory;
use App\Models\SubCourseCategories;
use App\Models\Discipline;
use App\Models\InstructorBiographyVideo;
use App\Models\InstructorDemonstrationVideos;
use App\Models\InstructorRecommendedVideos;
use App\Models\LastPageVisit;
use App\Models\User;
use App\Models\HomePageBanner;
use App\Models\InstructorDiscipline;
use App\Models\InstructorVideos;
use App\Models\StudentSubscription;
use App\Models\InstructorClasses;
use App\Models\ClassVideos;
use App\Models\AllTabPassword;
use Carbon\Carbon;
use Session, Redirect, Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function showdisciplineimage(Discipline $discipline)
    {
        $disciplineData = [];
        $viewPage = 'free';
        $banner_id = "";

        $banner = HomePageBanner::where('status',1)->first();

        if($banner)
        {
            $banner_id = $banner->banner_id;
        }


        $desktop_disciplines = $discipline->orderBy('desktop_sequence','ASC')->get();

        $mobile_disciplines = $discipline->orderBy('mobile_sequence','ASC')->get();
        
        return view('welcome', compact('disciplineData', 'viewPage','banner_id','desktop_disciplines','mobile_disciplines'));
        
        //return Redirect::to('free?utm_campaign=arnold_fest_2022&utm_medium=hpredirect');

        // $disciplineData = $discipline->select('title', 'description', 'photo')->get();
        // $viewPage = 'welcome';
        // Session::put('isLandingPage', false);
    	// return view('errors.503', compact('disciplineData', 'viewPage'));
    }

    public function displayImages(Discipline $discipline)
    {
        $user = User::where('id',Auth::id())->first();

        $isDisputedUser = "";

        if($user)
        {
            $disputedPayments = StudentSubscription::where('student_id',Auth::id())->where('dispute_flag',1)->where('plan_subscription_id',$user->plan_subscription_id)->first();
            
            if($disputedPayments)
            {
                $isDisputedUser = "Disputed";
            }
        }

        $discipline_id = request()->segment(2);
        
        $currentDiscipline = $discipline->select('id','title', 'description', 'photo','desktop_sequence','main_coming_soon_image', 'video_coming_soon_image')->where('id',$discipline_id)->first();
        
        Session::put('isLandingPage', false);
        $disciplineImagesData = $discipline->select('id','title', 'description', 'photo','desktop_sequence','main_coming_soon_image', 'video_coming_soon_image', 'display_order')->orderBy('display_order','ASC')->get();
        // dd($disciplineImagesData[0]);
        if(count($disciplineImagesData) > 0){
            $discipline_id = $disciplineImagesData[0]['id'];
        }
        $levels = $instructorData = $instructorFreeData = $instructorRecommendedData = $instructorBronzeData = $instructorSilverData = $instructorGoldData = [];
        
        $instructorDisciplines = InstructorVideos::where('discipline_id',((int)$discipline_id))->get(['instructor_id']);
        
        $instructor_ids = $instructorDisciplines->map(function($query){
            return $query;
        })->unique('instructor_id');
        // dd($instructorDisciplines->toArray());
        // $instructor_ids = array_map(function($item){
            //     return $item['instructor_id'];
            // },$instructorDisciplines->toArray());
            
            // dd(array_unique($instructor_ids) , $instructorDisciplines->toArray());
            
            $all_instructor = Instructor::where('is_approved', '=', 1)->whereIn('id',$instructor_ids)->orderBy('display_order','ASC')->get();
            // dd($all_instructor, $instructorDisciplines, $discipline_id);
       
        $courseCategoryData = CourseCategory::select('id', 'name')->orderBy('sequence','ASC')->get();

        // if($instructorDisciplines)
        // {
        //     foreach($instructorDisciplines as $i)
        //     {
        //         $instructorDBData = Instructor::where('is_approved', '=', 1)->where('id',$i->instructor_id)->first();
              
        //         if($instructorDBData)   
        //         {
        //             // Get Instructor Course Category
        //             if($instructorDBData->id) {
                        
        //                 // Check Instructor Have Course Lession
        //                 if(InstructorVideos::where('instructor_id', '=', $instructorDBData->id)->where('discipline_id', $discipline_id)->count()) {
                          
        //                     array_push($instructorData, $instructorDBData);
        //                     // Get Instructor Videos
        //                 }
        //             }
        //         }
        //     }
        // }


        if(count($all_instructor) > 0){
            foreach($all_instructor as $key => $instructor){
                $instructor_query = InstructorVideos::where('instructor_id', '=', $instructor->id)->where('discipline_id', $discipline_id);
                // if($instructor_query->count()) {
                //     array_push($instructorData, $instructor);
                // }
                $instructor_ids_according_discipline = $instructor_query->get()->map(function($query){
                    return $query;
                })->unique('instructor_id');
                if(isset($instructor_ids_according_discipline) and count($instructor_ids_according_discipline)){
                    // instructorData
                    array_push($instructorData, $instructor);
                }
                // dd($instructorData);
                // dd($instructor_query->get()->toArray());
            }
        }

        // dd($instructorData);

        if(count($courseCategoryData))
        {
            foreach ($courseCategoryData as $ccData) {
                $instructorRecommendedData = [];
                $videoData = array();

                if(count($instructorData))
                {
                    foreach($instructorData as $i)
                    {
                        
                        if($ccData->id != 5)
                        {
                            $video = InstructorVideos::where('instructor_id', '=', $i->id)->where('main_course_category_id', '=', $ccData->id)->where('discipline_id',$discipline_id)->first();

                            if($video)
                            {
                                $instructorDetails = Instructor::where('id',$video->instructor_id)->first();
    
                                $videoData[] = array(
                                    'video_id'=>$video['video_id'],
                                    'video_thumbnail'=>$video['video_thumbnail'],
                                    'title'=>$video['title'],
                                    'video_level'=>$video['main_course_category_id'],
                                    'instructor_name'=>$instructorDetails->name,
                                    'video_duration'=>number_format($video['video_duration'],2),
                                );
    
                              
                                // else{
                                //     $instructorRecommendedData[] = array(
                                //         'video_id'=>'',
                                //         'video_thumbnail'=>'',
                                //         'title'=>'',
                                //         'video_level'=>'',
                                //         'instructor_name'=>''
                                //     );
                                // }
                            }
                            else
                            {
                                $videoData[] = array(
                                    'video_id'=>'',
                                    'video_thumbnail'=>'',
                                    'title'=>'',
                                    'video_level'=>'',
                                    'video_duration'=>''
                                );
                            }
                        }
                        else
                        {
                            $videos = InstructorVideos::where('instructor_id', '=', $i->id)->where('recommended_flag', '=', 1)->where('discipline_id',$discipline_id)->first();

                            if($videos)
                            {
                                $instructorDetails1 = Instructor::where('id',$videos->instructor_id)->first();
    
                                $videoData[] = array(
                                    'video_id'=>$videos['video_id'],
                                    'video_thumbnail'=>$videos['video_thumbnail'],
                                    'title'=>$videos['title'],
                                    'video_level'=>$videos['main_course_category_id'],
                                    'instructor_name'=>$instructorDetails1->name,
                                    'video_duration'=>number_format($videos['video_duration'],2),
                                );
                            }
                            else
                            {
                                $videoData[] = array(
                                    'video_id'=>'',
                                    'video_thumbnail'=>'',
                                    'title'=>'',
                                    'video_level'=>'',
                                    'video_duration'=>''
                                );
                            }
                        }

                      
                        
                        // $recommended_video = InstructorVideos::where('instructor_id', '=', $i->id)->where('recommended_flag', '=', 1)->where('discipline_id',$discipline_id)->first();

                        // if($recommended_video)
                        // {
                        //     $instructorDetails1 = Instructor::where('id',$recommended_video ->instructor_id)->first();
                        //         $instructorRecommendedData[] = array(
                        //             'video_id'=>$recommended_video['video_id'],
                        //             'video_thumbnail'=>$recommended_video['video_thumbnail'],
                        //             'title'=>$recommended_video['title'],
                        //             'video_level'=>$recommended_video['main_course_category_id'],
                        //             'instructor_name'=>isset($instructorDetails1->name) ? $instructorDetails1->name : '' ,
                        //             'video_duration'=>$recommended_video['video_duration'],
                        //         );
                        
                        // }
                        // else
                        // {
                        //     $instructorRecommendedData[] = array(
                        //         'video_id'=>'',
                        //         'video_thumbnail'=>'',
                        //         'title'=>'',
                        //         'video_level'=>'',
                        //         'instructor_name'=>'',
                        //         'video_duration'=>''
                        //     );
                        
                        // }
                    }
                }

                $levels[] = array(
                    'level_id'=>$ccData->id,
                    'level_name'=>$ccData->name,
                    'videoData'=>$videoData
                ); 
              
            }    
        }
        // echo "<pre>";
        // print_r($instructorRecommendedData );die;
       
        // echo "<pre>";
        // print_r( $instructorData );die;

        // dd($instructorData);
    	return view('disciplines', compact('isDisputedUser','disciplineImagesData', 'instructorData', 'levels','instructorRecommendedData', 'instructorFreeData', 'instructorBronzeData', 'instructorSilverData', 'instructorGoldData','currentDiscipline'));
    }

    // public function displayImages(Discipline $discipline)
    // {
    //     $discipline_id = request()->segment(2);
        
    //     Session::put('isLandingPage', false);
    //     $disciplineImagesData = $discipline->select('title', 'description', 'photo','desktop_sequence')->orderBy('desktop_sequence','ASC')->get();
       
    //     $instructorData = $instructorFreeData = $instructorBronzeData = $instructorSilverData = $instructorGoldData = [];
    //     $instructorDisciplines = InstructorDiscipline::where('discipline_id',$discipline_id)->get();
       
        
    //     if($instructorDisciplines)
    //     {
    //         $courseCategoryData = CourseCategory::select('id', 'name')->get();

    //         foreach($instructorDisciplines as $i)
    //         {
    //             $instructorDBData = Instructor::where('is_approved', '=', 1)->where('id',$i->instructor_id)->first();
              
    //             if($instructorDBData)   
    //             {
    //                 // Get Instructor Course Category
    //                 if($instructorDBData->id) {
                        
    //                     // Check Instructor Have Course Lession
    //                     if(InstructorCourseLession::where('instructor_id', '=', $instructorDBData->id)->count()) {
                          
    //                         array_push($instructorData, $instructorDBData);
    //                         // Get Instructor Videos
    //                         foreach ($courseCategoryData as $ccData) {
    //                             if($ccData->id) {
    //                                 // Get Instructor Free Video
    //                                 if($ccData->name == 'Free') {
    //                                     $freeVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $instructorDBData->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
    //                                     if($freeVideoData) {
    //                                         array_push($instructorFreeData, $freeVideoData);
    //                                     }
    //                                 }
    //                                 // Get Instructor Bronze Video
    //                                 if($ccData->name == 'Bronze') {
    //                                     $bronzeVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $instructorDBData->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
    //                                     if($bronzeVideoData) {
    //                                         array_push($instructorBronzeData, $bronzeVideoData);
    //                                     }
    //                                 }
    //                                 // Get Instructor Silver Video
    //                                 if($ccData->name == 'Silver') {
    //                                     $silverVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $instructorDBData->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
    //                                     if($silverVideoData) {
    //                                         array_push($instructorSilverData, $silverVideoData);
    //                                     }
    //                                 }
    //                                 // Get Instructor Gold Video
    //                                 if($ccData->name == 'Gold') {
    //                                     $goldVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $instructorDBData->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
    //                                     if($goldVideoData) {
    //                                         array_push($instructorGoldData, $goldVideoData);
    //                                     }
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }

    //     // echo "<pre>";
    //     // print_r( $instructorDBData );die;
       
    //     // echo "<pre>";
    //     // print_r( $instructorData );die;
    // 	return view('disciplines', compact('disciplineImagesData', 'instructorData', 'instructorFreeData', 'instructorBronzeData', 'instructorSilverData', 'instructorGoldData'));
    // }

 
    /**
    * View Instructor Videos Page
    * Route Name : instructor-video
    * Route : instructor-video
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorVideos(Request $request)
    {
        $user = User::where('id',Auth::id())->first();

        if(!$user->who_will_be_training || !$user->disciplines_in_martial_arts || !$user->stretching_flexibility_spiritual_meditative_arts || !$user->health_and_wellness_guidance || !$user->all_fitness_including)
        {
            return Redirect::route('student.register.step.two');
        }

        if(!$user->age_group || !$user->gender || !$user->fitness || !$user->preferred_language)
        {
            return Redirect::route('student.register.step.three');
        }

        if(!$user->instructor_gender || !$user->preferred_training_style)
        {
            return Redirect::to('step-four');
        }

        $result = LastPageVisit::where('student_id',Auth::id())->first();
 
        if($result)
        {
            $user = LastPageVisit::where('student_id',Auth::id())->first();
            $user->last_page_visit = 'instructor-video';
            $user->save();
        }
        else
        {
            
            $last_page = LastPageVisit::create(['student_id'=>Auth::id(),'last_page_visit'=>'instructor-video']);
            $last_page->save();
        }
        
        if(isset($request->search))
        {
            $text_search = $request->search;
            $path = base_path().'/public';
            $pathToJson = $path . "/storage/instructorfreevidoes.json";
            $freeVideoJsonData = file_get_contents($pathToJson);
            $instructorFreeVideosData1 = json_decode($freeVideoJsonData, true);

            $instructorsData = [];

            $results = array();

            $instructorFreeVideosData = [];

            foreach ($instructorFreeVideosData1 as $value)
            {
                // print_r($value);die;
                foreach($value as $v)
                {
                    $v = strtolower($v);
                    if (strpos($v, strtolower($text_search)) !== false)
                    {
                        if(!in_array($value['employee_name'], $instructorsData)) {
                            array_push($instructorsData, $value['employee_name']);
                        }

                        $instructorFreeVideosData[] = array(
                                                'employee_name'=>$value['employee_name'],
                                                'video_id'=>$value['video_id'],
                                                'thumbnail_url'=>$value['thumbnail_url'],
                                                'title'=>$value['title'],
                                                'duration'=>$value['duration']
                                            );
                    }
                }
                
            }
        }
        else
        {
            $text_search = "";

            //get free videos json file
            $path = base_path().'/public';
            $pathToJson = $path . "/storage/instructorfreevidoes.json";
            $freeVideoJsonData = file_get_contents($pathToJson);
            $instructorFreeVideosData = json_decode($freeVideoJsonData, true);
            $instructorsData = [];
            foreach ($instructorFreeVideosData as $insData) {
                if(!in_array($insData['employee_name'], $instructorsData)) {
                    array_push($instructorsData, $insData['employee_name']);
                }
            }
        }
        // dd($instructorFreeVideosData);
        //get paid videos json file
        // $paidvideos = $path . "/storage/instructorpaidvidoes.json";
        // $paidVideoJsonData = file_get_contents($paidvideos);
        // $instructorPaidVideosJsonData = json_decode($paidVideoJsonData, true);

        // $instructorsData = Config::get('instructor_videos.Instructors');
        // $searchType = $request->type;

        // $instructorFreeVideosData = $instructorPaidVideosData = [];
        //check for free videos
        // if($searchType) {
        //     foreach($instructorFreeVideosJsonData as $insFreeVideos){
        //         if($insFreeVideos['employee_name'] == $searchType){
        //             array_push($instructorFreeVideosData, $insFreeVideos);
        //         }
        //         if($searchType == 'All Instructor'){
        //             array_push($instructorFreeVideosData, $insFreeVideos);
        //         }
        //     }
        // }
        // //check for paid videos
        // if($searchType) {
        //     foreach($instructorPaidVideosJsonData as $insPaidVideos){
        //         if($insPaidVideos['employee_name'] == $searchType){
        //             array_push($instructorPaidVideosData, $insPaidVideos);
        //         }
        //         if($searchType == 'All Instructor'){
        //             array_push($instructorPaidVideosData, $insPaidVideos);
        //         }
        //     }
        // }
        // return view('instructor-video', compact('instructorsData', 'instructorFreeVideosData', 'instructorPaidVideosData', 'searchType'));
        return view('instructor-video', compact('instructorsData', 'instructorFreeVideosData','text_search'));
    }

    /**
    * View wistia Player Of Instructor Video
    * Route Name : instructor-wistia-video
    * Route : instructor-wistia-video/{wistia_id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function playInstructorFreeVideo($instructorVideoId, $instructorName){
        
        $result = LastPageVisit::where('student_id',Auth::id())->first();
 
        if($result)
        {
            $user = LastPageVisit::where('student_id',Auth::id())->first();
            $user->last_page_visit = 'instructor-wistia-free-video/'.$instructorVideoId.'/'.$instructorName;
            $user->save();
        }
        else
        {
            
            $last_page = LastPageVisit::create(['student_id'=>Auth::id(),'last_page_visit'=>'instructor-wistia-free-video/'.$instructorVideoId.'/'.$instructorName]);
            $last_page->save();
        }

        //get free videos json file
        $path = base_path().'/public';
        $pathToJson = $path . "/storage/instructorfreevidoes.json";
        $freeVideoJsonData = file_get_contents($pathToJson);
        $instructorFreeVideosData = json_decode($freeVideoJsonData, true);
        $instuctorVideosData = [];
        foreach ($instructorFreeVideosData as $insFreeVideos){
            if($insFreeVideos['employee_name'] == $instructorName) {
                $data = [
                    'video_id' => $insFreeVideos['video_id'],
                    'thumbnail_url' => $insFreeVideos['thumbnail_url'],
                    'title' => $insFreeVideos['title'],
                    'duration' => $insFreeVideos['duration'],
                ];
                array_push($instuctorVideosData, $data);
            }
        }

        return view('instructor_wistia_video', compact('instructorVideoId', 'instructorName', 'instuctorVideosData'));
    }

    /**
    * View wistia Player Of Instructor Video
    * Route Name : instructor-wistia-video
    * Route : instructor-wistia-video/{wistia_id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function playInstructorPaidVideo($instructorVideoId){
        return view('instructor_wistia_video', compact('instructorVideoId'));
    }

    /**
    * View School And Instructor Page
    * Route Name : schools-and-instructors
    * Route : schools-and-instructors
    * Method : GET
    * @return \Illuminate\View\View
    */

    // public function getSchoolAndInstructor(Request $request) {
    //     Session::put('isLandingPage', false);
    //     //$instructorDropdownData = Instructor::select('id', 'name')->where('is_approved', '=', 1)->get();
    //     $discplineDropdownData = Discipline::select('id', 'title')->get();
    //     $instructorData = array();
    //     $selIns = 'All';
    //     if(isset($request->selIns) && $request->selIns != 'All') {
    //         $selIns = $request->selIns;
    //         //InstructorDiscipline
    //         //$instructorData = Instructor::where('id', '=', $request->selIns)->paginate(9);
    //         $instructors = InstructorDiscipline::where('discipline_id', '=', $request->selIns)->get();
            
    //         if(!empty($instructors))
    //         {
    //             foreach($instructors as $i)
    //             { 
    //                 if($i['instructor_id'])
    //                 {
    //                     $instructorData[] = Instructor::where('id','=',$i->instructor_id)->where('is_approved', '=', 1)->first();
    //                 }
                    
    //                 // $instructorData[] = array(
    //                 //     'id'=>$instructorList['id'],
    //                 //     'name'=>$instructorList['name'],
    //                 //     'photo'=>$instructorList['photo']
    //                 // );
    //             }
    //         }
    //     } else {
    //         $instructorData = Instructor::where('is_approved', '=', 1)->paginate(9);
    //     }
    //     return view("schools-and-instructors", compact('discplineDropdownData', 'instructorData', 'selIns'));
    // }

    /**
    * Author : Ganesh 
    * Enhancement of UI of View School And Instructor Page
    * Route Name : schools-and-instructors
    * Route : schools-and-instructors
    * Method : GET
    * Updated at :- 27-10-2022 
    * @return \Illuminate\View\View
    */

    // public function getSchoolAndInstructor(Request $request) {
    //     Session::put('isLandingPage', false);
    //     //$instructorDropdownData = Instructor::select('id', 'name')->where('is_approved', '=', 1)->get();
    //     $discplineDropdownData = Discipline::select('id', 'title', 'main_coming_soon_image')->orderBy('mobile_sequence','ASC')->get();
        
    //     $disciplineWiseInstructors = array();

    //     $selIns = 'All';
    //     if(isset($request->selIns) && $request->selIns != 'All') {
    //         $selIns = $request->selIns;
            
    //         $instructorData = array();
    //         //InstructorDiscipline
    //         //$instructorData = Instructor::where('id', '=', $request->selIns)->paginate(9);
    //         $instructors = InstructorDiscipline::where('discipline_id', '=', $request->selIns)->get();
            
    //         if(!empty($instructors))
    //         {
    //             foreach($instructors as $i)
    //             { 
    //                 if($i['instructor_id'])
    //                 {
    //                     $instructorDetails = Instructor::where('is_approved', '=', 1)->where('id',$i->instructor_id)->first();

    //                     if($instructorDetails)
    //                     {
    //                         $instructorData[] = array(
    //                             'id'=>$instructorDetails->id,
    //                             'name'=>$instructorDetails->name,
    //                             'school_name'=>$instructorDetails->school_name,
    //                             'profile'=>$instructorDetails->photo
    
    //                         );
    //                     }
    //                 }
                   
                    
    //                 // $instructorData[] = array(
    //                 //     'id'=>$instructorList['id'],
    //                 //     'name'=>$instructorList['name'],
    //                 //     'photo'=>$instructorList['photo']
    //                 // );
    //             }
    //         }
    //         else
    //         {
    //             $instructorData[] = array();
    //         }

    //         $discipline = Discipline::select('id', 'title', 'main_coming_soon_image')->where('id', $selIns)->first();

    //         $disciplineWiseInstructors[] = array(
    //             'discipline_name' => $discipline->title,
    //             'video_coming_soon_image' => $discipline->main_coming_soon_image,
    //             'instructorData' => $instructorData
    //         );

    //     } 
    //     else 
    //     {
    //         if(count($discplineDropdownData) > 0)
    //         {
    //             foreach($discplineDropdownData as $discipline)
    //             {
    //                 dd($discipline);
    //                 $instructorData = array(); 

    //                 $instructors = InstructorDiscipline::where('discipline_id',$discipline->id)->get();

    //                 if($instructors)
    //                 {
    //                     foreach($instructors as $instructor)
    //                     {
    //                         $instructorDetails = Instructor::where('is_approved', '=', 1)->where('id',$instructor->instructor_id)->first();

    //                         if($instructorDetails)
    //                         {
    //                             $instructorData[] = array(
    //                                 'id'=>$instructorDetails->id,
    //                                 'name'=>$instructorDetails->name,
    //                                 'school_name'=>$instructorDetails->school_name,
    //                                 'profile'=>$instructorDetails->photo
    
    //                             );
    //                         }
    //                     }
                       
    //                 }
    //                 else
    //                 {
    //                     $instructorData[] = array();
    //                 }

    //                 $disciplineWiseInstructors[] = array(
    //                   'discipline_name' => $discipline->title,
    //                   'video_coming_soon_image' => $discipline->main_coming_soon_image,
    //                   'instructorData' => $instructorData
    //                 );
    //             }
    //         }
    //         // $instructorData = Instructor::where('is_approved', '=', 1)->paginate(9);
    //     }

    //     $myCollectionObj = collect($disciplineWiseInstructors);
  
    //     $disciplineWiseInstructors = $this->paginate($myCollectionObj);
        
    //     // echo "<pre>";
    //     // print_r($disciplineWiseInstructors);die;
    //     return view("schools-and-instructors", compact('disciplineWiseInstructors','discplineDropdownData', 'instructorData', 'selIns'));
    // }


    public function getSchoolAndInstructor(Request $request)
    {
        Session::put('isLandingPage', false);
        $discplineDropdownData = Discipline::select('id', 'title', 'main_coming_soon_image')->orderBy('mobile_sequence','ASC')->get();

        $disciplineWiseInstructors = array();

        $selIns = 'All';
        if(isset($request->selIns) && $request->selIns != 'All') {
            $selIns = $request->selIns;
            $instructorData = array();
            $instructors = InstructorDiscipline::where('discipline_id', '=', $request->selIns)->get();
            if(!empty($instructors))
            {
                foreach($instructors as $i)
                { 
                    if($i['instructor_id'])
                    {
                        $instructorDetails = Instructor::where('is_approved', '=', 1)->where('id',$i->instructor_id)->first();

                        if($instructorDetails)
                        {
                            $instructorData[] = array(
                                'id'=>$instructorDetails->id,
                                'name'=>$instructorDetails->name,
                                'school_name'=>$instructorDetails->school_name,
                                'profile'=>$instructorDetails->photo

                            );
                        }
                    }
                }
            }
            else
            {
                $instructorData[] = array();
            }
            $discipline = Discipline::select('id', 'title', 'main_coming_soon_image')->where('id', $selIns)->first();
            $disciplineWiseInstructors[] = array(
                'discipline_name' => $discipline->title,
                'video_coming_soon_image' => $discipline->main_coming_soon_image,
                'instructorData' => $instructorData
            );
        } 
        else 
        {
            if(count($discplineDropdownData) > 0)
            {
                foreach($discplineDropdownData as $discipline)
                {
                    $instructorData = array(); 
                    
                    $instructors = InstructorDiscipline::with(['displayorder'])->where('discipline_id',$discipline->id)->get();
                    $instructors = $instructors->sortBy(function($query){
                        if(isset($query->displayorder)){
                            return $query->displayorder->display_order;
                        }
                    });
                    // dd($instructors->toArray());

                    if($instructors)
                    {
                        foreach($instructors as $instructor)
                        {
                            $instructorDetails = Instructor::where('is_approved', '=', 1)->where('id',$instructor->instructor_id)->first();

                            if($instructorDetails)
                            {
                                $instructorData[] = array(
                                    'id'=>$instructorDetails->id,
                                    'name'=>$instructorDetails->name,
                                    'school_name'=>$instructorDetails->school_name,
                                    'profile'=>$instructorDetails->photo

                                );
                            }
                        }

                    }
                    else
                    {
                        $instructorData[] = array();
                    }

                    $disciplineWiseInstructors[] = array(
                        'discipline_name' => $discipline->title,
                        'video_coming_soon_image' => $discipline->main_coming_soon_image,
                        'instructorData' => $instructorData
                    );
                }
            }
        }

        $myCollectionObj = collect($disciplineWiseInstructors);

        $disciplineWiseInstructors = $this->paginate($myCollectionObj);
        
        // dd($disciplineWiseInstructors,$myCollectionObj);

        return view("schools-and-instructors", compact('disciplineWiseInstructors','discplineDropdownData', 'instructorData', 'selIns'));
    }

    public function paginate($items, $perPage = 3, $page = null, $options = [])
    {
        $page =  $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return (new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options))->withPath('schools-and-instructors');
    }

    public function ourSchoolPaginate($items, $perPage = 6, $page = null, $options = [])
    {
        $page =  $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return (new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options))->withPath('our-classes');
    }

    public function displayImages1(Discipline $discipline)
    {
        $discipline_id = request()->segment(2);
        
        Session::put('isLandingPage', false);
        $disciplineImagesData = $discipline->select('title', 'description', 'photo','desktop_sequence')->orderBy('desktop_sequence','ASC')->get();
       
        $levels = $instructorData = $instructorFreeData = $instructorRecommendedData = $instructorBronzeData = $instructorSilverData = $instructorGoldData = [];
        $instructorDisciplines = InstructorDiscipline::where('discipline_id',$discipline_id)->get();
       
        

        if($instructorDisciplines)
        {
            foreach($instructorDisciplines as $i)
            {
                $instructorDBData = Instructor::where('is_approved', '=', 1)->where('id',$i->instructor_id)->first();
              
                if($instructorDBData)   
                {
                    // Get Instructor Course Category
                    if($instructorDBData->id) {
                        
                        // Check Instructor Have Course Lession
                        if(InstructorVideos::where('instructor_id', '=', $instructorDBData->id)->count()) {
                          
                            array_push($instructorData, $instructorDBData);
                            // Get Instructor Videos
                        }
                    }
                }
            }
        }

        if(count($courseCategoryData))
        {
            foreach ($courseCategoryData as $ccData) {
                
                $videoData = array();

                if(count($instructorData))
                {
                    foreach($instructorData as $i)
                    {
                        $video = InstructorVideos::where('instructor_id', '=', $i->id)->where('main_course_category_id', '=', $ccData->id)->first();

                        if($video)
                        {
                            $videoData[] = array(
                                'video_id'=>$video['video_id'],
                                'video_thumbnail'=>$video['video_thumbnail'],
                                'title'=>$video['title'],
                                'video_level'=>$video['main_course_category_id']
                            );

                            if($video['recommended_flag'] == 1)
                            {
                                $instructorRecommendedData[] = array(
                                    'video_id'=>$video['video_id'],
                                    'video_thumbnail'=>$video['video_thumbnail'],
                                    'title'=>$video['title'],
                                    'video_level'=>$video['main_course_category_id']
                                );
                            }else{
                                $instructorRecommendedData[] = array(
                                    'video_id'=>'',
                                    'video_thumbnail'=>'',
                                    'title'=>'',
                                    'video_level'=>''
                                );
                            }
                        }
                        else
                        {
                            $videoData[] = array(
                                'video_id'=>'',
                                'video_thumbnail'=>'',
                                'title'=>'',
                                'video_level'=>''
                            );
                        }


                    }
                }

                $levels[] = array(
                    'level_id'=>$ccData->id,
                    'level_name'=>$ccData->name,
                    'videoData'=>$videoData
                ); 
              
            }    
        }
        // echo "<pre>";
        // print_r( $instructorRecommendedData );die;
       
        // echo "<pre>";
        // print_r( $instructorData );die;
    	return view('disciplines', compact('disciplineImagesData', 'instructorData', 'levels','instructorRecommendedData', 'instructorFreeData', 'instructorBronzeData', 'instructorSilverData', 'instructorGoldData'));
    }

    /**
    * View School And Instructor Detail Page
    * Route Name : schools-and-instructors-detail
    * Route : schools-and-instructors-detail/{instructorId}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getSchoolAndInstructorDetail($instructorId) {
        $user = User::where('id',Auth::id())->first();

        $instructorDiscipline = InstructorDiscipline::where('instructor_id',$instructorId)->first();

        // dd($instructorDiscipline);

        $instructorDisciplineDetails = "";

        if($instructorDiscipline)
        {
            $instructorDisciplineDetails = Discipline::where('id',$instructorDiscipline->discipline_id)->first();
        }

        $isDisputedUser = "";

        if($user)
        {
            $disputedPayments = StudentSubscription::where('student_id',Auth::id())->where('dispute_flag',1)->where('plan_subscription_id',$user->plan_subscription_id)->first();
            
            if($disputedPayments)
            {
                $isDisputedUser = "Disputed";
            }
        }

        $instructorDetailData = Instructor::where('id', '=', $instructorId)->first();
        $instructorBiographyData = $instructorFreeVideoData = $instructorRecommendedVideoData = $instructorBronzeTeachingVideosData = $instructorBronzeVideoData = $instructorSilverVideoData = $instructorGoldVideoData = [];
        $instructorDemonstrationData = array();
        // Get Biography Video Section
        $instructorBiographyData = InstructorBiographyVideo::where('instructor_id', '=', $instructorId)->where('status',1)->get();
        // dd($instructorDetailData, $instructorBiographyData, $instructorId);
        if(count($instructorBiographyData))
        {
            $instructorDemonstrationData[] = array(
                'id'=>$instructorBiographyData[0]['id'],
                'photo'=>$instructorBiographyData[0]['video_thumbnail'],
                'name'=>$instructorBiographyData[0]['title'],
                'video_id'=>$instructorBiographyData[0]['video_id'],
                'video_duration'=>$instructorBiographyData[0]['video_duration'],
                'is_dacast_video'=>$instructorBiographyData[0]['is_dacast_video'],
                'dacast_video_asset_id'=>$instructorBiographyData[0]['dacast_video_asset_id']
            );
        }
        
        $instructorDemonstrationVideos = InstructorDemonstrationVideos::where('instructor_id', '=', $instructorId)->where('status',1)->get();
        
        if(!empty($instructorDemonstrationVideos))
        {
            foreach($instructorDemonstrationVideos as $dv)
            {
                $instructorDemonstrationData[] = array(
                    'id'=>$dv['id'],
                    'photo'=>$dv['video_thumbnail'],
                    'name'=>$dv['title'],
                    'video_id'=>$dv['video_id'],
                    'video_duration'=>$dv['video_duration'],
                    // 'is_dacast_video'=>$dv[0]['is_dacast_video'],
                    // 'dacast_video_asset_id'=>$dv[0]['dacast_video_asset_id']
                );

            }
        }
        
        $courseCategoryData = CourseCategory::select('id', 'name','description')->orderBy('sequence','ASC')->get();
        // dd($courseCategoryData);

        if(count($courseCategoryData))
        {
            foreach ($courseCategoryData as $ccData) {
                
                $videoData = array();
                $classData = array();

                // dd($ccData);
                if($instructorId)
                {
                    if($ccData->id != 5)
                    {
                        $videos = InstructorVideos::where('instructor_id', '=', $instructorId)->where('main_course_category_id', '=', $ccData->id)->get();
                        // dd($videos);
                        if(count($videos))
                        {
                            foreach($videos as $v)
                            {
                                if($v['is_dacast_video'] == 1){
                                    $video_ducration = $v['video_duration'];
                                }
                                else{
                                    $video_ducration = Carbon::parse((float)$v['video_duration'])->format('H:i:s');
                                }
                                $videoData[] = array(
                                    'video_id'=>$v['video_id'],
                                    'video_thumbnail'=>$v['video_thumbnail'],
                                    'title'=>$v['title'],
                                    'video_level'=>$v['main_course_category_id'],
                                    // 'video_duration'=>$v['video_duration']
                                    'video_duration'=>$video_ducration
                                );
                            }
                        }
                    }
                    else
                    {
                        $instructorRecommendedVideoData = InstructorVideos::where('instructor_id', '=', $instructorId)->where('status', '=', 1)->where('recommended_flag','=',1)->get();

                        if(count($instructorRecommendedVideoData))
                        {
                            foreach($instructorRecommendedVideoData as $v1)
                            {
                                if($v1['is_dacast_video'] == 1){
                                    $video_ducration = $v1['video_duration'];
                                }
                                else{
                                    $video_ducration = Carbon::parse((float)$v1['video_duration'])->format('H:i:s');
                                }
                                $videoData[] = array(
                                    'video_id'=>$v1['video_id'],
                                    'video_thumbnail'=>$v1['video_thumbnail'],
                                    'title'=>$v1['title'],
                                    'video_level'=>$v1['main_course_category_id'],
                                    'video_duration'=>$video_ducration
                                );
                            }
                        }
                    }

                    $getBronzeClasses = InstructorClasses::where('main_category_id', $ccData->id)->where('instructor_id',$instructorId)->where('publish', 1)->get();
                    // dd($getBronzeClasses);
                    if(!empty($getBronzeClasses))
                    {
                        foreach($getBronzeClasses as $bc)
                        {
                            $getClassFirstVideo = ClassVideos::where('class_id',$bc->id)->orderBy('id', 'ASC')->first();
                            
                            $videoThumbnail = "";

                            if($getClassFirstVideo)
                            {
                                $getVideoThumbnail = InstructorVideos::select('video_thumbnail')->where('id',$getClassFirstVideo->video_id)->first();
                                
                                if($getVideoThumbnail)
                                {
                                    $videoThumbnail = $getVideoThumbnail->video_thumbnail;
                                }
                            }

                            $classData[] = array(
                                'class_id' => $bc->id,
                                'class_name' => $bc->class_name,
                                'video_thumbnail' => $videoThumbnail
                            );
                        }
                    }
                }

                $levels[] = array(
                    'level_id'=>$ccData->id,
                    'description'=>$ccData->description,
                    'level_name'=>$ccData->name,
                    'videoData'=>$videoData,
                    'classData'=>$classData
                ); 
              
            }    
        }

        $instructorBronzeTeachingVideosData = InstructorVideos::where('main_course_category_id',2)->where('instructor_id',$instructorId)->get();


        // $instructorRecommendedVideoData = InstructorVideos::where('instructor_id', '=', $instructorId)->where('status', '=', 1)->where('recommended_flag','=',1)->get();
        
        // dd($isDisputedUser,$instructorDetailData, $instructorDemonstrationData, $instructorBiographyData, $levels,$instructorFreeVideoData, $instructorRecommendedVideoData, $instructorBronzeVideoData, $instructorSilverVideoData, $instructorGoldVideoData,$instructorBronzeTeachingVideosData, $instructorDisciplineDetails);

        return view("instructor-detail", compact('isDisputedUser','instructorDetailData', 'instructorDemonstrationData', 'instructorBiographyData', 'levels','instructorFreeVideoData', 'instructorRecommendedVideoData', 'instructorBronzeVideoData', 'instructorSilverVideoData', 'instructorGoldVideoData','instructorBronzeTeachingVideosData', 'instructorDisciplineDetails'));
    }


    // public function getSchoolAndInstructorDetail($instructorId) {
    //     $instructorDetailData = Instructor::where('id', '=', $instructorId)->first();
    //     $instructorBiographyData  = $instructorFreeVideoData = $instructorRecommendedVideoData = $instructorBronzeTeachingVideosData = $instructorBronzeVideoData = $instructorSilverVideoData = $instructorGoldVideoData = [];
    //     $instructorDemonstrationData = array();
    //     // Get Biography Video Section
    //     $instructorBiographyData = InstructorBiographyVideo::where('instructor_id', '=', $instructorId)->where('status',1)->get();
       
    //     if(count($instructorBiographyData))
    //     {
    //         $instructorDemonstrationData[] = array(
    //             'id'=>$instructorBiographyData[0]['id'],
    //             'photo'=>$instructorBiographyData[0]['video_thumbnail'],
    //             'name'=>$instructorBiographyData[0]['video_name'],
    //             'video_id'=>$instructorBiographyData[0]['video_id'],
    //         );
    //     }
        
    //     $instructorDemonstrationVideos = InstructorDemonstrationVideos::where('instructor_id', '=', $instructorId)->where('status',1)->get();
        
    //     if(!empty($instructorDemonstrationVideos))
    //     {
    //         foreach($instructorDemonstrationVideos as $dv)
    //         {
    //             $instructorDemonstrationData[] = array(
    //                 'id'=>$dv['id'],
    //                 'photo'=>$dv['video_thumbnail'],
    //                 'name'=>$dv['video_name'],
    //                 'video_id'=>$dv['video_id'],
    //             );

    //         }
    //     }
        
    //     $freeCategoryId = CourseCategory::select('id')->where('name', '=', 'Free')->first();
    //     if(isset($freeCategoryId['id']) && $freeCategoryId['id']) {
    //         $instructorFreeCourseData = InstructorCourse::select('id')->where('instructor_id', '=', $instructorId)->where('course_category_id', '=', $freeCategoryId['id'])->get();
    //         if($instructorFreeCourseData) {
    //             foreach ($instructorFreeCourseData as $insFreeCourseData) {
    //                 if($insFreeCourseData->id) {
    //                     $freeLessionData = InstructorCourseLession::where('instructor_id', '=', $instructorId)->where('instructor_course_id', '=', $insFreeCourseData->id)->get();
    //                     if($freeLessionData) {
    //                         foreach ($freeLessionData as $freelData) {
    //                             array_push($instructorFreeVideoData, $freelData);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     // Get Bronze Video Section
    //     $bronzeCategoryId = CourseCategory::select('id')->where('name', '=', 'Bronze')->first();
    //     if(isset($bronzeCategoryId['id']) && $bronzeCategoryId['id']) {
    //         $instructorBronzeCourseData = InstructorCourse::select('id')->where('instructor_id', '=', $instructorId)->where('course_category_id', '=', $bronzeCategoryId['id'])->get();
    //         if($instructorBronzeCourseData) {
    //             foreach ($instructorBronzeCourseData as $insBronzeCourseData) {
    //                 if($insBronzeCourseData->id) {
    //                     $bronzeLessionData = InstructorCourseLession::where('instructor_id', '=', $instructorId)->where('instructor_course_id', '=', $insBronzeCourseData->id)->get();
    //                     if($bronzeLessionData) {
    //                         foreach ($bronzeLessionData as $bronzelData) {
    //                             array_push($instructorBronzeVideoData, $bronzelData);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     // Get Silver Video Section
    //     $silverCategoryId = CourseCategory::select('id')->where('name', '=', 'Silver')->first();
    //     if(isset($silverCategoryId['id']) && $silverCategoryId['id']) {
    //         $instructorSilverCourseData = InstructorCourse::select('id')->where('instructor_id', '=', $instructorId)->where('course_category_id', '=', $silverCategoryId['id'])->get();
    //         if($instructorSilverCourseData) {
    //             foreach ($instructorSilverCourseData as $insSilverCourseData) {
    //                 if($insSilverCourseData->id) {
    //                     $silverLessionData = InstructorCourseLession::where('instructor_id', '=', $instructorId)->where('instructor_course_id', '=', $insSilverCourseData->id)->get();
    //                     if($silverLessionData) {
    //                         foreach ($silverLessionData as $silverlData) {
    //                             array_push($instructorSilverVideoData, $silverlData);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     // Get Gold Video Section
    //     $goldCategoryId = CourseCategory::select('id')->where('name', '=', 'Gold')->first();
    //     if(isset($goldCategoryId['id']) && $goldCategoryId['id']) {
    //         $instructorGoldCourseData = InstructorCourse::select('id')->where('instructor_id', '=', $instructorId)->where('course_category_id', '=', $goldCategoryId['id'])->get();
    //         if($instructorGoldCourseData) {
    //             foreach ($instructorGoldCourseData as $insGoldCourseData) {
    //                 if($insGoldCourseData->id) {
    //                     $goldLessionData = InstructorCourseLession::where('instructor_id', '=', $instructorId)->where('instructor_course_id', '=', $insGoldCourseData->id)->get();
    //                     if($goldLessionData) {
    //                         foreach ($goldLessionData as $goldlData) {
    //                             array_push($instructorGoldVideoData, $goldlData);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }

    //     $instructorBronzeTeachingVideosData = InstructorVideos::where('main_course_category_id',2)->where('instructor_id',$instructorId)->get();


    //     $instructorRecommendedVideoData = InstructorVideos::where('instructor_id', '=', $instructorId)->where('status', '=', 1)->where('recommended_flag','=',1)->get();

    //     return view("instructor-detail", compact('instructorDetailData', 'instructorDemonstrationData', 'instructorBiographyData', 'instructorFreeVideoData', 'instructorRecommendedVideoData', 'instructorBronzeVideoData', 'instructorSilverVideoData', 'instructorGoldVideoData','instructorBronzeTeachingVideosData'));
    // }

    /**
    * View Our Classes Page
    * Route Name : our-classes
    * Route : our-classes
    * Method : GET
    * @return \Illuminate\View\View
    */
    // public function getOurClasses(Request $request) {
    //     Session::put('isLandingPage', false);
    //     $instructorDropdownData = Instructor::select('id', 'name')->where('is_approved', '=', 1)->get();
    //     $discplineDropdownData = Discipline::select('id', 'title')->get();
    //     $instructorCourseLessionData = [];
    //     $selIns = $request->selIns;
    //     $selDesc = $request->selDesc;
    //     if($selIns != 'All' && $selDesc != 'All') {
    //         $instructorCourseLessionData = InstructorCourseLession::leftJoin('instructors', 'instructors.id', '=', 'instructor_course_lessions.instructor_id')->leftJoin('instructor_courses', 'instructor_courses.id', '=', 'instructor_course_lessions.instructor_course_id')->select('instructors.name', 'instructors.photo', 'instructor_course_lessions.title', 'instructor_course_lessions.description', 'instructor_course_lessions.lession_thumbnail', 'instructor_course_lessions.video_duration')->where('instructor_course_lessions.instructor_id', '=', $selIns)->where('instructor_courses.discipline_id', '=', $selDesc)->get();
    //     } elseif ($selIns != 'All' || $selDesc != 'All') {
    //         if($selIns == 'All') {
    //             $instructorCourseLessionData = InstructorCourseLession::leftJoin('instructors', 'instructors.id', '=', 'instructor_course_lessions.instructor_id')->leftJoin('instructor_courses', 'instructor_courses.id', '=', 'instructor_course_lessions.instructor_course_id')->select('instructors.name', 'instructors.photo', 'instructor_course_lessions.title', 'instructor_course_lessions.description', 'instructor_course_lessions.lession_thumbnail', 'instructor_course_lessions.video_duration')->where('instructor_courses.discipline_id', '=', $selDesc)->get();
    //         } elseif($selDesc == 'All') {
    //             $instructorCourseLessionData = InstructorCourseLession::leftJoin('instructors', 'instructors.id', '=', 'instructor_course_lessions.instructor_id')->select('instructors.name', 'instructors.photo', 'instructor_course_lessions.title', 'instructor_course_lessions.description', 'instructor_course_lessions.lession_thumbnail', 'instructor_course_lessions.video_duration')->where('instructor_course_lessions.instructor_id', '=', $selIns)->get();
    //         }
    //     } else {
    //         $instructorCourseLessionData = InstructorCourseLession::leftJoin('instructors', 'instructors.id', '=', 'instructor_course_lessions.instructor_id')->select('instructors.name', 'instructors.photo', 'instructor_course_lessions.title', 'instructor_course_lessions.description', 'instructor_course_lessions.lession_thumbnail', 'instructor_course_lessions.video_duration')->get();
    //     }
    //     return view("our-classes", compact('instructorDropdownData', 'discplineDropdownData', 'instructorCourseLessionData', 'selIns', 'selDesc'));
    // }

    public function getOurClasses(Request $request) {

        Session::put('isLandingPage', false);

        $user = User::where('id',Auth::id())->first();

        $isDisputedUser = "";

        if($user)
        {
            $disputedPayments = StudentSubscription::where('student_id',Auth::id())->where('dispute_flag',1)->where('plan_subscription_id',$user->plan_subscription_id)->first();
            
            if($disputedPayments)
            {
                $isDisputedUser = "Disputed";
            }
        }

        //$instructorDropdownData = Instructor::select('id', 'name')->where('is_approved', '=', 1)->get();
        $discplineDropdownData = Discipline::select('id', 'title', 'video_coming_soon_image')->orderBy('mobile_sequence','ASC')->get();
        $levels = CourseCategory::select('id', 'name')->where('id','!=',1)->where('id','!=',5)->get();
            
        $disciplineWiseInstructors = array();

        $selIns = 'All';

        $level = $request->level;

        if($request->level == '')
        {
            $level = 2;
        }
        
        // echo $level;die;
        if(isset($request->selIns) && $request->selIns != 'All') {
            $selIns = $request->selIns;

            $classesData = array(); 
            //InstructorDiscipline
            //$instructorData = Instructor::where('id', '=', $request->selIns)->paginate(9);
             $classes = InstructorClasses::where('discipline_id',$request->selIns)->where('main_category_id',$level)->where('publish',1)->get();   
            
            if(!empty($classes))
            {
                foreach($classes as $class)
                {  
                    $videoDetails = "";

                    $classFirstVideo = ClassVideos::where('class_id', $class->id)->orderBy('id','ASC')->first();

                    if($classFirstVideo)
                    {
                        $videoDetails = InstructorVideos::where('id', $classFirstVideo->video_id)->first();
                    }
                  
                    $classesData[] = array(
                        'id'=>$class->id,
                        'class_name'=>$class->class_name,
                        'profile'=>isset($videoDetails->video_thumbnail) ? $videoDetails->video_thumbnail : ''

                    );
                
                    
                    // $instructorData[] = array(
                    //     'id'=>$instructorList['id'],
                    //     'name'=>$instructorList['name'],
                    //     'photo'=>$instructorList['photo']
                    // );
                }
            }
            else
            {
                $classesData[] = array();
            }

            $discipline = Discipline::select('id', 'title', 'video_coming_soon_image')->where('id', $selIns)->first();

            $disciplineWiseInstructors[] = array(
                'discipline_name' => $discipline->title,
                'video_coming_soon_image' => $discipline->video_coming_soon_image,
                'instructorData' => $classesData
            );

        } 
        else 
        {
            if($discplineDropdownData)
            {
                foreach($discplineDropdownData as $discipline)
                {
                    $classesData = array(); 

                    $classes = InstructorClasses::where('discipline_id',$discipline->id)->where('main_category_id',$level)->where('publish',1)->get();   

                    if($classes)
                    {
                        foreach($classes as $class)
                        {
                            $videoDetails = "";

                            $classFirstVideo = ClassVideos::where('class_id', $class->id)->orderBy('id','ASC')->first();

                            if($classFirstVideo)
                            {
                                $videoDetails = InstructorVideos::where('id', $classFirstVideo->video_id)->first();
                            }
                          
                            $classesData[] = array(
                                'id'=>$class->id,
                                'class_name'=>$class->class_name,
                                'profile'=>isset($videoDetails->video_thumbnail) ? $videoDetails->video_thumbnail : ''

                            );
                            
                        }
                    
                    }
                    else
                    {
                        $classesData[] = array();
                    }

                    $disciplineWiseInstructors[] = array(
                    'discipline_name' => $discipline->title,
                    'video_coming_soon_image' => $discipline->video_coming_soon_image,
                    'instructorData' => $classesData
                    );
                }
            }
            // $instructorData = Instructor::where('is_approved', '=', 1)->paginate(9);
        }
        // echo "<pre>";
        // print_r($disciplineWiseInstructors);
        // die;
        $myCollectionObj = collect($disciplineWiseInstructors);

        $disciplineWiseInstructors = $this->ourSchoolPaginate($myCollectionObj);
        return view("our-classes", compact('disciplineWiseInstructors','levels', 'discplineDropdownData', 'selIns', 'level', 'isDisputedUser'));
    }   

    /**
    * View Instructor Videos Page
    * Route Name : instructor-video
    * Route : instructor-video
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getSearchText(Request $request)
    {
        $text_search = $request->search;

            $path = base_path().'/public';
            $pathToJson = $path . "/storage/instructorfreevidoes.json";
            $freeVideoJsonData = file_get_contents($pathToJson);
            $instructorFreeVideosData1 = json_decode($freeVideoJsonData, true);

            $instructorsData = [];

            $results = array();

            $instructorFreeVideosData = [];

            foreach ($instructorFreeVideosData1 as $value)
            {
                // print_r($value);die;
                foreach($value as $v)
                {
                    $v = strtolower($v);
                    if (strpos($v, strtolower($text_search)) !== false)
                    {
                        if(!in_array($value['employee_name'], $instructorFreeVideosData)) {
                            array_push($instructorFreeVideosData, $value['employee_name']);
                        }
                        if(!in_array($value['title'], $instructorFreeVideosData)) {
                            array_push($instructorFreeVideosData, $value['title']);
                        }
                    }
                }
                
            }
        
        return response()->json($instructorFreeVideosData); 
    }

    public function ourClassDetail($classId) {
        // $user = User::where('id',Auth::id())->first();

        // $isDisputedUser = "";

        // if($user)
        // {
        //     $disputedPayments = StudentSubscription::where('student_id',Auth::id())->where('dispute_flag',1)->where('plan_subscription_id',$user->plan_subscription_id)->first();
            
        //     if($disputedPayments)
        //     {
        //         $isDisputedUser = "Disputed";
        //     }
        // }

        $classData = InstructorClasses::where('id', '=', $classId)->first();
        
        $instructorClassVideos = [];
        
        $firstVedio = "";

        $firstVedioDetails = ClassVideos::where('class_id',$classId)->orderBy('id','ASC')->first();

        if($firstVedioDetails)
        {
            $firstVedio =  InstructorVideos::where('id',$firstVedioDetails->video_id)->first();
        }
        
        $remainingVideos = ClassVideos::where('class_id',$classId)->get();

        if(!empty($remainingVideos))
        {
            foreach($remainingVideos as $dv)
            {
                $vedioDetails =  InstructorVideos::where('id',$dv->video_id)->first();

                $instructorClassVideos[] = array(
                    'id'=>$vedioDetails['id'],
                    'title'=>$vedioDetails['title'],
                    'photo'=>$vedioDetails['video_thumbnail'],
                    'name'=>$vedioDetails['title'],
                    'video_id'=>$vedioDetails['video_id'],
                    'video_duration'=>$vedioDetails['video_duration']
                );

            }
        }

        $disciplineDetails = Discipline::where('id',$classData->discipline_id)->first();

        return view("class", compact('instructorClassVideos', 'firstVedio', 'classData', 'disciplineDetails'));
    }

    public function showVerifiedLoginForm(Request $request){
        return view('showVerifiedLoginForm');
    }

    public function postVerifiedLoginForm(Request $request){
        $tab_password = AllTabPassword::first();
        if($request->username == $tab_password->username and Hash::check($request->password, $tab_password->password)){
            Session::put('pageVerification','true');
            // Session::put('intended_url',url()->previous());
            if($request->intended_url == url('please-login-first')){
                Session::flash('intended_url',url('/'));
                return redirect(url('/'));
            }
            else{
                Session::flash('intended_url',$request->intended_url);
                return redirect($request->intended_url);
            }
            // session()->flash('intended_url', url()->previous());
        }
        else{
            Session::put('pageVerification','false');
            return redirect()->route('show.login.form')->with('error','Credentails not match');
        }
    }
}