<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.index', ['theme' => session('theme', 'blue')]);
    }

    public function users()
    {
        return view('admin.users', ['theme' => session('theme', 'blue')]);
    }

    public function roles()
    {
        return view('admin.roles', ['theme' => session('theme', 'blue')]);
    }
}
