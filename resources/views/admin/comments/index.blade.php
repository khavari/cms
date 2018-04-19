@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.comments'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_content')],
                ['title' => __('admin.comments'), 'class' => 'active'],
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
                            @lang('admin.comments')</h3>
                        <div class="box-tools">
                            @include('admin.partials.search')
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.status")</th>
                                <th>@lang("admin.name")</th>
                                <th>@lang("admin.message")</th>
                                <th>@lang("admin.created_at")</th>
                                <th>@lang("admin.action")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr class="{{ (isUpdated($comment->updated_at))?'updated':'' }}">
                                    <td>{{$comment->id}}</td>
                                    <td>
                                        @include('admin.partials.active',['action'=>route('admin.comments.edit', ['id' => $comment->id]),'active'=> $comment->isApprove()])
                                    </td>
                                    <td><a href="{{ route('admin.users.show', ['id' => $comment->user->id]) }}" target="_blank">{{$comment->user->email}}</a></td>
                                    <td>{{ str_limit($comment->message,50) }}</td>
                                    <td>{{ date_ago($comment->created_at) }}</td>
                                    <td>
                                        @include('admin.partials.delete',['action'=>route('admin.comments.destroy', ['id' => $comment->id])])
                                        @include('admin.partials.edit',['action'=>route('admin.comments.edit', ['id' => $comment->id])])
                                        <button class="btn btn-xs btn-flat btn-info btn-primary" data-toggle="modal" data-target="#modal-reply-{{$comment->id}}">@lang('admin.reply')</button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="modal-reply-{{$comment->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form role="form"
                                                  action="{{route('admin.comments.store')}}"
                                                  method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="parent_id" value="{{ $comment->getKey() }}">
                                                <input type="hidden" name="commentable_id" value="{{ $comment->commentable->getKey() }}">
                                                <input type="hidden" name="commentable_type" value="App\Content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">@lang('admin.comment')</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <p>{{ $comment->user->name }}</p>
                                                    <p>{{ $comment->user->email }}</p>
                                                    <p>{{ $comment->message }}</p>
                                                    {{--------------- message ---------------}}
                                                    <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
                                                        <label for="message">@lang('admin.message')</label>
                                                        <textarea rows="5" required class="form-control"
                                                                  id="message"
                                                                  name="message">{{ old('message') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-md btn-flat btn-success">@lang('admin.submit')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($comments->hasPages())
                        <div class="box-footer">
                            {{$comments->appends($_GET)->links()}}
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
