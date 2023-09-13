@extends('admin.layouts.app')
@section('title', 'Edit Plan')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		<h2>Subscription Plan</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url(config('settings.ADMIN_PREFIX').'admin') }}">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a>Edit Subscription Plan</a>
			</li>
		</ol>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Edit Subscription Plan</h5>
				</div>
				<div class="ibox-content">
					<form id="planEditForm" class='form-horizontal' method="POST" action="{{ url('admins/subscriptionplan/'.$result['id'])}}">
						@csrf
						<input name="_method" type="hidden" value="PUT">
						@include("admin.subscription_plan._form")
						<div class="text-end">
							<a href="{{ url('admins/subscriptionplan')}}" class="btn btn-white btn-sm">Cancel</a>
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

			$('#benefits').select2();

            $("#planEditForm").validate({
                rules: {
                    plan_name: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
					validity_number: {
                        required: true,
                    },
					validity_type: {
                        required: true,
                    },
					'benefits[]': {
                        required: true,
						minlength: 1
                    },
					description: {
                        required: true,
                    },
                },
                messages: {
                    plan_name: {
                        required: "Plan name is required",
                    },
                    price: {
                        required: "Price is required",
                    },
					validity_number: {
                        required: "Plan validity is required",
                    },
					validity_type: {
                        required: "Plan validity is required",
                    },
					'benefits[]': {
                        required: "Benefits are required",
                    },
					description: {
                        required: "Description is required",
                    },
                },
				groups:{
					validity : "validity_number validity_type"
				},
				errorPlacement: function ( error, element ) 
				{
					if(element.parent().hasClass('input-group')){
					error.insertAfter( element.parent() );
					}else{
						error.insertAfter( element );
					}
				},
            })
        });
    </script>
@endpush
