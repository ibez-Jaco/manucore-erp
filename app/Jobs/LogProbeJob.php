<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LogProbeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;

    public function handle(): void
    {
        Log::channel('single')->info('LogProbeJob handled: '.now()->toDateTimeString());

        @file_put_contents(
            storage_path('logs/queue_probe.log'),
            now()->toDateTimeString()." LogProbeJob handled\n",
            FILE_APPEND
        );
    }
}

