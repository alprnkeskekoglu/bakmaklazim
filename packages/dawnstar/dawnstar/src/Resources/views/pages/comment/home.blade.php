@extends('Dawnstar::layouts.app')

@section('content')
    <main id="main-container">
        @include('Dawnstar::layouts.breadcrumb')
        <div class="content content-full">
            <div class="d-flex justify-content-between align-items-center mt-6 mb-3">
                <h2 class="font-w300 mb-0">Comments</h2>
            </div>

            <div class="block block-rounded block-bordered">
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">#ID</th>
                            <th class="text-center" style="width: 5%;">Status</th>
                            <th class="text-center">Blog Name</th>
                            <th class="text-center">User Name</th>
                            <th class="text-center">Detail</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Created At</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $data)
                            <tr data-id="{{$data->id}}" data-read="{{$data->read_status}}" onmouseover="setAsRead(this)">
                                <td class="text-center">{!! $data->id !!}</td>
                                <td class="d-none d-sm-table-cell text-center">
                                    @if($data->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @elseif($data->status == 2)
                                        <span class="badge badge-warning">Draft</span>
                                    @elseif($data->status == 3)
                                        <span class="badge badge-danger">Passive</span>
                                    @endif
                                </td>
                                <td class="font-w600 text-center">
                                    <a href="{!! route('panel.blog.edit', ['id' => $data->blog_id]) !!}">{!! $data->blog->name !!}</a>
                                </td>
                                <td class="font-w600 text-center">
                                    {!! $data->user_name !!}
                                </td>
                                <td class="font-w600 text-center w-50">
                                    <div class="text">
                                        {!! \Str::limit($data->detail, 120) !!}
                                    </div>
                                    @if(\Str::length($data->detail) > 120)
                                    <br>
                                    <button class="btn btn-sm btn-secondary float-right hideText" style="display: none;" onclick="showDetail(this, '{!! \Str::limit(addslashes($data->detail), 120) !!}')"> Hide</button>
                                    <button class="btn btn-sm btn-secondary float-right showText" onclick="showDetail(this, '{!! \Str::limit(addslashes($data->detail), 600) !!}')">Show</button>
                                    @endif
                                </td>
                                <td class="font-w600 text-center d-none d-sm-table-cell">
                                    {!! $data->created_at !!}
                                </td>
                                <td class="text-center d-none d-sm-table-cell">
                                    <div class="btn-group">
                                        @if($data->status != 1)
                                            <a href="{!! route('panel.comment.updateStatus', ['id' => $data->id, 'status' => 1]) !!}" class="btn btn-sm btn-success mr-1"
                                               data-toggle="tooltip" title="Active">
                                                <i class="fa fa-hand-point-up"></i>
                                            </a>
                                        @endif
                                        @if($data->status != 2)
                                                <a href="{!! route('panel.comment.updateStatus', ['id' => $data->id, 'status' => 2]) !!}" class="btn btn-sm btn-warning mr-1"
                                                   data-toggle="tooltip" title="Draft">
                                                    <i class="fa fa-hand-point-up"></i>
                                                </a>
                                        @endif
                                        @if($data->status != 3)
                                                <a href="{!! route('panel.comment.updateStatus', ['id' => $data->id, 'status' => 3]) !!}" class="btn btn-sm btn-danger"
                                                   data-toggle="tooltip" title="Passive">
                                                    <i class="fa fa-hand-point-up"></i>
                                                </a>
                                        @endif

                                    </div>
                                    <a href="{!! route('panel.comment.show', ['id' => $data->id]) !!}" class="btn btn-sm btn-primary ml-2">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('styles')
    <style>
        [data-read='0'] {
            background-color: #e0e0e0 !important;
        }
        [data-read='1'] {
            background-color: #fff !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="{!! asset("vendor/dawnstar/assets/js/plugins/datatables/jquery.dataTables.min.js") !!}"></script>
    <script src="{!! asset("vendor/dawnstar/assets/js/plugins/datatables/dataTables.bootstrap4.min.js") !!}"></script>

    <script>

        function showDetail(el, message) {
            $(el).siblings('.text').first().html(message);
            $(el).siblings('button').first().show();
            $(el).hide();
        }

        function setAsRead(element) {
            if($(element).attr('data-read') != 1) {
                $.ajax({
                    url: "{{route('panel.comment.updateRead')}}",
                    method: "get",
                    data: {"id": $(element).attr('data-id')},
                    success: function(response) {
                        $(element).attr('data-read', "1");
                    }
                })
            }
        }

        var table = $('table').DataTable({
            "iDisplayLength": 10,
            "info": false,
            "ordering": false,
            "dom": '<"top"f>rt<"bottom"lp><"clear">'
        });
    </script>
@endpush
