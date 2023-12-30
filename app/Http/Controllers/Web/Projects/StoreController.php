<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Projects;

use App\Http\Controllers\Web\Projects\IndexController;
use App\Http\Requests\Web\Projects\StoreRequest;
use Illuminate\Http\RedirectResponse;
use JustSteveKing\Launchpad\Queue\DispatchableCommandBus;
use function action;

final class StoreController
{
    public function __construct(
        private readonly DispatchableCommandBus $bus,
    ) {}

    public function __invoke(StoreRequest $request): RedirectResponse
    {


        return new RedirectResponse(
            url: action(IndexController::class),
        );
    }
}
