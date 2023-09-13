@extends('front.layouts.app')

@section('content')
<section class="maz__register-process-step2 maz__sections">
    <div class="container">
        <div class="maz__register-process-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <ul class="progress_bar">
                        <li class="completed">Step1</li>
                        <li class="completed">Step2</li>
                        <li class="active">Step3</li>
                        <li>Step4</li>
                        <li>Step5</li>
                    </ul>
                    <h2 class="maz__register-process-title">Student Registration</h2>
                </div>
            </div>
            <form method="POST" action="{{ route('post.student.register.step.three') }}" class="maz__register-form" id="registerStepThreeForm">
                @csrf
                <div class="maz__interest-wrapper text-start">
                    <h3 class="maz__user-info mb-4 ">About You</h3>
                    <div class="row ">
                        <div class="col-lg-8">
                            <div class="maz__user-cmn-box">
                                <h4 class="maz__cmn-user-title">What is your age group? <span class="text-primary">*</span></h4>
                                <div class="maz__age-wrapper">
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="age_group" id="age1" value="Under 10" {{ ($studentRegisterData->age_group == 'Under 10') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age1">Under 10</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="age_group" id="age2" value="10-13" {{ ($studentRegisterData->age_group == '10-13') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age2">10 - 13</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="age_group" id="age3" value="14-17" {{ ($studentRegisterData->age_group == '14-17') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age3">14 - 17</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="age_group" id="age4" value="18-20" {{ ($studentRegisterData->age_group == '18-20') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age4">18 - 20</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="age_group" id="age5" value="21-29" {{ ($studentRegisterData->age_group == '21-29') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age5">21 - 29</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline me-3">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="age_group" id="age9" value="30-39" {{ ($studentRegisterData->age_group == '30-39') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age9">30 - 39</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline me-0">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="age_group" id="age6" value="40-49" {{ ($studentRegisterData->age_group == '40-49') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age6">40 - 49</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="age_group" id="age7" value="50-59" {{ ($studentRegisterData->age_group == '50-59') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age7">50 - 59</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="age_group" id="age8" value="60+" {{ ($studentRegisterData->age_group == '60+') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age8">60+</label>
                                    </div>
                                </div>                    
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="maz__user-cmn-box">
                                <h4 class="maz__cmn-user-title">What is your gender? <span class="text-primary">*</span></h4>
                                <div class="form-check maz__checkbox_group ">
                                    <input class="form-check-input maz__checkbox_warning" type="radio" name="gender" id="gender1" value="Male" {{ ($studentRegisterData->gender == 'Male') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender1">Male</label>
                                </div>
                                <div class="form-check maz__checkbox_group ">
                                    <input class="form-check-input maz__checkbox_warning" type="radio" name="gender" id="gender2" value="Female" {{ ($studentRegisterData->gender == 'Female') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender2">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="maz__interest-wrapper">
                                <div class="maz__user-cmn-box">
                                <h4 class="maz__cmn-user-title">What is your current level of fitness or experience? <span class="text-primary">*</span></h4>
                                <div class="d-flex">
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="fitness" id="fitness1" value="Absolute Beginner" {{ ($studentRegisterData->fitness == 'Absolute Beginner') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="fitness1">Absolute Beginner</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="fitness" id="fitness2" value="Relative Novice" {{ ($studentRegisterData->fitness == 'Relative Novice') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="fitness2">Relative Novice</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="fitness" id="fitness3" value="Intermiddiate" {{ ($studentRegisterData->fitness == 'Intermiddiate') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="fitness3">Intermiddiate</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input form-check-input maz__checkbox_warning" type="radio" name="fitness" id="fitness4" value="Expert" {{ ($studentRegisterData->fitness == 'Expert') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="fitness4">Expert</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="maz__interest-wrapper">
                        <h5 class="maz__user-language">Select Your Preferred Language : <span class="text-primary">*</span></h5>
                        <div class="btn-group mt-4" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="preferred_language1" name="preferred_language[]" autocomplete="off" value="English" {{ (in_array('English', explode(',', $studentRegisterData->preferred_language))) ? 'checked' : '' }}>
                            <label class="btn cmn-btn-light" for="preferred_language1">English</label>

                            <input type="checkbox" class="btn-check" id="preferred_language2" name="preferred_language[]" autocomplete="off" value="Chinese" {{ (in_array('Chinese', explode(',', $studentRegisterData->preferred_language))) ? 'checked' : '' }}>
                            <label class="btn cmn-btn-light" for="preferred_language2">Chinese</label>

                            <input type="checkbox" class="btn-check" id="preferred_language3" name="preferred_language[]" autocomplete="off" value="Hindustani" {{ (in_array('Hindustani', explode(',', $studentRegisterData->preferred_language))) ? 'checked' : '' }}>
                            <label class="btn cmn-btn-light" for="preferred_language3">Hindustani</label>

                            <input type="checkbox" class="btn-check" id="preferred_language4" name="preferred_language[]" autocomplete="off" value="Bengali" {{ (in_array('Bengali', explode(',', $studentRegisterData->preferred_language))) ? 'checked' : '' }}>
                            <label class="btn cmn-btn-light" for="preferred_language4">Bengali</label>

                            <input type="checkbox" class="btn-check" id="preferred_language5" name="preferred_language[]" autocomplete="off" value="Spanish" {{ (in_array('Spanish', explode(',', $studentRegisterData->preferred_language))) ? 'checked' : '' }}>
                            <label class="btn cmn-btn-light" for="preferred_language5">Spanish</label>

                            <input type="checkbox" class="btn-check" id="preferred_language6" name="preferred_language[]" autocomplete="off" value="Arabic" {{ (in_array('Arabic', explode(',', $studentRegisterData->preferred_language))) ? 'checked' : '' }}>
                            <label class="btn cmn-btn-light" for="preferred_language6">Arabic</label>

                            <input type="checkbox" class="btn-check" id="preferred_language7" name="preferred_language[]" autocomplete="off" value="Malay" {{ (in_array('Malay', explode(',', $studentRegisterData->preferred_language))) ? 'checked' : '' }}>
                            <label class="btn cmn-btn-light" for="preferred_language7">Malay</label>

                            <input type="checkbox" class="btn-check" id="preferred_language8" name="preferred_language[]" autocomplete="off" value="Russian" {{ (in_array('Russian', explode(',', $studentRegisterData->preferred_language))) ? 'checked' : '' }}>
                            <label class="btn cmn-btn-light" for="preferred_language8">Russian</label>

                            <input type="checkbox" class="btn-check" id="preferred_language9" name="preferred_language[]" autocomplete="off" value="Protuguese" {{ (in_array('Protuguese', explode(',', $studentRegisterData->preferred_language))) ? 'checked' : '' }}>
                            <label class="btn cmn-btn-light" for="preferred_language9">Protuguese</label>

                            <input type="checkbox" class="btn-check" id="preferred_language10" name="preferred_language[]" autocomplete="off" value="French" {{ (in_array('French', explode(',', $studentRegisterData->preferred_language))) ? 'checked' : '' }}>
                            <label class="btn cmn-btn-light" for="preferred_language10">French</label>
                        </div>
                        <div class="btn-row mt-5 d-flex justify-content-between">
                            <a href="{{ route('student.register.step.two') }}" class="btn btn-dark btn-regi-cmn btn-rounded">Back</a>
                            <button type="submit" class="btn btn-primary btn-regi-cmn btn-rounded">Next</button>
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
        $("#registerStepThreeForm").validate({
            rules: {
                'age_group': {
                    required: true
                },
                'gender': {
                    required: true
                },
                'fitness': {
                    required: true
                },
                'preferred_language[]': {
                    required: true
                }
            },
            messages: {
                'age_group': {
                    required: "What is your age group? is required"
                },
                'gender': {
                    required:  "What is your gender? is required"
                },
                'fitness': {
                    required: "What is your current level of fitness or experience? is required"
                },
                'preferred_language[]': {
                    required: "Please select atleast one your preferred language"
                }
            },
            errorPlacement: function(error, element) {
                if(element[0].type == 'radio') {
                    error.appendTo(element.parent().parent());
                } else {
                    error.appendTo(element.parent());
                }
            }
        });
    });
</script>
@endpush