@extends('web.layouts.master')


{{-- Page title --}}
{{--------------------------------------------------}}
@section('title', setting('title'))


{{-- Main content --}}
{{--------------------------------------------------}}
@section('content')
    @foreach($widgets as $widget)
        @includeIf($widget['path'])
    @endforeach
@endsection

{{-- Add style --}}
{{--------------------------------------------------}}
@section('style')
@endsection

{{-- Add script --}}
{{--------------------------------------------------}}
@section('script')
@endsection
