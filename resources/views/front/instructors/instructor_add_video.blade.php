@extends('front.layouts.app')
@section('content')
{{-- Include Wistia Css --}}
<link rel="stylesheet" href="//fast.wistia.com/assets/external/uploader.css" />
{{-- Include Instructor Complete Profile Header --}}
@include('front.include.instructor_complete_profile')
<style>
    @media (min-width: 320px){
        .btn{
            font-size: 0.81rem;
        }

        #wistia_uploader{
            height:270px !important;
            width:245px !important;
        }
    }

    @media (min-width: 375px){
        .btn{
            font-size: 0.9rem;
        }

        #wistia_uploader{
            height:270px !important;
            width:308px !important;
        }
    }

    @media (min-width: 425px){
        .btn{
            font-size: 0.9rem;
        }

        #wistia_uploader{
            height:270px !important;
            width:348px !important;
        }
    }

    @media (min-width: 768px){
        .btn{
            font-size: 0.9rem;
        }

        #wistia_uploader{
            height:270px !important;
            width:500px !important;
        }
    }
</style>
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <h4 class="dashboard_titles">Add Video</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="POST" action="{{ route('instructor_post_video') }}" class="maz__register-form" id="addTeachingVideoForm" enctype="multipart/form-data">
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
                                            <label for="title" class="col-form-label text-md-end">{{ __('Select Level') }} <span class="text-primary">*</span></label>
                                            <select name="main_course_category_id" class="form-control" id="main_category">
                                                <option value="">Select Level</option>
                                                @if(count($mainCourseCategories))
                                                    @foreach($mainCourseCategories as $mc)
                                                        <option value="{{ $mc->id }}">{{ $mc->name }}</option>
                                                    @endforeach
                                                @endif    
                                            </select>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{--<div class="mb-3">
                                            <label for="title" class="col-form-label text-md-end">{{ __('Select Sub Course') }} <span class="text-primary">*</span></label>
                                            <select name="sub_course_category_id" class="form-control" id="sub_category">
                                                <option value="">Select Sub Course</option>
                                              
                                            </select>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>--}}
                                        <div class="mb-3">
                                            <label for="title" class="col-form-label text-md-end">{{ __('Select Discipline') }} <span class="text-primary">*</span></label>
                                            <select name="discipline_id" class="form-control" id="discipline">
                                                <option value="">Select Discipline</option>
                                                
                                                @if(count($disciplineData))
                                                    @foreach($disciplineData as $dc)
                                                        <option value="{{ $dc->id }}">{{ $dc->title }}</option>
                                                    @endforeach
                                                @endif 
                                            </select>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                      
                                        {{-- <div class="mb-3">
                                            <label for="biography_video_path" class="col-form-label text-md-end">{{ __('Upload Teaching Video') }} <span class="text-primary">*</span></label>
                                            <div id="wistia_uploader" style="height:360px;width:640px;"></div>
                                        </div> --}}
                                        
                                        <div class="mb-3">
                                            <label for="biography_video_path" class="col-form-label text-md-end">Upload Teaching Video <span class="text-primary">*</span></label>
                                            
                                            <input type="file" accept="video/mp4" name="teach_video_file" class="form-control">
                                        </div>

                                        <div class="d-inline">
                                            <button type="submit" class="btn btn-secondary dashboard_btn_lg text-uppercase me-3" style="margin-bottom: 0.2rem !important;">Save Video</button>
                                            <a class="btn btn btn-primary text-uppercase dashboard_btn_danger dashboard_btn_lg" style="margin-bottom: 0.2rem !important;" href="{{ route('instructor_videos') }}" style="min-width: 129px !important;">Cancel</a>
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
        $("#addTeachingVideoForm").validate({
            rules: {
                title: {
                    required: true,
                    maxlength: 50
                },
                main_course_category_id: {
                    required: true,
                },
                sub_course_category_id: {
                    required: true,
                },
                discipline_id: {
                    required: true,
                },
                teach_video_file: {
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
                sub_course_category_id: {
                    required: "Sub category is required",
                },
                discipline_id: {
                    required: "Discipline is required",
                },
                teach_video_file: {
                    required: "Teaching video is required",
                }
            },
            submitHandler: function(form) {
                // This function will be called when the form is valid
                $('div.main-loader-please-wait').show();
                form.submit(); // This will submit the form
            }
        });

        $('#main_category').on('change', function() {
            var categoryID = $(this).val();
            if(categoryID) {
                $.ajax({
                    url: '/getSubCourse/'+categoryID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#sub_category').empty();
                            $('#sub_category').append('<option hidden>Choose Level</option>'); 
                            $.each(data, function(key, course){
                                $('#sub_category').append('<option value="'+ course.id +'">' + course.sub_category_name+ '</option>');
                            });
                        }else{
                            $('#sub_category').empty();
                        }
                    }
                });
            }else{
                $('#sub_category').empty();
            }
        });

        // $('form#addTeachingVideoForm').submit(function(){
        //     $('div.main-loader-please-wait').show();
        // });

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
@endpush