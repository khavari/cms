<section id="news-single">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb pr-0 pl-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url(app()->getLocale()) }}">@lang('web.home')</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url($content->category->url()) }}">@lang('web.'.$content->vocabulary->slug)</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                    href="{{ url($content->category->url()) }}">{{ $content->category->title }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="wp-page mb-3">
                    @if($content->existImage())
                        <div class="wp-image">
                            <img src="{{ asset($content->image) }}" class="img-fluid animated fadeIn"
                                 alt="{{ $content->title }}">
                        </div>
                    @endif
                     <div class="header border_vibrant">
                            <h2 class="title pr-0 pl-0">{{ $content->title }}</h2>
                            <div class="article-icons">
                    <span class="created_at">
                       <i class="fa fa-clock-o"></i>
                        {{ $content->created_at }}
                    </span>
                                <span class="comments-qty  d-none">
                        <i class="fa fa-comment-o"></i>
                     25 @lang('web.comments')
                    </span>
                                <span class="view-count">
                        <i class="fa fa-eye"></i>
                                    {{ $content->views }}
                    </span>
                            </div>
                        </div>
                    <div class="body">
                     {!! $content->body !!}
                    </div>
                </div>
                <div class="related-articles mb-3  d-none">
                    <div class="row">
                        @for($i=0;$i<3;$i++)
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 ">
                                <div class="articles-box">

                                        <div class="image">
                                            <a href="{{ $content->url() }}">
                                            <img src="{{ asset('media/'.$content->image) }}?w=500&h=350&fit=crop"
                                                 class="img-fluid" alt="{{ $content->title }}">
                                            </a>
                                        </div>

                                    <div class="article-body">
                                        <h5 class="title"><a href="{{ $content->url() }}">{{ $content->title }}</a></h5>
                                        <div class="summary">
                                            <p>{{ str_limit($content->summary,150) }}</p>
                                        </div>
                                    </div>
                                    <div class="article-icons">
                    <span class="created_at">
                       <i class="fa fa-clock-o"></i>
                        {{ $content->created_at }}
                    </span>
                                        <span class="comments-qty">
                        <i class="fa fa-comment-o"></i>
                     25
                    </span>
                                        <span class="view-count">
                        <i class="fa fa-eye"></i>
                                            {{ $content->views }}
                     </span>

                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 d-none">
                <div class="sidebar mb-3">
                    <h2 class="title pr-0 pl-0">@lang('web.last_article')</h2>
                    @for($i=0;$i<=5 ;$i++)
                        <div class="content mt-3">
                            <a href="#" class="link">
                                <div class="col-12 image-thumbnail p-0">
                                    <div class="overlay"></div>
                                    <img src="{{ asset($content->image) }}" class="img-fluid animated fadeIn"
                                         alt="{{ $content->title }}">
                                </div>

                                <div class="col-12  text-thumbnail">
                                    <p>{{ str_limit($content->summary,50) }}</p>
                                </div>

                            </a>

                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
