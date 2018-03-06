{{-- featured-articles-rtl.scss featured-articles-ltr.scss --}}
@inject('Vocabulary', 'App\Vocabulary')
<?php $contents = $Vocabulary->featuredContents('article'); ?>
@if($contents->count())
    <section class="featured-articles" id="featured-articles">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title">
                        @lang('web.featured_articles')
                    </h3>
                </div>
            </div>
            <div class="articles">
                <div class="row">
                    @foreach($contents as $content)
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 ">
                            <div class="articles-box">
                                <a href="{{ $content->url() }}">
                                    <div class="image">
                                        <img src="{{ asset('media/'.$content->image) }}?w=500&h=350&fit=crop"
                                             class="img-fluid" alt="{{ $content->title }}">
                                        <div class="overlay-img"></div>
                                    </div>
                                </a>
                                <div class="article-footer">
                    <span class="created_at">
                       <i class="fa fa-clock-o"></i>
                        {{ $content->created_at }}
                    </span>
                                    <span class="comments-qty">
                        <i class="fa fa-comment-o"></i>
                        comments
                    </span>
                                    <span class="view-count">
                        <i class="fa fa-eye"></i>
                                        {{ $content->views }}
                    </span>

                                </div>
                                <div class="article-body">
                                    <h5 class="title">{{ $content->title }}</h5>
                                    <div class="summary">
                                        <p>{{ str_limit($content->summary,200) }}</p>
                                        <div class="btn-area">
                                            <a href="{{ $content->url() }}" class="btn-more">@lang('lorem.1')</a>
                                            <div class="overlay-btn"></div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@else
    @include('web.widgets.empty')
@endif
