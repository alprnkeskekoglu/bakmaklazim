@php
    $categories = \Dawnstar\Models\Category::where('status', 1)
        ->orderBy('order')
        ->get();
@endphp
<header class="header_wrap dark_skin fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img class="logo_dark" src="{{ asset("/assets/images/logo.png") }}" alt="{{env('APP_NAME')}}"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li><a class="nav-link nav_item" href="{{ route('index') }}">Anasayfa</a></li>
                    <li><a class="nav-link nav_item" href="{{ route('blog.index') }}">Blog Yazıları</a></li>
                    @if($categories->isNotEmpty())
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="{{ route('category.index') }}">Kategoriler</a>
                            <div class="dropdown-menu">
                                <ul>
                                    @foreach($categories as $category)
                                        <li><a class="dropdown-item nav-link nav_item"
                                               href="{!! $category->url !!}">{!! $category->name !!}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
            <ul class="navbar-nav attr-nav align-items-center">
                <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="fa fa-search"></i></a>
                    <div class="search_wrap">
                        <span class="close-search"><i class="fa fa-times"></i></span>
                        <form action="{{ route('search') }}" method="get">
                            <input type="text" placeholder="Arama" class="form-control" name="q">
                            <button type="submit" class="search_icon"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
