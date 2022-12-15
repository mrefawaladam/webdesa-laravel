<?php

namespace Tests\Feature;

use App\Gallery;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class KelolaSliderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_access_kelola_slider()
    {
        $credential = [
            'email' => 'admin@gmail.com',
            'password' => 'password'
        ];

        $response = $this->post('masuk',$credential);

        $response = $this->get('http://localhost:8000/slider');
        $response->assertStatus(200);
    }

    public function test_admin_can_tambah_slider()
    {
        Storage::fake('avatars');

        $response = $this->withoutMiddleware()->post('gallery', [
            'gambar' => UploadedFile::fake()->image('avatar.jpg'),
            'slider' => 1,
            'caption' => 'Caption Test'
        ]);

        $response->assertValid([' Gambar berhasil ditambahkan ']);
        $response->assertStatus(302);
    }

    public function test_admin_can_hapus_slider()
    {
        Storage::fake('avatars');

        $user = User::firstwhere('email', 'admin@gmail.com');

        $slider = Gallery::create([
            'gallery' => UploadedFile::fake()->image('avatar.jpg'),
            'slider' => 1,
            'caption' => 'Caption Test'
        ]);

        $response = $this->actingAs($user)->delete(route('gallery.destroy', $slider->id));
        $response->assertStatus(302);
    }
}
