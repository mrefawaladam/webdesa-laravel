<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LayananSuratTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_open_layanan_surat()
    {
        $response = $this->get('http://localhost:8000/layanan-surat');


        $response->assertStatus(200);
    }
}
