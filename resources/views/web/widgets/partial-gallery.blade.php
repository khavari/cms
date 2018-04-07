@if($images->count())
    <div class="partial-gallery mb-3">
        <div class="row">
            <h2 class="title border_vibrant">@lang('web.gallery')</h2>
        </div>
        <div class="row" id="lightgallery">
            @foreach($images as $image)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-src="{{ asset($image->image) }}"
                     data-sub-html="<h4>{{ $image->title }}</h4><p>{{ $image->title }}</p>">
                    <div class="gallery-item">
                        <div class="image">
                            <img src="{{ asset($image->image) }}" class="img-fluid animated fadeIn" alt="{{ $image->alt }}">
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
            @endforeach
        </div>
    </div>
@endif
