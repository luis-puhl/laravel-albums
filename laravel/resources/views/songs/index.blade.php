@extends('layouts.app')

@section('content')
<div class="container">
    @forelse($songs as $key => $song)
        <div class="row justify-content-center">
            <div class="col-md-2">
                <a href="{{ URL::to('song/' . $song->id) }}">
                    <img src="{{ $song->image }}" alt="{{ $song->name }}">
                </a>
            </div>
            <div class="col-md-10">
                <a href="{{ URL::to('song/' . $song->id) }}">
                    <h4>{{ $song->name }}</h4>
                </a>
                <span>{{ $song->genre }}</span>
                <br>
                <p>{{ $song->description }}</p>
            </div>
        </div>
    @empty
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>@lang('No songs to display.')</p>
            </div>
        </div>
    @endforelse
</div>
@endsection
