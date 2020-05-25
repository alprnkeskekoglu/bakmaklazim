@php

    $data = Cache::remember("SIDEBAR" . getBrowser(), 60 * 60 * 24 * 7, function () {
        $hold['categories'] = getSidebarCategories();
        $hold['tags'] = getSidebarTags();
        $hold['blogs'] = getSidebarBlogs();

        return $hold;
    });

@endphp

<div class="sidebar mt-4 pt-2 mt-lg-0 pt-lg-0 fixed_scroll_item d-none d-lg-block" data-margintop="100">

    @if($data['categories']->isNotEmpty())
        <div class="widget">
            <h5 class="widget_title">Kategoriler</h5>
            <ul class="widget_categories">
                @foreach($data['categories'] as $category)
                    <li>
                        <a href="{!! $category->url !!}">
                            <div class="post_category">
                                <span class="cat_title">{!! str_ucwords($category->name) !!}</span>
                                <span class="cat_num">({!! $category->blogs_count !!})</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($data['tags']->isNotEmpty())
        <div class="widget">
            <h5 class="widget_title">Etiketler</h5>
            <div class="tags">
                @foreach($data['tags'] as $tag)
                    <a href="{!! $tag->url !!}">{!! $tag->name !!}</a>
                @endforeach
            </div>
        </div>
    @endif

    <div class="widget">
        <h5 class="widget_title">En Çok Okunanlar</h5>
        <ul class="recent_post">
            @foreach($data['blogs'] as $blog)
                <li>
                    <div class="post_footer">
                        <div class="post_img">
                            <a href="{{ $blog->url }}">
                                <img
                                    src="{!! $blog->cover ? image($blog->cover, 100, 100) : image($blog->image, 100, 100) !!}"
                                    class="rounded-circle"
                                    alt="{!! $blog->name !!}">
                            </a>
                        </div>
                        <div class="post_content">
                            <h6><a href="{{ $blog->url }}">{{ $blog->name }}</a></h6>

                            <ul class="blog_meta">
                                <li>
                                    <i class="far fa-calendar-alt"></i>
                                    <span>{!! localeDate($blog->date) !!}</span>
                                </li>
                                <li>
                                    <i class="far fa-eye"></i>
                                    <span>{!! $blog->view_count !!}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
