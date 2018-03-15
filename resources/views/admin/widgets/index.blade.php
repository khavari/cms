@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title', trans('widgets.widgets'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_widgets')],
                ['title' => __('widgets.widgets'), 'class' => 'active'],
            ],
        ])
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">@lang("widgets.widgets")</h3>
                        <div class="box-tools">
                            <a href="" class="btn btn-flat btn-success">@lang('admin.update') @lang("widgets.widgets")</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped table-bordered">
                            <tr>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.name")</th>
                                <th>@lang("admin.group")</th>
                                <th>@lang("admin.status")</th>
                                <th class="hidden-xs">@lang("admin.updated_at")</th>
                            </tr>
                            @foreach($widgets as $widget)
                                <tr class="{{ (isUpdated($widget->updated_at)) ? 'updated' : '' }}">
                                    <td class="text-ltr">{{ $widget->getKey() }}</td>
                                    <td class="text-ltr">{{ $widget->name }}</td>
                                    <td>@lang("admin.".$widget->group)</td>
                                    <td>
                                        @include('admin.partials.active',['action'=>route('admin.widgets.edit', ['id' => $widget->id]),'active'=>$widget->active])
                                    </td>
                                    <td class="text-ltr hidden-xs">{{ $widget->updated_at }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row hidden">
            @foreach($widgets as $widget)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="box {{ ($widget->isActive())?'box-success':'box-primary' }}">
                        <div class="box-header">
                            <img src="{{ asset('assets/admin/img/widgets/widget.jpg') }}" class="img-responsive"
                                 alt="test">
                        </div>
                        <div class="box-body">
                            <h4>{{ $widget->name }}</h4>
                            <p>Simple description about this widget. Widgets are a set of features. you can add to yourself site.</p>
                            <p>{{ $widget->group }}</p>
                        </div>
                        <div class="box-footer">
                            @if($widget->isActive())
                                <a href="{{ route('admin.widgets.edit', ['id' => $widget->id]) }}" class="btn btn-sm btn-success btn-flat">@lang('admin.inactive')</a>
                            @else
                                <a href="{{ route('admin.widgets.edit', ['id' => $widget->id]) }}" class="btn btn-sm btn-primary btn-flat">@lang('admin.active')</a>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </section>

@endsection


{{--------------------------------------------------}}
@section('styles')
@endsection

{{--------------------------------------------------}}
@section('scripts')
@endsection


















