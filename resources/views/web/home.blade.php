@extends('web.layouts.master')

{{-- Main content --}}
{{--------------------------------------------------}}
@section('content')
    @foreach($widgets as $widget)
        @includeIf($widget['path'])
    @endforeach
@endsection

{{-- Add style --}}
{{--------------------------------------------------}}
@section('styles')
@endsection

{{-- Add script --}}
{{--------------------------------------------------}}
@section('scripts')
@endsection
