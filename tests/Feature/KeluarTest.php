<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KeluarTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_logout()
    {
        $credential = [
                'email' => 'admin@gmail.com',
                'password' => 'password'
        ];

                $response = $this->post('masuk', $credential);

                $response = $this->get('http://localhost:8000/');

                $response = $this->post('keluar');


                $response->assertStatus(500);

    }
}
