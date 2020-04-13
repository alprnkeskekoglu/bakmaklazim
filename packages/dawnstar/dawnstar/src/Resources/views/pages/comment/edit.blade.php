@extends('Dawnstar::layouts.app')

@section('content')
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Comment</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    <form action="{!! route("panel.comment.update", ['id' => $comment->id]) !!}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <h2 class="content-heading pt-0">{!! $comment->name !!}</h2>
                        <div class="row push">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-9 col-xl-8">
                                <div class="form-group row mt-5">
                                    <label class="col-4"><b>Status</b></label>
                                    <div class="col-8">
                                        <div class="custom-control-inline custom-radio custom-control-success custom-control-lg mb-1">
                                            <input type="radio" class="custom-control-input" id="active"
                                                   name="status" value="1"
                                                    {!! $tag->status == 1 ? 'checked' : '' !!}>
                                            <label class="custom-control-label" for="active">Active</label>
                                        </div>
                                        <div
                                            class="custom-control-inline custom-radio custom-control-warning custom-control-lg mb-1">
                                            <input type="radio" class="custom-control-input" id="draft"
                                                   name="status" value="2"
                                                {!! $tag->status == 2 ? 'checked' : '' !!}>
                                            <label class="custom-control-label" for="draft">Draft</label>
                                        </div>
                                        <div
                                            class="custom-control-inline custom-radio custom-control-danger custom-control-lg mb-1">
                                            <input type="radio" class="custom-control-input" id="passive"
                                                   name="status" value="3"
                                                {!! $tag->status == 3 ? 'checked' : '' !!}>
                                            <label class="custom-control-label" for="passive">Passive</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-select-multiple">Category</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option {{ $tag->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{!! $category->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{!! $tag->name !!}">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" autocomplete="off" value="{!! $tag->slug !!}">
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

