<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\SubscriptionBenefit;
use App\Models\SubscriptionPlan;
use App\Models\StudentSubscription;
use App\Models\LastPageVisit;
use App\Models\SendgridTemplate;
use App\Models\Promocode;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Sichikawa\LaravelSendgridDriver\SendGrid;

use Redirect, Config, Session;

class RegisteredUserController extends Controller
{
    use SendGrid;

    /**
    * View Student Register Page
    * Route Name : studentregister
    * Route : studentregister
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function create()
    {
        $registerType = 'normal';
        return view('auth.studentregister', compact('registerType'));
    }

    /**
    * Store Student Register Data
    * Route Name : studentregister
    * Route : studentregister
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:12'],
            // 'g-recaptcha-response' => 'required|recaptchav3:studentregister,0.5',
        ]);

        // registerStudent($request, 'normal');

        $name = $request->firstname.' '.$request->lastname;
        if($request->request_type == 'normal') {
            $user = User::create([
                'name' => $name,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'request_type' => $request->request_type,
            ]);
        } else {
            
            $is_accept_bronze_plan = NULL;
            $count = 0;
            $referred_by = NULL;
            $referral = '';

            if($request->referral_code)
            {
                //$referral = implode("",$request->referral_code);
                $referral = $request->referral_code;
            }
            
            if($referral)
            {
                $referral_user = User::where('referal_code',$referral)->first();

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

            $user = User::create([
                'name' => $name,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'plan_amount' => $request->price,
                'plan_amount_currency' => $request->currency,
                'plan_interval' => ($request->request_type == 'free') ? $request->interval : '',
                'is_subscribe' => $request->is_subscribe,
                'request_type' => $request->request_type,
                'subscription_id'=>$request->subscription_id,
                'payment_status'=>0,
                'is_first_time_user'=>1,
                'free_site_user'=>1,
                'refered_by'=>$referred_by,
                'referal_code'=>rand(1000,9999),
                'accept_bronze_plan'=>$is_accept_bronze_plan
            ]);
            
            if($user)
            {
                $verification_url = URL::temporarySignedRoute(
                    'verification.verify',
                    Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                    [
                        'id' => $user->getKey(),
                        'hash' => sha1($user->getEmailForVerification()),
                    ]
                );

                $template = SendgridTemplate::where('id',27)->first();

                $template_id = "d-".$template->template_id;   

                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user->email);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                    "first_name"=>$user->firstname,
                    "default"=>"Valued customer",
                    "actionUrl"=>$verification_url
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
            
            $user_id = $user->id;

            if($request->subscription_id == 1)
            {
                $student = new StudentSubscription;
                $student->student_id = $user_id;
                $student->subscription_id = $request->subscription_id;
                $student->save();
            }
        }

        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
    * View Free Register Landing Page
    * Route Name : free
    * Route : free
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function createFreeAccount(Request $request)
    {
        $referral_code = "";
        $subscribe_bronze = "";

        if(request()->utm_referral_code)
        {
            $referral_code = request()->utm_referral_code;

            $referral_user = User::where('referal_code',$referral_code)->first();

            //maximum 3 users can redeem the code
            // if($referral_user->referral_redeemed_count == 3)
            // {
            //     return abort(404, 'Page not found.');
            // }
        }

        if(request()->value)
        {
            $subscribe_bronze = request()->value;
        }
    
        $path = base_path().'/public';
        $pathToJson = $path . "/storage/instructorfreevidoes.json";
        $freeVideoJsonData = file_get_contents($pathToJson);
        $instructorFreeVideosData = json_decode($freeVideoJsonData, true);

        $instrutorVideoCount = 0;

        if(!empty($instructorFreeVideosData))
        {
            $instrutorVideoCount = count($instructorFreeVideosData);
        }
        
        $registerType = $request->type;
        Session::put('isLandingPage', 'free');
        if($registerType == 'free') {
            if($referral_code || $subscribe_bronze)
            {
              
                $firstPlan = SubscriptionPlan::where('id','=',2)
                                            ->where('status','!=',0)
                                            ->first();  
            }
            else
            {
                $firstPlan = SubscriptionPlan::where('id','=',1)
                                            ->where('status','!=',0)
                                            ->first();  
            }

            $benefits = SubscriptionBenefit::get();
            
           // $allPlans = SubscriptionPlan::where('validity_type','!=',4)->get(); 
           $allPlans = SubscriptionPlan::where('status',1)->get();; 
            // return view('auth.free');
            return view('auth.studentregister', compact('instrutorVideoCount','registerType','firstPlan','benefits','allPlans','referral_code'));
        } else {
            // $disciplineData = [];
            // $viewPage = 'free';
            // return view('welcome', compact('disciplineData', 'viewPage'));

            return Redirect::to('/');
        }
    }

    /**
    * Store Free Register Data
    * Route Name : free
    * Route : free
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function storeFreeAccount(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'plan' => ['required'],
            'price' => ['required'],
            'interval' => ['required'],
            'currency' => ['required'],
            // 'g-recaptcha-response' => 'required|recaptchav3:free,0.5',
        ]);

        registerStudent($request, 'free');

        return redirect(RouteServiceProvider::HOME);
    }

    /**
    * View 499 Register Landing Page
    * Route Name : register499
    * Route : register-499
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function create499Account(Request $request)
    {
        $registerType = $request->type;
        Session::put('isLandingPage', 'register499');
        if($registerType == 'register499') {
            // return view('auth.register-499');
            return view('auth.studentregister', compact('registerType'));
        } else {
            $disciplineData = [];
            $viewPage = 'register499';
    	    return view('welcome', compact('disciplineData', 'viewPage'));
        }
    }

    /**
    * Store 499 Register Data
    * Route Name : register499
    * Route : register-499
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function store499Account(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'promocode' => ['required', 'max:20'],
            'plan' => ['required'],
            'price' => ['required'],
            'interval' => ['required'],
            'currency' => ['required'],
            // 'g-recaptcha-response' => 'required|recaptchav3:register499,0.5',
        ]);

        registerStudent($request, 'register499');

        return redirect(RouteServiceProvider::HOME);
    }

    /**
    * View MAZ Free Register Landing Page
    * Route Name : maz
    * Route : maz
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function createMazFreeAccount(Request $request)
    {
        $registerType = $request->type;
        Session::put('isLandingPage', false);
        return view('auth.studentregister', compact('registerType'));
    }

    /**
    * View Register Landing Page
    * Route Name : register
    * Route : register
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function createRegisterAccount(Request $request)
    {
        // return Redirect::to('free?utm_campaign=arnold_fest_2022&utm_medium=flyers');
        $registerType = $request->type;
        Session::put('isLandingPage', 'register');
        if($registerType == 'register') {
            // return view('auth.register');
            return view('auth.studentregister', compact('registerType'));
        } else {
            $disciplineData = [];
            $viewPage = 'register';
    	    return view('welcome', compact('disciplineData', 'viewPage'));
        }
    }

    /**
    * Store Register Data
    * Route Name : register
    * Route : register
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function storeRegisterAccount(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'promocode' => ['required', 'max:20'],
            'plan' => ['required'],
            'price' => ['required'],
            'interval' => ['required'],
            'currency' => ['required'],
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5',
        ]);

        registerStudent($request, 'register');

        return redirect(RouteServiceProvider::HOME);
    }

    /**
    * View Register Step One Page
    * Route Name : step-one
    * Route : step-one
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getRegisterStepOne()
    {  
        $registerData = Auth::user();

        if($registerData['upgrade_plan'] == 1)
        {
            return Redirect::to('student_profile');
        }
        
        $planDetails = SubscriptionPlan::where('id',$registerData['subscription_id'])->first();

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

        if($registerData['subscription_id'] != '1' && $registerData['payment_status'] == '0') {
            return view('auth.step-one', compact('registerData','planDetails','benefits'));
        } else {
            return Redirect::to('step-two');
        }


        // if($registerData['request_type'] == 'free') {
        //     return Redirect::to('step-two');
        // } else {
        //     return view('auth.step-one', compact('registerData'));
        // }


        // if($registerData['request_type'] == 'normal') {
        //     return view('auth.step-one', compact('registerData'));
        // } elseif($registerData['request_type'] == 'register499') {
        //     return view('auth.plan-register499', compact('registerData'));
        // } elseif($registerData['request_type'] == 'register') {
        //     return view('auth.plan-register', compact('registerData'));
        // } else {
        //     return view('auth.step-one', compact('registerData'));
        // }
    }

    /**
    * Store Register Step One Data
    * Route Name : post-step-one
    * Route : post-step-one
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postRegisterStepOne(Request $request)
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
            $request->validate([
                'plan' => ['required'],
                'price' => ['required'],
                'interval' => ['required'],
                'currency' => ['required'],
                'stripeToken' => ['required'],
            ]);


            $couponId = '';
            // if($request->promocode != '') {
            //     $couponId = Config::get('plans.coupons.'.$request->promocode);
            //     if(!$couponId) {
            //         return redirect()->back()->with('error', 'Promo code does not exists');
            //     }
            // }
            

         
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
     
            $planId = SubscriptionPlan::where('id',$request->plan)->first();
   
            // Stripe Subscription
            $result = stripeSubscription($user, $request, $couponId, $planId);

            if($result != 'success') {
                return redirect()->back()->with('client_secret', $result);
            }

            // Entry to sutudent subscription history
            //     $student = new StudentSubscription;
            //     $student->student_id = Auth::id();
            //     $student->subscription_id = $request->plan;
            //    // $student->status = "Purchased";
            //     $student->save();

            // Send email for welcome to bronze

            // $template = SendgridTemplate::where('id',20)->first();

            // $template_id = "d-".$template->template_id;    

            // $email = new \SendGrid\Mail\Mail();
            
            // $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
            // $email->setSubject('Try MartialArtsZen.com using this referral');
            // $email->addTo($user->email);
            // $email->addContent("text/html","Join me and improve your skills in various disciplines");
            // $email->addDynamicTemplateDatas([
            //     "first_name"=>$user->firstname,
            //     "default"=>"Valued customer",
            //     "actionUrl"=>route('student_profile')
            //     ]);
            // $email->setTemplateId($template_id);
            
            // $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
            // $sendgrid->send($email);

             // Update Payment Status Flag
            $user->payment_status = 1;
            $user->save();

            // Flash Success Message
            Session::flash('success1', 'Your subscription has been completed successfully');

            $viewPaidVideoURL = Session::get('view_paid_video_url');
            if($viewPaidVideoURL) {
                Session::put('view_paid_video_url', null);
                return Redirect::to($viewPaidVideoURL);
            } else {
                return Redirect::to('step-two');
            }
        }
    }

    /**
    * Store Post Plan Register Data
    * Route Name : post-plan-register
    * Route : post-plan-register
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postPlanRegister(Request $request)
    {
        // Validate Register Step One Form Data
        $request->validate([
            'plan' => ['required'],
            'price' => ['required'],
            'interval' => ['required'],
            'currency' => ['required'],
            'stripeToken' => ['required'],
        ]);

        $couponId = '';
        if($request->promocode != '') {
            $couponId = Config::get('plan.coupons.'.$request->promocode);
            if(!$couponId) {
                return redirect()->back()->with('error', 'Promo code does not exists');
            }
        }

        // Get Logged In User Data
        $user = User::find(Auth::id());
        // Stripe Subscription
        $result = stripeSubscription($user, $request, $couponId);
        if($result != 'success') {
            return redirect()->back()->with('client_secret', $result);
        } else {
            // Flash Success Message
            Session::flash('success', 'Your subscription has been completed successfully');
        }
        return Redirect::to('step-two');
    }

    /**
    * View Register Step Two Page
    * Route Name : step-two
    * Route : step-two
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getRegisterStepTwo()
    {
        $registerData = Auth::user();
        Session::put('is_logged_in_user',1);
        Session::put('is_first_time_on_step_two',$registerData->first_time_on_third_step);
        // Check Registration Step Are Remaining
        // if($registerData) {
        //     $redirectTo = getRegistrationStep($registerData);
        //     if($redirectTo != 'step-two') {
        //         return redirect()->to($redirectTo);
        //     }
        // }
        return view('auth.step-two', compact('registerData'));
    }

    /**
    * Store Register Step Two Data
    * Route Name : post-step-two
    * Route : post-step-two
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postRegisterStepTwo(Request $request)
    {
        // Validate Register Step Two Form Data
        $request->validate([
            'who_will_be_training' => ['required'],
            'disciplines_in_martial_arts' => ['required'],
            'stretching_flexibility_spiritual_meditative_arts' => ['required'],
            'health_and_wellness_guidance' => ['required'],
            'all_fitness_including' => ['required'],
        ]);
        // Store Step Two Data In Database
        $user = User::find(Auth::id());
        $user->who_will_be_training = implode(',', $request->who_will_be_training);
        $user->disciplines_in_martial_arts = implode(',', $request->disciplines_in_martial_arts);
        $user->stretching_flexibility_spiritual_meditative_arts = implode(',', $request->stretching_flexibility_spiritual_meditative_arts);
        $user->health_and_wellness_guidance = implode(',', $request->health_and_wellness_guidance);
        $user->all_fitness_including = implode(',', $request->all_fitness_including);
        $user->save();
        return Redirect::to('step-three');
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Three Page
    * Route : who_will_be_training
    * Method : POST
    */

    public function whoWillBeTraining(Request $request)
    {
        // Update Step Three Data In Database
        $user = User::find(Auth::id());
        $user->who_will_be_training = !empty($request->arr) ? implode(',', $request->arr) : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Three Page
    * Route : disciplines_in_martial_arts
    * Method : POST
    */

    public function disciplinesInMartialArts(Request $request)
    {
        // Update Step Three Data In Database
        $user = User::find(Auth::id());
        $user->disciplines_in_martial_arts = !empty($request->arr) ? implode(',', $request->arr) : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Three Page
    * Route : stretching_flexibility_spiritual_meditative_arts
    * Method : POST
    */

    public function stretchingFlexibilitySpiritualMeditativeArts(Request $request)
    {
        // Update Step Three Data In Database
        $user = User::find(Auth::id());
        $user->stretching_flexibility_spiritual_meditative_arts = !empty($request->arr) ? implode(',', $request->arr) : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Three Page
    * Route : health_and_wellness_guidance
    * Method : POST
    */

    public function healthAndWellnessGuidance(Request $request)
    {
        // Update Step Three Data In Database
        $user = User::find(Auth::id());
        $user->health_and_wellness_guidance = !empty($request->arr) ? implode(',', $request->arr) : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Three Page
    * Route : all_fitness_including
    * Method : POST
    */

    public function allFitnessIncluding(Request $request)
    {
        // Update Step Three Data In Database
        $user = User::find(Auth::id());
        $user->all_fitness_including = !empty($request->arr) ? implode(',', $request->arr) : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Four Page
    * Route : age_group
    * Method : POST
    */

    public function ageGroup(Request $request)
    {
        // Update age group
        $user = User::find(Auth::id());
        $user->age_group = !empty($request->age) ? $request->age : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Four Page
    * Route : gender
    * Method : POST
    */
    
    public function gender(Request $request)
    {
        // Update gender
        $user = User::find(Auth::id());
        $user->gender = !empty($request->gender) ? $request->gender : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Four Page
    * Route : fitness
    * Method : POST
    */

    public function fitness(Request $request)
    {
        /// Update fitness level
        $user = User::find(Auth::id());
        $user->fitness = !empty($request->fitness) ? $request->fitness : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Four Page
    * Route : preferred_language
    * Method : POST
    */

    public function preferredLanguage(Request $request)
    {
        // Update preferred languages
        $user = User::find(Auth::id());
        $user->preferred_language = !empty($request->language) ? $request->language : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Five Page
    * Route : instructor_gender
    * Method : POST
    */

    public function instructorGender(Request $request)
    {
        // Update instructor gender on change radio button
        $user = User::find(Auth::id());
        $user->instructor_gender = !empty($request->gender) ? $request->gender : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Five Page
    * Route : preferred_training_style
    * Method : POST
    */

    public function preferredTrainingStyle(Request $request)
    {
        // Update preferred training style on change radio button
        $user = User::find(Auth::id());
        $user->preferred_training_style = !empty($request->style) ? $request->style : NULL;
        $user->save();
    }

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * View Register Step Five Page
    * Route : instructor_experience
    * Method : POST
    */

    public function instructorExperience(Request $request)
    {
        // Update instructor experience on slide
        $user = User::find(Auth::id());
        $user->instructor_experience = !empty($request->experience) ? $request->experience : NULL;
        $user->save();
    }

    /**
    * View Register Step Three Page
    * Route Name : step-three
    * Route : step-three
    * Method : GET
    * @return \Illuminate\View\View
    */

    public function getRegisterStepThree()
    {
        $registerData = Auth::user();
        
        Session::put('is_logged_in_user',1);
        Session::put('is_first_time_on_step_two',$registerData->first_time_on_fourth_step);

        // Check Registration Step Are Remaining
        // if($registerData) {
        //     $redirectTo = getRegistrationStep($registerData);
        //     if($redirectTo != 'step-three') {
        //         return redirect()->to($redirectTo);
        //     }
        // }
        return view('auth.step-three', compact('registerData'));
    }

    /**
    * Store Register Step Three Data
    * Route Name : post-step-three
    * Route : post-step-three
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postRegisterStepThree(Request $request)
    {
        // Validate Register Step Three Form Data
        $request->validate([
            'age_group' => ['required'],
            'gender' => ['required'],
            'fitness' => ['required'],
            'preferred_language' => ['required'],
        ]);
        // Store Step Three Data In Database
        $user = User::find(Auth::id());
        $user->age_group = $request->age_group;
        $user->gender = $request->gender;
        $user->fitness = $request->fitness;
        $user->preferred_language = $request->preferred_language;
        $user->save();
        return Redirect::to('step-four');
    }

    /**
    * View Register Step Four Page
    * Route Name : step-four
    * Route : step-four
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getRegisterStepFour()
    {
        $registerData = User::find(Auth::id());

        Session::put('is_logged_in_user',1);
        Session::put('is_first_time_on_step_two',$registerData->first_time_on_fifth_step);

        // Check Registration Step Are Remaining
        // if($registerData) {
        //     $redirectTo = getRegistrationStep($registerData);
        //     if($redirectTo != 'step-four') {
        //         return redirect()->to($redirectTo);
        //     }
        // }
        return view('auth.step-four', compact('registerData'));
    }

    /**
    * Store Register Step Four Data
    * Route Name : post-step-four
    * Route : post-step-four
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postRegisterStepFour(Request $request)
    {
        Session::pull('is_first_time_on_step_two');
        // Validate Register Step Four Form Data
        $request->validate([
            'instructor_gender' => ['required'],
            'preferred_training_style' => ['required'],
            'instructor_experience' => ['required']
        ]);
        // Store Step Four Data In Database
        $user = User::find(Auth::id());
        $user->instructor_gender = $request->instructor_gender;
        $user->preferred_training_style = $request->preferred_training_style;
        $user->instructor_experience = $request->instructor_experience;
        $user->save();
        // Login User
        // Auth::login($user);

        $last_page = LastPageVisit::where('student_id',Auth::id())->first();
        
        if($user->subscription_id == 1)
        {
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
                $sendgrid->send($email);
            }
            catch(Exception $e)
            {
                echo "Caught Exception:".$e->getMessage()."\n";
            }
        }

        if($user->subscription_id == 2 && $user->payment_status == 1)
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

        if($last_page)
        {
            if($last_page->last_page_visit  == "email_form")
            {
                return redirect($last_page->last_page_visit);
            } 
        }   

       // return redirect(RouteServiceProvider::HOME);

        return redirect::route('student_profile');
    }

    /**
    * Get Events Data From Stripe Webhooks
    * Route Name : stripe_events
    * Route : stripe_events
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function paymentStatus(Request $request)
    {
        // Set Stripe API Key
        \Stripe\Stripe::setApiKey(config("services.stripe.secret"));

        $endpoint_secret = config("services.stripe.endpoint");

        $payload = @file_get_contents('php://input');
        $event = null;
        $event = \Stripe\Event::constructFrom(
            json_decode($payload, true)
        );

        if ($endpoint_secret) {
            // Only verify the event if there is an endpoint secret defined
            // Otherwise use the basic decoded event
            $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
            $event = \Stripe\Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        }

        if($event) {
            // Handle the event
            switch ($event->type) {
                case 'invoice.payment_succeeded':
                    $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
                    if($paymentIntent->status == 'paid') {
                        if($paymentIntent->customer) {
                            $userData = User::select('id')->where('customer_id', '=', $paymentIntent->customer)->first();
                            if($userData) {
                                User::where('id', '=', $userData['id'])->update(array('status' => 'Active'));
                            }
                        }
                    }
                    break;

                case 'customer.subscription.updated':
                    $subscriptionUpdated = $event->data->object;
                    if($subscriptionUpdated->id) {
                        $userData = User::select('id')->where('subscription_id', '=', $subscriptionUpdated->id)->first();
                        if($userData) {
                            User::where('id', '=', $userData['id'])->update(array('status' => $subscriptionUpdated->status));
                        }
                    }
                    break;

                // Card Decline Section
                default:
                    // Unexpected event type
                    error_log('Received unknown event type');
            }
        }
        http_response_code(200);
    }
}