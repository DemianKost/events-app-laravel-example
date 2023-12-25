<?php

declare(strict_types=1);

namespace App\Http\Resources\Web;

use App\Models\Project;
use App\Http\Resources\Web\ChannelResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Project $resource
 */
class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'name' => $this->resource->name,
            'status' => $this->resource->status->value,
            'channels' => ChannelResource::collection(
                resource: $this->whenLoaded(
                    relationship: 'channels',
                ),
            ),
        ];
    }
}
