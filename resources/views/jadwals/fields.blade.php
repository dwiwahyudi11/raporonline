<!-- Id Mapel Field -->
<div class="form-group col-sm-3">
    {!! Form::label('id_mapel', 'Mata Pelajaran') !!}
    {!! Form::select('id_mapel', $mapel, null, ['class' => 'form-control']) !!}
</div>

<!-- Id Kelas Field -->
<div class="form-group col-sm-3">
    {!! Form::label('id_kelas', 'Kelas') !!}
    {!! Form::select('id_kelas', $kelas, null, ['class' => 'form-control']) !!}
</div>

<!-- Jam Mulai Field -->
<div class="form-group col-sm-3">
    {!! Form::label('jam_mulai', 'Jam Mulai') !!}
    {!! Form::time('jam_mulai', null, ['class' => 'form-control']) !!}
</div>

<!-- Jam Akhir Field -->
<div class="form-group col-sm-3">
    {!! Form::label('jam_akhir', 'Jam Akhir') !!}
    {!! Form::time('jam_akhir', null, ['class' => 'form-control']) !!}
</div>

<!-- Jam Akhir Field -->
<div class="form-group col-sm-3">
    {!! Form::label('hari', 'Hari') !!}
    {!! Form::text('hari', null, ['class' => 'form-control']) !!}
</div>