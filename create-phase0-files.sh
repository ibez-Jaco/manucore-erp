#!/bin/bash

echo "Creating ManuCore ERP Phase 0 Controllers..."

# Front/HomeController
cat > app/Http/Controllers/Front/HomeController.php << 'EOF'
<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home', ['theme' => session('theme', 'blue')]);
    }

    public function about()
    {
        return view('front.about', ['theme' => session('theme', 'blue')]);
    }

    public function contact()
    {
        return view('front.contact', ['theme' => session('theme', 'blue')]);
    }
}
EOF

# App/DashboardController
cat > app/Http/Controllers/App/DashboardController.php << 'EOF'
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
EOF

# Settings/CompanyController
cat > app/Http/Controllers/Settings/CompanyController.php << 'EOF'
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
EOF

# Admin/UsersController
cat > app/Http/Controllers/Admin/UsersController.php << 'EOF'
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
EOF

echo "Controllers created successfully!"
