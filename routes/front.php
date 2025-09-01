<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;

// Main routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/features', [HomeController::class, 'features'])->name('features');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/solutions', [HomeController::class, 'solutions'])->name('solutions');
Route::get('/integrations', [HomeController::class, 'integrations'])->name('integrations');

// Company routes
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

// Legal routes
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');

// Support routes
Route::get('/help', [HomeController::class, 'help'])->name('help');
Route::get('/api-docs', [HomeController::class, 'apiDocs'])->name('api-docs');
Route::get('/status', [HomeController::class, 'status'])->name('status');