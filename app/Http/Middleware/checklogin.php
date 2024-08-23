<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checklogin
{

    public function handle($request, Closure $next, $guard = null)
    {
       // dd($request->user());
        if ($request->user()->status != '0') {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }


}
