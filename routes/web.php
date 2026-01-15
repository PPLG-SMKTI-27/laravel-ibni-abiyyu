<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Route utama menampilkan portofolio
Route::get('/', [ProjectController::class, 'index']);

// Route untuk halaman project
Route::get('/project', [ProjectController::class, 'projects']);