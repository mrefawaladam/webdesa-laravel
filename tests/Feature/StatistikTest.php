<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatistikTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_halaman_galeri()
    {
        $response = $this->get('/statistik-penduduk');

        $response->assertStatus(200);
    }
}
