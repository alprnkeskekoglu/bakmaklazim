@extends('Dawnstar::layouts.app')

@section('content')
    <main id="main-container">
        @include('Dawnstar::layouts.breadcrumb')
        <div class="content">
            <div class="block block-rounded block-bordered">
                <div class="block-content">
                    <form action="{!! route("panel.blog.update", ['id' => $blog->id]) !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row push">
                            <div class="col-lg-3 col-xl-4">

                                <div class="col-sm-6 col-lg-12">
                                    <h4><b>Blog Cover Image</b></h4>
                                    <span id="btnCover" style="cursor: pointer;">
                                        <img src="{!! $blog->cover ? url($blog->cover) : 'https://via.placeholder.com/150' !!}"
                                             alt="Blog Cover Image" class="card p-1" id="imageCover"
                                             style="width: 50%; margin-left: auto; margin-right: auto; border: 1px dashed black">
                                    </span>
                                    <label>
                                        Dosya yüklemek için icon'a tıklayınız.
                                    </label>
                                    <div class="form-group" style="display: none">
                                        <div class="custom-file ">
                                            <input type="file" class="form-control" id="cover-file"
                                                   name="cover" accept="image/*" onchange="loadCover(event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-12">
                                    <h4><b>Blog Image</b></h4>
                                    <span id="btnImage" style="cursor: pointer;">
                                        <img src="{!! $blog->image ? url($blog->image) : 'https://via.placeholder.com/150' !!}"
                                             alt="Blog Image" class="card p-1" id="image"
                                             style="width: 50%; margin-left: auto; margin-right: auto; border: 1px dashed black">
                                    </span>
                                    <label>
                                        Dosya yüklemek için icon'a tıklayınız.
                                    </label>
                                    <div class="form-group" style="display: none">
                                        <div class="custom-file ">
                                            <input type="file" class="form-control" id="image-file"
                                                   name="image" accept="image/*" onchange="loadImage(event)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-xl-8">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group row mt-5">
                                            <label class="col-2"><b>Status</b></label>
                                            <div class="col-10">
                                                <div class="custom-control-inline custom-radio custom-control-success custom-control-lg mb-1">
                                                    <input type="radio" class="custom-control-input" id="active"
                                                           name="status" value="1"
                                                        {!! $blog->status == 1 ? 'checked' : '' !!}>
                                                    <label class="custom-control-label" for="active">Active</label>
                                                </div>
                                                <div
                                                    class="custom-control-inline custom-radio custom-control-warning custom-control-lg mb-1">
                                                    <input type="radio" class="custom-control-input" id="draft"
                                                           name="status" value="2"
                                                        {!! $blog->status == 2 ? 'checked' : '' !!}>
                                                    <label class="custom-control-label" for="draft">Draft</label>
                                                </div>
                                                <div
                                                    class="custom-control-inline custom-radio custom-control-danger custom-control-lg mb-1">
                                                    <input type="radio" class="custom-control-input" id="passive"
                                                           name="status" value="3"
                                                        {!! $blog->status == 3 ? 'checked' : '' !!}>
                                                    <label class="custom-control-label" for="passive">Passive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>View Count</label>
                                            <input type="text" class="form-control" disabled value="{{$blog->view_count}}">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Useful Rate</label>
                                            <input type="text" class="form-control" disabled value="{{$blog->useful_rate}}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category_id" id="category" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option {{$category->id == $blog->category_id ? 'selected' : ''}} value="{{ $category->id }}">{!! $category->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <select class="js-select2 form-control" id="tags" name="tags[]" style="width: 100%;" data-placeholder="Choose many.." multiple required>
                                        @foreach($blog->category->tags as $tag)
                                            <option value="{{$tag->id}}" {{ in_array($tag->id, $tagsId) ? 'selected' : '' }}> {{ $tag->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{ $blog->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" autocomplete="off" value="{{ $blog->slug }}" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-5">
                                <div class="form-group">
                                    <label>Category Detail</label>
                                    <textarea name="detail">{{ $blog->detail }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-hero-success mr-1 mb-3 ">
                                <i class="fa fa-save mr-1"></i> Update
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
        CKEDITOR.replace('detail', {
            filebrowserUploadUrl: "{{route('panel.ckEditorUpload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            language: "tr",
            height: "400"
        });

        $("#tags").select2({
            tags: true,
        });
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
                    });
                    $("#tags").parent().show();
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

        $('#btnImage').on('click', function () {
            $('#image-file').trigger('click');
        });

        var loadImage = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
@endpush
