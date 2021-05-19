<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * Function to login a User and return relevant token
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        $error = null;
        if (!Auth::attempt(request(['email', 'password']))) {
            $error = 'Email or password is incorrect, please check and try again.';
            $errorCode = 401;
        }

        if ($error !== null) {
            return response()->json([
                'message' => $error
            ], $errorCode);
        }
        $user = $request->user();
        $token = $user->createToken('auth');

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token->plainTextToken
        ]);
    }
}
