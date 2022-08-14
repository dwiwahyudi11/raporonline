@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Kehadiran Siswa Kelas <strong>{{ $kelas['kelas'] }}</strong></h1>
            </div>
        </div>
    </div>
</section>

<div class="row">
    @include('adminlte-templates::common.errors')
    <div class="col-md-12">
        <div class="card">
            <form action="/rapots/updateKehadiran" method="POST">
                @csrf
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md" id="rapots-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Siswa</th>
                                    <th style="text-align: center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilai as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['siswa']['users']['name'] }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="form-group col-sm-3">
                                                <input type="number" name="id_siswa[]" value="{{ $item['id_siswa'] }}" hidden>
                                                <input type="number" name="id_kelas" value="{{ $id }}" hidden>
                                                {{-- <input type="number" name="id_nilai[]" value="{{ $item['id'] }}" hidden> --}}
                                                <label>Sakit</label>
                                                <input class="form-control" type="number" name="sakit[]" id="sakit" value="{{ $item['sakit'] }}" required>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label>Izin</label>
                                                <input class="form-control" type="number" name="izin[]" id="izin" value="{{ $item['izin'] }}" required>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label style="font-size: 15px">Tanpa Keterangan</label>
                                                <input class="form-control" type="number" name="tanpa_keterangan[]" id="tanpa_keterangan" value="{{ $item['tanpa_keterangan'] }}" required>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label>Semester</label>
                                                <input class="form-control" type="number" name="semester[]" id="semester" value="{{ $item['semester'] }}" required>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label>Catatan Wali Kelas</label>
                                                <textarea class="form-control" name="catatan_wali_kelas[]" id="catatan_wali_kelas">{{ $item['catatan_wali_kelas'] }}</textarea>
                                            </div>
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