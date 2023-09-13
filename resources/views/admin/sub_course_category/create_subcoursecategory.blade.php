@extends('admin.layouts.app')
@section('title', 'Create Course Category')
@section('content')
<style>
    .error{
        color:red;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		<h2>Create Sub Course Category</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url(config('settings.ADMIN_PREFIX').'admin') }}">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a>Create Sub Course Category</a>
			</li>
		</ol>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Create Sub Course Category</h5>
				</div>
				<div class="ibox-content">
					<form id="categoryCreateForm" class='form-horizontal' method="POST" action="{{ url('admins/coursesubcategory')}}">
						@csrf
						@include("admin.sub_course_category._form")
						<div class="text-end">
							<a href="{{ url('admins/coursecategory')}}" class="btn btn-white btn-sm">Cancel</a>
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
@push('scripts')
    <script>
        $(document).ready(function() {

			$('#main_category').select2();

            $("#categoryCreateForm").validate({
				errorElement: 'div',
            errorPlacement: function (error, element) {
      
                error.insertAfter($(element).parent('div'));
                
            },
                rules: {
                    main_category_id: {
                        required: true,
                    },
                    sub_category_name: {
                        required: true,
                    }
                },
                messages: {
                    main_category_id: {
                        required: "Main category is required",
                    },
                    sub_category_name: {
                        required: "Sub category is required",
                    }
                }
            })
        });
    </script>
@endpush
