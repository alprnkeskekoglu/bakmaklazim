@extends('Dawnstar::layouts.app')

@section('content')
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
                    <form action="{!! route("panel.admin.store") !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row push">
                            <div class="col-lg-3 col-xl-4">
                                <div class="col-sm-6 col-lg-12">
                                    <h4><b>Admin Image</b></h4>
                                    <span id="btnFile" style="cursor: pointer;">
                                        <img src="{!! 'https://via.placeholder.com/150' !!}"
                                             alt="Blog File" class="card p-1" id="imageCover"
                                             style="width: 50%; margin-left: auto; margin-right: auto; border: 1px dashed black">
                                    </span>
                                    <label>
                                        Dosya yüklemek için icon'a tıklayınız.
                                    </label>
                                    <div class="form-group" style="display: none">
                                        <div class="custom-file ">
                                            <input type="file" class="form-control" id="cover-file"
                                                   name="image" accept="image/*" onchange="loadFile(event)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-xl-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>E-posta</label>
                                    <input type="text" class="form-control" id="email" name="email" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" value="">
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
        $('#btnFile').on('click', function () {
            $('#cover-file').trigger('click');
        });

        var loadFile = function(event) {
            var output = document.getElementById('imageCover');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endpush
