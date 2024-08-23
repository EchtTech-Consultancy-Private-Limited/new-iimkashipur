<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateHostHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Define your allowed host(s)
        $allowedHosts = [
            env('APP_URL_DOMAIN'),
            env('APP_URL_WWW'),
        ];

        // Get the current host
        $host = $request->getHost();

        // Validate the host
        if (!in_array($host, $allowedHosts)) {
            // Optionally, you can log the attempt here for security auditing
            // Log::warning("Invalid Host Header: $host");

            // Respond with a 400 Bad Request or another appropriate response
            return response('Invalid Host Header', 400);
        }

        return $next($request);
    }
}
