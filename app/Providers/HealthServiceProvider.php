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
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;

class HealthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Nothing to bind for basic checks
    }

    public function boot(): void
    {
        Health::checks([
            DatabaseCheck::new(),                 // DB up?
            CacheCheck::new(),                    // cache ok?
            RedisCheck::new(),                    // Redis ping
            HorizonCheck::new(),                  // Horizon process running?
            ScheduleCheck::new(),                 // Will go green once cron runs at least once
            QueueCheck::new(),                    // Works once we schedule the dispatcher (next step)
            UsedDiskSpaceCheck::new()             // Storage headroom
                ->warnWhenUsedSpaceIsAbovePercentage(80)
                ->failWhenUsedSpaceIsAbovePercentage(90),
        ]);
    }
}
