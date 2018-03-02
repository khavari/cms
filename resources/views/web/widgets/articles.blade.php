{{-- articles-rtl.scss articles-ltr.scss --}}
<section class="articles" id="articles">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title">
                    @lang('lorem.4')
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-area">
                    <form action="#" method="get" class="form form-control">
                        <select name="" class="last-products " id="">
                            <option>@lang('lorem.3')</option>
                            <option>@lang('lorem.3')</option>
                            <option>@lang('lorem.3')</option>
                            <option>@lang('lorem.3')</option>

                        </select>
                        <select name="" class="all-categories" id="">
                            <option>@lang('lorem.3')</option>
                            <option>@lang('lorem.3')</option>
                            <option>@lang('lorem.3')</option>
                            <option>@lang('lorem.3')</option>

                        </select>
                        <button type="submit" class="btn btn-danger">@lang('lorem.3')</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="articles">
            <div class="row">
                @for($i = 0 ; $i < 6; $i++ )
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 ">
                        <div class="articles-box">

                            <a href="#">

                                <div class="image">

                                    <img src="https://roocket.ir/public/image/2017/7/26/angular-1.png" class="img-fluid" alt="">
                                    <div class="overlay-img"></div>

                                </div>
                            </a>
                            <div class="article-footer">
                    <span class="created_at">
                       <i class="fa fa-clock-o"></i>
                         10:25:23
                    </span>
                                <span class="comments-qty">
                        <i class="fa fa-comment-o"></i>
                        comments
                    </span>
                                <span class="view-count">
                        <i class="fa fa-eye"></i>
                        170
                    </span>

                            </div>
                            <div class="article-body">
                                <h5 class="title">@lang('lorem.lorem')</h5>
                                <div class="summary">
                                    <p>@lang('lorem.15')</p>
                                    <div class="btn-area">
                                        <a href="" class="btn-more">@lang('lorem.1')</a>
                                        <div class="overlay-btn"></div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>
