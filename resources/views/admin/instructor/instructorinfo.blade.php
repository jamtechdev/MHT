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
                    <a>Instructor Info</a>
                </li>
            </ol>
        </div>
    </div>
    <!--Conformation Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                    <button type="button" class="btn-close close_modal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to change approval of instructor?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_modal" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary status_approval"
                        onclick="myfunc(event ,{{ $result['is_approved'] }})">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="ibox product-detail">
        <div class="ibox-content">

            <div class="row">
                <div class="col-md-7">

                    <h2 class="font-bold m-b-xs">
                        Instructor Info
                    </h2>
                    <hr>

                    <h4>Instructor Description</h4>

                    <dl class="small m-t-md">
                        <dt>Name</dt>
                        <dd>{{ $result['name'] }}</dd>
                        <dt>Email</dt>
                        <dd>{{ $result['email'] }}</dd>
                        <dt>Phone</dt>
                        <dd>{{ $result['phone'] }}</dd>
                        <dt>School_Name</dt>
                        <dd>{{ $result['school_name'] }}</dd>
                        <dt>Status</dt>
                        <dd>{{ $result['is_approved'] }}</dd>
                    </dl>
                    <hr>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Status Approval</label>
                        <div class="col-lg-10">
                            <div class="form-check form-switch">
                                <input class="form-check-input " {{ $result['is_approved'] == 1 ? 'checked' : '' }}
                                    type="checkbox" name="active-box" id="flexSwitchCheckDefault" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                            </div>
                        </div>
                        <div class="text-left">
                            <a href="{{ url('admins/instructor') }}" class="btn btn-white btn-sm">Cancel</a>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(".close_modal").on("click", function(){
            window.location.reload();
        })
        function myfunc(event ,statusid) {
            $.ajax({
                type: 'get',
                url: `${statusid}`,
                success: function(response) {
                    $("#exampleModal").modal('hide');
                    toastr.success(response.message);
                    setTimeout(function(){
                        window.location.reload();
                    }, 4000);
                },
                error: function(response) {
                    $("#exampleModal").modal('hide');
                    toastr.error(response.message);
                    setTimeout(function(){
                        window.location.reload();
                    }, 4000);
                }
            });

        }
    </script>
@endpush
