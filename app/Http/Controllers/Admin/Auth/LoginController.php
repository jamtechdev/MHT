<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = config('settings.ADMIN_PREFIX');
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // Validate Login
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt Login
        if (! $this->guard()->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(config('settings.ADMIN_PREFIX') . 'dashboard');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(config('settings.ADMIN_PREFIX') . 'login');
        // return $this->loggedOut($request) ?: redirect(config('settings.ADMIN_PREFIX') . 'dashboard');
    }
}
