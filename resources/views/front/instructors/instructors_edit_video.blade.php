@extends('front.layouts.app')
@section('content')
{{-- Include Wistia Css --}}
<link rel="stylesheet" href="//fast.wistia.com/assets/external/uploader.css" />
<script src="https://player.dacast.com/js/player.js?{{ @$videoData['dacast_video_asset_id']}}"></script>
{{-- Include Instructor Complete Profile Header --}}
@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <h4 class="dashboard_titles">Update Video</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="POST" action="{{ route('instructor_update_video') }}" class="maz__register-form" id="addBiographyVideoForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="video_id" name="video_id" value="{{ $videoData['video_id']}}">
                                    <input type="hidden" id="status" name="status" value="1">
                                    <input type="hidden" id="video_name" name="video_name" value="{{ $videoData['video_name']}}">
                                    <input type="hidden" id="video_duration" name="video_duration" value="{{ $videoData['video_duration']}}">
                                    <input type="hidden" id="video_thumbnail" name="video_thumbnail" value="{{ $videoData['video_thumbnail']}}">
                                    <input type="hidden" id="id" name="id" value="{{ request()->segment(2) }}">
                                    <div class="maz__question-add-wrapper">
                                        <div class="mb-3">
                                            <label for="title" class="col-form-label text-md-end">{{ __('Title') }} <span class="text-primary">*</span></label>
                                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $title ?? '' }}" maxlength="50">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="col-form-label text-md-end">{{ __('Select Level') }} <span class="text-primary">*</span></label>
                                            <select name="main_course_category_id" class="form-control" id="main_category">
                                                <option value="">Select Level</option>
                                                @if(count($courseCategorys))
                                                    @foreach($courseCategorys as $mc)
                                                        @if($mc->id == $courseCategoryId)
                                                            <option value="{{ $mc->id }}" selected>{{ $mc->name }}</option>
                                                        @else
                                                            <option value="{{ $mc->id }}">{{ $mc->name }}</option>
                                                        @endif        
                                                    @endforeach
                                                @endif    
                                            </select>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="col-form-label text-md-end">{{ __('Select Discipline') }} <span class="text-primary">*</span></label>
                                            <select name="discipline_id" class="form-control" id="discipline">
                                                <option value="">Select Discipline</option>
                                                
                                                @if(count($disciplines))
                                                    @foreach($disciplines as $dc)
                                                        @if($dc->id == $disciplineId)
                                                            <option value="{{ $dc->id }}" selected>{{ $dc->title }}</option>
                                                        @else
                                                            <option value="{{ $dc->id }}">{{ $dc->title }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif 
                                            </select>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        @if($videoData['is_dacast_video'] == 1)
                                            <div class="my-3">
                                                <label for="biography_video_path" class="col-form-label text-md-end">Upload Teaching Video <span class="text-primary">*</span></label>
                                                
                                                <input type="file" accept="video/mp4" name="teach_video_file" class="form-control">
                                            </div>

                                            <div class="my-2" id="teach-dacast-video-player"></div>
                                        @else
                                            <div class="my-5" id="player">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <div class="wistia_embed wistia_async_{{ $videoData['video_id']}} playlistLinks=auto autoPlay=false videoFoam=true" style="height:800px;max-width:1496px;position:relative;">&nbsp;</div>
                                                </div>
                                                <button type="button" class="btn btn-warning text-uppercase me-3 mt-2" onclick="changeVideo()">Update Teaching Video</button>
                                            </div>
                                            <div class="mb-3" id="uploader" hidden>
                                                <label for="biography_video_path" class="col-form-label text-md-end">{{ __('Update Teaching Video') }} <span class="text-primary">*</span></label>
                                                <div id="wistia_uploader" style="height:360px;width:640px;"></div>
                                            </div>
                                        @endif
                                        <div class="d-inline">
                                            <button type="submit" class="btn btn-secondary dashboard_btn_lg text-uppercase me-3">Update</button>
                                            <a class="btn btn btn-primary text-uppercase dashboard_btn_danger dashboard_btn_lg" href="{{ route('instructor_videos') }}" style="min-width: 129px !important;">Cancel</a>
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
        
        
        $("#addBiographyVideoForm").validate({
            rules: {
                title: {
                    required: true,
                    maxlength: 50
                },
                main_course_category_id: {
                    required: true,
                },
                discipline_id: {
                    required: true,
                }
            },
            messages: {
                title: {
                    required: "Title is required",
                    maxlength: "Title cannot be more than 50 characters"
                },
                main_course_category_id: {
                    required: "Level is required",
                },
                discipline_id: {
                    required: "Discipline is required",
                }
            },
            submitHandler: function(form) {
                // This function will be called when the form is valid
                $('div.main-loader-please-wait').show();
                form.submit(); // This will submit the form
            }
        });

        if('{{ @$videoData["is_dacast_video"] }}' == 1){
            var CONTENT_ID = "{{ @$videoData['dacast_video_asset_id']}}"
            var myPlayer = dacast(CONTENT_ID, 'teach-dacast-video-player', { 
                width: 500, 
                height: 300,
                // player: "flow7"
            });
        }
        else{
            // Wistia Code Section
            window._wapiq = window._wapiq || [];
            _wapiq.push(function(W) {
                window.wistiaUploader = new W.Uploader({
                    accessToken: "{{config("services.wistia.token")}}",
                    dropIn: "wistia_uploader",
                    projectId: '{{ $projectId }}',
                    beforeUpload: function() {
                        wistiaUploader.setFileName($("#title").val());
                        wistiaUploader.setFileDescription($("#description").val());
                    }
                });
                wistiaUploader.bind('uploadsuccess', function(file, media) {
                    if(media) {
                        $("#video_id").val(media.id);
                        $("#video_name").val(media.name);
                        $("#video_duration").val(media.duration);
                        $("#video_thumbnail").val(media.thumbnail.url);
                    }
                });
            });
        }
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