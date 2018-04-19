@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.user').' '.__('admin.logins'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_users')],
                ['title' => __('admin.logins'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-default btn-flat">@lang('admin.user')</button>
                            <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                    data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('admin.users.create') }}">@lang("admin.create_new_user")</a></li>
                            </ul>
                        </div>
                        <div class="box-tools">
                            @include('admin.partials.search')
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>@lang("admin.user_id")</th>
                                <th>@lang("admin.user")</th>
                                <th>@lang("admin.ip")</th>
                                <th>@lang("admin.created_at")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($logins as $login)
                                <tr class="{{ (isUpdated($login->updated_at))?'updated':'' }}">
                                    <td class="text-ltr">{{$login->user->id}}</td>
                                    <td class="text-ltr">{{$login->user->username}}</td>
                                    <td class="text-ltr">{{$login->ip}}</td>
                                    <td>{{ date_ago($login->updated_at) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($logins->hasPages())
                        <div class="box-footer">
                            {{$logins->appends($_GET)->links()}}
                        </div>
                    @endif
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
