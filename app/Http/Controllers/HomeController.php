<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){   
        $siswa = Siswa::all();
        if(Auth::user()->hasRole('Guru')){
            $guru = Guru::all()->where('id_users',Auth::user()->id)->first();
            return view('home',compact('guru','siswa'));

        }elseif(Auth::user()->hasRole('Admin')){
            $guru = Guru::all()->COUNT();
            $kelas = Kelas::all()->COUNT();
            $mapel = Mapel::all()->COUNT();
            $siswa = $siswa->COUNT();
            $siswas = Siswa::where('id_users',Auth::user()->id)->first();
            return view('home',compact('guru','siswa','kelas','mapel','siswas'));
        }
        $mapel = Mapel::all()->COUNT();
        return view('home', compact('mapel','siswa'));
    }
}
