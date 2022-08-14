<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRapotRequest;
use App\Http\Requests\UpdateRapotRequest;
use App\Repositories\RapotRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Mapel;
use App\Models\MapelDetail;
use App\Models\Nilai;
use App\Models\NilaiDetail;
use App\Models\Rapot;
use PDF;
use App\Models\Siswa;
use Carbon\Carbon;
use Flash;
use Response;
use Storage;

class RapotController extends AppBaseController{
    /** @var  RapotRepository */
    private $rapotRepository;

    public function __construct(RapotRepository $rapotRepo){
        $this->rapotRepository = $rapotRepo;
    }

    /**
     * Display a listing of the Rapot.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        if(Auth::user()->hasRole('Admin|admin')){
            $rapots = $this->rapotRepository->all();
            $kelas = Kelas::all();
        } else if(Auth::user()->hasRole('Guru|guru')){
            $guru = Guru::where('id_users', Auth::user()->id)->first();
            $mapel = MapelDetail::where('id_guru', $guru->id)->first();
            // $jadwal = Jadwal::where('id_mapel_detail', $mapel->id_mapel)->first();
            $kelas = $guru->kelas;
            $rapots = $this->rapotRepository->all();
        } else {
            $siswa = Siswa::where('id_users', Auth::user()->id)->first();
            $rapots = Nilai::where('id_siswa', $siswa->id)->get();
            $kelas = Kelas::all();
            return view('rapots.raporSiswa', compact('kelas','rapots'));
        }
        return view('rapots.index', compact('kelas'))->with('rapots', $rapots);
    }

    /**
     * Show the form for creating a new Rapot.
     *
     * @return Response
     */
    public function create(){
        return view('rapots.create');
    }

    /**
     * Store a newly created Rapot in storage.
     *
     * @param CreateRapotRequest $request
     *
     * @return Response
     */
    public function store(CreateRapotRequest $request){
        $input = $request->all();
        $rapot = $this->rapotRepository->create($input);
        Flash::success('Rapot saved successfully.');
        return redirect(route('rapots.index'));
    }

    /**
     * Display the specified Rapot.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $rapot = $this->rapotRepository->find($id);
        if (empty($rapot)) {
            Flash::error('Rapot not found');
            return redirect(route('rapots.index'));
        }
        return view('rapots.show')->with('rapot', $rapot);
    }

    /**
     * Show the form for editing the specified Rapot.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $rapot = $this->rapotRepository->find($id);
        if (empty($rapot)) {
            Flash::error('Rapot not found');
            return redirect(route('rapots.index'));
        }
        return view('rapots.edit')->with('rapot', $rapot);
    }

    /**
     * Update the specified Rapot in storage.
     *
     * @param int $id
     * @param UpdateRapotRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRapotRequest $request){
        $rapot = $this->rapotRepository->find($id);
        if (empty($rapot)) {
            Flash::error('Rapot not found');
            return redirect(route('rapots.index'));
        }
        $rapot = $this->rapotRepository->update($request->all(), $id);
        Flash::success('Rapot updated successfully.');
        return redirect(route('rapots.index'));
    }

    /**
     * Remove the specified Rapot from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $rapot = $this->rapotRepository->find($id);
        if (empty($rapot)) {
            Flash::error('Rapot not found');
            return redirect(route('rapots.index'));
        }
        $this->rapotRepository->delete($id);
        Flash::success('Rapot deleted successfully.');
        return redirect(route('rapots.index'));
    }

    public function pilihKelas($id){
        if(Auth::user()->hasRole('Admin|Guru')){
            $siswa = Siswa::where('id_kelas', $id)->get();
            $kelas = Kelas::where('id', $id)->first();
        } elseif(Auth::user()->hasRole('Siswa')){
            $siswa = Siswa::where('id_kelas', $id)->where('id_users', Auth::user()->id)->get();
            $kelas = Kelas::where('id', $id)->first();
        }
        return view('rapots.isiRapot.rapot', compact('id', 'siswa', 'kelas'));
    }

    public function isiKehadiran($id){
        $kelas = Kelas::where('id', $id)->first();
        $siswa = Siswa::where('id_kelas', $id)->get();
        $nilai = Nilai::where('id_kelas', $id)->get();
        return view('rapots.isiRapot.isiKehadiran', compact('id', 'kelas', 'siswa', 'nilai'));
    }

    public function editKehadiran($id){
        $kelas = Kelas::where('id', $id)->first();
        $nilai = Nilai::where('id_kelas', $id)->get();
        return view('rapots.isiRapot.editKehadiran', compact('id', 'kelas', 'nilai'));
    }

    public function simpanKehadiran(Request $request){
        $kelas = Kelas::where('id', $request['id_kelas'])->first();
        $siswa = Siswa::where('id_kelas', $request['id_kelas'])->get();
        $guru = Guru::where('id_kelas_wali', $request['id_kelas'])->first();
        $id = $request['id_kelas'];
        for($i = 0; $i < COUNT($request['id_siswa']); $i++){
            $nilais = Nilai::where('id_siswa', $request['id_siswa'][$i])->where('id_kelas', $request['id_kelas'])->first();
            $nilaiSave = Nilai::find($nilais['id']);
            $nilaiSave['sakit'] = $request['sakit'][$i];
            $nilaiSave['izin'] = $request['izin'][$i];
            $nilaiSave['tanpa_keterangan'] = $request['tanpa_keterangan'][$i];
            $nilaiSave['semester'] = $request['semester'][$i];
            $nilaiSave['catatan_wali_kelas'] = $request['catatan_wali_kelas'][$i];
            $nilaiSave->save();
            $nilai = Nilai::find($nilais['id']);
            $nilaiDetails = Nilai::where('id_siswa', $request['id_siswa'][$i])->where('id_kelas', $request['id_kelas'])->get();
            $siswas = Siswa::where('id', $request['id_siswa'][$i])->first();
            $name = $siswas['users']['name'];
            $names = str_replace(' ', '-', $name);
            $pdf = PDF::loadView('rapots.isiRapot.pdfLink', compact('id', 'siswas', 'kelas', 'nilai', 'nilaiDetails', 'guru'));
            
            $pdf->setOptions(['isPhpEnabled' => true,'isRemoteEnabled' => true]);
            // Storage::disk('public')->put('rapot/'.$nilais['id'].'_Rapot_'.$names.'.pdf', $pdf->output());
            $nilai['link'] = 'storage/rapot/'.$nilais['id'].'_Rapot_'.$names.'.pdf';
            
            $content = $pdf->download()->getOriginalContent();
            Storage::put('public/rapot/'.$nilais['id'].'_Rapot_'.$names.'.pdf',$content) ;
            $nilai->save();

        }
        Flash::success('Rapot Save successfully.');
        // return redirect('rapots/pilihKelas/'.$id);
    }

    public function updateKehadiran(Request $request){
        $kelas = Kelas::where('id', $request['id_kelas'])->first();
        $siswa = Siswa::where('id_kelas', $request['id_kelas'])->get();
        $guru = Guru::where('id_kelas_wali', $request['id_kelas'])->first();
        $id = $request['id_kelas'];
        for($i = 0; $i < COUNT($request['id_siswa']); $i++){
            $nilais = Nilai::where('id_siswa', $request['id_siswa'][$i])->where('id_kelas', $request['id_kelas'])->first();
            $nilaiSave = Nilai::find($nilais['id']);
            $nilaiSave['sakit'] = $request['sakit'][$i];
            $nilaiSave['izin'] = $request['izin'][$i];
            $nilaiSave['tanpa_keterangan'] = $request['tanpa_keterangan'][$i];
            $nilaiSave['semester'] = $request['semester'][$i];
            $nilaiSave['catatan_wali_kelas'] = $request['catatan_wali_kelas'][$i];
            $nilaiSave->save();
            $nilai = Nilai::find($nilais['id']);
            $nilaiDetails = Nilai::where('id_siswa', $request['id_siswa'][$i])->where('id_kelas', $request['id_kelas'])->get();
            $siswas = Siswa::where('id', $request['id_siswa'][$i])->first();
            $name = $siswas['users']['name'];
            $names = str_replace(' ', '_', $name);
            $pdf = PDF::loadView('rapots.isiRapot.pdfLink', compact('id', 'siswas', 'kelas', 'nilai', 'nilaiDetails', 'guru'));
            $pdf->setOptions(['isPhpEnabled' => true,'isRemoteEnabled' => true]);
            // Storage::disk('public')->put('rapot/'.$nilais['id'].'_Rapot_'.$names.'.pdf', $pdf->output());

            $content = $pdf->download()->getOriginalContent();
            Storage::put('public/rapot/'.$nilais['id'].'_Rapot_'.$names.'.pdf',$content) ;

            $nilai['link'] = 'storage/rapot/'.$nilais['id'].'_Rapot_'.$names.'.pdf';
            $nilai->save();
        }
        Flash::success('Rapot Update successfully.');
        return redirect('rapots/pilihKelas/'.$id);
    }

    public function lihatRapot($id, $idSiswa){
        $siswa = Siswa::where('id', $idSiswa)->first();
        $guru = Guru::where('id_kelas_wali', $id)->first();
        $kelas = Kelas::where('id', $id)->first();
        $nilai = Nilai::where('id_siswa', $idSiswa)->where('id_kelas', $id)->first();
        $nilais = Nilai::where('id_siswa', $idSiswa)->where('id_kelas', $id)->get();
        $date = Carbon::now()->format('dmy_hi');
        $pdf = PDF::loadView('rapots.isiRapot.pdf', compact('id', 'siswa', 'kelas', 'nilai', 'nilais', 'guru'));
        return $pdf->stream($date.'_'.$siswa['users']['name'].'_'.$kelas['kelas'].'.pdf');
        // return view('rapots.isiRapot.pdf', compact('id', 'siswa', 'kelas', 'nilai', 'nilais', 'guru'));
    }
}
