<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('api.reset-password');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/ranking/{movementId}', [RankingController::class, 'ranking'])->name('api.ranking');
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
});