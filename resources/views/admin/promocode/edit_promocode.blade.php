@extends('admin.layouts.app')
@section('title', 'Edit Promocode')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		<h2>Promocode</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url(config('settings.ADMIN_PREFIX').'admin') }}">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a>Edit Promocode</a>
			</li>
		</ol>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Edit Promocode</h5>
				</div>
				<div class="ibox-content">
					<form id="promocodeEditForm" class='form-horizontal' method="POST" action="{{ url('admins/promocode/'.$result['id'])}}">
						@csrf
						<input name="_method" type="hidden" value="PUT">
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
            $("#promocodeEditForm").validate({
                rules: {
                    promocode: {
                        required: true,
                    },
					validity: {
                        required: true,
                    },
					description: {
                        required: true,
                    },
                },
                messages: {
                    promocode: {
                        required: "promocode is required",
                    },
					validity: {
                        required: "validity is required",
                    },
					description: {
                        required: "description is required",
                    },
                }
            })
        });
    </script>
@endpush
