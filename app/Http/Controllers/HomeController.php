<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    public function filterByDate($object) {
        $openDate = new DateTime($object->open);
        $now = new DateTime();
        return $openDate > $now ? TRUE : FALSE;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        include(app_path() . '\serverlist.php');        
        $arrayFiltered = array_filter($game_server, function($obj) {
            $openDate = new \DateTime($obj['open']);
            $now = new \DateTime();
            return $openDate > $now ? $obj : null;
        });
        \krsort($arrayFiltered, SORT_NUMERIC);
        $lastElement = $arrayFiltered[count($arrayFiltered)];
        $beforeLastElement = $arrayFiltered[count($arrayFiltered) - 1];

        $playedServer = array();
        $user = \Auth::user();
        if (!\is_null($user)) {
            $redis = \Redis::connection();
            $playedServer = \json_decode($redis->get($user->name));            
        }
        return view('home', compact(['lastElement', 'beforeLastElement', 'arrayFiltered', 'playedServer']));
    }    
}
