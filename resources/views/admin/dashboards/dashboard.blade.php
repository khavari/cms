@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.users'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">

    </section>
    <section class="content">
        <div class="row">

            {{--------------- user ---------------}}
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $users_count }}</h3>
                        <p>@lang('admin.users')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus"></i>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="small-box-footer">@lang('admin.manage_users')</a>
                </div>
            </div>
            {{--------------- file ---------------}}
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $uploads_size }}</h3>
                        <p>@lang('admin.uploaded_files')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-database"></i>
                    </div>
                    <a href="{{ route('elfinder.index') }}" target="_blank" class="small-box-footer">@lang('admin.manage_files')</a>
                </div>
            </div>
            {{--------------- user ---------------}}
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $contacts_count }}</h3>
                        <p>@lang('admin.contacts')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <a href="{{ route('admin.contacts.index') }}" class="small-box-footer">@lang('admin.manage_contacts')</a>
                </div>
            </div>
            {{--------------- user ---------------}}
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $widgets_count }}</h3>
                        <p>@lang('widgets.active_widgets')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-windows"></i>
                    </div>
                    <a href="{{ route('admin.widgets.index') }}" class="small-box-footer">@lang('widgets.manage_widgets')</a>
                </div>
            </div>




        </div>
    </section>
@endsection

{{--------------------------------------------------}}
@section('scripts')
@endsection

{{--------------------------------------------------}}
@section('styles')
@endsection
