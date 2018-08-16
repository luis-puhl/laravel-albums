<div class="form-group">
    {!! Form::label('name', __('name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('genre', __('genre').':') !!}
    {!! Form::text('genre', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', __('description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Upload da imagem:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('artist.index') !!}" class="btn btn-default">Cancelar</a>
</div>

<div class="form-group">
@if (false)
    @include('categorias.select', [
        'selecionadas' => $trabalhoRecente->categorias->pluck('id')
    ])
    @include('categorias.select')
@endif
</div>
