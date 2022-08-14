@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1>Daftar Nama Siswa Kelas <strong>{{ $kelas['kelas'] }}</strong></h1>
                </div>
                @role('Admin|Guru')
                <div class="col-sm-2">
                    <a href="/rapots/isiKehadiran/{{ $kelas['id'] }}" class="btn btn-info">Isi Kehadiran</a>
                </div>
                <div class="col-sm-2">
                    <a href="/rapots/editKehadiran/{{ $kelas['id'] }}" class="btn btn-info">Edit Kehadiran</a>
                </div>
                @endrole
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table" id="nilais-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($siswa as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['users']['name'] }}</td>
                                    <td>
                                        <a class="btn btn-danger" href="/rapots/lihatRapot/{{ $kelas['id'] }}/{{ $item['id'] }}">Lihat Rapot</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection