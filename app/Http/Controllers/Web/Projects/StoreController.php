<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Projects;

use App\Http\Controllers\Web\Projects\IndexController;
use App\Http\Requests\Web\Projects\StoreRequest;
use App\Jobs\Web\Projects\CreateNewProject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Auth\Factory;
use JustSteveKing\Launchpad\Queue\DispatchableCommandBus;
use function action;

final class StoreController
{
    public function __construct(
        private readonly Factory $auth,
        private readonly DispatchableCommandBus $bus,
    ) {}

    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $this->bus->dispatch(
            job: new CreateNewProject(
                name: $request->string('name')->toString(),
                team: (string) $this->auth->guard()->user()->current_team_id,
            ),
        );

        return new RedirectResponse(
            url: action(IndexController::class),
        );
    }
}
