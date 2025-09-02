<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Settings\CompanyController;
use App\Http\Controllers\Settings\BrandingController;

Route::middleware(['auth','verified','role:Admin|SettingsManager'])->group(function () {

    // Existing system routes (keep these)
    Route::get('/system/settings', [CompanyController::class, 'index'])->name('settings.index');
    Route::get('/system/settings/company', [CompanyController::class, 'company'])->name('settings.company');
    Route::get('/system/settings/branches', [CompanyController::class, 'branches'])->name('settings.branches');

    // New Branding routes (this 4.2 task)
    Route::get('/system/settings/branding', [BrandingController::class, 'edit'])->name('settings.branding.edit');
    Route::post('/system/settings/branding', [BrandingController::class, 'update'])->name('settings.branding.update');
});
