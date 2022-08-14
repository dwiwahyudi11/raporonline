<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNilaiDetailRequest;
use App\Http\Requests\UpdateNilaiDetailRequest;
use App\Repositories\NilaiDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class NilaiDetailController extends AppBaseController{
    /** @var  NilaiDetailRepository */
    private $nilaiDetailRepository;

    public function __construct(NilaiDetailRepository $nilaiDetailRepo){
        $this->nilaiDetailRepository = $nilaiDetailRepo;
    }

    /**
     * Display a listing of the NilaiDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $nilaiDetails = $this->nilaiDetailRepository->all();
        return view('nilai_details.index')->with('nilaiDetails', $nilaiDetails);
    }

    /**
     * Show the form for creating a new NilaiDetail.
     *
     * @return Response
     */
    public function create(){
        return view('nilai_details.create');
    }

    /**
     * Store a newly created NilaiDetail in storage.
     *
     * @param CreateNilaiDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateNilaiDetailRequest $request){
        $input = $request->all();
        $nilaiDetail = $this->nilaiDetailRepository->create($input);
        Flash::success('Nilai Detail saved successfully.');
        return redirect(route('nilaiDetails.index'));
    }

    /**
     * Display the specified NilaiDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $nilaiDetail = $this->nilaiDetailRepository->find($id);
        if (empty($nilaiDetail)) {
            Flash::error('Nilai Detail not found');
            return redirect(route('nilaiDetails.index'));
        }
        return view('nilai_details.show')->with('nilaiDetail', $nilaiDetail);
    }

    /**
     * Show the form for editing the specified NilaiDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $nilaiDetail = $this->nilaiDetailRepository->find($id);
        if (empty($nilaiDetail)) {
            Flash::error('Nilai Detail not found');
            return redirect(route('nilaiDetails.index'));
        }
        return view('nilai_details.edit')->with('nilaiDetail', $nilaiDetail);
    }

    /**
     * Update the specified NilaiDetail in storage.
     *
     * @param int $id
     * @param UpdateNilaiDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNilaiDetailRequest $request){
        $nilaiDetail = $this->nilaiDetailRepository->find($id);
        if (empty($nilaiDetail)) {
            Flash::error('Nilai Detail not found');
            return redirect(route('nilaiDetails.index'));
        }
        $nilaiDetail = $this->nilaiDetailRepository->update($request->all(), $id);
        Flash::success('Nilai Detail updated successfully.');
        return redirect(route('nilaiDetails.index'));
    }

    /**
     * Remove the specified NilaiDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $nilaiDetail = $this->nilaiDetailRepository->find($id);
        if (empty($nilaiDetail)) {
            Flash::error('Nilai Detail not found');
            return redirect(route('nilaiDetails.index'));
        }
        $this->nilaiDetailRepository->delete($id);
        Flash::success('Nilai Detail deleted successfully.');
        return redirect(route('nilaiDetails.index'));
    }
}
