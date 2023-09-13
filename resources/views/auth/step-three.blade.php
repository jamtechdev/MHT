@extends('front.layouts.app')

@section('content')
<style>
    .error{
        color:red;
    }
</style>
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
                    <h2 class="maz__register-process-title text-center">Student Registration</h2>
                </div>
            </div>
            <form method="POST" action="{{ route('post-step-three') }}" class="maz__register-form" id="registerStepThreeForm">
                @csrf
                <div class="maz__interest-wrapper text-start">
                    <h3 class="maz__user-info mb-4 ">About You</h3>
                    <div class="row">
                        <div class="col-lg-8 mb-3 mb-lg-0">
                            <div class="maz__user-cmn-box">
                                <h4 class="maz__cmn-user-title">What is your age group? <span class="text-primary">*</span></h4>
                                
                                <div class="maz__age-wrapper">
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "age()" name="age_group" id="age1" value="Under 10" {{ ($registerData->age_group == 'Under 10') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age1">Under 10</label> 
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "age()" name="age_group" id="age2" value="10-13" {{ ($registerData->age_group == '10-13') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age2">10 - 13</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "age()" name="age_group" id="age3" value="14-17" {{ ($registerData->age_group == '14-17') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age3">14 - 17</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "age()" name="age_group" id="age4" value="18-20" {{ ($registerData->age_group == '18-20') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age4">18 - 20</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "age()" name="age_group" id="age5" value="21-29" {{ ($registerData->age_group == '21-29') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age5">21 - 29</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline me-3">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "age()" name="age_group" id="age6" value="30-39" {{ ($registerData->age_group == '30-39') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age6">30 - 39</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline me-0">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "age()" name="age_group" id="age7" value="40-49" {{ ($registerData->age_group == '40-49') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age7">40 - 49</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "age()" name="age_group" id="age8" value="50-59" {{ ($registerData->age_group == '50-59') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age8">50 - 59</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "age()" name="age_group" id="age9" value="60+" {{ ($registerData->age_group == '60+') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="age9">60+</label>
                                       
                                    </div>
                                    
                                </div>
                            
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="maz__user-cmn-box">
                                <h4 class="maz__cmn-user-title">What is your gender? <span class="text-primary">*</span></h4>
                                <div class="form-check maz__checkbox_group ">
                                    <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectGender()" name="gender" id="gender1" value="Male" {{ ($registerData->gender == 'Male') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender1">Male</label>
                                </div>
                                <div class="form-check maz__checkbox_group ">
                                    <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectGender()" name="gender" id="gender2" value="Female" {{ ($registerData->gender == 'Female') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender2">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-11 mt-3">
                            <div class="maz__user-cmn-box">
                                <h4 class="maz__cmn-user-title">What is your current level of fitness or experience? <span class="text-primary">*</span></h4>
                                <div class="d-flex flex-wrap">
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectFitness()" name="fitness" id="fitness1" value="Absolute Beginner" {{ ($registerData->fitness == 'Absolute Beginner') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="fitness1">Absolute Beginner</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectFitness()" name="fitness" id="fitness2" value="Relative Novice" {{ ($registerData->fitness == 'Relative Novice') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="fitness2">Relative Novice</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input maz__checkbox_warning" type="radio" onclick = "selectFitness()" name="fitness" id="fitness3" value="Intermiddiate" {{ ($registerData->fitness == 'Intermiddiate') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="fitness3">Intermediate</label>
                                    </div>
                                    <div class="form-check maz__checkbox_group maz__checkbox_group_inline">
                                        <input class="form-check-input form-check-input maz__checkbox_warning" type="radio" onclick = "selectFitness()" name="fitness" id="fitness4" value="Expert" {{ ($registerData->fitness == 'Expert') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="fitness4">Expert</label>
                                    </div>
                         
                                  
                                </div>
                              
                            </div> 
                        </div>
                        <div class="col-lg-12">
                                
                                <h5 class="maz__user-language">Select Your Preferred Language : <span class="text-primary">*</span></h5>
                                <div class="btn-group mt-4" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="radio" class="btn-check" id="preferred_language1" onclick = "selectLanguage()" name="preferred_language" autocomplete="off" value="English" {{ (in_array('English', explode(',', $registerData->preferred_language))) ? 'checked' : '' }}>
                                    <label class="btn cmn-btn-light" for="preferred_language1">English</label>

                                    <input type="radio" class="btn-check" id="preferred_language2" onclick = "selectLanguage()" name="preferred_language" autocomplete="off" value="Chinese" {{ (in_array('Chinese', explode(',', $registerData->preferred_language))) ? 'checked' : '' }}>
                                    <label class="btn cmn-btn-light" for="preferred_language2">Chinese</label>

                                    <input type="radio" class="btn-check" id="preferred_language3" onclick = "selectLanguage()" name="preferred_language" autocomplete="off" value="Hindustani" {{ (in_array('Hindustani', explode(',', $registerData->preferred_language))) ? 'checked' : '' }}>
                                    <label class="btn cmn-btn-light" for="preferred_language3">Hindustani</label>

                                    <input type="radio" class="btn-check" id="preferred_language4" onclick = "selectLanguage()" name="preferred_language" autocomplete="off" value="Bengali" {{ (in_array('Bengali', explode(',', $registerData->preferred_language))) ? 'checked' : '' }}>
                                    <label class="btn cmn-btn-light" for="preferred_language4">Bengali</label>

                                    <input type="radio" class="btn-check" id="preferred_language5" onclick = "selectLanguage()" name="preferred_language" autocomplete="off" value="Spanish" {{ (in_array('Spanish', explode(',', $registerData->preferred_language))) ? 'checked' : '' }}>
                                    <label class="btn cmn-btn-light" for="preferred_language5">Spanish</label>

                                    <input type="radio" class="btn-check" id="preferred_language6" onclick = "selectLanguage()" name="preferred_language" autocomplete="off" value="Arabic" {{ (in_array('Arabic', explode(',', $registerData->preferred_language))) ? 'checked' : '' }}>
                                    <label class="btn cmn-btn-light" for="preferred_language6">Arabic</label>

                                    <input type="radio" class="btn-check" id="preferred_language7" onclick = "selectLanguage()" name="preferred_language" autocomplete="off" value="Malay" {{ (in_array('Malay', explode(',', $registerData->preferred_language))) ? 'checked' : '' }}>
                                    <label class="btn cmn-btn-light" for="preferred_language7">Malay</label>

                                    <input type="radio" class="btn-check" id="preferred_language8" onclick = "selectLanguage()" name="preferred_language" autocomplete="off" value="Russian" {{ (in_array('Russian', explode(',', $registerData->preferred_language))) ? 'checked' : '' }}>
                                    <label class="btn cmn-btn-light" for="preferred_language8">Russian</label>

                                    <input type="radio" class="btn-check" id="preferred_language9" onclick = "selectLanguage()" name="preferred_language" autocomplete="off" value="Protuguese" {{ (in_array('Protuguese', explode(',', $registerData->preferred_language))) ? 'checked' : '' }}>
                                    <label class="btn cmn-btn-light" for="preferred_language9">Portuguese</label>

                                    <input type="radio" class="btn-check" id="preferred_language10" onclick = "selectLanguage()" name="preferred_language" autocomplete="off" value="French" {{ (in_array('French', explode(',', $registerData->preferred_language))) ? 'checked' : '' }}>
                                    <label class="btn cmn-btn-light" for="preferred_language10">French</label>
                                </div>
                                <div class="btn-row mt-4 mt-lg-5 d-flex justify-content-between">
                                    <a href="{{ route('step-two') }}" class="btn btn-dark btn-regi-cmn btn-rounded">Back</a>
                                    <button type="submit" class="btn btn-primary btn-regi-cmn btn-rounded">Next</button>
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
                'preferred_language': {
                    required: true
                }
            },
            messages: {
                'age_group': {
                    required: "Please select your age group"
                },
                'gender': {
                    required:  "Please select your gender"
                },
                'fitness': {
                    required: "Please select your current level of fitness or experience"
                },
                'preferred_language': {
                    required: "Please select your preferred language"
                }
            },
            // errorPlacement: function(error, element) {
            //     if(element[0].type == 'radio') {
            //         error.appendTo(element.parent().parent());
            //     } else {
            //         error.appendTo(element.parent());
            //     }
            // }

            errorPlacement: function(error, element) {
                if (element.attr("name") == "age_group" )
                    error.insertAfter(element.parent('div').parent('div')); 
                else if  (element.attr("name") == "gender" )
                    error.appendTo(element.parent('div').parent('div'));
                else if  (element.attr("name") == "fitness" )
                    error.insertAfter(element.parent('div').parent('div')); 
                else
                    error.insertAfter(element.parent('div'));  
              
            }
        });

        $.ajax({
            url: "{{ route('updateStepThreeVisitStatus') }}",
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

    function age()
    {
        var age_group = $('input[name="age_group"]:checked').val();

        $.ajax({
            url: "{{ route('age_group') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                age: age_group
            },
            success: function (response) {
                
            }
        });    
    }

    function selectGender()
    {
        var gender = $('input[name="gender"]:checked').val();

        $.ajax({
            url: "{{ route('gender') }}",
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

    function selectFitness()
    {
        var fitness = $('input[name="fitness"]:checked').val();

        $.ajax({
            url: "{{ route('fitness') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                fitness: fitness
            },
            success: function (response) {
                
            }
        });    
    }

    function selectLanguage()
    {
        var arr = [];

        // $.each($("input[name='preferred_language[]']:checked"), function(){
        //           arr.push($(this).val());
        //       });
        
        var language = $("input[name='preferred_language']:checked").val();
        
        $.ajax({
            url: "{{ route('preferred_language') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                language: language
            },
            success: function (response) {
                
            }
        });    
    }
</script>
@endpush