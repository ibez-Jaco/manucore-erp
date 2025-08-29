<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Settings\CompanyController;

Route::get('/system/settings', [CompanyController::class, 'index'])->name('settings.index');
Route::get('/system/settings/company', [CompanyController::class, 'company'])->name('settings.company');
Route::get('/system/settings/branches', [CompanyController::class, 'branches'])->name('settings.branches');
