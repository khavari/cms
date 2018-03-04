{{-- bootstrap-carousel-slide-rtl.scss -bootstrap-carousel-slide-ltr.scss --}}
@inject('feature', 'App\Feature')
<?php $code = 'bcs' . rand(1, 100); ?>
@if($feature->slider()->count())
    <section id="bootstrap-carousel-slide">
        <div id="{{$code}}" class="carousel slide" data-ride="carousel">
            @if($feature->slider()->count() > 1)
                <ol class="carousel-indicators">
                    @foreach($feature->slider() as $index => $link)
                        <li data-target="#{{$code}}" data-slide-to="{{ $index }}"
                            class="{{ ($index == 0)?'active':'' }}"></li>
                    @endforeach
                </ol>
            @endif
            <div class="carousel-inner">
                @foreach($feature->slider() as $index => $link)
                    <div class="carousel-item {{ ($index == 0)?'active':'' }}">
                        <span class="overlay"></span>
                        <img class="img-fluid" src="{{ asset($link->image()) }}{{ $link->feature->dimension }}" alt="{{ $link->title }}">
                        <div class="carousel-caption d-none d-md-block align-middle pl-5 pr-5">
                            @isset($link->title)
                                <h3 class="title mb-3 animated flipInX">{{ $link->title }}</h3>
                            @endisset
                            @isset($link->summary)
                                <p class="summary animated fadeIn">{{ $link->summary }}</p>
                            @endisset
                            @isset($link->url)
                                @isset($link->label)
                                    <a href="{{ $link->url }}" class="btn-group mt-3 more animated flipInX ">

                                        <span class="btn mb-0 bg_vibrant bg_vibrant-hover">
                                            {{ $link->label }}
                                        </span>
                                        @isset($link->icon)
                                            <span class="btn mb-0 bg_vibrant_hover ">
                                                <i class="fa {{ $link->icon }}"></i>&nbsp;
                                            </span>
                                        @endisset
                                    </a>
                                @endisset
                            @endisset
                        </div>
                    </div>
                @endforeach
            </div>
            @if($feature->slider()->count() > 1)
                <a class="carousel-control-prev" href="#{{$code}}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#{{$code}}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            @endif
        </div>
    </section>
@else
    @include('web.widgets.empty')
@endif
