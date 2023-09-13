@extends('admin.layouts.app')
@section('title', 'Change Banner')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Home Page Banner</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/admins') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Home page banner</a>
            </li>
        </ol>
    </div>
</div>
  <!--Delete Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Banner</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this banner?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger delete-btn">Delete</button>
        </div>
      </div>
    </div>
  </div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5 class="card-title mb-0">Home page banner</h5>
                    <div class="ibox-tools">
                        @can('user_add')
                            <a class="btn btn-primary btn-xs" href="{{ 'banner/create' }}" title="Add"><i class="fa fa-plus"></i> Add</a>
                        @endcan
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="banners-datatable" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Banner ID</th>
                                    <th>Thumbnail</th>
                                    <th>Status</th>
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


<script>
    $(document).ready(function(){

        var oTable = $('#banners-datatable').DataTable({
            processing: true,
            serverSide: true,
			responsive: true,
			searching: true,
			ordering: true,
            pagingType: "full_numbers",
			ajax: {
				url: "{!! 'banners/datatable' !!}",
				data:function(data) {
				}
			},
            columns: [
                { data: 'DT_RowIndex', searchable: false, orderable:false, width: 20 },
                {
                    data: 'banner_id',
                    name: 'banner_id'
                },
                {
                    data: 'thumbnail',
                    name: 'thumbnail',
                    render:function (data, type, full, meta) {
                            return "<img src="+full.thumbnail+" style='height:50px;width:100px;'>";
                    }
                },
                {
                    data: 'status', 
                    name: 'status',
                    render:function (data, type, full, meta) {

                        if(full.status == 1)
                        {
                            return "<div class='custom-control custom-switch'><input data-id="+full.id+" class='toggle-class' type='checkbox' data-onstyle='success' data-offstyle='danger' data-toggle='toggle' data-on='Active' data-off='InActive' checked onclick='changeplanstatus(" + full.id + ")' value='0' id='planStatus_"+full.id+"'></div>";
                            // return toggle;
                        }
                        else
                        {
                            return "<div class='custom-control custom-switch'><input data-id="+full.id+" class='toggle-class' type='checkbox' data-onstyle='success' data-offstyle='danger' data-toggle='toggle' data-on='Active' data-off='InActive' value='1' onclick='changeplanstatus(" + full.id + ")' id='planStatus_"+full.id+"'></div>";
                            // return toggle;
                        }
                        
                    }
                },
                {
                    data:  null,
                    orderable: false,
                    searchable: false,
                    responsivePriority: 1,
                    targets: 0,
                    className:"text-center",
                    // visible: "{{ ($authUser->can('classcategory_edit') || $authUser->can('classcategory_delete')) }}",
                    render:function(o){
                        
                        var element =  '<div class="btn-group">';
                        element +=  "<a class='btn btn-warning btn-xs me-1' title='Edit' href='banner/" + o.id + "/edit'><i class='fa fa-edit'></i></a>";
                        element +=  '<button class="btn btn-danger btn-xs" title="Delete" onclick="deletesubscriptionplan(' + o.id + ')" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></button>';
                        element +=  '</div>';
                        return element;
                        
                    }
                }
              
            ]
        });

        deletesubscriptionplan = (classId) => {
            var id = classId;
            
            $(".delete-btn").click(function(){
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method:"DELETE",
                    url: 'banner/'+id,
                    dataType: 'json',
                    success: function(res){
                        $("#exampleModal").modal('hide');
                        $('#banners-datatable').DataTable().ajax.reload(false);
                        toastr.success(res.message);
                    },
                    error: function(response){
                        $("#exampleModal").modal('hide');
                        $('#banners-datatable').DataTable().ajax.reload(false);
                        toastr.error(response.message);
                    }

                });
            });
        }

        changeplanstatus = (classId) => {
            var id = classId;
            var value = $('#planStatus_'+id).val();
 
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method:"POST",
                url: 'bannerstatus/'+id,
                data:{value:value},
                dataType: 'json',
                success: function(res){
                    $("#exampleModal").modal('hide');
                    $('#banners-datatable').DataTable().ajax.reload(false);
                    toastr.success(res.message);
                },
                error: function(response){
                    $("#exampleModal").modal('hide');
                    $('#banners-datatable').DataTable().ajax.reload(false);
                    toastr.error(response.message);
                }

            });
        }       
	});
</script>
@endpush
