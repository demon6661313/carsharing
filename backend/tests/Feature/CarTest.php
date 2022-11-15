<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
            'vin' =>'qweqweqwe',
        ];
        $response = $this->post('/api/cars', $car, ['accept'=>'application/json']);
        
        $response->assertStatus(200);
        $this->assertDatabaseHas('cars', [
            'vin' => 'qweqweqwe',
        ]);
    }

    public function test_change_user(){
        $users = User::factory()->count(2)->create();

        $car = Car::factory()->create([
            'user_id'=>$users->first()->id,
        ]);

        $response = $this->put('/api/cars/'.$car->id, [
            'brand'=> $car->brand,
            'model'=>$car->model,
            'vin'=>$car->vin,
            'user_id'=>$users->last()->id,
        ], ['accept'=>'application/json']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('cars', [
            'user_id' => $users->last()->id,
        ]);
    }
}
