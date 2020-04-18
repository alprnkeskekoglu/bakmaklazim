@extends('layouts.app')

@section('title') {!! $category->name . ' | ' . env('APP_NAME') !!} @endsection
@section('description') {!!  \Str::limit(strip_tags($category->detail), 100) !!} @endsection
@section('keywords') {!! $category->name . ', ' . implode(', ', $category->tags->pluck('name')->toArray()) !!} @endsection

@section('content')
    <div class="section breadcrumb_section bg_gray">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>{!! $category->name !!}</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    @include('layouts.breadcrumb')
                </div>
            </div>
        </div>
    </div>
    <div class="section pt-0 pb_70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <hr class="mt-0">
                    <div class="medium_divider clearfix"></div>
                </div>
            </div>
            <div class="row">

                <div class="col-8">
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="blog_post col-6">
                                <div class="blog_img">
                                    <a href="{!! $blog->url !!}">
                                        <img src="{!! image($blog->cover) !!}" alt="{!! $blog->name !!}"
                                             width="350" height="230">
                                    </a>
                                </div>
                                <div class="blog_content">
                                    <div class="blog_text">
                                        <div class="blog_tags">
                                            @foreach($blog->tags as $tag)
                                                <a class="blog_tags_cat bg_custom"
                                                   href="{!! $tag->url !!}">{!! strtolower($tag->name) !!}</a>
                                            @endforeach
                                        </div>
                                        <h5 class="blog_heading"><a
                                                href="{!! $blog->url !!}">{!! $blog->name !!}</a>
                                        </h5>
                                        <ul class="blog_meta">
                                            <li><i class="ti-calendar"></i>
                                                <span>{!! \Carbon\Carbon::parse($blog->date)->formatLocalized('%d %B %Y') !!}</span>
                                            </li>
                                            <li><i class="ti-comments"></i>
                                                <span>{!! $blog->comments_count !!} Yorum</span></li>
                                        </ul>
                                        <p>{!! \Str::limit(strip_tags($blog->detail), 50) !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar mt-4 pt-2 mt-lg-0 pt-lg-0 fixed_scroll_item" data-margintop="100">

                        <div class="widget">
                            <h5 class="widget_title">Tagler</h5>
                            <ul class="widget_categories">
                                @foreach($tags as $tag)
                                    <li>
                                        <div class="form-group col-md-12">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input tag-checkbox" type="checkbox"
                                                           {{ in_array($tag->slug, $tagSlugs) ? 'checked' : '' }}
                                                           name="checkbox" id="tag{{$tag->id}}"
                                                           data-slug="{{$tag->slug}}">
                                                    <label class="form-check-label"
                                                           for="tag{{$tag->id}}"><span>{!! $tag->name !!}</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .bg_custom {
            background-color: #b1b1b1;
        }
    </style>
@endpush

@push('scripts')
    <script>

        $('.tag-checkbox').on('change', function () {
            var tags = [];

            $.each($('.tag-checkbox:checked'), function (k, element) {
                tags.push($(element).attr('data-slug'));
            });

            window.location.href = window.location.origin + window.location.pathname + "?tags=" + tags.join();
        })

    </script>
@endpush