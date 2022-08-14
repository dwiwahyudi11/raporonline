@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Daftar Nilai Kelas <strong>{{ $kelas['kelas'] }}</strong></h1>
            </div>
        </div>
    </div>
</section>

<div class="row">
    @include('adminlte-templates::common.errors')
    <div class="col-md-12">
        <div class="card">
            @if (COUNT($siswaMemilikiNilai) == COUNT($siswa))
            <div class="card-body">
                <h4>Nilai seluruh siswa pada Mata Pelajaran ini sudah terisi, silahkan klik ubah nilai untuk melakukan perubahan nilai!</h4>
                <a class="btn btn-success btn-sm" href="/nilais/lihatNilai/{{ $idMapel }}/{{ $kelas['id'] }}"><i class="fa fa-edit"></i> Edit Nilai</a>
            </div>
            @else
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
                                    @foreach($siswa as $item)
                                        @if (!in_array($item['id'],$siswaMemilikiNilai))
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item['users']['name'] }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="form-group col-sm-3">
                                                            <input type="number" name="id_siswa[]" value="{{ $item['id'] }}" hidden>
                                                            <input type="number" name="id_kelas" value="{{ $idKelas }}" hidden>
                                                            <input type="number" name="id_mapel" value="{{ $idMapel }}" hidden>
                                                            <label>Tugas 1</label>
                                                            <input class="form-control" type="number" name="tugas_satu[]" id="tugas_satu">
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>Tugas 2</label>
                                                            <input class="form-control" type="number" name="tugas_dua[]" id="tugas_dua">
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>Tugas 3</label>
                                                            <input class="form-control" type="number" name="tugas_tiga[]" id="tugas_tiga" >
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>Tugas 4</label>
                                                            <input class="form-control" type="number" name="tugas_empat[]" id="tugas_empat">
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>Tugas 5</label>
                                                            <input class="form-control" type="number" name="tugas_lima[]" id="tugas_lima">
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>UTS</label>
                                                            <input class="form-control" type="number" name="uts[]" id="uts">
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>UAS</label>
                                                            <input class="form-control" type="number" name="uas[]" id="uas">
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label>Deskripsi</label>
                                                            <textarea class="form-control" name="deskripsi[]" id="deskripsi"></textarea>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a class="btn btn-default" href="{{ URL::previous() }}">Kembali</a>
                    </div>
                </form>
            @endif
          
        </div>
    </div>
</div>
@endsection