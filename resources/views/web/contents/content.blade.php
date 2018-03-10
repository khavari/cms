@extends('web.layouts.master')

{{-- Main content --}}
{{--------------------------------------------------}}
@section('content')
    @includeIf('web.widgets.'.$content->vocabulary->slug)
@endsection

{{-- Add style --}}
{{--------------------------------------------------}}
@section('styles')
@endsection

{{-- Add script --}}
{{--------------------------------------------------}}
@section('scripts')
@endsection
