@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.contacts'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_contacts')],
                ['title' => __('admin.contacts'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            @if(request()->archived)
                                @lang('admin.archived')
                            @endif
                            @lang('admin.contacts')</h3>
                        <div class="box-tools">
                            @include('admin.partials.search')
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.name")</th>
                                <th>@lang("admin.email")</th>
                                <th>@lang("admin.created_at")</th>
                                <th>@lang("admin.action")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr class="{{ (isUpdated($contact->updated_at))?'updated':'' }}">
                                    <td>{{$contact->id}}</td>
                                    <td>{{ str_limit($contact->name,25) }}</td>
                                    <td>{{ str_limit($contact->email,25) }}</td>
                                    <td>{{ date_ago($contact->created_at) }}</td>
                                    <td>
                                        @include('admin.partials.delete',['action'=>route('admin.contacts.destroy', ['id' => $contact->id])])
                                        <a href="{{ route('admin.contacts.edit', ['id' => $contact->id]) }}"
                                           class="btn btn-xs btn-flat btn-primary">
                                            @if(request()->archived)
                                                @lang('admin.unarchive')
                                            @else
                                                @lang('admin.archived')
                                            @endif
                                        </a>

                                        @include('admin.partials.show',['action'=>route('admin.contacts.destroy', ['id' => $contact->id])])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($contacts->hasPages())
                        <div class="box-footer">
                            {{$contacts->appends($_GET)->links()}}
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
