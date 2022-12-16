<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PemerintahanDesaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_open_pemerintahan_desa()
    {
        $response = $this->get('http://localhost:8000/pemerintahan-desa');

        $response->assertStatus(500);
    }
}
