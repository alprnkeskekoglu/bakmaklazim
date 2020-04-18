@extends('Dawnstar::layouts.app')

@section('content')
    <main id="main-container">
        @include('Dawnstar::layouts.breadcrumb')
        <div class="content">
            <div class="block block-rounded block-bordered">
                <div class="block-content">
                    <div class="row">
                        <div class="col-4">
                            <div class="block block-rounded block-bordered">
                                <div class="block-content block-content-full">
                                    <div class="js-nestable-connected-simple dd">
                                        <ol class="dd-list">
                                            @foreach($categories as $category)
                                                <li class="dd-item" data-id="{{ $category->id }}">
                                                    <span class="float-right mt-2 pr-3" title="Delete">
                                                        <a href="javascript:void(0);" class="deleteCategory">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </span>
                                                    <span class="float-right mt-2 pr-3" title="Edit">
                                                        <a href="{!! route('panel.category.edit', ['id' => $category->id]) !!}"><i
                                                                class="fa fa-pencil-alt"></i></a>
                                                    </span>
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
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                    <div class="form-group text-right mt-4">
                                        <button type="submit" class="btn btn-success mr-1 mb-3" id="saveOrder">
                                            Save Order
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-8">
                            <form action="{!! route("panel.category.store") !!}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row push">
                                    <div class="col-10 offset-2">

                                        <div class="row">
                                            <div class="col-6">
                                                <h4><b>Category Cover Image</b></h4>
                                                <span id="btnCover" style="cursor: pointer;">
                                                <img src="{!! 'https://via.placeholder.com/150' !!}"
                                                     alt="Category Cover Image" class="card p-1" id="imageCover"
                                                     style="width: 50%; margin-left: auto; margin-right: auto; border: 1px dashed black">
                                            </span>
                                                <div class="form-group" style="display: none">
                                                    <div class="custom-file ">
                                                        <input type="file" class="form-control" id="cover-file"
                                                               name="cover" accept="image/*" onchange="loadCover(event)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row mt-5">
                                                    <label class="col-2"><b>Status</b></label>
                                                    <div class="col-10">
                                                        <div
                                                            class="custom-control-inline custom-radio custom-control-success custom-control-lg mb-1">
                                                            <input type="radio" class="custom-control-input" id="active"
                                                                   name="status" value="1" checked>
                                                            <label class="custom-control-label" for="active">Active</label>
                                                        </div>
                                                        <div
                                                            class="custom-control-inline custom-radio custom-control-warning custom-control-lg mb-1">
                                                            <input type="radio" class="custom-control-input" id="draft"
                                                                   name="status" value="2">
                                                            <label class="custom-control-label" for="draft">Draft</label>
                                                        </div>
                                                        <div
                                                            class="custom-control-inline custom-radio custom-control-danger custom-control-lg mb-1">
                                                            <input type="radio" class="custom-control-input" id="passive"
                                                                   name="status" value="3">
                                                            <label class="custom-control-label" for="passive">Passive</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="color">Color</label>
                                                    <input type="text" class="js-colorpicker form-control" id="color" data-format="hex" name="color" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                   autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                   autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Category Detail</label>
                                            <textarea name="detail" id="" cols="52" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-hero-success mr-1 mb-3 ">
                                        <i class="fa fa-save mr-1"></i> Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/dawnstar/assets/js/plugins/nestable2/jquery.nestable.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/dawnstar/assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/dawnstar/assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">

    <style>
        .dd-item > span > a {
            color: inherit;
        }
    </style>
@endpush

@push('scripts')

    <script src="{{asset('vendor/dawnstar/assets/js/plugins/nestable2/jquery.nestable.min.js')}}"></script>
    <script src="{{asset('vendor/dawnstar/assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('vendor/dawnstar/assets/js/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendor/dawnstar/assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script>jQuery(function(){ Dashmix.helpers(['colorpicker']); });</script>
    <script>

        CKEDITOR.replace('detail', {
            filebrowserUploadUrl: "{{route('panel.ckEditorUpload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });

        $('.dd').nestable({'maxDepth': 1});

        $('#saveOrder').on('click', function () {

            $.ajax({
                url: "{{ route('panel.category.orderSave') }}",
                method: 'post',
                data: {'orderList': JSON.stringify($('.dd').nestable('serialize')), '_token': "{{csrf_token()}}"},
                success: function (response) {
                    Swal.fire({
                        title: "Saved!",
                        text: "Your content has been saved!",
                        type: "success"
                    }).then(function() {
                        window.location.reload();
                    });
                }
            });
        });

        $('.deleteCategory').on('click', function (e) {
            e.preventDefault();

            var category_id = $(this).closest('.dd-item').attr('data-id');

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
                        url: "/dawnstar/Category/" + category_id + "/delete",
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

        $('#btnCover').on('click', function () {
            $('#cover-file').trigger('click');
        });

        var loadCover = function(event) {
            var output = document.getElementById('imageCover');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
@endpush