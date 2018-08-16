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
                <img src="{{ $album->image }}" alt="{{ $album->name }}">
            </div>
            <div class="col-md-10">
                <h1>{{ $album->name }}</h1>
                <a href="{{ action('albumController@edit', ['album' => $album]) }}">
                    Edit
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
                <div class="albums">
                    <ul class="list-group">
                        {{-- @forelse($album['albums'] as $key => $album) --}}
                            <li class="list-group-item">
                                <strong>
                                data{{-- {{ $album->created_at->diffForHumans()}} --}}: &nbsp;
                                </strong>
                                album{{-- {{ $album->body }} --}}
                            </li>
                        {{-- @empty --}}
                            <li class="list-group-item">
                                <p>@lang('No Albums for this album.')</p>
                            </li>
                        {{-- @endforelse --}}
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
