@extends('admin.layouts.app')
@section('title', 'Create Subscription Benefit')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		<h2>Create Subscription Benefit</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url(config('settings.ADMIN_PREFIX').'admin') }}">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a>Create Subscription Benefit</a>
			</li>
		</ol>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Create Subscription Benefit</h5>
				</div>
				<div class="ibox-content">
					<form id="benefitCreateForm" class='form-horizontal' method="POST" action="{{ url('admins/subscriptionbenefit')}}">
					<form>
						@csrf
						@include("admin.subscription_benefits._form")
						<div class="text-end">
							<a href="{{ url('admins/subscriptionbenefits')}}" class="btn btn-white btn-sm">Cancel</a>
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
            $("#benefitCreateForm").validate({
                rules: {
                    benefit: {
                        required: true,
                    },
                },
                messages: {
                    benefit: {
                        required: "benefit is required",
                    },
                }
            })
        });
    </script>
@endpush
