@extends('layouts.app')

@section('title') Kategoriler | {!! env('APP_NAME') !!} @endsection


@section('content')
    <div class="section breadcrumb_section bg_gray custom_breadcrumb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Kategoriler</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    @include('layouts.breadcrumb')
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">

                @foreach($categories as $category)
                    <div class="blog_post col-lg-4 col-md-6 col-sm-12">
                        <div class="blog_img">
                            <a href="{!! $category->url !!}">
                                <img src="{!! image($category->cover) !!}" alt="{!! $category->name !!}"
                                     width="350" height="230">
                            </a>
                        </div>
                        <div class="blog_content">
                            <div class="blog_text">
                                <div class="blog_tags">
                                    @foreach($category->tags as $tag)
                                        <a class="blog_tags_cat bg_custom"
                                           href="{!! $tag->url !!}">{!! strto('lower', $tag->name) !!}</a>
                                    @endforeach
                                </div>
                                <h5 class="blog_heading"><a
                                        href="{!! $category->url !!}">{!! $category->name !!}</a>
                                </h5>
                                <ul class="blog_meta">
                                    <li><i class="far fa-comments"></i>
                                        <span>{!! $category->blogs_count !!} Blog Yazısı</span></li>
                                </ul>
                                <p>{!! \Str::limit(strip_tags($category->detail), 50) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
