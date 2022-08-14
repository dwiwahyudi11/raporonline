<!-- Id Users Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Lengkap') !!}
    {!! Form::text('name', $siswa['users']['name'], ['class' => 'form-control', 'required']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-2">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
    {!! Form::select('jenis_kelamin', array('L' => 'Laki - Laki', 'P' => 'Perempuan'), null, ['class' => 'form-control', 'placeholder' => 'Pilih Jenis Kelamin', 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', $siswa['users']['email'], ['class' => 'form-control']) !!}
</div>

<!-- NIS Field -->
<div class="form-group col-sm-2">
    {!! Form::label('nisn', 'NIS') !!}
    {!! Form::text('nisn', null, ['class' => 'form-control']) !!}
</div>

<!-- NIPD Field -->
<div class="form-group col-sm-2">
    {!! Form::label('nipd', 'NIPD') !!}
    {!! Form::text('nipd', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Kelas Field -->
<div class="form-group col-sm-2">
    {!! Form::label('id_kelas', 'Kelas') !!}
    {!! Form::select('id_kelas', $kelas, null, ['class' => 'form-control', 'placeholder' => 'Pilih Kelas', 'required']) !!}
</div>

<!-- Agama Field -->
<div class="form-group col-sm-3">
    {!! Form::label('agama', 'Agama') !!}
    {!! Form::select('agama', array('Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Kristen Katholik' => 'Kristen Katholik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Konghuchu' => 'Konghuchu'), null, ['class' => 'form-control', 'placeholder' => 'Pilih Agama', 'required']) !!}
</div>

<!-- Kontak Field -->
<div class="form-group col-sm-3">
    {!! Form::label('kontak', 'Kontak') !!}
    {!! Form::number('kontak', null, ['class' => 'form-control','maxlength' => 14,'maxlength' => 14, 'required']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-3">
    {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
    {!! Form::text('tempat_lahir', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-3">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir') !!}
    {!! Form::date('tanggal_lahir', $siswa['tanggal_lahir']->format('Y-m-d'), ['class' => 'form-control','id'=>'tanggal_lahir', 'required']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto') !!}
    {!! Form::file('foto', ['class' => 'form-control border-left-3 black text-bold-600', 'accept' => 'image/*', 'files'=>'true', 'required']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12">
    {!! Form::label('alamat', 'Alamat') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'rows'=>'3', 'required', 'required']) !!}
</div>

<div class="form-group col-sm-12">
    <h6>Jangan Isi Password Jika Tidak Ingin Diganti!</h6>
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