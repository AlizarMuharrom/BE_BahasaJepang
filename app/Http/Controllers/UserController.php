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

    public function updateProfile(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        // Cari user berdasarkan ID
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        // Update data user
        $user->username = $request->username;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'user' => $user,
        ], 200);
    }
    public function updateLevel(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'level_id' => 'required|integer|exists:levels,id',
        ]);

        $user = User::find($request->user_id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        $user->level_id = $request->level_id;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Level updated successfully',
            'user' => $user,
        ], 200);
    }
}
