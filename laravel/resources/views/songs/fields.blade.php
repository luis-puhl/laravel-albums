<div class="form-row">
    <div class="col-md-1">
        {!! Form::label('order_number', __('#').':') !!}
        {!! Form::number('order_number', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('name', __('name').':') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('composer', __('composer').':') !!}
        {!! Form::text('composer', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-1">
        {!! Form::label('duration', __('duration').':') !!}
        {!! Form::number('duration', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('song.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
</div>
