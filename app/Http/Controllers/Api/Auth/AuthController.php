<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {



        $jwt_token = Auth::attempt([
            'userprincipalname' => $request->get('username'),
            'password' => $request->get('password'),
        ]);


        if (!$jwt_token) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }


        return response()->json([
            'success' => true,
            'token_type' => 'bearer',
            'access_token' => $jwt_token,
            'expires_in' => auth()->factory()->getTTL() * 60
        ], 200);
    }
}
