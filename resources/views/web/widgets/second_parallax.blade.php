@inject('feature', 'App\Feature')
<?php $link = collect($feature->parallax())->first(function($link,$index){
    return $index === 1;
}); ?>

@if($feature->parallax()->count() >= 2)
    <section class="parallax justify-content-center d-flex align-items-center" id="second_parallax" style="background-image: url({{ asset($link->image) }});">
        <div class="row">
            <div class="col-12">
                <h3 class="title">{{ $link->title }}</h3>
                <div class="content">
                    <p>{{ $link->summary }}</p>
                </div>
                @isset($link->url)
                    @isset($link->label)
                        <a href="{{ $link->url }}" class="btn-group mt-3 more animated flipInX">

                                <label class="btn mb-0 bg_vibrant bg_vibrant-hover">
                                    {{ $link->label }}
                                </label>

                            @isset($link->icon)
                                <label class="btn mb-0 bg_vibrant_hover">
                                    <i class="fa {{ $link->icon }}"></i>&nbsp;
                                </label>
                            @endisset
                        </a>
                    @endisset
                @endisset
            </div>
        </div>
    </section>
@else
    @include('web.widgets.empty')
@endif
