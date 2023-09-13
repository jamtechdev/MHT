@extends('admin.layouts.app')
@section('title', 'Create '. $module_name)
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		@if(isset($module_name))
		<h2>{{ $module_name }}</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url(config('settings.ADMIN_PREFIX').'admin') }}">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a>Create {{ $module_name }}</a>
			</li>
		</ol>
		@endif
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					@if(isset($module_name))
					<h5>Create {{ $module_name }}</h5>
					@endif
				</div>
				<div class="ibox-content">
					<form id="usercreateform" class='form-horizontal' method="POST" action="{{ $module_route }}"
						enctype="multipart/form-data">
						@csrf
						@include("admin.$module_view._form")
						<div class="text-center">
							<a href="{{ $module_route }}" class="btn btn-white btn-sm">Cancel</a>
							<button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-check"></i>
								Save
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push("scripts")
<script>
    $(document).ready(function(){
        // Add Phone Input Mask
        $('#phone').usPhoneFormat();

        // Define Form Jquary Validator
        $("#usercreateform").validate({
            rules: {
                firstname: {
                    required: true,
                },
                lastname: {
                    required: true,
                },
                email: {
                    required:true,
                    email:true,
                },
                phone: {
                    required: true,
                    phoneUS: true,
                    minlength: 12,
                    maxlength: 12
                },
                age_group: {
                    required: true,
                    maxlength: 10,
                },
                gender: {
                    required: true,
                },
                profile_picture: {
                    required: true,
                    maxsize: 500000,
                    extension: "jpg,jpeg,png",
                },
                password: {
                    required:true,
                    minlength:8,
                },
                password_confirmation: {
                    required:true,
                    equalTo: '#password',
                },
            },
            messages: {
                firstname:{
                    required: "first name is required",
                },
                lastname:{
                    required: "lastname is required",
                },
                email:{
                    required: "Email is required",
                    email: "Please enter vaild email"
                },
                phone: {
                    required: "Phone is required",
                    phoneUS: "Please specify a valid phone",
                    minlength: "Phone must be at least 12 characters",
                    maxlength: "Phone cannot be more than 12 characters"
                },
                age_group: {
                    required: "Age group is required"
                },
                gender: {
                    required: "Gender is required"
                },
                profile_picture: {
                    required: "Profile picture is required",
                    maxsize: "The Profile picture must not be greater than 500 kilobytes.",
                    extension: "The profile picture must be a file of type: jpg, jpeg, png."
                },
                password:{
                    required: "Password is required",
                    minlength:"please enter password more than 8 characters",
                },
                password_confirmation: {
                    required: "Confirm Password is required",
                    equalTo:"The password and confirmation password do not match"
                }
            }
        })
    });

</script>
@endpush
