@extends('Dawnstar::layouts.app')

@section('content')
    <main id="main-container">
        <div class="content content-full">
            <div class="d-flex justify-content-between align-items-center mt-6 mb-3">
                <h2 class="font-w300 mb-0">Categories</h2>
                <a href="{!! route('panel.category.create') !!}" class="btn btn-primary btn-sm btn-primary btn-rounded px-3">
                    <i class="fa fa-plus mr-1"></i> New Category
                </a>
            </div>

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
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">#ID</th>
                            <th class="text-center" style="width: 5%;">Status</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center">Detail</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Created At</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Updated At</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $data)
                            <tr>
                                <td class="text-center">{!! $data->id !!}</td>
                                <td class="d-none d-sm-table-cell text-center">
                                    @if($data->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @elseif($data->status == 2)
                                        <span class="badge badge-warning">Uncheck</span>
                                    @elseif($data->status == 3)
                                        <span class="badge badge-danger">Passive</span>
                                    @endif
                                </td>
                                <td class="font-w600 text-center">
                                    <a href="#">{!! $data->name !!}</a>
                                </td>
                                <td class="font-w600 text-center">
                                    <a href="#">{!! url('category/'.$data->slug) !!}</a>
                                </td>
                                <td class="font-w600 text-center">
                                    <a href="#">{!! \Str::limit(strip_tags($data->detail), 50) !!}</a>
                                </td>
                                <td class="font-w600 text-center d-none d-sm-table-cell">
                                    {!! $data->created_at !!}
                                </td>
                                <td class="font-w600 text-center d-none d-sm-table-cell">
                                    {!! $data->updated_at !!}
                                </td>
                                <td class="text-center d-none d-sm-table-cell">
                                    <div class="btn-group">
                                        <a href="{!! route('panel.category.edit', ['id' => $data->id]) !!}" class="btn btn-sm btn-primary"
                                           data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="{!! route('panel.category.delete', ['id' => $data->id]) !!}"
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
    <script src="{!! asset("vendor/dawnstar/js/plugins/datatables/jquery.dataTables.min.js") !!}"></script>
    <script src="{!! asset("vendor/dawnstar/js/plugins/datatables/dataTables.bootstrap4.min.js") !!}"></script>
    <script src="{!! asset("vendor/dawnstar/js/pages/be_tables_datatables.min.js?v=1") !!}"></script>
@endpush
