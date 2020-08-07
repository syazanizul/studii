<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    public function LoginForm()
    {
        SEOMeta::setTitle('Log In');
        SEOMeta::setDescription('Log In Here');
        SEOMeta::setCanonical('https://www.studii.my');
        return view('auth.login');
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    public function redirectTo()
    {
        switch(Auth::user()->role){
            case 1:
                $this->redirectTo = '/student';
                return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = '/teacher';
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = '/parent';
                return $this->redirectTo;
                break;
            case 4:
                $this->redirectTo = '/tutor';
                return $this->redirectTo;
                break;
            case 5:
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }

//         return $next($request);
    }
//
//    protected function loggedOut(Request $request) {
//        return redirect('/about');
//    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }
}
