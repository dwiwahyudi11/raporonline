@extends('layouts.app')
@section('title', 'Table Siswa')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profileku</h1>
                </div>
                <div class="col-sm-6">
                    @role('Admin')
                    <a class="btn btn-primary float-right" href="{{ route('siswas.create') }}">
                        Tambah Siswa
                    </a>
                    @endrole
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table" id="siswas-table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Kontak</th>
                            <th>Tempat Lahir</th>
                            <th>Foto</th>
                            <th colspan="3">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($siswas as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa['users']['name'] }}</td>
                                <td>{{ $siswa['kelas']['kelas'] }}</td>
                                <td>{{ $siswa['kontak'] }}</td>
                                <td>{{ $siswa['tempat_lahir'] }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y') }}</td>
                                <td>
                                    @if ($siswa['foto'] != null)
                                        <img src="{{ asset('storage/foto_siswa/'.$siswa['foto']) }}" width="100" alt="">
                                    @else
                                        <img src="" alt="">
                                    @endif
                                </td>
                                <td width="120">
                                    {!! Form::open(['route' => ['siswas.destroy', $siswa->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>

                                        <a href="{{ route('siswas.edit', [$siswa->id]) }}"
                                           class='btn btn-success btn-xs'>
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

