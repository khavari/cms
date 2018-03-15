<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('admin.dashboard');
        $this->middleware('auth')->except(['admin_logout', 'show_admin_login_form', 'login']);

    }

    public function show_admin_login_form()
    {

        if (auth()->check()) {
            return redirect(route('admin.dashboard'));
        }

        return view('admin.users.login');

    }

    public function admin_logout(Request $request)
    {
        // auth()->user()->logins()->latest()->first()->update(['updated_at' => Carbon::now()]);
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('administrator');
    }


    // I copied this method from AuthenticatesUsers trait for submit user logins
    public function login(Request $request)
    {
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    // I copied this method from AuthenticatesUsers trait
    protected function authenticated(Request $request, $user)
    {
        event(new \App\Events\UserLogin($user));
    }


}
