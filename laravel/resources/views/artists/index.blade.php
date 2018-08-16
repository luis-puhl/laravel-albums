@extends('layouts.app')

@section('content')
<div class="container">
    @forelse($artists as $key => $artist)
        <div class="row justify-content-center">
            <div class="col-md-2">
                <a href="{{ URL::to('artist/' . $artist->id) }}">
                    <img src="{{ $artist->image }}" alt="{{ $artist->name }}">
                </a>
            </div>
            <div class="col-md-10">
                <a href="{{ URL::to('artist/' . $artist->id) }}">
                    <h4>{{ $artist->name }}</h4>
                </a>
                <span>{{ $artist->genre }}</span>
                <br>
                <p>{{ $artist->description }}</p>
            </div>
        </div>
    @empty
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>@lang('No Artists to display.')</p>
            </div>
        </div>
    @endforelse
</div>
@endsection
