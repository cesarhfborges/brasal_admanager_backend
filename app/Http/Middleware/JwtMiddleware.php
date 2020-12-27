<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        $token = JWTAuth::getToken();
        $user = JWTAuth::getPayload($token)->toArray();
        if (isset($user)) {
            $st = new User();
            $st->fill($user);
            Auth::setUser($st);
            return $next($request);
        }

//        $user = JWTAuth::parseToken()->authenticate();
        return $next($request);
    }
}
