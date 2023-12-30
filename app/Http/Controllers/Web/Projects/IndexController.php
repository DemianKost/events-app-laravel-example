<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Projects;

use App\Queries\Projects\FetchProjectsForTeam;
use App\Http\Resources\Web\ProjectResource;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Http\Request;
use Inertia\ResponseFactory;
use Inertia\Response;

final readonly class IndexController
{
    public function __construct(
        private readonly Factory $auth,
        private FetchProjectsForTeam $query,
        private ResponseFactory $response,
    ) {}

    public function __invoke(Request $request): Response
    {
        return $this->response->render(
            component: 'Projects/Index',
            props: [
                'projects' => ProjectResource::collection(
                    resource: $this->query->handle(
                        team: $this->auth->guard()->user()->current_team_id,
                        include: ['channels']
                    ),
                ),
            ],
        );
    }
}
