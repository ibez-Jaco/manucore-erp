<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        // Keep API if you have one; add back here if needed:
        // api: __DIR__ . '/../routes/api.php',
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
        // Default exception handling; add reportable/renderable if needed
        // $exceptions->report(function (\Throwable $e) {});
        // $exceptions->render(function (\Throwable $e, $request) {});
    })
->withSchedule(function (Illuminate\Console\Scheduling\Schedule $schedule): void {
    // === Queues / Horizon housekeeping ===
    $schedule->command('horizon:snapshot')->everyFiveMinutes();
    $schedule->command('queue:prune-batches --hours=48')->daily();
    $schedule->command('queue:prune-failed --hours=240')->daily();

    // === Backups (Spatie) ===
    $schedule->command('backup:run')->dailyAt('02:00');
    $schedule->command('backup:monitor')->dailyAt('08:00');

    // === Optional housekeeping ===
    $schedule->command('model:prune')->daily(); // if you use Prunable models

    if (class_exists(\Laravel\Telescope\Console\PruneCommand::class)) {
        $schedule->command('telescope:prune --hours=48')->daily();
    }

    // === Spatie Health heartbeats (required for checks to pass) ===
    // These are the correct commands your version exposes:
    $schedule->command('health:queue-check-heartbeat')->everyMinute();
    $schedule->command('health:schedule-check-heartbeat')->everyMinute();
})

    ->create();
