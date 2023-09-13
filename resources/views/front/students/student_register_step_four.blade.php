@extends('front.layouts.app')

@section('content')
<!-- Init Google Recaptcha V3 Script -->
{!! RecaptchaV3::initJs() !!}
<section class="maz__register-process-step2 maz__sections">
    <div class="container">
        <div class="maz__register-process-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <ul class="progress_bar">
                        <li class="completed">Step1</li>
                        <li class="completed">Step2</li>
                        <li class="completed">Step3</li>
                        <li class="active">Step4</li>
                        <li>Step5</li>
                    </ul>
                    <h2 class="maz__register-process-title">Student Registration</h2>
                </div>
            </div>
            <form method="POST" action="{{ route('studentregisterstepfour') }}" class="maz__register-form" id="registerStepFourForm">
                @csrf
                <div class="maz__interest-wrapper">
                    <div class="row text-start gx-3">
                        <div class="col-lg-8 mb-4">
                            <h3 class="maz__user-info mb-4">Your Preferences</h3>
                            <div class="maz__user-cmn-box">
                                <h4 class="maz__cmn-user-title">Instructor’s gender? <span class="text-primary">*</span></h4>
                                <div class="d-flex">
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="instructor_gender" id="instructor_gender1" value="Female" {{ ($studentRegisterData->instructor_gender == 'Female') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="instructor_gender1">Female</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="instructor_gender" id="instructor_gender2" value="Male" {{ ($studentRegisterData->instructor_gender == 'Male') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="instructor_gender2">Male</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="instructor_gender" id="instructor_gender3" value="No Preferences" {{ ($studentRegisterData->instructor_gender == 'No Preferences') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="instructor_gender3">No Preferences</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="maz__user-cmn-box">
                                <h4 class="maz__cmn-user-title">Preferred Training Style <span class="text-primary">*</span></h4>
                                <div class="maz__training-wrapper">
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline w-50">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="preferred_training_style" id="preferred_training_style1" value="Patient & Nurturing" {{ ($studentRegisterData->preferred_training_style == 'Patient & Nurturing') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="preferred_training_style1">Patient & Nurturing</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="preferred_training_style" id="preferred_training_style2" value="Straight-forward & No Nonsense" {{ ($studentRegisterData->preferred_training_style == 'Straight-forward & No Nonsense') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="preferred_training_style2">Straight-forward & No Nonsense</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline w-50">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="preferred_training_style" id="preferred_training_style3" value="No Preferences" {{ ($studentRegisterData->preferred_training_style == 'Blend of Caring & Direct') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="preferred_training_style3">Blend of Caring & Direct</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" name="preferred_training_style" id="preferred_training_style4" value="No Preference" {{ ($studentRegisterData->preferred_training_style == 'No Preference') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="preferred_training_style4">No Preference</label>
                                    </div>
                                </div>
                            </div>
                            <h4 class="maz__cmn-user-title mt-4 p-0">Instructors Minimum Years of Experience <span class="text-primary">*</span></h4>
                            <input type="range" class="form-range custom-range" id="customRange1">
                            <div class="btn-row mt-5 d-flex justify-content-between">
                                <!-- Generate Google Recaptcha V3 Field  -->
                                {!! RecaptchaV3::field('studentregisterstepfour') !!}
                                <a href="{{ route('student.register.step.three') }}" class="btn btn-dark btn-regi-cmn btn-rounded">Back</a>
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
                    required: "Instructor’s gender? is required"
                },
                'preferred_training_style': {
                    required:  "Preferred training style is required"
                }
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.parent().parent());
            }
        });
    });
</script>
@endpush