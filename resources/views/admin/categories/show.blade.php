@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.show'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_content')],
                ['title' => __('admin.categories'), 'href' => route('admin.categories.index')],
                ['title' => __('admin.show'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin.show')</h3>
                        <div class="box-tools"></div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered">
                            <tr>
                                <td>@lang('admin.id')</td>
                                <td>{{ $category->id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.parent_id')</td>
                                <td>{{ $category->parent_id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.vocabulary_id')</td>
                                <td>{{ $category->vocabulary_id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.slug')</td>
                                <td>{{ $category->slug }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.title')</td>
                                <td>{{ $category->title }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.summary')</td>
                                <td>{{ $category->summary }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.keywords')</td>
                                <td>{{ $category->keywords }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.description')</td>
                                <td>{{ $category->description }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.body')</td>
                                <td>{{ $category->body }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.image')</td>
                                <td>{{ $category->image }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.lang')</td>
                                <td>{{ $category->lang }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.order')</td>
                                <td>{{ $category->order }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.featured')</td>
                                <td>{{ $category->featured }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.active')</td>
                                <td>{{ $category->active }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.created_at')</td>
                                <td>{{ $category->created_at }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.updated_at')</td>
                                <td>{{ $category->updated_at }}</td>
                            </tr>


                        </table>
                    </div>
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
