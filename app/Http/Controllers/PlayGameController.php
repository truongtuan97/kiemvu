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
            
            $serverId = $request->id;
            return view('play-game', compact("serverId"));
        }
    }
}
