<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Dawnstar</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex, nofollow">

    <link rel="shortcut icon" href="{{asset('vendor/dawnstar/assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"
          href="{{asset('vendor/mediapress/assets/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{asset('vendor/mediapress/assets/media/favicons/apple-touch-icon-180x180.png')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    @stack('styles')
    <link rel="stylesheet" id="css-main" href="{{asset('vendor/dawnstar/assets/css/dashmix.min.css')}}">
</head>
<body>

<div id="page-container"
     class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow sidebar-o sidebar-mini">

    @include('Dawnstar::layouts.header')

    @yield('content')

    @include('Dawnstar::layouts.footer')

</div>


<script src="{{asset('vendor/dawnstar/assets/js/dashmix.core.min.js')}}"></script>
<script src="{{asset('vendor/dawnstar/assets/js/dashmix.app.min.js')}}"></script>
<script src="{{asset('vendor/dawnstar/assets/js/custom.js')}}"></script>
@stack('scripts')
</body>
</html>
