@extends('front.layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@section('content')

@include('front.include.instructor_complete_profile')

<style>
        .modal{
            margin-top: 0%;
            z-index: 9999;
        }

        .toggle-class {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 55px;
        height: 25px;
        display: inline-block;
        position: relative;
        border-radius: 50px;
        overflow: hidden;
        outline: none;
        border: none;
        cursor: pointer;
        background-color: #707070;
        transition: background-color ease 0.3s;
        }

        .toggle-class:before {
        content: "";
        display: block;
        position: absolute;
        z-index: 2;
        width: 21px;
        height: 20px;
        background: #fff;
        left: 2px;
        top: 3px;
        border-radius: 50%;
        font: 10px/28px Helvetica;
        text-transform: uppercase;
        font-weight: bold;
        text-indent: -22px;
        word-spacing: 9px;
        color: #fff;
        text-shadow: -1px -1px rgba(0,0,0,0.15);
        white-space: nowrap;
        box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        transition: all cubic-bezier(0.3, 1.5, 0.7, 1) 0.3s;
        }

        .toggle-class:checked {
        background-color: #1667a5;
        }

        .toggle-class:checked:before {
        left: 32px;
        }

        .form-control-sm {
            min-height: calc(1.5em + 0.5rem + 2px);
            padding: 0.25rem 1.5rem !important;
            font-size: 0.875rem;
            border-radius: 0.2rem;
        }
    </style>
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="dashboard_titles mt-1">Classes</h4>
                    <a href="{{ route('instructor_add_classes') }}" class="btn btn-secondary dashboard_btn_lg text-uppercase mb-3">Add Classes</a>
                </div>
                <div class="card maz__dashboard__card">
                
                    <div class="table-responsive" style="padding:10px;">
                        <table id="videos-datatable" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Class Name</th>
                                    <th>Level</th>
                                    <th>Discipline</th>
                                    <th>Preview</th>
                                    <th>Publish</th>
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
{{-- Delete Instructor Biography Video Confirmation Modal Dialog --}}
<div class="modal fade" id="deleteInstructorDemonstrationVideo" tabindex="-1" aria-labelledby="deleteInstructordemonstrationVideoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="body-content my-5">
                    <h4>Are you sure do you want to delete <span id="deleteClass">this class</span>?</h4>
                </div>
                <div class="button-groups mb-5">
                    <a id="deleteDemonstrationYesLink" href="javscript:void(0);" class="btn btn-secondary dashboard_btn_sm text-uppercase me-3">Yes</a>
                    <a href="javscript:void(0);" class="btn btn-primary dashboard_btn_sm dashboard_btn_danger text-uppercase" data-bs-dismiss="modal">No</a>
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="padding:10px;background-color:antiquewhite;">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Video.</h5> -->
          <div class="text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
        <!-- </div> -->
        <div class="body-content my-5" style="text-align:center;">
            <h4> Are you sure, Do you want to delete this class?</h4>
        </div>
        <div class="button-groups mb-3" style="text-align:center;">
            <button type="button" class="btn btn-primary dashboard_btn_sm dashboard_btn_danger text-uppercase" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-secondary dashboard_btn_sm text-uppercase me-3  delete-btn">Delete</button>
        </div>
        
       
      </div>
    </div>
  </div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function(){
            var oTable = $('#videos-datatable').DataTable({
            processing: true,
            serverSide: true,
			responsive: true,
			searching: true,
			ordering: true,
            pagingType: "full_numbers",
			ajax: {
				url: "{!! 'classes_datatable' !!}",
				data:function(data) {
				}
			},
            columns: [
                { data: 'DT_RowIndex', searchable: false, orderable:false, width: 20 },
                {
                    data: 'class_id',
                    name: 'class_id'
                },
                {
                    data: 'level',
                    name: 'level'
                },
                {
                    data: 'discipline',
                    name: 'discipline'
                },
                {
                    data: 'preview',
                    name: 'preview',
                    render:function (data, type, full, meta) {
                        return "<div class='btn-group'><a class='btn btn-info btn-xs me-1' title='Edit' href='" + full.preview + "'><i class='fa fa-eye'></i></a></div>";
                    }
                },
                {
                    data: 'publish', 
                    name: 'publish',
                    render:function (data, type, full, meta) {

                        if(full.publish == 1)
                        {
                            return "<div class='custom-control custom-switch'><input data-id="+full.id+" class='toggle-class' type='checkbox' data-onstyle='success' data-offstyle='danger' data-toggle='toggle' data-on='Active' data-off='InActive' checked onclick='markPusblished(" + full.id + ")' value='0' id='classId_"+full.id+"'></div>";
                            // return toggle;
                        }
                        else
                        {
                            return "<div class='custom-control custom-switch'><input data-id="+full.id+" class='toggle-class' type='checkbox' data-onstyle='success' data-offstyle='danger' data-toggle='toggle' data-on='Active' data-off='InActive' value='1' onclick='markPusblished(" + full.id + ")' id='classId_"+full.id+"'></div>";
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
                  
                    render:function(o){
                        
                        var element =  '<div class="btn-group">';
                        element +=  "<a class='btn btn-warning btn-xs me-1' title='Edit' href='class/" + o.id + "/edit'><i class='fa fa-edit'></i></a>";
                        element +=  '<button class="btn btn-danger btn-xs" title="Delete" onclick="deleteClass(' + o.id + ')" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></button>';
                        element +=  '</div>';
                        return element;
                        
                    }
                }
              
            ]
        });

        deleteClass = (classId) => {
            var id = classId;
            $(".delete-btn").unbind().click(function(){
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method:"DELETE",
                    url: 'classes/'+id,
                    async:false,
                    dataType: 'json',
                    success: function(res){
                        $("#exampleModal").modal('hide');
                        $('#videos-datatable').DataTable().ajax.reload(false);
                        toastr.success(res.message);
                    },
                    error: function(response){
                        $("#exampleModal").modal('hide');
                        $('#videos-datatable').DataTable().ajax.reload(false);
                        toastr.error(response.message);
                    }

                });
            });
        }
        
        markPusblished = (classId) => {
            var id = classId;
            var value = $('#classId_'+id).val();
 
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method:"POST",
                url: 'markPublished',
                data:{value:value,id:id},
                dataType: 'json',
                success: function(res){
                    // $('#videos-datatable').DataTable().ajax.reload(false);
                    $('#videos-datatable').DataTable().ajax.reload(null, false );
                    toastr.success(res.message);
                },
                error: function(response){
                    $('#videos-datatable').DataTable().ajax.reload(null, false);
                    toastr.error(response.message);
                }

            });
        }

        });
        
    </script>
    
@endpush