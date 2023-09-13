@extends('front.layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<link rel="stylesheet" href="{!! url(mix('assets/front/css/instructor.css')) !!}">
<!-- <link href="assets/front/css/slider-tooltip.css" rel="stylesheet"> -->
<section class="maz__register-process-step2 maz__sections">
    <div class="container">
        <div class="maz__register-process-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <ul class="progress_bar">
                        <li class="completed">Step1</li>
                        <li class="completed">Step2</li>
                        <li class="completed">Step3</li>
                        <li class="completed">Step4</li>
                        <li class="active">Step5</li>
                    </ul>
                    <h2 class="maz__register-process-title text-center">Student Registration</h2>
                </div>
            </div>
            <form method="POST" action="{{ route('post-step-four') }}" class="maz__register-form" id="registerStepFourForm">
                @csrf
                <div class="maz__interest-wrapper">
                    <div class="row text-start gx-3">
                        <div class="col-lg-8 mb-4">
                            <h3 class="maz__user-info mb-4">Your Preferences</h3>
                            <div class="maz__user-cmn-box">
                                <h4 class="maz__cmn-user-title">Instructor’s Gender? <span class="text-primary">*</span></h4>
                                <div class="d-flex flex-wrap">
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectGender()" name="instructor_gender" id="instructor_gender1" value="Female" {{ ($registerData->instructor_gender == 'Female') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="instructor_gender1">Female</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectGender()" name="instructor_gender" id="instructor_gender2" value="Male" {{ ($registerData->instructor_gender == 'Male') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="instructor_gender2">Male</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectGender()" name="instructor_gender" id="instructor_gender3" value="No Preference" {{ ($registerData->instructor_gender == 'No Preferences') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="instructor_gender3">No Preference</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="maz__user-cmn-box">
                                <h4 class="maz__cmn-user-title">Preferred Training Style <span class="text-primary">*</span></h4>
                                <div class="maz__training-wrapper">
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectTrainingStyle()" name="preferred_training_style" id="preferred_training_style1" value="Patient & Nurturing" {{ ($registerData->preferred_training_style == 'Patient & Nurturing') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="preferred_training_style1">Patient & Nurturing</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectTrainingStyle()" name="preferred_training_style" id="preferred_training_style2" value="Straight-forward & No Nonsense" {{ ($registerData->preferred_training_style == 'Straight-forward & No Nonsense') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="preferred_training_style2">Straightforward & No Nonsense</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectTrainingStyle()" name="preferred_training_style" id="preferred_training_style3" value="No Preferences" {{ ($registerData->preferred_training_style == 'Blend of Caring & Direct') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="preferred_training_style3">Blend of Caring & Direct</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectTrainingStyle()" name="preferred_training_style" id="preferred_training_style4" value="No Preference" {{ ($registerData->preferred_training_style == 'No Preference') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="preferred_training_style4">No Preference</label>
                                    </div>
                                </div>
                            </div>
                            <h4 class="maz__cmn-user-title mt-4 p-0">Instructors Minimum Years of Experience <span class="text-primary">*</span></h4>
                            <div class="maz__instructor-tooltip">
                                <input id="exp" name="instructor_experience" class="mt-4" type="text" data-slider-min="1" data-slider-max="20" data-slider-step="5" data-slider-value="{{ $registerData->instructor_experience }}"/>
                            </div>
                            

                            <div class="btn-row mt-4 mt-lg-5 d-flex justify-content-between">
                                <a href="{{ route('step-three') }}" class="btn btn-dark btn-regi-cmn btn-rounded">Back</a>
                                <button type="submit" class="btn btn-primary btn-regi-cmn btn-rounded">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $("#registerStepFourForm").validate({
            rules: {
                'instructor_gender': {
                    required: true
                },
                'preferred_training_style': {
                    required: true
                }
            },
            messages: {
                'instructor_gender': {
                    required: "Please select the preferred gender of your instructor"
                },
                'preferred_training_style': {
                    required:  "Please select your preferred training style"
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "instructor_gender" )
                    error.insertAfter(element.parent('div').parent('div')); 
                if  (element.attr("name") == "preferred_training_style" )
                    error.appendTo(element.parent('div').parent('div'));
              
            }
        });

        $.ajax({
            url: "{{ route('updateStepFourVisitStatus') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                value: 2
            },
            success: function (response) {
                
            }
        }); 
    });

    // tooltip slider 

    var slider = new Slider('#exp', {
        formatter: function(value) {
        
        $.ajax({
            url: "{{ route('instructor_experience') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                experience: value
            },
            success: function (response) {
                
            }
        });
        return 'Experience: ' + value;     
    }
    });



    function selectGender()
    {
        var gender = $('input[name="instructor_gender"]:checked').val();

        $.ajax({
            url: "{{ route('instructor_gender') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                gender: gender
            },
            success: function (response) {
                
            }
        });    
    }

    function selectTrainingStyle()
    {
        var style = $('input[name="preferred_training_style"]:checked').val();

        $.ajax({
            url: "{{ route('preferred_training_style') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                style: style
            },
            success: function (response) {
                
            }
        });    
    }
</script>
@endpush