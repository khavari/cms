@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.edit'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_features')],
                ['title' => __('admin.'.$feature->slug), 'href' => route('admin.links.index',['feature'=>$feature->id])],
                ['title' => __('admin.edit'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin.edit')</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <form role="form"
                          action="{{route('admin.links.update', ['feature'=>$feature->id, 'id' => $link->id])}}"
                          method="post" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="box-body no-padding">
                            {{--------------- title ---------------}}
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title">@lang('admin.title')</label>
                                    <input type="text" name="title"
                                           class="form-control" id="title" value="{{ $link->title }}" required>
                                </div>
                            </div>

                            {{--------------- parent_id ---------------}}
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
                                    <label for="parent_id">@lang('admin.parent')</label>
                                    <select class="form-control" id="parent_id" name="parent_id" style="width: 100%;">
                                        <option value="0">@lang('admin.root')</option>
                                        @foreach($links as $item)
                                            <option value="{{ $item->id }}" {{ ($item->id == $link->parent_id)?'selected':'' }}>{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{--------------- url ---------------}}
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
                                    <label for="url">@lang('admin.url')</label>
                                    <select class="form-control" id="url" name="url" style="width: 100%;">
                                        @if(! in_array($link->url , $urls->pluck('url')->toArray() ) && ! is_null($link->url))
                                            <option value="{{ $link->url }}">{{ $link->url }}</option>
                                        @else
                                            <option value="">@lang('admin.without_url')</option>
                                        @endif
                                        @foreach($urls as $url)
                                            <option value="{{ $url['url'] }}" {{ ($url['url'] == $link->url)?'selected':'' }}>{{ $url['url'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{--------------- order ---------------}}
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('order') ? ' has-error' : '' }}">
                                    <label for="order">@lang('admin.order')</label>
                                    <input type="number" name="order"
                                           class="form-control" id="order" value="{{ $link->order }}" required>
                                </div>
                            </div>

                            {{--------------- icon ---------------}}
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('icon') ? ' has-error' : '' }}">
                                    <label for="icon">@lang('admin.icon')</label>

                                    <select class="form-control" id="icon" name="icon" style="width: 100%;">
                                        <option value="">@lang('admin.without_icon')</option>
                                        @foreach($icons as $icon)
                                            <option value="{{ $icon }}" {{ ($icon == $link->icon)?'selected':'' }}>{{ $icon }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            @include('admin.partials.footer_update_action')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

{{--------------------------------------------------}}
@section('scripts')
    <script>
      $('#parent_id').select2();
      $('#url').select2({
        tags: true
      });

      function formatState (state) {
        if (!state.id) {
          return state.text
        }
        var baseUrl = '/user/pages/images/flags'
        var $state = $(
          '<span><i class="fa ' + state.element.value.toLowerCase() + '"></i>   ' + state.element.value.toLowerCase() + '</span>'
        )
        return $state
      }

      $('#icon').select2({
        templateResult: formatState
      })

    </script>
@endsection

{{--------------------------------------------------}}
@section('styles')
@endsection
