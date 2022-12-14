<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
        $user = [
            'name' => 'demon',
            'email' => 'demon@gmail.com',
            'password' => 'qweqweqwe',
            'password_confirmation' => 'qweqweqwe',
        ];
        $response = $this->post('/api/users', $user, ['accept'=>'application/json']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'email' => 'demon@gmail.com',
        ]);
    }
}
