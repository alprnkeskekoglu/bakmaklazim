@extends('layouts.app')

@section('content')
    <div class="section breadcrumb_section bg_gray">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Blog List</h1>
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
                <div class="col-lg-12">
                    <div class="blog_list list_post">
                        @foreach($pages as $page)
                            <div class="blog_post">
                                <div class="blog_img_search">
                                    <a href="{!! $page->model->url !!}">
                                        <img src="{!! image($page->cover) !!}" alt="{!! $page->name !!}">
                                    </a>
                                </div>
                                <div class="blog_content">
                                    <div class="blog_text">
                                        <h5 class="blog_heading">{!! $page->name !!}</h5>
                                        <p>{!! \Str::limit(strip_tags($page->detail), 150) !!}</p>
                                        <a href="{!! $page->model->url !!}" class="btn btn-dark btn-sm">Sayfaya Git</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {!! $pages->links('vendor.pagination.custom') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
