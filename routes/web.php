<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RankingController;

Route::get('/', function () {
    return Auth::check() ? redirect()->route('records.index', ['movementId' => 1]) : redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'loginWeb'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logoutWeb'])->middleware('auth')->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/reset-password', [AuthController::class, 'showResetPassword'])->name('password.request');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::middleware('auth')->get('/records', [RankingController::class, 'showRecords'])->name('records.index');
