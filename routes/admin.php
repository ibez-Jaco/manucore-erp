<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\HealthController;
use App\Http\Controllers\Admin\LogsController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\CacheController;
use App\Http\Controllers\Admin\TemplatesController;

// ===============================
// Admin Routes (Protected)
// ===============================
Route::middleware(['auth', 'verified', 'role:Admin'])
    ->prefix('system/admin')
    ->as('admin.')
    ->group(function () {

        // Dashboard / Index
        Route::get('/', [UsersController::class, 'index'])->name('index');

        // User Management
        Route::get('/users', [UsersController::class, 'users'])->name('users');
        Route::get('/roles', [UsersController::class, 'roles'])->name('roles');

        // System Monitoring
        Route::get('/health', [HealthController::class, 'index'])->name('health');
        Route::get('/logs', [LogsController::class, 'index'])->name('logs');

        // Quick Actions
        Route::post('/backup', [BackupController::class, 'run'])->name('backup');
        Route::post('/cache/clear', [CacheController::class, 'clear'])->name('cache.clear');

        // Templates (Admin-facing management)
        Route::get('/templates', [TemplatesController::class, 'index'])->name('templates');
    });

// ===============================
// Templates (Developer Reference)
// ===============================
Route::prefix('templates')
    ->name('templates.')
    ->group(function () {
        // Pages
        Route::get('/', [TemplatesController::class, 'index'])->name('index');
        Route::get('/page-template', fn () => view('admin.templates.page-template'))->name('page-template');
        Route::get('/simple-page', fn () => view('admin.templates.simple-page'))->name('simple-page');
        Route::get('/form-page', fn () => view('admin.templates.form-page'))->name('form-page');
        Route::get('/table-page', fn () => view('admin.templates.table-page'))->name('table-page');
        Route::get('/dashboard-page', fn () => view('admin.templates.dashboard-page'))->name('dashboard-page');

        // Components
        Route::prefix('components')->name('components.')->group(function () {
            Route::get('/cards', fn () => view('admin.templates.components.card-examples'))->name('cards');
            Route::get('/forms', fn () => view('admin.templates.components.form-examples'))->name('forms');
            Route::get('/buttons', fn () => view('admin.templates.components.button-examples'))->name('buttons');
            Route::get('/tables', fn () => view('admin.templates.components.table-examples'))->name('tables');
        });
    });
