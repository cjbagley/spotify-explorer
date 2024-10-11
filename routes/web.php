<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpotifyAuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/authentication-required', [SpotifyAuthController::class, 'index'])->name('auth-required');
    Route::post('/authentication-required',
        [SpotifyAuthController::class, 'authenticate'])->name('auth-required-continue');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
