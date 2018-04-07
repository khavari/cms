@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.categories'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
               ['title' => __('admin.manage_', ['item' => __('admin.products')])],
                ['title' => __('admin.categories'), 'class' => 'active'],
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
                        <a href="{{ route('admin.product_categories.create') }}" class="btn btn-flat btn-primary">
                            @lang('admin.create_new',['item'=> __('admin.category')])
                        </a>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;">@lang("admin.status")</th>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.title")</th>
                                <th>@lang("admin.slug")</th>
                                <th>@lang("admin.category")</th>
                                <th>@lang("admin.products")</th>
                                <th>@lang("admin.action")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr class="{{ (isUpdated($category->updated_at))?'updated':'' }}">
                                    <td>
                                        @include('admin.partials.active',['action'=>route('admin.product_categories.edit', ['id' => $category->id]),'active'=>$category->active])
                                    </td>
                                    <td>{{$category->id}}</td>
                                    <td>{{ str_limit($category->title,32) }}</td>
                                    <td>{{ str_limit($category->slug,60) }}</td>
                                    <td>--</td>
                                    <td>{{$category->products()->count()}}</td>
                                    <td>
                                        @include('admin.partials.delete',['action'=>route('admin.product_categories.destroy', ['id' => $category->id])])
                                        @include('admin.partials.edit',['action'=>route('admin.product_categories.edit', ['id' => $category->id])])
                                        @include('admin.partials.show',['action'=>route('admin.product_categories.destroy', ['id' => $category->id])])
                                        @include('admin.partials.copy',['url'=>url(app()->getLocale().'/products/'.$category->slug)])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($categories->hasPages())
                        <div class="box-footer">
                            {{$categories->appends($_GET)->links()}}
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
