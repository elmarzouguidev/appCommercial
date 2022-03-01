<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{


    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('admin:auth:login');
        }
    }

    /*protected function unauthenticated($request, array $guards)
    {
        //dd($guards);
        if (! $request->routeIs('checkout') && $request->is('api/', 'api/*')) {

            abort(response()->json([
                'message' => 'Unauthenticated you must be logged in',
            ], 401));
        }
    }*/
}
