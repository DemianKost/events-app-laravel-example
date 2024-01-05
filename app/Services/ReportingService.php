<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

final class ReportingService
{
    public function projectAggregate(string $project): Collection
    {
        return Event::query()
            ->with(['channel'])
            ->where('project_id', $project)
            ->get();
    }
}