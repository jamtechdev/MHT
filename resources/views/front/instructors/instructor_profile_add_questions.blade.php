@extends('front.layouts.app')

@section('content')

@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content">
                <h4 class="dashboard_titles">Add Questions</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                          <div class="col-lg-4">
                             <div class="maz__question-add-wrapper">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Question <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control question-input" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput2" class="form-label">Answer <span class="text-primary">*</span></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                </div>
                                <a href="{{ route('instructor_profile_add_questions')}}" class="btn btn-secondary dashboard_btn_lg text-uppercase">SAVE QUESTIONS</a>
                             </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection