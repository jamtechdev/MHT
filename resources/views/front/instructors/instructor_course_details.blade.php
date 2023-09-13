@extends('front.layouts.app')
@section('content')

@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <h4 class="dashboard_titles">My Course Details</h4>
                @if(!empty($instructorCourseData))
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                            <h6 class="text-uppercase mb-2 fs-18">Course Info</h6>
                            <hr>
                            <div class="personal_info__table">
                                <div class="profile__details"><label class="info_title">Instructor Name :</label>
                                    <p>{{ $instructorCourseData['instructorName'] }}</p>
                                </div>
                                <div class="profile__details"><label class="info_title">Category :</label>
                                    <p>{{ $instructorCourseData['categoryName'] }}</p>
                                </div>
                                <div class="profile__details"><label class="info_title">Discipline :</label>
                                    <p>{{ $instructorCourseData['title'] }}</p>
                                </div>
                                <div class="profile__details"><label class="info_title">Course Name :</label>
                                    <p>{{ $instructorCourseData['name'] }}</p>
                                </div>
                                <div class="profile__details"><label class="info_title">Description :</label>
                                    <p>{{ $instructorCourseData['description'] }}</p>
                                </div>
                                <div class="profile__details"><label class="info_title">Photo :</label>
                                    <img src="{{ $instructorCourseData['photo'] }}" width="200">
                                </div>
                            </div>
                        </div>
                        @if(count($instructorCourseLessionData))
                        <div class="row mt-4">
                            <div class="container">
                                <h6 class="text-uppercase mb-2 fs-18">Course Lession Info</h6>
                                <hr>
                                <div class="row text-center mt-2">
                                    @foreach ($instructorCourseLessionData as $lessionData)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="maz__recommdate-video">
                                                <a class="maz__del-icon" href="javscript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteInstructorLession" onclick="deleteInstructorLession('{{$lessionData['title']}}', '{{$lessionData['id']}}');"><i class="fas fa-trash-alt"></i></a>
                                                <div class="wistia_embed wistia_async_{{$lessionData['video_id']}} popover=true popoverContent=html" style="display:block; white-space:nowrap;" id="wistia-{{$lessionData['video_id']}}-{{$lessionData['id']}}">
                                                    <div class="maz__recommdate-video-block">
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <img src="{{ $lessionData['lession_thumbnail'] }}" alt="{{ $lessionData['title'] }}" >
                                                        </div>
                                                        <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($lessionData['video_duration'])->format('i:s'); }}</div>
                                                    </div>
                                                </div>
                                                <div class="maz__recommdate-video-content">
                                                    <h6 class="maz__swiper__block-title">{{ $lessionData['title'] }}</h6>
                                                    <h6 class="maz__swiper__block-title">{{ $lessionData['description'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <a href="{{ route('instructor_profile_course') }}" class="btn btn-primary text-uppercase dashboard_btn_danger dashboard_btn_lg">My Courses</a>
                                <a href="{{ route('instructor_add_course_lession', $instructorCourseData['id']) }}" class="btn btn-secondary dashboard_btn_lg text-uppercase">Add Course Lession</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- Delete Instructor Lession Confirmation Modal Dialog --}}
<div class="modal fade" id="deleteInstructorLession" tabindex="-1" aria-labelledby="deleteInstructorLessionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content"> 
            <div class="modal-body text-center">
                <div class="text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="body-content my-5">
                    <h4>Are you sure do you want to delete <span id="deleteLessionTitle">this course lession</span>?</h4>
                </div>
                <div class="button-groups mb-5">
                    <a id="deleteLessionYesLink" href="javscript:void(0);" class="btn btn-secondary dashboard_btn_sm text-uppercase me-3">Yes</a>
                    <a href="javscript:void(0);" class="btn btn-primary dashboard_btn_sm dashboard_btn_danger text-uppercase" data-bs-dismiss="modal">No</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        function deleteInstructorLession(title, id) {
            $("#deleteLessionTitle").text(title);
            var baseURL = '{{ url("/") }}';
            var deleteLessionURL = baseURL + '/delete_instructor_lession/'+id;
            $("#deleteLessionYesLink").attr("href", deleteLessionURL);
        }
    </script>
@endpush