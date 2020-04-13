@extends('Dawnstar::layouts.app')
@php
    $comment_stats = commentStats();
@endphp
@section('content')
    <main id="main-container">
        <div class="bg-body-dark">
            <div class="content">
                <div class="row gutters-tiny push invisible" data-toggle="appear">

                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block text-center bg-image" style="background-image: url('{!! asset("vendor/dawnstar/assets/media/photos/photo15.jpg") !!}');" href="{!! route('panel.index') !!}">
                            <div class="block-content block-content-full bg-gd-fruit-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <i class="fa fa-2x fa-home text-white"></i>
                                    <div class="font-w600 mt-3 text-uppercase text-white">Home</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block text-center bg-image" style="background-image: url('{!! asset("vendor/dawnstar/assets/media/photos/photo20.jpg") !!}');" href="{!! route('panel.category.index') !!}">
                            <div class="block-content block-content-full bg-gd-sublime-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <i class="fa fa-2x fa-list text-white"></i>
                                    <div class="font-w600 mt-3 text-uppercase text-white">Categories</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block text-center bg-image" style="background-image: url('{!! asset("vendor/dawnstar/assets/media/photos/photo16.jpg") !!}');" href="{!! route('panel.tag.index') !!}">
                            <div class="block-content block-content-full bg-gd-lake-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <i class="fa fa-2x fa-tag text-white"></i>
                                    <div class="font-w600 mt-3 text-uppercase text-white">Tags</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block text-center bg-image" style="background-image: url('{!! asset("vendor/dawnstar/assets/media/photos/photo19.jpg") !!}');" href="{!! route('panel.blog.index') !!}">
                            <div class="block-content block-content-full bg-gd-sea-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <i class="fa fa-2x fa-file text-white"></i>
                                    <div class="font-w600 mt-3 text-uppercase text-white">Blog</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block text-center bg-image" style="background-image: url('{!! asset("vendor/dawnstar/assets/media/photos/photo17.jpg") !!}');" href="{!! route('panel.comment.index') !!}">
                            <div class="block-content block-content-full bg-gd-leaf-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <i class="fa fa-2x fa-comment-dots text-white"></i>
                                    <div class="font-w600 mt-3 text-uppercase text-white">Comments</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block text-center bg-image" style="background-image: url('{!! asset("vendor/dawnstar/assets/media/photos/photo18.jpg") !!}');" href="{!! route('panel.logout') !!}">
                            <div class="block-content block-content-full bg-xdream-dark-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <i class="fas fa-2x fa-sign-out-alt text-white"></i>
                                    <div class="font-w600 mt-3 text-uppercase text-white">Logout</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-4">
                    <div class="block" href="javascript:void(0)">
                        <div class="block-content block-content-full bg-white-90 overflow-hidden">
                            <div class="py-3">
                                <span class="js-sparkline" data-type="line"
                                      data-points="[{!! $comment_stats !!}]"
                                      data-width="100%"
                                      data-height="200px"
                                      data-line-color="#6a82fb"
                                      data-fill-color="transparent"
                                      data-spot-color="transparent"
                                      data-min-spot-color="transparent"
                                      data-max-spot-color="transparent"
                                      data-highlight-spot-color="#6a82fb"
                                      data-highlight-line-color="#6a82fb"
                                      data-tooltip-suffix="Comment"></span>
                            </div>
                        </div>
                        <div class="block-content block-content-full d-flex align-items-end justify-content-between bg-body-light">
                            <div>
                                <i class="fa fa-2x fa-file-alt text-muted"></i>
                                <span>Comment Statistics</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')

    <script src="{{asset('vendor/dawnstar/assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
@endpush
