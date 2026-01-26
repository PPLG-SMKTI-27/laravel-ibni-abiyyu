<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// Route utama menampilkan portofolio
Route::get('/', [PortfolioController::class, 'index']);

// Route untuk login
Route::get('/login', [PortfolioController::class, 'showLogin'])->name('login');
Route::post('/login', [PortfolioController::class, 'login']);
Route::get('/logout', [PortfolioController::class, 'logout']);

// Route untuk admin features
Route::post('/toggle-edit', [PortfolioController::class, 'toggleEdit'])->name('toggle.edit');
Route::post('/update-portfolio', [PortfolioController::class, 'updatePortfolio'])->name('update.portfolio');
Route::post('/reset-portfolio', [PortfolioController::class, 'resetPortfolio'])->name('reset.portfolio');

// Fallback untuk semua route yang tidak terdaftar
Route::any('{any}', function () {
    return redirect('/');
})->where('any', '.*');