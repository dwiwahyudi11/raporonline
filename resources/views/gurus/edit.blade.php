@extends('layouts.app')
@section('title', 'Table Guru')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Guru</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::model($guru, ['route' => ['gurus.update', $guru->id], 'method' => 'patch', 'files' => 'true']) !!}
            <div class="card-body">
                <div class="row">
                    @include('gurus.fieldsEdit')
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('gurus.index') }}" class="btn btn-default">Batal</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection