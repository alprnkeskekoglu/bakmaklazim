@extends('layouts.app')

@section('title'){!! env('APP_NAME') . " - Ulaşılabilir Bilgi Kaynağınız" !!}@endsection
@section('description'){!! "Bakmak Lazım, kendine değer katmak ve gündeme dair konularda söz sahibi olmak isteyenler için ulaşılabilir bilgi kaynağı. Kolayca erişin. Hemen okuyun." !!}@endsection
@section('keywords'){{ "bakmak lazım,ulaşılabilir,bilgi kaynağı,blog,nedir,teknoloji,bilgi" }}@endsection


@section('metas')
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ env('APP_NAME')}}"/>
    <meta property="og:description"
          content="{!! "Bakmak Lazım, kendine değer katmak ve gündeme dair konularda söz sahibi olmak isteyenler için ulaşılabilir bilgi kaynağı. Kolayca erişin. Hemen okuyun." !!}"/>
    <meta name="url" property="og:url" content="{!! route('index') !!}"/>
    <meta name="image" property="og:image" content="{!! image("/assets/images/full_logo.png", 1200, 630, false) !!}"/>

    <meta name="twitter:card" content="summary_large_image"/>
    <meta property="twitter:title" content="{{ env('APP_NAME')}}"/>
    <meta property="twitter:description"
          content="{!! "Bakmak Lazım, kendine değer katmak ve gündeme dair konularda söz sahibi olmak isteyenler için ulaşılabilir bilgi kaynağı. Kolayca erişin. Hemen okuyun." !!}"/>
    <meta name="twitter:image" content="{!! image("/assets/images/twitter_logo.png", 1000, 1000, false) !!}"/>
@endsection

@php
    $inspire = getRandomInspire();
@endphp

@section('content')
    <h1 hidden>{!! env('APP_NAME') . " - Ulaşılabilir Bilgi Kaynağınız" !!}</h1>
    <div class="banner_section staggered-animation-wrap slide_small">
        <div class="item background_bg overlay_bg_60" data-img-src="{!! image($lastBlog->cover) !!}">
            <div class="banner_slide_content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-8 col-sm-12">
                            <div class="banner_content">
                                <div class="blog_tags">
                                    <a class="blog_tags_cat"
                                       title="{!! optional($lastBlog->category)->name !!}"
                                       style="background-color: {{optional($lastBlog->category)->color ?: "#4382FF"}}"
                                       href="{!! optional($lastBlog->category)->url !!}">
                                        {!! optional($lastBlog->category)->name !!}
                                    </a>
                                </div>
                                <a href="{!! $lastBlog->url !!}" title="{!! $lastBlog->name !!}">
                                    <h2 class="text-white">{!! $lastBlog->name !!}</h2>
                                </a>
                                <ul class="blog_meta text-white">
                                    <li>
                                        <i class="far fa-calendar-alt"></i>
                                        <span>{!! localeDate($lastBlog->date) !!}</span>
                                    </li>
                                    <li>
                                        <i class="far fa-eye"></i>
                                        <span>{!! $lastBlog->view_count !!} Okunma</span>
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
                        <a href="{!! $category->url !!}" title="{{ $category->name }}">
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
                        <footer class="blockquote-footer text-right text-white">
                            <cite title="Source Title">{!! $inspire['author'] !!}</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <ul class="nav nav-tabs"role="tablist">
                        <li class="nav-item">
                            <a class="nav-link heading_s2 active" id="most-tab" data-toggle="tab" href="#most" role="tab"
                               aria-controls="most" aria-selected="true">
                                <span class="h4">En Çok Okunanlar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link heading_s2" id="last-tab" data-toggle="tab" href="#last" role="tab"
                               aria-controls="last" aria-selected="false">
                                <span class="h4">Son Eklenenler</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="most" role="tabpanel" aria-labelledby="most-tab">
                            <div class="blog_article">
                                <div class="row">
                                    @foreach($mostPopularBlogs as $mpBlog)
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="blog_post">
                                                <div class="blog_img">
                                                    <a href="{!! $mpBlog->url !!}" title="{{ $mpBlog->name }}">
                                                        <img src="{!! image($mpBlog->cover, 340, 219) !!}" alt="{!! $mpBlog->name !!}"
                                                             height="219">
                                                    </a>
                                                </div>
                                                <div class="blog_content">
                                                    <div class="blog_text">
                                                        <div class="blog_tags">
                                                            <a class="blog_tags_cat" title="{{ $mpBlog->name }}"
                                                               href="{!! $mpBlog->category->url !!}"
                                                               style="background-color: {{$mpBlog->category->color ?: "#4382FF"}}">
                                                                {!! $mpBlog->category->name !!}
                                                            </a>
                                                        </div>
                                                        <div class="blog_heading">
                                                            <a href="{!! $mpBlog->url !!}" title="{{ $mpBlog->name }}">
                                                                {!! $mpBlog->name !!}
                                                            </a>
                                                        </div>
                                                        <ul class="blog_meta">
                                                            <li>
                                                                <i class="far fa-calendar-alt"></i>
                                                                <span>{!! localeDate($mpBlog->date) !!}</span>
                                                            </li>
                                                            <li>
                                                                <i class="far fa-eye"></i>
                                                                <span>{!! $mpBlog->view_count !!} Okunma</span>
                                                            </li>
                                                            @if($mpBlog->comments_count > 0)
                                                                <li>
                                                                    <i class="far fa-comments"></i>
                                                                    <span>{!! $mpBlog->comments_count !!} Yorum</span>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                        <p>{!! \Str::limit(html_entity_decode(strip_tags($mpBlog->detail)), 65) !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="last" role="tabpanel" aria-labelledby="last-tab">

                            <div class="mt-5 blog_article">
                                <div class="row">
                                    @foreach($lastBlogs as $lBlog)
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="blog_post">
                                                <div class="blog_img">
                                                    <a href="{!! $lBlog->url !!}" title="{{ $lBlog->name }}">
                                                        <img src="{!! image($lBlog->cover, 340, 219) !!}" alt="{!! $lBlog->name !!}"
                                                             height="219">
                                                    </a>
                                                </div>
                                                <div class="blog_content">
                                                    <div class="blog_text">
                                                        <div class="blog_tags">
                                                            <a class="blog_tags_cat" title="{{ $lBlog->name }}"
                                                               href="{!! $lBlog->category->url !!}"
                                                               style="background-color: {{$lBlog->category->color ?: "#4382FF"}}">
                                                                {!! $lBlog->category->name !!}
                                                            </a>
                                                        </div>
                                                        <div class="blog_heading">
                                                            <a href="{!! $lBlog->url !!}" title="{{ $lBlog->name }}">
                                                                {!! $lBlog->name !!}
                                                            </a>
                                                        </div>
                                                        <ul class="blog_meta">
                                                            <li>
                                                                <i class="far fa-calendar-alt"></i>
                                                                <span>{!! localeDate($lBlog->date) !!}</span>
                                                            </li>
                                                            <li>
                                                                <i class="far fa-eye"></i>
                                                                <span>{!! $lBlog->view_count !!} Okunma</span>
                                                            </li>
                                                            @if($lBlog->comments_count > 0)
                                                                <li>
                                                                    <i class="far fa-comments"></i>
                                                                    <span>{!! $lBlog->comments_count !!} Yorum</span>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                        <p>{!! \Str::limit(html_entity_decode(strip_tags($lBlog->detail)), 65) !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
