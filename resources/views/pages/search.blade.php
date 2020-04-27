@extends('layouts.app')

@section('title'){!! "Arama Sayfası - " . env('APP_NAME') !!}@endsection

@section('content')
    <div class="section breadcrumb_section bg_gray custom_breadcrumb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 mb-3">
                    <div class="page-title">
                        <h1>Blog List</h1>
                    </div>
                </div>
                <div class="col-md-12">
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
                                        <img src="{!! $page->model->cover ? image($page->model->cover) : image($page->model->image) !!}" alt="{!! $page->name !!}">
                                    </a>
                                </div>
                                <div class="blog_content">
                                    <div class="blog_text">
                                        <h5 class="blog_heading">{!! $page->name !!}</h5>
                                        <p>{!! html_entity_decode(\Str::limit(strip_tags($page->detail), 200)) !!}</p>
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
