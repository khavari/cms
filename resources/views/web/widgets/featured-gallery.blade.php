{{--featured-gallery-rtl.scss----featured-gallery-ltr.scss--}}
@inject('feature', 'App\Feature')
@if($feature->gallery()->count())
    <section class="featured-gallery" id="featured-gallery">
        <div class="container-fluid">
            <div class="row d-none">
                <div class="col-12">
                    <h5 class="title">@lang('lorem.2')</h5>
                </div>
            </div>
            <div class="row" id="lightgallery">
                @foreach($feature->gallery() as $link)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-0" data-src="{{ asset($link->image) }}"
                         data-sub-html="<h4>{{$link->title}}</h4><p>{{$link->summary}}</p>">
                        <div class="gallery-item">
                            <div class="image">
                                <img src="{{ asset($link->image()) }}{{ $link->feature->dimension }}" alt="{{$link->title}}" class="img-fluid">
                            </div>
                            <div class="item-zoom">
                                <a href="#" class="item-zoom-link"><span class="fa fa-search"></span></a>
                                {{--<a href="#" class="item-zoom-icon"><span class="fa fa-link"></span></a>--}}
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
    </section>
@else
    @include('web.widgets.empty')
@endif
