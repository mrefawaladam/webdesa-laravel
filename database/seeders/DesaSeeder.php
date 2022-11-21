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
            'nama_desa'         => 'Arjasa',
            'nama_kecamatan'    => 'Arjasa',
            'nama_kabupaten'    => 'Jember',
            'alamat'            => 'Jl. Rengganis Nomor 01 Arjasa 68191',
            'nama_kepala_desa'  => "WASI'A",
            'alamat_kepala_desa'=> "Dusun Gumitir Desa Arjasa  Kecamatan  Arjasa Kabupaten Jember",
            'logo'              => "logo.png",
        ]);
    }
}
