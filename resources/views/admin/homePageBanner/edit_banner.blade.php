@extends('admin.layouts.app')
@section('title', 'Edit Banner')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		<h2>Banner</h2>	
		<div class="row">
			<div class="col-md-10">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ url(config('settings.ADMIN_PREFIX').'admin') }}">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a>Edit Banner</a>
					</li>
				</ol>
			</div>
			<div class="col-md-2">	
				<a href="{{ url()->previous() }}" class="btn btn-sm btn-dark">Back</a>
			</div>	
		</div>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Edit Banner</h5>
				</div>
				<div class="ibox-content">
					<input type="hidden" value="{{ request()->segment(3); }}" id="banner_id">
					{{--<form id="planEditForm" class='form-horizontal' method="POST" action="{{ url('admins/banner/'.$result['id'])}}">
						@csrf
						<input name="_method" type="hidden" value="PUT">--}}
						@include("admin.homePageBanner._form")
						{{--<div class="text-end">
							<a href="{{ url('admins/subscriptionplan')}}" class="btn btn-white btn-sm">Cancel</a>
							<button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-check"></i>
								Save
							</button>
						</div>
					</form>--}}
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
	<script src="https://fast.wistia.com/assets/external/api.js" async></script>

<script>
	$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	window._wapiq = window._wapiq || [];
	_wapiq.push(function(W) {
	window.wistiaUploader = new W.Uploader({
		accessToken: "bee731aeb3f48221419f7ca1db7e3e566005fc7d76401344ac911a9f8788c6d0",
		dropIn: "wistia_uploader",
		projectId: "r78zxqf1z9"
	});

	wistiaUploader.bind('uploadembeddable', function(file, media, embedCode, oembedResponse) {
		
		var thumbnailUrl = "";

		wistiaUploader.getThumbnailUrl(media.id, { width: 300 , embedType: "async"}, function(thumbnailUrl) {
			var banner_id = $('#banner_id').val();
			
			$.ajax({
                method:"POST",
                url: "{{ url('admins/bannerUpdate')}}",
                data:{media_id:media.id,thumbnailUrl:thumbnailUrl,banner_id:banner_id},
                dataType: 'json',
                success: function(res){
                   // $("#exampleModal").modal('hide');
                    // $('#subscriptionplans-datatable').DataTable().ajax.reload(false);
                    // toastr.success(res.message);
                },
                error: function(response){
                    // $("#exampleModal").modal('hide');
                    // $('#subscriptionplans-datatable').DataTable().ajax.reload(false);
                    // toastr.error(response.message);
                }

            });

		});


		// wistiaUploader.getEmbedCode(media.id, { playerColor: "56be8e", embedType: "async" }, function(embedCode, resp) {

        //     $.ajax({
        //         method:"POST",
        //         url: "{{ url('admins/createNewBanner')}}",
        //         data:{media_id:media.id},
        //         dataType: 'json',
        //         success: function(res){
        //             $("#exampleModal").modal('hide');
        //             $('#subscriptionplans-datatable').DataTable().ajax.reload(false);
        //             toastr.success(res.message);
        //         },
        //         error: function(response){
        //             $("#exampleModal").modal('hide');
        //             $('#subscriptionplans-datatable').DataTable().ajax.reload(false);
        //             toastr.error(response.message);
        //         }

        //     });
		// });

		
	});

	

	});
</script>
@endpush
