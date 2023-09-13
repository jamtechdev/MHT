<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Discipline;
use App\Models\SubscriptionPlan;
use App\Models\SubscriptionBenefit;
use App\Models\StudentSubscription;
use App\Models\PaymentDetails;
use App\Models\LastPageVisit;
use App\Models\SendgridTemplate;
use App\Models\Instructor;
use App\Models\InstructorCourseLession;
use App\Models\InstructorDiscipline;
use App\Models\CourseCategory;
use App\Models\Promocode;
use App\Models\InstructorRecommendedVideos;
use App\Models\InstructorVideos;
use Illuminate\Support\Facades\Config;
use DataTables;
use Stripe;

use App\Mail\ReferralMail;
use Mail, Hash, Auth, Storage, Session;
use Sichikawa\LaravelSendgridDriver\SendGrid;
use Carbon\Carbon;

class StudentController extends Controller
{
    use SendGrid;
    /**
    * View Student Dashboard Page
    * Route Name : dashboard
    * Route : dashboard
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getStudentDashboard()
    {
        $viewPaidVideoURL = Session::get('view_paid_video_url');
        if($viewPaidVideoURL) {
            Session::put('view_paid_video_url', null);
            return Redirect::to($viewPaidVideoURL);
        } else {
            if(Auth::id()) {
                $user_data = User::where('id',Auth::id())->first();
                Session::put('is_logged_in_user',1);
                Session::put('is_accepted_bronze_plan',$user_data->accept_bronze_plan);
                
                return Redirect::route('student_profile');
            } else {
                return view('dashboard');
            }
        }
    }

    /**
    * View Student Register Step One Page
    * Route Name : student.register.step.one
    * Route : student-register-step-one
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getStudentRegisterStepOne(Request $request)
    {
        $studentRegisterData = Session::get('studentRegister');

        return view('front.students.student_register_step_one', compact('studentRegisterData'));
    }

    /**
    * Store Student Register Step One Data
    * Route Name : post.student.register.step.one
    * Route : post-student-register-step-one
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postStudentRegisterStepOne(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
        ]);

        $name = $request->firstname.' '.$request->lastname;

        $storeData = [
            'name' => $name,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        if(empty(Session::get('studentRegister'))) {
            // Create Object For Store Data In Database User Table
            $student = new User();
            // Fill Data
            $student->fill($storeData);
            // Put Step One Data In Session
            Session::put('studentRegister', $student);
        } else {
            // Get Step One Session Data
            $student = Session::get('studentRegister');
            // Fill Data
            $student->fill($storeData);
            // Put Step One Data In Session
            Session::put('studentRegister', $student);
        }
        return Redirect::route('student.register.step.two');
    }

    /**
    * View Student Register Step Two Page
    * Route Name : student.register.step.two
    * Route : student-register-step-two
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getStudentRegisterStepTwo(Request $request)
    {
        $studentRegisterData = Session::get('studentRegister');
        return view('front.students.student_register_step_two', compact('studentRegisterData'));
    }

    /**
    * Store Student Register Step Two Data
    * Route Name : post.student.register.step.two
    * Route : post-student-register-step-two
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postStudentRegisterStepTwo(Request $request)
    {
        // Validate Student Register Step Two Form Data
        $request->validate([
            'who_will_be_training' => ['required'],
            'disciplines_in_martial_arts' => ['required'],
            'stretching_flexibility_spiritual_meditative_arts' => ['required'],
            'health_and_wellness_guidance' => ['required'],
            'all_fitness_including' => ['required'],
        ]);
        // Implode Array Data In String
        $storeData = [
            'who_will_be_training' => implode(',', $request->who_will_be_training),
            'disciplines_in_martial_arts' => implode(',', $request->disciplines_in_martial_arts),
            'stretching_flexibility_spiritual_meditative_arts' => implode(',', $request->stretching_flexibility_spiritual_meditative_arts),
            'health_and_wellness_guidance' => implode(',', $request->health_and_wellness_guidance),
            'all_fitness_including' => implode(',', $request->all_fitness_including),
        ];
        // Get Step Two Session Data
        $student = Session::get('studentRegister');
        // Fill Data
        $student->fill($storeData);
        // Put Step Two Data In Session
        Session::put('studentRegister', $student);
        return Redirect::route('student.register.step.three');
    }

    /**
    * View Student Register Step Three Page
    * Route Name : student.register.step.three
    * Route : student-register-step-three
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getStudentRegisterStepThree(Request $request)
    {
        $studentRegisterData = Session::get('studentRegister');
        return view('front.students.student_register_step_three', compact('studentRegisterData'));
    }

    /**
    * Store Student Register Step Three Data
    * Route Name : post.student.register.step.three
    * Route : post-student-register-step-three
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postStudentRegisterStepThree(Request $request)
    {
        // Validate Student Register Step Three Form Data
        $request->validate([
            'age_group' => ['required'],
            'gender' => ['required'],
            'fitness' => ['required'],
            'preferred_language' => ['required'],
        ]);
        // Implode Array Data In String
        $storeData = [
            'age_group' => $request->age_group,
            'gender' => $request->gender,
            'fitness' => $request->fitness,
            'preferred_language' => $request->preferred_language,
        ];
        // Get Step Three Session Data
        $student = Session::get('studentRegister');
        // Fill Data
        $student->fill($storeData);
        // Put Step Three Data In Session
        Session::put('studentRegister', $student);
        return Redirect::route('studentregisterstepfour');
    }

    /**
    * View Student Register Step Four Page
    * Route Name : studentregisterstepfour
    * Route : studentregisterstepfour
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getStudentRegisterStepFour(Request $request)
    {
        $studentRegisterData = Session::get('studentRegister');
        return view('front.students.student_register_step_four', compact('studentRegisterData'));
    }

    /**
    * Store Student Register Step Four Data
    * Route Name : studentregisterstepfour
    * Route : studentregisterstepfour
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postStudentRegisterStepFour(Request $request)
    {
        // Validate Student Register Step Four Form Data
        $request->validate([
            'instructor_gender' => ['required'],
            'preferred_training_style' => ['required'],
            'g-recaptcha-response' => 'required|recaptchav3:studentregisterstepfour,0.5',
        ]);
        // Array Data
        $storeData = [
            'instructor_gender' => $request->instructor_gender,
            'preferred_training_style' => $request->preferred_training_style,
        ];
        // Get Step Four Session Data
        $student = Session::get('studentRegister');
        $student->save();
        // Clear Student Register Session Data
        Session::forget('studentRegister');
        // Call Registered Event For Notification
        event(new Registered($student));
        // Login Registered User
        Auth::login($student);
        return redirect(RouteServiceProvider::HOME);
    }

    public static function getNoToRupees($number) 
    {
        $no = round($number);
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
        0 => '',
        1 => 'First',
        2 => 'Second',
        3 => 'Third',
        4 => 'Fourth',
        5 => 'Fifth',
        6 => 'Sixth',
        7 => 'Seventh',
        8 => 'Eighth',
        9 => 'Nineth',
        10 => 'Tenth',
        11 => 'Eleventh',
        12 => 'Twelveth',
        13 => 'Thirteenth',
        14 => 'Fourteenth',
        15 => 'Fifteenth',
        16 => 'Sixteenth',
        17 => 'Seventeenth',
        18 => 'Eighteenth',
        19 => 'Nineteenth',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety');
        
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        
        while ($i < $digits_length)
        {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            
            if($number) 
            {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
            }
            else
            {
                $str [] = null;
            }
        }

        $Rupees = implode(' ', array_reverse($str));
        $paise = ($decimal) ? ($words[$decimal - $decimal % 10]) . " " . ($words[$decimal % 10]) : 'zero';
        return $Rupees;
    }

    public static function getNoToRupees1($number) 
    {
        $no = round($number);
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety');
        
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        
        while ($i < $digits_length)
        {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            
            if($number) 
            {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
            }
            else
            {
                $str [] = null;
            }
        }

        $Rupees = implode(' ', array_reverse($str));
        $paise = ($decimal) ? ($words[$decimal - $decimal % 10]) . " " . ($words[$decimal % 10]) : 'zero';
        return $Rupees;
    }

    /**
    * View Student Profile Page
    * Route Name : student_profile
    * Route : student_profile/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */

     /**
     * Author Ganesh
     * Removed user id's from url for security
     * Created At :- 2022-08-12
    */
    
    // public function getStudentProfile($id)
    public function getStudentProfile()
    {
 
        $user = User::where('id',Auth::id())->first();

        Session::pull('lastPage');

        if($user['upgrade_plan'] == 1)
        {
            Session::put('lastPage','student_subscription_manage');
        }

        if($user->subscription_id == 2 && $user->payment_status == 0 && $user->upgrade_plan != 1)
        {
            return Redirect::route('student.register.step.one');
        }

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

        $id = Auth::id();

        $benefit_count = User::where('id',Auth::id())->first();    

        $benefit_number = $this->getNoToRupees($benefit_count->referral_redeemed_count);

        $result = LastPageVisit::where('student_id',Auth::id())->first();
 
        if($result)
        {
            $user = LastPageVisit::where('student_id',Auth::id())->first();
            // $user->last_page_visit = 'student_profile/'.Auth::id();
            $user->last_page_visit = 'student_profile';
            $user->save();
        }
        else
        {
            
            $last_page = LastPageVisit::create(['student_id'=>Auth::id(),'last_page_visit'=>'student_profile']);
            $last_page->save();
        }

        if($id) {
            $studentProfileData = User::where('id', '=', $id)->first();

            $planData = SubscriptionPlan::where('id', '=', $studentProfileData->subscription_id)->first();

            return view('front.students.student_profile', compact('studentProfileData','benefit_number','planData'));
        } else {
            return Redirect::back()->with('error', 'Student do not exists');
        }
    }

    /**
    * Get Edit Student Profile Page
    * Route Name : student_profile_edit
    * Route : student_profile_edit/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getEditStudentProfile()
    {
        $id = AUth::id();

        if($id) {
            $studentProfileData = User::where('id', '=', $id)->first();
            return view('front.students.student_profile_edit', compact('studentProfileData'));
        } else {
            return Redirect::back()->with('error', 'Student do not exists');
        }
    }

    /**
    * Update Student In Database
    * Route Name : student_profile_edit
    * Route : student_profile_edit/{id}
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function updateStudentProfile(Request $request)
    {
        $id = Auth::id();
        // Validate Update Student Profile Form Fields
        $this->validate($request, [
            'firstname' => ['required', 'max:100'],
            'lastname' => ['required', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:250', 'unique:users,email,'.$id],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:12'],
            'age_group' => ['required'],
            'gender' => ['required'],
         //   'profile_picture' => ['required', 'max:500', 'mimes:jpg,jpeg,png']
        ]);
        // Get Student
        $student = User::where('id', '=', $id)->first();
        // Upload Profile Picture
    
        
        //$profile_picture = $request->file('profile_picture')->store('public/students/profile_pictures');
        
        /**
         * Author Ganesh
         * Changed Image uploading
         * Created_at : 09-06-2022
         */

        $image = $request->file('profile_picture');
        
        $photo = $student->profile_picture;

        if($request->file('profile_picture'))
        {
            $name_image = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $photo = $name_image.'.'.$img_ext;        
            $up_location = 'students_profile_pictures';
            $image->move(public_path($up_location), $photo);
           // $image->move($up_location,$photo);
            // Remove Old Profile Picture
            // if(Storage::exists($student->profile_picture)) {
            //     Storage::delete($student->profile_picture);
            // }
        }
        
        if($photo == '')
        {
            return redirect('student_profile_edit')->with("error", "Please upload profile picture");
        }
        // Get Inputs
        $input = $request->only(['firstname', 'lastname', 'email', 'phone', 'age_group', 'gender']);
        $input['name'] = $request->firstname.' '.$request->lastname;
        //$input['profile_picture'] = $profile_picture;
        $input['profile_picture'] = $photo;
        // Update Student In Database
        $editStudent = $student->update($input);
        if ($editStudent) {
            return redirect('student_profile')->with("success", "Profile has been updated successfully");
        } else {
            return redirect('student_profile')->with("error", "Sorry, Something went wrong please try again");
        }
    }

    /**
    * View Student Change Password Page
    * Route Name : student_changepassword
    * Route : student_changepassword/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getStudentChangePassword()
    {
        $id = Auth::id();

        $resultLastPage = LastPageVisit::where('student_id',Auth::id())->first();
 
        if($resultLastPage)
        {
            $user = LastPageVisit::where('student_id',Auth::id())->first();
            $user->last_page_visit = 'student_changepassword';
            $user->save();
        }
        else
        {
            
            $last_page = LastPageVisit::create(['student_id'=>Auth::id(),'last_page_visit'=>'student_changepassword']);
            $last_page->save();
        }

        $result = [];
        $result['id'] = $id;
        return view('front.students.student_changepassword', compact('result'));
    }

    /**
    * Update Student Change Password In Database
    * Route Name : student_changepassword
    * Route : student_changepassword/{id}
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function updateStudentChangePassword(Request $request)
    {
        $id = Auth::id();

        $this->validate($request, [
            'currentpassword' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        if($id) {
            $student = User::where('id', '=', $id)->first();
            // Check Current Password Match Or Not
            if(!Hash::check($request->currentpassword, $student->password)) {
                return Redirect::back()->with("error", "The current password do not match.");
            }

            // Check Current Password And New Password Are Same
            if(Hash::check($request->password, $student->password)) {
                return Redirect::back()->with("error", "The current password and new password are should be different.");
            }

            // Update Student Password In Database
            $student->password = Hash::make($request->password);
            if ($student->save()) {
                Auth::guard('web')->logout();
                return redirect('login')->with("success", "Password has been changed successfully");
            } else {
                return Redirect::back()->with("error", "Sorry, Something went wrong please try again");
            }
        } else {
            return Redirect::back()->with("error", "User do not exists");
        }
    }

     /**
    * View Student Enroll Page
    * Route Name : student_enroll
    * Route : student_enroll/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getStudentEnroll($id)
    {
        if($id) {
            $studentEnrollData = User::where('id', '=', $id)->first();
            return view('front.students.student_enroll', compact('studentEnrollData'));
        } else {
            return Redirect::back()->with('error', 'Student do not exists');
        }
    }

    public function getStudentWishlist($id)
    {
        if($id) {
            $studentWishlistData = User::where('id', '=', $id)->first();
            return view('front.students.student_wishlist', compact('studentWishlistData'));
        } else {
            return Redirect::back()->with('error', 'Student do not exists');
        }
    }

    public function getStudentBelt($id)
    {
        if($id) {
            $studentBeltData = User::where('id', '=', $id)->first();
            return view('front.students.student_belt', compact('studentBeltData'));
        } else {
            return Redirect::back()->with('error', 'Student do not exists');
        }
    }

    public function getStudentHistory($id)
    {
        if($id) {
            $studentHistoryData = User::where('id', '=', $id)->first();
            return view('front.students.student_history', compact('studentHistoryData'));
        } else {
            return Redirect::back()->with('error', 'Student do not exists');
        }
    }

    public function getStudentSettings($id)
    {
        if($id) {
            $studentSettingsData = User::where('id', '=', $id)->first();
            return view('front.students.student_settings', compact('studentSettingsData'));
        } else {
            return Redirect::back()->with('error', 'Student do not exists');
        }
    }

    /**
    * Cancel Student Current Subscription
    * Route Name : student_cancel_subscription
    * Route : student_cancel_subscription
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function cancelSubscription()
    {
        $user = Auth::user();
        if($user) {
            if($user->subscription_id && $user->status != 'canceled') {
                // Cancel Current Subscription
                $stripe = new \Stripe\StripeClient(config("services.stripe.secret"));
                $response = $stripe->subscriptions->cancel($user->subscription_id, []);
                if($response) {
                    if(User::where('id', '=', $user->id)->update(array('status' => $response->status))) {
                        return Redirect::back()->with('success', 'Your current plan subscription has been canceled successfully');
                    }
                } else {
                    return Redirect::back()->with('error', 'Ooops! Something went wrong.');
                }
            } else {
                return Redirect::back()->with('error', 'Your current subscription does not exists');
            }
        } else {
            return Redirect::back()->with('error', 'Student does not exists');
        }
    }

    /**
    * Upgrade Student Plan
    * Route Name : student_upgrade_plan
    * Route : student_upgrade_plan
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function upgradePlan(Request $request)
    {
        $request->validate([
            'plan' => ['required'],
            'price' => ['required'],
            'interval' => ['required'],
            'currency' => ['required'],
            'stripeToken' => ['required'],
        ]);

        $couponId = "";
        
        if($request->promocode != '') {
            // $promocodeDetails = Promocode::where('promocode',$request->promocode)->first();

            // if(!$promocodeDetails) {
            //     return redirect()->back()->with('error', 'Promo code does not exists');
            // }
            // else
            // {
                $couponId = $request->promocode;
            // }
        }


        // Get Logged In User Data
        $user = User::find(Auth::id());

        if($user) {
            $result = stripeSubscription($user, $request, $couponId);
            if($result != 'success') {
                return redirect()->back()->with('client_secret', $result);
            }
            return Redirect::back()->with('success', 'Your subscription has been upgrade successfully');
        } else {
            return Redirect::back()->with('error', 'User does not exists');
        }
    }

    /**
    * Author Ganesh 
    * View Student subscription pagee
    * Route : student_subscription_manage/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getStudentSubscription()
    {
        $id = Auth::id();
        
        $benefit_counts = User::where('id',Auth::id())->first();
        
        $benefit_count = $benefit_counts->referral_redeemed_count;

        $benefit_number = $this->getNoToRupees1($benefit_counts->referral_redeemed_count);

        $result = LastPageVisit::where('student_id',Auth::id())->first();
 
        if($result)
        {
            $user = LastPageVisit::where('student_id',Auth::id())->first();
            $user->last_page_visit = 'student_subscription_manage';
            $user->save();
        }
        else
        {
            $last_page = LastPageVisit::create(['student_id'=>Auth::id(),'last_page_visit'=>'student_subscription_manage']);
            $last_page->save();
        }

        if($id) {
            $studentProfileData = User::where('id', '=', $id)->first();

            $subscriptionData = array();
            $newPlans = array();
            $oldPlanBenfits = "";
            $studentPlanBenefits = "";
            $validity = "";

            if($studentProfileData->subscription_id)
            {
                $subscription_id = $studentProfileData->subscription_id;

                $subscriptionData = SubscriptionPlan::where('id', '=', $subscription_id)->first();

                $benefits = array();

                if(isset($subscriptionData->benefits))
                {
                    $benefits = explode(",",$subscriptionData->benefits);
                    $studentPlanBenefits = $subscriptionData->benefits;
                }
               
                $oldbenefits =array();
                
                if(!empty($benefits))
                {
                    foreach($benefits as $b)
                    {
                        if($b != NULL)
                        {
                            $data = SubscriptionBenefit::where('id',$b)->first();

                            if($data)
                            {
                                $oldbenefits[] = $data->benefit;
                            }
                            
                        }
                    }

                    $oldPlanBenfits = $oldbenefits;
                }

                if($studentProfileData->plan_subscription_id)
                {
                    $validity = StudentSubscription::where('plan_subscription_id',$studentProfileData->plan_subscription_id)->where('student_id',$id)->first();
                }
                

            }

            $otherPlans = SubscriptionPlan::where('id', '!=', $studentProfileData->subscription_id)->get();
    
            if(!empty($otherPlans))
            {
                foreach($otherPlans as $o)
                {
                    $newPlans[] = array(
                        'id'=>$o->id,
                        'plan_name' => $o->plan_name,
                        'price' => $o->price,
                        'validity' => $o->validity,
                        'validity_type'=>$o->validity_type,
                        'benefits' => $o->benefits,
                    );
                }
            }

            $allBenefits = SubscriptionBenefit::get();
            
            return view('front.students.student_subscription', compact('studentProfileData','subscriptionData','oldPlanBenfits','allBenefits','studentPlanBenefits','newPlans','benefit_number','benefit_count', 'validity'));
        } else {
            return Redirect::back()->with('error', 'Student do not exists');
        }
    }

    /**
    * Author Ganesh 
    * View Student subscription pagee
    * Route : student_subscription_manage/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getStudentSubscriptionHistory(Request $request)
    {
        if ($request->ajax()) {

            $data = StudentSubscription::where('student_id',Auth::id())
                    ->select('student_subscriptions.created_at AS created_at','subscription_plans.plan_name','student_subscriptions.price','student_subscriptions.receipt_url','subscription_end_date','canceled_at')
                    ->join('subscription_plans', 'subscription_plans.id', '=', 'student_subscriptions.subscription_id')
                    ->orderBy('student_subscriptions.created_at','DESC')
                    ->get();
            
            $result = array();

            if(!empty($data))
            {
                $i = 1;
                foreach($data as $d)
                {
                    if($d->canceled_at)
                    {
                        $renewlDate = "";
                    }
                    else
                    {
                        $renewlDate = $d->subscription_end_date;
                    }

                    $result[] = array(
                        'id'=>$i,
                        'date'=>date("Y-m-d",strtotime($d->created_at)),
                        'renew_date'=>$renewlDate,
                        'end_date'=> $d->canceled_at,
                        'plan_name'=>$d->plan_name,
                        'price'=>" $ ".$d->price,
                        'receipt_url'=>$d->receipt_url
                    );

                    $i++;
                }
            }
            return DataTables::of($result)->make(true);
        }
    }

    /**
    * Author Ganesh 
    * Get changes plan details
    * Route : cghangePlan/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function changePlan(Request $request)
    {
        if ($request->ajax()) {
            
            $data = SubscriptionPlan::where('id',$request->id)
                    ->first();
            
            $result = array();

            if(!empty($data))
            {
                $planBenefits = array();

                $benefits = explode(",",$data->benefits);

                if(!empty($benefits))
                {
                    foreach($benefits as $b)
                    {
                        $benefit = SubscriptionBenefit::where('id',$b)
                        ->first();

                        if(!empty($benefit))
                        {
                            $planBenefits[] = $benefit->benefit;
                        }
                    }
                    
                }

                $validity_type = "";

                if($data->validity_type == 1)
                {
                    $validity_type = "Day";
                }
                if($data->validity_type == 2)
                {
                    $validity_type = "Month";
                }
                if($data->validity_type == 3)
                {
                    $validity_type = "Year";
                }
                if($data->validity_type == 4)
                {
                    $validity_type = "Lifetime";
                }

                $result[] = array(
                    'id'=>$data->id,
                    'plan_name'=> $data->plan_name,
                    'price'=>" $ ".$data->price,
                    'validity'=> $data->validity,
                    'validity_type'=> $validity_type,
                    'planBenefits' => $planBenefits,
                    'description' => $data->description
                );
            }

            return json_encode($result);
        }
    }

    /**
    * Author Ganesh 
    * update accept plan status
    * Route : acceptPlan
    * created_at : 2022-08-07
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function acceptPlan(Request $request)
    {
        if ($request->ajax()) {
            Session::put('is_accepted_bronze_plan',2);
            $data = User::where('id',Auth::id())
                    ->update(['accept_bronze_plan'=>$request->value]);
        }
    }

    /**
    * Author Ganesh 
    * Accept Bronze Plan
    * Route Name : acceptBronzPlan
    * Route : acceptBronzPlan
    * Method : POST
    * Created at : 2022-07-11
    * @return \Illuminate\View\View
    */
    // public function acceptBronzPlan(Request $request)
    // {
    //     // Check User Selected Plan Is Free
    //     if($request->plan == 'Free') {
    //         // Validate Register Step One Form Data
    //         $request->validate([
    //             'plan' => ['required'],
    //             'price' => ['required'],
    //             'interval' => ['required'],
    //             'currency' => ['required'],
    //         ]);

    //         // Get Logged In User Data
    //         $user = User::find(Auth::id());
           
    //         $user->is_subscribe = $request->is_subscribe;
    //         $user->plan_amount = $request->price;
    //         $user->plan_amount_currency = $request->currency;
    //         $user->plan_interval = $request->interval;
    //         $user->save();

    //         return Redirect::to('step-two');
    //     } else {
    //         $request->validate([
    //             'plan' => ['required'],
    //             'price' => ['required'],
    //             'interval' => ['required'],
    //             'currency' => ['required'],
    //         ]);

    //         try{
    //             Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //             $result = Stripe\Charge::create ([
    //                     "amount" => $request->price * 100,
    //                     "currency" => "usd",
    //                     "source" => $request->stripeToken,
    //                     "description" => "Buy Bronze plan" 
    //             ]);
    
    //             if($result->status == "succeeded")
    //             {
                
    //                 $student = new StudentSubscription;
    //                 $student->student_id = Auth::id();
    //                 $student->subscription_id = 2;
    //                 $student->save();
                    
    //                 $user =  User::where('id',Auth::id())->first();
    
    //                 $template = SendgridTemplate::where('id',15)->first();
    
    //                 $template_id = "d-".$template->template_id;   
    
    //                 $email = new \SendGrid\Mail\Mail();
    
    //                 $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                 $email->setSubject('Try MartialArtsZen.com using this referral');
    //                 $email->addTo($user->email);
    //                 $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                 $email->addDynamicTemplateDatas([
    //                     "first_name"=>$user->firstname,
    //                     "default"=>"Valued customer",
    //                     "verifyUrl"=>route('student.login')
    //                     ]);
    //                 $email->setTemplateId($template_id);
                    
    //                 $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
        
    //                 try{
    //                     $response = $sendgrid->send($email);
    //                 }
    //                 catch(Exception $e)
    //                 {
    //                     echo "Caught Exception:".$e->getMessage()."\n";
    //                 }
               
    //                 Session::put('is_accepted_bronze_plan',1);
                   
    //                 User::where('id', '=', Auth::id())->update(['accept_bronze_plan' => 1,'subscription_id'=>2]);
    //                 Session::flash('success', 'Thanks! You are now subscribed to our Bronze plan');
    
    //                 return redirect(Session::get('lastPage'));
    //             }
    //             else
    //             {
    //                 return back();
    //             }
               
    //         }catch(Exception $e)
    //         {
    //             return back();
    //         }

    //         // Validate Register Step One Form Data
    //         // $request->validate([
    //         //     'plan' => ['required'],
    //         //     'price' => ['required'],
    //         //     'interval' => ['required'],
    //         //     'currency' => ['required'],
    //         //     'stripeToken' => ['required'],
    //         // ]);

    //         // if($result->status == "succeeded")
    //         // {
    //             // Store Step One Data In Databas
               
    //         // }
    //         // else
    //         // {   
    //         //     return Redirect::back()->with("error", "Sorry, Something went wrong please try again");;
    //         // }
    
            
    //     }
    // }

    public function acceptBronzPlan(Request $request)
    {
        // Check User Selected Plan Is Free
        if($request->plan == 'Free') {
            // Validate Register Step One Form Data
            $request->validate([
                'plan' => ['required'],
                'price' => ['required'],
                'interval' => ['required'],
                'currency' => ['required'],
            ]);

            // Get Logged In User Data
            $user = User::find(Auth::id());
           
            $user->is_subscribe = $request->is_subscribe;
            $user->plan_amount = $request->price;
            $user->plan_amount_currency = $request->currency;
            $user->plan_interval = $request->interval;
            $user->save();

            return Redirect::to('step-two');
        } else {
            $request->validate([
                'plan' => ['required'],
                'price' => ['required'],
                'interval' => ['required'],
                'currency' => ['required'],
            ]);

            
            $user = User::where('id',Auth::id())->first();

            $planId = SubscriptionPlan::where('id',$request->plan)->first();
            
            $couponId = "";

            // $couponId = "fVqz2Nf6";
            
            if($request->promocode != '') {
                // $promocodeDetails = Promocode::where('promocode',$request->promocode)->first();

                // if(!$promocodeDetails) {
                //     return redirect()->back()->with('error', 'Promo code does not exists');
                // }
                // else
                // {
                    $couponId = $request->promocode;
                // }
            }

            try{
                
                $result = stripeSubscription($user, $request, $couponId, $planId);

                if($result != 'success') {
                    return redirect()->back()->with('client_secret', $result);
                }

                // $student = new StudentSubscription;
                // $student->student_id = Auth::id();
                // $student->subscription_id = $request->plan;
                // $student->save();
                
                // Send email for welcome to bronze

                if($request->sendUpgradeConfirmEmail == 0)
                {
                    $template = SendgridTemplate::where('id',20)->first();

                    $template_id = "d-".$template->template_id;    

                    $email = new \SendGrid\Mail\Mail();
                    
                    $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                    $email->setSubject('Try MartialArtsZen.com using this referral');
                    $email->addTo($user->email);
                    $email->addContent("text/html","Join me and improve your skills in various disciplines");
                    $email->addDynamicTemplateDatas([
                        "first_name"=>$user->firstname,
                        "default"=>"Valued customer",
                        "actionUrl"=>route('student_profile')
                        ]);
                    $email->setTemplateId($template_id);
                    
                    $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                    
                    $sendgrid->send($email);

                }
                if($request->sendUpgradeConfirmEmail == 1)
                {
                    $template = SendgridTemplate::where('id',34)->first();

                    $template_id = "d-".$template->template_id;    

                    $email = new \SendGrid\Mail\Mail();
                    
                    $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                    $email->setSubject('Try MartialArtsZen.com using this referral');
                    $email->addTo($user->email);
                    $email->addContent("text/html","Join me and improve your skills in various disciplines");
                    $email->addDynamicTemplateDatas([
                        "first_name"=>$user->firstname,
                        "default"=>"Valued customer",
                        "actionUrl"=>route('student_profile')
                        ]);
                    $email->setTemplateId($template_id);
                    
                    $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                    
                    $sendgrid->send($email);

                }
                
                 // Update Payment Status Flag
                $user->payment_status = 1;
                $user->save();
   
                User::where('id', '=', Auth::id())->update(['accept_bronze_plan' => 1,'subscription_id'=>2,'upgrade_plan'=>0]);
                    
                Session::flash('success1', 'Payment for '.$planId->plan_name.' plan is successful. Welcome back!');
                
                if(Session::get('lastPage'))
                {
                    return redirect(Session::get('lastPage'));
                }
                else
                {
                    return Redirect::route('disciplines',['id'=>2]);
                }

               
            }catch(Exception $e)
            {
                return back();
            }
        }
    }

    /**
    * Author Ganesh
    * Created at :- 16-07-2022 
    * Route : updateStepTwoVisitStatus
    * Method : POST
    */

    public function updateStepTwoVisitStatus(Request $request)
    {
        // Update age group
        $user = User::find(Auth::id());
        $user->first_time_on_third_step = !empty($request->value) ? $request->value : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 16-07-2022 
    * View Register Step Four Page
    * Route : updateStepThreeVisitStatus
    * Method : POST
    */

    public function updateStepThreeVisitStatus(Request $request)
    {
        // Update age group
        $user = User::find(Auth::id());
        $user->first_time_on_fourth_step = !empty($request->value) ? $request->value : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 16-07-2022 
    * View Register Step Four Page
    * Route : updateStepFourVisitStatus
    * Method : POST
    */

    public function updateStepFourVisitStatus(Request $request)
    {
        // Update age group
        $user = User::find(Auth::id());
        $user->first_time_on_fifth_step = !empty($request->value) ? $request->value : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 26-07-2022 
    * View manage payment methods page
    * Route : manage_payment_methods
    * Method : get
    */
    public function getManagePaymentMethods(Request $request)
    {
        $paymentMethods = PaymentDetails::where('student_id',Auth::id());
        
        return view('front.students.manage_payment_methods',compact('paymentMethods'));
    }

    public function emailForm(Request $request)
    {   

        if(Auth::user())
        {
            $result = LastPageVisit::where('student_id',Auth::id())->first();
 
            if($result)
            {
                $user = LastPageVisit::where('student_id',Auth::id())->first();
                // $user->last_page_visit = 'student_profile/'.Auth::id();
                $user->last_page_visit = 'email_form';
                $user->save();
            }
            else
            {
                
                $last_page = LastPageVisit::create(['student_id'=>Auth::id(),'last_page_visit'=>'email_form']);
                $last_page->save();
            }

            $user = User::where('id',Auth::id())->first();
            
            if(!$user->who_will_be_training || !$user->disciplines_in_martial_arts || !$user->stretching_flexibility_spiritual_meditative_arts || !$user->health_and_wellness_guidance || !$user->all_fitness_including)
            {
                Session::put("call_from","make_a_referral");
                return Redirect::route('student.register.step.two');
            }

            if(!$user->age_group || !$user->gender || !$user->fitness || !$user->preferred_language)
            {
                Session::put("call_from","make_a_referral");
                return Redirect::route('student.register.step.three');
            }

            if(!$user->instructor_gender || !$user->preferred_training_style)
            {
                Session::put("call_from","make_a_referral");
                return Redirect::to('step-four');
            }

            Session::pull("call_from");
            return view('emailForm');
        }
        else
        {
            Session::put("call_from","make_a_referral");
            return redirect('login');
        }
    }
    
    public function sendReferralEmail(Request $request)
    {
       // echo count($request->emails);die;
        $emails = explode(",",$request->emails);
      
        $user = User::where('id',Auth::id())->first();

        $template = SendgridTemplate::where('id',32)->first();

        $template_id = "d-".$template->template_id;

        if(!empty($emails))
        {
            foreach($emails as $e)
            {
                $referral_email = trim($e);

                if (filter_var($referral_email, FILTER_VALIDATE_EMAIL)) {
                
                    $email = new \SendGrid\Mail\Mail();

                    $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                    $email->setSubject('Try MartialArtsZen.com using this referral');
                    $email->addTo($referral_email);
                    $email->addContent("text/html","Join me and improve your skills in various disciplines");
                    $email->addDynamicTemplateDatas([
                        "actionUrl"=>route('referral_register',['type' => "free",'utm_source'=>"arnoldseed",'utm_medium'=>"email",'utm_campaign'=>"referral",'utm_referral_code'=>$user->referal_code])
                        ]);
                    $email->setTemplateId($template_id);

                    $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                    try{
                        $response = $sendgrid->send($email);
                    }
                    catch(Exception $e)
                    {
                        echo "Caught Exception:".$e->getMessage()."\n";
                    }
                }  
                else
                {
                    return Redirect::back()->with('error', "Please enter valid email");
                }  
            }

            // Update refettal email sent flag to send second notification
            $user = User::find(Auth::id());
            $user->referral_email_sent_by_existing_user =1;
            $user->save();

            return Redirect::back()->with('success', 'Referral Email Sent Successfully!');
        }
        else
        {
            return Redirect::back()->with('error', "Please enter friends or family members emails");
        }
        
        
    }

     /**
    * Author Ganesh
    * Created at :- 06-08-2022 
    * Update is first time user flag
    * Route : changeIsFirstTimeUserFlag
    * Method : post
    */
    public function changeIsFirstTimeUserFlag(Request $request)
    {
        // Update refettal email sent flag to send second notification
        $user = User::find(Auth::id());
        $user->is_first_time_user =2;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 10-08-2022 
    * Update anyone accepts referral flag
    * Route : changeAnyoneAcceptsReferralFlag
    * Method : post
    */
    public function changeAnyoneAcceptsReferralFlag(Request $request)
    {
        // Update refettal email sent flag to send second notification
        $user = User::find(Auth::id());
        $user->anyone_accepts_referral =0;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 24-08-2022 
    * Send Contact Us Query
    * Route : contactUsForm
    * Method : post
    */
    public function contactUsForm(Request $request)
    {
        $request->validate([
            'topic' => 'required',
            'email'=>'required|email',
            'message'=>'required'
        ]);

        if($request->topic == 1)
        {
            $topic = "Student Related Topic";
        }
        elseif($request->topic == 2)
        {
            $topic = "Instructor Related Topic";
        }
        else
        {
            $topic = "Other Topic";
        }

        $mailDetails = [
            'from'=>$request->email,
            'subject' => 'Contact Mail',
            'title' => '',
            'body' => $request->message,
            'topic' => $topic
        ];

        //contact@martialartszen.com
        \Mail::to('contact@martialartszen.com')->send(new \App\Mail\ContactMail($mailDetails));

        return back()->with('success', 'Thank you for contacting us. We will respond you as soon as possilble');      
    }

    /**
    * Author Ganesh
    * Created at :- 24-08-2022 
    * Send Contact Us Query
    * Route : contactUsForm
    * Method : post
    */
    public function contactUsForm1(Request $request)
    {
        $request->validate([
            'topic'=>'required',
            'email'=>'required|email',
            'message'=>'required'
        ]);

        if($request->topic == 1)
        {
            $topic = "Student Related Topic";
        }
        elseif($request->topic == 2)
        {
            $topic = "Instructor Related Topic";
        }
        else
        {
            $topic = "Other Topic";
        }

        $mailDetails = [
            'from'=>$request->email,
            'subject' => 'Contact Mail',
            'title' => '',
            'body' => $request->message,
            'topic' => $topic
        ];

        //contact@martialartszen.com
        
        \Mail::to('contact@martialartszen.com')->send(new \App\Mail\ContactMail($mailDetails));

        $response['message'] = "Thank you for contacting us. We will respond you as soon as possilble.";
        $response['status'] = true;
        
        return response()->json($response);
    }

    // public function getInstructorsOfCurrrentDiscipline(Request $request)
    // {
       
    //     $discipline_id = $request->disciplineSequence;

    //     $instructorData = $instructorFreeData = $instructorBronzeData = $instructorSilverData = $instructorGoldData = [];

    //     $instructorDisciplines = InstructorDiscipline::where('discipline_id',$discipline_id)->get();

    //     if($instructorDisciplines)
    //     {
    //         $courseCategoryData = CourseCategory::select('id', 'name')->get();

    //         foreach($instructorDisciplines as $i)
    //         {
    //             $instructorDBData = Instructor::where('is_approved', '=', 1)->where('id',$i->instructor_id)->first();

    //             if(!empty($instructorDBData))
    //             {
    //                 // Check Instructor Have Course Lession
    //                 if(InstructorCourseLession::where('instructor_id', '=', $instructorDBData->id)->count()) {
    //                     //array_push($instructorData, $i);
    //                     $instructorData[] = array(
    //                         'id'=>$instructorDBData->id,
    //                         'name'=>$instructorDBData->name,   
    //                         'photo'=>$instructorDBData->photo,
    //                     );
    //                     // Get Instructor Videos
    //                     foreach ($courseCategoryData as $ccData) {
    //                         if($ccData->id) {
    //                             // Get Instructor Free Video
    //                             if($ccData->name == 'Free') {
    //                                 $freeVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $instructorDBData->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
    //                                 if($freeVideoData) {
    //                                     $instructorFreeData[] = array(
    //                                         'video_id'=>$freeVideoData->video_id,
    //                                         'lession_thumbnail'=>$freeVideoData->lession_thumbnail,
    //                                         'title'=>$freeVideoData->title,
    //                                     );

    //                                     // array_push($instructorFreeData, $freeVideoData);
    //                                 }
    //                             }
    //                             // Get Instructor Bronze Video
    //                             if($ccData->name == 'Bronze') {
    //                                 $bronzeVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $instructorDBData->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
    //                                 if($bronzeVideoData) {
    //                                     $instructorBronzeData[] = array(
    //                                         'video_id'=>$bronzeVideoData->video_id,
    //                                         'lession_thumbnail'=>$bronzeVideoData->lession_thumbnail,
    //                                         'title'=>$bronzeVideoData->title,
    //                                     );
    //                                     // array_push($instructorBronzeData, $bronzeVideoData);
    //                                 }
    //                             }
    //                             // Get Instructor Silver Video
    //                             // if($ccData->name == 'Silver') {
    //                             //     $silverVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $i->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
    //                             //     if($silverVideoData) {
    //                             //         array_push($instructorSilverData, $silverVideoData);
    //                             //     }
    //                             // }
    //                             // Get Instructor Gold Video
    //                             // if($ccData->name == 'Gold') {
    //                             //     $goldVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $i->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
    //                             //     if($goldVideoData) {
    //                             //         array_push($instructorGoldData, $goldVideoData);
    //                             //     }
    //                             // }
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }

    //     $data['instructorData'] = $instructorData;
    //     $data['instructorFreeData'] = $instructorFreeData;
    //     $data['instructorBronzeData'] = $instructorBronzeData;
    //     // echo "<pre>";
    //     // print_r($data['instructorFreeData']);die;
    //     return json_encode($data);
    // }  

    public function getInstructorsOfCurrrentDiscipline(Request $request)
    {   
        $discipline_id = $request->disciplineSequence;

        $currentDiscipline = Discipline::select('title', 'description', 'photo','desktop_sequence','main_coming_soon_image', 'video_coming_soon_image')->where('id',$discipline_id)->first();

        $levels = $instructorData = $instructorFreeData = $instructorRecommendedData =$instructorBronzeData = $instructorSilverData = $instructorGoldData = [];

        $instructorDisciplines = InstructorDiscipline::where('discipline_id',$discipline_id)->get();

        $courseCategoryData = CourseCategory::select('id', 'name')->get();

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
                        if(InstructorVideos::where('instructor_id', '=', $instructorDBData->id)->where('discipline_id', $discipline_id)->count()) {
                          
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
                                    'video_duration'=>Carbon::parse($video['video_duration'])->format('i:s'),
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
                                    'video_duration'=>Carbon::parse($videos['video_duration'])->format('i:s'),
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
                            
                        //     $instructorRecommendedData[] = array(
                        //         'video_id'=>$recommended_video['video_id'],
                        //         'video_thumbnail'=>$recommended_video['video_thumbnail'],
                        //         'title'=>$recommended_video['title'],
                        //         'video_level'=>$recommended_video['main_course_category_id'],
                        //         'instructor_name'=>isset($instructorDetails1->name) ? $instructorDetails1->name : '',
                        //         'video_duration'=>Carbon::parse($recommended_video['video_duration'])->format('i:s')
                        //     );
                    
                        // }
                        // else
                        // {
                        //     $instructorRecommendedData[] = array(
                        //         'video_id'=>'',
                        //         'video_thumbnail'=>'',
                        //         'title'=>'',
                        //         'video_level'=>'',
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

        // if($instructorDisciplines)
        // {
        //     $courseCategoryData = CourseCategory::select('id', 'name')->get();

        //     foreach($instructorDisciplines as $i)
        //     {
        //         $instructorDBData = Instructor::where('is_approved', '=', 1)->where('id',$i->instructor_id)->first();

        //         if(!empty($instructorDBData))
        //         {
        //             // Check Instructor Have Course Lession
        //             if(InstructorCourseLession::where('instructor_id', '=', $instructorDBData->id)->count()) {
        //                 //array_push($instructorData, $i);
        //                 $instructorData[] = array(
        //                     'id'=>$instructorDBData->id,
        //                     'name'=>$instructorDBData->name,   
        //                     'photo'=>$instructorDBData->photo,
        //                 );
        //                 // Get Instructor Videos
        //                 foreach ($courseCategoryData as $ccData) {
        //                     if($ccData->id) {
        //                         // Get Instructor Free Video
        //                         if($ccData->name == 'Free') {
        //                             $freeVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $instructorDBData->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
        //                             if($freeVideoData) {
        //                                 $instructorFreeData[] = array(
        //                                     'video_id'=>$freeVideoData->video_id,
        //                                     'lession_thumbnail'=>$freeVideoData->lession_thumbnail,
        //                                     'title'=>$freeVideoData->title,
        //                                 );

        //                                 // array_push($instructorFreeData, $freeVideoData);
        //                             }
        //                         }
        //                         // Get Instructor Bronze Video
        //                         if($ccData->name == 'Bronze') {
        //                             $bronzeVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $instructorDBData->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
        //                             if($bronzeVideoData) {
        //                                 $instructorBronzeData[] = array(
        //                                     'video_id'=>$bronzeVideoData->video_id,
        //                                     'lession_thumbnail'=>$bronzeVideoData->lession_thumbnail,
        //                                     'title'=>$bronzeVideoData->title,
        //                                 );
        //                                 // array_push($instructorBronzeData, $bronzeVideoData);
        //                             }
        //                         }
        //                         // Get Instructor Silver Video
        //                         // if($ccData->name == 'Silver') {
        //                         //     $silverVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $i->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
        //                         //     if($silverVideoData) {
        //                         //         array_push($instructorSilverData, $silverVideoData);
        //                         //     }
        //                         // }
        //                         // Get Instructor Gold Video
        //                         // if($ccData->name == 'Gold') {
        //                         //     $goldVideoData = InstructorCourseLession::leftJoin('instructor_courses', 'instructor_courses.instructor_id', '=', 'instructor_course_lessions.instructor_id')->select('instructor_course_lessions.*')->where('instructor_course_lessions.instructor_id', '=', $i->id)->where('instructor_courses.course_category_id', '=', $ccData->id)->first();
        //                         //     if($goldVideoData) {
        //                         //         array_push($instructorGoldData, $goldVideoData);
        //                         //     }
        //                         // }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }

        $data['instructorData'] = $instructorData;
        $data['instructorRecommendedData'] = $instructorRecommendedData;
        $data['levels'] = $levels;
        $data['currentDiscipline'] = $currentDiscipline;
       // $data['instructorBronzeData'] = $instructorBronzeData;
        // echo "<pre>";
        // print_r($data['instructorFreeData']);die;
        return json_encode($data);
    }  

    public function playInstructorVideo(Request $request)
    {
        if($request->call == "Recommended")
        {
            $instructorVideoId = $request->video_id;

            $instructorLessionData = InstructorRecommendedVideos::where('video_id',$instructorVideoId)->first();
    
            $instructorData = Instructor::where('id',$instructorLessionData->instructor_id)->first();
    
            $instructorName = $instructorLessionData->title;

            return view('playInstructorVideo',compact('instructorVideoId','instructorName'));
        }

        if($request->call == "Teaching")
        {
            $instructorVideoId = $request->video_id;

            $instructorLessionData = InstructorVideos::where('video_id',$instructorVideoId)->first();
    
            $instructorData = Instructor::where('id',$instructorLessionData->instructor_id)->first();
    
            $instructorName = $instructorLessionData->title;

            return view('playInstructorVideo',compact('instructorVideoId','instructorName'));
        }

        $instructorVideoId = $request->video_id;

        $instructorLessionData = InstructorVideos::where('video_id',$instructorVideoId)->first();

        $instructorData = Instructor::where('id',$instructorLessionData->instructor_id)->first();

        $instructorName = $instructorLessionData->title;

        $relatedVideos = InstructorVideos::where('main_course_category_id',$instructorLessionData->main_course_category_id)->where('instructor_id',$instructorLessionData->instructor_id)->get();

        return view('playInstructorVideo',compact('instructorVideoId','instructorName','relatedVideos','instructorLessionData'));
    }


    /** Author:kalyani 
    * Cancel plan functionality
    * Created at :- 2022-29-09 
    */
 
    public function plan_cancel(Request $request)
    {
        $plan_id=$request->plan_id;
        $user_id=$request->user_id;

        $cust_id=$request->cust_id;
        $stripe_plan_id=$request->stripe_plan_id;

        //get email of user 
        $email_data=User::find($user_id);
        $email= $email_data->email;
        
        $planData=SubscriptionPlan::find($plan_id);
        $plan_name= $planData->plan_name;

        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys


        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET')); 
        
        if($email_data->plan_subscription_id != '')
        {
            $cancel_sub=\Stripe\Subscription::retrieve($email_data->plan_subscription_id);
            $cancel_sub->cancel();

            if($cancel_sub->status == "canceled")
            {
                $data_entry = StudentSubscription::where('student_id',$user_id)->where('plan_subscription_id',$email_data->plan_subscription_id);
                $date=date('Y-m-d');
                $query=$data_entry->update(['status'=>'cancelled','canceled_at'=>$date]);

                $template = SendgridTemplate::where('id',21)->first();

                $template_name=$template->template_name;
                $template_id="d-".$template->template_id;
                $email_data_format=new \SendGrid\Mail\Mail();
                $email_data_format->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email_data_format->setSubject('Try MartialArtsZen.com using this referral');
                $email_data_format->addTo($email);
                $email_data_format->addContent("text/html","Join me and improve your skills in various disciplines");
                $email_data_format->addDynamicTemplateDatas([
                    "first_name"=>$email_data->name,
                    "default"=>"Valued customer",
                    //"verifyUrl"=>route('student.login')
                    ]);
                $email_data_format->setTemplateId($template_id);
                //print_r($email_data_format);
        
                $email_send= new \SendGrid(env('MAIL_PASSWORD'));
        
                try{
                    $check=$email_send->send($email_data_format);
                    
                }
                catch(Exception $e)
                {
                    return $e->getMessage();
                }
            }
            else
            {  
                return response()->json(['msg'=>"Something Went Wrong","status"=>0]);
            }
           
            return response()->json(['msg'=>"$plan_name Plan Cancelled Successfully","status"=>1]);
        }
        else
        {
            return response()->json(['msg'=>"Subscription Plan Not Found","status"=>0]);
        }
    }

    public function getBronzePlanForm(Request $request)
    {   
        Session::pull("sendUpgradeConfirmEmail");

        if($request->sendUpgradeConfirmEmail)
        {
            Session::pull("sendUpgradeConfirmEmail");
            Session::put("sendUpgradeConfirmEmail",$request->sendUpgradeConfirmEmail);

            $sendUpgradeConfirmEmail = $request->sendUpgradeConfirmEmail;
        }
        else
        {
            Session::pull("sendUpgradeConfirmEmail");
            Session::put("sendUpgradeConfirmEmail",0);
        }

        if(Auth::user())
        {
            $user = User::where('id',Auth::id())->first();

            if($user->subscription_id == 1)
            {
                if($request->sendUpgradeConfirmEmail)
                {
                    Session::pull("lastPage");
                    Session::put("lastPage","student_profile");
                }
                else
                {
                    Session::pull("lastPage");
                    Session::put("lastPage","disciplines/2");
                }

                $planDetails = SubscriptionPlan::where('id',2)->first();

                $planBenefits = explode(",",$planDetails->benefits);

                $benefits = array();
    
                if(!empty($planBenefits))
                {
                    foreach($planBenefits as $benefit)
                    {
                        $benefitTitle = SubscriptionBenefit::where('id',$benefit)->first();
    
                        if($benefitTitle)
                        {
                            $benefits[] = $benefitTitle->benefit;
                        }
                    
                    }
                }
                $ifPaymentFail = 0; 

                return view('bronzePlanStripe',compact('planDetails','benefits','ifPaymentFail'));
            }
            else
            {
                return Redirect::route("disciplines",['id'=>2]);
            } 
        }
        else
        {

            Session::put("call_from","bronzePlanForm");
            return redirect('login');
        }    
    }

    public function instructorBeltification()
    {
        return view('instructorBeltification');
    } 
    public function createNewBelt()
    {
        return view('createNewBelt');
    } 
    public function viewBeltDetails()
    {
        return view('viewBeltDetails');
    } 
    public function editBeltDetails()
    {
        return view('editBeltDetails');
    } 
    public function beltGradeDashboard()
    {
        return view('beltGradeDashboard');
    } 
    public function gradeBeltTest()
    {
        return view('gradeBeltTest');
    } 
    public function studentBeltification()
    {
        return view('studentBeltification');
    } 
    public function studentSubmitedTest()
    {
        return view('studentSubmitedTest');
    } 
    public function beltTestResult()
    {
        return view('beltTestResult');
    } 
    public function submitBeltTest()
    {
        return view('submitBeltTest');
    } 
    public function beltSearch()
    {
        return view('beltSearch');
    } 
    public function beltificationDashboard()
    {
        return view('beltificationDashboard');
    }
    
    public function changePlanPage()
    {
        $allPlans = SubscriptionPlan::where('status',1)->get();
        
        $benefits = SubscriptionBenefit::get();

        $user = User::where('id',Auth::id())->first();

        $firstPlan = SubscriptionPlan::where('id','=',$user->subscription_id)
        ->where('status','!=',0)
        ->first();  

        return view('changePlanPage',compact('allPlans','firstPlan','benefits'));
    }

    // public function verifyPromocode(Request $request)
    // {
    //     $promocode = $request->promocode;
    //     $currentPlanId = $request->currentPlanId;

    //     $planDetails = SubscriptionPlan::where('id',$currentPlanId)->first();

    //     $discount = 0.00;
    //     $total =  $planDetails->price;
        
    //     $promocodeDetails = Promocode::where('promocode',$request->promocode)->first();

    //     if(!$promocodeDetails) {
    //         return response()->json(['msg'=>"Invalid Promocode","status"=>0]);
    //     }
    //     else
    //     {
    //         if($promocodeDetails->price_type == 1)
    //         {
    //             $discount = number_format((float)$planDetails->price * $promocodeDetails->value/100, 2, '.', '');
    //             $total = $planDetails->price -  $discount;
    //             $total = number_format((float)$total, 2, '.', '');
    //         }
            
    //         if($promocodeDetails->price_type == 2)
    //         {
    //             $discount = $promocodeDetails->value;
    //             $total = $planDetails->price - $promocodeDetails->value;
    //             $total = number_format((float)$total, 2, '.', '');
    //         }

    //         return response()->json(['msg'=>"Contgratulations !! Promocode verified successfully","status"=>1,"discount"=>$discount,"total"=>$total]);
    //     }

    // }
    
    public function verifyPromocode(Request $request)
    {
        $promocode = $request->promocode;
        $currentPlanId = $request->currentPlanId;

        $planDetails = SubscriptionPlan::where('id',$currentPlanId)->first();

        $discount = 0.00;
        $total =  $planDetails->price;
        
        $promocodeDetails = Promocode::where('promocode',$request->promocode)->first();

        $stripe = new \Stripe\StripeClient(config("services.stripe.secret"));

        try {
            $coupon = $stripe->coupons->retrieve($promocode, []);

            if($coupon->valid) 
            {   
                if($coupon->percent_off)
                {
                    $discount = number_format((float)$planDetails->price * $coupon->percent_off/100, 2, '.', '');
                    $total = $planDetails->price -  $discount;
                    $total = number_format((float)$total, 2, '.', '');

                    return response()->json(['msg'=>"Contgratulations !! Promocode verified successfully","status"=>1,"discount"=>$discount,"total"=>$total]);
                }
                
                if($coupon->amount_off)
                {
                    $discount = $coupon->amount_off/100;
                    $total = $planDetails->price - $coupon->amount_off/100;
                    $total = number_format((float)$total, 2, '.', '');
                    return response()->json(['msg'=>"Contgratulations !! Promocode verified successfully","status"=>1,"discount"=>$discount,"total"=>$total]);
                }
            }
            else
            {
                return response()->json(['msg'=>"Invalid Promocode","status"=>0]);
            }
    
        } catch(\Exception $e) {
            return response()->json(['msg'=>"Invalid Promocode","status"=>0]);
        }
    }

    public function cancelUpgradePlan(Request $request)
    {
        $data = User::where('id',Auth::id())
        ->update(['subscription_id'=>1]);

        if($request->flag == 1)
        {
            StudentSubscription::insert(['student_id'=>Auth::id(),'subscription_id'=>1,'status'=>'succeeded','created_at'=>date("Y-m-d H:i:s")]);
        }
       
    }
}