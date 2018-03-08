<section id="gallery" class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wp-images mt-3 mb-3 p-3">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="images-title"> title</h2>
                        </div>
                        <div class="col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url(app()->getLocale()) }}">@lang('web.home')</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ url($content->category->url()) }}">{{ $content->vocabulary->title }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                                href="{{ url($content->category->url()) }}">{{ $content->category->title }}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row" id="lightgallery">
                        @foreach($content->images as $image)
                            <div class="col-12 col-sm-6 col-md-4 p-0" data-src="{{ asset($image->image) }}">
                                <div class="image">
                                    <img class="img-fluid"
                                         src="{{ asset('media/'.$image->image) }}?w=450&h=300&fit=crop"
                                         alt="{{ $image->alt }}">
                                    <h5 class="title fixed-bottom">{{ $image->title }}</h5>
                                </div>
                            </div>

                        @endforeach
                    </div>

                </div>
            </div>
            </div>
    </div>
</section>
