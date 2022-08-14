<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Repositories\GuruRepository;
use App\Http\Controllers\AppBaseController;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Users;
use App\Models\Guru;
use DB;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class GuruController extends AppBaseController{
    /** @var  GuruRepository */
    private $guruRepository;

    public function __construct(GuruRepository $guruRepo){
        $this->guruRepository = $guruRepo;
    }

    /**
     * Display a listing of the Guru.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $gurus = $this->guruRepository->all();
        if (Auth::user()->hasRole("Guru")) {
            $gurus = $this->guruRepository->all()->where('id_users',Auth::user()->id);
            return view('gurus.profileGuru')
            ->with('gurus', $gurus);
        }
        return view('gurus.index')
            ->with('gurus', $gurus);
    }

    /**
     * Show the form for creating a new Guru.
     *
     * @return Response
     */
    public function create(){
        $guru = Guru::where("id_kelas_wali","!=",null)->get();
        $idWaliKelas = [];
        foreach ($guru as $item) {
            array_push($idWaliKelas,$item->id_kelas_wali);
        }
        $waliKelas = Kelas::whereNotIn('id', $idWaliKelas)->get()->pluck('kelas', 'id');
        return view('gurus.create', compact('waliKelas'));
    }

    /**
     * Store a newly created Guru in storage.
     *
     * @param CreateGuruRequest $request
     *
     * @return Response
     */
    public function store(CreateGuruRequest $request){
        $input = $request->except('foto');
        
        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = str_replace(" ", "_",$foto->getClientOriginalName());
            $filenames = $input['nip'].'_'.$filename;
            $path=$request->foto->storeAs('public/foto_guru', $filenames,'local');
            $input['foto']= $filenames;
        }

        $user = User::all()->where('email',$input['email']);
        if (COUNT($user)) {
            Flash::error('Email telah terdaftar.');
            return redirect(route('gurus.index'));
        }
        $user = new User;
        $user['name'] = $input['name'];
        $user['email'] = $input['email'];
        $user['password'] = Hash::make($input['password']);
        $user->syncroles('2');
        $user->save();

        $guru = new Guru;
        
        $guru['id_users'] = $user['id'];
        $guru['id_kelas_wali'] = $input['id_kelas_wali'];
        $guru['nip'] = $input['nip'];
        $guru['kontak'] = $input['kontak'];
        $guru['tempat_lahir'] = $input['tempat_lahir'];
        $guru['tanggal_lahir'] = $input['tanggal_lahir'];
        $guru['alamat'] = $input['alamat'];
        $guru['agama'] = $input['agama'];
        $guru['jenis_kelamin'] = $input['jenis_kelamin'];
        $guru['foto'] = $input['foto'];
        $guru->save();

        Flash::success('Guru saved successfully.');
        return redirect(route('gurus.index'));
    }

    /**
     * Display the specified Guru.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $guru = $this->guruRepository->find($id);
        if (empty($guru)) {
            Flash::error('Guru not found');
            return redirect(route('gurus.index'));
        }
        return view('gurus.show')->with('guru', $guru);
    }

    /**
     * Show the form for editing the specified Guru.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $guru = $this->guruRepository->find($id);
        $waliKelas = Kelas::pluck('kelas', 'id');

        if (empty($guru)) {
            Flash::error('Guru not found');
            return redirect(route('gurus.index'));
        }
        return view('gurus.edit', compact('waliKelas'))->with('guru', $guru);
    }

    /**
     * Update the specified Guru in storage.
     *
     * @param int $id
     * @param UpdateGuruRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGuruRequest $request){
        $guru = $this->guruRepository->find($id);

        if (empty($guru)) {
            Flash::error('Guru not found');
            return redirect(route('gurus.index'));
        }
        
        $user = User::find($guru['id_users']);
        $user['name'] = $request['name'];
        $user['email'] = $request['email'];
        if(isset($request['password']) && $request['password'] != null){
            $user['password'] = Hash::make($request['password']);
        }
        $user->save();

        $guru = Guru::find($id);
        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = str_replace(" ", "_",$foto->getClientOriginalName());
            $filenames = $request['nip'].'_'.$filename;
            $path=$request->foto->storeAs('public/foto_guru', $filenames,'local');
            $guru['foto']= $filenames;
        }
        $guru['id_kelas_wali'] = $request['id_kelas_wali'];
        $guru['kontak'] = $request['kontak'];
        $guru['nip'] = $request['nip'];
        $guru['tempat_lahir'] = $request['tempat_lahir'];
        $guru['tanggal_lahir'] = $request['tanggal_lahir'];
        $guru['alamat'] = $request['alamat'];
        $guru['jenis_kelamin'] = $request['jenis_kelamin'];
        $guru['agama'] = $request['agama'];
        $guru->save();

        Flash::success('Guru updated successfully.');
        return redirect(route('gurus.index'));
    }

    /**
     * Remove the specified Guru from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $guru = $this->guruRepository->find($id);

        if (empty($guru)) {
            Flash::error('Guru not found');
            return redirect(route('gurus.index'));
        }
        $user = Users::find($guru->id_users);
        $user->delete();
        $this->guruRepository->delete($id);
        Flash::success('Guru deleted successfully.');
        return redirect(route('gurus.index'));
    }
}
