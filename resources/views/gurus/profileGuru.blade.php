@extends('layouts.app')
@section('title', 'Table Guru')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profileku</h1>
                </div>
                <div class="col-sm-6">
                    @role('Admin')
                    <a class="btn btn-primary float-right" href="{{ route('gurus.create') }}">
                        Tambah
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
                    <table class="table" id="gurus-table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Wali Kelas</th>
                            <th>NIP</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Kontak</th>
                            <th colspan="3">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gurus as $guru)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $guru['users']['name'] }}</td>
                                <td>{{ ($guru['id_kelas_wali']==null)?"Bukan Wali Kelas":$guru['kelas']['kelas'] }}</td>
                                <td>{{ $guru->nip }}</td>
                                <td>{{ $guru->tempat_lahir }}, {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->format('d F Y') }}</td>
                                <td>{{ $guru->alamat }}</td>
                                <td>{{ $guru->kontak }}</td>
                                <td width="120">
                                    {!! Form::open(['route' => ['gurus.destroy', $guru->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{{ route('gurus.show', [$guru->id]) }}"
                                           class='btn btn-default btn-xs'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('gurus.edit', [$guru->id]) }}"
                                           class='btn btn-default btn-xs'>
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

