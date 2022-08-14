<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJadwalUploadRequest;
use App\Http\Requests\UpdateJadwalUploadRequest;
use App\Repositories\JadwalUploadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use File;
use Flash;
use Response;

class JadwalUploadController extends AppBaseController{
    /** @var  JadwalUploadRepository */
    private $jadwalUploadRepository;

    public function __construct(JadwalUploadRepository $jadwalUploadRepo){
        $this->jadwalUploadRepository = $jadwalUploadRepo;
    }

    /**
     * Display a listing of the JadwalUpload.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $jadwalUploads = $this->jadwalUploadRepository->all();
        return view('jadwal_uploads.index')->with('jadwalUploads', $jadwalUploads);
    }

    /**
     * Show the form for creating a new JadwalUpload.
     *
     * @return Response
     */
    public function create(){
        return view('jadwal_uploads.create');
    }

    /**
     * Store a newly created JadwalUpload in storage.
     *
     * @param CreateJadwalUploadRequest $request
     *
     * @return Response
     */
    public function store(CreateJadwalUploadRequest $request){
        $input = $request->all();
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = uniqid() . '_' . trim($file->getClientOriginalName());
            $path=$request->file->storeAs('public/jadwal', $filename,'local');
            // $path='storage'.substr($path,strpos($path,'/'));
            $input['file']=$filename;
        }
        $jadwalUpload = $this->jadwalUploadRepository->create($input);
        Flash::success('Jadwal Upload saved successfully.');
        return redirect(route('jadwalUploads.index'));
    }

    /**
     * Display the specified JadwalUpload.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $jadwalUpload = $this->jadwalUploadRepository->find($id);
        if (empty($jadwalUpload)) {
            Flash::error('Jadwal Upload not found');
            return redirect(route('jadwalUploads.index'));
        }
        return view('jadwal_uploads.show')->with('jadwalUpload', $jadwalUpload);
    }

    /**
     * Show the form for editing the specified JadwalUpload.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $jadwalUpload = $this->jadwalUploadRepository->find($id);
        if (empty($jadwalUpload)) {
            Flash::error('Jadwal Upload not found');
            return redirect(route('jadwalUploads.index'));
        }
        return view('jadwal_uploads.edit')->with('jadwalUpload', $jadwalUpload);
    }

    /**
     * Update the specified JadwalUpload in storage.
     *
     * @param int $id
     * @param UpdateJadwalUploadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJadwalUploadRequest $request){
        $input = $request->except('file');
        $jadwalUpload = $this->jadwalUploadRepository->find($id);
        if (empty($jadwalUpload)) {
            Flash::error('Jadwal Upload not found');
            return redirect(route('jadwalUploads.index'));
        }
        if($request->hasFile('file')) {
            $result = File::exists($jadwalUpload->file);
            if( $result) {
                File::Delete($jadwalUpload->file);
            }
            $file = $request->file('file');
            $filename = uniqid() . '_' . trim($file->getClientOriginalName());
            $path=$request->file->storeAs('public/jadwal', $filename,'local');
            // $path='storage'.substr($path,strpos($path,'/'));
            $input['file']=$filename;
        }
        $jadwalUpload = $this->jadwalUploadRepository->update($input, $id);
        Flash::success('Jadwal Upload updated successfully.');
        return redirect(route('jadwalUploads.index'));
    }

    /**
     * Remove the specified JadwalUpload from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $jadwalUpload = $this->jadwalUploadRepository->find($id);
        if (empty($jadwalUpload)) {
            Flash::error('Jadwal Upload not found');
            return redirect(route('jadwalUploads.index'));
        }
        $this->jadwalUploadRepository->delete($id);
        Flash::success('Jadwal Upload deleted successfully.');
        return redirect(route('jadwalUploads.index'));
    }
}