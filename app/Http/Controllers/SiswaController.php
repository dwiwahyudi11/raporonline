<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SiswaRepository;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Flash;
use Response;

class SiswaController extends AppBaseController{
    /** @var  SiswaRepository */
    private $siswaRepository;

    public function __construct(SiswaRepository $siswaRepo){
        $this->siswaRepository = $siswaRepo;
    }

    /**
     * Display a listing of the Siswa.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        if(Auth::user()->hasRole('Admin')){
            $siswas = $this->siswaRepository->all();
            return view('siswas.index')->with('siswas', $siswas);
        } else if(Auth::user()->hasRole('Siswa')){
            $siswas = Siswa::where('id_users', Auth::user()->id)->get();
            return view('siswas.profileSiswa')->with('siswas', $siswas);
        }
    }

    /**
     * Show the form for creating a new Siswa.
     *
     * @return Response
     */
    public function create(){
        $kelas = Kelas::pluck('kelas', 'id');
        return view('siswas.create', compact('kelas'));
    }

    /**
     * Store a newly created Siswa in storage.
     *
     * @param CreateSiswaRequest $request
     *
     * @return Response
     */
    public function store(CreateSiswaRequest $request){
        $input = $request->except('foto');
        
        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = str_replace(" ", "_",$foto->getClientOriginalName());
            $filenames = $input['nisn'].'_'.$filename;
            $path=$request->foto->storeAs('public/foto_siswa', $filenames,'local');
            $input['foto']= $filenames;
        }
        $user = User::all()->where('email',$input['email']);
        if (COUNT($user)) {
            Flash::error('Email telah terdaftar.');
            return redirect(route('siswas.index'));
        }
        $user = new User();
        $user['name'] = $input['name'];
        $user['email'] = $input['email'];
        $user['password'] = Hash::make($input['password']);
        $user->syncroles('3');
        $user->save();

        $siswa = new Siswa();
        $siswa['id_users'] = $user['id'];
        $siswa['id_kelas'] = $input['id_kelas'];
        $siswa['jenis_kelamin'] = $input['jenis_kelamin'];
        $siswa['tempat_lahir'] = $input['tempat_lahir'];
        $siswa['tanggal_lahir'] = $input['tanggal_lahir'];
        $siswa['kontak'] = $input['kontak'];
        $siswa['nisn'] = $input['nisn'];
        $siswa['nipd'] = $input['nipd'];
        $siswa['agama'] = $input['agama'];
        $siswa['alamat'] = $input['alamat'];
        $siswa['foto'] = $input['foto'];
        $siswa->save();

        Flash::success('Siswa saved successfully.');
        return redirect(route('siswas.index'));
    }

    /**
     * Display the specified Siswa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $siswa = $this->siswaRepository->find($id);
        if (empty($siswa)) {
            Flash::error('Siswa not found');
            return redirect(route('siswas.index'));
        }
        return view('siswas.show')->with('siswa', $siswa);
    }

    /**
     * Show the form for editing the specified Siswa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $siswa = $this->siswaRepository->find($id);
        $kelas = Kelas::pluck('kelas', 'id');
        if (empty($siswa)) {
            Flash::error('Siswa not found');
            return redirect(route('siswas.index'));
        }
        return view('siswas.edit', compact('kelas'))->with('siswa', $siswa);
    }

    /**
     * Update the specified Siswa in storage.
     *
     * @param int $id
     * @param UpdateSiswaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiswaRequest $request){
        $siswa = $this->siswaRepository->find($id);
        if (empty($siswa)) {
            Flash::error('Siswa not found');
            return redirect(route('siswas.index'));
        }
        $user = User::find($siswa['id_users']);
        $user['name'] = $request['name'];
        $user['email'] = $request['email'];
        if(isset($request['password']) && $request['password'] != null){
            $user['password'] = Hash::make($request['password']);
        }
        $user->save();

        $siswa = Siswa::find($id);
        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = str_replace(" ", "_",$foto->getClientOriginalName());
            $filenames = $siswa['nisn'].'_'.$filename;
            $path=$request->foto->storeAs('public/foto_siswa', $filenames,'local');
            $siswa['foto']= $filenames;
        }
        $siswa['id_users'] = $user['id'];
        $siswa['jenis_kelamin'] = $request['jenis_kelamin'];
        $siswa['id_kelas'] = $request['id_kelas'];
        $siswa['kontak'] = $request['kontak'];
        $siswa['nisn'] = $request['nisn'];
        $siswa['nipd'] = $request['nipd'];
        $siswa['agama'] = $request['agama'];
        $siswa['alamat'] = $request['alamat'];
        $siswa['tempat_lahir'] = $request['tempat_lahir'];
        $siswa['tanggal_lahir'] = $request['tanggal_lahir'];
        $siswa->save();
        Flash::success('Siswa updated successfully.');
        return redirect(route('siswas.index'));
    }

    /**
     * Remove the specified Siswa from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $siswa = $this->siswaRepository->find($id);
        if (empty($siswa)) {
            Flash::error('Siswa not found');
            return redirect(route('siswas.index'));
        }
        $user = User::where('id', $siswa['id_users'])->first();
        $user->delete();
        $this->siswaRepository->delete($id);
        Flash::success('Siswa deleted successfully.');
        return redirect(route('siswas.index'));
    }
}