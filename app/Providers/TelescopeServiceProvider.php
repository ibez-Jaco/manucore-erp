<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // If you want dark mode:
        // Telescope::night();

        $this->hideSensitiveRequestDetails();

        $isDev = app()->environment(['local', 'development', 'staging'])
            || (bool) config('telescope.enabled', true); // respects TELESCOPE_ENABLED=true

        Telescope::filter(function (IncomingEntry $entry) use ($isDev) {
            return $isDev
                || $entry->isReportableException()
                || $entry->isFailedRequest()
                || $entry->isFailedJob()
                || $entry->isScheduledTask()
                || $entry->hasMonitoredTag();
        });
    }

    /**
     * Prevent sensitive request details from being logged by Telescope.
     */
    protected function hideSensitiveRequestDetails(): void
    {
        if (app()->environment('local')) {
            return;
        }

        Telescope::hideRequestParameters(['_token']);

        Telescope::hideRequestHeaders([
            'cookie',
            'x-csrf-token',
            'x-xsrf-token',
            'authorization',
        ]);
    }

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewTelescope', function ($user = null) {
            // Allow freely on local/dev/staging
            if (app()->environment(['local', 'development', 'staging'])) {
                return true;
            }

            // Otherwise require an authenticated Admin (spatie/laravel-permission)
            return $user
                && method_exists($user, 'hasRole')
                && $user->hasRole('Admin');
        });
    }
}
