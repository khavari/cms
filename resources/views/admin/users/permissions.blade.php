@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.roles'))

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
                        <form method="post" class="inline" action="{{ route('admin.permissions.store') }}">
                            {{ csrf_field() }}
                            <input class="btn btn-flat btn-primary" type="submit" value="@lang('admin.update')">
                        </form>
                        <div class="box-tools">
                            @include('admin.partials.search')
                        </div>
                    </div>
                    <form method="post" class="inline" action="{{route('admin.roles.update', ['id' => $role->id])}}">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>@lang("admin.status")</th>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.uri")</th>
                                <th>@lang("admin.method")</th>
                                <th>@lang("admin.created_at")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr class="{{ (isUpdated($permission->updated_at))?'updated':'' }}">
                                    <td>
                                        <input type="checkbox" value="{{$permission->id}}" name="permissions[]" id="p-{{$permission->id}}" {{ (in_array($permission->id, $keys))?'checked':'' }}>
                                    </td>
                                    <td><label for="p-{{$permission->id}}">{{$permission->id}}</label></td>
                                    <td>{{$permission->uri}}</td>
                                    <td>{{$permission->method}}</td>
                                    <td>{{$permission->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                        <input class="btn btn-flat btn-primary" type="submit" value="@lang('admin.update')">
                    </form>
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
