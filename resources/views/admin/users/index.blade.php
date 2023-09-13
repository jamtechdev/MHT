@extends('admin.layouts.app')
@section('title', $module_name)
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <h2>{{ $module_name }}</h2>
            </div>
            <div class="col-lg-6 mt-4">
                <div class="pull-right"><a href="{{ $module_route.'/export' }}" class="btn btn-primary">Export to Excel</a></div>
            </div>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/admins') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>{{ $module_name }} List</a>
            </li>
        </ol>
    </div>
</div>
<!--Student Information -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <dl class="small m-t-md">
                <dt>Name</dt>
                <dd id="studentName"></dd>
                <dt>Email</dt>
                <dd id="studentEmail"></dd>
                <dt>Phone</dt>
                <dd id="studentPhone"></dd>
                <dt>Age_Group</dt>
                <dd id="studentAgeGroup"></dd>
                <dt>Gender</dt>
                <dd id="studentGender"></dd>
                <dt>Profile Picture</dt>
                <img src="" id="studentProfilePicture" width="150">
            </dl>
            <hr>
        </div>
      </div>
    </div>
  </div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    @if(isset($module_name))
                    <h5 class="card-title mb-0">{{ $module_name }} List</h5>
                    @endif
                    <div class="ibox-tools filterAllLable">
                        <div data-toggle="buttons" class="btn-group btn-group-toggle filterAllClass">
                            <label class="btn btn-sm btn-white active" id="all">
                                <input style="display: none;" type="radio" id="userType3" name="userAll" value="all" checked> All
                            </label>
                        </div>
                        <div data-toggle="buttons" class="btn-group btn-group-toggle filterClass">
                            <label class="btn btn-sm btn-white" id="block">
                                <input style="display: none;" type="radio" id="userType2" name="userTypeStatus" value="block"> Block
                            </label>
                            <label class="btn btn-sm btn-white" id="unblock">
                                <input style="display: none;" type="radio" id="userType1" name="userTypeStatus" value="unblock"> Unblock
                            </label>
                        </div>

                        <div data-toggle="buttons" class="btn-group btn-group-toggle filterRequestClass">
                            <label class="btn btn-sm btn-white" id="freeUser">
                                <input style="display: none;" type="radio" id="userType4" name="userRequestType" value="free" > Free
                            </label>
                            <label class="btn btn-sm btn-white" id="paidUser">
                                <input style="display: none;" type="radio" id="userType5" name="userRequestType" value="paid" > Paid
                            </label>
                        </div>

                        <div data-toggle="buttons" class="btn-group btn-group-toggle filterVerifiedClass">
                            <label class="btn btn-sm btn-white" id="verifiedUser">
                                <input style="display: none;" type="radio" id="userType6" name="userIsVerified" value="verified" > Verified
                            </label>
                            <label class="btn btn-sm btn-white" id="pendingUser">
                                <input style="display: none;" type="radio" id="userType7" name="userIsVerified" value="pending" > Pending
                            </label>
                        </div>
                        {{-- @can('user_add')
                        <a class="btn btn-primary btn-xs" href="{{ $module_route.'/create' }}" title="Add"><i class="fa fa-plus"></i> Add</a>
                        @endcan --}}
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="users-datatable" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Subscription</th>
                                    <th>Verified</th>
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
    $(document).ready(function() {

        // Add Remove Active Class From Filter Radio
        $("input[type='radio'][name='userAll']").click(function (e) {
            if($(this).is(':checked'))  {
                $("input[type='radio'][name='userRequestType']").prop( "checked", false );
                $("input[type='radio'][name='userIsVerified']").prop( "checked", false );
                $("input[type='radio'][name='userTypeStatus']").prop( "checked", false );
                $(this).parent().addClass('active');
                $("#users-datatable").DataTable().ajax.reload(false);
                $(".filterClass label").removeClass('active');
                $(".filterRequestClass label").removeClass('active');
                $(".filterVerifiedClass label").removeClass('active');
            }
        });

        $("input[type='radio'][name='userTypeStatus']").click(function (e) {
            if($(this).is(':checked'))  {
                $("input[type='radio'][name='userAll']").prop( "checked", false );
                $(".filterAllClass label").removeClass('active');
                $(".filterClass label").removeClass('active');
                $(this).parent().addClass('active');
                $("#users-datatable").DataTable().ajax.reload(false);
            }
        });

        $("input[type='radio'][name='userRequestType']").click(function () {
            if($(this).is(':checked'))  {
                $("input[type='radio'][name='userAll']").prop( "checked", false );
                $(".filterAllClass label").removeClass('active');
                $(".filterRequestClass label").removeClass('active');
                $(this).parent().addClass('active');
                $("#users-datatable").DataTable().ajax.reload(false);
            }
        });

        $("input[type='radio'][name='userIsVerified']").click(function () {
            if($(this).is(':checked'))  {
                $("input[type='radio'][name='userAll']").prop( "checked", false );
                $(".filterAllClass label").removeClass('active');
                $(".filterVerifiedClass label").removeClass('active');
                $(this).parent().addClass('active');
                $("#users-datatable").DataTable().ajax.reload(false);
            }
        });

        var oTable = $('#users-datatable').DataTable({
            processing: true,
            serverSide: true,
			responsive: true,
			searching: true,
			ordering: true,
            order: [0, 'desc'],
            pagingType: "full_numbers",
			ajax: {
				url: "{!! $module_route.'/datatable' !!}",
				data:function(d) {
                    var filterTypeStatus = $("input[type='radio'][name='userTypeStatus']:checked").val();
                    var filterTypeRequest = $("input[type='radio'][name='userRequestType']:checked").val();
                    var filterTypeIsVerified = $("input[type='radio'][name='userIsVerified']:checked").val();
                    var filterTypeAll = $("input[type='radio'][name='userAll']:checked").val();
                    d.filterAllValue = filterTypeAll
                    d.filterStatusValue = filterTypeStatus;
                    d.filterRequestValue = filterTypeRequest;
                    d.filterIsVerifiedValue = filterTypeIsVerified;
				}
			},
            columns: [
                // { data: 'DT_RowIndex', searchable: false, orderable:false, width: 20 },
                {
                    data: 'id',
                    name: 'id'
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
                    data: 'request_type',
                    orderable: true,
                    searchable: true,
                    responsivePriority: 1,
                    targets: 0,
                    className:"text-center",
                    render:function(data, type, row) {
                        var element =  '';
                        if(data == "free") {
                            element +=  '<span class="badge bg-success">Free</span>';
                        } else {
                            element += '<span class="badge bg-primary">Paid</span>';
                        }
                        return element;
                    }
                },
                {
                    data:'email_verified_at',
                    orderable: true,
                    searchable: true,
                    responsivePriority: 1,
                    targets: 0,
                    className:"text-center",
                    render:function(data, type, row) {
                        var element =  '';
                        if(data) {
                            element += '<span class="badge bg-success">Verified</span>';
                        } else {
                            element +=  '<span class="badge bg-danger">Pending</span>';
                        }
                        return element;
                    }
                },
                {
                    data: null,
                    name: 'created_at',
                    render:function(o) {
                        return moment.utc(o.created_at).local().format('MM-DD-YYYY HH:mm:ss');
                    }
                },
                {
                    data:  null,
                    orderable: false,
                    searchable: false,
                    responsivePriority: 1,
                    targets: 0,
                    className:"text-center",
                    visible: "{{ ($authUser->can('user_edit') || $authUser->can('user_delete')) }}",
                    render:function(o){
						var element =  '<div class="btn-group">';
                            element +=  '<a class="btn btn-info btn-xs me-1" title="View" id="view" data-name="'+ o.name +'" data-email="'+o.email+'" data-phone="'+ o.phone+'" data-age="'+ o.age_group+'" data-gender="'+ o.gender+'" data-picture="'+ o.profile_picture+'" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>';
                            element +=  '<button class="forgotpass btn btn-primary btn-xs me-1" title="Reset Password" id="' + o.email + '" ><i class="fa fa-key"></i></button>';
                            element +=  '@can("user_edit")<a class="btn btn-warning btn-xs me-1" title="Edit" href="{{ $module_route }}/' + o.id + '/edit" ><i class="fa fa-edit"></i></a>@endcan';
                            if(o.is_block) {
                                element +=  '<button class="btn btn-danger btn-xs me-1" title="Unblock" onclick="approvedUser(' + o.id + ', ' + o.is_block + ')"><i class="fa fa-ban"></i> Unblock</button>';
                            } else {
                                element +=  '<button class="btn btn-primary btn-xs me-1" title="Block" onclick="approvedUser(' + o.id + ', ' + o.is_block + ')"><i class="fa fa-ban"></i> Block</button>';
                            }
                            //element +=  '@can("user_delete")<button class="btn btn-danger btn-xs me-1" title="Delete" onclick="deleteUser(' + o.id + ')"><i class="fa fa-trash"></i></button>@endcan';
                            /*element +=  '<div class="switch">';
                            element +=  '<div class="onoffswitch">';
                            element +=  `<input type="checkbox" ${o.is_block == "1"?'checked':''} onchange="approved(${o.id},${o.is_block})" class="onoffswitch-checkbox" id="example${o.id}">`;
                            element +=  `<label class="onoffswitch-label" title="Block/Unblock" for="example${o.id}">`;
                            element +=  '<span class="onoffswitch-inner"></span>';
                            element +=  '<span class="onoffswitch-switch"></span>';
                            element +=  '</label>';
                            element +=  '</div>';
                            element +=  '</div>';*/
                            element +=  '</div>';
                        return element;
                    }
                }
            ]
        });

        deleteUser = (userId) => {
            let url = '{{ $module_route }}/'+userId;
            deleteRecordByAjax(url, "{{$module_name}}", oTable);
        }
	});

    $(document).on("click", "#view", function(){
        var name = $(this).attr("data-name");
        var email = $(this).attr("data-email");
        var phone = $(this).attr("data-phone");
        var age = $(this).attr("data-age");
        var gender = $(this).attr("data-gender");
        var picture = $(this).attr("data-picture");
        if(picture != 'null') {
            var imgSrc = picture.substring(picture.indexOf('/')+1);
            $("#studentProfilePicture").attr("src", "/storage/"+imgSrc);
        } else {
            $("#studentProfilePicture").attr("src", "../assets/front/images/avatar.png");
        }
        $("#studentName").text(name);
        $("#studentEmail").text(email);
        $("#studentPhone").text(phone);
        $("#studentAgeGroup").text(age);
        $("#studentGender").text(gender);
    });

    $(document).on("click", ".forgotpass", function () {
        var userEmailId = $(this).attr("id");
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:"POST",
            url: "{{ route('password.request') }}",
            data: { email: userEmailId },
            dataType: 'json',
            success: function(res){
                toastr.success('Reset password link has been sent successfully.');
            },
            error: function(response){
                toastr.success('Reset password link has been sent successfully.');
            }
        });
    });

    function approvedUser(userId, userStatus) {
        var statusText='block';
        if(userStatus == 1) {statusText='unblock';}else{statusText='block'}
        if(confirm("Are you sure you want to "+statusText+" user?")) {
            $.ajax({
                type: 'get',
                url: 'userstatus/' + userId + '/' + userStatus,
                success: function(d) {
                    toastr.success('Status has been updated successfully');
                    $("#users-datatable").DataTable().ajax.reload(null, false);
                },
                error: function(xhr, status, error) {
                    toastr.error('Something went wrong, please try again later');
                    $("#users-datatable").DataTable().ajax.reload(null, false);
                }
            });
        }
    }
</script>
@endpush
