@extends('layouts.app')
@section('title', 'Table Siswa')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tabel Siswa</h1>
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
                @include('siswas.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

