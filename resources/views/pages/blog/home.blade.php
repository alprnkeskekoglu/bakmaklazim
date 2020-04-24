@extends('layouts.app')

@section('title') Blog Yazıları | {!! env('APP_NAME') !!} @endsection

@section('content')
    <div class="section breadcrumb_section bg_gray">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Blog Yazıları</h1>
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
                <div class="col-lg-8">
                    <div class="blog_list list_post">
                        @foreach($blogs as $blog)
                            <div class="blog_post">
                                <div class="blog_img">
                                    <a href="{!! $blog->url !!}">
                                        <img src="{!! image($blog->cover) !!}" alt="{!! $blog->name !!}" height="219">
                                    </a>
                                </div>
                                <div class="blog_content">
                                    <div class="blog_text">
                                        <div class="blog_tags">
                                            <a class="blog_tags_cat" href="{!! $blog->category->url !!}" style="background-color: {{$blog->category->color ?: "#4382FF"}}">
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
                                            <li>
                                                <i class="far fa-eye"></i>
                                                <span>{!! $blog->view_count !!} Görüntülenme</span>
                                            </li>
                                        </ul>
                                        <p>{!! \Str::limit(strip_tags($blog->detail), 90) !!}</p>
                                        <a href="{!! $blog->url !!}" class="btn btn-dark btn-sm">Devamını Oku</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {!! $blogs->links('vendor.pagination.custom') !!}
                </div>
                <div class="col-lg-4">
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
