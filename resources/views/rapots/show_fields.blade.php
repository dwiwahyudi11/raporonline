<!-- Id Nilai Field -->
<div class="col-sm-12">
    {!! Form::label('id_nilai', 'Id Nilai:') !!}
    <p>{{ $rapot->id_nilai }}</p>
</div>

<!-- Sakit Field -->
<div class="col-sm-12">
    {!! Form::label('sakit', 'Sakit:') !!}
    <p>{{ $rapot->sakit }}</p>
</div>

<!-- Izin Field -->
<div class="col-sm-12">
    {!! Form::label('izin', 'Izin:') !!}
    <p>{{ $rapot->izin }}</p>
</div>

<!-- Tanpa Keterangan Field -->
<div class="col-sm-12">
    {!! Form::label('tanpa_keterangan', 'Tanpa Keterangan:') !!}
    <p>{{ $rapot->tanpa_keterangan }}</p>
</div>

