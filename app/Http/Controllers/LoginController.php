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

        // return response()->json([
        //     'data' => $user
        // ]);
        if ($user) {
            return response()->json([
                'status' => 'success',
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed'
            ], 401);
        }
    }
}
