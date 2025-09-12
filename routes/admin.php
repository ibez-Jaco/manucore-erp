<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\CacheController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HealthController;
use App\Http\Controllers\Admin\LogsController;
use App\Http\Controllers\Admin\TemplatesController;
use App\Http\Controllers\Admin\UsersController;

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
| Prefix: /system/admin
| Name:   admin.*
| RBAC:   role:Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'role:Admin'])
    ->prefix('system/admin')
    ->as('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        // --- Users: legacy index name for sidebar (admin.users) + full CRUD ---
        Route::get('/users', [UsersController::class, 'index'])->name('users'); // legacy index name
        Route::resource('users', UsersController::class)
            ->except(['show','index'])
            ->names('users');

        // Custom user actions
        Route::post('/users/{user}/toggle-active', [UsersController::class, 'toggleActive'])->name('users.toggle-active');
        Route::post('/users/{user}/roles', [UsersController::class, 'assignRoles'])->name('users.roles');
        Route::post('/users/{user}/resend-verification', [UsersController::class, 'resendVerification'])->name('users.resend-verification');

        // Role quick view
        Route::get('/roles', [UsersController::class, 'roles'])->name('roles');

        // System Health
        Route::get('/health', [HealthController::class, 'index'])->name('health');

        // Logs
        Route::get('/logs', [LogsController::class, 'index'])->name('logs');
        Route::prefix('logs')->as('logs.')->group(function () {
            Route::get('/tail', [LogsController::class, 'tail'])->name('tail');
            Route::get('/download', [LogsController::class, 'download'])->name('download');
            Route::post('/rotate', [LogsController::class, 'rotate'])->name('rotate');
            Route::post('/purge', [LogsController::class, 'purge'])->name('purge');
        });

        // Quick Actions
        Route::post('/backup', [BackupController::class, 'run'])->name('backup');
        Route::post('/cache/clear', [CacheController::class, 'clear'])->name('cache.clear');

        // Developer Templates (GATED)
        Route::get('/templates', [TemplatesController::class, 'index'])->name('templates');
        Route::prefix('templates')->as('templates.')->group(function () {
            Route::view('/page-template',  'admin.templates.page-template')->name('page-template');
            Route::view('/simple-page',    'admin.templates.simple-page')->name('simple-page');
            Route::view('/form-page',      'admin.templates.form-page')->name('form-page');
            Route::view('/table-page',     'admin.templates.table-page')->name('table-page');
            Route::view('/dashboard-page', 'admin.templates.dashboard-page')->name('dashboard-page');
            Route::prefix('components')->as('components.')->group(function () {
                Route::view('/cards',   'admin.templates.components.card-examples')->name('cards');
                Route::view('/forms',   'admin.templates.components.form-examples')->name('forms');
                Route::view('/buttons', 'admin.templates.components.button-examples')->name('buttons');
                Route::view('/tables',  'admin.templates.components.table-examples')->name('tables');
                Route::view('/misc',    'admin.templates.components.misc-examples')->name('misc');
            });
        });
    });
