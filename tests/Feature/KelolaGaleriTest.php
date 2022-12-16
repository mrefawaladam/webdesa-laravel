<?php

namespace Tests\Feature;

use App\Gallery;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class KelolaGaleriTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_access_kelola_galeri()
    {
        $credential = [
            'email' => 'admin@gmail.com',
            'password' => 'password'
        ];

        $response = $this->post('masuk',$credential);

        $response = $this->get('http://localhost:8000/kelola-gallery');
        $response->assertStatus(200);
    }

    public function test_admin_can_tambah_galeri()
    {
        Storage::fake('avatars');

        $response = $this->withoutMiddleware()->post('gallery', [
            'gambar' => UploadedFile::fake()->image('avatar.jpg'),
            'caption' => 'Caption Test'
        ]);

        $response->assertValid([' Gambar berhasil ditambahkan ']);
        $response->assertStatus(302);
    }

    public function test_gambar_field_is_required_when_tambah_galeri()
    {

        $response = $this->withoutMiddleware()->post('gallery', [
            'gambar' => '',
            'caption' => 'Caption Test'
        ]);

        $response->assertInvalid([
            'gambar' => 'The gambar field is required.',
        ]);

        $response->assertStatus(302);
    }

    public function test_admin_can_hapus_galeri()
    {
        Storage::fake('avatars');

        $user = User::firstwhere('email', 'admin@gmail.com');

         $galeri = Gallery::create([
            'gallery' => UploadedFile::fake()->image('avatar.jpg'),
            'caption' => 'Caption Test'
        ]);

        $response = $this->actingAs($user)->delete(route('gallery.destroy', $galeri->id));
        $response->assertStatus(302);
    }
}
