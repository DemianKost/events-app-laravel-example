<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Team;
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
    $user = User::factory()->create();
    $team = Team::factory()->for($user)->create();
    $user->forceFill([ 'current_team_id' => $team->getKey() ])->save();
    $user->refresh();

    $this->actingAs($user)->get(
        uri:  action(IndexController::class)
    )->assertStatus(
        status: 200
    )->assertInertia(fn (AssertableInertia $page) => $page
        ->component('Projects/Index')
    );
})->group('projects');
