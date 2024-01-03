<?php

declare(strict_types=1);

namespace App\Jobs\Api\V1\Ingress;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Payloads\Ingress\EventPayload;

class CaptureEvent implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly EventPayload $payload,
    ) {}

    public function handle(): void
    {
        
    }
}
