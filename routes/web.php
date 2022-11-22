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
use App\Http\Controllers\IsiSuratController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CetakSuratController;


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

    Route::get('/tambah-surat', [SuratController::class,'create'])->name('surat.create');
    Route::patch('/cetakSurat/{cetak_surat}/arsip', [CetakSuratController::class,'arsip'])->name('cetakSurat.arsip');
    Route::resource('/cetakSurat', CetakSuratController::class)->except('create','store','index');
    Route::resource('/surat', SuratController::class)->except('create');

    Route::post('/keluar', [AuthController::class, 'keluar'])->name('keluar');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/pengaturan', [UserController::class,'pengaturan'])->name('pengaturan');

    Route::get('/profil', [UserController::class,'profil'])->name('profil');
    Route::patch('/update-pengaturan/{user}', [UserController::class, 'updatePengaturan'])->name('update-pengaturan');
    Route::patch('/update-profil/{user}', [UserController::class,'updateProfil'])->name('update-profil');

    Route::get('/surat-harian',  [HomeController::class, 'suratHarian'])->name('surat-harian');
    Route::get('/surat-bulanan',  [HomeController::class, 'suratBulanan'])->name('surat-bulanan');
    Route::get('/surat-tahunan',  [HomeController::class, 'suratTahunan'])->name('surat-tahunan');

    Route::get('/tambah-slider', 'GalleryController@create')->name('slider.create');
    Route::get('/slider', 'GalleryController@indexSlider')->name('slider.index');

    Route::post('/video', [VideoController::class,'store'])->name('video.store');
    Route::patch('/video/update', [VideoController::class,'update'])->name('video.update');

    Route::get('/tambah-penduduk', [PendudukController::class,'create'])->name('penduduk.create');
    Route::get('/penduduk/{penduduk}', function (){return abort(404);});
    Route::resource('penduduk', PendudukController::class)->except('create','show');

    Route::get('/profil-desa', [DesaController::class, 'index'])->name('profil-desa');
    Route::patch('/update-desa/{desa}', [DesaController::class, 'update'])->name('update-desa');

    Route::get('/kelola-pemerintahan-desa', [PemerintahanDesaController::class ,'index'])->name('pemerintahan-desa.index');
    Route::get('/tambah-pemerintahan-desa', [PemerintahanDesaController::class, 'create'])->name('pemerintahan-desa.create');
    Route::get('/edit-pemerintahan-desa/{pemerintahan_desa}', [PemerintahanDesaController::class, 'edit'])->name('pemerintahan-desa.edit');
    Route::resource('/pemerintahan-desa', PemerintahanDesaController::class)->except('create','show','index','edit');

    Route::get('/kelompok-jenis-anggaran/{kelompokJenisAnggaran}', [AnggaranRealisasiController::class,'kelompokJenisAnggaran']);
    Route::get('/detail-jenis-anggaran/{id}', [AnggaranRealisasiController::class,'show'])->name('detail-jenis-anggaran.show');
    Route::get('/tambah-anggaran-realisasi', [AnggaranRealisasiController::class,'create'])->name('anggaran-realisasi.create');
    Route::get('/anggaran-realisasi/{anggaran_realisasi}', function (){return abort(404);});
    Route::resource('anggaran-realisasi', AnggaranRealisasiController::class)->except('create','show');

    Route::get('/tambah-dusun', [DusunController::class,'create'])->name('dusun.create');
    Route::resource('dusun', DusunController::class)->except('create','show');
    Route::resource('detailDusun', DetailDusunController::class)->except('create','edit');

    Route::get('/kelola-berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/tambah-berita', [BeritaController::class, 'create'])->name('berita.create');
    Route::get('/edit-berita/{berita}',[BeritaController::class, 'edit'])->name('berita.edit');
    Route::resource('/berita', BeritaController::class)->except('create','show','index','edit');


    Route::post('/gallery/store', [GalleryController::class,'storeGallery'])->name('gallery.storeGallery');
    Route::get('/kelola-gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::resource('/gallery', GalleryController::class)->except('index','show', 'edit', 'update', 'create');

    Route::resource('/isiSurat', IsiSuratController::class)->except('index', 'create', 'edit', 'show');

    Route::get('/chart-surat/{id}', [SuratController::class, 'chartSurat'])->name('chart-surat');

});

Route::fallback(function () {
    abort(404);
});
