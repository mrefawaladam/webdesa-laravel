<?php

namespace Tests\Feature;

use App\Models\User;
use App\PemerintahanDesa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KelolaInformasiPemerintahanDesaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_admin_can_open_kelola_informasi_pemerintahan_desa()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','admin@gmail.com');

        $response = $this->actingAs($user)->get(route('pemerintahan-desa.index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_add_kelola_informasi_pemerintahan_desa()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','admin@gmail.com');

        PemerintahanDesa::create([
            'gambar' => 'dana.jpg',
            'judul' => 'judul1',
            'konten' => 'konten'
        ]);

        $response = $this->actingAs($user)->get(route('pemerintahan-desa.store'));
        $response
            ->assertSee('judul')
            ->assertSee('konten');
    }

    public function test_admin_can_delete_kelolainformasi_pemerintahan_desa()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','admin@gmail.com');

        $pemerintahan = PemerintahanDesa::create([
            'gambar' => 'dana.jpg',
            'judul' => 'judul1',
            'konten' => 'konten'
        ]);

        $response = $this->actingAs($user)->delete(route('pemerintahan-desa.destroy',$pemerintahan->id));
        $response->assertStatus(302);

    }

    public function test_admin_can_update_informasi_pemerintahan_desa()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','admin@gmail.com');

        $pemerintahan = PemerintahanDesa::create([
            'gambar' => 'dana.jpg',
            'judul' => 'judul1',
            'konten' => 'konten'
        ]);

        $response = $this->actingAs($user)->put(route('pemerintahan-desa.destroy',$pemerintahan->id));
        $response->assertStatus(302);

    }
}
