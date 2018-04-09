@inject('feature', 'App\Feature')
<header>
    <div class="bootstrap-navbar-sticky" id="bootstrap-navbar-sticky">
        <div class="top-header ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="socials">
                            <ul>
                                @if(setting('facebook'))
                                    <li>
                                        <a href="{{ url(setting('facebook')) }}" class="facebook" target="_blank" rel="nofollow">
                                            <span class="fa fa-facebook"></span>
                                            <span class="txt-social">Facebook</span>
                                        </a>
                                    </li>
                                @endif
                                @if(setting('instagram'))
                                    <li>
                                        <a href="{{ url(setting('instagram')) }}" class="instagram" target="_blank" rel="nofollow">
                                            <span class="fa fa-instagram"></span><span
                                                    class="txt-social">instagram</span>
                                        </a>
                                    </li>
                                @endif
                                @if(setting('twitter'))
                                    <li>
                                        <a href="{{ url(setting('twitter')) }}" class="twitter" target="_blank" rel="nofollow">
                                            <span class="fa fa-twitter"></span><span class="txt-social">twitter</span>
                                        </a>
                                    </li>
                                @endif
                                @if(setting('google_plus'))
                                    <li>
                                        <a href="{{ url(setting('google_plus')) }}" class="google-plus" target="_blank" rel="nofollow">
                                            <span class="fa fa-google-plus"></span><span
                                                    class="txt-social">Google Plus</span>
                                        </a>
                                    </li>
                                @endif
                                @if(setting('linkedin'))
                                    <li>
                                        <a href="{{ url(setting('linkedin')) }}" class="linkedin" target="_blank" rel="nofollow">
                                            <span class="fa fa-linkedin"></span><span class="txt-social">linkedin</span>
                                        </a>
                                    </li>
                                @endif
                                @if(setting('github'))
                                    <li>
                                        <a href="{{ url(setting('github')) }}" class="git" target="_blank" rel="nofollow">
                                            <span class="fa fa-github"></span><span class="txt-social">git</span>
                                        </a>
                                    </li>
                                @endif
                                @if(setting('telegram'))
                                    <li>
                                        <a href="{{ url(setting('telegram')) }}" class="telegram" target="_blank" rel="nofollow">
                                            <span class="fa fa-telegram"></span><span class="txt-social">telegram</span>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="number">
                            <ul>
                                @if(auth()->check())
                                    <li><a href="{{ route('profile') }}">
                                            <i class="fa fa-user"></i>{{ auth()->user()->name }}</a></li>
                                    <li><a href="#"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit()"><i
                            class="fa fa-sign-in"></i>Logout</a></li>

                                    <form id="logout-form"
                                          action="{{ route('logout') }}" method="POST" class="d-none">
                                        {{ csrf_field() }}
                                    </form>
                                @else
                                    <li>
                                        <a href="{{ route('login') }}"><i class="fa fa-sign-out"></i>@lang('web.login')
                                        </a>
                                    </li>
                                @endif

                                {{------------ Language  ------------}}
                                @if(count(locale('keys')) > 1)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                           data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">{{ locale('key') }}<span
                                                    class="fa fa-angle-down"></span>
                                        </a>
                                        <div class="dropdown-menu p-0 flags-menu border_vibrant">

                                            @foreach(locale('all') as $locale)
                                                @if($locale['key'] != locale('key'))
                                                    <a class="nav-link dropdown-item" href="{{ url($locale['key']) }}">
                                                        <span class="d-none d-sm-inline-block">{{ $locale['name'] }} </span>
                                                        <i>{{ $locale['key'] }}</i>
                                                        <img src="{{ asset($locale['flag']) }}" alt="">
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                @endif
                                <li><a href="#" class="submit" data-toggle="modal"
                                       data-target="#search-modal">
                                        <span class="fa fa-search"></span></a></li>
                            </ul>
                        </div>


                        <div class="form-area">
                                <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="search-modallLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="search-modallLabel">@lang('web.search')</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('search') }}" method="get">
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control search mt-3" placeholder="@lang('web.search_in_site')" name="q" required>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary">@lang('web.search')</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="main-header ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-9">
                        <h1 class="title">{{ setting('title') }}</h1>
                        <p class="brief">{{ setting('brief') }}</p>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="logo">
                            <a href="{{ url(app()->getLocale()) }}"><img src="{{ asset(setting('logo')) }}" alt="{{ setting('title') }}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="sticky-top" class="navigation sticky-top height-center">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav line-height">
                    @foreach($feature->navbar() as $link)
                        @if($link->hasChildren())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $link->title }}<span class="fa fa-angle-down"></span>
                                </a>
                                <div class="dropdown-menu p-0 submenu" >
                                    @foreach($link->children()->active()->orderBy('order')->get() as $item)
                                        @if($item->isExternal())
                                            <a class="dropdown-item" target="_blank" rel="nofollow" href="{{ url($item->url()) }}">{{ $item->title }}</a>
                                        @else
                                            <a class="dropdown-item" href="{{ url($item->url()) }}">{{ $item->title }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li class="nav-item active">
                                @if($link->isExternal())
                                    <a class="nav-link" target="_blank" rel="nofollow" href="{{ url($link->url()) }}">{{ $link->title }}</a>
                                @else
                                    <a class="nav-link" href="{{ url($link->url()) }}">{{ $link->title }}</a>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

        </nav>

    </div>
</div>






