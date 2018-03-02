{{--owl-carousel-slide-rtl.scss--owl-carousel-slide-ltr.scss--}}
@inject('feature', 'App\Feature')
@if($feature->customers()->count())
    <section class="owl-carusel-slide" id="owl-carousel-slide">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme ltr">
                    @foreach($feature->customers() as $index => $link)
                        <div class="item animated fadeIn border_vibrant">
                            <a href="{{ $link->url }}">
                                <img src="{{ asset($link->image()) }}?w=300&h=300&fit=crop" alt="{{ $link->title }}" class="img-fluid animated fadeIn">
                                <p class="owl-text">{{ $link->title }}</p>
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
