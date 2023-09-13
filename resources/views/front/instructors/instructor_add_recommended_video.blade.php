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
                <h4 class="dashboard_titles">Add Recommended Video</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="POST" action="{{ route('instructor_post_recommended') }}" class="maz__register-form" id="addBiographyVideoForm" enctype="multipart/form-data">
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
                                        {{--<div class="mb-3">
                                            <label for="description" class="col-form-label text-md-end">{{ __('Description') }} <span class="text-primary">*</span></label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" maxlength="500" name="description">{{ old('description') ?? '' }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>--}}
                                        <div class="mb-3">
                                            <label for="biography_video_path" class="col-form-label text-md-end">{{ __('Upload Demonstration Video') }} <span class="text-primary">*</span></label>
                                            <div id="wistia_uploader" style="height:360px;width:640px;"></div>
                                        </div>
                                        <div class="d-inline">
                                            <button type="submit" class="btn btn-secondary dashboard_btn_lg text-uppercase me-3">Save Demonstration Video</button>
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
        $("#addBiographyVideoForm").validate({
            rules: {
                title: {
                    required: true,
                    maxlength: 50
                },
                // description: {
                //     required: true,
                //     maxlength: 500
                // }
            },
            messages: {
                title: {
                    required: "Title is required",
                    maxlength: "Title cannot be more than 50 characters"
                },
                // description: {
                //     required: "Description is required",
                //     maxlength: "Description cannot be more than 500 characters"
                // }
            }
        });

        // Wistia Code Section
        window._wapiq = window._wapiq || [];
        _wapiq.push(function(W) {
            window.wistiaUploader = new W.Uploader({
                accessToken: "{{config("services.wistia.token")}}",
                dropIn: "wistia_uploader",
                projectId: '{{$projectId}}',
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
    });
</script>
@endpush