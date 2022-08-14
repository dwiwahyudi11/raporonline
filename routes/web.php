<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     $name = "A B";
//     return str_replace(' ', '-', $name);
// });

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => ['role:Guru|Admin']], function(){
        Route::resource('gurus', App\Http\Controllers\GuruController::class);
    });
    Route::group(['middleware' => ['role:Siswa|Admin']], function(){
        Route::resource('siswas', App\Http\Controllers\SiswaController::class);
    });
    Route::group(['middleware' => ['role:Admin|Guru|Siswa']], function(){
        Route::resource('nilais', App\Http\Controllers\NilaiController::class);
        Route::get('nilais/pilihMapel/{id}', [App\Http\Controllers\NilaiController::class, 'pilihMapel'])->name('nilais.pilihMapel');
        Route::get('nilais/view/{idNilai}', [App\Http\Controllers\NilaiController::class, 'viewNilaiSiswa'])->name('nilais.viewNilai');
        Route::get('nilais/isiNilai/{id}/{idKelas}', [App\Http\Controllers\NilaiController::class, 'isiNilai'])->name('nilais.isiNilai');
        Route::get('nilais/lihatNilai/{id}/{idKelas}', [App\Http\Controllers\NilaiController::class, 'lihatNilai'])->name('nilais.lihatNilai');
        Route::get('nilais/viewNilai/{id}/{idKelas}', [App\Http\Controllers\NilaiController::class, 'viewNilai'])->name('nilais.viewNilai');
        Route::post('nilais/simpanNilai', [App\Http\Controllers\NilaiController::class, 'simpanNilai'])->name('nilais.simpanNilai');
        Route::resource('nilaiDetails', App\Http\Controllers\NilaiDetailController::class);
        Route::resource('rapots', App\Http\Controllers\RapotController::class);
        Route::get('rapots/pilihKelas/{idKelas}', [App\Http\Controllers\RapotController::class, 'pilihKelas'])->name('rapots.pilihKelas');
        Route::get('rapots/isiKehadiran/{idKelas}', [App\Http\Controllers\RapotController::class, 'isiKehadiran'])->name('rapots.isiKehadiran');
        Route::get('rapots/editKehadiran/{idKelas}', [App\Http\Controllers\RapotController::class, 'editKehadiran'])->name('rapots.editKehadiran');
        Route::post('rapots/simpanKehadiran', [App\Http\Controllers\RapotController::class, 'simpanKehadiran'])->name('rapots.simpanKehadiran');
        Route::post('rapots/updateKehadiran', [App\Http\Controllers\RapotController::class, 'updateKehadiran'])->name('rapots.updateKehadiran');
        Route::get('rapots/lihatRapot/{idKelas}/{idSiswa}', [App\Http\Controllers\RapotController::class, 'lihatRapot'])->name('rapots.lihatRapot');
    });

    Route::group(['middleware' => ['role:Admin']], function(){
        Route::resource('users', App\Http\Controllers\UsersController::class);
        Route::resource('kelas', App\Http\Controllers\KelasController::class);
        Route::resource('mapels', App\Http\Controllers\MapelController::class);
        Route::resource('mapelDetails', App\Http\Controllers\MapelDetailController::class);
        Route::get('mapels/guruPengampu/{id}', [App\Http\Controllers\MapelController::class, 'guruPengampu'])->name('mapels.guruPengampu');
        Route::get('mapels/guruPengampuEdit/{id}/{idGuru}', [App\Http\Controllers\MapelController::class, 'guruPengampuEdit'])->name('mapels.guruPengampuEdit');
        Route::post('mapels/guruPengampu', [App\Http\Controllers\MapelController::class, 'guruPengampuSave'])->name('mapels.guruPengampuSave');
        Route::post('mapels/guruPengampu/{id}', [App\Http\Controllers\MapelController::class, 'guruPengampuUpdate'])->name('mapels.guruPengampuUpdate');
        Route::resource('jadwals', App\Http\Controllers\JadwalController::class);
        Route::resource('permissions', App\Http\Controllers\PermissionsController::class);
        Route::resource('roles', App\Http\Controllers\RolesController::class);
        Route::resource('jadwalUploads', App\Http\Controllers\JadwalUploadController::class);
    });
});
Route::get('tidak-ditemukan', function () {
    return view('akun_dihapus');
});
require __DIR__.'/auth.php';
