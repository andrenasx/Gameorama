<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if($request->has(['login', 'password'])) {
            $login = request()->input('login');
            $password = request()->input('password');

            $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            if (\Auth::attempt([$fieldType => $login, 'password' => $password])) {
                $request->session()->regenerate();

                return redirect(route('home'));
            }
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request) {

        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect($this->redirectTo);
    }
}
