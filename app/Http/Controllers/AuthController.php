<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()
                ->json([
                    'status' => 'error',
                    'message' => 'Email atau Password Tidak Ditemukan!'
                ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login Berhasil',
            'data' => $user,
            'token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'status' => 'success',
            'message' => 'Logout Berhasil'
        ];
    }

    public function user(Request $request)
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        return response()->json([
            'status' => 'success',
            'data' => $user,
        ]);
    }
}
