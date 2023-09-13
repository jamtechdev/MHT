@extends('admin.layouts.app')
@section('title', 'Create Promocode')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		<h2>Create Promocode</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url(config('settings.ADMIN_PREFIX').'admin') }}">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a>Create Promocode</a>
			</li>
		</ol>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Create Promocode</h5>
				</div>
				<div class="ibox-content">
					<form id="promocodeCreateForm" class='form-horizontal' method="POST" action="{{ url('admins/promocode')}}">
					<form>
						@csrf
						@include("admin.promocode._form")
						<div class="text-end">
							<a href="{{ url('admins/promocode')}}" class="btn btn-white btn-sm">Cancel</a>
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
            $("#promocodeCreateForm").validate({
                rules: {
                    promocode: {
                        required: true,
                    },
					value: {
                        required: true,
                    },
					price_type: {
                        required: true,
                    },
                },
                messages: {
                    promocode: {
                        required: "Promocode is required",
                    },
					value: {
                        required: "Value is required",
                    },
					price_type: {
                        required: "Price type is required",
                    },
                }
            })
        });
    </script>
@endpush
