<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\Horizon;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * This gate determines who can access Horizon in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewHorizon', function ($user = null) {
            // Allow only authenticated Admins
            return $user && method_exists($user, 'hasRole') && $user->hasRole('Admin');
            // (Optionally allow more:)
            // return $user && $user->hasAnyRole(['Admin','SettingsManager']);
        });
    }
}
