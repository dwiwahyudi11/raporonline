<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Repositories\JadwalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mapel;
use Flash;
use Response;

class JadwalController extends AppBaseController{
    /** @var  JadwalRepository */
    private $jadwalRepository;

    public function __construct(JadwalRepository $jadwalRepo){
        $this->jadwalRepository = $jadwalRepo;
    }

    /**
     * Display a listing of the Jadwal.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $jadwals = $this->jadwalRepository->all();
        return view('jadwals.index')->with('jadwals', $jadwals);
    }

    /**
     * Show the form for creating a new Jadwal.
     *
     * @return Response
     */
    public function create(){
        $kelas = Kelas::pluck('kelas', 'id');
        $mapel = Mapel::pluck('mata_pelajaran', 'id');
        return view('jadwals.create', compact('kelas', 'mapel'));
    }

    /**
     * Store a newly created Jadwal in storage.
     *
     * @param CreateJadwalRequest $request
     *
     * @return Response
     */
    public function store(CreateJadwalRequest $request){
        $input = $request->all();
        $jadwal = $this->jadwalRepository->create($input);
        Flash::success('Jadwal saved successfully.');
        return redirect(route('jadwals.index'));
    }

    /**
     * Display the specified Jadwal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $jadwal = $this->jadwalRepository->find($id);
        if (empty($jadwal)) {
            Flash::error('Jadwal not found');
            return redirect(route('jadwals.index'));
        }
        return view('jadwals.show')->with('jadwal', $jadwal);
    }

    /**
     * Show the form for editing the specified Jadwal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $jadwal = $this->jadwalRepository->find($id);
        $kelas = Kelas::pluck('kelas', 'id');
        $mapel = Mapel::pluck('mata_pelajaran', 'id');
        if (empty($jadwal)) {
            Flash::error('Jadwal not found');
            return redirect(route('jadwals.index'));
        }
        return view('jadwals.edit', compact('kelas', 'mapel'))->with('jadwal', $jadwal);
    }

    /**
     * Update the specified Jadwal in storage.
     *
     * @param int $id
     * @param UpdateJadwalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJadwalRequest $request){
        $jadwal = $this->jadwalRepository->find($id);
        if (empty($jadwal)) {
            Flash::error('Jadwal not found');
            return redirect(route('jadwals.index'));
        }
        $jadwal = $this->jadwalRepository->update($request->all(), $id);
        Flash::success('Jadwal updated successfully.');
        return redirect(route('jadwals.index'));
    }

    /**
     * Remove the specified Jadwal from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $jadwal = $this->jadwalRepository->find($id);
        if (empty($jadwal)) {
            Flash::error('Jadwal not found');
            return redirect(route('jadwals.index'));
        }
        $this->jadwalRepository->delete($id);
        Flash::success('Jadwal deleted successfully.');
        return redirect(route('jadwals.index'));
    }
}
