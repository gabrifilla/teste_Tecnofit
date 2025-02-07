<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RankingController;

// Página de login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Registro de usuário
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Logout (necessário estar autenticado)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Reset de senha
Route::get('/reset-password', [AuthController::class, 'showResetPassword'])->name('password.request');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Página protegida de records (somente usuários logados)
Route::middleware('auth')->get('/records', [RankingController::class, 'showRecords'])->name('records.index');
