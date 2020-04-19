@extends('layouts.app')

@section('title') {!! env('APP_NAME') !!} @endsection

@php
    $inspire = getRandomInspire();
@endphp

@section('content')
    <div class="section breadcrumb_section background_bg overlay_bg_50 page_title_light"
         data-img-src="{!! image($lastBlog->cover) !!}">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-8 col-sm-12">
                    <div class="banner_content">
                        <div class="blog_tags">
                            <a class="blog_tags_cat"
                               style="background-color: {{$lastBlog->category->color ?: "#4382FF"}}"
                               href="{!! $lastBlog->category->url !!}">
                                {!! $lastBlog->category->name !!}
                            </a>
                        </div>
                        <h2 class="blog_heading"><a
                                href="{!! $lastBlog->url !!}">{!! $lastBlog->name !!}</a>
                        </h2>
                        <ul class="blog_meta">
                            <li><i class="ti-calendar"></i>
                                <span>{!! \Carbon\Carbon::parse($lastBlog->date)->formatLocalized('%d %B %Y') !!}</span>
                            </li>
                            <li><i class="ti-comments"></i> <span>{!! $lastBlog->comments_count !!} Yorum</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel_slider owl-carousel owl-theme nav_style4" data-margin="30" data-dots="false"
                         data-nav="true">
                        @foreach($categories as $category)
                            <div class="item">
                                <div class="service_box">
                                    <a href="{!! $category->url !!}">
                                        <img src="{!! image($category->cover) !!}" alt="{!! $category->name !!}"/>
                                        <span class="lable">{!! ucwords(strtolower($category->name)) !!}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section background_bg overlay_bg_70 overflow-hidden fixed_bg"
         data-img-src="/assets/images/newsletters_bg.jpg">
        <div class="container">
            <div class="justify-content-between align-items-center">
                <div class="col-12">
                    <blockquote class="blockquote ">
                        <p class="mb-0 text-white">{!! $inspire['text'] !!}</p>
                        <footer class="blockquote-footer text-right text-white"> <cite title="Source Title">{!! $inspire['author'] !!}</cite></footer>
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
                                        <img src="{!! image($blog->cover) !!}" alt="{!! $blog->name !!}"
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
                                            <li><i class="ti-calendar"></i>
                                                <span>{!! \Carbon\Carbon::parse($blog->date)->formatLocalized('%d %B %Y') !!}</span>
                                            </li>
                                            <li><i class="ti-comments"></i>
                                                <span>{!! $blog->comments_count !!} Yorum</span></li>
                                        </ul>
                                        <p>{!! \Str::limit(strip_tags($blog->detail), 50) !!}</p>
                                        <a href="{!! $blog->url !!}"
                                           class="btn btn-dark btn-sm">Devamını Oku</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {!! $blogs->links('vendor.pagination.custom') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
