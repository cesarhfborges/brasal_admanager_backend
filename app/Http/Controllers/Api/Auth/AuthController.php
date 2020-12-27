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
        $credentials = $request->only('username', 'password');

        $validator = Validator::make($credentials, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Verifique os campos e tente novamente.',
                'errors' => $validator->errors()
            ], 400);
        }

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'message' => 'Credenciais inválidas.',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token_type' => 'bearer',
            'access_token' => $token,
            'expires_in' => auth()->factory('')->getTTL() * 60
        ], 200);
    }
}
