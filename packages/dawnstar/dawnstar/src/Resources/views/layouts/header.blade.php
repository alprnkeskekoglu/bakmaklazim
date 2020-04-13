

<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header (mini Sidebar mode) -->
    <div class="smini-visible-block">
        <div class="content-header">
            <!-- Logo -->
            <a class="link-fx font-size-lg text-white" href="{!! route('panel.index') !!}">
                <span class="text-white-75">D</span><span class="text-white">S</span>
            </a>
            <!-- END Logo -->
        </div>
    </div>
    <!-- END Side Header (mini Sidebar mode) -->

    <!-- Side Header (normal Sidebar mode) -->
    <div class="smini-hidden">
        <div class="content-header justify-content-lg-center">
            <!-- Logo -->
            <a class="link-fx font-size-lg text-dual" href="{!! route('panel.index') !!}">
                <span class="text-white-75">Dawn</span>
                star
            </a>
            <!-- END Logo -->
        </div>
    </div>
    <!-- END Side Header (normal Sidebar mode) -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link" href="{!! route('panel.index') !!}">
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
            <li class="nav-main-item">
                <a class="nav-main-link" href="{!! route('panel.tag.index') !!}">
                    <i class="nav-main-link-icon si si-tag"></i>
                    <span class="nav-main-link-name">Tags</span>
                </a>
            </li>
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
                    <span class="nav-main-link-badge badge badge-pill badge-success">9</span>
                </a>
            </li>


            <li class="nav-main-item border mt-10">
                <a class="nav-main-link" href="{!! url()->previous() !!}">
                    <i class="nav-main-link-icon si si-arrow-left"></i>
                    <span class="nav-main-link-name">Go Back</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>

