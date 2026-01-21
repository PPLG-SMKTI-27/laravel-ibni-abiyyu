<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// Route utama menampilkan portofolio
Route::get('/', [PortfolioController::class, 'index']);

// Fallback untuk semua route yang tidak terdaftar
Route::any('{any}', function () {
    return redirect('/');
})->where('any', '.*');