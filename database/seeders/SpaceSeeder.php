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
        $i = 1;
        $initialLat = 40.554493;
        $initialLong = -111.892439;      //start line

        while ($i < 52) {
            if ($i == 27) {  
                $initialLat = 40.554493;                                    //limit reached, move to next line on map
                $initialLong = -111.892230; 
            }
            $rand = rand(0,10);
            if ($rand > 8)  {                                   //30 percent chance to be emmpty (status = 0)
                \App\Models\Space::factory()->create([
                'status' => 0,
                //lat = inital GPS + space number * space adjustment
                'latitude' => $initialLat,
                //lng = initial GPS + row number * 2x drive adjustment
                'longitude' => $initialLong
            ]);
            }               
            
            else {                                               // create occupied space
                \App\Models\Space::factory()->create([
                'status' => 1,
                //lat = inital GPS + space number * space adjustment
                'latitude' => $initialLat,
                //lng = initial GPS + row number * 2x drive adjustment
                'longitude' => $initialLong
            ]);
            }
            $initialLat += .000024;                              //move along line
            $i++;   
        }          
            
    
        
        
            

           /* // inital logic to fix drive aisle vs adj row parking

            //odd row has a drive aisle adjustment
            if ($space->space_id % 100 / 20 == 0)
            {
                //lng = initial GPS + row number * 2x drive adjustment
                'longitude' => -94.1849862241621 + (
                ($space->space_id % 100) / 10) * (2 * 0.0000021076959)
            }
            
            else 
            {
                //lng = initial GPS + row number * 2x drive adjustment
                'longitude' => -94.1849862241621 + (
                    ($space->space_id % 100) / 10) * (2 * 0.0000004900117)

            }*/
    }
}
