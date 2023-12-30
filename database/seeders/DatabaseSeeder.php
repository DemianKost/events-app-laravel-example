<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;
use App\Models\Project;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $team = Team::factory()->create();

        $user = User::first();
        $user->current_team_id = $team->id;
        $user->save();

        $project = Project::factory()->create([
            'team_id' => $team->id
        ]);
    }
}
