{{--owl-carousel-slide-rtl.scss--owl-carousel-slide-ltr.scss--}}
@inject('feature', 'App\Feature')
@php $links = $feature->customers() @endphp
@if($feature->customers()->count())
    <section class="owl-carusel-slide pt-5 pb-5" id="owl-carousel-slide">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if($links->first()->feature->title)
                        <h3 class="title">{{ $links->first()->feature->title }}</h3>
                    @endif
                    @if($links->first()->feature->summary)
                        <p class="text-center">{{ $links->first()->feature->summary }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="customer-carousel owl-carousel owl-theme ltr">
                    @foreach($links as $index => $link)
                        <div class="item">
                            <a href="{{ $link->url }}">
                                <img src="{{ asset($link->image()) }}{{ $link->feature->dimension }}" alt="{{ $link->title }}" class="img-fluid animated fadeIn">
                                <h6 class="owl-text">{{ $link->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@else
    @include('web.widgets.empty')
@endif
