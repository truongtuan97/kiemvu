<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;  // Import Hash facade
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
            'password' => ['required']
        ]);
    }

    public function showLoginForm(){
        return redirect('/');
    }

    public function login(Request $request){
        $validator = $this->validator($request->all());
        $auth = false;
        $credentials = $request->only('name', 'password');
        try {
            if (Auth::attempt($credentials)) {
                $auth = true; // Success
            }
    
            if ($auth) {
                $user = User::where('name', $request->name)->first();
    
                if ($user) {            
                    Auth::login($user);
                    return response()->json($user);
                } else {
                    return response()->json(['error'=>"Invalid name or password."]);
                }
            } else {
                return response()->json(['error'=>"Invalid name or password."]);
            }            
        } catch (Exception $ex) {
            return response()->json(['error'=>"Invalid name or password."]);
        }        
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
