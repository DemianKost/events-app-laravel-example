<?php

declare(strict_types=1);

namespace App\Http\Resources\Web;

use App\Models\Channel;
use App\Http\Resources\Web\EventResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Channel $resource
 */
class ChannelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'name' => $this->resource->name,
            'events' => EventResource::collection(
                resource: $this->whenLoaded(
                    relationship: 'events'
                )
            ),
        ];
    }
}
