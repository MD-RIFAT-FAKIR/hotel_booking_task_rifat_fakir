<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\RoomCategory;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = RoomCategory::all();

        foreach ($categories as $category) {
            Booking::factory()->count(2)->create([
                'room_category_id' => $category->id,
            ]);
        }
    }
}
