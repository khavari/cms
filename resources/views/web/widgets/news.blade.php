{{--news-ltr.scss  news-rtl.scss--}}
<section id="contents-news">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb" class="custom-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url(app()->getLocale()) }}">@lang('web.home')</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url($content->category->url()) }}">@lang('web.'.$content->vocabulary->slug)</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url($content->category->url()) }}">{{ $content->category->title }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="content p-2 mb-3">
                    @if($content->existImage())
                        <div class="wp-image">
                            <img src="{{ asset($content->image) }}" class="img-fluid animated fadeIn"
                                 alt="{{ $content->title }}">
                        </div>
                    @endif
                    <div class="header border_vibrant">
                        <h3 class="title">{{ $content->title }}</h3>
                    </div>
                    <div class="editor p-2">
                        {!! $content->body !!}
                    </div>
                    <a href="#" class="share text_vibrant" data-toggle="modal" data-target="#share-modal">
                        <i class="fa fa-share-alt"></i>
                    </a>
                </div>
            </div>
        </div>
        @includeIf('web.widgets.partial-gallery',['images' => $content->images()->active()->get()])
        {{--@includeIf('web.widgets.partial-videos')--}}
        {{--@includeIf('web.widgets.partial-downloads',['images' => $content->images()->active()->get()])--}}
        {{--@includeIf('web.widgets.partial-comments')--}}
    </div>
</section>

{{--Share Content Modal --}}
<div class="modal fade" id="share-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-share-alt"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="networks">
                    <a href="https://telegram.me/share/url?url={{ $content->url('id') }}" class="social"
                       target="_blank"><i class="fa fa-send-o"></i></a>
                    <a href="https://twitter.com/share?url={{ $content->url('id') }}" class="social" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $content->url('id') }}" class="social"
                       target="_blank"><i class="fa fa-facebook"></i></a>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text copy-url" data-url="{{ $content->url('id') }}"><i
                                    class="fa fa-copy"></i></div>
                    </div>
                    <input type="text" class="form-control" id="" value="{{ $content->url('id') }}">
                </div>
            </div>
        </div>
    </div>
</div>
