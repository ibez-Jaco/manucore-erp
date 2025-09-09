<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\HealthController;
use App\Http\Controllers\Admin\LogsController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\CacheController;
use App\Http\Controllers\Admin\TemplatesController;

// Apply middleware to all admin routes
Route::middleware(['auth', 'verified', 'role:Admin'])
    ->prefix('system/admin')
    ->as('admin.')
    ->group(function () {

        // Existing routes
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::get('/users', [UsersController::class, 'users'])->name('users');
        Route::get('/roles', [UsersController::class, 'roles'])->name('roles');

        // Enhanced sidebar routes
        Route::get('/health', [HealthController::class, 'index'])->name('health');
        Route::get('/logs', [LogsController::class, 'index'])->name('logs');
        
        // Quick action routes
        Route::post('/backup', [BackupController::class, 'run'])->name('backup');
        Route::post('/cache/clear', [CacheController::class, 'clear'])->name('cache.clear');

        // Templates (Admin)
        Route::get('/templates', [TemplatesController::class, 'index'])->name('templates');

    });