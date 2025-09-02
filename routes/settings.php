<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Settings\CompanyController;
use App\Http\Controllers\Settings\BrandingController;

Route::middleware(['auth','verified','role:Admin|SettingsManager'])
    ->prefix('system/settings')
    ->as('settings.')
    ->group(function () {

        // Overview
        Route::get('/', [CompanyController::class, 'index'])->name('index');

        // Company + Branches (views only for now)
        Route::get('/company',  [CompanyController::class, 'company'])->name('company');
        Route::get('/branches', [CompanyController::class, 'branches'])->name('branches');

        // Branding (theme + uploads)
        Route::get('/branding',  [BrandingController::class, 'edit'])->name('branding.edit');
        Route::post('/branding', [BrandingController::class, 'update'])->name('branding.update');

        // Logo uploads/removals
        Route::post('/branding/logo/upload',  [BrandingController::class, 'uploadLogo'])->name('branding.logo.upload');
        Route::delete('/branding/logo/remove', [BrandingController::class, 'removeLogo'])->name('branding.logo.remove');
    });
