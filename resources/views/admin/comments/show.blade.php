@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.show'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_contacts')],
                ['title' => __('admin.contacts'), 'href' => route('admin.contacts.index')],
                ['title' => __('admin.show'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin.contact')</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered">
                            <tr>
                                <td>@lang('admin.id')</td>
                                <td>{{ $contact->id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.name')</td>
                                <td>{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.email')</td>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.subject')</td>
                                <td>{{ $contact->subject }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.company')</td>
                                <td>{{ $contact->company }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.mobile')</td>
                                <td>{{ $contact->mobile }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.phone')</td>
                                <td>{{ $contact->phone }}</td>
                            </tr>
                            <tr>
                                <td>@lang('admin.message')</td>
                                <td>{{ $contact->message }}</td>
                            </tr>

                            <tr>
                                <td>@lang('admin.ip')</td>
                                <td>{{ $contact->ip }}</td>
                            </tr>

                            <tr>
                                <td>@lang('admin.created_at')</td>
                                <td>{{ $contact->created_at }}</td>
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
