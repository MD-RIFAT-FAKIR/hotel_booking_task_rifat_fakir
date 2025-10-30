<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RoomCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_category_id' => RoomCategory::inRandomOrder()->first()?->id ?? RoomCategory::factory(),
            'room_number' => 'Room-' . $this->faker->unique()->numberBetween(100, 999),
        ];
    }
}
