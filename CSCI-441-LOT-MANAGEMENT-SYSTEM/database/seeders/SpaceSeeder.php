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

        

        for ($i = 1; $i < 11; $i++) {                   //add 10 empty spaces to lot A
            \App\Models\Space::factory()->create([
                'space_no' => $i,
                'lot_id' => 'A',
                'status' => 0
            ]);
        }
        for ($i = 1; $i < 11; $i++) {                   
            \App\Models\Space::factory()->create([      //add 10 empty spaces to lot B
                'space_no' => $i,
                'lot_id' => 'B',
                'status' => 0
            ]);
        }

        $i = 1;

        foreach ($cars as $car) {
            if ($i < 51) {
                \App\Models\Space::factory()->create([
                'car_id' => $car->id,
                'space_no' => $i + 10,                  //start at 11 in lot A (1-10 empty spaces)
                'lot_id' => 'A', 
                'status' => 1                    
                ]);
            }

            else 
            {
                \App\Models\Space::factory()->create([
                'car_id' => $car->id,
                'space_no' => ($i - 40),                   //start at 11 in lot B (1-10 empty spaces)
                'lot_id' => 'B',
                'status' => 1 ]);
            }
             
        }
    }
}
