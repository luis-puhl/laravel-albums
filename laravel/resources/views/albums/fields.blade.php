<div class="form-group">
    {!! Form::label('name', __('name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('released_at', __('released_at').':') !!}
    {!! Form::date('released_at', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('cover_photo', __('cover_photo').':') !!}
    {!! Form::file('cover_photo', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('album.index') !!}" class="btn btn-default">__('Cancel')</a>
</div>

<div class="form-group">
@if (false)
    @include('categorias.select', [
        'selecionadas' => $trabalhoRecente->categorias->pluck('id')
    ])
    @include('categorias.select')
@endif
</div>
