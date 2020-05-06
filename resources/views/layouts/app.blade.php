<!DOCTYPE html>
<html lang="tr">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="robots" content="index, follow, noodp, noydir" />
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <meta name="author" content="Bakmak Lazım">
    <meta name="geo.a3" content="İzmir">
    <meta name="geo.country" content="tr">
    <meta name="geo.placename" content="Bornova İzmir">

    <meta name="og:locale" content="tr_TR">

    @yield('metas')

    <link rel="canonical" href="{{ request()->fullUrl() }}" />
    <link href="{{ request()->fullUrl() }}" hreflang="tr" rel="alternate" />

    <link rel="shortcut icon" type="image/png" sizes="16x16" href="{{ image("/assets/images/favicon.png", 16, 16, false) }}">
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="{{ image("/assets/images/favicon.png", 32, 32, false) }}">
    <link rel="shortcut icon" type="image/png" sizes="96x96" href="{{ image("/assets/images/favicon.png", 96, 96, false) }}">

    <link rel="apple-touch-icon" type="image/png" sizes="120x120" href="{{ asset("/assets/image/apple-touch-icon.png", 120, 120, false) }}" />
    <link rel="apple-touch-icon" type="image/png" sizes="152x152" href="{{ asset("/assets/image/apple-touch-icon.png", 152, 152, false) }}" />
    <link rel="apple-touch-icon" type="image/png" sizes="167x167" href="{{ asset("/assets/image/apple-touch-icon.png", 167, 167, false) }}" />
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="{{ asset("/assets/image/apple-touch-icon.png", 180, 180, false) }}" />

    <link rel="stylesheet" href="{!! asset("assets/bootstrap/css/bootstrap.min.css") !!}">
    <link rel="stylesheet" href="{!! asset('/assets/css/bakmaklazim.min.css') . "?v=6" !!}">
    {{--
    <link rel="stylesheet" href="{!! asset('/assets/css/all.min.css') . "?v=2" !!}">
    <link rel="stylesheet" href="{!! asset('/assets/css/style.css'). "?v=6" !!}">
    <link rel="stylesheet" href="{!! asset('/assets/css/responsive.css'). "?v=2" !!}">
    <link rel="stylesheet" href="{!! asset('/assets/css/custom.css'). "?v=1" !!}">
    --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{ route('index') }}",
      "logo": "{{ url("/assets/images/logo.png") }}"
    }
    </script>

    @stack('styles')
</head>
<body>

@php
    echo \Illuminate\Support\Facades\Cache::remember('HEADER' . getBrowser(), 60 * 60 * 24 * 7, function (){
        return view('layouts.header')->render();
    });
@endphp


@yield('content')

@php
    echo \Illuminate\Support\Facades\Cache::remember('FOOTER' . getBrowser(), 60 * 60 * 24 * 7, function (){
        return view('layouts.footer')->render();
    });
@endphp


@if(env('APP_ENV') == 'prod')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164252543-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-164252543-1');
    </script>
@endif

<script src="{!! asset('/assets/js/jquery-3.4.1.min.js') !!}"></script>
<script src="{!! asset('/assets/bootstrap/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('/assets/js/scripts.min.js') . "?v=2" !!}"></script>

<script>
    var title = $('title').html();

    document.addEventListener("visibilitychange", function() {
        if (document.hidden){
            $('title').html("Okumaya devam edin...")
        } else {
            $('title').html(title)
        }
    });
</script>

@stack('scripts')
</body>
</html>
