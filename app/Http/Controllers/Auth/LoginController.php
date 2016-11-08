<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
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

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $redirectAfterLogout = '/login';

    // protected $redirectAfterLogout = 'auth/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Log the user out of the application.
     *
     */
    public function logout() {
        //Illuminate\Support\Facades\Auth::logout();
        Auth::logout();
        //Session::flash('success', 'You have been successfully logged out!');
        flash()->info('Bye', 'You have been successfully logged out!');
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    /**
     * Log the user out of the application.
     *
     */
    public function login00000() {
        flash()->info('Welcome', 'Welcome you login');
        return redirect(property_exists($this, 'redirectTo') ? $this->redirectTo : '/dashboard');
    }

    // somewhere in controller

    public function authenticated($request, $user) {
        
        //flash('Welcome back ' . $user->username . ', you have been logged in');
        flash()->overlay('Welcome back ' . $user->username . ', you have been logged in', 'Welcome');
        
    }

}
