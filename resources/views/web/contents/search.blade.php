@extends('web.layouts.master')


{{-- Main content --}}
{{--------------------------------------------------}}
@section('content')

    <div class="container">
        <br>
        <h1 class=" text-center">{{ request('q') }}</h1>
        @foreach($contents as $content)
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">{{ $content->title }}</h5>
                    <p class="card-text">{{ $content->summary }}</p>
                    <a href="{{ $content->url() }}">@lang('web.more')..</a>
                </div>
            </div>
            <br>
        @endforeach
    </div>
@endsection

{{-- Add style --}}
{{--------------------------------------------------}}
@section('styles')
@endsection

{{-- Add script --}}
{{--------------------------------------------------}}
@section('scripts')
@endsection
