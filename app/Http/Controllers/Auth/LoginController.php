<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

//    use AuthenticatesUsers;
    use AuthenticatesUsers {
        logout as performLogout;
    }


   // use AuthenticatesUsers;




    protected function authenticated(Request $request, $user)
    {


        if ($user->authorizeRoles('admin')) {
            return redirect('pjstatus');
        }
           return redirect()->route('profile', Auth::user()->id);

    }


    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('home');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */


   // protected $redirectTo = 'activeproject';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
