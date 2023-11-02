@extends('front.layouts.app')
@section('content')
{{-- Include Wistia Css --}}
<link rel="stylesheet" href="//fast.wistia.com/assets/external/uploader.css" />
{{-- Include Instructor Complete Profile Header --}}
@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <h4 class="dashboard_titles">Add Biography Video</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="POST" action="{{ route('instructor_post_biography') }}" class="maz__register-form" id="addBiographyVideoForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="video_id" name="video_id">
                                    <input type="hidden" id="status" name="status" value="1">
                                    <input type="hidden" id="video_name" name="video_name">
                                    <input type="hidden" id="video_duration" name="video_duration">
                                    <input type="hidden" id="video_thumbnail" name="video_thumbnail">
                                    <div class="maz__question-add-wrapper">
                                        <div class="mb-3">
                                            <label for="title" class="col-form-label text-md-end">{{ __('Title') }} <span class="text-primary">*</span></label>
                                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? '' }}" maxlength="50">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label text-md-end">{{ __('Description') }} <span class="text-primary">*</span></label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" maxlength="500" name="description">{{ old('description') ?? '' }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="biography_video_path" class="col-form-label text-md-end">{{ __('Upload Lesson Video') }} <span class="text-primary">*</span></label>
                                            {{-- <div id="wistia_uploader" style="height:360px;width:640px;"></div> --}}
                                            <input type="file" accept="video/mp4" name="bio_video_file" class="form-control">
                                        </div>
                                        <div class="d-inline">
                                            <button type="submit" class="btn btn-secondary dashboard_btn_lg text-uppercase me-3">Save Biography Video</button>
                                            <a class="btn btn btn-primary text-uppercase dashboard_btn_danger dashboard_btn_lg" href="{{ route('instructor_biography') }}">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                                <div id="upload-status"></div>

                                {{-- <form id="videoUploadForm">
                                    <input type="file" id="videoFile" class="form-control" accept=".mp4,.avi,.mov">
                                    <button type="submit" class="btn btn-primary my-2">Upload Video</button>
                                </form> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="//fast.wistia.com/assets/external/api.js" async></script>
<script>
    $(document).ready(function() {
        $("#addBiographyVideoForm").validate({
            rules: {
                title: {
                    required: true,
                    maxlength: 50
                },
                description: {
                    required: true,
                    maxlength: 500
                },
                bio_video_file: {
                    required: true,
                }
            },
            messages: {
                title: {
                    required: "Title is required",
                    maxlength: "Title cannot be more than 50 characters"
                },
                description: {
                    required: "Description is required",
                    maxlength: "Description cannot be more than 500 characters"
                }
            }
        });

        $('#addBiographyVideoForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('div.main-loader-please-wait').show();
                },
                complete: function(){
                    $('div.main-loader-please-wait').hide();
                },
                success: function(response) {
                    $('div.main-loader-please-wait').hide();
                    if(response.status == 'success'){
                        // $('div.main-loader-please-wait').hide();
                        toastr.success(response.message,response.status);
                        $('#upload-status').html('<div class="alert alert-success">'+ response.message +'</div>');
                        $('#upload-status').html(`<div class="alert alert-dismissible alert-success fade my-2 rounded show" role="alert"><strong>Success! </strong> `+ response.message +`<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                        $("form#addBiographyVideoForm")[0].reset();
                        setTimeout(function(){
                            window.location.href = "{{ route('instructor_biography') }}";
                        },2000)
                    }
                    else{
                        toastr.error(response.message,response.status);
                        $('#upload-status').html('<div class="alert alert-error">'+ response.message +'</div>');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    $('#upload-status').html('Error: ' + xhr.responseText);
                }
            });
        });


        // $("#videoUploadForm").submit(function(e) {
        //     e.preventDefault();

        //     var videoFile = $("#videoFile")[0].files[0];
        //     var formData = new FormData();
        //     formData.append("video", videoFile);
            // console.log(videoFile);
            // console.log(formData);
            // return false;

            // $.ajax({
            //     url: "https://api.dacast.com/v2/upload",
            //     type: "POST",
            //     data: formData,
            //     processData: false,
            //     contentType: false,
            //     headers: {
            //         "Access-Control-Allow-Origin": '{{ url('') }}',
            //         "Access-Control-Allow-Methods": 'GET, POST, PUT, DELETE',
            //         "Authorization": "Bearer YOUR_API_ACCESS_TOKEN"
            //     },
            //     crossDomain: true,  // Enable cross-domain requests
            //     xhrFields: {
            //         withCredentials: true  // Send credentials if needed
            //     },
            //     success: function(response) {
            //         // Handle the success response from Dacast
            //         console.log("Video uploaded successfully:", response);
            //     },
            //     error: function(error) {
            //         // Handle any errors
            //         console.error("Error uploading video:", error);
            //     }
            // });

            // const settings = {
            //     async: true,
            //     crossDomain: true,
            //     url: 'https://developer.dacast.com/v2/vod',
            //     method: 'POST',
            //     headers: {
            //         accept: 'application/json',
            //         'X-Format': 'default',
            //         'content-type': 'application/json',
            //         'X-Api-Key': 'api_key'
            //     }
            // };

            // $.ajax(settings).done(function (response) {
            // console.log(response);
            // });
            // console.log(formData.video);
        // });

        // try {
        //     fetch('https://api.first.org/data/v1/countries').then(function(response){
        //         return response.json()
        //     }).then(function(data){
        //         console.log(data);
        //     });
        // } catch (error) {
        //     console.log(error);
        // }
    });
</script>
@endpush