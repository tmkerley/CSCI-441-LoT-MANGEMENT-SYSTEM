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

        
        $i = 1;
        while ($i < 21) {                   //add 20 empty spaces
            \App\Models\Space::factory()->create([
                'space_no' => $i,
                'status' => 0
            ]);
            $i++;
        }

        while ($i < 61) {
            $space = \App\Models\Space::factory()->create([   //add 40 occupied spaces
            'space_no' => $i,                  
            'status' => 1]);
            $i++;
        }               
    }
}
