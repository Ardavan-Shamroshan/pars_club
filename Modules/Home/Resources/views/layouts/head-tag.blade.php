<meta charset="utf-8">
<meta name="keywords" content="HTML5 Template">
<meta name="description" content="SportsCup - Bootstrap 4 Theme for Soccer And Sports">
<meta name="author" content="iwthemes.com">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- IMPORTANT!!! remember CSRF token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="{{ asset('modules/home/assets/fontawesome/css/all.min.css') }}" rel="stylesheet" media="screen">

<!-- CSS only -->
<link rel="stylesheet" href="{{ asset('modules/admin/assets/plugins/bootstrap/css/bootstrap.rtl.min.css') }}"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->

<!-- Favicon -->
<link rel="icon" href="{{ asset($setting->logo) }}" type="image/x-icon" /><!-- Icons css -->
<link href="{{ asset('modules/admin/assets/plugins/icons/icons.css') }}" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('modules/admin/assets/css-rtl/style.css') }}">
<link href="{{ asset('modules/home/assets/css/main0.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('modules/home/assets/css/main.css') }}" rel="stylesheet" media="screen">

<!--  Right-sidemenu css -->
<link href="{{ asset('modules/admin/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">


{!! htmlScriptTagJsApi() !!}