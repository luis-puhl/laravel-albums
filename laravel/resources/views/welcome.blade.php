@extends('layouts.app')

@push('fonts')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endpush
@push('styles')
    <!-- Styles -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                {{ config('app.name', 'Laravel') }}
            </div>

            <div class="links">
                <a href="{{ URL::to('artist/') }}">@lang('Artists')</a>
                <a href="{{ URL::to('album/') }}">@lang('Albums')</a>
                <a href="{{ URL::to('song/') }}">@lang('Songs')</a>
                <a href="https://laravel.com/docs">@lang('Documentation')</a>
                <a href="https://github.com/laravel/laravel">@lang('GitHub')</a>
            </div>
        </div>
    </div>
@endsection
