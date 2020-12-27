<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
//        $credentials = $request->only('userprincipalname', 'password');
//
//        $validator = Validator::make($credentials, [
//            'userprincipalname' => 'required',
//            'password' => 'required'
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json([
//                'code' => 1,
//                'message' => 'Validation failed.',
//                'errors' => $validator->errors()
//            ], 422);
//        }
//
//        $token = JWTAuth::attempt($credentials);

        $jwt_token = Auth::attempt([
            'userprincipalname' => $request->get('userprincipalname'),
            'password' => $request->get('password'),
        ]);

        $user = Auth::user();


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
