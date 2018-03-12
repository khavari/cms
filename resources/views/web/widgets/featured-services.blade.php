{{-- featured-services-rtl.scss -featured-services-ltr.scss --}}
<section id="featured-services" class="featured-services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <h3 class="title mb-3 mt-3">@lang('web.featured_services')</h3>

            </div>
        </div>
        <div class="row">
           @for($i=0;$i<6;$i++)
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="services-item">
                    <div class="image">
                        <a href="#">
                       <img src="http://www.backgroundscreeningservices.com/wp-content/uploads/2015/01/background-screening-employment-verification-services-icon-2-180x180.png"
                            alt="" class="img-fluid">
                        </a>
                    </div>
                        <div class="body">
                            <a href="#"> <h6 class="title">@lang('lorem.5')</h6> </a>
                            <div class="txt">@lang('lorem.15')</div>
                        </div>

                </div>
            </div>
            @endfor
        </div>
    </div>
</section>
