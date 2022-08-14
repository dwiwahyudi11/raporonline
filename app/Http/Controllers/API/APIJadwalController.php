<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JadwalUpload;
use Illuminate\Http\Request;

class APIJadwalController extends Controller
{
    function getJadwal(){
        $jadwal = JadwalUpload::all();

        $jadwalUpload = [];
        foreach ($jadwal as $item) {
            $x['id'] = $item->id;
            $x['file']   = url('storage/jadwal/'.$item['file']);
            array_push($jadwalUpload, $x);
        }
        $res['data'] = $jadwalUpload;
        return response($res);
    }
    function getJadwalDetail($id){
        $jadwal = JadwalUpload::find($id);

        $jadwalUpload = [];
        
        $x['id'] = $jadwal->id;
        $x['file']   = url('storage/jadwal/'.$jadwal['file']);
        array_push($jadwalUpload, $x);

        $res['data'] = $jadwalUpload;
        return response($res);
    }
}
