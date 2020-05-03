@extends('layouts.app')

@section('title'){!! env('APP_NAME') !!}@endsection
@section('description'){!! "Bakmak Lazım, kendine değer katmak ve gündeme dair konularda söz sahibi olmak isteyenler için. Kolayca erişin. Hemen okuyun." !!}@endsection
@section('keywords'){{ "bakmak lazım,blog,nedir,teknoloji,gündem,eğitim" }}@endsection


@section('metas')
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ env('APP_NAME')}}"/>
    <meta property="og:description" content="{!! "Bakmak Lazım, kendine değer katmak ve gündeme dair konularda söz sahibi olmak isteyenler için. Kolayca erişin. Hemen okuyun." !!}"/>
    <meta name="url" property="og:url" content="{!! route('index') !!}"/>
    <meta name="image" property="og:image" content="{!! image("/assets/images/full_logo.png", 1200, 630, false) !!}"/>

    <meta name="twitter:card" content="summary_large_image"/>
    <meta property="twitter:title" content="{{ env('APP_NAME')}}"/>
    <meta property="twitter:description" content="{!! "Bakmak Lazım, kendine değer katmak ve gündeme dair konularda söz sahibi olmak isteyenler için. Kolayca erişin. Hemen okuyun." !!}"/>
    <meta name="twitter:image" content="{!! image("/assets/images/twitter_logo.png", 1000, 1000, false) !!}"/>
@endsection

@php
    $inspire = getRandomInspire();
@endphp

@section('content')

    @if(1==0)
        <div id="preloader">
            <div class="sk-folding-cube">
                <div class="mb-4">
                    <span>Yükleniyor...</span>
                </div>
                <div class="sk-folding-cube-box">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                setTimeout(function () {
                    $("#preloader").delay(300).fadeOut(400).addClass('loaded');
                }, 700);
            </script>
        @endpush
    @endif
    <h1 hidden>Bakmak Lazım</h1>
    <div class="banner_section staggered-animation-wrap slide_small">
        <div class="item background_bg overlay_bg_60" data-img-src="{!! image($lastBlog->cover) !!}">
            <div class="banner_slide_content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-8 col-sm-12">
                            <div class="banner_content">
                                <div class="blog_tags">
                                    <a class="blog_tags_cat"
                                       style="background-color: {{optional($lastBlog->category)->color ?: "#4382FF"}}"
                                       href="{!! optional($lastBlog->category)->url !!}">
                                        {!! optional($lastBlog->category)->name !!}
                                    </a>
                                </div>
                                <h2>
                                    <a class="text-white" href="{!! $lastBlog->url !!}">{!! $lastBlog->name !!}</a></h2>
                                <ul class="blog_meta text-white">
                                    <li>
                                        <i class="far fa-calendar-alt"></i>
                                        <span>{!! localeDate($lastBlog->date) !!}</span>
                                    </li>
                                    @if($lastBlog->comments_count > 0)
                                        <li>
                                            <i class="far fa-comments"></i>
                                            <span>{!! $lastBlog->comments_count !!} Yorum</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row home_categories">
                @foreach($categories as $category)
                    <div class="col-4">
                        <a href="{!! $category->url !!}">
                            <div class="service_box">
                                <img src="{!! image($category->cover, 350, 198) !!}" alt="{!! $category->name !!}"/>
                                <span class="lable">{!! str_ucwords($category->name) !!}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="section background_bg overlay_bg_70 overflow-hidden fixed_bg inspire"
         data-img-src="{{ image("/assets/images/inspire.png") }}">
        <div class="container">
            <div class="justify-content-between align-items-center">
                <div class="col-12">
                    <blockquote class="blockquote ">
                        <p class="mb-0 text-white">{!! $inspire['text'] !!}</p>
                        <footer class="blockquote-footer text-right text-white"><cite
                                title="Source Title">{!! $inspire['author'] !!}</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog_article row">
                        @foreach($blogs as $blog)
                            <div class="blog_post col-lg-4 col-md-6 col-sm-12">
                                <div class="blog_img">
                                    <a href="{!! $blog->url !!}">
                                        <img src="{!! image($blog->cover, 340, 219) !!}" alt="{!! $blog->name !!}"
                                             height="219">
                                    </a>
                                </div>
                                <div class="blog_content">
                                    <div class="blog_text">
                                        <div class="blog_tags">
                                            <a class="blog_tags_cat"
                                               href="{!! $blog->category->url !!}"
                                               style="background-color: {{$blog->category->color ?: "#4382FF"}}">
                                                {!! $blog->category->name !!}
                                            </a>
                                        </div>
                                        <h5 class="blog_heading">{!! $blog->name !!}</h5>
                                        <ul class="blog_meta">
                                            <li>
                                                <i class="far fa-calendar-alt"></i>
                                                <span>{!! localeDate($blog->date) !!}</span>
                                            </li>
                                            @if($blog->comments_count > 0)
                                                <li>
                                                    <i class="far fa-comments"></i>
                                                    <span>{!! $blog->comments_count !!} Yorum</span>
                                                </li>
                                            @endif
                                        </ul>
                                        <p>{!! \Str::limit(html_entity_decode(strip_tags($blog->detail)), 65) !!}</p>
                                        <a href="{!! $blog->url !!}"
                                           class="btn btn-dark btn-sm">Devamını Oku</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
