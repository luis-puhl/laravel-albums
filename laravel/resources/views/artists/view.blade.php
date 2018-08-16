@extends('layouts.app')

@section('content')
<div class="container">
    @empty($artist)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>@lang('No Artist to display.')</p>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-2">
                <img src="{{ $artist->image }}" alt="{{ $artist->name }}">
            </div>
            <div class="col-md-10">
                <h1>{{ $artist->name }}</h1>
                <a href="{{ action('ArtistController@edit', ['artist' => $artist]) }}">
                    Edit
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <span>{{ $artist->genre }}</span>
                <br>
                <p>{{ $artist->description }}</p>
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
                        {{-- @forelse($artist['albums'] as $key => $album) --}}
                            <li class="list-group-item">
                                <strong>
                                data{{-- {{ $album->created_at->diffForHumans()}} --}}: &nbsp;
                                </strong>
                                album{{-- {{ $album->body }} --}}
                            </li>
                        {{-- @empty --}}
                            <li class="list-group-item">
                                <p>@lang('No Albums for this Artist.')</p>
                            </li>
                        {{-- @endforelse --}}
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
