@extends('web.layouts.master')

{{-- Main content --}}
{{------------------------------------------------------------}}
@section('content')




    {{-- Web content parallax --}}
    {{------------------------------------------------------------}}
    @include('web.components.parallax')



    {{-- Web content gallery --}}
    {{------------------------------------------------------------}}
    @include('web.components.gallery')

@endsection

{{-- Add style --}}
{{------------------------------------------------------------}}
@section('styles')
    <style>
        .parallax{
            margin-top: 0px;
        }
    </style>
@endsection

{{-- Add script --}}
{{------------------------------------------------------------}}
@section('scripts')
@endsection
