<?php

// You can conditionally include dev-only providers here without breaking prod.
$providers = [
    App\Providers\AppServiceProvider::class,
    App\Providers\HealthServiceProvider::class,
    App\Providers\HorizonServiceProvider::class,
];

// Include Telescope only when installed and not in production
$env = env('APP_ENV', 'production');
if ($env !== 'production' && class_exists(\App\Providers\TelescopeServiceProvider::class)) {
    $providers[] = App\Providers\TelescopeServiceProvider::class;
}

return $providers;
