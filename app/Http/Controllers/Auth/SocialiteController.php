<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\StudentSubscription;
use App\Models\SendgridTemplate;
use App\Models\login_deatils;
use Illuminate\Support\Facades\Redirect;
use Sichikawa\LaravelSendgridDriver\SendGrid;
use Mail, Session;

class SocialiteController extends Controller
{
    use SendGrid;

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function redirectToGoogle(Request $request)
    {
        if($request->userRole != '') {
           

            Session::forget('googleUserRole');
            Session::put('googleUserRole', $request->userRole);
            Session::put('referralCode', $request->referral_code);
            Session::put('selectedPlan', $request->selectedPlan);

            // Check User Request
            $socialUserRequest = 'normal';
            if(isset($request->type)) {
                Session::put('socialUserRequest', $request->type);
            } else {
                Session::put('socialUserRequest', $socialUserRequest);
            }
            return Socialite::driver('google')->redirect();
        } else {
            return Redirect::back()->with('error', 'Ooops! Something went wrong...');
        }
    }

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function handleGoogleCallback()
    {
        $referralCode = Session::get('referralCode');
        Session::forget('referralCode');
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Student Login With Google
        $googleUserRole = Session::get('googleUserRole');
        if($googleUserRole == 'student') {
            $user = User::where('email', $googleUser->email)->first();
            if (!$user) {
                $nameData = explode(' ', $googleUser->name, 2);
                $user = User::create([
                    'name' => $googleUser->name,
                    'firstname' => isset($nameData[0]) ? $nameData[0] : '',
                    'lastname' => isset($nameData[1]) ? $nameData[1] : '',
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'request_type' => Session::get('socialUserRequest'),
                ]);

              
                // Verify Student
                if($user->markEmailAsVerified()) {
                    // Check User Have Free Plan
                    if(Session::get('socialUserRequest') == 'softRegister' || Session::get('socialUserRequest') == 'free') {

                        $is_accept_bronze_plan = NULL;
                        $count = 0;
                        $referred_by = NULL;

                        if($referralCode)
                        {
                            $referral_user = User::where('referal_code',$referralCode)->first();

                            $count = $referral_user->referral_redeemed_count + 1;

                            $referral_user->referral_redeemed_count = $count;
                            $referral_user->anyone_accepts_referral = 1;
                            $referral_user->save();

                            $referred_by = $referral_user->id;

                            $is_accept_bronze_plan = 1;

                            // send email to referral for someone is accepting his referral 

                            $template = SendgridTemplate::where('id',16)->first();

                            $template_id = "d-".$template->template_id;    

                            $email = new \SendGrid\Mail\Mail();
                        
                            $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                            $email->setSubject('Try MartialArtsZen.com using this referral');
                            $email->addTo($referral_user->email);
                            $email->addContent("text/html","Join me and improve your skills in various disciplines");
                            $email->addDynamicTemplateDatas([
                                "first_name"=>$referral_user->firstname,
                                "default"=>"Valued customer",
                                "redeemReferral"=>route('student_profile',['id'=>$referral_user->id])
                                ]);
                            $email->setTemplateId($template_id);
                            
                            $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                            
                            $sendgrid->send($email);


                                
                        } 

                        $updateFreePlanData = [
                            'plan_amount' => 0,
                            'plan_amount_currency' => 'USD',
                            'plan_interval' => 'month',
                            'status' => 'active',
                            'is_first_time_user'=>1,
                            'free_site_user'=>1,
                            'referal_code'=>rand(1000,9999),
                            'accept_bronze_plan'=>$is_accept_bronze_plan,
                            'refered_by'=>$referred_by,
                            // 'subscription_id'=>isset($referralCode) ? 2 : 1
                            'subscription_id'=>Session::get('selectedPlan'),
                            'payment_status'=>0
                        ];

                        User::where('id', '=', $user->id)->update($updateFreePlanData);

                        $student = new StudentSubscription;
                        $student->student_id = $user->id;
                        $student->subscription_id = isset($referralCode) ? 2 : 1;
                        $student->save();
                    }

                    // $mailDetails = [
                    //     'subject' => 'Welcome to MartialArtsZen.com',
                    //     'title' => $user->name,
                    //     'body' => ''
                    // ];
                    // \Mail::to($user->email)->send(new \App\Mail\InstructorMail($mailDetails));

                    $template = SendgridTemplate::where('id',23)->first();

                    $template_id = "d-".$template->template_id; 

                    $email = new \SendGrid\Mail\Mail();
                
                    $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                    $email->setSubject('Try MartialArtsZen.com using this referral');
                    $email->addTo($user->email);
                    $email->addContent("text/html","Join me and improve your skills in various disciplines");
                    $email->addDynamicTemplateDatas([
                        "first_name"=>$user->firstname,
                        "default"=>"Valued customer",
                        "actionUrl"=>route('softRegister')
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
                    // Register User In Stripe
                    authStripe($user);
                }
            } else {

                // Check User Has Block
                if($user->is_block) {
                    return redirect('login')->with("error", "Your account has been blocked by admin so please contact admin");
                }

                $user->update([
                    'google_id' => $googleUser->id
                ]);
            }

            Auth::login($user);
            
            // To maintain login history
            $check_user = login_deatils::where('student_id',Auth::id())->get();
        
            if($check_user->count() > 0)
            {
                $update_data=login_deatils::where('student_id',Auth::id());
                $update_data->update([
                    "login_date"=>date('Y-m-d'),
                    "email_send_date"=>NULL,
                    "email_reminder_flag"=>0

                ]);     
            }
            else
            {
                $data_save=new login_deatils();
                $data_save->student_id=Auth::id();
                $data_save->login_date=date('Y-m-d');
                $save_success=$data_save->save();
            }

            
            //return redirect('dashboard')->with("success", "Welcome to ".$user->name." dashboard");

            return redirect::route('student_profile');
            
        // Instructor Login With Google
        } else if($googleUserRole == 'instructor') {

            $instructor = Instructor::where('email', $googleUser->email)->first();
            if (!$instructor) {

                $nameData = explode(' ', $googleUser->name, 2);
                $instructor = Instructor::create([
                    'name' => $googleUser->name,
                    'firstname' => isset($nameData[0]) ? $nameData[0] : '',
                    'lastname' => isset($nameData[1]) ? $nameData[1] : '',
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                ]);

                return redirect('instructor_edit/'.$instructor->id);

            } else {

                $instructor->update([
                    'google_id' => $googleUser->id
                ]);

                Auth::guard('instructor')->login($instructor);
                return redirect('instructor_dashboard')->with("success", "Welcome to ".$instructor->name." dashboard");

                // if($instructor->is_approved) {
                //     Auth::guard('instructor')->login($instructor);
                //     return redirect('instructor_dashboard')->with("success", "Welcome to ".$instructor->name." dashboard");
                // }

                // return redirect('instructor_login')->with("error", "You must be approved to login.");
            }
        }
    }

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function redirectToFacebook(Request $request)
    {   
        if($request->userRole != '') {
            Session::forget('facebookUserRole');
            Session::put('facebookUserRole', $request->userRole);
            Session::put('referralCode', $request->referral_code);
            Session::put('selectedPlan', $request->selectedPlan);
            // Check User Request
            $socialUserRequest = 'normal';
            if(isset($request->type)) {
                Session::put('socialUserRequest', $request->type);
            } else {
                Session::put('socialUserRequest', $socialUserRequest);
            }
            return Socialite::driver('facebook')->redirect();
        } else {
            return Redirect::back()->with('error', 'Ooops! Something went wrong...');
        }
    }

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function handleFacebookCallback(Request $request)
    {
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }

        $facebookUser = Socialite::driver('facebook')->stateless()->user();

        if($facebookUser->getEmail()) {
            // Student Login With Facebook
            $facebookUserRole = Session::get('facebookUserRole');

            $referralCode = Session::get('referralCode');
            Session::forget('referralCode');

            if($facebookUserRole == 'student') {
                $user = User::where('email', $facebookUser->getEmail())->first();
                if (!$user) {
                    $nameData = explode(' ', $facebookUser->getName(), 2);
                    $user = User::create([
                        'name' => $facebookUser->getName(),
                        'firstname' => isset($nameData[0]) ? $nameData[0] : '',
                        'lastname' => isset($nameData[1]) ? $nameData[1] : '',
                        'email' => $facebookUser->getEmail(),
                        'facebook_id' => $facebookUser->getId(),
                        'request_type' => Session::get('socialUserRequest'),
                    ]);
                    // Verify Student
                    if($user->markEmailAsVerified()) {
                        // Check User Have Free Plan
                        if(Session::get('socialUserRequest') == 'free') {

                            $is_accept_bronze_plan = NULL;
                            $count = 0;
                            $referred_by = NULL;

                            if($referralCode)
                            {
                                $referral_user = User::where('referal_code',$referralCode)->first();

                                $count = $referral_user->referral_redeemed_count + 1;

                                $referral_user->referral_redeemed_count = $count;
                                $referral_user->anyone_accepts_referral = 1;
                                $referral_user->save();

                                $referred_by = $referral_user->id;

                                $is_accept_bronze_plan = 1;

                                // send email to referral for someone is accepting his referral 

                                $template = SendgridTemplate::where('id',16)->first();

                                $template_id = "d-".$template->template_id;   

                                $email = new \SendGrid\Mail\Mail();
                            
                                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                                $email->setSubject('Try MartialArtsZen.com using this referral');
                                $email->addTo($referral_user->email);
                                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                                $email->addDynamicTemplateDatas([
                                    "first_name"=>$referral_user->firstname,
                                    "default"=>"Valued customer",
                                    "redeemReferral"=>route('student_profile',['id'=>$referral_user->id])
                                    ]);
                                $email->setTemplateId($template_id);
                                
                                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                                
                                $sendgrid->send($email);
                            }

                            $updateFreePlanData = [
                                'plan_amount' => 0,
                                'plan_amount_currency' => 'USD',
                                'plan_interval' => 'month',
                                'status' => 'active',
                                'is_first_time_user'=>1,
                                'free_site_user'=>1,
                                'referal_code'=>rand(1000,9999),
                                'accept_bronze_plan'=>$is_accept_bronze_plan,
                                'refered_by'=>$referred_by,
                                // 'subscription_id'=>isset($referralCode) ? 2 : 1
                                'subscription_id'=>Session::get('selectedPlan'),
                                'payment_status'=>0
                            ];

                            User::where('id', '=', $user->id)->update($updateFreePlanData);
                            
                            $student = new StudentSubscription;
                            $student->student_id = $user->id;
                            $student->subscription_id = isset($referralCode) ? 2 : 1;
                            $student->save();
                        }
                        // Send Welcome Mail
                        // $mailDetails = [
                        //     'subject' => 'Welcome to MartialArtsZen.com',
                        //     'title' => $user->name,
                        //     'body' => ''
                        // ];
                        //\Mail::to($user->email)->send(new \App\Mail\InstructorMail($mailDetails));
                        $template = SendgridTemplate::where('id',23)->first();

                        $template_id = "d-".$template->template_id; 

                        $email = new \SendGrid\Mail\Mail();
                    
                        $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                        $email->setSubject('Try MartialArtsZen.com using this referral');
                        $email->addTo($user->email);
                        $email->addContent("text/html","Join me and improve your skills in various disciplines");
                        $email->addDynamicTemplateDatas([
                            "first_name"=>$user->firstname,
                            "default"=>"Valued customer",
                            "actionUrl"=>route('softRegister')
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
                        // Register User In Stripe
                        authStripe($user);
                    }
                } else {
                    // Check User Has Block
                    if($user->is_block) {
                        return redirect('login')->with("error", "Your account has been blocked by admin so please contact admin");
                    }

                    $user->update([
                        'facebook_id' => $facebookUser->getId()
                    ]);
                }

                Auth::login($user);

                 // To maintain login history
            $check_user = login_deatils::where('student_id',Auth::id())->get();
        
            if($check_user->count() > 0)
            {
                $update_data=login_deatils::where('student_id',Auth::id());
                $update_data->update([
                    "login_date"=>date('Y-m-d'),
                    "email_send_date"=>NULL,
                    "email_reminder_flag"=>0

                ]);     
            }
            else
            {
                $data_save=new login_deatils();
                $data_save->student_id=Auth::id();
                $data_save->login_date=date('Y-m-d');
                $save_success=$data_save->save();
            }

                return redirect('/dashboard');

            // Instructor Login With Facebook
            } else if($facebookUserRole == 'instructor') {
                $instructor = Instructor::where('email', $facebookUser->getEmail())->first();
                if (!$instructor) {

                    $nameData = explode(' ', $facebookUser->getName(), 2);
                    $instructor = Instructor::create([
                        'name' => $facebookUser->getName(),
                        'firstname' => isset($nameData[0]) ? $nameData[0] : '',
                        'lastname' => isset($nameData[1]) ? $nameData[1] : '',
                        'email' => $facebookUser->getEmail(),
                        'facebook_id' => $facebookUser->getId(),
                    ]);

                    return redirect('instructor_edit/'.$instructor->id);

                } else {

                    $instructor->update([
                        'facebook_id' => $facebookUser->getId()
                    ]);

                    Auth::guard('instructor')->login($instructor);
                    return redirect('instructor_dashboard')->with("success", "Welcome to ".$instructor->name." dashboard");

                    // if($instructor->is_approved) {
                    //     Auth::guard('instructor')->login($instructor);
                    //     return redirect('/instructor_dashboard');
                    // }

                    // return redirect('instructor_login')->with("error", "You must be approved to login.");
                }
            }
        } else {
            return redirect('login')->with("error", "Your email does not set in facebook");
        }
    }
}