<section id="contents-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url(app()->getLocale()) }}">@lang('web.home')</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url($content->category->url()) }}">{{ $content->vocabulary->slug }}</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                    href="{{ url($content->category->url()) }}">{{ $content->category->title }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="wp-page mb-3">
                    @if($content->existImage())
                        <div class="wp-image">
                            <img src="{{ asset($content->image) }}" class="img-fluid animated fadeIn"
                                 alt="{{ $content->title }}">
                        </div>
                    @endif
                        <div class="header border_vibrant">
                            <h2 class="title pr-0 pl-0">{{ $content->title }}</h2>
                        </div>
                    <div class="editor">
                        {!! $content->body !!}
                    </div>

                </div>
            </div>
                  </div>
        <div class="gallery mb-3">
            <div class="row">
                    <h2 class="title border_vibrant">@lang('web.gallery')</h2>
            </div>
            <div class="row" id="lightgallery">
                @for($i=0;$i<8;$i++)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-src="{{ asset($content->image) }}"
                         data-sub-html="<h4>{{ $content->title }}</h4><p>{{ $content->title }}</p>">
                        <div class="gallery-item">
                            <div class="image">
                                <img src="{{ asset($content->image) }}" class="img-fluid animated fadeIn"
                                     alt="{{ $content->title }}">
                            </div>
                            <div class="item-zoom">
                                <a href="#" class="item-zoom-link"><span class="fa fa-search"></span></a>
                            </div>
                            @isset($link->title)
                                <a href="{{$link->url}}" class="item-zoom-text">{{$link->title}}</a>
                            @endisset
                            <div class="gallery-overlay"></div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="video mb-3 d-none">
            <div class="row">
                <h2 class="title border_vibrant">@lang('web.video')</h2>
            </div>
            <div class="row">
                @for($i=0;$i<8;$i++)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col- mb-4">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                        </div>

                    </div>
                @endfor
            </div>
        </div>
        <div class="download mb-3 d-none">
            <div class="row">
                <h2 class="title border_vibrant">@lang('web.download')</h2>
            </div>
            <div class="row">
                @for($i=0;$i<8;$i++)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3   mb-4">
                        <a href="#">
                            <div class="image">
                        {{--<img src="{{ asset($content->image) }}" class="img-fluid animated fadeIn"--}}
                             {{--alt="{{ $content->title }}">--}}
                            </div>
                            <div class="content">
                                <div class="title-inner">@lang('lorem.3')</div>
                                <div class="body">@lang('lorem.6')</div>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
        <div class="comment mb-3 d-none">
            <div class="comment-header">
            <div class="row">
                <h2 class="title border_vibrant">@lang('web.comments')</h2>
                <!-- Button write_comment modal -->
                <button type="button" class="btn-modal border_vibrant text_vibrant" data-toggle="modal" data-target="#comment-modal">
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
                                    <button type="button" class="btn submit">@lang('web.submit_comment')</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-dismiss="modal">@lang('web.close')</button>
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
                        <button type="button" class="btn-modal border_vibrant text_vibrant" data-toggle="modal" data-target="#comment-modal">
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
                                            <button type="button" class="btn submit">@lang('web.submit_comment')</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary " data-dismiss="modal">@lang('web.close')</button>
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
        </div>
    </div>
</section>
