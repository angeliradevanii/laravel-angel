<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentationFileController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

// Halaman donasi dan penyimpanan data donation
Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
Route::get('/donasi/{campaign}/create', [DonasiController::class, 'create'])->name('donation.create');
Route::post('/donasi', [DonasiController::class, 'store'])->name('donation.store');

// Campaign CRUD
Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign.index');
Route::get('/campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
Route::post('/campaign', [CampaignController::class, 'store'])->name('campaign.store');
Route::get('/campaign/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaign.edit');
Route::put('/campaign/{campaign}', [CampaignController::class, 'update'])->name('campaign.update');
Route::delete('/campaign/{campaign}', [CampaignController::class, 'destroy'])->name('campaign.destroy');

// Manajemen file dan gambar
Route::get('/documentations', [DocumentationFileController::class, 'index'])->name('documentations.index');
Route::post('/documentations', [DocumentationFileController::class, 'store'])->name('documentations.store');
Route::get('/documentations/{documentationFile}/download', [DocumentationFileController::class, 'download'])->name('documentations.download');
Route::delete('/documentations/{documentationFile}', [DocumentationFileController::class, 'destroy'])->name('documentations.destroy');