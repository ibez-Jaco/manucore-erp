<?php

use Illuminate\Support\Facades\Route;

// Include surface-specific routes
require __DIR__.'/front.php';
require __DIR__.'/app.php';
require __DIR__.'/settings.php';
require __DIR__.'/admin.php';

// Fallback route
Route::fallback(function () {
    return view('errors.404');
});

// Include Breeze authentication routes
require __DIR__.'/auth.php';
