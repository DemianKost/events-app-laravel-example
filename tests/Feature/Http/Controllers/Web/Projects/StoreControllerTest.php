<?php

declare(strict_types=1);

use App\Jobs\Web\Projects\CreateNewProject;
use App\Http\Controllers\Web\Projects\StoreController;
use App\Http\Controllers\Web\Projects\IndexController;
use Illuminate\Support\Facades\Bus;

it('will redirect if not authenticated', function(): void {
    $this->post(
        uri: action(StoreController::class),
    )->assertRedirect(
        uri: '/login'
    );
})->group('projects');

it('will return validation errors', function(): void {
    $this->actingAs(createUser())->post(
        uri: action(StoreController::class)
    )->assertRedirect()->assertSessionHasErrors(
        keys: ['name'],
    );
})->group('projects');

it('will create a new project', function(): void {
    Bus::fake();

    $this->actingAs(createUser())->post(
        uri: action(StoreController::class),
        data: ['name' => 'test'],
    )->assertRedirect();

    Bus::assertDispatched(CreateNewProject::class);
})->group('projects');