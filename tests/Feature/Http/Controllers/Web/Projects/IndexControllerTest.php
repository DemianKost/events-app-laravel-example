<?php

declare(strict_types=1);

use App\Models\User;
use App\Http\Controllers\Web\Projects\IndexController;

it('will redirect if not authenticated', function (): void {
    $this->get(
        uri: action(IndexController::class)
    )->assertRedirect(
        uri: '/login',
    );
})->group('projects');

it('will load the page and component correctly', function (): void {
    $this->actingAs(User::factory()->create())->get(
        uri:  action(IndexController::class)
    )->assertStatus(
        status: 200
    );
})->group('projects');
