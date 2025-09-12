<?php

use Illuminate\Support\Str;

return [

    'domain' => env('HORIZON_DOMAIN'),

    // Admin surface
    'path' => env('HORIZON_PATH', 'admin/horizon'),

    'use' => 'default',

    'prefix' => env(
        'HORIZON_PREFIX',
        Str::slug(env('APP_NAME', 'laravel'), '_') . '_horizon:'
    ),

    // Lock Horizon UI to Admins
    'middleware' => ['web', 'auth', 'verified', 'role:Admin'],

    // Alert thresholds
    'waits' => [
        'redis:default' => 60,
        'redis:mail'    => 60,
    ],

    // Trim windows (minutes)
    'trim' => [
        'recent'        => 60,
        'pending'       => 60,
        'completed'     => 60,
        'recent_failed' => 10080,
        'failed'        => 10080,
        'monitored'     => 10080,
    ],

    'silenced' => [
        // App\Jobs\ExampleJob::class,
    ],

    'metrics' => [
        'trim_snapshots' => [
            'job'   => 24,
            'queue' => 24,
        ],
    ],

    'fast_termination' => false,

    'memory_limit' => 64,

    // Defaults for all envs
    'defaults' => [
        // Consumes the normal app jobs
        'supervisor-default' => [
            'connection'          => 'redis',
            'queue'               => ['default'],
            'balance'             => 'auto',
            'autoScalingStrategy' => 'time',
            'maxProcesses'        => 1,
            'maxTime'             => 0,
            'maxJobs'             => 0,
            'memory'              => 128,
            'tries'               => 1,
            'timeout'             => 60,
            'nice'                => 0,
        ],

        // Consumes email notifications, etc.
        'supervisor-mail' => [
            'connection'          => 'redis',
            'queue'               => ['mail'],
            'balance'             => 'auto',
            'autoScalingStrategy' => 'time',
            'maxProcesses'        => 1,
            'maxTime'             => 0,
            'maxJobs'             => 0,
            'memory'              => 128,
            'tries'               => 1,
            'timeout'             => 60,
            'nice'                => 0,
        ],
    ],

    'environments' => [
        'production' => [
            'supervisor-default' => [
                'maxProcesses'    => 10,
                'balanceMaxShift' => 1,
                'balanceCooldown' => 3,
            ],
            'supervisor-mail' => [
                'maxProcesses'    => 5,
                'balanceMaxShift' => 1,
                'balanceCooldown' => 3,
            ],
        ],

        'local' => [
            'supervisor-default' => [
                'maxProcesses' => 3,
            ],
            'supervisor-mail' => [
                'maxProcesses' => 2,
            ],
        ],
    ],
];
