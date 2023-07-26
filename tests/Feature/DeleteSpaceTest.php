<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Space;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class DeleteSpaceTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;
    public function test_successful_response_delete_car(): void
    {
        $space = Space::where('id', '=', 1)->first();
        $response = $this->json('delete', route('spaces.destroy', ['id' => $space->id]));
 
        $response
            ->assertStatus(302);
        $this->assertDatabaseMissing('spaces', [
        'id' => 1
        ]);
        $this->assertDatabaseCount('spaces', 50);
        $car = Car::where('vinNo', '=', $space->car_vinNo)->first();    //make sure space_id on car in deleted space is set to null
        $this->assertTrue(($car->space_id == NULL));
    }
}