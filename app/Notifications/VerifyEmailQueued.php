<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmailQueued extends BaseVerifyEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Map notification channels to queues.
     * Ensure the "mail" channel uses the dedicated "mail" queue.
     */
    public function viaQueues(): array
    {
        return [
            'mail' => 'mail',
            // 'database' => 'default', // example if you add DB channel later
        ];
    }
}
