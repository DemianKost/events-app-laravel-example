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
use App\Models\Event;
use JustSteveKing\Launchpad\Database\Portal;

class CaptureEvent implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly EventPayload $payload,
    ) {}

    public function handle(Portal $database): void
    {
        $database->transaction(
            callback: fn () => Event::query()->create($this->payload->toArray())
        );
    }
}
