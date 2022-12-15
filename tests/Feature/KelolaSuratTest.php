<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KelolaSuratTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_create_kelola_surat()
    // {
    //     $response = $this->post('/masuk', [
    //         'email' => 'admin@gmail.com',
    //         'password' => 'password'
    //     ]);
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/dashboard');

    //     $response = $this->post('/surat', [
    //         'nama' => 'Testing',
    //         // 'icon' => 'fa-file-text-o',
    //         'deskripsi' => 'testing',
    //         'persyaratan' => 'testing',
    //     ]);
    //     $response->assertRedirect('/surat');
    // }

    // public function test_update_kelola_surat()
    // {
    //     $response = $this->post('/masuk', [
    //         'email' => 'admin@gmail.com',
    //         'password' => 'password'
    //     ]);
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/dashboard');

    //     $response = $this->put('/surat/4/edit', [
    //         // 'deskripsi' => 'testing',
    //         'persyaratan' => 'testing',
    //     ]);
    //     $response->assertRedirect('/surat');
    // }
    public function test_delete_kelola_surat()
    {
        $response = $this->post('/masuk', [
            'email' => 'admin@gmail.com',
            'password' => 'password'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->delete('/surat/4');
    }
}
