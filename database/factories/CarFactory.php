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
            'vinNo' => fake()->regexify('[A-Z0-9]{17}'),
            'make' => fake()->randomElement( ["Abarth",
                                            "Alfa Romeo",
                                            "Aston Martin",
                                            "Audi",
                                            "Bentley",
                                            "BMW",
                                            "Bugatti",
                                            "Cadillac",
                                            "Chevrolet",
                                            "Chrysler",
                                            "Citroën",
                                            "Dacia",
                                            "Daewoo",
                                            "Daihatsu",
                                            "Dodge",
                                            "Donkervoort",
                                            "DS",
                                            "Ferrari",
                                            "Fiat",
                                            "Fisker",
                                            "Ford",
                                            "Honda",
                                            "Hummer",
                                            "Hyundai",
                                            "Infiniti",
                                            "Iveco",
                                            "Jaguar",
                                            "Jeep",
                                            "Kia",
                                            "KTM",
                                            "Lada",
                                            "Lamborghini",
                                            "Lancia",
                                            "Land Rover",
                                            "Landwind",
                                            "Lexus",
                                            "Lotus",
                                            "Maserati",
                                            "Maybach",
                                            "Mazda",
                                            "McLaren",
                                            "Mercedes-Benz",
                                            "MG",
                                            "Mini",
                                            "Mitsubishi",
                                            "Morgan",
                                            "Nissan",
                                            "Opel",
                                            "Peugeot",
                                            "Porsche",
                                            "Renault",
                                            "Rolls-Royce",
                                            "Rover",
                                            "Saab",
                                            "Seat",
                                            "Skoda",
                                            "Smart",
                                            "SsangYong",
                                            "Subaru",
                                            "Suzuki",
                                            "Tesla",
                                            "Toyota",
                                            "Volkswagen",
                                            "Volvo"]),
            'model' => fake()->numberBetween(100, 10000),
            'year' => fake()->numberBetween(1900, 2023),
        ];
    }
}
