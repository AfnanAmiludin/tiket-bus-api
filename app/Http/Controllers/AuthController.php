<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $attribute = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ]);
        $attribute['password'] = Hash::make($request->password);
        $user = User::create($attribute);
        if ($user) {
            return response()->json(['message' => 'Succes', 'data' => $user]);
        } else {
            return response()->json([
                'message' => 'Data does not according to procedure!'
            ], 404);
        }
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details!'
            ], 401);
        }


        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login Succes',
            'token type' => 'Bearer',
            'acces token' => $token
        ], 201);
    }
}
