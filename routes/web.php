<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/proyek', [ProyekController::class, 'index']);

Route::get('/tahapan', [TahapanController::class, 'index']);
