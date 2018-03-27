@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.customers'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_features')],
                ['title' => __('admin.customers'), 'class' => 'active'],
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
                            @lang('admin.submit_new',['item'=> __('admin.customer')])
                        </button>
                        <button type="button" class="btn btn-flat btn-default" data-toggle="modal" data-target="#modal-feature">
                            <i class="fa fa-cogs"></i>
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
                                <th class="hidden-xs">@lang("admin.created_at")</th>
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
                                    <td>{{$link->url}}</td>
                                    <td>{{$link->order}}</td>
                                    <td class="hidden-xs">{{ $link->created_at }}</td>
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
                <form action="{{route('admin.links.store',['feature'=>$feature->id])}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">@lang('admin.submit_new',['item'=> __('admin.customer')])</h4>
                    </div>
                    <div class="modal-body">
                        {{--------------- image ---------------}}
                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image">@lang('admin.image')</label>
                            <input type="file" class="form-control" autofocus required id="image" name="file">
                        </div>
                        {{--------------- title ---------------}}
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">@lang('admin.title')</label>
                            <input type="text" required class="form-control" id="title" name="title"
                                   value="{{old('title')}}">
                        </div>
                        {{--------------- summary ---------------}}
                        <div class="form-group {{ $errors->has('summary') ? ' has-error' : '' }}">
                            <label for="summary">@lang('admin.summary')</label>
                            <textarea class="form-control" id="summary" name="summary"
                                      rows="3">{{ old('summary') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-primary">@lang('admin.submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-feature">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.features.update',['feature'=>$feature->id])}}" method="post" >
                    {{ csrf_field() }} {{ method_field('PATCH') }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">@lang('dimension')</h4>
                    </div>
                    <div class="modal-body">
                        {{--------------- dimension ---------------}}
                        <div class="form-group {{ $errors->has('dimension') ? ' has-error' : '' }}">
                            <label for="dimension">@lang('admin.dimension')</label>
                            <input type="text" class="form-control ltr" id="dimension"
                                   name="dimension"
                                   placeholder="?w=250&h=250&fit=crop"
                                   value="{{ $feature->dimension }}">
                        </div>
                        {{--------------- title ---------------}}
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">@lang('admin.title')</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ $feature->title }}">
                        </div>
                        {{--------------- summary ---------------}}
                        <div class="form-group {{ $errors->has('summary') ? ' has-error' : '' }}">
                            <label for="summary">@lang('admin.summary')</label>
                            <textarea class="form-control" id="summary" name="summary"
                                      rows="3">{{ $feature->summary }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-primary">@lang('admin.update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

{{--------------------------------------------------}}
@section('scripts')
    <script>
      $('#parent_id').select2()

      function formatState (state) {
        if (!state.id) {
          return state.text
        }
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

