@extends('web.layouts.master')


{{-- Main content --}}
{{--------------------------------------------------}}
@section('content')
    @includeIf('web.widgets.user-profile')
@endsection

{{-- Add style --}}
{{--------------------------------------------------}}
@section('styles')
@endsection

{{-- Add script --}}
{{--------------------------------------------------}}
@section('scripts')
    <script>
    </script>
@endsection
