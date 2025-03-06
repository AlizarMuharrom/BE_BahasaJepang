<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LevelController1 extends Controller
{
    public function updateLevel(Request $request)
    {
        // return response()->json($request->all());
        // Log::info('Received data: ', $request->all());

        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'level_id' => 'required|integer|exists:levels,id',
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

        // Log hasil update
        // Log::info('Updated user: ', $user->toArray());

        return response()->json([
            'status' => 'success',
            'message' => 'Level updated successfully',
            'user' => $user,
        ], 200);
    }
}
