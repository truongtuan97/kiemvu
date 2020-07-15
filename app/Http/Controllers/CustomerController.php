<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use BaoKimSDK\BaoKim;
use App\CardHistory;
use App\CardInfo;
use App\CardType;
use App\PromotionConfiguration;
use Carbon\Carbon;

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

    public function detail(Request $request) {
        $user = \Auth::user();
        $user->phone = $this->displayPhone($user->phone);
        $user->email = $this->displayEmail($user->email);
        return View('customer/detail', compact("user"));
    }

        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorEmailPhone(array $data)
    {                                
        return Validator::make($data, [                        
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'min:11'],            
        ]);
    }

    public function updateInfo() {
        $user = \Auth::user();
        return View('customer/updateInfo', compact('user'));
    }

    public function ExeUpdateInfo(Request $request) {        
        $validator = $this->validatorEmailPhone($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        } else {

            $user = \Auth::user();

            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->save();

            return redirect()->to(route('accountInfo', $user));
        }        
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

    protected function validatorEmail(array $data)
    {                                
        return Validator::make($data, [                        
            'email_old' => ['required', 'string', 'email', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'min:11'],            
        ]);
    }

    public function changeEmail() {
        $user = \Auth::user();
        return View('customer/changeEmail', compact('user'));
    }

    public function ExeChangeEmail(Request $request) {        
        $validator = $this->validatorEmail($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $user = \Auth::user();
            if ($user->phone != $request->phone || $user->email != $request->email_old){
                return redirect()->back()->withErrors(["Invalid email or phone"]);
            }

            $user->email = $request->email;
            $user->save();
            return redirect()->back()->with('alert', 'success');
        }        
    }

    protected function validatorPhone(array $data)
    {                                
        return Validator::make($data, [                                    
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_old' => ['required', 'numeric', 'min:11'],
            'phone' => ['required', 'numeric', 'min:11'],
        ]);
    }

    public function changePhone() {
        $user = \Auth::user();
        return View('customer/changePhone', compact('user'));
    }

    public function ExeChangePhone(Request $request) {        
        $validator = $this->validatorPhone($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $user = \Auth::user();
            if ($user->phone != $request->phone_old || $user->email != $request->email){
                return redirect()->back()->withErrors(["Invalid email or phone"]);
            }

            $user->phone = $request->phone;
            $user->save();
            return redirect()->back()->with('alert', 'success');
        }
    }

    public function napcard() {
        $user = Auth::user();
        $cardInfos = CardInfo::all();
        $cardTypes = CardType::all();
        return view('customer.napcard', compact(['user', 'cardInfos', 'cardTypes']));
    }
    
    public function updateNapCard(Request $request) {

        $validateResult = $this->validate($request, [
            'cardType' => 'required',
            'cardInfo' => 'required',
        ]);        
        $user = Auth::user();
        $chkm = PromotionConfiguration::all()->first();
        
        $date = new \DateTime();
        
        $orderID = $user->name.'-'.$date->getTimestamp();
        $cardAmount = $request->cardInfo;
        
        $payload['mrc_order_id'] = $orderID;
        $payload['telco'] = $request->cardType;
        $payload['amount'] = $cardAmount;
        $payload['code'] = $request->pin;
        $payload['serial'] = $request->serial;
        $payload['webhooks'] = env("NAPCARD_WEB_HOOK_URL");
        
        BaoKim::setKey(env("BAOKIM_API_KEY"), env("BAOKIM_SECREY_KEY"));
        $url_api = "https://api.kingcard.online/kingcard/api/v1/strike-card?jwt=".BaoKim::getKey();        
        
        //save to log
        $ingame_amount = empty($chkm) ? ($cardAmount / 1000) : (($cardAmount / 1000) + (($cardAmount / 1000) * $chkm->khuyenmai));
        CardHistory::create([
            'username' => Auth::user()->name,
            'orderId' => $orderID,
            'card_type' => $request->cardType,
            'card_amount' => $request->cardInfo,
            'card_code' => $request->pin,
            'card_serial' => $request->serial,
            'status' => 1,
            'ingame_amount' => $ingame_amount,
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);
        
        // create request with CURL
        $ch = curl_init($url_api);

        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HTTPHEADER     => array("Content-Type: application/json", "Accept: application/json"),  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
            CURLOPT_ENCODING       => "",     // handle compressed            
            CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 60,    // time-out on connect
            CURLOPT_TIMEOUT        => 60,    // time-out on response
            CURLOPT_POST           => true,                        
            CURLOPT_SSL_VERIFYPEER => false,  // ignore SSL verify
            CURLOPT_POSTFIELDS     => \json_encode($payload)
        ); 
            
        curl_setopt_array($ch, $options);        
        $output = curl_exec($ch);
        curl_close($ch);
        
        $loop = 0;
        $cardHistory = new \stdClass();
        
        while ($loop < 3) {
            \sleep(env('SECOND_TIMEOUT'));
            $cardHistory = CardHistory::where('orderID', $orderID)->first();
            if ($cardHistory->success == 1) {
                break;
            }
            $loop += 1;
        }
                
        if ($cardHistory->success == 1) {
            return redirect()->back()->with('alert', 'success');
        } else {
            if ($cardHistory->status == 1) {
                return redirect()->back()->with('alert', 'status1');
            }
            if ($cardHistory->status == 3) {
                return redirect()->back()->with('alert', 'status2');
            }
            if ($cardHistory->status == 3) {
                return redirect()->back()->with('alert', 'status3');
            }
        }
    }

    private function displayEmail($email) {
        if (empty($email))
            return "";
        $pieces = explode("@", $email);
        $firstString = $pieces[0];
        $secondString = $pieces[1];
        $firstString = str_replace(substr($firstString, 3), '***', $firstString);

        return $firstString.'@'.$secondString;
    }

    private function displayPhone($phone) {
        if (empty($phone))
            return "";
        $str1 = substr($phone, 0, 3);
        $str2 = substr($phone, -3);
        $phone = $str1.'****'.$str2;
        return $phone;
    }
}
