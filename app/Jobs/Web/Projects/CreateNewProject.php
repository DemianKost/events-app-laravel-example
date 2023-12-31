<?php

declare(strict_types=1);

namespace App\Jobs\Web\Projects;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use JustSteveKing\Launchpad\Database\Portal;
use App\Models\Project;

final class CreateNewProject implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue; 
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly string $name,
        public readonly string $team, 
    ) {}
 
    public function handle(Portal $database): void
    {
        $database->transaction(
            callback: fn() => Project::query()->create([
                'name' => $this->name,
                'team_id' => $this->team,
            ]),
        );
    }
}
