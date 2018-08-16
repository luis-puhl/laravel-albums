@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="content-header">
                @empty($song)
                    <h1>@lang('New song')</h1>
                @else
                    <h1>@lang('Editing') {{ $song->name }}</h1>
                @endif
            </section>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @empty($song)
                {!! Form::open(['route' => 'song.store', 'files' => true]) !!}

                    @include('songs.fields')

                {!! Form::close() !!}
            @else
                {!! Form::model(
                    $song,
                    ['route' => ['song.update', $song->id], 'method' => 'patch', 'files' => true]
                ) !!}

                    @include('songs.fields',[
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
