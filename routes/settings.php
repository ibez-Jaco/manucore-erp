<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Settings\CompanyController;
use App\Http\Controllers\Settings\BrandingController;
use App\Http\Controllers\Settings\BranchController;
use App\Http\Controllers\Settings\TemplatesController;

Route::middleware(['auth','verified','role:Admin|SettingsManager'])
    ->prefix('system/settings')
    ->as('settings.')
    ->group(function () {

        // Overview landing
        Route::get('/', [CompanyController::class, 'index'])->name('index');

        // Company (Overview - legacy save kept for backward compat)
        Route::get('/company',  [CompanyController::class, 'company'])->name('company');
        Route::post('/company', [CompanyController::class, 'update'])->name('company.update');

        // Company split tabs
        Route::get('/company/basic',       [CompanyController::class, 'basic'])->name('company.basic');
        Route::post('/company/basic',      [CompanyController::class, 'basicUpdate'])->name('company.basic.update');

        Route::get('/company/contact',     [CompanyController::class, 'contact'])->name('company.contact');
        Route::post('/company/contact',    [CompanyController::class, 'contactUpdate'])->name('company.contact.update');

        Route::get('/company/address',     [CompanyController::class, 'address'])->name('company.address');
        Route::post('/company/address',    [CompanyController::class, 'addressUpdate'])->name('company.address.update');

        Route::get('/company/financial',   [CompanyController::class, 'financial'])->name('company.financial');
        Route::post('/company/financial',  [CompanyController::class, 'financialUpdate'])->name('company.financial.update');

        // Phase 4.5 - Banking & VAT (kept)
        Route::get('/company/finance',     [CompanyController::class, 'finance'])->name('company.finance');
        Route::post('/company/finance',    [CompanyController::class, 'financeUpdate'])->name('company.finance.update');

        // NEW tabs (kept for future)
        Route::get('/company/email',       [CompanyController::class, 'email'])->name('company.email');
        Route::post('/company/email',      [CompanyController::class, 'emailUpdate'])->name('company.email.update');

        Route::get('/company/infrastructure',  [CompanyController::class, 'infrastructure'])->name('company.infrastructure');
        Route::post('/company/infrastructure', [CompanyController::class, 'infrastructureUpdate'])->name('company.infrastructure.update');

        // ✅ ADD THESE TWO so your views stop 500ing
        Route::get('/company/system',     [CompanyController::class, 'system'])->name('company.system');
        Route::post('/company/system',    [CompanyController::class, 'systemUpdate'])->name('company.system.update');

        // Phase 4.6 — Templates (Email/Document templates ONLY)
        Route::get('/templates', [TemplatesController::class, 'edit'])->name('templates.edit');
        Route::post('/templates', [TemplatesController::class, 'update'])->name('templates.update');
        Route::post('/templates/preview', [TemplatesController::class, 'preview'])->name('templates.preview');
        Route::post('/templates/{slug}/reset', [TemplatesController::class, 'reset'])->name('templates.reset');

        // Branches
        Route::controller(BranchController::class)
            ->prefix('branches')
            ->as('branches.')
            ->group(function () {
                Route::get('/',              'index')->name('index');
                Route::get('/create',        'create')->name('create');
                Route::post('/',             'store')->name('store');
                Route::get('/{branch}/edit', 'edit')->name('edit');
                Route::put('/{branch}',      'update')->name('update');
                Route::delete('/{branch}',   'destroy')->name('destroy');

                Route::put('/{branch}/hours','updateHours')->name('hours.update');
                Route::post('/{branch}/restore','restore')->name('restore');
                Route::delete('/{branch}/force','forceDelete')->name('forceDelete');
            });

        // Branding (theme + uploads)
        Route::get('/branding',  [BrandingController::class, 'edit'])->name('branding.edit');
        Route::post('/branding', [BrandingController::class, 'update'])->name('branding.update');
        Route::post('/branding/logo/upload',   [BrandingController::class, 'uploadLogo'])->name('branding.logo.upload');
        Route::delete('/branding/logo/remove', [BrandingController::class, 'removeLogo'])->name('branding.logo.remove');
    });
