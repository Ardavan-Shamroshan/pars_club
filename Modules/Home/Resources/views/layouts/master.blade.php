<!DOCTYPE html>
<html lang="en">

<head>
    {{-- head tags --}}
    @include('home::layouts.head-tag')
    @yield('head-tag')

    {{-- title --}}
    <title>@yield('title', 'باشگاه فوتبال پارس برازجان')</title>
</head>

<body>

    {{-- header --}}
    @include('home::layouts.header')

    <div id="layout" class="container">

        @yield('content')

        {{-- footer --}}
        @include('home::layouts.footer')

        @include('home::layouts.copyright')
    </div>

    {{-- script --}}
    @include('home::layouts.script')
    @yield('script')


    {{-- sweetalert2 from realrashid.github.io --}}
    @include('sweetalert::alert')
</body>
</html>