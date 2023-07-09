<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Space>
 */
class SpaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //Space_id example: 132 is lot->row->space
    //space_id should start at 100
    public function definition(): array
    {
        return [
            //lat = inital GPS + space number * space adjustment
            'latitude' => 36.3393926944135 + (
                ((int)'space_no' % 100) % 10) * 0.0000244211719,
            //lng = initial GPS + row number * 2x drive adjustment
            'longitude' => -94.1849862241621 + (
                ((int)'space_no' % 100) / 10) * (2 * 0.0000021076959),

            /***** inital logic to fix drive aisle vs adj row parking

            //odd row has a drive aisle adjustment
            if (int('space_id') % 100 / 20 == 0)
            {
                //lng = initial GPS + row number * 2x drive adjustment
                'longitude' => -94.1849862241621 + (
                (int('space_id') % 100) / 10) * (2 * 0.0000021076959)
            }
            
            else 
            {
                //lng = initial GPS + row number * 2x drive adjustment
                'longitude' => -94.1849862241621 + (
                    (int('space_id') % 100) / 10) * (2 * 0.0000004900117)

            }
            *******/
        ];
    }

    public function configure()
    {
    return 
            $this->afterCreating(function ($space) {                                         //run after creating new space in seeder
                
                if ($space -> status == 1)     //occupied space, edit space
                {
                    $car = Car::factory()->create(['space_id' => $space->id]);                      //create new car 
                    $space -> car_vinNo = $car -> vinNo;                                           //assign newly created car's ID to foreign key on space object
                    $space->save();
                }
                
            });
    }
}

