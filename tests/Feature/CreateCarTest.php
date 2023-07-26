<?php

namespace Tests\Feature;

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class CreateCarTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_example(): void
    {
        
        $response = $this->json('post', route('cars.create', ['vinNo' => 'HGTLMG78TOG5FMGS0',
                                                              'make' => 'Ferrari',
                                                              'model' => '1085',
                                                              'year' => '1985']));
 
        $response
            ->assertStatus(302);

        $car = Car::find('HGTLMG78TOG5FMGS0');
        $this->assertTrue(($car->vinNo == 'HGTLMG78TOG5FMGS0' &&
                           $car->space_id == NULL &&
                           $car->make == 'Ferrari' &&
                           $car->model == 1085 &&
                           $car->year == 1985 &&
                           $car->isBeingMoved == 0 ));
    }
}
