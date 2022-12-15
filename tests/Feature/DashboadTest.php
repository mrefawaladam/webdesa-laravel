<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class DashboadTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_open_dashboard()
    {
        // $this->seed();
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
    
    }

    public function test_grafik_surat_harian()
    {
        // $this->seed();
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertSeeText('Grafik Cetak Surat Harian');   
        $response->assertStatus(200);

    }


    public function test_grafik_surat_bulanan()
    {
        // $this->seed();
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertSeeText('Grafik Cetak Surat Bulanan');   
        $response->assertStatus(200);

    }
}
