<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Ingress;

use App\Http\Requests\Api\V1\Ingress\EventRequest;
use App\Jobs\V1\Ingress\CaptureEvent;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use JustSteveKing\Launchpad\Queue\DispatchableCommandBus;
use JustSteveKing\Launchpad\Http\Responses\MessageResponse;

final class EventStoreController
{
    public function __construct(
        private readonly DispatchableCommandBus $bus,
    ) {}

    public function __invoke(EventRequest $request): Responsable
    {
        $this->bus->dispatch( new CaptureEvent(
            payload: $request->payload()
        ) );

        return new MessageResponse(
            data: [
                'message' => 'We have accepted your request, and are processing it.'
            ],
            status: 202
        );
    }
}
