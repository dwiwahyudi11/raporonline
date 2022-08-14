<!-- File Field -->
<div class="form-group col-sm-12">
    {!! Form::label('file', 'File') !!}
    {!! Form::file('file', ['class' => 'form-control', 'accept' => 'image/*']) !!}

    
</div>
<div class="form-group col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>