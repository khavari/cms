@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.show'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_features')],
                ['title' => __('admin.'.$feature->slug), 'href' => route('admin.links.index',['feature'=>$feature->id])],
                ['title' => __('admin.show'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin.'.$feature->slug)</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered">
                            <tr>
                                <td>@lang('admin.id')</td>
                                <td>{{ $link->id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.feature_id')</td>
                                <td>{{ $link->feature_id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.parent_id')</td>
                                <td>{{ $link->parent_id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.title')</td>
                                <td>{{ $link->title }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.summary')</td>
                                <td>{{ $link->summary }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.label')</td>
                                <td>{{ $link->label }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.url')</td>
                                <td>{{ $link->url }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.icon')</td>
                                <td>{{ $link->icon }}</td>
                            </tr>

                            <tr>
                                <td>@lang('admin.image')</td>
                                <td>{{ $link->image }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.lang')</td>
                                <td>{{ $link->lang }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.order')</td>
                                <td>{{ $link->order }}</td>
                            </tr><tr>
                                <td>@lang('admin.active')</td>
                                <td>{{ $link->active }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.created_at')</td>
                                <td>{{ $link->created_at }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.updated_at')</td>
                                <td>{{ $link->updated_at }}</td>
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
