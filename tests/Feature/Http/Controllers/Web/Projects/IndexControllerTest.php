<?php

declare(strict_types=1);

use App\Http\Controllers\Web\Projects\IndexController;
use Inertia\Testing\AssertableInertia;

it('will redirect if not authenticated', function (): void {
    $this->get(
        uri: action(IndexController::class)
    )->assertRedirect(
        uri: '/login',
    );
})->group('projects');

it('will load the page and component correctly', function (): void {
    $this->actingAs(createUser())->get(
        uri:  action(IndexController::class)
    )->assertStatus(
        status: 200
    )->assertInertia(fn (AssertableInertia $page) => $page
        ->component('Projects/Index')
    );
})->group('projects');
