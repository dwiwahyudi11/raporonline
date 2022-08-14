<!-- Id Siswa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_siswa', 'Nama Siswa:') !!}
    <select name="id_siswa" id="id_siswa" class="form-control">
        <option value="" style="display: none">Pilih Siswa</option>
        @foreach ($siswa as $item)
            <option value="{{ $item['users']['id'] }}">{{ $item['users']['name'] }}</option>
        @endforeach
    </select>
</div>

<!-- Id Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kelas', 'Kelas:') !!}
    {!! Form::select('id_kelas', $kelas, null, ['class' => 'form-control', 'placeholder' => 'Pilih Kelas']) !!}
</div>

<!-- Semester Field -->
<div class="form-group col-sm-6">
    {!! Form::label('semester', 'Semester :') !!}
    {!! Form::text('semester', null, ['class' => 'form-control']) !!}
</div>

<!-- Mata Pelajaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_mapel', 'Mata Pelajaran :') !!}
    {!! Form::select('id_mapel', $mapel, null, ['class' => 'form-control', 'placeholder' => 'Pilih Mata Pelajaran']) !!}
</div>

<!-- Tugas Satu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tugas_satu', 'Tugas Satu :') !!}
    {!! Form::number('tugas_satu', null, ['class' => 'form-control']) !!}
</div>

<!-- Tugas Dua Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tugas_dua', 'Tugas Dua :') !!}
    {!! Form::number('tugas_dua', null, ['class' => 'form-control']) !!}
</div>

<!-- Tugas Tiga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tugas_tiga', 'Tugas Tiga :') !!}
    {!! Form::number('tugas_tiga', null, ['class' => 'form-control']) !!}
</div>

<!-- Tugas Empat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tugas_empat', 'Tugas Empat :') !!}
    {!! Form::number('tugas_empat', null, ['class' => 'form-control']) !!}
</div>

<!-- Tugas Lima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tugas_lima', 'Tugas Lima :') !!}
    {!! Form::number('tugas_lima', null, ['class' => 'form-control']) !!}
</div>

<!-- UTS Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uts', 'UTS :') !!}
    {!! Form::number('uts', null, ['class' => 'form-control']) !!}
</div>

<!-- UAS Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uas', 'UAS :') !!}
    {!! Form::number('uas', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi :') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>