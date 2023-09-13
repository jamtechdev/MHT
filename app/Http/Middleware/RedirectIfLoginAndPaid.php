<?php

namespace App\Http\Middleware;

use Closure , Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RedirectIfLoginAndPaid
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
        Session::put('view_paid_video_url', $request->getRequestUri());

        $userPaid = Auth::user();

        // Check user is logged in
        if(!$userPaid) {
            return redirect()->to('paidvideo-login');
        }

        if(!$userPaid->plan_amount || $userPaid->status != 'active'){
            return redirect()->to('paidvideo-subscription');
        }

        return $next($request);
    }
}