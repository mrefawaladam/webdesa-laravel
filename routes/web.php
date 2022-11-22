<?php

use App\Http\Controllers\AnggaranRealisasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemerintahanDesaController;
use App\Http\Controllers\SuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('/layanan-surat', [SuratController::class, 'layanan_surat'])->name('layanan-surat');
Route::get('/pemerintahan-desa',[PemerintahanDesaController::class,'pemerintahan_desa'])->name('pemerintahan_desa');
Route::get('/pemerintahan-desa/{pemerintahan_desa}', function (){return abort(404);});
Route::get('/pemerintahan-desa/{pemerintahan_desa}/{slug}', [PemerintahanDesaController::class,'show'])->name('pemerintahan-desa.show');
Route::get('/berita',[BeritaController::class,'berita'])->name('berita');
Route::get('/berita/{berita}/{slug}', [BeritaController::class,'show'])->name('berita.show');
Route::get('/berita/{berita}', function (){return abort(404);});
Route::get('/gallery',[GalleryController::class,'gallery'])->name('gallery');
Route::get('/statistik-penduduk',[GrafikController::class,'index'])->name('statistik-penduduk');
Route::get('/statistik-penduduk/show',[GrafikController::class,'show'])->name('statistik-penduduk.show');
Route::get('/laporan-apbdes',[AnggaranRealisasiController::class,'laporan_apbdes'])->name('laporan-apbdes');


Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/masuk', [AuthController::class, 'index'])->name('masuk');
    Route::post('/masuk',[AuthController::class, 'masuk']);
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('/keluar', [AuthController::class, 'keluar'])->name('keluar');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/pengaturan', [UserController::class,'pengaturan'])->name('pengaturan');

    Route::get('/profil', [UserController::class,'profil'])->name('profil');
    Route::patch('/update-pengaturan/{user}', [UserController::class, 'updatePengaturan'])->name('update-pengaturan');
    Route::patch('/update-profil/{user}', [UserController::class,'updateProfil'])->name('update-profil');

    Route::get('/surat-harian',  [HomeController::class, 'suratHarian'])->name('surat-harian');
    Route::get('/surat-bulanan',  [HomeController::class, 'suratBulanan'])->name('surat-bulanan');
    Route::get('/surat-tahunan',  [HomeController::class, 'suratTahunan'])->name('surat-tahunan');

    Route::get('/tambah-penduduk', [PendudukController::class,'create'])->name('penduduk.create');
    Route::get('/penduduk/{penduduk}', function (){return abort(404);});
    Route::resource('penduduk', PendudukController::class)->except('create','show');

    Route::get('/profil-desa', [DesaController::class, 'index'])->name('profil-desa');
    Route::patch('/update-desa/{desa}', [DesaController::class, 'update'])->name('update-desa');

    Route::get('/kelompok-jenis-anggaran/{kelompokJenisAnggaran}', 'AnggaranRealisasiController@kelompokJenisAnggaran');
    Route::get('/detail-jenis-anggaran/{id}', 'AnggaranRealisasiController@show')->name('detail-jenis-anggaran.show');
    Route::get('/tambah-anggaran-realisasi', 'AnggaranRealisasiController@create')->name('anggaran-realisasi.create');
    Route::get('/anggaran-realisasi/{anggaran_realisasi}', function (){return abort(404);});
    Route::resource('anggaran-realisasi', 'AnggaranRealisasiController')->except('create','show');

    Route::get('/tambah-dusun', [DusunController::class,'create'])->name('dusun.create');
    Route::resource('dusun', DusunController::class)->except('create','show');
    Route::resource('detailDusun', DetailDusunController::class)->except('create','edit');

    Route::get('/chart-surat/{id}', [SuratController,'chartSurat']
    )->name('chart-surat');

});

Route::fallback(function () {
    abort(404);
});