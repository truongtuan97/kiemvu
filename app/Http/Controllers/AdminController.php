<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');//return ra trang login để đăng nhập
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

    public function postLogin(Request $request)
    {
        $validator = $this->validator($request->all());
        $auth = false;        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $auth = true; // Success
        }
        
        if ($auth) {            
            $user = User::where('email', $request->email)->first();            
            if ($user && $user->role == "admin") 
            {
                Auth::login($user);
                return redirect('/admin/list_users');
            }
        }
        
        return redirect('/admin');
    }
}
