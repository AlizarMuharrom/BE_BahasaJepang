<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        try {
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Register Success',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function updateLevel(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|integer|exists:users,id', // Pastikan user_id valid
            'level_id' => 'required|integer|exists:levels,id', // Pastikan level_id valid
        ]);

        // Cari user berdasarkan user_id
        $user = User::find($request->user_id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        // Update level_id
        $user->level_id = $request->level_id;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Level updated successfully',
            'user' => $user,
        ], 200);
    }
}
