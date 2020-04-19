@php
    $categories = getSidebarCategories();
    $tags = getSidebarTags();
    $blogs = getSidebarLatestBlogs();
@endphp

<div class="sidebar mt-4 pt-2 mt-lg-0 pt-lg-0 fixed_scroll_item d-none d-lg-block" data-margintop="100">

    @if($categories->isNotEmpty())
        <div class="widget">
            <h5 class="widget_title">Kategoriler</h5>
            <ul class="widget_categories">
                @foreach($categories as $category)
                    <li>
                        <a href="{!! $category->url !!}">
                            <div class="post_category">
                                <span class="cat_title">{!! $category->name !!}</span>
                                <span class="cat_num">({!! $category->blogs_count !!})</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="widget">
        <h5 class="widget_title">Tagler</h5>
        <div class="tags">
            @foreach($tags as $tag)
                <a href="{!! $tag->url !!}">{!! $tag->name !!}</a>
            @endforeach
        </div>
    </div>
</div>
