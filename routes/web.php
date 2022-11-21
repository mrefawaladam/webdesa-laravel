<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


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
    
});