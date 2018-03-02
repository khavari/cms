@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.edit'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_users')],
                ['title' => __('admin.users'), 'href' => route('admin.users.index')],
                ['title' => __('admin.edit'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin.edit')</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <form role="form" action="{{route('admin.users.update', ['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="box-body no-padding">
                            {{--------------- name ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">@lang('admin.name')</label>
                                    <input type="text" name="name"
                                           class="form-control" id="name" value="{{ $user->name }}" required autofocus>
                                </div>
                            </div>

                            {{--------------- email ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">@lang('admin.email')</label>
                                    <input type="email" name="email"
                                           class="form-control ltr" id="email" value="{{ $user->email }}" required>
                                </div>
                            </div>

                            {{--------------- gender ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label for="gender">@lang('admin.gender')</label>
                                    <select class="form-control" name="gender" id="gender" required>
                                        <option value="male" {{ ($user->gender === 'male') ? 'selected':'' }}>@lang('admin.male')</option>
                                        <option value="female" {{ ($user->gender === 'female') ? 'selected':'' }}>@lang('admin.female')</option>
                                    </select>
                                </div>
                            </div>

                            {{--------------- username ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username">@lang('admin.username')</label>
                                    <input type="text" name="username"
                                           class="form-control ltr" id="username" value="{{ $user->username }}" required>
                                </div>
                            </div>

                            {{--------------- password ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">@lang('admin.password')</label>
                                    <input type="password" name="password"
                                           class="form-control" id="password" value="{{ $user->passcode }}" required>
                                </div>
                            </div>

                            {{--------------- password_confirmation ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password_confirmation">@lang('admin.confirm_password')</label>
                                    <input type="password" name="password_confirmation"
                                           class="form-control" id="password_confirmation" value="{{ $user->passcode }}" required>
                                </div>
                            </div>

                            {{--------------- phone ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone">@lang('admin.phone')</label>
                                    <input type="text" name="phone"
                                           class="form-control" id="phone" value="{{ $user->phone }}">
                                </div>
                            </div>

                            {{--------------- mobile ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                    <label for="mobile">@lang('admin.mobile')</label>
                                    <input type="text" name="mobile"
                                           class="form-control" id="mobile" value="{{ $user->mobile }}" placeholder="09">
                                </div>
                            </div>

                            {{--------------- role_id ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">
                                    <label for="role_id">@lang('admin.role')</label>
                                    <select class="form-control" name="role_id" id="role_id" required>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ ($user->role_id == $role->id) ? 'selected':'' }}>@lang('admin.'.$role->slug)</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{--------------- company ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                                    <label for="company">@lang('admin.company')</label>
                                    <input type="text" name="company"
                                           class="form-control" id="company" value="{{ $user->company }}">
                                </div>
                            </div>

                            {{--------------- amount ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                                    <label for="amount">@lang('admin.amount')</label>
                                    <input type="number" name="amount"
                                           class="form-control" id="amount" value="{{ $user->amount }}">
                                </div>
                            </div>

                            {{--------------- image ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image">@lang('admin.image')</label>
                                    <input type="file" name="image" class="form-control" id="image" value="{{ $user->image }}">
                                    @if($user->image)
                                        <a href="{{ asset($user->image) }}" target="_blank">
                                            <img src="{{ asset('media/'.$user->image) }}?w=32%h=32&fit=crop" class="">
                                        </a>
                                    @endif
                                </div>
                            </div>

                            {{--------------- address ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address">@lang('admin.address')</label>
                                    <input type="text" name="address" class="form-control" id="address"
                                           value="{{ $user->address }}">
                                </div>
                            </div>

                            {{--------------- bio ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('bio') ? ' has-error' : '' }}">
                                    <label for="bio">@lang('admin.bio')</label>
                                    <textarea rows="4" name="bio" class="form-control" id="bio">{{ $user->bio }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            @include('admin.partials.footer_update_action')
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
    <style>
        .form-group img{
            position: absolute;
            top: 26px;
            right: 16px;
            height: 32px;
        }
    </style>
@endsection
