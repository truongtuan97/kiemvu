<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

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
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {                                
        return Validator::make($data, [
            'name' => ['required'],            
            'password' => ['required'],
        ]);
    }

    public function showLoginForm(){

    }

    public function login(Request $request){
        $validator = $this->validator($request->all());
        if (!$validator->fails()) {
            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password])
            ){
                return redirect('/home');
            }
        }        
        return redirect('/home')->with('error', 'Invalid Name address or Password');
    }

    public function logout(){}
}
