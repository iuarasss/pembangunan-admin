<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\ProgresController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login-form');
});

Route::get('/proyek', [ProyekController::class, 'index']);

Route::resource('tahapan', TahapanController::class);

Route::get('/auth', [AuthController::class, 'index']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::resource('warga', WargaController::class);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('proyek', ProyekController::class);

Route::resource('user', UserController::class);

Route::resource('progres', ProgresController::class);

Route::resource('lokasi', LokasiController::class);

Route::resource('kontraktor', KontraktorController::class);

Route::get('/profile', function () {
    return view('profile');
})->name('user.profile');

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('proyek', ProyekController::class);
Route::resource('tahapan', TahapanController::class);
