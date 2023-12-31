<?php

declare(strict_types=1);

namespace App\Queries\Projects;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

final class FetchProjectById
{
    public function handle(string $ulid, array $include = []): Model|Project|null
    {
        return Project::query()
            ->with($include)
            ->findOrFail(
                id: $ulid
            );
    }
}
