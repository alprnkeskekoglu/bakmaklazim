@extends('Dawnstar::layouts.app')

@section('content')
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Blog</li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded block-bordered">
                <div class="block-content">
                    <form action="{!! route("panel.blog.store") !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row push">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-9 col-xl-8">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group row mt-5">
                                            <label class="col-2"><b>Status</b></label>
                                            <div class="col-10">
                                                <div class="custom-control-inline custom-radio custom-control-success custom-control-lg mb-1">
                                                    <input type="radio" class="custom-control-input" id="active"
                                                           name="status" value="1">
                                                    <label class="custom-control-label" for="active">Active</label>
                                                </div>
                                                <div
                                                    class="custom-control-inline custom-radio custom-control-warning custom-control-lg mb-1">
                                                    <input type="radio" class="custom-control-input" id="draft"
                                                           name="status" value="2" checked>
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
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Useful Rate</label>
                                            <input type="text" class="form-control" disabled value="">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category_id" id="category">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{!! $category->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" style="display: none">
                                    <label for="tags">Tags</label>
                                    <select class="js-select2 form-control" id="tags" name="tags[]" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Category Detail</label>
                                    <textarea name="detail"></textarea>
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
    </main>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/dawnstar/assets/js/plugins/select2/css/select2.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('vendor/dawnstar/assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('vendor/dawnstar/assets/js/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('detail');

        $('#category').on('change', function () {
            var id = $(this).val();
            $.ajax({
                method: "get",
                data: {'category_id': id},
                url: '{!! route("panel.blog.getTags") !!}',
                success: function(result) {
                    content = "<option></option>";
                    $.each(result, function(k,v) {
                        content += '<option value="'+v.id+'">'+v.name+'</option>';
                    });
                    $("#tags").html(content);
                    $("#tags").select2({
                        tags: true,
                        createTag: function (params) {
                            if (params.term.indexOf('@') === -1) {
                                return null;
                            }
                        },
                        tokenSeparators: [',', ' '],
                    });
                    $("#tags").parent().show();
                }
            })
        })
    </script>
@endpush
