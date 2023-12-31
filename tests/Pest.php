<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Eloquent\Model;

uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\RefreshDatabase::class,
)->in('Feature');

function createUser(): User|Model
{
    $user = User::factory()->create();
    $team = Team::factory()->for($user)->create();
    $user->forceFill([ 'current_team_id' => $team->getKey() ])->save();
    $user->refresh();

    return $user;
}