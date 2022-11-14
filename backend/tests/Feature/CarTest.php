<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
        $car = [
            'brand' => 'Audi',
            'model' => 'A8',
            'vin' => 'qweqweqwe',
        ];
        $response = $this->post('/api/cars', $car);

        $response->assertStatus(200);
        $this->assertDatabaseHas('cars', [
            'vin' => 'qweqweqwe',
        ]);
    }
}
