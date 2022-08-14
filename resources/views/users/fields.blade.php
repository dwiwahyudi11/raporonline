<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-12 row">
    {!! Form::label('s_role_id', 'Role Akses Diberikan',['class' => 'col-md-3 label-control']) !!}
    <div class=" skin skin-flat">
        @foreach($sRoles as $item)
            <fieldset>
                {!! Form::checkbox('s_role_id[]', $item->id, in_array($item->id, $roles)?true:false,['id'=>'input-'.$item->id]) !!}
                <label for="input-{{$item->id}}" class="ml-1">{!! $item->name !!}</label>
            </fieldset>
        @endforeach
    </div>
</div>