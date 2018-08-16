@extends('layouts.app')

@section('content')
<div class="container">
    @empty($song)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>@lang('No song to display.')</p>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-2">
                <img src="{{ $song->album->cover_photo }}" alt="{{ $song->name }}">
            </div>
            <div class="col-md-10">
                <h1>{{ $song->name }}</h1>
                <a href="{{ action('SongController@edit', ['song' => $song]) }}">
                    @lang('Edit')
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <span>{{ $song->genre }}</span>
                <br>
                <p>{{ $song->description }}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
    @endif
</div>
@endsection
