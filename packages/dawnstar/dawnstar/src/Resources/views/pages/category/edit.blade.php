@extends('Dawnstar::layouts.app')

@section('content')
    <main id="main-container">
        @include('Dawnstar::layouts.breadcrumb')
        <div class="content">
            <div class="block block-rounded block-bordered">
                @if(session()->get('message'))
                    <div class="alert alert-success d-flex align-items-center" role="alert" id="success_div">
                        <div class="flex-00-auto">
                            <i class="fa fa-fw fa-check"></i>
                        </div>
                        <div class="flex-fill ml-3">
                            <p class="mb-0" id="success_message">{!! session()->get('message') !!}</p>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="block-content">
                    <form action="{!! route("panel.category.update", ['id' => $category->id]) !!}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <h2 class="content-heading pt-0">{!! $category->name !!}</h2>
                        <div class="row push">
                            <div class="col-lg-3 col-xl-4">
                                <div class="col-sm-6 col-lg-12">
                                    <h4><b>Blog Cover Image</b></h4>
                                    <span id="btnCover" style="cursor: pointer;">
                                        <img src="{!! $category->cover ? url($category->cover) : 'https://via.placeholder.com/150' !!}"
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
                            </div>
                            <div class="col-lg-9 col-xl-8">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group col-sm-6">
                                            <label for="color">Color</label>
                                            <input type="text" class="js-colorpicker form-control" id="color" data-format="hex" name="color" value="{{$category->color}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row mt-5">
                                            <label class="col-4"><b>Status</b></label>
                                            <div class="col-8">
                                                <div class="custom-control-inline custom-radio custom-control-success custom-control-lg mb-1">
                                                    <input type="radio" class="custom-control-input" id="active"
                                                           name="status" value="1"
                                                        {!! $category->status == 1 ? 'checked' : '' !!}>
                                                    <label class="custom-control-label" for="active">Active</label>
                                                </div>
                                                <div
                                                    class="custom-control-inline custom-radio custom-control-warning custom-control-lg mb-1">
                                                    <input type="radio" class="custom-control-input" id="draft"
                                                           name="status" value="2"
                                                        {!! $category->status == 2 ? 'checked' : '' !!}>
                                                    <label class="custom-control-label" for="draft">Draft</label>
                                                </div>
                                                <div
                                                    class="custom-control-inline custom-radio custom-control-danger custom-control-lg mb-1">
                                                    <input type="radio" class="custom-control-input" id="passive"
                                                           name="status" value="3"
                                                        {!! $category->status == 3 ? 'checked' : '' !!}>
                                                    <label class="custom-control-label" for="passive">Passive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{!! $category->name !!}">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" autocomplete="off" value="{!! $category->slug !!}">
                                </div>
                                <div class="form-group">
                                    <label>Category Detail</label>
                                    <textarea name="detail" id="" cols="52" rows="10">{!! $category->detail !!}</textarea>
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
    <link rel="stylesheet" href="{{asset('vendor/dawnstar/assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('vendor/dawnstar/assets/js/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendor/dawnstar/assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script>jQuery(function(){ Dashmix.helpers(['colorpicker']); });</script>
    <script>
        CKEDITOR.replace('detail', {
            filebrowserUploadUrl: "{{route('panel.ckEditorUpload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
