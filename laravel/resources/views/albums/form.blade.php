@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="content-header">
                @empty($album)
                    <h1>@lang('New album')</h1>
                @else
                    <h1>@lang('Editing') {{ $album->name }}</h1>
                @endif
            </section>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @empty($album)
                {!! Form::open(['route' => 'album.store', 'files' => true]) !!}

                    @include('albums.fields')

                {!! Form::close() !!}
            @else
                {!! Form::model(
                    $album,
                    ['route' => ['album.update', $album->id], 'method' => 'patch', 'files' => true]
                ) !!}

                    @include('albums.fields',[
                        'editing' => true
                    ])

                {!! Form::close() !!}
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.errors')
        </div>
    </div>
</div>
@endsection
