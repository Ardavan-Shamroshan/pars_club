<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    {{-- head tags --}}
    @include('auth::layouts.head-tag')
    @yield('head-tag')

    {{-- title --}}
    <title>@yield('title', 'قالب مدیریتی ولکس')</title>

</head>

<body class="main-body">

    <!-- Loader -->
    @include('auth::layouts.loader')
    <!-- /Loader -->

    @yield('content')

    {{-- scripts --}}
    @include('admin::layouts.scripts')
    @yield('script')

    {{-- sweetalert2 from realrashid.github.io --}}
    @include('sweetalert::alert')
</body>

</html>

