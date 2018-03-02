@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title', __('admin.email'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">@lang("admin.dashboard")</a></li>
                <li class="breadcrumb-item" aria-current="page">@lang("admin.manage_settings")</li>
                <li class="breadcrumb-item active" aria-current="page">@lang('admin.email')</li>
            </ol>
        </nav>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-envelope-o"></i> @lang('admin.email')</h3>
                    </div>
                    <form role="form" action="{{route('admin.settings.update',['group'=>'email'])}}" method="post">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="box-body">
                           <div class="row">
                               {{-------------------- email.username --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="email.username">@lang('admin.username')</label>
                                       <input type="text" name="settings[email.username]"
                                              class="form-control ltr"
                                              id="email.username"
                                              value="{{$setting['email.username']}}">
                                   </div>
                               </div>
                               {{-------------------- email.password --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="email.password">@lang('admin.password')</label>
                                       <input type="password" name="settings[email.password]"
                                              class="form-control ltr"
                                              id="email.password"
                                              value="{{$setting['email.password']}}">
                                   </div>
                               </div>
                               {{-------------------- email.port --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="email.port">@lang('admin.port')</label>
                                       <input type="number" name="settings[email.port]"
                                              class="form-control ltr"
                                              id="email.port"
                                              value="{{$setting['email.port']}}">
                                   </div>
                               </div>
                               {{-------------------- email.host --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="email.host">@lang('admin.host')</label>
                                       <input type="text" name="settings[email.host]"
                                              class="form-control ltr"
                                              id="email.host"
                                              value="{{$setting['email.host']}}">
                                   </div>
                               </div>
                               {{-------------------- email.from --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="email.from">@lang('admin.from')</label>
                                       <input type="email" name="settings[email.from]"
                                              class="form-control ltr"
                                              id="email.from"
                                              value="{{$setting['email.from']}}">
                                   </div>
                               </div>
                               {{-------------------- email.to --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="email.to">@lang('admin.to')</label>
                                       <input type="email" name="settings[email.to]"
                                              class="form-control ltr"
                                              id="email.to"
                                              value="{{$setting['email.to']}}">
                                   </div>
                               </div>
                               {{-------------------- email.sender --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="email.sender">@lang('admin.sender')</label>
                                       <input type="email" name="settings[email.sender]"
                                              class="form-control ltr"
                                              id="email.sender"
                                              value="{{$setting['email.sender']}}">
                                   </div>
                               </div>

                           </div>
                        </div>
                        <div class="box-footer">
                            @include('admin.partials.update')
                        </div>
                    </form>
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
