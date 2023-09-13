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
                <h4 class="dashboard_titles">Edit Course</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="POST" action="{{ route('post_instructor_edit_course', $editCourseData['id']) }}" id="editCourseForm">
                                    @csrf
                                    <div class="maz__question-add-wrapper">
                                        <div class="mb-3">
                                            <label for="name" class="col-form-label text-md-end">{{ __('Name') }} <span class="text-primary">*</span></label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $editCourseData['name'] }}" maxlength="50">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="course_category_id" class="col-form-label text-md-end">Select Course Category <span class="text-primary">*</span></label>
                                            <select class="form-select @error('course_category_id') is-invalid @enderror" aria-label="Select Course Category" name="course_category_id">
                                                <option value="">Select Course Category</option>
                                                @foreach($courseCategoryData as $ccData)
                                                    <option value="{{ $ccData->id }}" {{ ($editCourseData['course_category_id'] == $ccData->id) ? 'selected' : '' }}>{{ $ccData->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('course_category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="discipline_id" class="col-form-label text-md-end">Select Discipline <span class="text-primary">*</span></label>
                                            <select class="form-select @error('discipline_id') is-invalid @enderror" aria-label="Select Discipline" name="discipline_id">
                                                <option value="">Select Discipline</option>
                                                @foreach($disciplineData as $dData)
                                                    <option value="{{ $dData->id }}" {{ ($editCourseData['discipline_id'] == $dData->id) ? 'selected' : '' }}>{{ $dData->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('discipline_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label text-md-end">{{ __('Description') }} <span class="text-primary">*</span></label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" maxlength="500" name="description">{{ $editCourseData['description'] }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="d-inline">
                                            <button type="submit" class="btn btn-secondary dashboard_btn_lg text-uppercase me-sm-3">Save Course</button>
                                            <a class="btn btn btn-primary text-uppercase dashboard_btn_danger dashboard_btn_lg mt-3 mt-sm-0" href="{{ route('instructor_profile_course') }}">Cancel</a>
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
<script>
    $(document).ready(function() {
        $("#editCourseForm").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },
                description: {
                    required: true,
                    maxlength: 500
                },
                course_category_id: {
                    required: true
                },
                discipline_id: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Name is required",
                    maxlength: "Name cannot be more than 50 characters"
                },
                description: {
                    required: "Description is required",
                    maxlength: "Description cannot be more than 500 characters"
                },
                course_category_id: {
                    required: "Course category is required"
                },
                discipline_id: {
                    required: "Discipline is required"
                }
            }
        });
    });
</script>
@endpush