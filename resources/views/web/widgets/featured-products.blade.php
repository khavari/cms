{{-- featured-products-rtl.scss -featured-products-ltr.scss --}}
<?php

        $products = [
            'https://file.digi-kala.com/Digikala/Image/Webstore/Product/P_326132/Dxracer-King-Series-OH-KS06-NB-Leather-Gaming-Chair-ed398f.jpg',
            'https://file.digi-kala.com/Digikala/Image/Webstore/Product/P_322988/Dxracer-Racing-Series-OH-RV131-NW-Leather-Gaming-Chair-e489dc.jpg',
            'https://file.digi-kala.com/digikala/Image/Webstore/Product/P_327327/Dxracer-Boss-Series-OH-BF120-NC-Leather-Office-Chair-69c5c3.jpg',
            'https://file.digi-kala.com/digikala/Image/Webstore/Product/P_438539/Arkano-D550A-Leather-Chair-7a3cac.jpg',
            'https://file.digi-kala.com/digikala/Image/Webstore/Product/P_326496/Dxracer-Origin-Series-OH-OC168-N-Leather-and-Mesh-Gaming-Chair-02dca6.jpg',
            'https://file.digi-kala.com/digikala/Image/Webstore/Product/P_445839/Novin-System-2015-Leather-Chair-519a62.jpg',
            'https://file.digi-kala.com/digikala/Image/Webstore/Product/P_327327/Dxracer-Boss-Series-OH-BF120-NC-Leather-Office-Chair-69c5c3.jpg',
            'https://file.digi-kala.com/Digikala/Image/Webstore/Product/P_326132/Dxracer-King-Series-OH-KS06-NB-Leather-Gaming-Chair-ed398f.jpg',
        ];
        ?>
<section id="featured-products" class="featured-products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="caption mt-5 mb-5">
                    @lang('lorem.4')
                </h3>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="entity mb-4">
                            <a href="" class="wp-img">
                                <img src="{{$product}}" alt="thumbnail" class="img-fluid">
                            </a>

                            <div class="wp-title">
                                <a href="" class="title" title="@lang('lorem.8')">@lang('lorem.8')</a>
                            </div>

                        <div class="detail">

                            <div class="price">
                                <span class="final-price">{{ number_format(500 * rand(50,700)) }} @lang('web.toman')</span>
                                <span class="old-price">{{ number_format(500 * rand(50,700)) }}</span>
                            </div>


                                <button href="" class="discount bg_vibrant text_bg_vibrant bg_vibrant-hover text_bg_vibrant_hover">40 % @lang('web.discount')</button>





                        </div>



                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
