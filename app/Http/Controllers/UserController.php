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
    public function updateLevel(Request $request){
        return response()->json([
            'data'=> $request->all(),
        ]);
    }
}
