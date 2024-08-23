<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ConnectivityChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $connected = @fsockopen("www.google.com", 80); //website, port  (try 80 or 443)
        // if ($connected){
        //     return true;
        // }
        // return false;
        //checking connection with @fopen
        if ( @fopen(env('APP_URL'), "r") ) 
            {
                $request ="You are connected to the internet.";
            } 
            else 
            {
                $request= "You seem to be offline. Please check your internet connection.";  
            } 
    
        return $next($request);
    }
}
