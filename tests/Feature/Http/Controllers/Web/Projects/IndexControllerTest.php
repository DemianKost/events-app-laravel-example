<?php

declare(strict_types=1);

use App\Http\Controllers\Web\Projects\IndexController;

it('will redirect if not authenticated', function(): void {
    $this->get(
        uri: action(IndexController::class)
    )->assertRedirect(
        uri: '/login',
    );
})->group('projects');

todo('will load the page and component correctly');