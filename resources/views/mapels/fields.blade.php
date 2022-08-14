<!-- Mata Pelajaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mata_pelajaran', 'Mata Pelajaran') !!}
    {!! Form::text('mata_pelajaran', null, ['class' => 'form-control','maxlength' => 145,'maxlength' => 145]) !!}
</div>

<!-- Semester Field -->
<div class="form-group col-sm-6">
    {!! Form::label('semester', 'Semester') !!}
    {!! Form::text('semester', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Guru Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_guru', 'Guru Pengampu :') !!}
    <select name="id_guru" id="id_guru" class="form-control">
        <option value="" style="display: none">Pilih Guru Pengampu</option>
        @foreach ($guru as $item)
            <option value="{{ $item['users']['id'] }}">{{ $item['users']['name'] }}</option>
        @endforeach
    </select>
</div> --}}