<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\NilaiDetail;
use Illuminate\Support\Facades\DB;

class ApiBiodataController extends Controller
{
    function biodatasiswa(Request $request){
        $siswa = DB::table('users')
                ->join('siswa', 'users.id', '=', 'siswa.id_users')
                ->join('nilai', 'siswa.id', '=', 'nilai.id_siswa')
                ->join('kelas', 'kelas.id', '=', 'nilai.id_kelas')
                // ->join('nilai_detail', 'nilai.id', '=', 'nilai_detail.id_nilai')
                ->where('users.id','=', $request->id_users)
                ->get();

        $mData = [];
        foreach ($siswa as $siswas) {
            // $x['id'] = $siswas->id;
            $x['id_users'] = $siswas->id_users;
            $x['id_siswa'] = $siswas->id_siswa;
            $x['name'] = $siswas->name;
            $x['kelas'] = $siswas->kelas;
            $x['email'] = $siswas->email;
            $x['foto'] = $siswas->foto;
            $x['nipd'] = $siswas->nipd;
            $x['jenis_kelamin'] = $siswas->jenis_kelamin;
            $x['nisn'] = $siswas->nisn;
            $x['tempat_lahir'] = $siswas->tempat_lahir;
            $x['tanggal_lahir'] = $siswas->tanggal_lahir;
            $x['nik'] = $siswas->nik;
            $x['agama'] = $siswas->agama;
            $x['kontak'] = $siswas->kontak;
            $x['alamat'] = $siswas->alamat;
            
            $x['semester'] = $siswas->semester;
            // // $x['sakit'] = $siswas->sakit;
            // // $x['izin'] = $siswas->izin;
            // $x['tanpa_keterangan'] = $siswas->tanpa_keterangan;
            // $x['catatan_wali_kelas'] = $siswas->catatan_wali_kelas;
            // $x['link'] = asset('').$siswas->link;
            // $x['id_nilai'] = $siswas->id_nilai;
            // $x['id_mapel'] = $siswas->id_mapel;
            // $x['tugas_satu'] = $siswas->tugas_satu;
            // $x['tugas_dua'] = $siswas->tugas_dua;
            // $x['tugas_tiga'] = $siswas->tugas_tiga;
            // $x['tugas_empat'] = $siswas->tugas_empat;
            // $x['uts'] = $siswas->uts;
            // $x['uas'] = $siswas->uas;
            // $x['nilai_akhir'] = $siswas->nilai_akhir;
            // $x['nilai_huruf'] = $siswas->nilai_huruf;
            // $x['deskripsi'] = $siswas->deskripsi;
            array_push($mData, $x);
        }
        if($mData){
            return response()->json([
                'success' => 1,
                'massage' => 'Memuat Biodata',
                'BiodataSiswa' => $mData
            ]);
        }else{
             return response()->json([
                'success' => 0,
                'massage' => 'Data Belum Dibuat',
            ]);
        }
    }
}
