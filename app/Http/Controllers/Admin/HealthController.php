<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class HealthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('role:Admin');
    }

    public function index()
    {
        $healthData = $this->performHealthChecks();

        return view('admin.health.index', compact('healthData'))->with([
            'breadcrumbs' => [
                ['label' => 'Administration', 'url' => route('admin.index')],
                ['label' => 'System Health', 'url' => null]
            ]
        ]);
    }

    private function performHealthChecks()
    {
        $checks = [];

        // Database health check
        try {
            $start = microtime(true);
            DB::connection()->getPdo();
            $responseTime = round((microtime(true) - $start) * 1000, 2);
            $checks['database'] = [
                'status' => 'healthy',
                'message' => 'Database connection successful',
                'response_time' => $responseTime . 'ms'
            ];
        } catch (\Exception $e) {
            $checks['database'] = [
                'status' => 'error',
                'message' => 'Database connection failed: ' . $e->getMessage(),
                'response_time' => null
            ];
        }

        // Cache health check
        try {
            Cache::put('health_check', 'test', 10);
            $cachedValue = Cache::get('health_check');
            $checks['cache'] = [
                'status' => $cachedValue === 'test' ? 'healthy' : 'warning',
                'message' => $cachedValue === 'test' ? 'Cache is working' : 'Cache read/write issue',
                'details' => 'Redis cache system'
            ];
        } catch (\Exception $e) {
            $checks['cache'] = [
                'status' => 'error',
                'message' => 'Cache system error: ' . $e->getMessage(),
                'details' => null
            ];
        }

        // Queue health check
        try {
            $queueConnection = config('queue.default');
            $checks['queue'] = [
                'status' => 'healthy',
                'message' => 'Queue system operational',
                'connection' => $queueConnection,
                'pending_jobs' => $this->getPendingJobsCount()
            ];
        } catch (\Exception $e) {
            $checks['queue'] = [
                'status' => 'error',
                'message' => 'Queue system error: ' . $e->getMessage(),
                'connection' => null
            ];
        }

        // Storage health check
        try {
            $totalSpace = disk_total_space(storage_path());
            $freeSpace = disk_free_space(storage_path());
            $usedPercentage = round((($totalSpace - $freeSpace) / $totalSpace) * 100, 1);
            
            $status = $usedPercentage > 90 ? 'error' : ($usedPercentage > 80 ? 'warning' : 'healthy');
            
            $checks['storage'] = [
                'status' => $status,
                'message' => "Disk usage: {$usedPercentage}%",
                'used_percentage' => $usedPercentage,
                'free_space' => $this->formatBytes($freeSpace),
                'total_space' => $this->formatBytes($totalSpace)
            ];
        } catch (\Exception $e) {
            $checks['storage'] = [
                'status' => 'error',
                'message' => 'Storage check failed: ' . $e->getMessage()
            ];
        }

        return $checks;
    }

    private function getPendingJobsCount()
    {
        try {
            return DB::table('jobs')->count();
        } catch (\Exception $e) {
            return 'Unknown';
        }
    }

    private function formatBytes($size)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = 0;
        while ($size >= 1024 && $i < count($units) - 1) {
            $size /= 1024;
            $i++;
        }
        return round($size, 2) . ' ' . $units[$i];
    }
}