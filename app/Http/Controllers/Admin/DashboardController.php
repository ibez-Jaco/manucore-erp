<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Lightweight shell; your admin/index.blade.php already exists
        return view('admin.index');
    }
}
