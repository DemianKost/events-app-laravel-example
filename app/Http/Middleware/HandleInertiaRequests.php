<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use App\Http\Resources\Web\UserResource;

final class HandleInertiaRequests extends Middleware
{
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => ( auth()->check() ) ? $request->user()->load(['currentTeam.projects.channels'])
                        ? new UserResource(
                            resource: $request->user(0)
                        ) : null
                    : null,
            ],
            'ziggy' => function () use ($request): array {
                return array_merge((new Ziggy())->toArray(), [
                    'location' => $request->url(),
                ]);
            },
        ]);
    }
}
