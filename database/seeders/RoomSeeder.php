<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoomCategory;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (RoomCategory::all() as $category) {
            for ($i = 1; $i <= 3; $i++) {
                Room::create([
                    'room_category_id' => $category->id,
                    'room_number' => $category->name . '-' . $i,
                ]);
            }
        }
    }
}
