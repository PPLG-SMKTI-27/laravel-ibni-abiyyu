<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group.
|
*/

// Route utama menampilkan portofolio
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Route untuk login
Route::get('/login', [PortfolioController::class, 'showLogin'])->name('login');
Route::post('/login', [PortfolioController::class, 'login']);
Route::get('/logout', [PortfolioController::class, 'logout'])->name('logout');

// Route untuk admin features
Route::middleware(['web'])->group(function () {
    // Toggle edit mode
    Route::post('/toggle-edit', [PortfolioController::class, 'toggleEdit'])->name('toggle.edit');
    
    // Update portfolio data
    Route::post('/update-portfolio', [PortfolioController::class, 'updatePortfolio'])->name('update.portfolio');
    
    // Reset portfolio to default
    Route::post('/reset-portfolio', [PortfolioController::class, 'resetPortfolio'])->name('reset.portfolio');
    
    // Import default data to database
    Route::post('/import-default-data', [PortfolioController::class, 'importDefaultData'])->name('import.default');
});

// Route untuk testing database
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo(); // Gunakan DB:: saja (tanpa backslash) karena sudah di-import
        $dbName = DB::connection()->getDatabaseName();
        
        return response()->json([
            'status' => 'success',
            'message' => '✅ Database connection is working!',
            'database' => $dbName,
            'connection' => config('database.default')
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => '❌ Could not connect to database',
            'error' => $e->getMessage()
        ], 500);
    }
})->name('test.db');

// Route untuk melihat data di database (hanya untuk development)
if (app()->environment('local')) {
    Route::get('/debug-data', function () {
        try {
            $portfolio = App\Models\Portfolio::with('skills')->first();
            
            if (!$portfolio) {
                return response()->json([
                    'status' => 'info',
                    'message' => 'No portfolio data found in database. Please run: php artisan db:seed',
                    'suggestion' => 'Run: php artisan migrate:fresh --seed'
                ]);
            }
            
            return response()->json([
                'status' => 'success',
                'portfolio' => $portfolio->toArray(),
                'skills' => $portfolio->skills->toArray(),
                'total_skills' => $portfolio->skills->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error fetching data',
                'error' => $e->getMessage()
            ], 500);
        }
    })->name('debug.data');
    
    // Route tambahan untuk cek struktur tabel (opsional)
    Route::get('/debug-tables', function () {
        try {
            $tables = DB::select('SHOW TABLES');
            $database = DB::connection()->getDatabaseName();
            
            $structure = [];
            foreach ($tables as $table) {
                $tableName = array_values((array)$table)[0];
                $columns = DB::select("DESCRIBE {$tableName}");
                $structure[$tableName] = $columns;
            }
            
            return response()->json([
                'status' => 'success',
                'database' => $database,
                'tables' => $structure
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error fetching table structure',
                'error' => $e->getMessage()
            ], 500);
        }
    })->name('debug.tables');
}

// Fallback untuk semua route yang tidak terdaftar
Route::fallback(function () {
    return redirect('/');
});

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');