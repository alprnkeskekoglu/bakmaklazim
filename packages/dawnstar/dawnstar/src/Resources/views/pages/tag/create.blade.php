@extends('Dawnstar::layouts.app')

@section('content')
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Tag</li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
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
                    <form action="{!! route("panel.tag.store") !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row push">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-9 col-xl-8">
                                <div class="form-group row mt-5">
                                    <label class="col-4"><b>Status</b></label>
                                    <div class="col-8">
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
                                <div class="form-group">
                                    <label for="example-select-multiple">Category</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{!! $category->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" autocomplete="off">
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

@push('scripts')
    <script>
        $('#name').on('keyup', function() {
            $('#slug').val(slugify($(this).val()));
        });

        slugify = function(text) {
            var trMap = {
                'çÇ':'c',
                'ğĞ':'g',
                'şŞ':'s',
                'üÜ':'u',
                'ıİ':'i',
                'öÖ':'o'
            };
            for(var key in trMap) {
                text = text.replace(new RegExp('['+key+']','g'), trMap[key]);
            }
            return  text.replace(/[^-a-zA-Z0-9\s]+/ig, '') // remove non-alphanumeric chars
                .replace(/\s/gi, "-") // convert spaces to dashes
                .replace(/[-]+/gi, "-") // trim repeated dashes
                .toLowerCase();

        }
    </script>
@endpush
