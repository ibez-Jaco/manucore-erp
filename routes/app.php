<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\DashboardController;

// App Surface Routes (Authenticated ERP Area)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('dashboard.analytics');
});
