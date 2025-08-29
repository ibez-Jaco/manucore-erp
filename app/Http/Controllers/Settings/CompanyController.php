<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        return view('settings.index', ['theme' => session('theme', 'blue')]);
    }

    public function company()
    {
        return view('settings.company', ['theme' => session('theme', 'blue')]);
    }

    public function branches()
    {
        return view('settings.branches', ['theme' => session('theme', 'blue')]);
    }
}
