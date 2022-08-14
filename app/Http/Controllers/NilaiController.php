<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNilaiRequest;
use App\Http\Requests\CreateNilaiDetailRequest;
use App\Http\Requests\UpdateNilaiRequest;
use App\Http\Requests\UpdateNilaiDetailRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\NilaiRepository;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Jadwal;
use App\Models\MapelDetail;
use App\Models\Nilai;
use App\Models\NilaiDetail;
use App\Models\User;
use DB;
use Flash;
use Response;
use PDF;
use Carbon\Carbon;

class NilaiController extends AppBaseController{
    /** @var  NilaiRepository */
    private $nilaiRepository;

    public function __construct(NilaiRepository $nilaiRepo){
        $this->nilaiRepository = $nilaiRepo;
    }

    /**
     * Display a listing of the Nilai.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $nilais = $this->nilaiRepository->all();
        $kelas = Kelas::all();
        // return $kelas->first()->jadwal->groupBy('id_kelas')->first()[0]->mapelDetail->guru;
        if (Auth::user()->hasRole('Guru')) {
            $kelas = Kelas::all();
        }else{
            $nilai = Nilai::all()->where('id_siswa',Auth::user()->siswa->id);
            return view('nilais.nilaiSiswa', compact('nilai'));
        }
        return view('nilais.index', compact('kelas'))->with('nilais', $nilais);
    }

    /**
     * Show the form for creating a new Nilai.
     *
     * @return Response
     */
    public function create(){
        $siswa = Siswa::all();
        $kelas = Kelas::pluck('kelas', 'id');
        $mapel = Mapel::pluck('mata_pelajaran', 'id');
        return view('nilais.create', compact('siswa', 'kelas', 'mapel'));
    }

    /**
     * Store a newly created Nilai in storage.
     *
     * @param CreateNilaiRequest $request
     *
     * @return Response
     */
    public function store(CreateNilaiDetailRequest $request){
        $input = $request->all();
        Flash::success('Nilai saved successfully.');
        return redirect(route('nilais.index'));
    }

    /**
     * Display the specified Nilai.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $nilai = $this->nilaiRepository->find($id);
        if (empty($nilai)) {
            Flash::error('Nilai not found');
            return redirect(route('nilais.index'));
        }
        return view('nilais.show')->with('nilai', $nilai);
    }

    /**
     * Show the form for editing the specified Nilai.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $kelas = Kelas::where('id', $id)->first();
        $siswa = Siswa::where('id_kelas', $id)->get();
        $mapel = Mapel::all();
        return view('nilais.edit', compact('kelas', 'siswa', 'mapel'));
    }

    /**
     * Update the specified Nilai in storage.
     *
     * @param int $id
     * @param UpdateNilaiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNilaiDetailRequest $request){
        $nilai = $this->nilaiRepository->find($id);
        Flash::success('Nilai updated successfully.');
        return redirect(route('nilais.index'));
    }

    /**
     * Remove the specified Nilai from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $nilai = $this->nilaiRepository->find($id);

        if (empty($nilai)) {
            Flash::error('Nilai not found');
            return redirect(route('nilais.index'));
        }
        $this->nilaiRepository->delete($id);
        Flash::success('Nilai deleted successfully.');
        return redirect(route('nilais.index'));
    }

    public function pilihMapel($id){
        $kelas = Kelas::find($id);
        $jadwal = Jadwal::all()->where('id_kelas', $id);
        // return Jadwal::find(11)->mapelDetail->mapel;
        if(Auth::user()->hasRole('Siswa')){
            $kelas = Kelas::find($id);
            $jadwal = Jadwal::where('id_kelas', $id)->get();
            return view('nilais.isiNilai.pilihMapelSiswa', compact('id', 'kelas', 'jadwal'));
        }
        return view('nilais.isiNilai.pilihMapel', compact('id', 'kelas', 'jadwal'));
    }

    public function isiNilai($idMapel, $idKelas){
        $siswa = Siswa::where('id_kelas', $idKelas)->get();
        $kelas = Kelas::where('id', $idKelas)->first();
        $nilai = Nilai::where('id_kelas', $idKelas)->get();
        $siswaMemilikiNilai = [];
        foreach ($nilai as $value) {
            foreach ($value->nilaiDetails as $item){
                if ($item->id_mapel == $idMapel){
                    array_push($siswaMemilikiNilai,$value->id_siswa);
                }
            }
        }
        return view('nilais.isiNilai.siswaNilai', compact('idKelas','idMapel', 'kelas', 'siswa','nilai','siswaMemilikiNilai'));
    }

    public function lihatNilai($idMapel, $idKelas){
        if(Auth::user()->hasRole('Admin|Guru')){
            $siswa = Siswa::where('id_kelas', $idKelas)->get();
            $kelas = Kelas::find($idKelas);
            $nilai = Nilai::where('id_kelas', $idKelas)->get();
        }else{
            $siswa = Auth::user()->siswa;
            $nilai = Nilai::where('id_kelas', $idKelas)->where('id_siswa', $siswa->id)->get();
            return view('nilais.isiNilai.siswaShowNilai', compact('nilai', 'siswa'));
        }
        return view('nilais.isiNilai.siswaNilaiUpdate', compact('idKelas','idMapel', 'kelas', 'siswa', 'nilai'));
    }

    function viewNilaiSiswa($idNilai){
        $nilaiDetails= NilaiDetail::find($idNilai);
        $nilais=$nilaiDetails->nilai;
        return view('nilais.nilaiSiswaView', compact( 'nilais','nilaiDetails'));
    }
    
    public function viewNilai($idMapel, $idKelas){
        if(Auth::user()->hasRole('Admin|Guru')){
            $siswa = Siswa::where('id_kelas', $idKelas)->get();
            $kelas = Kelas::find( $idKelas);
            $nilai = Nilai::where('id_kelas', $idKelas)->get();
        } else {
            $siswa = Siswa::where('id_kelas', $idKelas)->where('id_users', Auth::user()->id)->get();
            $siswas = Siswa::where('id_kelas', $idKelas)->where('id_users', Auth::user()->id)->first();
            $kelas = Kelas::where('id', $idKelas)->first();
            $nilai = Nilai::where('id_kelas', $idKelas)->where('id_siswa', $siswas['id'])->first();
        }        
        return view('nilais.isiNilai.siswaNilaiView', compact('idKelas','idMapel', 'kelas', 'siswa', 'nilai'));
    }
    public function simpanNilai(Request $request){
        if(isset($request->idNilaiDetail)){
            for ($i = 0; $i < COUNT($request['idNilaiDetail']); $i++) {
                $nilaiDetail = NilaiDetail::find($request['idNilaiDetail'][$i]);
                $nilaiDetail['tugas_satu'] = ($request['tugas_satu'][$i] == null)?"0":$request['tugas_satu'][$i]; 
                $nilaiDetail['tugas_dua'] = ($request['tugas_dua'][$i] == null)?"0":$request['tugas_dua'][$i]; 
                $nilaiDetail['tugas_tiga'] = ($request['tugas_tiga'][$i] == null)?"0":$request['tugas_tiga'][$i]; 
                $nilaiDetail['tugas_empat'] = ($request['tugas_empat'][$i] == null)?"0":$request['tugas_empat'][$i];
                $nilaiDetail['tugas_lima'] =($request['tugas_lima'][$i] == null)?"0":$request['tugas_lima'][$i]; 
                $nilaiDetail['uts'] = ($request['uts'][$i] == null)?"0":$request['uts'][$i]; 
                $nilaiDetail['uas'] = ($request['uas'][$i] == null)?"0":$request['uas'][$i]; 
                $nilaiDetail['deskripsi'] = ($request['deskripsi'][$i] == null)?"-":$request['deskripsi'][$i];
                $nilai_akhir[$i] = ($request['tugas_satu'][$i] + $request['tugas_dua'][$i] + $request['tugas_tiga'][$i] + $request['tugas_empat'][$i] + $request['tugas_lima'][$i] + $request['uts'][$i] + $request['uas'][$i])/7;
                if ($nilai_akhir[$i] >= 0 && $nilai_akhir[$i] < 76) {
                    $nilai_huruf[$i] = 'D';
                } elseif ($nilai_akhir[$i] >= 76 && $nilai_akhir[$i] < 84) {
                    $nilai_huruf[$i] = 'C';
                } elseif ($nilai_akhir[$i] >= 84 && $nilai_akhir[$i] < 92) {
                    $nilai_huruf[$i] = 'B';
                } else {
                    $nilai_huruf[$i] = 'A';
                }
                $nilaiDetail['nilai_akhir'] = $nilai_akhir[$i];
                $nilaiDetail['nilai_huruf'] = substr($nilai_huruf[$i], 0);
                $nilaiDetail->save();
            }
        }else{
            for($i = 0; $i < COUNT($request['tugas_satu']); $i++){
                $nilai = Nilai::all()->where('id_kelas',$request['id_kelas'])->where('id_siswa',$request['id_siswa'][$i]);
                if(COUNT($nilai)>0){
                    $nilai = $nilai->first();
                }else{
                    $nilai = new Nilai;
                    $nilai['id_siswa'] = $request['id_siswa'][$i];
                    $nilai['id_kelas'] = $request['id_kelas'];
                    $nilai->save();
                }
                $nilaiDetail = new NilaiDetail;
                $nilaiDetail['id_nilai'] = $nilai['id'];
                $nilaiDetail['id_mapel'] = $request['id_mapel'];
                $nilaiDetail['tugas_satu'] = ($request['tugas_satu'][$i] == null)?"0":$request['tugas_satu'][$i]; 
                $nilaiDetail['tugas_dua'] = ($request['tugas_dua'][$i] == null)?"0":$request['tugas_dua'][$i]; 
                $nilaiDetail['tugas_tiga'] = ($request['tugas_tiga'][$i] == null)?"0":$request['tugas_tiga'][$i]; 
                $nilaiDetail['tugas_empat'] = ($request['tugas_empat'][$i] == null)?"0":$request['tugas_empat'][$i]; 
                $nilaiDetail['tugas_lima'] =($request['tugas_lima'][$i] == null)?"0":$request['tugas_lima'][$i]; 
                $nilaiDetail['uts'] = ($request['uts'][$i] == null)?"0":$request['uts'][$i]; 
                $nilaiDetail['uas'] = ($request['uas'][$i] == null)?"0":$request['uas'][$i];
                $nilaiDetail['deskripsi'] = ($request['deskripsi'][$i] == null)?"-":$request['deskripsi'][$i];
                $nilai_akhir[$i] = ($request['tugas_satu'][$i] + $request['tugas_dua'][$i] + $request['tugas_tiga'][$i] + $request['tugas_empat'][$i] + $request['tugas_lima'][$i] + $request['uts'][$i] + $request['uas'][$i])/7;
                if ($nilai_akhir[$i] >= 0 && $nilai_akhir[$i] < 76) {
                    $nilai_huruf[$i] = 'D';
                } elseif ($nilai_akhir[$i] >= 76 && $nilai_akhir[$i] < 84) {
                    $nilai_huruf[$i] = 'C';
                } elseif ($nilai_akhir[$i] >= 84 && $nilai_akhir[$i] < 92) {
                    $nilai_huruf[$i] = 'B';
                } else {
                    $nilai_huruf[$i] = 'A';
                }
                $nilaiDetail['nilai_akhir'] = $nilai_akhir[$i];
                $nilaiDetail['nilai_huruf'] = substr($nilai_huruf[$i], 0);
                $nilaiDetail->save();
            }
        }
        Flash::success('Nilai Save successfully.');
        return redirect('/nilais/pilihMapel/'.$request['id_kelas']);
    }
}