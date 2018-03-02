@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title', trans('admin.layout'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">@lang("admin.dashboard")</a></li>
                <li class="breadcrumb-item" aria-current="page">@lang("admin.manage_settings")</li>
                <li class="breadcrumb-item active" aria-current="page">@lang('admin.layout')</li>
            </ol>
        </nav>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-paint-brush"></i>&nbsp; @lang("admin.body")</h3>
            </div>
            <form role="form" action="{{route('admin.settings.update',['group'=>'layout'])}}" method="post">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="row">
                                {{-------------------- color.bg_body --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.background_color') {{$setting['color.bg_body']}}</label>
                                        <input type="color" name="settings[color.bg_body]"
                                               class="form-control"
                                               value="{{$setting['color.bg_body']}}">
                                    </div>
                                </div>
                                {{-------------------- color.text_body_title --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.title_color') {{$setting['color.text_body_title']}}</label>
                                        <input type="color" name="settings[color.text_body_title]"
                                               class="form-control"
                                               value="{{$setting['color.text_body_title']}}">
                                    </div>
                                </div>
                                {{-------------------- color.text_body_content --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.content_color') {{$setting['color.text_body_content']}}</label>
                                        <input type="color" name="settings[color.text_body_content]"
                                               class="form-control"
                                               value="{{$setting['color.text_body_content']}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            <label for="bg_body">@lang("admin.body") @lang('admin.preview')</label>
                            <div class="color-palette-set">
                                <div class="palette bg_body">
                                    <h2 class="text_body_title">{{ __('lorem.3') }}</h2>
                                    <p class="text_body_content">{{ __('lorem.lorem') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    @include('admin.partials.update')
                </div>
            </form>
        </div>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-paint-brush"></i>&nbsp; @lang("admin.vibrant")</h3>
            </div>
            <form role="form" action="{{route('admin.settings.update',['group'=>'layout'])}}" method="post">
                {{ csrf_field() }} {{ method_field('PATCH') }}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="row">
                            {{-------------------- color.bg_vibrant --------------------}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('admin.background_color') {{$setting['color.bg_vibrant']}}</label>
                                    <input type="color" name="settings[color.bg_vibrant]"
                                           class="form-control"
                                           value="{{$setting['color.bg_vibrant']}}">
                                </div>
                            </div>
                            {{-------------------- color.bg_vibrant_hover --------------------}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('admin.background_color_hover') {{$setting['color.bg_vibrant_hover']}}</label>
                                    <input type="color" name="settings[color.bg_vibrant_hover]"
                                           class="form-control"
                                           value="{{$setting['color.bg_vibrant_hover']}}">
                                </div>
                            </div>
                            {{-------------------- color.text_vibrant --------------------}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('admin.text_color') {{$setting['color.text_vibrant']}}</label>
                                    <input type="color" name="settings[color.text_vibrant]"
                                           class="form-control"
                                           value="{{$setting['color.text_vibrant']}}">
                                </div>
                            </div>
                            {{-------------------- color.text_vibrant_hover --------------------}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('admin.text_color_hover') {{$setting['color.text_vibrant_hover']}}</label>
                                    <input type="color" name="settings[color.text_vibrant_hover]"
                                           class="form-control"
                                           value="{{$setting['color.text_vibrant_hover']}}">
                                </div>
                            </div>
                            {{-------------------- color.border_vibrant --------------------}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('admin.border_color') {{$setting['color.border_vibrant']}}</label>
                                    <input type="color" name="settings[color.border_vibrant]"
                                           class="form-control"
                                           value="{{$setting['color.border_vibrant']}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <label for="bg_vibrant">@lang("admin.vibrant") @lang('admin.preview')</label>
                        <div class="color-palette-set">
                            <div class="palette bg_vibrant text_bg_vibrant border_bg_vibrant bg_vibrant-hover">
                                <span class="text-center">{{ __('lorem.3') }}</span>
                                <h3>{{ __('lorem.3') }}</h3>
                                <p>{{ __('lorem.lorem') }}</p>
                            </div>
                        </div>
                        <div class="progress progress-sm active">
                            <div class="progress-bar progress-bar-striped bg_vibrant" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                            </div>
                        </div>
                        <div>
                            <span class="info-box-icon bg_vibrant text_bg_vibrant border_bg_vibrant bg_vibrant-hover"><i class="fa fa-key"></i></span>
                          <span class="info-box-icon bg_vibrant_hover text_bg_vibrant_hover border_bg_vibrant bg_vibrant_hover-hover">
                              <i class="fa fa-spinner fa-pulse fa-fw"></i>
                          </span>
                        </div>
                    </div>
                </div>
            </div>
                <div class="box-footer">
                    @include('admin.partials.update')
                </div>
            </form>
        </div>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-paint-brush"></i>&nbsp; @lang("admin.muted")</h3>
            </div>
            <form role="form" action="{{route('admin.settings.update',['group'=>'layout'])}}" method="post">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="row">
                                {{-------------------- color.bg_muted --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.background_color') {{$setting['color.bg_muted']}}</label>
                                        <input type="color" name="settings[color.bg_muted]"
                                               class="form-control"
                                               value="{{$setting['color.bg_muted']}}">
                                    </div>
                                </div>
                                {{-------------------- color.bg_muted_hover --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.background_color_hover') {{$setting['color.bg_muted_hover']}}</label>
                                        <input type="color" name="settings[color.bg_muted_hover]"
                                               class="form-control"
                                               value="{{$setting['color.bg_muted_hover']}}">
                                    </div>
                                </div>
                                {{-------------------- color.text_muted --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.text_color') {{$setting['color.text_muted']}}</label>
                                        <input type="color" name="settings[color.text_muted]"
                                               class="form-control"
                                               value="{{$setting['color.text_muted']}}">
                                    </div>
                                </div>
                                {{-------------------- color.text_muted_hover --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.text_color_hover') {{$setting['color.text_muted_hover']}}</label>
                                        <input type="color" name="settings[color.text_muted_hover]"
                                               class="form-control"
                                               value="{{$setting['color.text_muted_hover']}}">
                                    </div>
                                </div>
                                {{-------------------- color.border_muted --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.border_color') {{$setting['color.border_muted']}}</label>
                                        <input type="color" name="settings[color.border_muted]"
                                               class="form-control"
                                               value="{{$setting['color.border_muted']}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            <label for="bg_muted">@lang("admin.muted") @lang('admin.preview')</label>
                            <div class="color-palette-set">
                                <div class="palette bg_muted text_bg_muted border_bg_muted bg_muted-hover">
                                    <span class="text-center">{{ __('lorem.3') }}</span>
                                    <h3>{{ __('lorem.3') }}</h3>
                                    <p>{{ __('lorem.lorem') }}</p>
                                </div>
                            </div>
                            <div class="progress progress-sm active">
                                <div class="progress-bar progress-bar-striped bg_muted" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                </div>
                            </div>
                            <div>
                                <span class="info-box-icon bg_muted text_bg_muted border_bg_muted bg_muted-hover"><i class="fa fa-key"></i></span>
                                <span class="info-box-icon bg_muted_hover text_bg_muted_hover border_bg_muted bg_muted_hover-hover">
                              <i class="fa fa-spinner fa-pulse fa-fw"></i>
                          </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    @include('admin.partials.update')
                </div>
            </form>
        </div>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-paint-brush"></i>&nbsp; @lang("admin.dark")</h3>
            </div>
            <form role="form" action="{{route('admin.settings.update',['group'=>'layout'])}}" method="post">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="row">
                                {{-------------------- color.bg_dark --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.background_color') {{$setting['color.bg_dark']}}</label>
                                        <input type="color" name="settings[color.bg_dark]"
                                               class="form-control"
                                               value="{{$setting['color.bg_dark']}}">
                                    </div>
                                </div>
                                {{-------------------- color.bg_dark_hover --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.background_color_hover') {{$setting['color.bg_dark_hover']}}</label>
                                        <input type="color" name="settings[color.bg_dark_hover]"
                                               class="form-control"
                                               value="{{$setting['color.bg_dark_hover']}}">
                                    </div>
                                </div>
                                {{-------------------- color.text_dark --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.text_color') {{$setting['color.text_dark']}}</label>
                                        <input type="color" name="settings[color.text_dark]"
                                               class="form-control"
                                               value="{{$setting['color.text_dark']}}">
                                    </div>
                                </div>
                                {{-------------------- color.text_dark_hover --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.text_color_hover') {{$setting['color.text_dark_hover']}}</label>
                                        <input type="color" name="settings[color.text_dark_hover]"
                                               class="form-control"
                                               value="{{$setting['color.text_dark_hover']}}">
                                    </div>
                                </div>
                                {{-------------------- color.border_dark --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('admin.border_color') {{$setting['color.border_dark']}}</label>
                                        <input type="color" name="settings[color.border_dark]"
                                               class="form-control"
                                               value="{{$setting['color.border_dark']}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            <label for="bg_dark">@lang("admin.dark") @lang('admin.preview')</label>
                            <div class="color-palette-set">
                                <div class="palette bg_dark text_bg_dark border_bg_dark bg_dark-hover">
                                    <span class="text-center">{{ __('lorem.3') }}</span>
                                    <h3>{{ __('lorem.3') }}</h3>
                                    <p>{{ __('lorem.lorem') }}</p>
                                </div>
                            </div>
                            <div class="progress progress-sm active">
                                <div class="progress-bar progress-bar-striped bg_dark" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                </div>
                            </div>
                            <div>
                                <span class="info-box-icon bg_dark text_bg_dark border_bg_dark bg_dark-hover"><i class="fa fa-key"></i></span>
                                <span class="info-box-icon bg_dark_hover text_bg_dark_hover border_bg_dark bg_dark_hover-hover">
                              <i class="fa fa-spinner fa-pulse fa-fw"></i>
                          </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    @include('admin.partials.update')
                </div>
            </form>
        </div>

    </section>
@endsection

{{--------------------------------------------------}}
@section('styles')
    <style>
        .palette {
            padding: 15px;
            min-height: 100px;
            line-height: 35px;
            text-align: center;
            border: 2px solid transparent;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        .info-box-icon{
            margin-right: 15px;
        }
    </style>
@endsection

{{--------------------------------------------------}}
@section('scripts')
@endsection
