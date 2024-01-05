<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

final class ReportingService
{
    public function projectAggregate(string $project): Collection
    {
        return Event::query()
            ->with(['channel'])
            ->whereHas('channel', fn (Builder $builder) => $builder
                ->where('channels.project_id', $project)
            )->groupBy('events.channel_id ')->get();
    }
}