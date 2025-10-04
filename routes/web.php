<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/proyek', [ProyekController::class, 'index']);

Route::get('/tahapan', [TahapanController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
});
