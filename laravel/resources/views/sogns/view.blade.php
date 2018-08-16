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
                <img src="{{ $song->image }}" alt="{{ $song->name }}">
            </div>
            <div class="col-md-10">
                <h1>{{ $song->name }}</h1>
                <a href="{{ action('songController@edit', ['song' => $song]) }}">
                    Edit
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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="albums">
                    <ul class="list-group">
                        {{-- @forelse($song['albums'] as $key => $album) --}}
                            <li class="list-group-item">
                                <strong>
                                data{{-- {{ $album->created_at->diffForHumans()}} --}}: &nbsp;
                                </strong>
                                album{{-- {{ $album->body }} --}}
                            </li>
                        {{-- @empty --}}
                            <li class="list-group-item">
                                <p>@lang('No Albums for this song.')</p>
                            </li>
                        {{-- @endforelse --}}
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
