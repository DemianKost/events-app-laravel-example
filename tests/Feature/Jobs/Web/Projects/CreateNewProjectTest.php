<?php

declare(strict_types=1);

use App\Models\Project;
use App\Jobs\Web\Projects\CreateNewProject;

it('it will create a new project', function(): void {
    $this->expect(Project::query()->count())->toEqual(0);

    $user = createUser(); 

    dispatch(new CreateNewProject(
        name: 'test',
        team: $user->current_team_id
    ));

    $this->expect(Project::query()->count())->toEqual(1);
})->group('projects');