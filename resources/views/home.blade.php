@extends('layouts.app')
@section('title', 'Beranda')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="row">
                @role('Admin')
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-4">
                                    <i class="fas fa-school fa-3x   "></i>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Jumlah Kelas</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $kelas }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-4">
                                    <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Jumlah Siswa</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $siswa }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-4">
                                    <i class="fas fa-hat-wizard  fa-3x  "></i>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Jumlah Guru</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $guru }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-4">
                                    <i class="fas fa-book  fa-3x "></i>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Mata Pelajaran</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $mapel }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
                @role('Guru')
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-4">
                                    <i class="fas fa-school fa-3x   "></i>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Wali Kelas</p>
                                    <h3 class="mb-0 text-black font-w600">{{ ($guru->id_kelas_wali != null)?$guru->kelas->kelas:"Tidak Menjadi Wali Kelas" }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-4">
                                    <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Jumlah Siswa Kelas</p>
                                    <h3 class="mb-0 text-black font-w600">{{ ($guru->id_kelas_wali != null)?COUNT($siswa->where('id_kelas',$guru->kelas->id)):"Tidak Menjadi Wali Kelas" }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
                @role('Siswa')
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="mr-4">
                                    <i class="fas fa-book fa-3x "></i>
                                </span>
                                <div class="media-body ml-1">
                                    <p class="mb-2">Mata Pelajaran</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $mapel }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
            </div>
        </div>
    </div>
</div>
@endsection
