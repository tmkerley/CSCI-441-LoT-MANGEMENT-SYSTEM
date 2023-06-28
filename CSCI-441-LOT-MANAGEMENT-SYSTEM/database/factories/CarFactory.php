<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        return [
            'make' => fake()->sentence(1),
            'model' => fake()->numberBetween(100, 10000),
            'year' => fake()->numberBetween(1900, 2023),
        ];
    }
}
