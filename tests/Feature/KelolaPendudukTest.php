<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase; 
use App\Penduduk;
use App\User;


class KelolaPendudukTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_open_kelola_penduduk()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/penduduk');
        $response->assertSeeText('Penduduk');  
        $response->assertSeeText('Jumlah Kepala Keluarga');   
        $response->assertSeeText('Total Penduduk');   
        $response->assertSeeText('Jumlah Laki-laki');   
        $response->assertSeeText('Jumlah Perempuan');   
        $response->assertStatus(200);
    }

    public function test_all_field_required()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/tambah-penduduk');

        $response = $this->withoutMiddleware()->post('penduduk', [ 
            'nik' => '',
            'kk' => '',
            'nama' => '',
            'jenis_kelamin' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'darah_id' => '',
            'agama_id' => '',
            'pendidikan_id' => '',
            'status_perkawinan_id' => '',
            'status_hubungan_dalam_keluarga_id' => '',
            'kewarganegaraan' => '',
            'nomor_paspor' => '',
            'nomor_kitas_atau_kitap' => '',
            'nik_ayah' => '',
            'nama_ayah' => '',
            'nik_ibu' => '',
            'nama_ibu' => '',
            'alamat' => '',
            'dusun' => '',
            'detail_dusun_id' => ''
        ]);

        $response->assertInvalid([
            'nik' => 'The nik field is required.',
            'kk' => 'The kk field is required.',
            'nama' => 'The nama field is required.',
            'jenis_kelamin' => 'The jenis kelamin field is required.',
            'tempat_lahir' => 'The tempat lahir field is required.',
            'agama_id' => 'agama wajib diisi',
            'status_perkawinan_id' => 'status perkawinan wajib diisi',
            'status_hubungan_dalam_keluarga_id' => 'status hubungan dalam keluarga wajib diisi',
            'kewarganegaraan' => 'The kewarganegaraan field is required.',

        ]);

        $response->assertStatus(302);
    }

    
    public function test_valid_field_nik_and_kk_16_digit()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/tambah-penduduk');

        $response = $this->withoutMiddleware()->post('penduduk', [ 
            'nik' => 22234342,
            'kk' => 242342,
            'nama' => 'Jono Testing',
            'jenis_kelamin' => '1',
            'tempat_lahir' => 'Papua',
            'tanggal_lahir' => '2022-11-30',
            'darah_id' => '1',
            'agama_id' => '1',
            'pendidikan_id' => '1',
            'status_perkawinan_id' => '1',
            'status_hubungan_dalam_keluarga_id' => '1',
            'kewarganegaraan' => '1',
            'nomor_paspor' => '892035823',
            'nomor_kitas_atau_kitap' => '2148304',
            'nik_ayah' => '312',
            'nama_ayah' => 'Bambang Sudarojo',
            'nik_ibu' => '1234423',
            'nama_ibu' => 'Siti Maimunah',
            'alamat' => 'Jalan Cindi Wilis Takeran Surabaya',
            'dusun' => '1',
            'detail_dusun_id' => '1'
        ]);

        $response->assertInvalid([
            'nik' => 'The nik must be 16 digits.',
            'kk' => 'The kk must be 16 digits.',
            'nik_ayah' => 'The nik ayah must be 16 digits.',
            'nik_ibu' => 'The nik ibu must be 16 digits.' 
        ]);

        $response->assertStatus(302);
    }
 
    public function test_add_penduduk()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/tambah-penduduk');

        $response = $this->withoutMiddleware()->post('penduduk', [ 
            'nik' => 1234567890123456,
            'kk' => 1234567890123456,
            'nama' => 'Jono Testing',
            'jenis_kelamin' => '1',
            'tempat_lahir' => 'Papua',
            'tanggal_lahir' => '2022-11-30',
            'darah_id' => '1',
            'agama_id' => '1',
            'pendidikan_id' => '1',
            'status_perkawinan_id' => '1',
            'status_hubungan_dalam_keluarga_id' => '1',
            'kewarganegaraan' => '1',
            'nomor_paspor' => '892035823',
            'nomor_kitas_atau_kitap' => '2148304',
            'nik_ayah' => '1234567890123453',
            'nama_ayah' => 'Bambang Sudarojo',
            'nik_ibu' => '1234567890123450',
            'nama_ibu' => 'Siti Maimunah',
            'alamat' => 'Jalan Cindi Wilis Takeran Surabaya',
            'dusun' => '1',
            'detail_dusun_id' => '1'
        ]);
 

        $response->assertStatus(302);
    }
    public function test_edit_penduduk()
    {
        $user = User::find(1);
        $getPenduduk = Penduduk::first();
        $response = $this->actingAs($user)->get('/penduduk/{$getPenduduk->id}/edit');
        $response = $this->withoutMiddleware()->put(route('penduduk.update',$getPenduduk->id),[
            'nik' => 1234567890123456,
            'kk' => 1234567890123456,
            'nama' => 'Jono Testing Edit',
            'jenis_kelamin' => '1',
            'tempat_lahir' => 'Papua',
            'tanggal_lahir' => '2022-11-30',
            'darah_id' => '1',
            'agama_id' => '1',
            'pendidikan_id' => '1',
            'status_perkawinan_id' => '1',
            'status_hubungan_dalam_keluarga_id' => '1',
            'kewarganegaraan' => '1',
            'nomor_paspor' => '892035823',
            'nomor_kitas_atau_kitap' => '2148304',
            'nik_ayah' => '1234567890123453',
            'nama_ayah' => 'Bambang Sudarojo',
            'nik_ibu' => '1234567890123450',
            'nama_ibu' => 'Siti Maimunah',
            'alamat' => 'Jalan Cindi Wilis Takeran Surabaya',
            'dusun' => '1',
            'detail_dusun_id' => '1'
        ]); 
        $response->assertStatus(302);
    }

    public function test_delete_penduduk()
    {
        $user = User::find(1);
        $getPenduduk = Penduduk::first();
       
        $response = $this->actingAs($user)->delete(route('penduduk.destroy', $getPenduduk->id));

        $response->assertStatus(302);
    }

}
