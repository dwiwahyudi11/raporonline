<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Guard Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    {!! Form::text('guard_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('s_permission_id', 'Permission') !!}
    <div class="col-md-9">
        <div class="row skin skin-flat">
            @foreach($sPermissions as $item)
                <div class="col-md-6">
                    <fieldset>
                        {!! Form::checkbox('s_permission_id[]', $item->id, in_array($item->id, $permissions)?true:false,['id'=>'input-'.$item->id]) !!}
                        <label for="input-{{$item->id}}">{!! $item->name !!}</label>
                    </fieldset>
                </div>
            @endforeach
        </div>
    </div>
</div>