<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('pengguna', PenggunaController::class);
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');

Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
Route::post('/pengguna/create', [PenggunaController::class, 'storeCreate'])->name('pengguna.storeCreate');

Route::get('/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
Route::put('/pengguna/edit/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');

Route::get('/pengguna/detail/{id}', [PenggunaController::class, 'show'])->name('pengguna.show');


