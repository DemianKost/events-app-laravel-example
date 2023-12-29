<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Projects;

use Illuminate\Contracts\Auth\Factory;
use Illuminate\Http\Request;

final readonly class IndexController
{
    public function __construct(
        private readonly Factory $auth,
        
    ) {}

    public function __invoke(Request $request)
    {
        dd( $this->auth->guard()->id() );
    }
}
