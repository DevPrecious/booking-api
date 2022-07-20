<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Check email  plus if role == 1
        $admin = User::where('email', $request->email)->where('role', 1)->first();

        // Check user match
        if(!$admin || !Hash::check($request->password, $admin['password'])) {
            return response([
                'message' => 'Incorrect details'
            ], 401);
        }

        $token = $admin->createToken('greatapi')->plainTextToken;

        $response = [
            'admin' => $admin,
            'token' => $token
        ];

        return response($response, 201);


    }
}
