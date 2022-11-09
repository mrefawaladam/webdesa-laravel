<?php

use App\Models\JenisAnggaran;
use App\Models\StatusHubunganDalamKeluarga;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AgamaSeeder::class,
            AnggaranRealisasiSeeder::class,
            BeritaSeeder::class,
            CetakSuratSeeder::class,
            DarahSeeder::class,
            DesaSeeder::class,
            DetailCetakSeeder::class,
            DetailDusunSeeder::class,
            DetailJenisAnggaranSeeder::class,
            DusunSeeder::class,
            GallerySeeder::class,
            IsiSuratSeeder::class,
            JenisAnggaranSeeder::class,
            KelompokJenisAnggaranSeeder::class,
            PekerjaanSeeder::class,
            PemerintahanDesaSeeder::class,
            PendidikanSeeder::class,
            PendudukSeeder::class,
            StatusHubunganDalamKeluargaSeeder::class,
            StatusPerkawinanSeeder::class,
            SuratSeeder::class,
            UserSeeder::class,
            VideoSeeder::class
        ]);
    }
}
