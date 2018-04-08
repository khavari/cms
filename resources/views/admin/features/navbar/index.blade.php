@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.navbar'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_features')],
                ['title' => __('admin.navbar'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="box-tools">
                            @include('admin.partials.search')
                        </div>

                        <button type="button" class="btn btn-flat btn-primary" data-toggle="modal"
                                data-target="#modal-link">
                            @lang('admin.submit_new',['item'=> __('admin.link')])
                        </button>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;">@lang("admin.status")</th>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.title")</th>
                                <th>@lang("admin.url")</th>
                                <th>@lang("admin.order")</th>
                                <th>@lang("admin.parent")</th>
                                <th>@lang("admin.action")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($links as $link)
                                <tr class="{{ (isUpdated($link->updated_at))?'updated':'' }}">
                                    <td>
                                        @include('admin.partials.active',['action'=>route('admin.links.edit', ['feature'=>$feature->id, 'id' => $link->id]),'active'=>$link->active])
                                    </td>
                                    <td>{{$link->id}}</td>
                                    <td>{{$link->title}}</td>
                                    <td class="ltr" title="{{ $link->url }}">{{ str_limit($link->url, 40) }}</td>
                                    <td>{{$link->order}}</td>
                                    <td>{{$link->parent_id}}</td>
                                    <td>
                                        @include('admin.partials.delete',['action'=>route('admin.links.destroy', ['feature'=>$feature->id, 'id' => $link->id])])
                                        @include('admin.partials.edit',['action'=>route('admin.links.edit', ['feature'=>$feature->id, 'id' => $link->id])])
                                        @include('admin.partials.show',['action'=>route('admin.links.destroy', ['feature'=>$feature->id, 'id' => $link->id])])
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="modal-link">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.links.store',['feature'=>$feature->id])}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">@lang('admin.submit_new',['item'=> __('admin.link')])</h4>
                    </div>
                    <div class="modal-body">
                        {{--------------- title ---------------}}
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">@lang('admin.title')</label>
                            <input type="text" required class="form-control" id="title" name="title"
                                   value="{{old('title')}}" autofocus>
                        </div>
                        {{--------------- url ---------------}}
                        <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url">@lang('admin.url')</label>
                            <select class="form-control" id="url" name="url" style="width: 100%;">
                                <option value="">@lang('admin.without_url')</option>
                                @foreach($urls as $url)
                                    <option value="{{ $url['url'] }}">{{ $url['url'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--------------- parent_id ---------------}}
                        <div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
                            <label for="parent_id">@lang('admin.parent')</label>
                            <select class="form-control" id="parent_id" name="parent_id" style="width: 100%;">
                                <option value="0">@lang('admin.root')</option>
                                @foreach($links as $link)
                                    <option value="{{ $link->id }}">{{ $link->id }} - {{ $link->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--------------- icon ---------------}}
                        <div class="form-group {{ $errors->has('icon') ? ' has-error' : '' }}">
                            <label for="icon">@lang('admin.icon')</label>
                            <select class="form-control" id="icon" name="icon" style="width: 100%;">
                                <option value="">@lang('admin.without_icon')</option>
                                @foreach($icons as $icon)
                                    <option value="{{ $icon }}">{{ $icon }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-primary">@lang('admin.submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
          return state.text;
        }
        var baseUrl = "/user/pages/images/flags";
        var $state = $(
        '<span><i class="fa '+state.element.value.toLowerCase()+'"></i>   '+state.element.value.toLowerCase()+'</span>'
        );
        return $state;
      };

      $("#icon").select2({
        templateResult: formatState
      });

    </script>
@endsection

{{--------------------------------------------------}}
@section('styles')
    <style>
        #select2-url-container ,
        #select2-parent_id-container{
            direction: ltr;
        }
    </style>
@endsection

