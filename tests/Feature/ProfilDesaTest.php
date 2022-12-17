<?php

namespace Tests\Feature;

use App\Desa;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfilDesaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_admin_can_access_profil_desa()
    // {
    //     $credential = [
    //         'email' => 'admin@gmail.com',
    //         'password' => 'password'
    //     ];

    //     $response = $this->post('masuk',$credential);

    //     $response = $this->get('http://localhost:8000/profil-desa');
    //     $response->assertStatus(200);
    // }

    // public function test_admin_can_edit_profil_desa()
    // {
    //     $user = User::firstWhere('email', 'admin@gmail.com');
    //     $desa = Desa::query()->latest()->first();
    //     $response = $this->actingAs($user)->patch(
    //         route('update-desa', $desa->id),
    //         [
    //             'nama_desa' => 'Sukun',
    //         ]
    //     );

    //     $response->assertStatus(302);
    // }

    public function test_admin_minimal_fill_1_field()
    {
        $user = User::firstWhere('email', 'admin@gmail.com');
        $desa = Desa::query()->latest()->first();
        $response = $this->actingAs($user)->patch(
            route('update-desa', $desa->id),
            [

            ]
        );

        $response->assertInvalid([
            'Tidak ada perubahan yang berhasil disimpan'
        ]);

        $response->assertStatus(302);
    }
}

