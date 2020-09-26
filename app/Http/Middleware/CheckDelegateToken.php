<?php

namespace App\Http\Middleware;

use Closure;

class CheckDelegateToken
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
        $user = JWTAuth::parseToken()->authenticate();
        if(!$request->api_token){
            return response()->json(['message' => 'Unauthenticated.']);
        }

        return $next($user);
    }
}
