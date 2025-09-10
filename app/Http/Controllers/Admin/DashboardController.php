<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Safe, lightweight metrics with graceful fallbacks if tables/backends differ.
        $stats = [
            'users'     => $this->countUsers(),
            'sessions'  => $this->countSessions(),   // will return 0 if using file/redis driver or no table
            'jobs'      => $this->countJobs(),       // will return 0 if queue tables aren’t present
            'health_ok' => true,                     // visual only for 6.1; spatie/health can wire real checks later
        ];

        return view('admin.index', compact('stats'));
    }

    protected function countUsers(): int
    {
        try {
            return User::query()->count();
        } catch (\Throwable $e) {
            return 0;
        }
    }

    protected function countSessions(): int
    {
        // Only works if using the database session driver and the sessions table exists
        try {
            return DB::table('sessions')->count();
        } catch (\Throwable $e) {
            return 0;
        }
    }

    protected function countJobs(): int
    {
        // Counts pending jobs in the default DB queue (if present)
        try {
            return DB::table('jobs')->count();
        } catch (\Throwable $e) {
            return 0;
        }
    }
}
