<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\CampaignController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

// Campaign CRUD
Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign.index');
Route::get('/campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
Route::post('/campaign', [CampaignController::class, 'store'])->name('campaign.store');
Route::get('/campaign/{id}/edit', [CampaignController::class, 'edit'])->name('campaign.edit');
Route::put('/campaign/{id}', [CampaignController::class, 'update'])->name('campaign.update');
Route::delete('/campaign/{id}', [CampaignController::class, 'destroy'])->name('campaign.destroy');
