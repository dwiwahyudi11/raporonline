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

class ApiNilaiGuruController extends Controller
{
    public function nilaiguru(Request $request) {

    $guru = DB::table('users')
            ->join('guru', 'users.id', '=', 'guru.id_users')
            ->join('mapel_detail', 'guru.id', '=', 'mapel_detail.id_guru')
            ->join('mapel', 'mapel.id', '=', 'mapel_detail.id_mapel')
            ->join('nilai_detail', 'mapel.id', '=', 'nilai_detail.id_mapel')
            ->join('nilai', 'nilai.id', '=', 'nilai_detail.id_nilai')
            ->join('kelas', 'kelas.id', '=', 'nilai.id_kelas')
            // ->join('siswa', 'siswa.id', '=', 'nilai.id_siswa')
            // ->join('siswa', 'users.id', '=', 'siswa.id_users')
            // ->select('guru.id_users','users.name as name guru','mapel.mata_pelajaran as mapel','kelas.kelas as kelas','nilai.id_siswa as id_siswa','siswa.id_users as name siswa', 'nilai.semester as semester','nilai_detail.*')
            ->where('users.id','=', $request->id_users)
            ->get();

        $mData = [];
        foreach ($guru as $gurus) {
            // $x['id'] = $gurus->id;
            $x['id_users'] = $gurus->id_users;
            $x['id_guru'] = $gurus->id_guru;
            $x['name'] = $gurus->name;
            // $x['siswa'] = $gurus->id_;
            $x['kelas'] = $gurus->kelas;
            $x['id_siswa'] = $gurus->id_siswa;
            // $x['name siswa'] = $gurus->id_siswa;
            // $x['id_kelas'] = $gurus->id_kelas;
            // $x['link'] = asset('').$siswas->link;
            // $x['email'] = $siswas->email;
            // $x['foto'] = $siswas->foto;
            // $x['nipd'] = $siswas->nipd;
            // $x['jenis_kelamin'] = $siswas->jenis_kelamin;
            // $x['nisn'] = $siswas->nisn;
            // $x['tempat_lahir'] = $siswas->tempat_lahir;
            // $x['tanggal_lahir'] = $siswas->tanggal_lahir;
            // $x['nik'] = $siswas->nik;
            // $x['agama'] = $siswas->agama;
            // $x['kontak'] = $siswas->kontak;
            // $x['alamat'] = $siswas->alamat; 
            // $x['sakit'] = $siswas->sakit;
            // $x['izin'] = $siswas->izin;
            // $x['tanpa_keterangan'] = $siswas->tanpa_keterangan;
            // $x['catatan_wali_kelas'] = $siswas->catatan_wali_kelas;
            // $x['id_nilai'] = $siswas->id_nilai;
            // $x['id_mapel'] = $siswas->id_mapel;
            $x['mata_pelajaran'] = $gurus->mata_pelajaran;
            $x['semester'] = $gurus->semester;
            $x['tugas_satu'] = $gurus->tugas_satu;
            $x['tugas_dua'] = $gurus->tugas_dua;
            $x['tugas_tiga'] = $gurus->tugas_tiga;
            $x['tugas_empat'] = $gurus->tugas_empat;
            $x['tugas_lima'] = $gurus->tugas_lima;
            $x['uts'] = $gurus->uts;
            $x['uas'] = $gurus->uas;
            $x['nilai_akhir'] = $gurus->nilai_akhir;
            $x['nilai_huruf'] = $gurus->nilai_huruf;
            $x['deskripsi'] = $gurus->deskripsi;
            array_push($mData, $x);
        }
        if($mData){
            return response()->json([
                'success' => 1,
                'massage' => 'Memuat nilai',
                'nilaisiswa' => $mData
            ]);
        }else{
             return response()->json([
                'success' => 0,
                'massage' => 'Data Belum Dibuat',
            ]);
        }

    }
}
