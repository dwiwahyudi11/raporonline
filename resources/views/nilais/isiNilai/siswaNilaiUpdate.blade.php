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
                                @if (Auth::user()->hasRole('Admin|Guru'))
                                @php
                                    $no=1;
                                @endphp
                                    @foreach ($nilai as $nilais)
                                        @foreach ($nilais->nilaiDetails as $item)
                                            @if ($item->id_mapel == $idMapel)
                                            @if ($nilais['siswa'] != null)
                                            <tr> 
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $nilais['siswa']['users']['name'] }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="form-group col-sm-3">
                                                            <input type="number" name="id_siswa[]" value="{{ $item['nilai']['id_siswa'] }}" hidden>
                                                            <input type="number" name="idNilai[]" value="{{ $item['nilai']['id'] }}" hidden>
                                                            <input type="number" name="idNilaiDetail[]" value="{{ $item->id }}" hidden>
                                                            <input type="number" name="id_kelas" value="{{ $idKelas }}" hidden>
                                                            <input type="number" name="id_mapel" value="{{ $idMapel }}" hidden>
                                                            <label>T1</label>
                                                            <input class="form-control" type="number" name="tugas_satu[]" id="tugas_satu" value="{{ $item->tugas_satu }}" required>
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>T2</label>
                                                            <input class="form-control" type="number" name="tugas_dua[]" id="tugas_dua" value="{{ $item->tugas_dua}}" required>
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>T3</label>
                                                            <input class="form-control" type="number" name="tugas_tiga[]" id="tugas_tiga" value="{{ $item->tugas_tiga }}" required>
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>T4</label>
                                                            <input class="form-control" type="number" name="tugas_empat[]" id="tugas_empat" value="{{ $item->tugas_empat }}" required>
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>T5</label>
                                                            <input class="form-control" type="number" name="tugas_lima[]" id="tugas_lima" value="{{ $item->tugas_lima }}" required>
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>UTS</label>
                                                            <input class="form-control" type="number" name="uts[]" id="uts" value="{{ $item->uts }}" required>
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>UAS</label>
                                                            <input class="form-control" type="number" name="uas[]" id="uas" value="{{ $item->uas }}" required>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label>Deskripsi</label>
                                                            <textarea class="form-control" name="deskripsi[]" id="deskripsi">{{ $item->deskripsi }}</textarea>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                            @endif
                                        @endforeach
                                        
                                    @endforeach
                                @endif
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