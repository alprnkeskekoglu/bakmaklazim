<ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumb float-right">
    <li itemprop="itemListElement" itemscope class="breadcrumb-item"
        itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="{!! route('index') !!}">
            <span itemprop="name">Anasayfa</span>
        </a>
        <meta itemprop="position" content="1" />
    </li>

    @isset($breadcrumb)
        @foreach($breadcrumb as $name => $url)
            <li itemprop="itemListElement" itemscope class="breadcrumb-item {{ $loop->last ? 'd-none d-sm-block active' : '' }}"
                itemtype="http://schema.org/ListItem">
                @if($loop->last)
                    <span itemprop="name">{!! ucwords($name) !!}</span>
                @else
                    <a itemprop="item" href="{!! $url !!}">
                        <span itemprop="name">{!! str_ucwords($name) !!}</span>
                    </a>
                @endif
                <meta itemprop="position" content="{{ $loop->iteration + 1 }}" />
            </li>
        @endforeach
    @endisset
</ol>
