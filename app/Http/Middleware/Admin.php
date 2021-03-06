<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {        
        $user = User::where('email', auth()->user()->email)
                    ->where('password', auth()->user()->password)
                    ->first();
        
        if ($user && $user->role == 'admin') {
            return $next($request);
        }

        Auth::logout();
        Session::flush();
        return redirect('/home');        
    }
}
