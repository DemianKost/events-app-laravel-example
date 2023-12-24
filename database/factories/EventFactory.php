<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
final class EventFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'icon' => $this->faker->word(),
            'parser' => null,
            'description' => $this->faker->paragraph(),
            'notify' => false,
            'tags' => [],
            'meta' => [],
            'channel_id' => Channel::factory(),
        ];
    }
}
