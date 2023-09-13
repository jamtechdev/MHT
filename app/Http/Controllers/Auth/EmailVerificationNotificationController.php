<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\SendgridTemplate;
use Config,Auth;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
 
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        
        $user = User::where('id',Auth::id())->first();

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
    
            return back()->with('status', 'verification-link-sent');
        }
        catch(Exception $e)
        {
            echo "Caught Exception:".$e->getMessage()."\n";
        }

        //$request->user()->sendEmailVerificationNotification();

        //return back()->with('status', 'verification-link-sent');
    }
}
