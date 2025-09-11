<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// (optional) you can "use" these instead of FQCNs in the schedule block
use Spatie\Health\Commands\DispatchQueueCheckJobsCommand;
use Spatie\Health\Commands\RunHealthChecksCommand;
use Spatie\Health\Commands\ScheduleCheckHeartbeatCommand;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        // api: __DIR__ . '/../routes/api.php', // enable if/when needed
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Spatie Permission middleware aliases
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);

        // ApplyTheme runs for all web requests (keeps Front public)
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\ApplyTheme::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Default exception handlers; customize if needed
    })
    ->withSchedule(function (Schedule $schedule): void {
        // === Queues / Horizon housekeeping ===
        $schedule->command('horizon:snapshot')->everyFiveMinutes();
        $schedule->command('queue:prune-batches --hours=48')->daily();
        $schedule->command('queue:prune-failed --hours=240')->daily();

        // === Backups (Spatie) ===
        $schedule->command('backup:run')->dailyAt('02:00');
        $schedule->command('backup:monitor')->dailyAt('08:00');

        // === Optional housekeeping ===
        $schedule->command('model:prune')->daily(); // for Prunable models
        if (class_exists(\Laravel\Telescope\Console\PruneCommand::class)) {
            $schedule->command('telescope:prune --hours=48')->daily();
        }

        // === Spatie Health: CORRECT commands for v1 ===
        // 1) Run all health checks and store results / notify if failing
        $schedule->command(RunHealthChecksCommand::class)->everyMinute(); // == "php artisan health:check"

        // 2) Queue heartbeat: dispatches a tiny job to verify the queue is moving
        $schedule->command(DispatchQueueCheckJobsCommand::class)->everyMinute();

        // 3) Schedule heartbeat: writes a cache timestamp; ScheduleCheck validates freshness
        $schedule->command(ScheduleCheckHeartbeatCommand::class)->everyMinute();
    })
    ->create();
