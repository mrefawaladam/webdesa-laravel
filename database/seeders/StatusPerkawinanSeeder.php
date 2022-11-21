<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\StatusPerkawinan;
 
class StatusPerkawinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusPerkawinan::create(['nama' => 'Belum Kawin']);
        StatusPerkawinan::create(['nama' => 'Kawin']);
        StatusPerkawinan::create(['nama' => 'Cerai Hidup']);
        StatusPerkawinan::create(['nama' => 'Cerai Mati']);
    }
}
