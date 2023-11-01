<?php

namespace App\Http\Controllers\Public\V1;

use App\Http\Controllers\PublicController;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends PublicController
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('register');
    }

    public function register()
    {
        // $credentials = request(['email', 'password']);

        // if (!$token = auth()->attempt($credentials)) {
        //     return response()->json(['status' => 1, 'message' => 'invalid credentials'], 401);
        // }

        $user = User::findOrFail(1);

        $token = JWTAuth::fromUser($user);

        echo $token;

        // return response()->json(['status' => 0, 'token' => $token]);
    }
}
