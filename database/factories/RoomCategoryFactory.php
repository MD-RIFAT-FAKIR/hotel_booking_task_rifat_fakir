<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomCategory>
 */
class RoomCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $categories = [
            ['name' => 'Premium Deluxe', 'base_price' => 12000],
            ['name' => 'Super Deluxe', 'base_price' => 10000],
            ['name' => 'Standard Deluxe', 'base_price' => 8000],
        ];

        return $this->faker->randomElement($categories);
    }
}
