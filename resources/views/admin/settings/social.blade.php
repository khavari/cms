@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title', __('admin.social_media'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">@lang("admin.dashboard")</a></li>
                <li class="breadcrumb-item" aria-current="page">@lang("admin.manage_settings")</li>
                <li class="breadcrumb-item active" aria-current="page">@lang('admin.social_media')</li>
            </ol>
        </nav>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-sitemap"></i> @lang('admin.social_media')</h3>
                    </div>
                    <form role="form" action="{{route('admin.settings.update',['group'=>'social'])}}" method="post">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="box-body">
                           <div class="row">
                               {{-------------------- facebook --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="facebook">@lang('admin.facebook')</label>
                                       <input type="url" name="settings[facebook]"
                                              class="form-control ltr"
                                              id="facebook"
                                              value="{{$setting['facebook']}}"
                                              placeholder="https://">
                                   </div>
                               </div>
                               {{-------------------- twitter --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="twitter">@lang('admin.twitter')</label>
                                       <input type="url" name="settings[twitter]"
                                              class="form-control ltr"
                                              id="twitter"
                                              value="{{$setting['twitter']}}"
                                              placeholder="https://">
                                   </div>
                               </div>
                               {{-------------------- instagram --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="instagram">@lang('admin.instagram')</label>
                                       <input type="url" name="settings[instagram]"
                                              class="form-control ltr"
                                              id="instagram"
                                              value="{{$setting['instagram']}}"
                                              placeholder="https://">
                                   </div>
                               </div>
                               {{-------------------- linkedin --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="linkedin">@lang('admin.linkedin')</label>
                                       <input type="url" name="settings[linkedin]"
                                              class="form-control ltr"
                                              id="linkedin"
                                              value="{{$setting['linkedin']}}"
                                              placeholder="https://">
                                   </div>
                               </div>
                               {{-------------------- telegram --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="telegram">@lang('admin.telegram')</label>
                                       <input type="url" name="settings[telegram]"
                                              class="form-control ltr"
                                              id="telegram"
                                              value="{{$setting['telegram']}}"
                                              placeholder="https://">
                                   </div>
                               </div>
                               {{-------------------- google_plus --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="google_plus">@lang('admin.google_plus')</label>
                                       <input type="url" name="settings[google_plus]"
                                              class="form-control ltr"
                                              id="google-plus"
                                              value="{{$setting['google_plus']}}"
                                              placeholder="https://">
                                   </div>
                               </div>
                               {{-------------------- aparat --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="aparat">@lang('admin.aparat')</label>
                                       <input type="url" name="settings[aparat]"
                                              class="form-control ltr"
                                              id="aparat"
                                              value="{{$setting['aparat']}}"
                                              placeholder="https://">
                                   </div>
                               </div>
                               {{-------------------- youtube --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="youtube">@lang('admin.youtube')</label>
                                       <input type="url" name="settings[youtube]"
                                              class="form-control ltr"
                                              id="youtube"
                                              value="{{$setting['youtube']}}"
                                              placeholder="https://">
                                   </div>
                               </div>
                               {{-------------------- github --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="github">@lang('admin.github')</label>
                                       <input type="url" name="settings[github]"
                                              class="form-control ltr"
                                              id="github"
                                              value="{{$setting['github']}}"
                                              placeholder="https://">
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
