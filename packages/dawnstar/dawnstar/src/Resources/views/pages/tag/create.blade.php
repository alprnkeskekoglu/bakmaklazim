@extends('Dawnstar::layouts.app')

@section('content')
    <main id="main-container">
        @include('Dawnstar::layouts.breadcrumb')

        <div class="content">
            @if(session()->get('message'))
                <div class="alert alert-success align-items-center" role="alert" id="success_div">
                    <div class="flex-00-auto">
                        <i class="fa fa-fw fa-check"></i> {!! session()->get('message') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @endif

            <div class="block block-rounded block-bordered">
                <div class="block-content">
                    <div class="row">

                        <div class="col-6 offset-3">
                            <div class="block block-rounded block-bordered">
                                <div class="block-content block-content-full">
                                    <div class="dd">
                                        <ol class="dd-list categoryList">
                                            @foreach($categories as $category)
                                                <li class="dd-item category" data-id="{{ $category->id }}">
                                                    <div class="dd-handle">
                                                        @if($category->status == 1)
                                                            <span class="badge badge-success pr-2" title="Active">&nbsp;&nbsp;</span>
                                                        @elseif($category->status == 2)
                                                            <span class="badge badge-warning pr-2" title="Draft">&nbsp;&nbsp;</span>
                                                        @elseif($category->status == 3)
                                                            <span class="badge badge-danger pr-2" title="Passive">&nbsp;&nbsp;</span>
                                                        @endif
                                                        {!! $category->name !!}
                                                    </div>
                                                    @if($category->tags->isNotEmpty())
                                                    <ol class="dd-list">
                                                        @foreach($category->tags as $tag)
                                                            <li class="dd-item" data-id="{{$tag->id}}">
                                                                <span class="float-right mt-2 pr-3" title="Delete">
                                                                    <a href="javascript:void(0);" class="deleteTag">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </span>
                                                                <span class="float-right mt-2 pr-3" title="Edit">
                                                                    <a href="{!! route('panel.tag.edit', ['id' => $tag->id]) !!}"><i
                                                                            class="fa fa-pencil-alt"></i></a>
                                                                </span>
                                                                <div class="dd-handle">
                                                                    @if($tag->status == 1)
                                                                        <span class="badge badge-success pr-2" title="Active">&nbsp;&nbsp;</span>
                                                                    @elseif($tag->status == 2)
                                                                        <span class="badge badge-warning pr-2" title="Draft">&nbsp;&nbsp;</span>
                                                                    @elseif($tag->status == 3)
                                                                        <span class="badge badge-danger pr-2" title="Passive">&nbsp;&nbsp;</span>
                                                                    @endif
                                                                    {!! $tag->name !!}
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/dawnstar/assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/dawnstar/assets/js/plugins/nestable2/jquery.nestable.min.css')}}">

    <style>
        .dd-item > span > a {
            color: inherit;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{asset('vendor/dawnstar/assets/js/plugins/nestable2/jquery.nestable.min.js')}}"></script>
    <script src="{{asset('vendor/dawnstar/assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <script>


        $('.dd').nestable({
            'maxDepth': 2,
            onDragStart: function(l,e){
                return !$(e).hasClass('category');
            },
            beforeDragStop: function(l,e, p){
                return !$(p).hasClass('categoryList');
            }
        });
        $('.dd').nestable('collapseAll');


        $('.deleteTag').on('click', function (e) {
            e.preventDefault();

            var tag_id = $(this).closest('.dd-item').attr('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: "/dawnstar/Tag/" + tag_id + "/delete",
                        method: 'get',
                        success: function (response) {
                            Swal.fire({

                                title: "Deleted!",
                                text: "Your content has been deleted!",
                                type: "success"
                            }).then(function() {
                                window.location.reload();
                            });
                        }
                    });

                }
            })

        });
    </script>
@endpush
