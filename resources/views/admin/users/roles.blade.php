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

                        <button type="button" class="btn btn-flat btn-primary" data-toggle="modal"
                                data-target="#modal-role">
                            @lang('admin.submit_new',['item'=> __('admin.role')])
                        </button>
                        <div class="box-tools">
                            @include('admin.partials.search')
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.name")</th>
                                <th>@lang("admin.slug")</th>
                                <th>@lang("admin.users")</th>
                                <th>@lang("admin.created_at")</th>
                                <th>@lang("admin.action")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr class="{{ (isUpdated($role->updated_at))?'updated':'' }}">
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->slug}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->users()->count()}}</td>
                                    <td>{{date_ago($role->created_at)}}</td>
                                    <td>
                                        @include('admin.partials.delete',['action'=>route('admin.roles.destroy', ['id' => $role->id])])
                                        <a href="#" class="btn btn-xs btn-flat btn-primary" data-toggle="modal"
                                           data-target="#modal-role-{{$role->id}}">@lang('admin.edit')</a>
                                        <a href="{{ route('admin.roles.edit',['id' => $role->id]) }}"
                                           class="btn btn-xs btn-flat btn-info btn-primary">{{ $role->permissions->count() }} @lang('admin.permissions')</a>

                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-role-{{$role->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form role="form"
                                                  action="{{route('admin.roles.update', ['id' => $role->id])}}"
                                                  method="post">
                                                {{ csrf_field() }} {{ method_field('PATCH') }}
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">@lang('admin.submit_new',['item'=> strtolower(__('admin.role'))])</h4>
                                                </div>
                                                <div class="modal-body">

                                                    {{--------------- name ---------------}}
                                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label for="name">@lang('admin.name')</label>
                                                        <input type="text" required class="form-control" id="name"
                                                               name="name"
                                                               value="{{ $role->name }}">
                                                    </div>

                                                    {{--------------- slug ---------------}}
                                                    <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                                                        <label for="slug">@lang('admin.slug')</label>
                                                        <input type="text" required class="form-control" id="slug"
                                                               slug="slug" name="slug"
                                                               value="{{ $role->slug }}">
                                                    </div>

                                                    {{--------------- description ---------------}}
                                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                        <label for="description">@lang('admin.description')</label>
                                                        <textarea rows="2" required class="form-control"
                                                                  id="description"
                                                                  name="description">{{ $role->description }}</textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                            class="btn btn-flat btn-primary">@lang('admin.update')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="modal-role">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.roles.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">@lang('admin.submit_new',['item'=> strtolower(__('admin.role'))])</h4>
                    </div>
                    <div class="modal-body">

                        {{--------------- name ---------------}}
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">@lang('admin.name')</label>
                            <input type="text" required class="form-control" id="name" name="name"
                                   value="{{old('name')}}" autofocus>
                        </div>

                        {{--------------- slug ---------------}}
                        <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug">@lang('admin.slug')</label>
                            <input type="text" required class="form-control" id="slug" slug="slug" name="slug"
                                   value="{{old('slug')}}">
                        </div>

                        {{--------------- description ---------------}}
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">@lang('admin.description')</label>
                            <textarea rows="2" required class="form-control" id="description"
                                      name="description">{{old('description')}}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-primary">@lang('admin.submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

{{--------------------------------------------------}}
@section('scripts')
@endsection

{{--------------------------------------------------}}
@section('styles')
@endsection
