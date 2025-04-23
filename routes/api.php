<?php

use App\Http\Controllers\Api\LevelController1;
use App\Http\Controllers\KamusController;
use App\Http\Controllers\KanjiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
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
Route::post('/login', [LoginController::class, 'prosesLogin']);
Route::post('/update-level', [LevelController1::class, 'updateLevel']);

Route::apiResource('kanji', KanjiController::class);
Route::apiResource('kamuses', KamusController::class);
Route::apiResource('materis', MateriController::class);

Route::put('/update-profile/{id}', [UserController::class, 'updateProfile']);