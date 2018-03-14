@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title', __('admin.contact'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">@lang("admin.dashboard")</a></li>
                <li class="breadcrumb-item" aria-current="page">@lang("admin.manage_settings")</li>
                <li class="breadcrumb-item active" aria-current="page">@lang('admin.contact')</li>
            </ol>
        </nav>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-map-marker"></i> @lang('admin.google_map')</h3>
                    </div>
                    <form role="form" action="{{route('admin.settings.update',['group'=>'contact'])}}" method="post">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="box-body">
                           <div class="row">
                               {{-------------------- contact.title --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="contact.title">@lang('admin.title')</label>
                                       <input type="text" name="settings[contact.title]"
                                              class="form-control"
                                              id="contact.title"
                                              value="{{$setting['contact.title']}}">
                                   </div>
                               </div>
                               {{-------------------- contact.email --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="contact.email">@lang('admin.email')</label>
                                       <input type="text" name="settings[contact.email]"
                                              class="form-control ltr"
                                              id="contact.email"
                                              value="{{$setting['contact.email']}}">
                                   </div>
                               </div>
                               {{-------------------- contact.phone --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="contact.phone">@lang('admin.phone')</label>
                                       <input type="text" name="settings[contact.phone]"
                                              class="form-control"
                                              id="contact.phone"
                                              value="{{$setting['contact.phone']}}">
                                   </div>
                               </div>
                               {{-------------------- contact.mobile --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="contact.mobile">@lang('admin.mobile')</label>
                                       <input type="text" name="settings[contact.mobile]"
                                              class="form-control"
                                              id="contact.mobile"
                                              value="{{$setting['contact.mobile']}}">
                                   </div>
                               </div>
                               {{-------------------- contact.postal --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="contact.postal">@lang('admin.postal')</label>
                                       <input type="text" name="settings[contact.postal]"
                                              class="form-control"
                                              id="contact.postal"
                                              value="{{$setting['contact.postal']}}">
                                   </div>
                               </div>
                               {{-------------------- contact.address --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="contact.address">@lang('admin.address')</label>
                                       <input type="text" name="settings[contact.address]"
                                              class="form-control"
                                              id="contact.address"
                                              value="{{$setting['contact.address']}}">
                                   </div>
                               </div>
                               {{-------------------- contact.body --------------------}}
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label for="contact.body">@lang('admin.body')</label>
                                       <textarea name="settings[contact.body]"
                                              class="form-control" rows="4"
                                                 id="contact.body">{{$setting['contact.body']}}</textarea>
                                   </div>
                               </div>

                               {{-------------------- map.title --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="map.title">@lang('admin.title')</label>
                                       <input type="text" name="settings[map.title]"
                                              class="form-control"
                                              id="map.title"
                                              value="{{$setting['map.title']}}">
                                   </div>
                               </div>
                               {{-------------------- map.key --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="map.key">@lang('admin.key')</label>
                                       <input type="text" name="settings[map.key]"
                                              class="form-control ltr"
                                              id="map.key"
                                              value="{{$setting['map.key']}}">
                                   </div>
                               </div>
                               {{-------------------- map.latitude --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="map.latitude">@lang('admin.latitude')</label>
                                       <input type="text" name="settings[map.latitude]"
                                              class="form-control ltr"
                                              id="map.latitude"
                                              value="{{$setting['map.latitude']}}">
                                   </div>
                               </div>
                               {{-------------------- map.longitude --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="map.longitude">@lang('admin.longitude')</label>
                                       <input type="text" name="settings[map.longitude]"
                                              class="form-control ltr"
                                              id="map.longitude"
                                              value="{{$setting['map.longitude']}}">
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
