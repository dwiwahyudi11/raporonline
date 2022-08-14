@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Daftar Nilai </strong></h1>
            </div>
        </div>
    </div>
</section>

<div class="row">
    @include('adminlte-templates::common.errors')
    <div class="col-md-12">
        <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md" id="nilaiDetails-table">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Nilai Tugas & Ujian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $nilais['siswa']['users']['name'] }}</td>
                                    <td>
                                        <div class="row">
                                            
                                            <div class="form-group col-sm-2">
                                                <label>Tugas 1</label>
                                                <input class="form-control" type="number" name="tugas_satu[]" id="tugas_satu" value="{{ $nilaiDetails['tugas_satu'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>Tugas 2</label>
                                                <input class="form-control" type="number" name="tugas_dua[]" id="tugas_dua" value="{{ $nilaiDetails['tugas_dua'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>Tugas 3</label>
                                                <input class="form-control" type="number" name="tugas_tiga[]" id="tugas_tiga" value="{{ $nilaiDetails['tugas_tiga'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>Tugas 4</label>
                                                <input class="form-control" type="number" name="tugas_empat[]" id="tugas_empat" value="{{ $nilaiDetails['tugas_empat'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>Tugas 5</label>
                                                <input class="form-control" type="number" name="tugas_lima[]" id="tugas_lima" value="{{ $nilaiDetails['tugas_lima'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>UTS</label>
                                                <input class="form-control" type="number" name="uts[]" id="uts" value="{{ $nilaiDetails['uts'] }}" disabled>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>UAS</label>
                                                <input class="form-control" type="number" name="uas[]" id="uas" value="{{ $nilaiDetails['uas'] }}" disabled>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-default" href="{{ URL::previous() }}">Kembali</a>
                </div>
        </div>
    </div>
</div>
@endsection