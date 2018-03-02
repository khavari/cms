{{-- featured-services-rtl.scss -featured-services-ltr.scss --}}
<section id="featured-services" class="featured-services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-featured-services">
                    <h3 class="title">@lang('lorem.3')</h3>
                </div>

            </div>
        </div>
        <div class="row">
            @for($i=0;$i<6;$i++)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="services-item">
                        <div class="image">
                            <img src="assets/web/img/featured-services-1.jpg" class="img-fluid">
                            <div class="overlay-img"></div>
                        </div>

                        <div class="content">
                            <div class="body-item">
                                <span><i class="fa fa-gear"></i></span>
                                <h6 class="title">@lang('lorem.1')</h6>
                                <div class="txt">@lang('lorem.8')</div>
                            </div>
                            <div class="footer-item">
                                <a href="#" class="more">@lang('lorem.1')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
