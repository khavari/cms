@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.edit'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_content')],
                ['title' => __('admin.categories'), 'href' => route('admin.categories.index')],
                ['title' => __('admin.edit'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <form role="form" action="{{route('admin.categories.update', ['id' => $category->id])}}"
              method="post" enctype="multipart/form-data">
            {{ csrf_field() }} {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-xs-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">@lang('admin.category_id') : {{ $category->id }}</h3>
                            <div class="box-tools"></div>
                        </div>

                        <div class="box-body no-padding">
                            {{--------------- title ---------------}}
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title">@lang('admin.title')</label>
                                    <input type="text" name="title"
                                           class="form-control" id="title" value="{{ $category->title }}" required>
                                </div>
                            </div>
                            {{--------------- slug ---------------}}
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                                    <label for="slug">@lang('admin.slug')</label>
                                    <input type="text" name="slug"
                                           class="form-control" id="slug" value="{{ $category->slug }}" required>
                                </div>
                            </div>
                            {{--------------- summary ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('summary') ? ' has-error' : '' }}">
                                    <label for="summary">@lang('admin.summary')</label>
                                    <textarea name="summary" class="form-control"
                                              id="summary">{{ $category->summary }}</textarea>
                                </div>
                            </div>
                            {{--------------- body ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                                    <label for="body">@lang('admin.body')</label>
                                    <textarea name="body" class="form-control"
                                              id="body">{{ $category->body }}</textarea>
                                </div>
                            </div>
                            {{--------------- description ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">@lang('admin.description')</label>
                                    <textarea name="description" class="form-control"
                                              id="description">{{ $category->description }}</textarea>
                                </div>
                            </div>
                            {{--------------- keywords ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('keywords') ? ' has-error' : '' }}">
                                    <label for="keywords">@lang('admin.keywords')</label>
                                    <input type="text" name="keywords" class="form-control" id="keywords"
                                           value="{{ $category->keywords }}">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            @include('admin.partials.update')
                        </div>

                    </div>
                </div>


                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">@lang('admin.image')</h3>
                                </div>
                                <div class="box-body no-padding">
                                    {{--------------- image ---------------}}
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                                            @if($category->image)
                                                <a href="{{ asset($category->image) }}" target="_blank">
                                                    <img id="tag-img" src="{{ asset($category->image) }}"
                                                         class="img-responsive" style="margin:15px 0px;"/>
                                                </a>
                                            @else
                                                <img id="tag-img" src="{{ asset('assets/admin/img/nopic.jpg') }}"
                                                     class="img-responsive" style="margin:15px 0px;"/>
                                            @endif
                                            <input type="file" name="file" class="form-control" id="input-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">@lang('admin.options')</h3>
                                    <div class="box-tools"></div>
                                </div>
                                <div class="box-body no-padding">
                                    {{--------------- vocabulary_id ---------------}}
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('vocabulary_id') ? ' has-error' : '' }}">
                                            <label for="vocabulary_id">@lang('admin.vocabulary')</label>
                                            <select class="form-control" name="vocabulary_id" id="vocabulary_id" required>
                                                @foreach($vocabularies as $vocabulary)
                                                    <option value="{{ $vocabulary->id }}" {{ ($category->vocabulary_id == $vocabulary->id) ? 'selected':'' }}>{{ __('admin.'.$vocabulary->slug) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--------------- active ---------------}}
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('active') ? ' has-error' : '' }}">
                                            <label for="active">@lang('admin.active')</label>
                                            <select class="form-control" name="active" id="active" required>
                                                <option value="1" {{ ($category->active == 1) ? 'selected':'' }}>@lang('admin.yes')</option>
                                                <option value="0" {{ ($category->active == 0) ? 'selected':'' }}>@lang('admin.no')</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--------------- featured ---------------}}
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('featured') ? ' has-error' : '' }}">
                                            <label for="featured">@lang('admin.featured')</label>
                                            <select class="form-control" name="featured" id="featured" required>
                                                <option value="0" {{ ($category->featured == 0) ? 'selected':'' }}>@lang('admin.no')</option>
                                                <option value="1" {{ ($category->featured == 1) ? 'selected':'' }}>@lang('admin.yes')</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--------------- order ---------------}}
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('order') ? ' has-error' : '' }}">
                                            <label for="order">@lang('admin.order')</label>
                                            <input type="number" name="order" class="form-control" id="order" value="{{ $category->order }}" required>
                                        </div>
                                    </div>
                                    {{--------------- dimension ---------------}}
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('dimension') ? ' has-error' : '' }}">
                                            <label for="dimension">@lang('admin.dimension')</label>
                                            @isset($category->options['dimension'])
                                            <input type="text" name="options[dimension]" class="form-control" id="dimension" value="{{ $category->options['dimension'] }}" placeholder="?w=500&h=400&fit=crop">
                                                @else
                                                    <input type="text" name="options[dimension]" class="form-control" id="dimension" placeholder="?w=500&h=400&fit=crop">
                                            @endisset
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

{{--------------------------------------------------}}
@section('scripts')
    @include('admin.partials.ckeditor')
    <script>
      $('#input-img').change(function () {
        if (this.files && this.files[0]) {
          var reader = new FileReader()
          reader.onload = function (e) {
            $('#tag-img').attr('src', e.target.result)
          }
          reader.readAsDataURL(this.files[0])
        }
      })
    </script>
@endsection

{{--------------------------------------------------}}
@section('styles')
@endsection
