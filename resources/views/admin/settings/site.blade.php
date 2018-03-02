@extends('admin.master.master')

{{------------------------------------------------------------}}
@section('title', __('admin.site'))


{{------------------------------------------------------------}}
@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang("admin.dashboard")</a></li>
                <li class="breadcrumb-item " aria-current="page">@lang("admin.manage_settings")</li>
                <li class="breadcrumb-item active" aria-current="page">@lang("admin.site")</li>
            </ol>
        </nav>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-globe"></i> @lang("admin.site")</h3>
                    </div>
                    <form role="form" action="{{route('admin.settings.update',['group'=>'site'])}}" method="post">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="box-body">
                            <div class="row">
                                {{-------------------- title --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">@lang('admin.title')</label>
                                        <input type="text" name="settings[title]"
                                               class="form-control "
                                               id="title"
                                               value="{{$setting['title']}}" required>
                                    </div>
                                </div>
                                {{-------------------- brief --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">@lang('admin.brief')</label>
                                        <input type="text" name="settings[brief]"
                                               class="form-control "
                                               id="brief"
                                               value="{{$setting['brief']}}">
                                    </div>
                                </div>
                                {{-------------------- description --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">@lang('admin.description')</label>
                                        <textarea name="settings[description]"
                                                  class="form-control" rows="3"
                                                  id="description" required>{{$setting['description']}}</textarea>
                                    </div>
                                </div>
                                {{-------------------- keywords --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="keywords">@lang('admin.keywords')</label>
                                        <input type="text" name="settings[keywords]"
                                               class="form-control"
                                               id="keywords"
                                               value="{{$setting['keywords']}}"
                                               placeholder="---, ---, ---">
                                    </div>
                                </div>
                                {{-------------------- image --------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">@lang('admin.image')</label>
                                        <input type="text" name="settings[image]"
                                               class="form-control ltr"
                                               id="image"
                                               placeholder="/uploads/files/2018/02/1518208452.jpg"
                                               value="{{$setting['image']}}">
                                    </div>
                                </div>
                                {{-------------------- logo --------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="logo">@lang('admin.logo')</label>
                                        <input type="text" name="settings[logo]"
                                               class="form-control ltr"
                                               id="logo"
                                               placeholder="/uploads/files/2018/02/1518208452.jpg"
                                               value="{{$setting['logo']}}">
                                    </div>
                                </div>
                                {{-------------------- favicon --------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="favicon">@lang('admin.favicon')</label>
                                        <input type="text" name="settings[favicon]"
                                               class="form-control ltr"
                                               id="favicon"
                                               value="{{$setting['favicon']}}">
                                    </div>
                                </div>
                                {{-------------------- analytics --------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="analytics">@lang('admin.analytics')</label>
                                        <input type="text" name="settings[analytics]"
                                               class="form-control ltr"
                                               id="analytics"
                                               value="{{$setting['analytics']}}"
                                               placeholder="UA-72145255-1">
                                    </div>
                                </div>
                                {{-------------------- robots --------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="robots">@lang('admin.robots')</label>
                                        <input type="text" name="settings[robots]"
                                               class="form-control ltr"
                                               id="robots"
                                               value="{{$setting['robots']}}"
                                               placeholder="index,follow">
                                    </div>
                                </div>
                                {{-------------------- url --------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="url">@lang('admin.url')</label>
                                        <input type="url" name="settings[url]"
                                               class="form-control ltr"
                                               id="url"
                                               value="{{$setting['url']}}"
                                               placeholder="http://www.">
                                    </div>
                                </div>
                                {{-------------------- copyright --------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="copyright">@lang('admin.copyright')</label>
                                        <input type="text" name="settings[copyright]"
                                               class="form-control"
                                               id="copyright"
                                               value="{{$setting['copyright']}}">
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

{{------------------------------------------------------------}}
@section('styles')
@endsection

{{------------------------------------------------------------}}
@section('scripts')
@endsection
