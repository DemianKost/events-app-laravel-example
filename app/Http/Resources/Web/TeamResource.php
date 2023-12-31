<?php

declare(strict_types=1);

namespace App\Http\Resources\Web;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Team $resource
 */
final class TeamResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'name' => $this->resource->name,
            'personal' => $this->resource->personal_team,
            'projects' => ProjectResource::collection(
                resource: $this->whenLoaded(
                    relationship: 'projects'
                ),
            ),
        ];
    }
}
