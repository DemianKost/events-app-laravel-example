<?php

declare(strict_types=1);

namespace App\Queries\Projects;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

final class FetchProjectsForTeam
{
    public function handle(string $team, array $include = []): Collection
    {
        return Project::query()
            ->with($include)
            ->where('team_id', $team)
            ->get();
    }
}
