<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;

Route::get('/system/admin', [UsersController::class, 'index'])->name('admin.index');
Route::get('/system/admin/users', [UsersController::class, 'users'])->name('admin.users');
Route::get('/system/admin/roles', [UsersController::class, 'roles'])->name('admin.roles');
