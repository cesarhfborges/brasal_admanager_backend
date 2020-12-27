<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('userprincipalname', 'password');

        $validator = Validator::make($credentials, [
            'userprincipalname' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 1,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $token = Auth::attempt($credentials);

        $user = Auth::user();

        return response()->json([
            'success' => true,
            'token_type' => 'bearer',
            'access_token' => $token,
            'expires_in' => auth()->factory()->getTTL() * 60
        ], 200);
    }
}
