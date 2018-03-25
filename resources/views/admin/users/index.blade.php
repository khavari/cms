@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.users'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_users')],
                ['title' => __('admin.users'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="box-tools">
                            @include('admin.partials.search')
                        </div>

                        <a href="{{ route('admin.users.create') }}" class="btn btn-flat btn-primary">
                            @lang('admin.submit_new_user')
                        </a>
                    </div>


                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;">@lang("admin.status")</th>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.name")</th>
                                <th>@lang("admin.username")</th>
                                <th>@lang("admin.email")</th>
                                <th>@lang("admin.created_at")</th>
                                <th>@lang("admin.action")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="{{ (isUpdated($user->updated_at))?'updated':'' }}">
                                    <td>
                                        @include('admin.partials.active',['action'=>route('admin.users.edit', ['id' => $user->id]),'active'=>$user->active])
                                    </td>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{ jdate($user->created_at)->format('date') }}</td>
                                    <td>
                                        @include('admin.partials.delete',['action'=>route('admin.users.destroy', ['id' => $user->id])])
                                        @include('admin.partials.edit',['action'=>route('admin.users.edit', ['id' => $user->id])])
                                        @include('admin.partials.show',['action'=>route('admin.users.show', ['id' => $user->id])])
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($users->hasPages())
                        <div class="box-footer">
                            {{$users->appends($_GET)->links()}}
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
