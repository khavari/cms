@inject('feature', 'App\Feature')
<footer id="footer" class="footer bg_dark border_bg_dark">

    @if($feature->footer())
        <div class="container">
            <div class="row">
                @foreach($feature->footer() as $link)
                    @if($link->hasChildren())
                        <div class="col-md-6 col-lg-3 mb-3">
                            <h6 class="title border_bg_dark">
                                <span class="border_vibrant">{{ $link->title }}</span>
                            </h6>
                            @foreach($link->children()->active()->orderBy('order')->get() as $item)
                                <a href="{{ $item->url }}" class="link">
                                    <i class="fa {{ $item->icon() }} text_vibrant"></i><span>{{ $item->title }}</span></a>
                            @endforeach
                        </div>
                    @endif
                @endforeach
                <div class="col-md-3 d-none">
                    <h6 class="title border_bg_dark">
                        <span class="border_vibrant">@lang('lorem.2')</span>
                    </h6>

                    <form action="{{ url('/') }}" method="post">
                        <div class="input-group border_bg_dark">
                        <span class="input-group-btn">
                            <button class="btn bg_border_dark" type="submit">@lang('web.submit')</button>
                        </span>
                            <input type="email" class="email form-control" required placeholder="Email" name="email">
                        </div>
                    </form>

                    <a href="#" class="link"><i
                                class="fa fa-envelope-o text_vibrant"></i><span>khavari.mvc@gmail.com</span></a>
                    <a href="#" class="link"><i class="fa fa-angle-left text_vibrant"></i><span>@lang('lorem.3')</span></a>

                    <div class="social-area">
                        @if(setting('facebook'))
                            <a href="{{ url(setting('facebook')) }}" class="social border_vibrant" target="_blank" rel="nofollow"
                               title="@lang('web.facebook')">
                                <span class="fa fa-facebook"></span>
                            </a>
                        @endif
                        @if(setting('instagram'))
                            <a href="{{ url(setting('instagram')) }}" class="social border_vibrant" target="_blank" rel="nofollow"
                               title="@lang('web.instagram')">
                                <span class="fa fa-instagram"></span>
                            </a>
                        @endif
                        @if(setting('twitter'))
                            <a href="{{ url(setting('twitter')) }}" class="social border_vibrant" target="_blank" rel="nofollow"
                               title="@lang('web.twitter')">
                                <span class="fa fa-twitter"></span>
                            </a>
                        @endif
                        @if(setting('google_plus'))
                            <a href="{{ url(setting('google_plus')) }}" class="social border_vibrant" target="_blank" rel="nofollow"
                               title="@lang('web.google_plus')">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        @endif
                        @if(setting('linkedin'))
                            <a href="{{ url(setting('linkedin')) }}" class="social border_vibrant" target="_blank" rel="nofollow"
                               title="@lang('web.linkedin')">
                                <span class="fa fa-linkedin"></span>
                            </a>
                        @endif
                        @if(setting('github'))
                            <a href="{{ url(setting('github')) }}" class="social border_vibrant" target="_blank" rel="nofollow"
                               title="@lang('web.github')">
                                <span class="fa fa-github"></span>
                            </a>
                        @endif
                        @if(setting('telegram'))
                            <a href="{{ url(setting('telegram')) }}" class="social border_vibrant" target="_blank" rel="nofollow"
                               title="@lang('web.telegram')">
                                <span class="fa fa-telegram"></span>
                            </a>
                        @endif

                        @if(setting('youtube'))
                            <a href="{{ url(setting('youtube')) }}" class="social border_vibrant" target="_blank" rel="nofollow"
                               title="@lang('web.youtube')">
                                <span class="fa fa-youtube"></span>
                            </a>
                        @endif

                        @if(setting('aparat'))
                            <a href="{{ url(setting('aparat')) }}" class="social border_vibrant" target="_blank" rel="nofollow"
                               title="@lang('web.aparat')">
                                <span class="fa fa-file-video-o"></span>
                            </a>
                        @endif


                    </div>

                </div>
            </div>
        </div>
    @endif
    <div id="footer-bottom" class="bg_dark_hover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-8">
                    <p class="copyright">{{ setting('copyright') }}</p>
                </div>
                @if(setting('logo'))
                    <div class="col-12 col-sm-4 col-md-4 d-none d-sm-block">
                        <div class="footer-logo">
                            <img src="{{ asset(setting('logo')) }}" alt="{{ setting('title') }}">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</footer>
