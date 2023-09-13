@extends('admin.layouts.app')
@section('title', 'Create Banner')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		<h2>Create Banner</h2>
		<div class="row">
			<div class="col-md-10">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ url(config('settings.ADMIN_PREFIX').'admin') }}">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a>Create Banner</a>
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
		<div class="col-lg-12 mr-auto">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Create Banner</h5>
				</div>
				<div class="ibox-content">
					<form id="subscriptionPlanForm" class='form-horizontal' method="POST" action="{{ url('admins/newSubscription')}}">
						@csrf
						@include("admin.homePageBanner._form")
						{{-- <div class="text-end">
							<a href="{{ url('admins/subscriptionplan')}}" class="btn btn-white btn-sm">Cancel</a>
							<button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-check"></i>
								Save
							</button>
						</div> --}}
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
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
			
			$.ajax({
                method:"POST",
                url: "{{ url('admins/createNewBanner')}}",
                data:{media_id:media.id,thumbnailUrl:thumbnailUrl},
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
