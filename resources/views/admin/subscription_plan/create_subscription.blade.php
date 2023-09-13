@extends('admin.layouts.app')
@section('title', 'Create Subscription Plan')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		<h2>Create Subscription Plan</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url(config('settings.ADMIN_PREFIX').'admin') }}">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a>Create Subscription Plan</a>
			</li>
		</ol>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Create Subscription Plan</h5>
				</div>
				<div class="ibox-content">
					<form id="subscriptionPlanForm" class='form-horizontal' method="POST" action="{{ url('admins/newSubscription')}}">
						@csrf
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

            $("#subscriptionPlanForm").validate({
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
