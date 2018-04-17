<div class="row">
    <div class="col-12 col-md-12">
        <div class="partial-comments mb-3">
            <div class="header">
                <h6 class="caption"><i class="fa fa-comment-o"></i>&nbsp;&nbsp;@lang('web.comments')</h6>
                @if(auth()->check())
                    <button type="button" class="badge badge-success" data-toggle="modal" data-target="#comment-modal">
                        @lang('web.write_comment')
                    </button>
                @else
                    <button type="button" class="badge badge-info" data-toggle="modal"
                            data-target="#user-login-modal">
                        @lang('web.login_for_comment')
                    </button>
                @endif
            </div>

            <div class="modal fade" id="comment-modal" tabindex="-1" role="dialog" aria-labelledby="comment-modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="comment-modalLabel">@lang('web.send_comment')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form role="form" action="{{route('submit-comment')}}#partial-comments" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="commentable_id" value="{{ $content->getKey() }}">
                                <input type="hidden" name="commentable_type" value="App\Content">
                                <textarea name="message" class="textarea"
                                          placeholder="@lang('web.text_modal_comment')"></textarea>
                                <button type="submit"
                                        class="btn btn-primary submit">@lang('web.submit_comment')</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>




                        @foreach($content->comments()->parent()->approve()->latest()->get() as $comment)
                            <div class="comment-body mb-3 p-1 p-md-3">
                                <div class="first-level p-1 p-md-3">
                                    <div class="head">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-sm-6 mb-3 commenter">
                                                <span class="author">{{ $comment->user->name }}</span>
                                                <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                <span class="date">{{ date_ago($comment->created_at) }}</span>
                                            </div>
                                            <div class="col-12 col-sm-6 mb-3 btn-area">

                                                @if(auth()->check())
                                                    <button type="button" class="badge badge-primary"
                                                            data-toggle="modal"
                                                            data-target="#reply{{ $comment->getKey() }}">
                                                        @lang('web.answer_comment')
                                                    </button>
                                                @else
                                                    <button type="button" class="badge badge-primary"
                                                            data-toggle="modal" data-target="#user-login-modal">
                                                        @lang('web.login_for_comment')
                                                    </button>
                                                @endif


                                                <div class="modal fade" id="reply{{ $comment->getKey() }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="comment-modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="comment-modalLabel">@lang('web.send_comment')</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form"
                                                                      action="{{route('submit-comment')}}#partial-comments"
                                                                      method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="parent_id"
                                                                           value="{{ $comment->getKey() }}">
                                                                    <input type="hidden" name="commentable_id"
                                                                           value="{{ $content->getKey() }}">
                                                                    <input type="hidden" name="commentable_type"
                                                                           value="App\Content">
                                                                    <textarea name="message"
                                                                              class="textarea"
                                                                              placeholder="@lang('web.text_modal_comment')"></textarea>
                                                                    <button type="submit"
                                                                            class="btn btn-primary submit">@lang('web.submit_comment')</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="message">{{ $comment->message }}</div>
                                </div>
                                @if($comment->hasChildren())
                                    @foreach($comment->children()->approve()->get() as $comment)
                                        <div class="second-level mb-3 p-1 p-md-3">
                                            <div class="head">
                                                <div class="row">
                                                    <div class="col-12 commenter">
                                                        <span class="author">{{ $comment->user->name }}</span>
                                                        <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                        <span class="date">{{ date_ago($comment->created_at) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="message">{!! $comment->message !!}</div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach


        </div>
    </div>
</div>

@includeIf('web.widgets.user-login-modal')
