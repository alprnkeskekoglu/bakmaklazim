<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header (mini Sidebar mode) -->
    <div class="smini-visible-block">
        <div class="content-header">
            <a class="link-fx font-size-lg text-white" href="{!! route('panel.dawnstar') !!}">
                <span class="text-white-75">D</span><span class="text-white">S</span>
            </a>
        </div>
    </div>

    <div class="smini-hidden">
        <div class="content-header justify-content-lg-center">
            <span class="text-white-75">Dawn</span>star
        </div>
    </div>

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link" href="{!! route('panel.dawnstar') !!}">
                    <i class="nav-main-link-icon si si-bar-chart"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                </a>
            </li>
            <li class="nav-main-heading">Manage</li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{!! route('panel.category.index') !!}">
                    <i class="nav-main-link-icon si si-list"></i>
                    <span class="nav-main-link-name">Categories</span>
                </a>
            </li>
            {{--
            <li class="nav-main-item">
                <a class="nav-main-link" href="{!! route('panel.tag.index') !!}">
                    <i class="nav-main-link-icon si si-tag"></i>
                    <span class="nav-main-link-name">Tags</span>
                </a>
            </li>
            --}}
            <li class="nav-main-item">
                <a class="nav-main-link" href="{!! route('panel.blog.index') !!}">
                    <i class="nav-main-link-icon si si-docs"></i>
                    <span class="nav-main-link-name">Blogs</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{!! route('panel.comment.index') !!}">
                    <i class="nav-main-link-icon far fa-comments"></i>
                    <span class="nav-main-link-name">Comments</span>
                    @php($commentCount = getUnreadCommentCount())
                    @if($commentCount > 0)
                        <span class="nav-main-link-badge badge badge-pill badge-success">{{ $commentCount }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{!! route('panel.admin.index') !!}">
                    <i class="nav-main-link-icon si si-users"></i>
                    <span class="nav-main-link-name">Admins</span>
                </a>
            </li>

            <li class="nav-main-item border mt-8">
                <a class="nav-main-link badge-info" href="{!! route('index') !!}" target="_blank">
                    <i class="nav-main-link-icon fa fa-external-link-alt"></i>
                    <span class="nav-main-link-name">Go Website</span>
                </a>
            </li>
            <li class="nav-main-item border mt-5">
                <a class="nav-main-link" href="{!! url()->previous() !!}">
                    <i class="nav-main-link-icon si si-arrow-left"></i>
                    <span class="nav-main-link-name">Go Back</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>

