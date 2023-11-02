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
                <h4 class="dashboard_titles">Add Video on Dacast</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Video Listing</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Video On Demand API</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Images API</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        {{-- @dd($videos) --}}
                                        @if(isset($videos['status']) and ($videos['status'] == 'success'))
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Asset ID</th>
                                                            <th>ID</th>
                                                            <th>Title</th>
                                                            <th>Description</th>
                                                            <th>Thumbnail</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @if(isset($videos['data']['data']) and (count($videos['data']['data']) > 0))
                                                            @foreach($videos['data']['data'] as $key => $video)    
                                                                <tr>
                                                                    <td>{{ ++$key }}</td>
                                                                    <td>{{ $video['asset_id'] }}</td>
                                                                    <td>{{ $video['original_id'] }}</td>
                                                                    <td>{{ $video['title'] }}</td>
                                                                    <td>
                                                                        @if(!empty($video['description']))
                                                                            <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Description</a>
                                                                            <div class="collapse" id="collapseExample">
                                                                                <div class="card card-body">
                                                                                    {{ $video['description'] }}
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if(isset($video['pictures']['thumbnail'][0]) and !empty($video['pictures']['thumbnail'][0]))
                                                                        <img width="150" height="100" src="{{ $video['pictures']['thumbnail'][0] }}" alt="">
                                                                        @else
                                                                        <img src="" alt="">
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center"><a class="py-2" href="{{ route('dacast.video.play',$video['original_id']) }}"><i class="fas fa-play"></i></a></td>
                                                                </tr>
                                                            @endforeach    
                                                        @else
                                                            <tr>
                                                                <td colspan="7" class="small text-center">video not available</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h2>Upload Video</h2>
                                        <form id="video-upload-form" action="{{ route('instructor.video.upload') }}" method="post" enctype="multipart/form-data" >
                                            @csrf
                                            <div class="form-group my-3">
                                                <label for="upload-video">Please select video</label>
                                                <input type="file" class="form-control" name="video" id="upload-video" accept=".mp4">
                                            </div>
                                            <button type="submit" class="btn btn-info" id="upload-button">Upload</button>
                                        </form>
                                        <div id="upload-status"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form id="imageUploadForm">
                                            <input type="file" id="upload_server_video" class="form-control" accept=".mp4">
                                            <button type="submit" class="btn btn-primary my-2">Images Video</button>
                                        </form>
                                    </div>
                                </div>
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
        $('#video-upload-form').submit(function(e) {
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

                    if(response.status == 'success'){
                        toastr.success(response.message,response.status);
                        $('#upload-status').html('<div class="alert alert-success">'+ response.message +'</div>');
                        $('#upload-status').html(`<div class="alert alert-dismissible alert-success fade my-2 rounded show" role="alert"><strong>Success! </strong> `+ response.message +`<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                        $("form#video-upload-form")[0].reset();
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

        // $('#imageUploadForm').submit(function(e) {
        //     e.preventDefault();

        //     var video = $('#upload_server_video')[0].files[0];
        //     // console.log(video);
        //     // return false;
        //     const settings = {
        //         async: true,
        //         crossDomain: true,
        //         url: 'https://developer.dacast.com/v2/vod',
        //         method: 'POST',
        //         headers: {
        //             accept: 'application/json',
        //             'X-Format': 'default',
        //             'content-type': 'application/json',
        //             'X-Api-Key': '1697816583cjfcrU0IYI1Nk7aWxoF9kr7HgAb5Laju'
        //         },
        //         processData: false,
        //         data: '{"source":'+ video +',"upload_type":"ajax"}'
        //     };

        //     $.ajax(settings).done(function (response) {
        //         console.log(response);
        //     });
        // });
        
    });
</script>
@endpush