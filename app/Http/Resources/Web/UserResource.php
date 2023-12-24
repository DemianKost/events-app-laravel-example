<?php

declare(strict_types=1);

namespace App\Http\Resources\Web;

use App\Models\User;
use App\Http\Resources\Web\TeamResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JustSteveKing\Launchpad\Http\Resources\DateResource;

/**
 * @property-read User $resource
 */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'avatar' => $this->resource->profile_photo_url,
            'created' => new DateResource(
                resource: $this->resource->created_at
            ),
            'team' => new TeamResource(
                resource: $this->whenLoaded(
                    relationship: 'currentTeam'
                )
            ),
            'teams' => TeamResource::collection(
                resource: $this->whenLoaded(
                    relationship: 'teams',
                ),
            ),
        ];
    }
}
