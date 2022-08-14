<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMapelDetailRequest;
use App\Http\Requests\UpdateMapelDetailRequest;
use App\Repositories\MapelDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MapelDetailController extends AppBaseController{
    /** @var  MapelDetailRepository */
    private $mapelDetailRepository;

    public function __construct(MapelDetailRepository $mapelDetailRepo){
        $this->mapelDetailRepository = $mapelDetailRepo;
    }

    /**
     * Display a listing of the MapelDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $mapelDetails = $this->mapelDetailRepository->all();
        return view('mapel_details.index')->with('mapelDetails', $mapelDetails);
    }

    /**
     * Show the form for creating a new MapelDetail.
     *
     * @return Response
     */
    public function create(){
        return view('mapel_details.create');
    }

    /**
     * Store a newly created MapelDetail in storage.
     *
     * @param CreateMapelDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateMapelDetailRequest $request){
        $input = $request->all();
        $mapelDetail = $this->mapelDetailRepository->create($input);
        Flash::success('Mapel Detail saved successfully.');
        return redirect(route('mapelDetails.index'));
    }

    /**
     * Display the specified MapelDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $mapelDetail = $this->mapelDetailRepository->find($id);
        if (empty($mapelDetail)) {
            Flash::error('Mapel Detail not found');
            return redirect(route('mapelDetails.index'));
        }
        return view('mapel_details.show')->with('mapelDetail', $mapelDetail);
    }

    /**
     * Show the form for editing the specified MapelDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $mapelDetail = $this->mapelDetailRepository->find($id);
        if (empty($mapelDetail)) {
            Flash::error('Mapel Detail not found');
            return redirect(route('mapelDetails.index'));
        }
        return view('mapel_details.edit')->with('mapelDetail', $mapelDetail);
    }

    /**
     * Update the specified MapelDetail in storage.
     *
     * @param int $id
     * @param UpdateMapelDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMapelDetailRequest $request){
        $mapelDetail = $this->mapelDetailRepository->find($id);
        if (empty($mapelDetail)) {
            Flash::error('Mapel Detail not found');
            return redirect(route('mapelDetails.index'));
        }
        $mapelDetail = $this->mapelDetailRepository->update($request->all(), $id);
        Flash::success('Mapel Detail updated successfully.');
        return redirect(route('mapelDetails.index'));
    }

    /**
     * Remove the specified MapelDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $mapelDetail = $this->mapelDetailRepository->find($id);
        if (empty($mapelDetail)) {
            Flash::error('Mapel Detail not found');
            return redirect(route('mapelDetails.index'));
        }
        $this->mapelDetailRepository->delete($id);
        Flash::success('Mapel Detail deleted successfully.');
        return redirect(route('mapelDetails.index'));
    }
}
