@php

    $data = Cache::remember("SIDEBAR" . getBrowser(), 60 * 60 * 24 * 7, function () {
        $hold['categories'] = getSidebarCategories();
        $hold['tags'] = getSidebarTags();

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
                    <a href="{!! $tag->url !!}">{!! str_ucwords($tag->name) !!}</a>
                @endforeach
            </div>
        </div>
    @endif
</div>
