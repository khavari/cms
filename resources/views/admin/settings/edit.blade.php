@extends('admin.master.master')

{{------------------------------------------------------------}}
@section('title', __('admin.edit').' '.__('admin.setting'))

{{------------------------------------------------------------}}
@section('content')

    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">@lang("admin.dashboard")</a></li>
                <li class="breadcrumb-item"><a
                            href="{{ route('admin.settings.index') }}">@lang("admin.manage_settings")</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang("admin.edit")</li>
            </ol>
        </nav>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang("admin.site_settings")</h3>
                    </div>

                    <form action="{{ route('admin.settings.update', ['id'=> $setting->getKey()]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="box-body">
                            @if(in_array($setting->type , ['text', 'url','color','password','number']))
                                <div class="form-group">
                                    <label for="{{ $setting->key }}">{{ $setting->key }}</label>
                                    <input type="{{ $setting->type }}" class="form-control" name="value"
                                           id="{{ $setting->key }}" value="{{ $setting->value }}">
                                </div>
                            @elseif($setting->type == 'textarea')
                                <div class="form-group">
                                    <label for="{{ $setting->key }}">{{ $setting->key }}</label>
                                    <textarea class="form-control" name="value"
                                              id="{{ $setting->key }}">{{ $setting->value }}</textarea>
                                </div>
                            @elseif($setting->type == 'editor')
                                <div class="form-group">
                                    <label for="{{ $setting->key }}">{{ $setting->key }}</label>
                                    <textarea class="form-control" name="value"
                                              id="{{ $setting->key }}">{{ $setting->value }}</textarea>
                                </div>
                            @endif
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-flat btn-success">@lang("admin.update")</button>
                            <a href="{{ route('admin.settings.index') }}" class="btn btn-flat btn-primary">@lang("admin.back")</a>
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
    @if($setting->type == 'editor')
        <script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>
        <script>
          CKEDITOR.replace('{{ $setting->key }}', {
            language: '{{ $setting->key }}',
            height: 300,
          })
        </script>
    @endif
@endsection


















