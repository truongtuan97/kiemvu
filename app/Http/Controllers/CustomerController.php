<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'min:11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function detail(Request $request) {
        $user = \Auth::user();
        $user->phone = $this->displayPhone($user->phone);
        $user->email = $this->displayEmail($user->email);
        return View('customer/customerDetail', compact("user"));
    }

    public function changePassword() {
        $user = \Auth::user();
        return View('customer/changePassword', compact('user'));
    }

    public function ExeChangePassword(Request $request) {        
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {

            $user = \Auth::user();
            if ($user->phone != $request->phone || $user->email != $request->email){
                return redirect()->back()->withErrors(["Invalid email or phone"]);
            }

            $user->password = Hash::make($request['password']);
            $user->save();
            return redirect()->back()->with('alert', 'success');
        }        
    }

    private function displayEmail($email) {
        $pieces = explode("@", $email);
        $firstString = $pieces[0];
        $secondString = $pieces[1];
        $firstString = str_replace(substr($firstString, 3), '***', $firstString);

        return $firstString.'@'.$secondString;
    }

    private function displayPhone($phone) {
        $str1 = substr($phone, 0, 3);
        $str2 = substr($phone, -3);
        $phone = $str1.'****'.$str2;
        return $phone;
    }
}
