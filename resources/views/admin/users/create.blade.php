@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.create_new_user'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_users')],
                ['title' => __('admin.users'), 'href' => route('admin.users.index')],
                ['title' => __('admin.create'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin.create_new_user')</h3>
                        <div class="box-tools">

                        </div>
                    </div>
                    <form role="form" action="{{route('admin.users.store')}}" method="post">
                        {{ csrf_field() }}
                        <div class="box-body no-padding">
                            {{--------------- name ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">@lang('admin.name')</label>
                                    <input type="text" name="name"
                                           class="form-control" id="name" value="{{old('name')}}" required autofocus>
                                </div>
                            </div>

                            {{--------------- email ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">@lang('admin.email')</label>
                                    <input type="email" name="email"
                                           class="form-control ltr" id="email" value="{{old('email')}}" required>
                                </div>
                            </div>

                            {{--------------- gender ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label for="gender">@lang('admin.gender')</label>
                                    <select class="form-control" name="gender" id="gender" required>
                                        <option value="" selected disabled>@lang('admin.select_me')</option>
                                        <option value="male" {{ (old('gender') === 'male') ? 'selected':'' }}>@lang('admin.male')</option>
                                        <option value="female" {{ (old('gender') === 'female') ? 'selected':'' }}>@lang('admin.female')</option>
                                    </select>
                                </div>
                            </div>

                            {{--------------- username ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username">@lang('admin.username')</label>
                                    <input type="text" name="username"
                                           class="form-control ltr" id="username" value="{{old('username')}}" required>
                                </div>
                            </div>

                            {{--------------- password ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">@lang('admin.password')</label>
                                    <input type="password" name="password"
                                           class="form-control" id="password" required>
                                </div>
                            </div>

                            {{--------------- password_confirmation ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password_confirmation">@lang('admin.confirm_password')</label>
                                    <input type="password" name="password_confirmation"
                                           class="form-control" id="password_confirmation" required>
                                </div>
                            </div>

                            {{--------------- phone ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone">@lang('admin.phone')</label>
                                    <input type="text" name="phone"
                                           class="form-control" id="phone" value="{{old('phone')}}">
                                </div>
                            </div>

                            {{--------------- mobile ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                    <label for="mobile">@lang('admin.mobile')</label>
                                    <input type="text" name="mobile"
                                           class="form-control" id="mobile" value="{{old('mobile')}}" placeholder="09">
                                </div>
                            </div>

                            {{--------------- role_id ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">
                                    <label for="role_id">@lang('admin.role')</label>
                                    <select class="form-control" name="role_id" id="role_id" required>
                                        <option value="" selected disabled>@lang('admin.select_me')</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ (old('role_id') == $role->id) ? 'selected':'' }}>@lang('admin.'.$role->slug)</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            {{--------------- address ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address">@lang('admin.address')</label>
                                    <input type="text" name="address" class="form-control" id="address"
                                           value="{{old('address')}}">
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            @include('admin.partials.submit')
                        </div>
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
