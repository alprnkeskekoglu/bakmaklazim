@extends('layouts.app')

@section('title') {!! $category->name . ' | ' . env('APP_NAME') !!} @endsection
@section('description') {!!  \Str::limit(strip_tags($category->detail), 100) !!} @endsection
@section('keywords') {!! $category->name . ', ' . implode(', ', $category->tags->pluck('name')->toArray()) !!} @endsection

@section('content')
    <div class="section breadcrumb_section bg_gray custom_breadcrumb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 mb-3">
                    <div class="page-title">
                        <h1>{!! $category->name !!}</h1>
                    </div>
                </div>
                <div class="col-md-12">
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

                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="blog_post col-lg-6 col-md-12 col-sm-12">
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
                                                   href="{!! $tag->url !!}">{!! strto('lower', $tag->name) !!}</a>
                                            @endforeach
                                        </div>
                                        <h5 class="blog_heading"><a
                                                href="{!! $blog->url !!}">{!! $blog->name !!}</a>
                                        </h5>
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
                                        <p>{!! \Str::limit(strip_tags($blog->detail), 90) !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 d-none d-lg-block d-md-block">
                    <div class="sidebar mt-4 pt-2 mt-lg-0 pt-lg-0 fixed_scroll_item" data-margintop="100">

                        <div class="widget">
                            <h5 class="widget_title">Etiketler</h5>
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
