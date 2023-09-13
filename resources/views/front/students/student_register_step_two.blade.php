@extends('front.layouts.app')

@section('content')
<section class="maz__register-process-step2 maz__sections">
    <div class="container">
        <div class="maz__register-process-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <ul class="progress_bar">
                        <li class="completed">Step1</li>
                        <li class="active">Step2</li>
                        <li>Step3</li>
                        <li>Step4</li>
                        <li>Step5</li>
                    </ul>
                    <h2 class="maz__register-process-title">Student Registration</h2>
                </div>
            </div>

            <div class="row text-start">
                <form method="POST" action="{{ route('post.student.register.step.two') }}" class="maz__register-form" id="registerStepTwoForm">
                    @csrf
                    <div class="col-lg-12">
                        <div class="maz__interest-wrapper">
                            <h3 class="maz__interest-title">Your Interests</h3>
                            <h4 class="maz__interest-question mb-3">Who will be training with us? (Choose all that apply) <span class="text-primary">*</span></h4>
                            <div class="btn-group" role="group" aria-label="Who will be training with us? (Choose all that apply)">
                                <input type="checkbox" class="btn-check" id="who_will_be_training1" name="who_will_be_training[]" value="Children" autocomplete="off" {{ (in_array('Children', explode(',', $studentRegisterData->who_will_be_training))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="who_will_be_training1">Children</label>

                                <input type="checkbox" class="btn-check" id="who_will_be_training2" name="who_will_be_training[]" autocomplete="off" value="Teenagers" {{ (in_array('Teenagers', explode(',', $studentRegisterData->who_will_be_training))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="who_will_be_training2">Teenagers</label>

                                <input type="checkbox" class="btn-check" id="who_will_be_training3" name="who_will_be_training[]" autocomplete="off" value="Adults" {{ (in_array('Adults', explode(',', $studentRegisterData->who_will_be_training))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="who_will_be_training3">Adults</label>

                                <input type="checkbox" class="btn-check" id="who_will_be_training4" name="who_will_be_training[]" autocomplete="off" value="Senior" {{ (in_array('Senior', explode(',', $studentRegisterData->who_will_be_training))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="who_will_be_training4">Senior</label>
                            </div>

                            <h4 class="maz__interest-question mb-3">What types of training are you interested in? (Choose all that apply)</h4>
                            <h5 class="maz__interest-question-cat mb-2">Disciplines in martial arts: <span class="text-primary">*</span></h5>
                            <div class="btn-group" role="group" aria-label="Disciplines in martial arts">
                                <input type="checkbox" class="btn-check" id="disciplines_in_martial_arts1" name="disciplines_in_martial_arts[]" value="Tae kwon Do" autocomplete="off" {{ (in_array('Tae kwon Do', explode(',', $studentRegisterData->disciplines_in_martial_arts))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="disciplines_in_martial_arts1">Tae kwon Do</label>

                                <input type="checkbox" class="btn-check" id="disciplines_in_martial_arts2" name="disciplines_in_martial_arts[]" value="Karate" autocomplete="off" {{ (in_array('Karate', explode(',', $studentRegisterData->disciplines_in_martial_arts))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="disciplines_in_martial_arts2">Karate</label>

                                <input type="checkbox" class="btn-check" id="disciplines_in_martial_arts3" name="disciplines_in_martial_arts[]" value="Kung Fu" autocomplete="off" {{ (in_array('Kung Fu', explode(',', $studentRegisterData->disciplines_in_martial_arts))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="disciplines_in_martial_arts3">Kung Fu</label>

                                <input type="checkbox" class="btn-check" id="disciplines_in_martial_arts4" name="disciplines_in_martial_arts[]" value="Jiu Jitsu" autocomplete="off" {{ (in_array('Jiu Jitsu', explode(',', $studentRegisterData->disciplines_in_martial_arts))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="disciplines_in_martial_arts4">Jiu Jitsu</label>

                                <input type="checkbox" class="btn-check" id="disciplines_in_martial_arts5" name="disciplines_in_martial_arts[]" value="Judo" autocomplete="off" {{ (in_array('Judo', explode(',', $studentRegisterData->disciplines_in_martial_arts))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="disciplines_in_martial_arts5">Judo</label>

                                <input type="checkbox" class="btn-check" id="disciplines_in_martial_arts6" name="disciplines_in_martial_arts[]" value="Mixed Martial Arts" autocomplete="off" {{ (in_array('Mixed Martial Arts', explode(',', $studentRegisterData->disciplines_in_martial_arts))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="disciplines_in_martial_arts6">Mixed Martial Arts</label>

                                <input type="checkbox" class="btn-check" id="disciplines_in_martial_arts7" name="disciplines_in_martial_arts[]" value="Self Defense" autocomplete="off" {{ (in_array('Self Defense', explode(',', $studentRegisterData->disciplines_in_martial_arts))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="disciplines_in_martial_arts7">Self Defense</label>
                            </div>

                            <h5 class="maz__interest-question-cat mb-2">Stretching, Flexibility, Spiritual & Meditative Arts Including: <span class="text-primary">*</span></h5>
                            <div class="btn-group" role="group" aria-label="stretching_flexibility_spiritual_meditative_arts">
                                <input type="checkbox" class="btn-check" id="stretching_flexibility_spiritual_meditative_arts1" name="stretching_flexibility_spiritual_meditative_arts[]" value="Yoga" autocomplete="off" {{ (in_array('Yoga', explode(',', $studentRegisterData->stretching_flexibility_spiritual_meditative_arts))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="stretching_flexibility_spiritual_meditative_arts1">Yoga</label>

                                <input type="checkbox" class="btn-check" id="stretching_flexibility_spiritual_meditative_arts2" name="stretching_flexibility_spiritual_meditative_arts[]" value="Pilates" autocomplete="off" {{ (in_array('Pilates', explode(',', $studentRegisterData->stretching_flexibility_spiritual_meditative_arts))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="stretching_flexibility_spiritual_meditative_arts2">Pilates</label>

                                <input type="checkbox" class="btn-check" id="stretching_flexibility_spiritual_meditative_arts3" name="stretching_flexibility_spiritual_meditative_arts[]" value="Tai Chi" autocomplete="off" {{ (in_array('Tai Chi', explode(',', $studentRegisterData->stretching_flexibility_spiritual_meditative_arts))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="stretching_flexibility_spiritual_meditative_arts3">Tai Chi</label>

                                <input type="checkbox" class="btn-check" id="stretching_flexibility_spiritual_meditative_arts4" name="stretching_flexibility_spiritual_meditative_arts[]" value="Meditation" autocomplete="off" {{ (in_array('Meditation', explode(',', $studentRegisterData->stretching_flexibility_spiritual_meditative_arts))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="stretching_flexibility_spiritual_meditative_arts4">Meditation</label>
                            </div>

                            <h5 class="maz__interest-question-cat mb-2">Health & Wellness Guidance related: <span class="text-primary">*</span></h5>
                            <div class="btn-group" role="group" aria-label="health_and_wellness_guidance">
                                <input type="checkbox" class="btn-check" id="health_and_wellness_guidance1" autocomplete="off" name="health_and_wellness_guidance[]" value="Body Conditioning" {{ (in_array('Body Conditioning', explode(',', $studentRegisterData->health_and_wellness_guidance))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="health_and_wellness_guidance1">Body Conditioning</label>

                                <input type="checkbox" class="btn-check" id="health_and_wellness_guidance2" autocomplete="off" name="health_and_wellness_guidance[]" value="Weight Loss" {{ (in_array('Weight Loss', explode(',', $studentRegisterData->health_and_wellness_guidance))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="health_and_wellness_guidance2">Weight Loss</label>

                                <input type="checkbox" class="btn-check" id="health_and_wellness_guidance3" autocomplete="off" name="health_and_wellness_guidance[]" value="Strength Conditioning" {{ (in_array('Strength Conditioning', explode(',', $studentRegisterData->health_and_wellness_guidance))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="health_and_wellness_guidance3">Strength Conditioning</label>

                                <input type="checkbox" class="btn-check" id="health_and_wellness_guidance4" autocomplete="off" name="health_and_wellness_guidance[]" value="Persnoal Training" {{ (in_array('Persnoal Training', explode(',', $studentRegisterData->health_and_wellness_guidance))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="health_and_wellness_guidance4">Persnoal Training</label>

                                <input type="checkbox" class="btn-check" id="health_and_wellness_guidance5" autocomplete="off" name="health_and_wellness_guidance[]" value="High Intensity Interval Training" {{ (in_array('High Intensity Interval Training', explode(',', $studentRegisterData->health_and_wellness_guidance))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="health_and_wellness_guidance5">High Intensity Interval Training</label><br>

                                <input type="checkbox" class="btn-check" id="health_and_wellness_guidance6" autocomplete="off" name="health_and_wellness_guidance[]" value="Body Building" {{ (in_array('Body Building', explode(',', $studentRegisterData->health_and_wellness_guidance))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="health_and_wellness_guidance6">Body Building</label>

                                <input type="checkbox" class="btn-check" id="health_and_wellness_guidance7" autocomplete="off" name="health_and_wellness_guidance[]" value="Cardio Kickboxing" {{ (in_array('Cardio Kickboxing', explode(',', $studentRegisterData->health_and_wellness_guidance))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="health_and_wellness_guidance7">Cardio Kickboxing</label>

                                <input type="checkbox" class="btn-check" id="health_and_wellness_guidance8" autocomplete="off" name="health_and_wellness_guidance[]" value="Boxing" {{ (in_array('Boxing', explode(',', $studentRegisterData->health_and_wellness_guidance))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="health_and_wellness_guidance8">Boxing</label>

                                <input type="checkbox" class="btn-check" id="health_and_wellness_guidance9" autocomplete="off" name="health_and_wellness_guidance[]" value="Gymnastics" {{ (in_array('Gymnastics', explode(',', $studentRegisterData->health_and_wellness_guidance))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="health_and_wellness_guidance9">Gymnastics</label>

                                <input type="checkbox" class="btn-check" id="health_and_wellness_guidance10" autocomplete="off" name="health_and_wellness_guidance[]" value="Zumba" {{ (in_array('Zumba', explode(',', $studentRegisterData->health_and_wellness_guidance))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="health_and_wellness_guidance10">Zumba</label>

                                <input type="checkbox" class="btn-check" id="health_and_wellness_guidance11" autocomplete="off" name="health_and_wellness_guidance[]" value="Dancing" {{ (in_array('Dancing', explode(',', $studentRegisterData->health_and_wellness_guidance))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="health_and_wellness_guidance11">Dancing</label>
                            </div>

                            <h5 class="maz__interest-question-cat mb-2">All Fitness Including: <span class="text-primary">*</span></h5>
                            <div class="btn-group" role="group" aria-label="all_fitness_including">
                                <input type="checkbox" class="btn-check" id="all_fitness_including1" autocomplete="off" name="all_fitness_including[]" value="Weight Loss & Management Progress" {{ (in_array('Weight Loss & Management Progress', explode(',', $studentRegisterData->all_fitness_including))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="all_fitness_including1">Weight Loss & Management Progress</label>

                                <input type="checkbox" class="btn-check" id="all_fitness_including2" autocomplete="off" name="all_fitness_including[]" value="Consultation with Registered Nutritionists" {{ (in_array('Consultation with Registered Nutritionists', explode(',', $studentRegisterData->all_fitness_including))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="all_fitness_including2">Consultation with Registered Nutritionists</label>

                                <input type="checkbox" class="btn-check" id="all_fitness_including3" autocomplete="off" name="all_fitness_including[]" value="Sports Psychology Contents" {{ (in_array('Sports Psychology Contents', explode(',', $studentRegisterData->all_fitness_including))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="all_fitness_including3">Sports Psychology Contents</label>

                                <input type="checkbox" class="btn-check" id="all_fitness_including4" autocomplete="off" name="all_fitness_including[]" value="Motivation Contents" {{ (in_array('Motivation Contents', explode(',', $studentRegisterData->all_fitness_including))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="all_fitness_including4">Motivation Contents</label>

                                <input type="checkbox" class="btn-check" id="all_fitness_including5" autocomplete="off" name="all_fitness_including[]" value="Diet and Meal Plans / Vitamins and Sports Supplements" {{ (in_array('Diet and Meal Plans / Vitamins and Sports Supplements', explode(',', $studentRegisterData->all_fitness_including))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="all_fitness_including5">Diet and Meal Plans / Vitamins and Sports Supplements</label>

                                <input type="checkbox" class="btn-check" id="all_fitness_including6" autocomplete="off" name="all_fitness_including[]" value="Consultation with Psychologists" {{ (in_array('Consultation with Psychologists', explode(',', $studentRegisterData->all_fitness_including))) ? 'checked' : '' }}>
                                <label class="btn cmn-btn-light" for="all_fitness_including6">Consultation with Psychologists</label>
                            </div>
                        </div>
                        <div class="btn-row mt-5 d-flex justify-content-between">
                            <a href="{{ route('student.register.step.one') }}" class="btn btn-dark btn-regi-cmn btn-rounded">Back</a>
                            <button type="submit" class="btn btn-primary btn-regi-cmn btn-rounded ms-auto">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $("#registerStepTwoForm").validate({
            rules: {
                'who_will_be_training[]': {
                    required: true
                },
                'disciplines_in_martial_arts[]': {
                    required: true
                },
                'stretching_flexibility_spiritual_meditative_arts[]': {
                    required: true
                },
                'health_and_wellness_guidance[]': {
                    required: true
                },
                'all_fitness_including[]': {
                    required: true
                }
            },
            messages: {
                'who_will_be_training[]': {
                    required: "Please select at least one who will be training with us?"
                },
                'disciplines_in_martial_arts[]': {
                    required:  "Please select at least one disciplines in martial arts"
                },
                'stretching_flexibility_spiritual_meditative_arts[]': {
                    required: "Please select at least one stretching, flexibility, spiritual & meditative arts including"
                },
                'health_and_wellness_guidance[]': {
                    required: "Please select at least one health & wellness guidance related"
                },
                'all_fitness_including[]': {
                    required: "Please select at least one all fitness including"
                }
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
                //error.appendTo(element.insertBefore());
                //error.appendTo(element.insertAfter());
            }
        });
    });
</script>
@endpush