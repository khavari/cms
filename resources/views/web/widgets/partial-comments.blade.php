<div class="partial-comments mb-3">
    <div class="comment-header">
        <div class="row">
            <h2 class="title border_vibrant">@lang('web.comments')</h2>
            <!-- Button write_comment modal -->
            <button type="button" class="btn-modal btn-primary" data-toggle="modal" data-target="#comment-modal">
                @lang('web.write_comment')
            </button>
            <!--write_comment Modal -->
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
                            <form action="" method="get">
                                <textarea name="" id="" class="textarea" placeholder="@lang('web.text_modal_comment')"></textarea>
                                <button type="button" class="btn btn-primary submit">@lang('web.submit_comment')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @for($i=0;$i<3;$i++)
        <div class="comment-body mb-3">
            <div class="first-level">
                <div class="head">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3 author-area">
                            <span class="author">mostafa</span> &nbsp; | &nbsp; <span class="date">One day ago</span>
                        </div>
                        <div class="col-12 col-sm-6 mb-3 btn-area">
                            <!-- Button answer_comment modal -->
                            <button type="button" class="btn-modal btn-primary" data-toggle="modal" data-target="#comment-modal">
                                @lang('web.answer_comment')
                            </button>
                            <!-- answer_comment Modal -->
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
                                            <form action="" method="get">
                                                <textarea name="" id="" class="textarea" placeholder="@lang('web.text_modal_comment')"></textarea>
                                                <button type="button" class="btn btn-primary submit">@lang('web.submit_comment')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    @lang('lorem.10')
                </div>
            </div>
            <div class="second-level">
                <div class="head">
                    <div class="row">
                        <div class="col-12 author-area">
                            <span class="author">Ali</span> &nbsp; | &nbsp; <span class="date"> Today</span>
                        </div>
                    </div>
                </div>
                <div class="content">
                    @lang('lorem.15')
                    @lang('lorem.15')
                    @lang('lorem.15')
                </div>
            </div>
        </div>
    @endfor
</div>
