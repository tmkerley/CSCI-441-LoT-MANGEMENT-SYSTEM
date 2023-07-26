<?php

namespace Tests\Feature;

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteCarTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;
    public function test_successful_response_delete_car(): void
    {
        $car = Car::where('space_id', '=', 1)->first();
        $response = $this->json('delete', route('cars.destroy', ['id' => $car->vinNo]));
 
        $response
            ->assertStatus(302);
    }
}
