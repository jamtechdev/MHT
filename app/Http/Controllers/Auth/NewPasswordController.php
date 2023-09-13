<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use App\Models\PasswordReset as resetPassword;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
    
        $check_user = resetPassword::where('email',$request->email)->first();

        if($check_user)
        {
            $check_interval = FALSE;
            $current_time = date('H:i:s');

            if($check_user->updated_at != NULL)
            {
                $time_difference = date('H:i:s',strtotime($check_user->updated_at));

                // Creating DateTime objects
                $dateTimeObject1 = date_create($current_time); 
                $dateTimeObject2 = date_create($time_difference); 
                
                // Calculating the difference between DateTime objects
                $interval = date_diff($dateTimeObject1, $dateTimeObject2); 
                
                $minutes = $interval->days * 24 * 60;
                $minutes += $interval->h * 60;
                $minutes += $interval->i;

                if($minutes <= 60)
                {
                    $check_interval = TRUE;
                }
            }
            else
            {
                $time_difference = date('H:i:s',strtotime($check_user->created_at));

                // Creating DateTime objects
                $dateTimeObject1 = date_create($current_time); 
                $dateTimeObject2 = date_create($time_difference); 
                
                // Calculating the difference between DateTime objects
                $interval = date_diff($dateTimeObject1, $dateTimeObject2); 
                
                $minutes = $interval->days * 24 * 60;
                $minutes += $interval->h * 60;
                $minutes += $interval->i;

                if($minutes <= 60)
                {
                    $check_interval = TRUE;
                }
            }

            if($check_interval)
            {
                if(Hash::check($request->token,$check_user->token))
                {
                    $user = User::where('email',$request->email)->first();
                    $user->password = Hash::make($request->password);
                    $user->save();
    
                    return redirect()->route('student.login')->with('status','Password Changed Successfully');
                }
                else
                {
                    return Redirect::back()->with('error', 'This password reset token is invalid.');
                }   
            }
            else
            {
                return abort(404, 'Page not found.');
            }
           
        }
        else
        {
            return Redirect::back()->with('error', 'Email Not Registered !');
        }


        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.

        // $status = Password::reset(
        //     $request->only('email', 'password', 'password_confirmation', 'token'),
        //     function ($user) use ($request) {
        //         $user->forceFill([
        //             'password' => Hash::make($request->password),
        //             'remember_token' => Str::random(60),
        //         ])->save();

        //         event(new PasswordReset($user));
        //     }
        // );
     
        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        // return $status == Password::PASSWORD_RESET
        //             ? redirect()->route('student.login')->with('status', __($status))
        //             : back()->withInput($request->only('email'))
        //                     ->withErrors(['email' => __($status)]);


    }
}
