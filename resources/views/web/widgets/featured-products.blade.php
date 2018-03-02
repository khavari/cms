{{-- featured-products-rtl.scss -featured-products-ltr.scss --}}
<section id="featured-products" class="featured-products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title">
                    @lang('lorem.4')
                </h3>
            </div>
        </div>
        <div class="row">
            @for($i=0;$i<6;$i++)
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="entity">
                        <a href="javascript:void(0)">
                            <div class="image">
                                <img src="{{ asset('assets/web/img/thumb1.jpg') }}" alt="thumbnail" class="img-fluid">
                            </div>
                            <h4 class="caption">@lang('lorem.8')</h4>
                            <p class="summary">@lang('lorem.lorem')</p>
                        </a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
