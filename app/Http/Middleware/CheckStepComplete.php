<?php

namespace App\Http\Middleware;

use Closure, Auth;
use Illuminate\Http\Request;

class CheckStepComplete
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
    * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    */
    public function handle(Request $request, Closure $next)
    {
        // Check Registration Step Are Remaining
        $user = Auth::user();
        
        // Check Step One Completed
        // if(!$user->plan_amount_currency || !$user->plan_interval) {
        //     return redirect()->to('step-one');
        // }

        if($user->subscription_id != '1' && $user->payment_status == '0') {
            return redirect()->to('step-one');
        }
        // Check Step Two Completed
        if(!$user->who_will_be_training || !$user->disciplines_in_martial_arts || !$user->stretching_flexibility_spiritual_meditative_arts || !$user->health_and_wellness_guidance || !$user->all_fitness_including) {
            return redirect()->to('step-two');
        }
        // Check Step Three Completed
        if(!$user->age_group || !$user->gender || !$user->fitness || !$user->preferred_language) {
            return redirect()->to('step-three');
        }
        // Check Step Four Completed
        if(!$user->instructor_gender || !$user->preferred_training_style) {
            return redirect()->to('step-four');
        }
        return $next($request);
    }
}