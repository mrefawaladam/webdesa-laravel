<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LaporanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_halaman_laporan_apbdes()
    // {
    //     $response = $this->get('/laporan-apbdes?jenis=laporan&tahun=2022');

    //     $response->assertStatus(200);
    // }
    public function test_halaman_laporan_apbdes_grafik()
    {
        $response = $this->get('/laporan-apbdes?jenis=grafik&tahun=2022');

        $response->assertStatus(200);
    }
}
