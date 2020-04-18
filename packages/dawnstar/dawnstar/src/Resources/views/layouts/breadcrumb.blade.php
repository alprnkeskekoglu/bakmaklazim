<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @foreach(breadcrumb() as $crumb => $url)
                        <li class="breadcrumb-item {!! $loop->last ? 'active' : '' !!}">
                            <a href="{{$url}}">{{$crumb}}</a>
                        </li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</div>
