<!-- Users Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama') !!}
    {!! Form::text('name', $guru['users']['name'], ['class' => 'form-control', 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', $guru['users']['email'], ['class' => 'form-control', 'required']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-2">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
    {!! Form::select('jenis_kelamin', array('L' => 'Laki - Laki', 'P' => 'Perempuan'), null, ['class' => 'form-control', 'placeholder' => 'Pilih Jenis Kelamin']) !!}
</div>

<!-- Kontak Field -->
<div class="form-group col-sm-3">
    {!! Form::label('kontak', 'Kontak') !!}
    {!! Form::text('kontak', null, ['class' => 'form-control','maxlength' => 14,'maxlength' => 14]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nip', 'NIP') !!}
    {!! Form::number('nip', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-3">
    {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
    {!! Form::text('tempat_lahir', null, ['class' => 'form-control','maxlength' => 145,'maxlength' => 145]) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-3">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir') !!}
    {!! Form::date('tanggal_lahir', $guru['tanggal_lahir']->format('Y-m-d'), ['class' => 'form-control','id'=>'tanggal_lahir']) !!}
</div>

<!-- Agama Field -->
<div class="form-group col-sm-3">
    {!! Form::label('agama', 'Agama') !!}
    {!! Form::text('agama', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Kelas Wali Field -->
<div class="form-group col-sm-3">
    {!! Form::label('id_kelas_wali', 'Kelas Wali') !!}
    {!! Form::select('id_kelas_wali', $waliKelas, null, ['class' => 'form-control', 'placeholder' => 'Pilih kelas']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto') !!}
    {!! Form::file('foto', ['class' => 'form-control border-left-3 black text-bold-600', 'accept' => 'image/*', 'files'=>'true', 'required']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control','rows'=>'3', 'required']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Konfirmasi Password') !!}
    {!! Form::password('password_confirm', ['class' => 'form-control']) !!}
</div>