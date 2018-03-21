@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.create_new',['item'=> strtolower(__('admin.category'))]))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_content')],
                ['title' => __('admin.categories'), 'href' => route('admin.categories.index')],
                ['title' => __('admin.create'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin.create_new',['item'=> __('admin.category')])</h3>
                        <div class="box-tools"></div>
                    </div>
                    <form role="form" action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body no-padding">
                            {{--------------- title ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title">@lang('admin.title')</label>
                                    <input type="text" name="title"
                                           class="form-control" id="title" value="{{ old('title') }}" required>
                                </div>
                            </div>
                            {{--------------- slug ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                                    <label for="slug">@lang('admin.slug')</label>
                                    <input type="text" name="slug"
                                           class="form-control" id="slug" value="{{ old('slug') }}" required>
                                </div>
                            </div>
                            {{--------------- image ---------------}}
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image">@lang('admin.image')</label>
                                    <input type="file" name="file"
                                           class="form-control" id="image">
                                </div>
                            </div>
                            {{--------------- summary ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('summary') ? ' has-error' : '' }}">
                                    <label for="summary">@lang('admin.summary')</label>
                                    <textarea name="summary" class="form-control" id="summary">{{ old('summary') }}</textarea>
                                </div>
                            </div>
                            {{--------------- body ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                                    <label for="body">@lang('admin.body')</label>
                                    <textarea name="body" class="form-control" id="body">{{ old('body') }}</textarea>
                                </div>
                            </div>
                            {{--------------- description ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">@lang('admin.description')</label>
                                    <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            {{--------------- keywords ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('keywords') ? ' has-error' : '' }}">
                                    <label for="keywords">@lang('admin.keywords')</label>
                                    <input type="text" name="keywords" class="form-control" id="keywords" value="{{ old('keywords') }}">
                                </div>
                            </div>
                            {{--------------- vocabulary_id ---------------}}
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('vocabulary_id') ? ' has-error' : '' }}">
                                    <label for="vocabulary_id">@lang('admin.vocabulary')</label>
                                    <select class="form-control" name="vocabulary_id" id="vocabulary_id" required>
                                        <option value="" selected disabled>@lang('admin.select_me')</option>
                                        @foreach($vocabularies as $vocabulary)
                                            <option value="{{ $vocabulary->id }}" {{ (old('vocabulary_id') == $vocabulary->id) ? 'selected':'' }}>{{ __('admin.'.$vocabulary->slug) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--------------- order ---------------}}
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('order') ? ' has-error' : '' }}">
                                    <label for="order">@lang('admin.order')</label>
                                    <input type="text" name="order"
                                           class="form-control" id="order" value="1">
                                </div>
                            </div>
                            {{--------------- featured ---------------}}
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('featured') ? ' has-error' : '' }}">
                                    <label for="featured">@lang('admin.featured')</label>
                                    <select class="form-control" name="featured" id="featured" required>
                                        <option value="0" {{ (old('featured') == 0) ? 'selected':'' }}>@lang('admin.featured')</option>
                                        <option value="1" {{ (old('featured') == 1) ? 'selected':'' }}>@lang('admin.unfeatured')</option>
                                    </select>
                                </div>
                            </div>
                            {{--------------- active ---------------}}
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('active') ? ' has-error' : '' }}">
                                    <label for="active">@lang('admin.active')</label>
                                    <select class="form-control" name="active" id="active" required>
                                        <option value="0" {{ (old('active') == 0) ? 'selected':'' }}>@lang('admin.inactive')</option>
                                        <option value="1" {{ (old('active') == 1) ? 'selected':'' }}>@lang('admin.active')</option>
                                    </select>
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
    @include('admin.partials.ckeditor')
@endsection

{{--------------------------------------------------}}
@section('styles')
@endsection
