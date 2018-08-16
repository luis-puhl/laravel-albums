@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="content-header">
                @empty($artist)
                    <h1>@lang('New Artist')</h1>
                @else
                    <h1>@lang('Editing') {{ $artist->name }}</h1>
                @endif
            </section>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @empty($artist)
                {!! Form::open(['route' => 'artist.store', 'files' => true]) !!}

                    @include('artists.fields')

                {!! Form::close() !!}
            @else
                {!! Form::model(
                    $artist,
                    ['route' => ['artist.update', $artist->id], 'method' => 'patch', 'files' => true]
                ) !!}

                    @include('artists.fields',[
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
