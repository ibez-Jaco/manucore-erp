<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\HealthController;
use App\Http\Controllers\Admin\LogsController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\CacheController;
use App\Http\Controllers\Admin\TemplatesController;

// ======================================================================
// Admin Surface (Protected) — prefix /system/admin, names admin.*
// ======================================================================
Route::middleware(['auth', 'verified', 'role:Admin'])
    ->prefix('system/admin')
    ->as('admin.')
    ->group(function () {

        // Landing / Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        // User & Role Management
        Route::get('/users', [UsersController::class, 'users'])->name('users');
        Route::get('/roles', [UsersController::class, 'roles'])->name('roles');

        // System Monitoring
        Route::get('/health', [HealthController::class, 'index'])->name('health');
        Route::get('/logs', [LogsController::class, 'index'])->name('logs');

        // Quick Admin Actions
        Route::post('/backup', [BackupController::class, 'run'])->name('backup');
        Route::post('/cache/clear', [CacheController::class, 'clear'])->name('cache.clear');

        // ------------------------------------------------------------------
        // Developer Templates (GATED) - moved from public /templates
        // Routes: admin.templates.*
        // Paths:  /system/admin/templates/*
        // ------------------------------------------------------------------
        Route::prefix('templates')->as('templates.')->group(function () {
            Route::get('/', [TemplatesController::class, 'index'])->name('index');

            // Page templates
            Route::get('/page-template', fn () => view('admin.templates.page-template'))->name('page-template');
            Route::get('/simple-page', fn () => view('admin.templates.simple-page'))->name('simple-page');
            Route::get('/form-page', fn () => view('admin.templates.form-page'))->name('form-page');
            Route::get('/table-page', fn () => view('admin.templates.table-page'))->name('table-page');
            Route::get('/dashboard-page', fn () => view('admin.templates.dashboard-page'))->name('dashboard-page');

            // Components
            Route::prefix('components')->as('components.')->group(function () {
                Route::get('/cards', fn () => view('admin.templates.components.card-examples'))->name('cards');
                Route::get('/forms', fn () => view('admin.templates.components.form-examples'))->name('forms');
                Route::get('/buttons', fn () => view('admin.templates.components.button-examples'))->name('buttons');
                Route::get('/tables', fn () => view('admin.templates.components.table-examples'))->name('tables');
            });
        });
    });

// NOTE: The previous public /templates route group has been intentionally removed
// to ensure the gallery is Admin-only. If you want a dev-only alias during local
// development, uncomment the block below.
/*
if (app()->environment('local')) {
    Route::redirect('/templates', '/system/admin/templates', 302);
}
*/
