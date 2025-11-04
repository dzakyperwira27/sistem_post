<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManualController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

// 🔒 Lindungi semua halaman posts, categories, dan tags dengan middleware 'auth'
Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);

    // route logout hanya bisa dilakukan saat login
    Route::post('/logout', [AuthManualController::class, 'logout'])->name('logout');
});

// 🟢 Route untuk login
Route::get('/login', [AuthManualController::class, 'index'])->name('login');
Route::post('/login', [AuthManualController::class, 'LoginProcces'])->name('loginprocces');

// 🌐 Halaman default redirect ke login
Route::get('/', function () {
    return redirect()->route('login');
});
