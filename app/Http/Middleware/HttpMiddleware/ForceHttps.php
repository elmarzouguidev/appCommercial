<?php

namespace App\Http\Middleware\HttpMiddleware;

use Closure;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ForceHttps
{

    public function handle($request, Closure $next)
    {
        if (app()->isProduction() && !$request->secure()) {

            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
