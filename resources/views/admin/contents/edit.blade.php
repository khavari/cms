@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.edit'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_content')],
               ['title' => __('admin.contents'), 'href' => route('admin.contents.index')],
                ['title' => __('admin.edit'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">

        <form role="form" action="{{route('admin.contents.update', ['id' => $content->id])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }} {{ method_field('PATCH') }}
            <input type="hidden" name="vocabulary_id" value="{{ $vocabulary_id }}">

            <div class="row">
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
                                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                            <a href="" target="_blank">
                                                <img id="tag-img" src="{{ asset($content->image) }}" class="img-responsive" style="margin:15px 0px;"/>
                                            </a>
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
                                    {{--------------- category_id ---------------}}
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                            <label for="category_id">@lang('admin.category')</label>
                                            <select class="form-control" name="category_id" id="category_id" required>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ ($content->category_id == $category->id) ? 'selected':'' }}>{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--------------- published_at ---------------}}
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('published_at') ? ' has-error' : '' }}">
                                            <label for="published_at">@lang('admin.published_at')</label>
                                            <input type="date" name="published_at" class="form-control"
                                                   id="published_at"
                                                   value="{{ substr($content->published_at,0,10) }}">
                                        </div>
                                    </div>
                                    {{--------------- order ---------------}}
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('order') ? ' has-error' : '' }}">
                                            <label for="order">@lang('admin.order')</label>
                                            <input type="number" name="order" class="form-control" id="order" value="{{ $content->order }}" required>
                                        </div>
                                    </div>
                                    {{--------------- featured ---------------}}
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('featured') ? ' has-error' : '' }}">
                                            <label for="featured">@lang('admin.featured')</label>
                                            <select class="form-control" name="featured" id="featured" required>
                                                <option value="0" {{ ($content->featured == 0) ? 'selected':'' }}>@lang('admin.no')</option>
                                                <option value="1" {{ ($content->featured == 1) ? 'selected':'' }}>@lang('admin.yes')</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--------------- active ---------------}}
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('active') ? ' has-error' : '' }}">
                                            <label for="active">@lang('admin.active')</label>
                                            <select class="form-control" name="active" id="active" required>
                                                <option value="1" {{ ($content->active == 1) ? 'selected':'' }}>@lang('admin.yes')</option>
                                                <option value="0" {{ ($content->active == 0) ? 'selected':'' }}>@lang('admin.no')</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">@lang('admin.options')</h3>
                                </div>
                                <div class="box-body no-padding">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">@lang('admin.create_new',['item'=> strtolower(__('admin.content'))])</h3>
                            <div class="box-tools"></div>
                        </div>
                        <div class="box-body no-padding">
                            {{--------------- title ---------------}}
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title">@lang('admin.title')</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ $content->title }}" required>
                                </div>
                            </div>
                            {{--------------- slug ---------------}}
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                                    <label for="slug">@lang('admin.slug')</label>
                                    <input type="text" name="slug"
                                           class="form-control" id="slug" value="{{ $content->slug }}" required>
                                </div>
                            </div>
                            {{--------------- summary ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('summary') ? ' has-error' : '' }}">
                                    <label for="summary">@lang('admin.summary')</label>
                                    <textarea name="summary" class="form-control" rows="3"
                                              id="summary">{{ $content->summary }}</textarea>
                                </div>
                            </div>
                            {{--------------- body ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                                    <label for="body">@lang('admin.body')</label>
                                    <textarea name="body" class="form-control" id="body">{!! $content->body !!}</textarea>
                                </div>
                            </div>
                            {{--------------- description ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">@lang('admin.description')</label>
                                    <textarea name="description" class="form-control"
                                              id="description">{{ $content->description }}</textarea>
                                </div>
                            </div>
                            {{--------------- keywords ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('keywords') ? ' has-error' : '' }}">
                                    <label for="keywords">@lang('admin.keywords')</label>
                                    <input type="text" name="keywords" class="form-control" id="keywords"
                                           value="{{ $content->keywords }}">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            @include('admin.partials.submit')
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
