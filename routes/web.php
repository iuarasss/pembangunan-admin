<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/proyek', [ProyekController::class, 'index']);

Route::get('/tahapan', [TahapanController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::resource('warga', WargaController::class);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('proyek', ProyekController::class);

Route::resource('user', UserController::class);

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
