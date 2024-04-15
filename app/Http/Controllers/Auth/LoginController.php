<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'logoutOtherDevices']);
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            // Invalidar las sesiones anteriores del usuario
            Auth::logoutOtherDevices($request->password);

            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    /* public function logoutOtherDevices(Request $request)
    {
        Auth::logoutOtherDevices($request->password);
        return redirect()->route('login')->with('status', 'Sesiones en otros dispositivos cerradas correctamente.');
    }
 */
    public function logoutOtherDevices(Request $request)
    {
        $request->user()->tokens()->delete();
        
        return redirect()->route('login')->with('status', 'Sesiones en otros dispositivos cerradas correctamente.');
    }
}
