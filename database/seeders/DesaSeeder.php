<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Desa;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desa::create([
            'nama_desa'         => 'Gemantar',
            'nama_kecamatan'    => 'Selogiri',
            'nama_kabupaten'    => 'Wonogiri',
            'alamat'            => 'Jl. Pandawa No.46 RT 01 RW 02',
            'nama_kepala_desa'  => "Sunarno",
            'alamat_kepala_desa'=> "Dusun Gemantar RT 02 RW 02 Gemantar",
            'logo'              => "logo.png",
        ]);
    }
}
