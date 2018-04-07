@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.products'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_content')],
                ['title' => __('admin.products'), 'class' => 'active'],
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
                        <a href="{{ route('admin.products.create') }}" class="btn btn-flat btn-primary">
                            @lang('admin.submit_new',['item'=> __('admin.product')])
                        </a>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;">@lang("admin.status")</th>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.title")</th>
                                <th class="hidden-xs">@lang("admin.slug")</th>
                                <th>@lang("admin.category")</th>
                                <th class="hidden-xs">@lang("admin.created_at")</th>
                                <th>@lang("admin.action")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="{{ (isUpdated($product->updated_at))?'updated':'' }}">
                                    <td>
                                        @include('admin.partials.active',['action'=>route('admin.products.edit', ['id' => $product->id]),'active'=>$product->active])
                                    </td>
                                    <td class="text-ltr">{{$product->id}}</td>
                                    <td>{{ str_limit($product->title,32) }}</td>
                                    <td class="hidden-xs">{{ str_limit($product->slug,60) }}</td>
                                    <td>{{ str_limit($product->category->title,30) }}</td>
                                    <td class="text-ltr hidden-xs">{{ $product->created_at }}</td>
                                    <td>
                                        @include('admin.partials.delete',['action'=>route('admin.products.destroy', ['id' => $product->id])])
                                        @include('admin.partials.edit',['action'=>route('admin.products.edit', ['id' => $product->id])])

                                        <a href="{{ route('admin.products.show', ['id' => $product->id]) }}" class="btn btn-xs btn-flat btn-primary">
                                            @lang('admin.images')  {{ $product->images->count() }}
                                        </a>

                                        @include('admin.partials.copy',['url'=>url(app()->getLocale().'/product/'.$product->slug)])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($products->hasPages())
                        <div class="box-footer">
                            {{$products->appends($_GET)->links()}}
                        </div>
                    @endif
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
