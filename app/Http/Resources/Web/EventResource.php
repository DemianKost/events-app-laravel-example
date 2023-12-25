<?php

namespace App\Http\Resources\Web;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Event $resource
 */
class EventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'name' => $this->resource->name,
            'icon' => $this->resource->icon,
            'description' => $this->resource->description,
            'notify' => $this->resource->notify,
            'tags' => $this->resource->tags,
            'meta' => $this->resource->meta
        ];
    }
}
