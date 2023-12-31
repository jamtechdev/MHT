<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Sichikawa\LaravelSendgridDriver\SendGrid;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PasswordReset;
use App\Models\SendgridTemplate;

class PasswordResetLinkController extends Controller
{
    use SendGrid;

    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $token = Str::random(40);

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email',$request->email)->first();
        
        if($user)
        {
            $template = SendgridTemplate::where('id',17)->first();

            $template_id = "d-".$template->template_id;   

            $email = new \SendGrid\Mail\Mail();
    
            $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
            $email->setSubject('Try MartialArtsZen.com using this referral');
            $email->addTo($request->email);
            $email->addContent("text/html","Join me and improve your skills in various disciplines");
            $email->addDynamicTemplateDatas([
                "first_name"=>$user->firstname,
                "email"=>$request->email,
                "token"=>$token,
                "default"=>"Valued customer",
                "reserPassword"=>route('password.reset',['token' => $token ,'email'=>$request->email])
                ]);
            $email->setTemplateId($template_id);
            
            $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
    
            try{
                $response = $sendgrid->send($email);

                $check_user = PasswordReset::where('email',$request->email)->first();

                if($check_user)
                {
                    $user = PasswordReset::where('email',$request->email)->first();
                    $user->token = Hash::make($token);
                    $user->save();
                }
                else
                {
                    PasswordReset::create(['email'=>$request->email,'token'=>Hash::make($request->token)]);
                }

                //print $response->statusCode(). "\n";
                return Redirect::back()->with('success', 'Pasword Reset Link Sent Successfully !');
            }
            catch(Exception $e)
            {
                echo "Caught Exception:".$e->getMessage()."\n";
            }
        }
        else
        {
            return Redirect::back()->with('error', 'Email Not Registered !');
        }
 
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        // $status = Password::sendResetLink(
        //     $request->only('email')
        // );
      
        // return $status == Password::RESET_LINK_SENT
        //             ? back()->with('status', __($status))
        //             : back()->withInput($request->only('email'))
        //                     ->withErrors(['email' => __($status)]);
    }
}
