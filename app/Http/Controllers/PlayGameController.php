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

    public function playGame() {
        if (is_null(\Auth::user())) {
            return redirect()->route('home');
        }            
        else {
            return view('play-game');
        }
    }
}
