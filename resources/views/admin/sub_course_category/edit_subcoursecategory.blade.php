@extends('admin.layouts.app')
@section('title', 'Edit Course Category')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		<h2>Sub Course Category</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url(config('settings.ADMIN_PREFIX').'admin') }}">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a>Edit Sub Course Category</a>
			</li>
		</ol>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Edit Sub Course Category</h5>
				</div>
				<div class="ibox-content">
					<form id="categoryEditForm" class='form-horizontal' method="POST" action="{{ url('admins/coursesubcategory/'.$result['id'])}}">
						@csrf
						<input name="_method" type="hidden" value="PUT">
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
            $("#categoryEditForm").validate({
                rules: {
                    sub_category_name: {
                        required: true,
                    },
                    main_category_id: {
                        required: true,
                    }
                },
                messages: {
                    sub_category_name: {
                        required: "Sub category name is required",
                    },
                    main_category_id: {
                        required: "Select main category is required",
                    }
                }
            })
        });
    </script>
@endpush
