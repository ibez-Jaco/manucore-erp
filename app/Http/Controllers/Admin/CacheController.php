<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('role:Admin');
    }

    public function clear(Request $request)
    {
        try {
            // Clear various caches
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            
            // Clear OPCache if available
            if (function_exists('opcache_reset')) {
                opcache_reset();
            }

            return response()->json([
                'success' => true,
                'message' => 'All caches cleared successfully',
                'cleared' => [
                    'application_cache' => true,
                    'config_cache' => true,
                    'route_cache' => true,
                    'view_cache' => true,
                    'opcache' => function_exists('opcache_reset')
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to clear cache: ' . $e->getMessage()
            ], 500);
        }
    }
}