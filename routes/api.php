<?php

use App\Http\Controllers\Api\LevelController1;
use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\KamusController;
use App\Http\Controllers\KanjiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MateriN5N4Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UjianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [LoginController::class, 'prosesLogin'])->name('login');
Route::post('/update-level', [LevelController1::class, 'updateLevel']);

Route::apiResource('kanji', KanjiController::class);
Route::apiResource('kamuses', KamusController::class);
Route::apiResource('materis', MateriController::class);
Route::apiResource('materi', MateriN5N4Controller::class);

Route::get('materi/level/{levelName}', [MateriN5N4Controller::class, 'getByLevel']);
Route::put('/update-profile/{id}', [UserController::class, 'updateProfile'])
    ->middleware('auth:sanctum');

// ====================
// RUTE UNTUK SISTEM UJIAN
// ====================

// Daftar ujian berdasarkan level
Route::get('ujian/level/{levelId}', [UjianController::class, 'index']);

Route::get('ujian/{ujianId}/soal', [UjianController::class, 'getSoal'])->middleware('auth:sanctum');

Route::post('ujian/{ujianId}/submit', [UjianController::class, 'submitUjian'])->middleware('auth:sanctum');

Route::get('hasil-ujian/{hasilId}', [UjianController::class, 'getHasil'])->middleware('auth:sanctum');

Route::get('hasil-ujian/user/{userId}', [UjianController::class, 'getHasilByUser'])
    ->middleware('auth:sanctum');

Route::get('user/hasil-ujian', [UjianController::class, 'userHistory'])->middleware('auth:sanctum');

Route::post('/forgot-password', [ForgotPassword::class, 'forgotPassword']);
Route::post('/verify-token', [ForgotPassword::class, 'verifyToken']);
Route::post('/reset-password', [ForgotPassword::class, 'resetPassword']);
Route::get('send-mail', [ForgotPassword::class, 'forgotPassword']);