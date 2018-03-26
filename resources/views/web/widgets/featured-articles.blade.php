{{-- featured-articles-rtl.scss featured-articles-ltr.scss --}}
@inject('Vocabulary', 'App\Vocabulary')
<?php $contents = $Vocabulary->featuredContents('article'); ?>
@if($contents->count())
    <section class="featured-articles mt-3 mb-3" id="featured-articles">
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
                                    </div>
                                </a>
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
                                    <span class="comments-qty d-none">
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
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@else
    @include('web.widgets.empty')
@endif
