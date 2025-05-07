<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\UserController;

// Route untuk halaman utama ("/")
Route::get('/', [AdminController::class, 'home'])->name('dashboard');
Route::get('/materi', [AdminController::class, 'materi'])->name('materi');
Route::get('/kamus', [AdminController::class, 'kamus'])->name('kamus');
Route::get('/kanji', [AdminController::class, 'kanji'])->name('kanji');
Route::get('/ujian', [AdminController::class, 'ujian'])->name('ujian');
Route::get('/user', [AdminController::class, 'user'])->name('user');
Route::get('/tambahMateri', [AdminController::class, 'tambahMateri'])->name('tambahMateri');
Route::get('/tambahKanji', [AdminController::class, 'tambahKanji'])->name('tambahKanji');
Route::get('/tambahKamus', [AdminController::class, 'tambahKamus'])->name('tambahKamus');
Route::get('/tambahUjian', [AdminController::class, 'tambahUjian'])->name('tambahUjian');
