@extends('front.layouts.app')
@section('content')
{{-- Include Wistia Css --}}
<link rel="stylesheet" href="//fast.wistia.com/assets/external/uploader.css" />
<script src="https://player.dacast.com/js/player.js?{{ $videoData['dacast_video_asset_id'] }}"></script>
{{-- Include Instructor Complete Profile Header --}}
@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <h4 class="dashboard_titles">Update Demonstration Video</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="POST" action="{{ route('instructor_update_demonstration') }}" class="maz__register-form" id="addBiographyVideoForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="video_id" name="video_id" value="{{ $videoData['video_id']}}">
                                    <input type="hidden" id="id" name="id" value="{{ $videoData['id']}}">
                                    <input type="hidden" id="status" name="status" value="1">
                                    {{-- <input type="hidden" id="video_name" name="video_name" value="{{ $videoData['video_name']}}">
                                    <input type="hidden" id="video_duration" name="video_duration" value="{{ $videoData['video_duration']}}">
                                    <input type="hidden" id="video_thumbnail" name="video_thumbnail" value="{{ $videoData['video_thumbnail']}}"> --}}
                                    <div class="maz__question-add-wrapper">
                                        <div class="mb-3">
                                            <label for="title" class="col-form-label text-md-end">{{ __('Title') }} <span class="text-primary">*</span></label>
                                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $title }}" maxlength="50">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{--<div class="mb-3">
                                            <label for="description" class="col-form-label text-md-end">{{ __('Description') }} <span class="text-primary">*</span></label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" maxlength="500" name="description">{{ old('description') ?? '' }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>--}}
                                        {{-- <div class="mb-5" id="player">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <div class="wistia_embed wistia_async_{{ $videoData['video_id']}} playlistLinks=auto autoPlay=false videoFoam=true" style="height:800px;max-width:1496px;position:relative;">&nbsp;</div>
                                            </div>
                                            <button type="button" class="btn btn-warning text-uppercase me-3 mt-2" onclick="changeVideo()">Update Demonstration Video</button>
                                        </div>
                                        <div class="mb-3" id="uploader" hidden>
                                            <label for="biography_video_path" class="col-form-label text-md-end">{{ __('Upload Demonstration Video') }} <span class="text-primary">*</span></label>
                                            <div id="wistia_uploader" style="height:360px;width:640px;"></div>
                                        </div> --}}
                                        
                                        <div class="mb-3">
                                            <label for="biography_video_path" class="col-form-label text-md-end">Upload Lesson Video <span class="text-primary">*</span></label>
                                            <input type="file" accept="video/mp4" name="demo_video_file" class="form-control">
                                        </div>

                                        <div class="my-2">
                                            <div id="demo-dacast-video-player"></div>
                                        </div>

                                        <div class="d-inline">
                                            <button type="submit" class="btn btn-secondary dashboard_btn_lg text-uppercase me-3">Update</button>
                                            <a class="btn btn btn-primary text-uppercase dashboard_btn_danger dashboard_btn_lg" href="{{ route('instructor_biography') }}" style="min-width: 129px !important;">Cancel</a>
                                        </div>
                                    </div>
                                </form>
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

        var CONTENT_ID = "{{ $videoData['dacast_video_asset_id'] }}"
        var myPlayer = dacast(CONTENT_ID, 'demo-dacast-video-player', { 
            width: 500, 
            height: 300,
            // player: "flow7"
        });

        $("#addBiographyVideoForm").validate({
            rules: {
                title: {
                    required: true,
                    maxlength: 50
                }
            },
            messages: {
                title: {
                    required: "Title is required",
                    maxlength: "Title cannot be more than 50 characters"
                }
            }
        });

        $('form#addBiographyVideoForm').submit(function(){
            $('div.main-loader-please-wait').show();
        });

        // Wistia Code Section
        // window._wapiq = window._wapiq || [];
        // _wapiq.push(function(W) {
        //     window.wistiaUploader = new W.Uploader({
        //         accessToken: "{{config("services.wistia.token")}}",
        //         dropIn: "wistia_uploader",
        //         projectId: '{{$projectId}}',
        //         beforeUpload: function() {
        //             wistiaUploader.setFileName($("#title").val());
        //             wistiaUploader.setFileDescription($("#description").val());
        //         }
        //     });
        //     wistiaUploader.bind('uploadsuccess', function(file, media) {
        //         if(media) {
        //             $("#video_id").val(media.id);
        //             $("#video_name").val(media.name);
        //             $("#video_duration").val(media.duration);
        //             $("#video_thumbnail").val(media.thumbnail.url);
        //         }
        //     });
        // });
    });
</script>
<script>
    function changeVideo()
    {
        $('#uploader').removeAttr('hidden');
        $('#player').attr('hidden',true);
    }
</script>
@endpush