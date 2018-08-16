@extends('layouts.app')

@section('content')
<div class="container">
    @forelse($albums as $key => $album)
        <div class="row justify-content-center">
            <div class="col-md-2">
                <a href="{{ URL::to('album/' . $album->id) }}">
                    <img src="{{ $album->image }}" alt="{{ $album->name }}">
                </a>
            </div>
            <div class="col-md-10">
                <a href="{{ URL::to('album/' . $album->id) }}">
                    <h4>{{ $album->name }}</h4>
                </a>
                <span>{{ $album->genre }}</span>
                <br>
                <p>{{ $album->description }}</p>
            </div>
        </div>
    @empty
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>@lang('No albums to display.')</p>
            </div>
        </div>
    @endforelse
</div>
@endsection
