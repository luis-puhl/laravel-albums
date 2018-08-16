@extends('layouts.app')

@section('content')
<div class="container">
    @empty($album)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>@lang('No album to display.')</p>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-2">
                <img src="{{ $album->cover_photo }}" alt="{{ $album->name }}">
            </div>
            <div class="col-md-10">
                <h1>{{ $album->name }}</h1>
                <a href="{{ action('AlbumController@edit', ['album' => $album]) }}">
                    @lang('Edit')
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <span>{{ $album->genre }}</span>
                <br>
                <p>{{ $album->description }}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>@lang('Songs in this Album')</h3>
                <div class="songs">
                    <ul class="list-group">
                        @forelse($album->songs()->orderBy('order_number')->get() as $key => $song)
                            <li class="list-group-item">
                                <a href="{{ action('SongController@show', ['song' => $song]) }}">
                                    <strong>
                                        {{ $song->order_number }}: &nbsp;
                                    </strong>
                                    {{ $song->name }}
                                    ({{ $song->duration }} seconds)
                                </a>
                            </li>
                        @empty
                            <li class="list-group-item">
                                <p>@lang('No Songs for this Album.')</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
