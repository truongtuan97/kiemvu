<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayGameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function playGame(Request $request) {
        $user = \Auth::user();
        if (is_null($user)) {
            return redirect()->route('home');
        }            
        else {
            $serverId = $request->id;

            include(__DIR__.'/../../serverlist.php');
            if (!\in_array($user->name, $allow_users_test)){
                return redirect()->route('home');
            }
            if (is_null($game_server[$serverId])) {
                return redirect()->route('home');
            }

            $redis = \Redis::connection();

            $arrValue = \json_decode($redis->get($user->name));
            if (\is_null($arrValue)) {
                $arrValue = array();
                $arrValue[] = $request->id;            
                $redis->set($user->name, json_encode($arrValue));                
            } else {
                if (!(\in_array($request->id, $arrValue))){
                    $arrValue[] = $request->id;
                    $redis->set($user->name, json_encode($arrValue));
                }
            }                        

            //tich hop login
            $domain = env('KIEMVU_DOMAIN');
            $loginKey = env('KIEMVU_LOGIN_KEY');
            $server=$serverId;
            $user=$user->name;
            $fcm = 1;
            $time = time();
            $backurl = "http://kiemvupk.com";
            $client = 0;
            $pfpf = "kiemvupk";
            $sign = md5($server.$user.$fcm.$time.$backurl.$client.$pfpf.$loginKey);
            $loginLink = "http://".$domain."/index.php?s=/VngLogin&game=JYJH&pf=vng&server=".$server."&user=".$user."&fcm=".$fcm."&time=".$time."&backurl=".$backurl."&client=".$client."&pfpf=".$pfpf."&sign=".$sign;
            //end
            return view('play-game', compact("serverId", "loginLink"));
        }
    }
}
