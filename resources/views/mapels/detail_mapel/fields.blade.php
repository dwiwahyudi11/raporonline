@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Guru Pengampu <strong>{!! $mapel['mata_pelajaran'] !!}</strong></h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-body">
                {!! Form::model($mapel, ['route' => ['mapels.guruPengampuUpdate', $idMapelDetail], 'method' => 'POST']) !!}
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::text('id_mapel', $idMapelDetail, ['class' => 'form-control', 'hidden']) !!}
                        {!! Form::label('id_guru', 'Guru Pengampu :') !!}
                        <select name="id_guru" id="id_guru" class="form-control">
                            <option value="">Pilih Guru Pengampu</option>
                            @foreach ($guru as $item)
                                <option value="{{ $item['id'] }}"{{ ($item['id'] == $idGuru) ? 'selected' : '' }}>{{ $item['users']['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('id_kelas', 'Kelas :') !!}
                        @foreach($kelasArray as $item)
                            <fieldset>
                                {!! Form::checkbox('kelas_array[]', $item->id, in_array($item->id, $kelasArrays)?true:false,['id'=>'input-'.$item->id]) !!}
                                <label for="input-{{$item->id}}" class="ml-1">{!! $item->kelas !!}</label>
                            </fieldset>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('mapels.guruPengampu', $idMapelDetail) }}" class="btn btn-default">Kembali</a>
                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
