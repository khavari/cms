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
                    <form role="form" action="{{route('admin.settings.update',['group'=>'fonts'])}}" method="post">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="box-body">
                            <div class="row">
                                {{-------------------- font.bold --------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook">@lang('admin.font.bold')</label>
                                        <select name="settings[font.bold]" class="form-control ltr" id="font.bold">
                                            @foreach($fonts as $font)
                                                <option value="{{ $font }}" {{ ($font == $setting['font.bold'])?'selected':'' }}>{{ $font }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-------------------- font.medium --------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook">@lang('admin.font.medium')</label>
                                        <select name="settings[font.medium]" class="form-control ltr" id="font.medium">
                                            @foreach($fonts as $font)
                                                <option value="{{ $font }}" {{ ($font == $setting['font.medium'])?'selected':'' }}>{{ $font }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-------------------- font.normal --------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook">@lang('admin.font.normal')</label>
                                        <select name="settings[font.normal]" class="form-control ltr" id="font.normal">
                                            @foreach($fonts as $font)
                                                <option value="{{ $font }}" {{ ($font == $setting['font.normal'])?'selected':'' }}>{{ $font }}</option>
                                            @endforeach
                                        </select>
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
