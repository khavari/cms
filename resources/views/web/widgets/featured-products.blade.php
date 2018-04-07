{{-- featured-products-rtl.scss -featured-products-ltr.scss --}}
@inject('model', 'App\Product')
<?php $products = $model->featured_products(); ?>

<section id="featured-products" class="featured-products">
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
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="entity mb-4">
                            <a href="{{ $product->url() }}" title="{{ $product->title }}" class="wp-img">
                                <img src="{{ asset('media/'.$product->image) }}?w=400&h=400&fit=crop" alt="{{ $product->title }}" class="img-fluid">
                            </a>
                            <div class="wp-title">
                                <a href="{{ $product->url() }}" class="title" title="{{ $product->title }}">{{ $product->title }}</a>
                            </div>
                        <div class="detail">
                            <div class="price">
                                <span class="final-price">{{ number_format($product->price()) }} @lang('web.toman')</span>
                                <span class="old-price">{{ number_format($product->price()) }}</span>
                            </div>
                            <button href="" class="discount bg_vibrant text_bg_vibrant bg_vibrant-hover text_bg_vibrant_hover">40 % @lang('web.discount')</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
