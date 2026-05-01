<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KontakController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
