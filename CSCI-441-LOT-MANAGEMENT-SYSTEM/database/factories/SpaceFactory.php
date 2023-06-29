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


    public function definition(): array
    {
        return [
        ];
    }

    public function configure()
    {
    return 
            $this->afterCreating(function ($space) {                                         //run after creating new space in seeder
                
                if ($space -> status == 1)     //occupied space, edit space
                {
                    $car = Car::factory()->create(['space_id' => $space->id]);               //create new car 
                    $space -> car_id = $car -> id;                                           //assign newly created car's ID to foreign key on space object
                    $space->save();
                }
                
            });
    }
}

