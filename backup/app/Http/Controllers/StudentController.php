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
use App\Models\SubscriptionPlan;
use App\Models\SubscriptionBenefit;
use App\Models\StudentSubscription;
use App\Models\PaymentDetails;
use App\Models\LastPageVisit;
use Illuminate\Support\Facades\Config;
use DataTables;
use Stripe;

use App\Mail\ReferralMail;
use Mail, Hash, Auth, Storage, Session;
use Sichikawa\LaravelSendgridDriver\SendGrid;

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
                
                return Redirect::route('student_profile', Auth::id());
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
            'preferred_language' => implode(',', $request->preferred_language),
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

    /**
    * View Student Profile Page
    * Route Name : student_profile
    * Route : student_profile/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getStudentProfile($id)
    {
        $result = LastPageVisit::where('student_id',Auth::id())->first();
 
        if($result)
        {
            $user = LastPageVisit::where('student_id',Auth::id())->first();
            $user->last_page_visit = 'student_profile/'.Auth::id();
            $user->save();
        }
        else
        {
            
            $last_page = LastPageVisit::create(['student_id'=>Auth::id(),'last_page_visit'=>'student_profile/'.Auth::id()]);
            $last_page->save();
        }

        if($id) {
            $studentProfileData = User::where('id', '=', $id)->first();
            return view('front.students.student_profile', compact('studentProfileData'));
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
    public function getEditStudentProfile($id)
    {
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
    public function updateStudentProfile(Request $request, $id)
    {
        // Validate Update Student Profile Form Fields
        $this->validate($request, [
            'firstname' => ['required', 'max:100'],
            'lastname' => ['required', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:250', 'unique:users,email,'.$id],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:12'],
            'age_group' => ['required'],
            'gender' => ['required'],
            'profile_picture' => ['required', 'max:500', 'mimes:jpg,jpeg,png']
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
        
        $name_image = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $photo = $name_image.'.'.$img_ext;        
        $up_location = 'public/students/profile_pictures';
        $image->move($up_location,$photo);

        // Remove Old Profile Picture
        if(Storage::exists($student->profile_picture)) {
            Storage::delete($student->profile_picture);
        }
        // Get Inputs
        $input = $request->only(['firstname', 'lastname', 'email', 'phone', 'age_group', 'gender']);
        $input['name'] = $request->firstname.' '.$request->lastname;
        //$input['profile_picture'] = $profile_picture;
        $input['profile_picture'] = $photo;
        // Update Student In Database
        $editStudent = $student->update($input);
        if ($editStudent) {
            return redirect('student_profile/'.$id)->with("success", "Profile has been updated successfully");
        } else {
            return redirect('student_profile/'.$id)->with("error", "Sorry, Something went wrong please try again");
        }
    }

    /**
    * View Student Change Password Page
    * Route Name : student_changepassword
    * Route : student_changepassword/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getStudentChangePassword($id)
    {
        $resultLastPage = LastPageVisit::where('student_id',Auth::id())->first();
 
        if($resultLastPage)
        {
            $user = LastPageVisit::where('student_id',Auth::id())->first();
            $user->last_page_visit = 'student_changepassword/'.Auth::id();
            $user->save();
        }
        else
        {
            
            $last_page = LastPageVisit::create(['student_id'=>Auth::id(),'last_page_visit'=>'student_changepassword/'.Auth::id()]);
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
    public function updateStudentChangePassword(Request $request, $id)
    {
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

        $couponId = '';
        if(isset($request->promocode) && $request->promocode != '') {
            $couponId = Config::get('plans.coupons.'.$request->promocode);
            if(!$couponId) {
                return redirect()->back()->with('error', 'Promo code does not exists');
            }
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
    public function getStudentSubscription($id)
    {
        $result = LastPageVisit::where('student_id',Auth::id())->first();
 
        if($result)
        {
            $user = LastPageVisit::where('student_id',Auth::id())->first();
            $user->last_page_visit = 'student_subscription_manage/'.Auth::id();
            $user->save();
        }
        else
        {
            
            $last_page = LastPageVisit::create(['student_id'=>Auth::id(),'last_page_visit'=>'student_subscription_manage/'.Auth::id()]);
            $last_page->save();
        }

        if($id) {
            $studentProfileData = User::where('id', '=', $id)->first();

            $subscriptionData = array();
            $newPlans = array();
            $oldPlanBenfits = "";
            $studentPlanBenefits = "";

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

                    $oldPlanBenfits = implode(",", $oldbenefits);
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

            return view('front.students.student_subscription', compact('studentProfileData','subscriptionData','oldPlanBenfits','allBenefits','studentPlanBenefits','newPlans'));
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
                    ->select('student_subscriptions.created_at AS created_at','subscription_plans.plan_name','subscription_plans.price')
                    ->join('subscription_plans', 'subscription_plans.id', '=', 'student_subscriptions.subscription_id')
                    ->orderBy('student_subscriptions.created_at','DESC')
                    ->get();
            
            $result = array();

            if(!empty($data))
            {
                $i = 1;
                foreach($data as $d)
                {
                    $result[] = array(
                        'id'=>$i,
                        'date'=>date("Y-m-d",strtotime($d->created_at)),
                        'plan_name'=>$d->plan_name,
                        'price'=>" $ ".$d->price,
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
            // Validate Register Step One Form Data
            // $request->validate([
            //     'plan' => ['required'],
            //     'price' => ['required'],
            //     'interval' => ['required'],
            //     'currency' => ['required'],
            //     'stripeToken' => ['required'],
            // ]);

            // $user = User::find(Auth::id());

            // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            // $result = Stripe\Charge::create ([
            //         "amount" => $request->price * 100,
            //         "currency" => "usd",
            //         "source" => $request->stripeToken,
            //         "description" => "$1 Bronze Plan Accepted" 
            // ]);

            // if($result->status == "succeeded")
            // {
                // Store Step One Data In Databas
                $student = new StudentSubscription;
                $student->student_id = Auth::id();
                $student->subscription_id = 1;
                $student->save();
                
                $user =  User::where('id',Auth::id())->first();

                $template_id = "d-c6cc7926ca8b42c590f2e46cce0837f3" ;

                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user->email);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                    "first_name"=>$user->firstname,
                    "default"=>"Valued customer",
                    "verifyUrl"=>route('student.login')
                    ]);
                $email->setTemplateId($template_id);
                
                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
    
                try{
                    $response = $sendgrid->send($email);
                    print $response->statusCode(). "\n";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }
           
                Session::put('is_accepted_bronze_plan',1);
                //User::where('id', '=', Auth::id())->update(['accept_bronze_plan' => 1,'subscription_id'=>1,'credit_card_number'=>$result->payment_method_details->card->last4,'credit_card_expiry_date'=>$result->payment_method_details->card->exp_month."/".$result->payment_method_details->card->exp_year,'credit_card_type'=>$result->payment_method_details->card->brand]);
                User::where('id', '=', Auth::id())->update(['accept_bronze_plan' => 1,'subscription_id'=>1]);
                Session::flash('success', 'Thanks! You are now subscribed to our future Bronze plan');

                return Redirect::route('student_subscription_manage',Auth::id());
            // }
            // else
            // {   
            //     return Redirect::back()->with("error", "Sorry, Something went wrong please try again");;
            // }
    
            
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
        $emails = explode(",",$request->emails);

        $user = User::where('id',Auth::id())->first();

        $template_id = "d-e952f4e4768b44b598152dc4cc933887" ;

        if(!empty($emails))
        {
            foreach($emails as $e)
            {
                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($e);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                    "referral_url"=>route('referral_register',['type' => "free",'utm_source'=>"arnoldseed",'utm_medium'=>"email",'utm_campaign'=>"referral",'utm_referral_code'=>$user->referal_code])
                    ]);
                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);
                    print $response->statusCode(). "\n";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }
            }

            // Update refettal email sent flag to send second notification
            $user = User::find(Auth::id());
            $user->referral_email_sent_by_existing_user =1;
            $user->save();

            return Redirect::back()->with('success', 'Referral Email Send Successfully!');
        }
        else
        {
            return Redirect::back()->with('error', "Please enter friend's or family member's email's");
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
}