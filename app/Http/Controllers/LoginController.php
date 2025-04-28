<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'fullname' => $user->fullname,
                    'username' => $user->username,
                    'email' => $user->email,
                    'level_id' => $user->level_id,
                ]
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed'
            ], 401);
        }
    }
}
