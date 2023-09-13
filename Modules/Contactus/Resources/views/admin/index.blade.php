@extends(config('contactus.defaultLayout'))
@section('title', $module_name)
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h2>{{ $module_name }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url(config('contactus.routePrefix')) }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>{{ $module_name }} List</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5 class="card-title mb-0">{{ $module_name }} List</h5>
                        {{-- <div class="ibox-tools"> --}}
                        {{-- <select class="form-control" id="category-filter">
                            <option value="">All Categories</option>
                            @foreach ($category as $category)
                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                        </select> --}}
                        {{-- @can('contact_add')
                                <a class="btn btn-primary btn-xs" href="{{ $module_route . '/create' }}" title="Add"><i
                                        class="fa fa-plus"></i> Add</a>
                            @endcan --}}
                        {{-- </div> --}}
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="posts-datatable" class="table table-striped table-hover w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Query Regarding</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>
        $(document).ready(function() {
            console.log("{!! $module_route . '/datatable' !!}");
            var oTable = $('#posts-datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                pagingType: "full_numbers",
                ajax: {
                    url: "{!! $module_route . '/datatable' !!}",
                    data: function(d) {
                        d.category = $('#category-filter').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        orderable: false,
                        width: 20
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'question_regarding',
                        name: 'question_regarding'
                    },
                ]
            });

        });
    </script>
@endpush
