<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\LastPageVisit;
use App\Models\login_deatils;
use App\Models\SubscriptionPlan;
use App\Models\SendgridTemplate;
use Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
       // echo  Session::get('lastPage');die;
        if(request()->lastPage)
        {
            Session::pull("lastPage");
            
            Session::put('lastPage',request()->lastPage);
        }
        //print_r('yes');die();
       
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        
        // Check User Has Block
        if(Auth::user()->is_block) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('login')->with("error", "Your account has been blocked by admin so please contact admin");
        }

        if(Auth::user()->is_first_time_user == 1 && Auth::user()->free_site_user == 0)
        {
            $user = User::find(Auth::id());
            $user->first_time_login_date = date('Y-m-d');
            $user->save();
        }
        
        $user_data = User::find(Auth::id());
        $user_id = $user_data->id;
        
        // To maintain login history
        $check_user = login_deatils::where('student_id',$user_id)->get();
       
        if($check_user->count() > 0)
        {
            $update_data=login_deatils::where('student_id',$user_id);
            $update_data->update([
                "login_date"=>date('Y-m-d'),
                "email_send_date"=>NULL,
                "email_reminder_flag"=>0

            ]);     
        }
        else
        {
            $data_save=new login_deatils();
            $data_save->student_id=$user_id;
            $data_save->login_date=date('Y-m-d');
            $save_success=$data_save->save();
        }

        $request->session()->regenerate();

        // To set second time user flag
        $user = User::find(Auth::id());
        $user->is_first_time_user = 2;
        $user->save();

        $planDetails = SubscriptionPlan::where('id',$user->subscription_id)->first();

        if($planDetails)
        {
            Session::pull('planName');
            Session::put('planName',$planDetails->plan_name);
        }

        if(Session::get('call_from') == "make_a_referral")
        {
            return redirect('email_form');
        }

        if(Session::get('call_from') == "bronzePlanForm")
        {
            return redirect('bronzePlanStripe1');
        }

        if(Session::get('call_from') == "bronzePlanStripe2")
        {
            return redirect('bronzePlanStripe2');
        }

        if(Session::get('lastPage'))
        {
            return redirect(Session::get('lastPage'));
        }

        $last_page = LastPageVisit::where('student_id',Auth::id())->first();
 
        if($last_page)
        {
            return redirect($last_page->last_page_visit);
        }   
        
        return redirect('dashboard')->with("success", "Welcome to ".Auth::user()->name." dashboard");

        // return redirect()->intended(RouteServiceProvider::HOME); 
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        if(Auth::user()->age_group == '' || Auth::user()->gender == '' || Auth::user()->who_will_be_training == '' || Auth::user()->disciplines_in_martial_arts == ''
        || Auth::user()->stretching_flexibility_spiritual_meditative_arts == '' || Auth::user()->health_and_wellness_guidance == '' || Auth::user()->all_fitness_including == '' || Auth::user()->fitness == ''
        || Auth::user()->preferred_language == '' || Auth::user()->instructor_gender == '' || Auth::user()->preferred_training_style == '' || Auth::user()->gender == '')
        {
            $template = SendgridTemplate::where('id',33)->first();

            $template_id = "d-".$template->template_id;   

            $email = new \SendGrid\Mail\Mail();

            $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
            $email->setSubject('Try MartialArtsZen.com using this referral');
            $email->addTo(Auth::user()->email);
            $email->addContent("text/html","Join me and improve your skills in various disciplines");
            $email->addDynamicTemplateDatas([
                "first_name"=>Auth::user()->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('student_profile')
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

        $name = Auth::user()->name;
        Auth::guard('web')->logout();



        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect('/');
        return redirect('login')->with("success", "Good Bye ".$name." Please Visit Again");
        // return redirect('free')->with("success", "Good Bye ".$name." Please Visit Again");
    }
}
