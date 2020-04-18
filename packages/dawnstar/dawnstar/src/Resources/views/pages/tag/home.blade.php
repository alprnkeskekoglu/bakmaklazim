@extends('Dawnstar::layouts.app')

@section('content')
    <main id="main-container">
        @include('Dawnstar::layouts.breadcrumb')
        <div class="content content-full">
            <div class="d-flex justify-content-between align-items-center mt-6 mb-3">
                <h2 class="font-w300 mb-0">Tags</h2>
                <a href="{!! route('panel.tag.create') !!}" class="btn btn-primary btn-sm btn-primary btn-rounded px-3">
                    <i class="fa fa-plus mr-1"></i> New Tag
                </a>
            </div>

            <div class="block block-rounded block-bordered">
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">#ID</th>
                            <th class="text-center" style="width: 5%;">Status</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Name</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Created At</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Updated At</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $data)
                            <tr>
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
                                    <a href="{!! route('panel.category.edit', ['id' => $data->category_id]) !!}">{!! $data->category->name !!}</a>
                                </td>
                                <td class="font-w600 text-center">
                                    <a href="{!! route('panel.tag.edit', ['id' => $data->id]) !!}">{!! $data->name !!}</a>
                                </td>
                                <td class="font-w600 text-center d-none d-sm-table-cell">
                                    {!! $data->created_at !!}
                                </td>
                                <td class="font-w600 text-center d-none d-sm-table-cell">
                                    {!! $data->updated_at !!}
                                </td>
                                <td class="text-center d-none d-sm-table-cell">
                                    <div class="btn-group">
                                        <a href="{!! route('panel.tag.edit', ['id' => $data->id]) !!}" class="btn btn-sm btn-primary"
                                           data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="{!! route('panel.tag.delete', ['id' => $data->id]) !!}"
                                           class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
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

@push('scripts')
    <script src="{!! asset("vendor/dawnstar/assets/js/plugins/datatables/jquery.dataTables.min.js") !!}"></script>
    <script src="{!! asset("vendor/dawnstar/assets/js/plugins/datatables/dataTables.bootstrap4.min.js") !!}"></script>

    <script>

        var table = $('table').DataTable({
            "iDisplayLength": 10,
            "info": false,
            "ordering": false,
            "dom": '<"top"f>rt<"bottom"lp><"clear">'
        });
    </script>
@endpush
