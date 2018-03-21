@extends('web.layouts.master')

{{-- Main content --}}
{{--------------------------------------------------}}
@section('content')

<div class="container">
    <br>
    <h1 class="title text-center">{{ $category->title }}</h1>


    @foreach($category->contents as $content)
        <div class="card">
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

    <style>
        .card-title {
            font-weight: bold;
            font-size: 1.1rem;
        }
        .card-text {
            font-size: .9rem;
        }
        .title{
            font-size: 1.5rem;
        }
        .card a{
            text-decoration: none;
            color: #333;
            font-size: .9rem;
        }
        html[dir="rtl"] .card{
            text-align: right;
            direction: rtl;
        }

    </style>
@endsection

{{-- Add script --}}
{{--------------------------------------------------}}
@section('scripts')
@endsection
