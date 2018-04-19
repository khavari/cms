@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title', __('admin.all_settings'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">@lang("admin.dashboard")</a></li>
                <li class="breadcrumb-item" aria-current="page">@lang("admin.manage_settings")</li>
                <li class="breadcrumb-item active" aria-current="page">@lang('admin.all_settings')</li>
            </ol>
        </nav>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">@lang("admin.all_settings")</h3>
                        <div class="box-tools">
                        @include('admin.partials.search')
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped table-bordered">
                            <tr>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.key")</th>
                                <th>@lang("admin.type")</th>
                                <th>@lang("admin.group")</th>
                                <th>@lang("admin.date")</th>
                                <th>@lang("admin.action")</th>
                            </tr>
                            @foreach($settings as $setting)
                                <tr class="{{ (isUpdated($setting->updated_at)) ? 'updated' : '' }}">
                                    <td>{{ $setting->getKey() }}</td>
                                    <td>{{ $setting->key }}</td>
                                    <td>{{ $setting->type }}</td>
                                    <td>{{ $setting->group }}</td>
                                    <td>{{ date_ago($setting->created_at) }}</td>
                                    <td>
                                        <a href="{{ route('admin.settings.edit' , ['id'=> $setting->getKey()]) }}"
                                           class="btn btn-xs btn-primary btn-flat">@lang('admin.edit')</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection


{{--------------------------------------------------}}
@section('styles')
@endsection

{{--------------------------------------------------}}
@section('scripts')
@endsection


















