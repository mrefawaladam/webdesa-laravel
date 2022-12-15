<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GaleriTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_halaman_galeri()
    {
        $response = $this->get('/gallery');

        $response->assertStatus(200);
    }
}
