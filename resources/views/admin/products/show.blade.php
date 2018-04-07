@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.show'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_content')],
                ['title' => __('admin.products'), 'href' => route('admin.products.index')],
                ['title' => __('admin.show'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row hidden">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin.show')</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered">
                            <tr>
                                <td>@lang('admin.id')</td>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.parent_id')</td>
                                <td>{{ $product->parent_id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.vocabulary_id')</td>
                                <td>{{ $product->vocabulary_id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.slug')</td>
                                <td>{{ $product->slug }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.title')</td>
                                <td>{{ $product->title }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.summary')</td>
                                <td>{{ $product->summary }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.keywords')</td>
                                <td>{{ $product->keywords }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.description')</td>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.body')</td>
                                <td>{{ $product->body }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.image')</td>
                                <td>{{ $product->image }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.lang')</td>
                                <td>{{ $product->lang }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.order')</td>
                                <td>{{ $product->order }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.featured')</td>
                                <td>{{ $product->featured }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.active')</td>
                                <td>{{ $product->active }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.created_at')</td>
                                <td>{{ $product->created_at }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.updated_at')</td>
                                <td>{{ $product->updated_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="box-tools">
                            @include('admin.partials.search')
                        </div>

                        <button type="button" class="btn btn-flat btn-primary" data-toggle="modal"
                                data-target="#modal-image">
                            @lang('admin.submit_new',['item'=> __('admin.image')])
                        </button>

                        <button type="button" class="btn btn-flat btn-primary" data-toggle="modal"
                                data-target="#modal-file">
                            @lang('admin.submit_new',['item'=> __('admin.file')])
                        </button>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;">@lang("admin.status")</th>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.title")</th>
                                <th>@lang("admin.alt")</th>
                                <th>@lang("admin.created_at")</th>
                                <th>@lang("admin.action")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->images as $image)
                                <tr class="{{ (isUpdated($image->updated_at))?'updated':'' }}">
                                    <td>
                                        @include('admin.partials.active',['action'=>route('admin.images.edit', ['id' => $image->id]),'active'=>$image->active])
                                    </td>
                                    <td>
                                        <img src="{{ asset($image->image) }}" height="50" alt="">
                                    </td>
                                    <td>{{$image->title}}</td>
                                    <td>{{$image->alt}}</td>
                                    <td>{{$image->created_at}}</td>
                                    <td>
                                        @include('admin.partials.delete',['action'=>route('admin.images.destroy', ['id' => $image->id])])
                                        @include('admin.partials.edit',['action'=>route('admin.images.edit', ['id' => $image->id])])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="modal-image">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('admin.images.store')}}" method="post"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="imageable_id" value="{{ $product->id }}">
                        <input type="hidden" name="imageable_type" value="App\Product">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">@lang('admin.submit_new',['item'=> __('admin.image')])</h4>
                        </div>
                        <div class="modal-body">
                            {{--------------- image ---------------}}
                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image">@lang('admin.image')</label>
                                <input type="file" class="form-control" required id="image" name="image">
                            </div>
                            {{--------------- title ---------------}}
                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">@lang('admin.title')</label>
                                <input type="text" required class="form-control" id="title" name="title"
                                       value="{{old('title')}}">
                            </div>
                            {{--------------- alt ---------------}}
                            <div class="form-group {{ $errors->has('alt') ? ' has-error' : '' }}">
                                <label for="alt">@lang('admin.alt')</label>
                                <input type="text" required class="form-control" id="alt" name="alt"
                                       value="{{old('alt')}}">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-flat btn-primary">@lang('admin.submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>
@endsection

{{--------------------------------------------------}}
@section('scripts')
@endsection

{{--------------------------------------------------}}
@section('styles')
@endsection
