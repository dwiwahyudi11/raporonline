@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Daftar Nilaiku</strong></h1>
            </div>
        </div>
    </div>
</section>

<div class="row">
    @include('adminlte-templates::common.errors')
    <div class="col-md-12">
        <div class="card">
            <form action="/nilais/simpanNilai" method="POST">
                @csrf
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md" id="nilais-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Siswa</th>
                                    <th>Nilai Tugas & Ujian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilai as $nilais)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $nilais['siswa']['users']['name'] }}</td>
                                    <td>
                                        <div class="row">
                                            @role('Admin|Guru')
                                            <div class="form-group col-sm-2">
                                                <input type="number" name="id_siswa[]"
                                                    value="{{ $nilais['nilaiMapel']['id'] }}" hidden>
                                                <label>T1</label>
                                                <input class="form-control" type="number" name="tugas_satu[]" id="tugas_satu" value="{{ $nilais['nilaiMapel']['tugas_satu'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>T2</label>
                                                <input class="form-control" type="number" name="tugas_dua[]" id="tugas_dua" value="{{ $nilais['nilaiMapel']['tugas_dua'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>T3</label>
                                                <input class="form-control" type="number" name="tugas_tiga[]" id="tugas_tiga" value="{{ $nilais['nilaiMapel']['tugas_tiga'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>T4</label>
                                                <input class="form-control" type="number" name="tugas_empat[]" id="tugas_empat" value="{{ $nilais['nilaiMapel']['tugas_empat'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>T5</label>
                                                <input class="form-control" type="number" name="tugas_lima[]" id="tugas_lima" value="{{ $nilais['nilaiMapel']['tugas_lima'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>UTS</label>
                                                <input class="form-control" type="number" name="uts[]" id="uts" value="{{ $nilais['nilaiMapel']['uts'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>UAS</label>
                                                <input class="form-control" type="number" name="uas[]" id="uas" value="{{ $nilais['nilaiMapel']['uas'] }}" disabled>
                                            </div>
                                            @endrole
                                            @role('Siswa')
                                            <div class="form-group col-sm-2">
                                                <label>T1</label>
                                                <input class="form-control" type="number" name="tugas_satu[]" id="tugas_satu" value="{{ $nilais['nilaiMapel']['tugas_satu'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>T2</label>
                                                <input class="form-control" type="number" name="tugas_dua[]" id="tugas_dua" value="{{ $nilais['nilaiMapel']['tugas_dua'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>T3</label>
                                                <input class="form-control" type="number" name="tugas_tiga[]" id="tugas_tiga" value="{{ $nilais['nilaiMapel']['tugas_tiga'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>T4</label>
                                                <input class="form-control" type="number" name="tugas_empat[]" id="tugas_empat" value="{{ $nilais['nilaiMapel']['tugas_empat'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>T5</label>
                                                <input class="form-control" type="number" name="tugas_lima[]" id="tugas_lima" value="{{ $nilais['nilaiMapel']['tugas_lima'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>UTS</label>
                                                <input class="form-control" type="number" name="uts[]" id="uts" value="{{ $nilais['nilaiMapel']['uts'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>UAS</label>
                                                <input class="form-control" type="number" name="uas[]" id="uas" value="{{ $nilais['nilaiMapel']['uas'] }}" disabled>
                                            </div>
                                            @endrole
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    @role('Admin|Guru')
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    @endrole
                    <a class="btn btn-default" href="{{ URL::previous() }}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection