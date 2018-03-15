@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.contents'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_content')],
                ['title' => __('admin.contents'), 'class' => 'active'],
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
                        <div class="btn-group">
                            <button type="button"
                                    class="btn btn-info btn-flat">@lang('admin.create_new',['item'=> __('admin.content')])</button>
                            <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                @foreach($vocabularies as $vocabulary)
                                    <li>
                                        <a href="{{ route('admin.contents.create') }}?vocabulary_id={{ $vocabulary->id }}">{{ __('admin.'.$vocabulary->slug) }}</a>
                                    </li>
                                @endforeach
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('admin.categories.create') }}">@lang('admin.create_new',['item'=> __('admin.category')])</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;">@lang("admin.status")</th>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.title")</th>
                                <th class="hidden-xs">@lang("admin.slug")</th>
                                <th>@lang("admin.vocabulary")</th>
                                <th class="hidden-xs">@lang("admin.created_at")</th>
                                <th>@lang("admin.action")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contents as $content)
                                <tr class="{{ (isUpdated($content->updated_at))?'updated':'' }}">
                                    <td>
                                        @include('admin.partials.active',['action'=>route('admin.contents.edit', ['id' => $content->id]),'active'=>$content->active])
                                        @include('admin.partials.featured',['action'=>route('admin.contents.edit', ['id' => $content->id]),'featured'=>$content->featured])
                                    </td>
                                    <td class="text-ltr">{{$content->id}}</td>
                                    <td>{{ str_limit($content->title,32) }}</td>
                                    <td class="hidden-xs">{{ str_limit($content->slug,60) }}</td>
                                    <td>{{ $content->vocabulary_id }}</td>
                                    <td class="text-ltr hidden-xs">{{ $content->created_at }}</td>
                                    <td>
                                        @include('admin.partials.delete',['action'=>route('admin.contents.destroy', ['id' => $content->id])])
                                        @include('admin.partials.edit',['action'=>route('admin.contents.edit', ['id' => $content->id])])
                                        @include('admin.partials.show',['action'=>route('admin.contents.destroy', ['id' => $content->id])])
                                        @include('admin.partials.copy',['url'=>url(app()->getLocale().'/content/'.$content->slug)])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($contents->hasPages())
                        <div class="box-footer">
                            {{$contents->appends($_GET)->links()}}
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
