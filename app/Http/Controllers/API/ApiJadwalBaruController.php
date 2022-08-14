<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalUpload;

class ApiJadwalBaruController extends Controller
{
    public function jadwal(){

        // dd($request->all());die();
        $jadwalUpload = JadwalUpload::all();
        return response()->json([
            'success' => 1,
            'massage' => 'Memuat Jadwal',
            'jadwal' => $jadwalUpload
        ]);
     }
    
}
