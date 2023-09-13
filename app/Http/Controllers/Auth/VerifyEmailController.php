<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Sichikawa\LaravelSendgridDriver\SendGrid;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\login_deatils;
use App\Models\SendgridTemplate;
use Auth, Mail;

class VerifyEmailController extends Controller
{
    use SendGrid;

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function __invoke(EmailVerificationRequest $request)
    public function __invoke(Request $request): RedirectResponse
    {

        $user = User::find($request->route('id'));
      
        if($user->email_verified_at == NULL)
        {
            if ($user->hasVerifiedEmail()) {
                Auth::login($user);
                return redirect('dashboard')->with("success", "Your account has been varified, Welcome to ".$user->name." dashboard");
            }
    
            if($user->markEmailAsVerified()) {
    
                // Send Welcome Mail
                // $mailDetails = [
                //     'subject' => 'Welcome to MartialArtsZen.com',
                //     'title' => $user->name,
                //     'body' => ''
                // ];
                
                // \Mail::to($user->email)->send(new \App\Mail\InstructorMail($mailDetails));
                
                // if($user->subscription_id == 1)
                // {
                //     $template = SendgridTemplate::where('id',23)->first();

                //     $template_id = "d-".$template->template_id;  
    
                //     $email = new \SendGrid\Mail\Mail();
                
                //     $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                //     $email->setSubject('Try MartialArtsZen.com using this referral');
                //     $email->addTo($user->email);
                //     $email->addContent("text/html","Join me and improve your skills in various disciplines");
                //     $email->addDynamicTemplateDatas([
                //         "first_name"=>$user->firstname,
                //         "default"=>"Valued customer",
                //         "actionUrl"=>route('softRegister')
                //         ]);
                //     $email->setTemplateId($template_id);
                    
                //     $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
        
                //     try{
                //         $sendgrid->send($email);
                //     }
                //     catch(Exception $e)
                //     {
                //         echo "Caught Exception:".$e->getMessage()."\n";
                //     }
                // }
               
                // Register User In Stripe
                authStripe($user);
    
                event(new Verified($user));
    
                try
                {
                    Auth::login($user);
                    //echo 'check';
                    $user_data=User::find(Auth::id());
                    $user_id=$user_data->id;
                    
                    $check_user=login_deatils::where('student_id',$user_id)->get();
                    // echo $check_user;
                        

                    if($check_user->count()>0)
                    {
                        
                            //if user is already exsist in table update data
                            $update_data=login_deatils::where('student_id',$user_id);
                            $update_data->update([
                                "login_date"=>date('Y-m-d')
                            ]);

                        return redirect('dashboard')->with("success", "Your account has been varified, Welcome to ".$user->name." dashboard");
                    }
                    else
                    {
                        try{
                        //user is ogin for first time insert data
                            $data_save=new login_deatils();
                            $data_save->student_id=$user_id;
                            $data_save->login_date=date('Y-m-d');
                            $save_success=$data_save->save();
    
                            return redirect('dashboard')->with("success", "Welcome to ".Auth::user()->name." dashboard");
                        }
                        catch(Exception $e)
                        {
                            return $e->getMessage();
                        }
                    }
                }
                catch(Exception $e)
                {
                    return $e->getMessage();
                }
            }
        }
        
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}