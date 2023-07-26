<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Space;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateSpaceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_example(): void
    {
        
        $response = $this->call('POST', route('spaces.create', ['latitude' => '50',
                                                                'longitude' => '50',]));
 
        $response
            ->assertStatus(302);
    }
}

