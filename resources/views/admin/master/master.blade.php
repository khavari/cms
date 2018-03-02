<!DOCTYPE html>
<html lang="en" dir="ltr">

{{-- Dashboard head section --}}
{{------------------------------------------------------------}}
@include('admin.master.head')

<body class="skin-blue sidebar-mini">
<div class="wrapper">

    {{-- Dashboard top navbar section --}}
    {{------------------------------------------------------------}}
    @include('admin.master.navbar')

    {{-- Dashboard sidebar section --}}
    {{------------------------------------------------------------}}
    @include('admin.master.sidebar')

    {{-- Dashboard content wrapper section --}}
    {{------------------------------------------------------------}}
    <div class="content-wrapper">
        @include('admin.master.messages')
        @yield('content')
    </div>

    {{-- Dashboard footer section --}}
    {{------------------------------------------------------------}}
    @include('admin.master.footer')

    {{-- Dashboard control section --}}
    {{------------------------------------------------------------}}
    @include('admin.master.control')

</div>

{{-- Dashboard script section --}}
{{------------------------------------------------------------}}
@include('admin.master.script')

</body>
</html>
