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
           

           //'latitude' => fake()->randomFloat(13, -90, 90),
           //'longitude' => fake()->randomFloat(13, 0, 180),
        ];
    }

    public function configure()
    {
    return 
            $this->afterCreating(function ($space) {                                         //run after creating new space in seeder
                
                if ($space -> status == 1)     //occupied space, edit space
                {
                    $car = Car::factory()->create(['space_id' => $space->id]);                      //create new car 
                    $space -> car_vinNo = $car->vinNo;                                           //assign newly created car's ID to foreign key on space object
                    $space->save();
                }
                
            });
    }
}

