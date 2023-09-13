@extends('admin.layouts.app')
@section('title', 'Instructor')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Instructor</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/admins') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Instructor List</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5 class="card-title mb-0">Instructor List</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="instructor-datatable" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>School Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>
    $(document).ready(function(){

        var oTable = $('#instructor-datatable').DataTable({
            processing: true,
            serverSide: true,
			responsive: true,
			searching: true,
			ordering: true,
            order: [0, 'desc'],
            pagingType: "full_numbers",
			ajax: {
				url: "{!! 'instructor/datatable' !!}",
				data:function(data) {
				}
			},
            columns: [
                {
                    data: 'id',
                    name: 'id',
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
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'school_name',
                    name: 'school_name'
                },
                {
                    data:null,
                    orderable: false,
                    searchable: false,
                    responsivePriority: 1,
                    targets: 0,
                    className:"text-center",
                    render:function(o){
                        var element =  '';
                        if(o.is_approved == 1){
                             element +=  '<span class="badge bg-success">Active</span>';
                        }else{
                            element += '<span class="badge bg-danger">Inactive</span>';
                        }
                        return element;
                    }
                },
                {
                    data: null,
                    name: 'created_at',
                    render:function(obj) {
                        return moment.utc(obj.created_at).local().format('MM-DD-YYYY HH:mm:ss');
                    }
                },
                {
                    data:  null,
                    orderable: false,
                    searchable: false,
                    responsivePriority: 1,
                    targets: 0,
                    className:"text-center",
                    render:function(o){
                        var element =  '<div class="btn-group">';
						element +=  "<a class='btn btn-warning btn-xs' title='Info' href='instructor/" + o.id + "/info'><i class='fa fa-info-circle'></i></a>";
						element +=  '</div>';
						return element;
                    }
                }
            ]
        });
	});


</script>
@endpush
