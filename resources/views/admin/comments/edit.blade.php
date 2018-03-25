@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.edit'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_content')],
                ['title' => __('admin.comments'), 'href' => route('admin.comments.index')],
                ['title' => __('admin.edit'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin.edit')</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <form role="form" action="{{route('admin.comments.update', ['id' => $comment->id])}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="box-body no-padding">
                            {{--------------- message ---------------}}
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
                                    <label for="message">@lang('admin.message')</label>
                                    <textarea rows="4" name="message" class="form-control" id="message">{{ $comment->message }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            @include('admin.partials.footer_update_action')
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
    <style>
        .form-group img{
            position: absolute;
            top: 26px;
            right: 16px;
            height: 32px;
        }
    </style>
@endsection
