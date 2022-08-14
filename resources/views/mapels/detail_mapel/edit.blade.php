@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Guru Pengampu <strong>{!! $mapel['mata_pelajaran'] !!}</strong></h1>
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#basicModal">Tambah Guru</button>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Guru</th>
                                    <th>Semester</th>
                                    <th>Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($mapelDetail as $item)
                                    @if ($item['guru'] != null)
                                        <tr>
                                            <td rowspan="{{ COUNT($item->jadwal) }}" class="text-center" style="width: 5%">{{ $no++ }}</td>
                                            <td rowspan="{{ COUNT($item->jadwal) }}">{!! $item['guru']['users']['name'] !!}</td>
                                            <td rowspan="{{ COUNT($item->jadwal) }}" class="text-center">{!! $item['mapel']['semester'] !!}</td>
                                            @foreach ($item->jadwal as $kelas)
                                                @if ($loop->iteration == 1)
                                                    <td class="pt-1 pb-1 text-center">{!! $kelas['kelas']['kelas'] !!} </td>
                                                    <td rowspan="{{ COUNT($item->jadwal) }}" class="text-center"><a type="button" class="btn btn-primary mb-2" href="/mapels/guruPengampuEdit/{{ $item['id'] }}/{{ $item['guru']['id'] }}">Edit Guru</a></td>
                                                @else
                                                <tr>
                                                    <td class="pt-1 pb-1 text-center">{!! $kelas['kelas']['kelas'] !!} </td>
                                                </tr>
                                            @endif
                                            @endforeach
                                        </tr>
                                    @endif
                                   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! Form::model($mapel, ['route' => ['mapels.guruPengampuSave'], 'method' => 'POST']) !!}
                <div class="bootstrap-modal">
                    <div class="modal fade show" id="basicModal" style="display: none; padding-right: 17px;" aria-modal="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Guru {!! $mapel['mata_pelajaran'] !!}</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('id_mapel', 'Mata Pelajaran') !!}
                                            {!! Form::text('id_mapel', $mapel['id'], ['class' => 'form-control', 'hidden']) !!}
                                            {!! Form::text('mata_pelajaran', $mapel['mata_pelajaran'], ['class' => 'form-control', 'disabled']) !!}
                                        </div>
                                        <!-- Guru Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('id_guru', 'Guru Pengampu') !!}
                                            <select name="id_guru" id="id_guru" class="form-control">
                                                <option value="">Pilih Guru Pengampu</option>
                                                @foreach ($guru as $item)
                                                    <option value="{{ $item['id'] }}">{{ $item['users']['name'] }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('kelas', 'Kelas') !!}
                                            <div class=" skin skin-flat">
                                                @foreach($kelasArray as $item)
                                                    <fieldset>
                                                        {!! Form::checkbox('kelasArray[]', $item->id, in_array($item->id, $kelasArrays)?true:false,['id'=>'input-'.$item->id]) !!}
                                                        <label for="input-{{$item->id}}" class="ml-1">{!! $item->kelas !!}</label>
                                                    </fieldset>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

                {!! Form::model($mapel, ['route' => ['mapels.guruPengampuUpdate', $mapel->id], 'method' => 'POST']) !!}
                <div class="bootstrap-modal">
                    <div class="modal fade show" id="updateModal" style="display: none; padding-right: 17px;" aria-modal="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Guru {!! $mapel['mata_pelajaran'] !!}</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('id_mapel', 'Mata Pelajaran :') !!}
                                            {!! Form::text('id_mapel', $mapel['id'], ['class' => 'form-control', 'hidden']) !!}
                                            {!! Form::text('mata_pelajaran', $mapel['mata_pelajaran'], ['class' => 'form-control', 'disabled']) !!}
                                        </div>
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('id_guru', 'Guru Pengampu :') !!}
                                            <select name="id_guru" id="id_guru" class="form-control">
                                                <option value="">Pilih Guru Pengampu</option>
                                                @foreach ($mapel['mapelDetails'] as $items)
                                                @foreach ($guru as $item)
                                                    <option value="{{ $item['id'] }}"{{ ($item['id'] == $items['id_guru']) ? 'selected' : '' }}>{{ $item['users']['name'] }}</option>
                                                @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
