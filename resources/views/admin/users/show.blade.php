@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.show'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_users')],
                ['title' => __('admin.users'), 'href' => route('admin.users.index')],
                ['title' => __('admin.show'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin.create_new_user')</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered">
                            @foreach($columns as $column)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ __('admin.'.$column) }}</td>
                                    <td>{{ $user->$column }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="box-footer">
                        @include('admin.partials.footer_edit_action',['action'=>route('admin.users.edit', ['id' => $user->id])])
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
