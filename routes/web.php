<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\UserController;

// Route untuk halaman utama ("/")
Route::middleware('guest')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('login');
    Route::get('/login', [AdminController::class, 'index']);
    Route::POST('/Login', [AdminController::class, 'login'])->name('loginProses');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'home'])->name('dashboard');
    Route::get('/materi', [AdminController::class, 'materi'])->name('materi');
    Route::get('/materiN5N4', [AdminController::class, 'materiN5N4'])->name('materiN5N4');
    Route::get('/kamus', [AdminController::class, 'kamus'])->name('kamus');
    Route::get('/kanji', [AdminController::class, 'kanji'])->name('kanji');
    Route::get('/ujian', [AdminController::class, 'ujian'])->name('ujian');
    Route::get('/user', [AdminController::class, 'user'])->name('user');
    Route::get('/tambahMateri', [AdminController::class, 'tambahMateri'])->name('tambahMateri');
    Route::get('/tambahMateriN5N4', [AdminController::class, 'tambahMateriN5N4'])->name('tambahMateriN5N4');
    Route::get('/tambahKanji', [AdminController::class, 'tambahKanji'])->name('tambahKanji');
    Route::get('/tambahKamus', [AdminController::class, 'tambahKamus'])->name('tambahKamus');
    Route::get('/tambahUjian', [AdminController::class, 'tambahUjian'])->name('tambahUjian');
    Route::POST('/kanjiStore', [AdminController::class, 'kanjiStore'])->name('kanjiStore');
    Route::PATCH('/kanji/{id}', [AdminController::class, 'kanjiUpdate'])->name('kanjiUpdate');
    Route::delete('/kanji/{id}', [AdminController::class, 'kanjiDelete'])->name('kanjiDelete');
    Route::POST('/kamusStore', [AdminController::class, 'kamusStore'])->name('kamusStore');
    Route::PATCH('/kamusUpdate/{id}', [AdminController::class, 'kamusUpdate'])->name('kamusUpdate');
    Route::delete('/kamusDelete/{id}', [AdminController::class, 'kamusDelete'])->name('kamusDelete');
    Route::POST('/ujianStore', [AdminController::class, 'ujianStore'])->name('ujianStore');
    Route::patch('/ujianUpdate/{id}', [AdminController::class, 'ujianUpdate'])->name('ujianUpdate');
    Route::delete('/ujianDelete/{id}', [AdminController::class, 'ujianDelete'])->name('ujianDelete');
    Route::POST('/materiStore', [AdminController::class, 'materiStore'])->name('materiStore');
    Route::PATCH('/materiUpdate/{id}', [AdminController::class, 'materiUpdate'])->name('materiUpdate');
    Route::delete('/materiDelete/{id}', [AdminController::class, 'materiDelete'])->name('materiDelete');
    Route::POST('/materiN5N4Store', [AdminController::class, 'materiN5N4Store'])->name('materiN5N4Store');
    Route::PATCH('/materiN5N4Update/{id}', [AdminController::class, 'materiN5N4Update'])->name('materiN5N4Update');
    Route::delete('/materiN5N4Delete/{id}', [AdminController::class, 'materiN5N4Delete'])->name('materiN5N4Delete');
});


