<head>
    <title>{{ (isset($seo['title']))?$seo['title']:'' }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ (isset($seo['description']))?$seo['description']:'' }}">
    <meta name="keywords" content="{{ (isset($seo['keywords']))?$seo['keywords']:'' }}">
    <meta name="image" content="{{ (isset($seo['image']))?$seo['image']:'' }}">
    <meta property="og:title" content="{{ (isset($seo['title']))?$seo['title']:'' }}">
    <meta name="og:description" content="{{ (isset($seo['description']))?$seo['description']:'' }}">
    <meta name="og:image" content="{{ (isset($seo['image']))?$seo['image']:'' }}">
    <meta property="og:type" content="{{ (isset($seo['type']))?$seo['type']:'website' }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:site_name" content="{{ setting('robots') }}" >
    <meta property="og:locale" content="{{ app()->getLocale() }}">
    <meta name="robots" content="{{ (setting('robots'))?setting('robots'):'index,follow' }}">
    <link rel="shortcut icon" href="{{ asset(setting('favicon')) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="{{ setting('color.bg_vibrant') }}">
    <meta name="apple-mobile-web-app-status-bar-style" content="{{ setting('color.bg_vibrant') }}">
    <link rel="stylesheet" href="{{asset('assets/web/css/web-'.locale('dir').'.css')}}">
    <link rel="stylesheet" href="{{asset('assets/web/css/skin-'.app()->getLocale().'.css')}}?id={{ setting('color.fresh') }}">
    @yield('style')
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
