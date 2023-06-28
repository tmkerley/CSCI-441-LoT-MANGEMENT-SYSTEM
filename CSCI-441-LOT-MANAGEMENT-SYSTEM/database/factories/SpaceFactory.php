<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            $this->afterCreating(Car::factory() -> create([
            'space_id' => $this-> id
            ]);
        )
    }
}
