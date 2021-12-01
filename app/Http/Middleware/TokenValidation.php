<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenValidation
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
//        if ($request->bearerToken() == null) {
//            //return ['error' => 'Token Not Found'];
//            return response()->json([
//                'error' => 'Token Not Found'
//            ]);
//        }
        return $next($request);
    }
}
