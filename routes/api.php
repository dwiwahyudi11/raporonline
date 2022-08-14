<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getJadwal', [App\Http\Controllers\API\APIJadwalController::class, 'getJadwal']);
Route::get('/getJadwalDetail/{id}', [App\Http\Controllers\API\APIJadwalController::class, 'getJadwalDetail']);
Route::get('/getRaporPDF/{idKelas}/{idSiswa}', [App\Http\Controllers\API\APIRaporController::class, 'getRaporPDF']);

Route::get('/getRapor/{idKelas}/{idSiswa}', [App\Http\Controllers\API\APIRaporController::class, 'getRapor']);
Route::get('/getDetailRapor/{idNilai}', [App\Http\Controllers\API\APIRaporController::class, 'getDetailRapor']);
Route::get('/getKelas/{idSiswa}', [App\Http\Controllers\API\APIRaporController::class, 'getKelas']);
Route::get('/getUser/{idUser}', [App\Http\Controllers\API\APIRaporController::class, 'getUser']);
Route::get('/getUserAllData', [App\Http\Controllers\API\APIRaporController::class, 'getUserAllData']);

//anyar
Route::post('/login', [App\Http\Controllers\API\ApiUserController::class, 'login']);
Route::get('/register', [App\Http\Controllers\API\ApiUserController::class, 'register']);
Route::get('/getJadwalBaru', [App\Http\Controllers\API\ApiJadwalBaruController::class, 'jadwal']);
Route::get('/getNilaiDetail', [App\Http\Controllers\API\ApiNilaiDetailController::class, 'nilaidetail']);
Route::get('/getRaportBaru', [App\Http\Controllers\API\ApiRaportBaruController::class, 'raport']);
Route::get('/getNilaiGuru', [App\Http\Controllers\API\ApiNilaiGuruController::class, 'nilaiguru']);
Route::get('/getBiodata', [App\Http\Controllers\API\ApiBiodataController::class, 'biodatasiswa']);
Route::get('/getBiodataguru', [App\Http\Controllers\API\ApiBiodataGuruController::class, 'biodataguru']);

// Route::resource('users', App\Http\Controllers\API\UserAPIController::class);
