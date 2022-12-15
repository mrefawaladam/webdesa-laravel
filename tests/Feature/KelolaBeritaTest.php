<?php

namespace Tests\Feature;

use App\Berita;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class KelolaBeritaTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_access_kelola_berita()
    {
        $credential = [
            'email' => 'admin@gmail.com',
            'password' => 'password'
        ];

        $response = $this->post('masuk',$credential);

        $response = $this->get('http://localhost:8000/kelola-berita');
        $response->assertStatus(200);
    }

    public function test_admin_can_tambah_kelola_berita()
    {
        Storage::fake('avatars');

        $response = $this->withoutMiddleware()->post('berita', [
            'gambar' => UploadedFile::fake()->image('avatar.jpg'),
            'judul' => 'Judul Testing',
            'konten' => 'Konten Tes'
        ]);

        $response->assertValid(['Berita berhasil ditambahkan ']);
        $response->assertStatus(302);
    }

    public function test_judul_field_is_required_when_tambah_kelola_berita()
    {
        Storage::fake('avatars');

        $response = $this->withoutMiddleware()->post('berita', [
            'gambar' => UploadedFile::fake()->image('avatar.jpg'),
            'judul' => '',
            'konten' => 'Konten Tes'
        ]);

        $response->assertInvalid([
            'judul' => 'The judul field is required.'
        ]);

        $response->assertStatus(302);
    }

    public function test_konten_field_is_required_when_tambah_kelola_berita()
    {
        Storage::fake('avatars');

        $response = $this->withoutMiddleware()->post('berita', [
            'gambar' => UploadedFile::fake()->image('avatar.jpg'),
            'judul' => 'Judul Test',
            'konten' => ''
        ]);

        $response->assertInvalid([
            'konten' => 'The konten field is required.'
        ]);

        $response->assertStatus(302);
    }

    public function test_gambar_field_is_required_when_tambah_kelola_berita()
    {
        Storage::fake('avatars');

        $response = $this->withoutMiddleware()->post('berita', [
            'gambar' => '',
            'judul' => 'Judul Test',
            'konten' => 'Konten Test'
        ]);

        $response->assertInvalid([
            'gambar' => 'The gambar field is required.'
        ]);

        $response->assertStatus(302);
    }

    public function test_all_field_are_required_when_tambah_kelola_berita()
    {
        Storage::fake('avatars');

        $response = $this->withoutMiddleware()->post('berita', [
            'gambar' => '',
            'judul' => '',
            'konten' => ''
        ]);

        $response->assertInvalid([
            'gambar' => 'The gambar field is required.',
            'judul' => 'The judul field is required.',
            'konten' => 'The konten field is required.'
        ]);

        $response->assertStatus(302);
    }

    public function test_admin_can_hapus_berita()
    {
        Storage::fake('avatars');

        $user = User::firstwhere('email', 'admin@gmail.com');

         $berita = Berita::create([
            'gambar' => UploadedFile::fake()->image('avatar.jpg'),
            'judul' => 'Judul Tes',
            'konten' => 'Konten Tes'
        ]);

        $response = $this->actingAs($user)->delete(route('berita.destroy', $berita->id));
        $response->assertStatus(302);
    }
}
