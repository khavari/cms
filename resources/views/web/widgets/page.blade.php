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
                    <h2 class="title">{{ $content->title }}</h2>
                    <div class="body">
                        {!! $content->body !!}
                    </div>
                </div>
            </div>
                  </div>
    </div>
</section>
