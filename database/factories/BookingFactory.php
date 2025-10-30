<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\RoomCategory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $from = Carbon::now()->addDays(rand(1, 5));
        $to = (clone $from)->addDays(rand(1, 5));

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => '01' . $this->faker->numberBetween(100000000, 999999999),
            'room_category_id' => RoomCategory::inRandomOrder()->first()?->id ?? RoomCategory::factory(),
            'from_date' => $from->toDateString(),
            'to_date' => $to->toDateString(),
            'total_price' => $this->faker->numberBetween(8000, 20000),
        ];
    }
}
