@extends('dashboard::layouts.master')

{{-- Page title --}}
{{------------------------------------------------------------}}
@section('title', 'داشبورد')

{{-- Main content --}}
{{------------------------------------------------------------}}
@section('content')

    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
        </div>
    </section>
@endsection

{{-- Add style --}}
{{------------------------------------------------------------}}
@section('style')
@endsection

{{-- Add script --}}
{{------------------------------------------------------------}}
@section('script')
@endsection
