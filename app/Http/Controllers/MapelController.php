<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMapelRequest;
use App\Http\Requests\UpdateMapelRequest;
use App\Repositories\MapelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\kelas;
use App\Models\Mapel;
use App\Models\Jadwal;
use App\Models\MapelDetail;
use Flash;
use Response;

class MapelController extends AppBaseController{
    /** @var  MapelRepository */
    private $mapelRepository;

    public function __construct(MapelRepository $mapelRepo){
        $this->mapelRepository = $mapelRepo;
    }

    /**
     * Display a listing of the Mapel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $mapels = $this->mapelRepository->all();
        return view('mapels.index')->with('mapels', $mapels);
    }

    /**
     * Show the form for creating a new Mapel.
     *
     * @return Response
     */
    public function create(){
        $guru = Guru::all();
        return view('mapels.create', compact('guru'));
    }

    /**
     * Store a newly created Mapel in storage.
     *
     * @param CreateMapelRequest $request
     *
     * @return Response
     */
    public function store(CreateMapelRequest $request){
        $input = $request->all();
        $mapel = $this->mapelRepository->create($input);
        Flash::success('Mapel saved successfully.');
        return redirect(route('mapels.index'));
    }

    /**
     * Display the specified Mapel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $mapel = $this->mapelRepository->find($id);
        if (empty($mapel)) {
            Flash::error('Mapel not found');
            return redirect(route('mapels.index'));
        }
        return view('mapels.show')->with('mapel', $mapel);
    }

    /**
     * Show the form for editing the specified Mapel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $mapel = $this->mapelRepository->find($id);
        if (empty($mapel)) {
            Flash::error('Mapel not found');
            return redirect(route('mapels.index'));
        }
        return view('mapels.edit')->with('mapel', $mapel);
    }

    /**
     * Update the specified Mapel in storage.
     *
     * @param int $id
     * @param UpdateMapelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMapelRequest $request){
        $mapel = $this->mapelRepository->find($id);
        if (empty($mapel)) {
            Flash::error('Mapel not found');
            return redirect(route('mapels.index'));
        }
        $mapel = $this->mapelRepository->update($request->all(), $id);
        Flash::success('Mapel updated successfully.');
        return redirect(route('mapels.index'));
    }

    /**
     * Remove the specified Mapel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $mapel = $this->mapelRepository->find($id);
        if (empty($mapel)) {
            Flash::error('Mapel not found');
            return redirect(route('mapels.index'));
        }
        $this->mapelRepository->delete($id);
        Flash::success('Mapel deleted successfully.');
        return redirect(route('mapels.index'));
    }

    public function guruPengampu($id){
        $mapel = $this->mapelRepository->find($id);
        $guru = Guru::all();
        $mapelDetail = MapelDetail::where('id_mapel', $id)->get();
        $kelasArray=Kelas::orderBy('kelas')->get();
        $kelasArrays=[];
        $kelas = Kelas::pluck('kelas', 'id');
        if (empty($mapel)) {
            Flash::error('Mapel not found');
            return redirect(route('mapels.index'));
        }
        return view('mapels.detail_mapel.edit', compact('mapel', 'guru', 'kelas', 'mapelDetail', 'kelasArray', 'kelasArrays'));
    }

    public function guruPengampuEdit($idMapelDetail, $idGuru){
        $mapel = $this->mapelRepository->find($idMapelDetail);
        $mapelDetails = MapelDetail::find($idMapelDetail);
        $guru = Guru::all();
        $jadwal = Jadwal::where('id_mapel_detail', $mapelDetails['id'])->get();
        $kelasArray=Kelas::orderBy('kelas')->get();
        $kelasArrays=$jadwal->pluck('id_kelas')->toArray();
        $kelas = Kelas::pluck('kelas', 'id');
        if (empty($mapel)) {
            Flash::error('Mapel not found');
            return redirect(route('mapels.index'));
        }
        return view('mapels.detail_mapel.fields', compact('idMapelDetail', 'idGuru', 'kelasArray', 'kelasArrays', 'mapel', 'guru', 'kelas', 'jadwal'));
    }

    public function guruPengampuSave(Request $request){
        $mapelDetail = new MapelDetail;
        $mapelDetail['id_mapel'] = $request['id_mapel'];
        $mapelDetail['id_guru'] = $request['id_guru'];
        $mapelDetail->save();
        for($i = 0; $i < COUNT($request['kelasArray']); $i++){
            $jadwal = new Jadwal;
            $jadwal['id_mapel_detail'] = $mapelDetail['id'];
            $jadwal['id_kelas'] = $request['kelasArray'][$i];
            $jadwal->save();
            if (empty($mapelDetail)) {
                Flash::error('Mapel not found');
                return redirect(route('mapels.index'));
            }
        }
        Flash::success('Guru Pengampu Save successfully.');
        return redirect(route('mapels.guruPengampu',$request['id_mapel']));
    }

    public function guruPengampuUpdate($id, Request $request){
        $mapelDetail = MapelDetail::find($id);
        $mapelDetail->id_guru = $request->id_guru;
        $mapelDetail->save();
        $jadwal = Jadwal::where('id_mapel_detail', $mapelDetail['id'])->get();
        foreach ($jadwal as $item) {
            if(!in_array($item->id_kelas,$request->kelas_array)){
                $item->delete();
            }
        }
        foreach ($request->kelas_array as $item) {
            $jadwal = Jadwal::where('id_mapel_detail', $mapelDetail['id'])->where('id_kelas', $item)->get();
            if(COUNT($jadwal)==0){
                $jadwal = new Jadwal;
                $jadwal['id_mapel_detail'] = $mapelDetail['id'];
                $jadwal['id_kelas'] = $item;
                $jadwal->save();
            }
        }
        Flash::success('Guru Pengampu Save successfully.');
        return redirect(route('mapels.guruPengampu',$mapelDetail->mapel->id));
    }
}
