<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpotifyAuthController;
use App\Http\Middleware\HasValidSpotifyToken;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'verified', HasValidSpotifyToken::class])->group(function () {
    Route::get('/', DashboardController::class)
        ->name('dashboard');
});

Route::middleware(['web', 'auth', 'verified'])->group(function () {
    Route::get('/authentication-required', [SpotifyAuthController::class, 'index'])
        ->name('spotify.auth.required');

    Route::post('/authentication-required', [SpotifyAuthController::class, 'authenticate'])
        ->name('spotify.auth.required.post');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
