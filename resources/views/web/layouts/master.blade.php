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

@if(str_contains(setting('analytics'),'-') && strlen(setting('analytics')) > 8)
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', '{{ setting('analytics') }}', 'auto');
      ga('send', 'pageview');
    </script>
@endif
