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
                        <a class="block text-center bg-image" style="background-image: url('{!! asset("vendor/dawnstar/assets/media/photos/photo16.jpg") !!}');" href="{!! route('index') !!}">
                            <div class="block-content block-content-full bg-gd-lake-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <i class="fa fa-2x fa-external-link-alt text-white"></i>
                                    <div class="font-w600 mt-3 text-uppercase text-white">Go Website</div>
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
                        <a class="block text-center bg-image" style="background-image: url('{!! asset("vendor/dawnstar/assets/media/photos/photo15.jpg") !!}');" href="{!! route('panel.admin.index') !!}">
                            <div class="block-content block-content-full bg-gd-fruit-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                <div>
                                    <i class="fa fa-2x fa-users text-white"></i>
                                    <div class="font-w600 mt-3 text-uppercase text-white">Admins</div>
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
{{--
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
--}}



            <!-- Page Content -->
            <div class="content content-full">
                <!-- Overview -->
                <h2 class="font-w300 mt-4 mb-3">Overview</h2>
                <div class="row">
                    <div class="col-sm-6 col-lg-6 invisible" data-toggle="appear">
                        <div class="block block-rounded block-fx-pop text-center h-100">
                            <div class="block-content block-content-full d-flex justify-content-center align-items-center">
                                <div>
                                    <a class="link-fx text-success font-size-h1 font-w700" id="liveUser" href="javascript:void(0)">{{ $liveUser }}</a>
                                    <div class="font-size-sm font-w700 text-uppercase text-muted mt-1">LIVE USER</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 invisible" data-toggle="appear" data-timeout="150">
                        <div class="block block-rounded block-fx-pop text-center h-100">
                            <div class="block-content block-content-full d-flex justify-content-center align-items-center">
                                <div>
                                    <a class="link-fx text-success font-size-h1 font-w700" href="javascript:void(0)">{{ $totalVisitorAndViews->pluck('visitors')->sum() }}</a>
                                    <div class="font-size-sm font-w700 text-uppercase text-muted mt-1">TOTAL VISITORS</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-6">
                    <div class="col-sm-6 col-lg-6 invisible" data-toggle="appear" data-timeout="150">
                        <div class="block" href="javascript:void(0)">
                            <div class="block-content block-content-full bg-white-90 overflow-hidden">
                                <div class="py-3">
                                    <!-- Sparkline Container -->
                                    <span class="js-sparkline" data-type="line"
                                          data-points="[{{ implode(',', $visitorArr) }}]"
                                          data-width="100%"
                                          data-height="200px"
                                          data-line-color="#e65c00"
                                          data-fill-color="transparent"
                                          data-spot-color="transparent"
                                          data-min-spot-color="transparent"
                                          data-max-spot-color="transparent"
                                          data-highlight-spot-color="#e65c00"
                                          data-highlight-line-color="#e65c00"
                                          data-tooltip-suffix="Visitor"></span>
                                </div>
                            </div>
                            <div class="block-content block-content-full d-flex align-items-end justify-content-between bg-body-light">
                                <div class="mr-3">
                                    <p class="font-w600 text-uppercase mb-0">
                                        VISITORS PER DAY
                                    </p>
                                </div>
                                <div>
                                    <i class="fa fa-2x fa-users text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 invisible" data-toggle="appear" data-timeout="150">
                        <div class="block" href="javascript:void(0)">
                            <div class="block-content block-content-full bg-white-90 overflow-hidden">
                                <div class="py-3">
                                    <!-- Sparkline Container -->
                                    <span class="js-sparkline" data-type="line"
                                          data-points="[{{ implode(',', $pageViewArr) }}]"
                                          data-width="100%"
                                          data-height="200px"
                                          data-line-color="#6a82fb"
                                          data-fill-color="transparent"
                                          data-spot-color="transparent"
                                          data-min-spot-color="transparent"
                                          data-max-spot-color="transparent"
                                          data-highlight-spot-color="#6a82fb"
                                          data-highlight-line-color="#6a82fb"
                                          data-tooltip-suffix="Page View"></span>
                                </div>
                            </div>
                            <div class="block-content block-content-full d-flex align-items-end justify-content-between bg-body-light">
                                <div class="mr-3">
                                    <p class="font-w600 text-uppercase mb-0">
                                        PAGE VIEW PER DAY
                                    </p>
                                </div>
                                <div>
                                    <i class="fa fa-2x fa-eye text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-6 col-lg-6 invisible" data-toggle="appear">
                        <div class="block block-rounded block-fx-pop h-100">
                            <div class="block-header block-header-default text-center">
                                <h3 class="block-title">Most Visited Pages</h3>
                            </div>
                            <div class="block-content block-content-full d-flex justify-content-center align-items-center">
                                <table class="table table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Url</th>
                                        <th>Page Name</th>
                                        <th>Page Views</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mostVisitedPages as $page)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                            <td class="font-w600">
                                                {{ $page['url'] }}
                                            </td>
                                            <td class="font-w600">
                                                {{ $page['pageTitle'] }}
                                            </td>
                                            <td class="text-center">
                                                {{ $page['pageViews'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 invisible" data-toggle="appear" data-timeout="150">
                        <div class="block block-rounded block-fx-pop h-100">
                            <div class="block-header block-header-default text-center">
                                <h3 class="block-title">Total Referers</h3>
                            </div>
                            <div class="block-content block-content-full d-flex justify-content-center align-items-center">
                                <table class="table table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>From</th>
                                        <th>Page Views</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($topReferers as $referrer)
                                        @if($referrer['url'] == '(direct)')
                                            @continue
                                        @endif
                                        <tr>
                                            <th class="text-center" scope="row">{{ --$loop->iteration }}</th>
                                            <td class="font-w600">
                                                {{ $referrer['url'] }}
                                            </td>
                                            <td class="text-center">
                                                {{ $referrer['pageViews'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END VPS -->
            </div>
            <!-- END Page Content -->

    </main>
@endsection

@push('scripts')

    <script src="{{asset('vendor/dawnstar/assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script>jQuery(function(){ Dashmix.helpers(['sparkline']); });</script>


    <script>
        setTimeout(ajax, 2000)

        function ajax() {

            $.ajax({
                'url': "{{ route('panel.getLiveUsers') }}",
                'method': 'get',
                success: function(response) {
                    $('#liveUser').html(response);
                    setTimeout(ajax, 2000)
                }
            })
        }
    </script>
@endpush
