<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
Route::resource('pengguna', PenggunaController::class);

