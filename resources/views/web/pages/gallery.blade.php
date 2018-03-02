@extends('web.layouts.master')

{{-- Page title --}}
{{------------------------------------------------------------}}
@section('title', trans('lorem.2'))

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
@section('style')
    <style>
        .parallax{
            margin-top: 0px;
        }
    </style>
@endsection

{{-- Add script --}}
{{------------------------------------------------------------}}
@section('script')
@endsection
