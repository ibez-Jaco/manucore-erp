<?php

return [
    'result_stores' => [
        Spatie\Health\ResultStores\EloquentHealthResultStore::class => [
            'connection' => env('HEALTH_DB_CONNECTION', env('DB_CONNECTION')),
            'model' => Spatie\Health\Models\HealthCheckResultHistoryItem::class,
            'keep_history_for_days' => 5,
        ],
    ],

    'notifications' => [
        'enabled' => false, // ← keep false until MAIL_ is configured
        'notifications' => [
            Spatie\Health\Notifications\CheckFailedNotification::class => ['mail'],
        ],
        'notifiable' => Spatie\Health\Notifications\Notifiable::class,
        'throttle_notifications_for_minutes' => 60,
        'throttle_notifications_key' => 'health:latestNotificationSentAt:',
        'mail' => [
            'to' => env('HEALTH_EMAIL_TO', 'ops@ibez.co.za'),
            'from' => [
                'address' => env('MAIL_FROM_ADDRESS', 'noreply@ibez.co.za'),
                'name' => env('MAIL_FROM_NAME', 'ManuCore ERP'),
            ],
        ],
        'slack' => [
            'webhook_url' => env('HEALTH_SLACK_WEBHOOK_URL', ''),
            'channel' => null,
            'username' => null,
            'icon' => null,
        ],
    ],

    'oh_dear_endpoint' => [
        'enabled' => false,
        'always_send_fresh_results' => true,
        'secret' => env('OH_DEAR_HEALTH_CHECK_SECRET'),
        'url' => '/oh-dear-health-check-results',
    ],

    'horizon' => [
        'heartbeat_url' => env('HORIZON_HEARTBEAT_URL', null),
    ],

    'schedule' => [
        'heartbeat_url' => env('SCHEDULE_HEARTBEAT_URL', null),
    ],

    'theme' => 'light',
    'silence_health_queue_job' => true,
    'json_results_failure_status' => 200,
    'secret_token' => env('HEALTH_SECRET_TOKEN') ?: null,
    // 'treat_skipped_as_failure' => false,
];
