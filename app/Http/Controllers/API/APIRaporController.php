<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRapotRequest;
use App\Http\Requests\UpdateRapotRequest;
use App\Repositories\RapotRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Mapel;
use App\Models\MapelDetail;
use App\Models\Nilai;
use App\Models\NilaiDetail;
use App\Models\Rapot;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Siswa;
use Carbon\Carbon;
use Flash;
use Response;
use DB;
class APIRaporController extends Controller
{
    function getRaporPDF($id, $idSiswa){
        $siswa = Siswa::where('id', $idSiswa)->first();
        $guru = Guru::where('id_kelas_wali', $id)->first();
        $kelas = Kelas::where('id', $id)->first();
        $nilai = Nilai::where('id_siswa', $idSiswa)->where('id_kelas', $id)->first();
        $nilais = Nilai::where('id_siswa', $idSiswa)->where('id_kelas', $id)->get();
        // return $id;
        $date = Carbon::now()->format('dmy_hi');

        $pdf = PDF::loadview('rapots.isiRapot.pdf', compact('id', 'siswa', 'kelas', 'nilai', 'nilais', 'guru'))->setPaper('A4', 'portrait');
        return $pdf->stream($date.'_'.$siswa['users']['name'].'_'.$kelas['kelas'].'.pdf');
        // return view('rapots.isiRapot.pdf', compact('id', 'siswa', 'kelas', 'nilai', 'nilais', 'guru'));
    }

    function getRapor($id, $idSiswa){
        $nilai = Nilai::where('id_siswa', $idSiswa)->where('id_kelas', $id)->get();

        $data = [];
        foreach ($nilai as $nilais) {
            $x['id'] = $nilais['id'];
            $x['id_siswa'] = $nilais['id_siswa'];
            $x['semester'] = $nilais['semester'];
            $x['sakit'] = $nilais['sakit'];
            $x['izin'] = $nilais['izin'];
            $x['tanpa_keterangan'] = $nilais['tanpa_keterangan'];
            $x['catatan_wali_kelas'] = $nilais['catatan_wali_kelas'];
            array_push($data, $x);
        }
        $res['data']= $data;
        return response($res);
    }

    function getDetailRapor($id){
        $nilaiDetails = NilaiDetail::where('id_nilai', $id)->get();

        $data = [];
        foreach ($nilaiDetails as $nilaiDetail) {
            $x['id'] = $nilaiDetail['id'];
            $x['id_nilai'] = $nilaiDetail['id_nilai'];
            $x['id_mapel'] = $nilaiDetail['id_mapel'];
            $x['tugas_satu'] = $nilaiDetail['tugas_satu'];
            $x['tugas_dua'] = $nilaiDetail['tugas_dua'];
            $x['tugas_tiga'] = $nilaiDetail['tugas_tiga'];
            $x['tugas_empat'] = $nilaiDetail['tugas_empat'];
            $x['tugas_lima'] = $nilaiDetail['tugas_lima'];
            $x['uts'] = $nilaiDetail['uts'];
            $x['uas'] = $nilaiDetail['uas'];
            $x['nilai_akhir'] = $nilaiDetail['nilai_akhir'];
            $x['nilai_huruf'] = $nilaiDetail['nilai_huruf'];
            $x['deskripsi'] = $nilaiDetail['deskripsi'];
            array_push($data, $x);
        }
        $res['data']= $data;
        return response($res);
    }

    function getKelas($id){
        $kelas = Nilai::where('id_siswa', $id)->get();

        $data = [];
        foreach ($kelas as $kelass) {
            $x['id'] = $kelass['id'];
            $x['id_kelas'] = $kelass['id_kelas'];
            $x['kelas'] = $kelass['idKelas']['kelas'];
            array_push($data, $x);
        }
        $res['data']= $data;
        return response($res);
    }

    function getUser($id){
        $siswa = Siswa::where('id_users', $id)->get();

        $data = [];
        foreach ($siswa as $siswas) {
            $x['id'] = $siswas['id'];
            $x['id_users'] = $siswas['id_users'];
            $x['id_kelas'] = $siswas['id_kelas'];
            $x['foto'] = $siswas['foto'];
            $x['nipd'] = $siswas['nipd'];
            $x['jenis_kelamin'] = $siswas['jenis_kelamin'];
            $x['nisn'] = $siswas['nisn'];
            $x['tanggal_lahir'] = $siswas['tanggal_lahir'];
            $x['tempat_lahir'] = $siswas['tempat_lahir'];
            $x['nik'] = $siswas['nik'];
            $x['agama'] = $siswas['agama'];
            $x['kontak'] = $siswas['kontak'];
            $x['alamat'] = $siswas['alamat'];
            array_push($data, $x);
        }
        $res['data']= $data;
        return response($res);
    }

    function getUserAllData(Request $request){
        $siswa = DB::table('users')
                ->join('siswa', 'users.id', '=', 'siswa.id_users')
                ->join('nilai', 'siswa.id', '=', 'nilai.id_siswa')
                // ->join('nilai_detail', 'nilai.id', '=', 'nilai_detail.id_nilai')
                ->where('users.id','=', $request->id_users)
                ->get();

        $data = [];
        foreach ($siswa as $siswas) {
            $x['id'] = $siswas->id;
            $x['id_users'] = $siswas->id_users;
            $x['id_kelas'] = $siswas->id_kelas;
            $x['id_siswa'] = $siswas->id_siswa;
            $x['name'] = $siswas->name;
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
            $x['sakit'] = $siswas->sakit;
            $x['izin'] = $siswas->izin;
            $x['tanpa_keterangan'] = $siswas->tanpa_keterangan;
            $x['catatan_wali_kelas'] = $siswas->catatan_wali_kelas;
            $x['link'] = asset('').$siswas->link;
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
            array_push($data, $x);
        }
        $res['data'] = $data;
        return response()->json($res);
        // return $siswa;
    }
}
