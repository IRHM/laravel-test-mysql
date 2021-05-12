<?php

namespace App\Http\Middleware;

use Closure;
use Routes;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if (!$request->cookie("email")) {
            return redirect('/login');
        }

        return $next($request);
    }
}
