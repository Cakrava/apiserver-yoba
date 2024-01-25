<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;    
use Illuminate\Support\Facades\Validator;

class LoginRegisterController extends Controller
{
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error !',
                'data' => $validate->errors()
            ], 403);

        }
        //Cek email jika ada
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid Credentials',
            ], 401);

        }
        //jika email dan password benar,maka kita buatkan token
        $data = [
            'token' => $user->createToken($request->email)->plainTextToken,
            'user' => $user
        ];
        return response()->json([
            'status' => 'success',
            'message' => 'User is Logged in Successfully',
            'data' => $data
        ], 200);

    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User is Logged Out Successfully',
        ], 200);
    }
}