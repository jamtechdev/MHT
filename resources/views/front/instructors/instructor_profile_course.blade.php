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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="dashboard_titles mb-0">My Course</h4>
                            <div class="maz__cmn-dropdown ms-4 d-flex align-items-center">
                                <h5 class="mb-0">Decipline</h5>
                                <select class="form-select ms-3" id="discSelect">
                                    <option value="All" data-title="All" {{ ($selType == 'All') ? 'selected' : '' }}>All</option>
                                    @foreach($disciplineData as $discData)
                                        <option value="{{ $discData->id }}" {{ ($selType == $discData->title) ? 'selected' : '' }} data-title="{{ $discData->title }}">{{ $discData->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Instructor Course Listing --}}
                    @if(count($instructorCourseData))
                        @foreach($instructorCourseData as $insCourseData)
                            @if(count($insCourseData['instructorData']))
                                <div class="col-lg-12 mt-4">
                                    <div class="maz__profile-medal-wrapper">
                                        <h4><span class="text-uppercase">{{ $insCourseData['category_name'] }} Videos</span></h4>
                                    </div>
                                    <div class="swiper maz__instructor-swiper ins_bronze_video">
                                        <div class="swiper-wrapper">
                                            @foreach($insCourseData['instructorData'] as $insData)
                                                <div class="swiper-slide">
                                                    <div class="maz__profile-cmn-course-box">
														<ul class="maz__action-block">
															<li>
																<a class="maz__action-link maz__edit-icon" href="{{ route('instructor_edit_course', $insData->id) }}">
																	<i class="fas fa-pen"></i>
																</a>
															</li>
															<li>
																<a class="maz__action-link maz__del-icon" href="javscript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteInstructorCourse" onclick="deleteInstructorCourse('{{$insData->name}}', '{{$insData->id}}');">
																	<i class="fas fa-trash-alt"></i>
																</a>
															</li>
														</ul>
                                                        <img data-src="{{ $insData->photo }}" alt="profile-course" class="lazy" />
                                                        <div class="maz__profile-cmn-course-detail">
                                                            <h5 class="maz__profile-cmn-belt-title">{{ $insData->name }}</h5>
                                                            <h5 class="maz__profile-cmn-belt-level fs-6">{{ $insData->description }}</h5>
                                                            <a href="{{ route('instructor_course_details', $insData->id) }}" class="btn btn-primary btn-course-detail">Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next maz__swiper__ins_btn-next">
                                            <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                                        </div>
                                        <div class="swiper-button-prev maz__swiper__ins_btn-prev">
                                            <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Delete Instructor Course Confirmation Modal Dialog --}}
<div class="modal fade" id="deleteInstructorCourse" tabindex="-1" aria-labelledby="deleteInstructorCourseLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="body-content my-5">
                    <h4>Are you sure do you want to delete <span id="deleteCourseName">this course lession</span>?</h4>
                </div>
                <div class="button-groups mb-5">
                    <a id="deleteCourseYesLink" href="javscript:void(0);" class="btn btn-secondary dashboard_btn_sm text-uppercase me-3">Yes</a>
                    <a href="javscript:void(0);" class="btn btn-primary dashboard_btn_sm dashboard_btn_danger text-uppercase" data-bs-dismiss="modal">No</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $("#discSelect").change(function() {
                if($(this).find(':selected').attr('data-title') != 'All') {
                    var baseURL = '{{ url("/") }}';
                    window.location.href = baseURL + '/instructor_profile_course?type='+ $(this).find(':selected').attr('data-title') +'&did='+ $(this).val();
                } else {
                    window.location.href = '{{ url("instructor_profile_course") }}';
                }
            });
        });

		// Delete Instructor Course Section
		function deleteInstructorCourse(name, id) {
            $("#deleteCourseName").text(name);
            var baseURL = '{{ url("/") }}';
            var deleteCourseURL = baseURL + '/delete_instructor_course/'+id;
            $("#deleteCourseYesLink").attr("href", deleteCourseURL);
        }
    </script>
@endpush