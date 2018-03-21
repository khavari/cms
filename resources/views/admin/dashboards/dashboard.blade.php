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
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 class="text-ltr">{{ $users_count }}</h3>
                        <p>@lang('admin.users')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus"></i>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="small-box-footer">@lang('admin.manage_users')</a>
                </div>
            </div>
            {{--------------- file ---------------}}
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 class="text-ltr">{{ $uploads_size }}</h3>
                        <p>@lang('admin.uploaded_files')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-database"></i>
                    </div>
                    <a href="{{ route('elfinder.index') }}" target="_blank" class="small-box-footer">@lang('admin.manage_files')</a>
                </div>
            </div>
            {{--------------- user ---------------}}
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 class="text-ltr">{{ $contacts_count }}</h3>
                        <p>@lang('admin.contacts')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <a href="{{ route('admin.contacts.index') }}" class="small-box-footer">@lang('admin.manage_contacts')</a>
                </div>
            </div>
            {{--------------- user ---------------}}
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 class="text-ltr">{{ $widgets_count }}</h3>
                        <p>@lang('widgets.active_widgets')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-windows"></i>
                    </div>
                    <a href="{{ route('admin.widgets.index') }}" class="small-box-footer">@lang('widgets.manage_widgets')</a>
                </div>
            </div>




        </div>

@if($contents->count())
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang("admin.resent_contents")</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;">@lang("admin.status")</th>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.title")</th>
                                <th class="hidden-xs">@lang("admin.slug")</th>
                                <th>@lang("admin.vocabulary")</th>
                                <th class="hidden-xs">@lang("admin.created_at")</th>
                                <th>@lang("admin.action")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contents as $content)
                                <tr class="{{ (isUpdated($content->updated_at))?'updated':'' }}">
                                    <td>
                                        @include('admin.partials.active',['action'=>route('admin.contents.edit', ['id' => $content->id]),'active'=>$content->active])
                                    </td>
                                    <td class="text-ltr">{{$content->id}}</td>
                                    <td>{{ str_limit($content->title,32) }}</td>
                                    <td class="hidden-xs">{{ str_limit($content->slug,60) }}</td>
                                    <td>@lang('admin.'.$content->vocabulary->slug)</td>
                                    <td class="text-ltr hidden-xs">{{ $content->created_at }}</td>
                                    <td>
                                        @include('admin.partials.delete',['action'=>route('admin.contents.destroy', ['id' => $content->id])])
                                        @include('admin.partials.edit',['action'=>route('admin.contents.edit', ['id' => $content->id])])
                                        @include('admin.partials.show',['action'=>route('admin.contents.destroy', ['id' => $content->id])])
                                        @include('admin.partials.copy',['url'=>url(app()->getLocale().'/content/'.$content->slug)])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </section>
@endsection

{{--------------------------------------------------}}
@section('scripts')
@endsection

{{--------------------------------------------------}}
@section('styles')
@endsection
