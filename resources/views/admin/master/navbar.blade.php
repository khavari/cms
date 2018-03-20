<?php
$admin_title_characters = explode(' ', setting('admin.title'));
$admin_title = '';
for ($i = 0; $i < count($admin_title_characters); $i++) {
    $admin_title .= mb_substr($admin_title_characters[$i], 0, 1) . '&zwnj;';
}
?>

<header class="main-header">
    <a href="{{ url(app()->getLocale()) }}" class="logo" target="_blank">
        <span class="logo-mini">{{ $admin_title }}</span>
        <span class="logo-lg">{{ setting('admin.title') }}</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="font-size: 15px;">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu hidden">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <ul class="menu">
                                @for($i = 0 ; $i < 3 ; $i++)
                                    <li>
                                        <a href="">
                                            <h4>@lang('dashboard::lorem.4')</h4>
                                            <p>@lang('dashboard::lorem.6')</p>
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </li>
                        <li class="footer"><a href="#">@lang("dashboard::messages.seeAllMessages")</a></li>
                    </ul>
                </li>


                {{------------ Language  ------------}}
                <li class="dropdown notifications-menu language-menu">
                    <a href="" class="dropdown-toggle text-uppercase active" data-toggle="dropdown"
                       aria-expanded="true">
                        <img src="{{ asset(locale('flag')) }}" width="25">
                        &nbsp;
                        <span class="text-ltr">{{ locale('key') }}</span>
                    </a>
                    @if(count(locale('keys')) > 1)
                        <ul class="dropdown-menu">
                            <li>
                                <ul class="menu">
                                    @foreach(locale('all') as $locale)
                                        @if($locale['key'] != locale('key'))
                                            <li>
                                                <a href="{{ route('admin.languages',['lang'=> $locale['key']]) }}">
                                                    <img src="{{ asset($locale['flag']) }}" width="25">
                                                    <span>{{ $locale['name'] }}</span>
                                                    <b class="lang text-ltr">{{ $locale['key'] }}</b>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    @endif
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset(auth()->user()->avatar()) }}?w=120&h=120&fit=crop" class="user-image" alt="User Image">
                        <span class="hidden-xs text-ltr">{{ auth()->user()->email }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset(auth()->user()->avatar()) }}?w=120&h=120&fit=crop" class="img-circle"
                                 alt="User Image">
                            <p>{{ auth()->user()->name }}</p>
                        </li>
                        <!-- Menu Body -->
                    {{--<li class="user-body hidden">--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#"></a>--}}
                    {{--</div>--}}
                    {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#"></a>--}}
                    {{--</div>--}}
                    {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#"></a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('admin.users.edit',['id'=>auth()->user()->id]) }}" class="btn btn-default btn-flat">@lang('admin.profile')</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                   class="btn btn-default btn-flat"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('admin.logout')</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                {{--<li>--}}
                {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
            </ul>

        </div>
    </nav>
</header>
