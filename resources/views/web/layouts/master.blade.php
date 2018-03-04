<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ locale('dir') }}">
@include('web.layouts.head')
<body class="bg_body">

{{-- Web header section --}}
{{------------------------------------------------------------}}
@include('web.layouts.header')

{{-- Web content wrapper section --}}
{{------------------------------------------------------------}}
@yield('content')

{{-- Web footer section --}}
{{------------------------------------------------------------}}
@include('web.layouts.footer')

{{-- Web script section --}}
{{------------------------------------------------------------}}
@include('web.layouts.script')

</body>
</html>
