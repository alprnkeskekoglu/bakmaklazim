<!DOCTYPE html>
<html lang="tr">
<head>

    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("/assets/images/favicon.png") }}">


    <link rel="stylesheet" href="{!! asset("assets/css/animate.css") !!}">
    <link rel="stylesheet" href="{!! asset("assets/bootstrap/css/bootstrap.min.css") !!}">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{!! asset('/assets/css/all.min.css') . "?v=1" !!}">
    <link rel="stylesheet" href="{!! asset('/assets/css/style.css'). "?v=6" !!}">
    <link rel="stylesheet" href="{!! asset('/assets/css/responsive.css'). "?v=1" !!}">
    <link rel="stylesheet" href="{!! asset('/assets/css/custom.css'). "?v=2" !!}">
    @stack('styles')
</head>
<body>
@include('layouts.header')

@yield('content')

@include('layouts.footer')


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164252543-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-164252543-1');
</script>

<script src="{!! asset('/assets/js/jquery-1.12.4.min.js') !!}"></script>
<script src="{!! asset('/assets/bootstrap/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('/assets/js/jquery.appear.js') !!}"></script>
<script src="{!! asset('/assets/js/jquery.parallax-scroll.js') !!}"></script>
<script src="{!! asset('/assets/js/scripts.js') . "?v=1" !!}"></script>

@stack('scripts')
</body>
</html>
