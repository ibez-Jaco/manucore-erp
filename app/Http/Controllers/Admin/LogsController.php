<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('role:Admin');
    }

    public function index()
    {
        $logs = $this->getRecentLogs();
        
        return view('admin.logs.index', compact('logs'))->with([
            'breadcrumbs' => [
                ['label' => 'Administration', 'url' => route('admin.index')],
                ['label' => 'Audit Logs', 'url' => null]
            ]
        ]);
    }

    private function getRecentLogs()
    {
        // Sample log data - in a real implementation, you'd read from actual log files
        // or a dedicated audit log table
        return [
            [
                'id' => 1,
                'level' => 'info',
                'message' => 'User login successful',
                'user' => 'admin@ibez.co.za',
                'ip_address' => '192.168.1.100',
                'created_at' => now()->subMinutes(5),
                'context' => ['module' => 'auth', 'action' => 'login']
            ],
            [
                'id' => 2,
                'level' => 'warning',
                'message' => 'Failed login attempt',
                'user' => null,
                'ip_address' => '192.168.1.101',
                'created_at' => now()->subMinutes(15),
                'context' => ['module' => 'auth', 'action' => 'login_failed']
            ],
            [
                'id' => 3,
                'level' => 'info',
                'message' => 'Company settings updated',
                'user' => 'admin@ibez.co.za',
                'ip_address' => '192.168.1.100',
                'created_at' => now()->subHour(1),
                'context' => ['module' => 'settings', 'action' => 'company_update']
            ]
        ];
    }
}