<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessTokenMiddleware
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
        if($request->header('access_token') != config('app.access_token')){
            return response()->json(['message' => " paschal na... "], 401);
        }
        return $next($request);
    }
}
