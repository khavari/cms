{{-- featured-products-rtl.scss -featured-products-ltr.scss --}}
@inject('model', 'App\Product')
<?php $products = $model->featured_products(); ?>

<section id="products" class="featured-products pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="caption mt-5 mb-5">
                    @lang('web.featured_products')
                </h3>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="{{ setting('product_grid') }}">
                    <div class="entity">
                        <a href="{{ $product->url() }}" title="{{ $product->title }}" class="wp-img">
                            <img src="{{ asset($product->thumbnail()) }}"
                                 alt="{{ $product->title }}" class="img-fluid">
                        </a>
                        <div class="wp-title">
                            <a href="{{ $product->url() }}" class="title"
                               title="{{ $product->title }}">{{ $product->title }}</a>
                        </div>
                        <div class="detail">
                            @if($product->available)
                                <div class="price">
                                    <span class="final-price">{{ number_format($product->price()) }} {{ setting('currency') }}</span>
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
        </div>
    </div>
</section>
