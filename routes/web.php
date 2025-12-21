<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MediaController;
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

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('checkislogin');

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

Route::get('/proyek/{id}', [ProyekController::class, 'show'])->name('proyek.show');

Route::post('/media/upload', [MediaController::class, 'store'])->name('media.upload');

Route::get('/kontak', function () {
    return view('pages.kontak.kontak');
})->name('kontak');

Route::resource('progres-proyek', ProgresController::class);
Route::resource('lokasi-proyek', LokasiController::class);
Route::resource('kontraktor', KontraktorController::class);
