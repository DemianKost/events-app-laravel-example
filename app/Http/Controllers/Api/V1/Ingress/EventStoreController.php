<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Ingress;

use App\Http\Requests\Api\V1\Ingress\EventRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;

final class EventStoreController
{
    public function __invoke(EventRequest $request): Responsable
    {
        
    }
}
