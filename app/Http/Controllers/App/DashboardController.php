<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('app.dashboard', [
            'theme' => session('theme', 'blue'),
            'stats' => [
                'customers' => 150,
                'quotes' => 45,
                'revenue' => 125000,
                'pending' => 12
            ]
        ]);
    }

    public function analytics()
    {
        return view('app.analytics', ['theme' => session('theme', 'blue')]);
    }
}
