<?php $menus = new \App\Http\Utilities\DashboardMenu(); ?>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(auth()->user()->avatar()) }}?w=120&h=120&fit=crop" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p class="text-ltr">{{ auth()->user()->email }}</p>
                <a href="#" class="text-ltr"><i class="fa fa-circle text-success"></i> {{ auth()->user()->role()->first()->slug }}</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="@lang('admin.search')..">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            @foreach($menus->get() as $index => $menus)
                @if(isset($menus['children']))
                    <li class="treeview {{ str_contains($menus['url'], request()->segment(3))?'active':'' }} {{ (in_array(request()->url() , collect($menus['children'])->pluck('url')->toArray()))?'active':'' }}">
                        <a href="#">
                            <i class="fa {{ $menus['icon'] }}"></i> <span>{{ $menus['title'] }}</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>

                        <ul class="treeview-menu">
                            @foreach($menus['children'] as $link)
                                <li class="{{ (strpos($link['url'], request()->segment(4)) !== false || $link['url'] ==  request()->url() )?'active':'' }}">
                                    <a href="{{ $link['url'] }}"><i
                                                class="fa {{ $link['icon'] }}"></i> {{ $link['title'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                @else
                    <li class="{{ str_contains($menus['url'], request()->segment(3))?'active':'' }}">
                        <a href="{{ $menus['url'] }}" target="{{ $menus['target'] or '_self' }}">
                            <i class="fa {{ $menus['icon'] }}"></i> <span>{{ $menus['title'] }}</span>
                            @if(isset($menus['count']))
                                <span class="pull-right-container"><small
                                            class="label pull-right bg-green">{{ $menus['count'] }}</small></span>
                            @endif
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </section>
</aside>
