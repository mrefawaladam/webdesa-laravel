<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class KelolaApbedesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_open_kelola_apbedes()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/anggaran-realisasi?jenis=pendapatan&tahun=2022');
        $response->assertStatus(200);

    }

    public function test_test_can_valid_field_all_required()
    {
        $user = User::find(1);
         
        $response = $this->withoutMiddleware()->post('anggaran-realisasi', [ 
            'tahun' => '2022',
            'jenis_anggaran' => '4',
            'detail_jenis_anggaran_id' => '',
            'nilai_anggaran' => '',
            'nilai_realisasi' => '',
            'keterangan_lainnya' => ''
        ]);

        $response->assertInvalid([ 
            'detail_jenis_anggaran_id' => 'detail jenis anggaran wajib diisi',
            'nilai_anggaran' => 'The nilai anggaran field is required.',
            'nilai_realisasi' => 'The nilai realisasi field is required.' 
        ]);

        $response->assertStatus(200);

    }

    public function test_add_pendapatan_apbdes()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/anggaran-realisasi?jenis=pendapatan&tahun=2022');

        $response = $this->withoutMiddleware()->post('anggaran-realisasi', [ 
            'tahun' => '2022',
            'jenis_anggaran' => '4',
            'detail_jenis_anggaran_id' => '411',
            'nilai_anggaran' => '1000000',
            'nilai_realisasi' => '100000',
            'keterangan_lainnya' => 'Tambah Pendapatan'
        ]);
 

        $response->assertStatus(302);
    }

    public function test_add_belanja_apbdes()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/anggaran-realisasi?jenis=pendapatan&tahun=2022');

        $response = $this->withoutMiddleware()->post('anggaran-realisasi', [ 
            'tahun' => '2022',
            'jenis_anggaran' => '5',
            'detail_jenis_anggaran_id' => '551',
            'nilai_anggaran' => '1000000',
            'nilai_realisasi' => '100000',
            'keterangan_lainnya' => 'Tambah Belanja'
        ]);
 

        $response->assertStatus(302);
    }
    public function test_add_bembiayaan_apbdes()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/anggaran-realisasi?jenis=pendapatan&tahun=2022');

        $response = $this->withoutMiddleware()->post('anggaran-realisasi', [ 
            'tahun' => '2022',
            'jenis_anggaran' => '65',
            'detail_jenis_anggaran_id' => '619',
            'nilai_anggaran' => '1000000',
            'nilai_realisasi' => '100000',
            'keterangan_lainnya' => 'Tambah Pembiayaan'
        ]);
 

        $response->assertStatus(302);
    }

    public function test_delete_penduduk()
    {
        $user = User::find(1);
        $getAnggaran = AnggaranRealisasi::first();
       
        $response = $this->actingAs($user)->delete(route('anggaran-realisasi.destroy', $getAnggaran->id));

        $response->assertStatus(302);
    }


}
