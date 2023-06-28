<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = \App\Models\Car::all();

        for ($i = 0; $i < 20; $i++) {                   //add 20 empty spaces
            \App\Models\Space::factory()->create();
        }

        foreach ($cars as $car) {
             \App\Models\Space::factory()->create([
                'car_id' => $car->id
             ]);
        }
    }
}
