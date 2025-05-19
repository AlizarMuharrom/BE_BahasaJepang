<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Mail;
use Str;

class ForgotPassword extends Controller
{
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'Email tidak terdaftar di sistem kami.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            // // Generate token (contoh sederhana)
            $token = Str::random(6); // atau gunakan random_int untuk angka

            // // Simpan token ke database (contoh tabel password_resets)
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $request->email],
                ['token' => $token, 'created_at' => now()]
            );

            $mailData = [
                'title' => 'Token untuk reset password',
                'body' => 'Gunakan token ini untuk mereset password anda'
            ];


            // // Jika ingin mengirim email:
            Mail::to($request->email)->send(new TestMail($mailData));

            dd('Token berhasil terkirim');

            return response()->json([
                'success' => true,
                'message' => 'Token reset password telah dikirim',
                'data' => [
                    'token' => $token,// Opsional: hanya untuk development
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengirim token: ' . $e->getMessage()
            ], 500);
        }
    }

    // AuthController.php
    public function verifyToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:password_reset_tokens,email',
            'token' => 'required|string|size:6'
        ]);

        $resetData = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$resetData) {
            return response()->json([
                'success' => false,
                'message' => 'Token tidak valid atau sudah kadaluarsa'
            ], 422);
        }

        // Cek apakah token masih valid (misal: 15 menit)
        $tokenExpired = Carbon::parse($resetData->created_at)
            ->addMinutes(15)
            ->isPast();

        if ($tokenExpired) {
            return response()->json([
                'success' => false,
                'message' => 'Token sudah kadaluarsa'
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'success' => true,
            'message' => 'Token valid',
            'data' => $user
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string|size:6',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $resetData = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$resetData) {
            return response()->json([
                'success' => false,
                'message' => 'Token tidak valid'
            ], 422);
        }

        // Update password user
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus token reset
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Password berhasil direset'
        ]);
    }
}
