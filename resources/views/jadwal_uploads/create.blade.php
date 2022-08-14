@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tambah Jadwal</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::open(['route' => 'jadwalUploads.store', 'files' => true]) !!}
            <div class="card-body">
                <div class="row">
                    @include('jadwal_uploads.fields')
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('jadwalUploads.index') }}" class="btn btn-default">Batal</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection