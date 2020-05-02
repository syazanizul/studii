<?php

namespace App\Http\Controllers\Auth;

use App\Mail\event;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationChoose()
    {
        return view('auth.register_choose');
    }

    //Go to -> Second Register Page - with role
    public function registerForm()
    {
        $category = request() -> get('c');

        switch($category)   {
            case 'student':
                $role = 1;
                break;
            case 'teacher':
                $role = 2;
                break;
            case 'parent':
                $role = 3;
                break;
            case 'volunteer':
                $role = 4;
                break;
        }

        return view('auth.register', compact('role','category'));
    }

    public function dataProtectedIndex()  {
        return view('auth.data_protected');
    }

    /**
     * Where to redirect users after registration.
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
                $this->redirectTo = '/volunteer';
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

        // return $next($request);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['integer'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Mail::to('syazanizul@gmail.com')->send(new event('register by'. $data['firstname']));

        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
