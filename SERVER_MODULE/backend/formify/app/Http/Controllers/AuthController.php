<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|min:5",
        ]);
        if ($validatedData->fails()) {
            return response()->json(["message" => "Invalid Field", "errors" => $validatedData->errors()], 422);
        }

        if (!Auth::attempt($validatedData->validate())) {
            return response()->json(["message" => "Email or password incorrect"], 401);
        }

        $user = User::where("email", $request->email)->first();

        $token = $user->createToken('auth-sanctum')->plainTextToken;

        return response()->json(["message" => 'Login success', "user" => ["name" => $request->user()->name, "email" => $request->user()->email, "accessToken" => $token]]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return  response()->json(["message" => 'Logout success']);
    }
}
