<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Session\Session as SessionContract;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
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
        if(Auth::check()){
            $username = Auth::user()->name;

            $username = explode(' ', $username)[0];

            session(['username' => $username]);

        }

        $lastActivity = Session::get('last_activity');


        if ($lastActivity && time() - $lastActivity > config('session.lifetime')) {
            Session::flush();
            Session::regenerate();
            return redirect()->route('login')->with('error', 'Your session has expired. Please log in again.');
        }

        // Update the last activity timestamp
        Session::put('last_activity', time());

        return $next($request);
    }
}
