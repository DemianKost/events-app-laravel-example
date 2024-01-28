<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Projects;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;
use App\Http\Resources\Web\ProjectResource;
use App\Queries\Projects\FetchProjectById;
use App\Services\ReportingService;

final readonly class ShowController
{
    public function __construct(
        private readonly ResponseFactory $response,
        private FetchProjectById $query,
        private ReportingService $service,
    ) {
    }

    public function __invoke(Request $request, string $ulid): Response
    {
        return $this->response->render(
            component: 'Projects/Show',
            props: [
                'project' => new ProjectResource(
                    resource: $this->query->handle(
                        ulid: $ulid,
                        include: ['channels.events']
                    )
                ),
            ]
        );
    }
}
