<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\HorizonCheck;
use Spatie\Health\Checks\Checks\QueueCheck;
use Spatie\Health\Checks\Checks\RedisCheck;
use Spatie\Health\Checks\Checks\ScheduleCheck;

class HealthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // No bindings required for basic health checks
    }

    public function boot(): void
    {
        Health::checks([
            DatabaseCheck::new(),
            CacheCheck::new(),
            RedisCheck::new(),
            QueueCheck::new(),     // uses default queue connection
            ScheduleCheck::new(),  // goes green once cron runs
            HorizonCheck::new(),   // shows "Running" if Horizon is up
        ]);
    }
}
