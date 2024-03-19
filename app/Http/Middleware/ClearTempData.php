<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class ClearTempData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $tempDataExpiration = 1.5; // Tempo em minutos (por exemplo, 60 minutos = 1 hora)

        if (Session::has('temp')) {

            $storedTime = Session::get('temp_stored_time');
            if (time() - $storedTime >= $tempDataExpiration * 60) {
                Session::forget('temp');
                Session::forget('temp_stored_time');
            }
        }



        return $response = $next($request);
    }
}
