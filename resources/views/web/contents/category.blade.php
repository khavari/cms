@extends('web.layouts.master')


{{-- Page title --}}
{{--------------------------------------------------}}
@section('title', setting('title'))


{{-- Main content --}}
{{--------------------------------------------------}}
@section('content')

<div class="container">
    <br>
    <h1 class=" text-center">{{ $category->title }}</h1>


    @foreach($category->contents as $content)
        <div class="card ">
            <div class="card-body">
                <h5 class="card-title">{{ $content->title }}</h5>
                <p class="card-text">{{ $content->summary }}</p>
                <a href="{{ $content->url() }}" class="btn btn-primary">Button</a>
            </div>
        </div>
        <br>
        @endforeach

</div>

@endsection

{{-- Add style --}}
{{--------------------------------------------------}}
@section('style')
@endsection

{{-- Add script --}}
{{--------------------------------------------------}}
@section('script')
@endsection
