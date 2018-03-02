<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang("admin.dashboard")</a></li>
        @foreach($crumbs as $crumb)
            @isset($crumb['href'])
                    <li class="breadcrumb-item {{ (isset($crumb['class']))?$crumb['class'] : '' }}" aria-current="page"><a href="{{ $crumb['href'] }}">{{ $crumb['title'] }}</a></li>
                @else
                    <li class="breadcrumb-item {{ (isset($crumb['class']))?$crumb['class'] : '' }}" aria-current="page">{{ $crumb['title'] }}</li>
            @endisset
        @endforeach
    </ol>
</nav>
