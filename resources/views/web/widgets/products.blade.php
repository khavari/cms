{{-- featured-products-rtl.scss -featured-products-ltr.scss --}}
<section id="featured-products" class="featured-products">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url(app()->getLocale()) }}">@lang('web.home')</a>
                        </li>
                        <li class="breadcrumb-item">{{ $category->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="entity mb-4">
                        <a href="{{ $product->url() }}" title="{{ $product->title }}" class="wp-img">
                            <img src="{{ asset('media/'.$product->image) }}?w=400&h=400&fit=crop"
                                 alt="{{ $product->title }}" class="img-fluid">
                        </a>
                        <div class="wp-title">
                            <a href="{{ $product->url() }}" class="title"
                               title="{{ $product->title }}">{{ $product->title }}</a>
                        </div>
                        <div class="detail">
                            @if($product->available)
                                <div class="price">
                                    <span class="final-price">{{ number_format($product->price()) }} @lang('web.toman')</span>
                                    <span class="old-price">{{ number_format($product->old_price) }}</span>
                                </div>
                            @endif
                            @if($product->available)
                                @if($product->discount())
                                    <span class="discount bg_vibrant text_bg_vibrant bg_vibrant-hover text_bg_vibrant_hover">{{ number_format($product->discount()) }} @lang('web.discount')</span>
                                @else
                                @endif
                            @else
                                <span class="discount bg_vibrant text_bg_vibrant bg_vibrant-hover text_bg_vibrant_hover">@lang('web.unavailable')</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

                @if($products->hasPages())
                        {{$products->appends($_GET)->links()}}
                @endif


        </div>
    </div>
</section>
