@extends('front.layouts.app')
@section('content')

{{-- Init Phone Field CSS  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/front/css/croppie.css') }}" />
<style>
    .modal{
        margin-top: 0%;
        z-index: 9999;
    }

    
    /* .cropper-crop-box
    {
        min-width:300px !important;
        min-height:300px !important;
        max-width:350px !important;
        max-height:350px !important;
    } */
</style>
<!-- maz dashboard profile box -->
@include('front.include.instructor_complete_profile')
<!-- main wrapper start -->
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <h4 class="dashboard_titles">Edit Profile</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body">
                        <h6 class="text-uppercase mb-2 fs-18">Personal Info</h6>
                        <hr>
                        <form method="POST" action="{{ route('instructor_profile_edit_post', $instructorProfileData['id']) }}" id="instructorProfileEditForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4 mb-2">
                                    <label for="name" class="col-form-label text-md-end">{{ __('Name') }} <span class="text-primary">*</span></label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $instructorProfileData['name'] }}" required maxlength="250">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2 ">
                                    <label for="phone" class="col-form-label text-md-end">{{ __('Phone') }} <span class="text-primary">*</span></label>
                                    {{-- <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $instructorProfileData['phone'] }}" required maxlength="12" placeholder="xxx-xxx-xxxx" autocomplete="off"> --}}
                                    <input type="tel" name ="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $instructorProfileData['phone'] }}" required maxlength="12" autocomplete="off">
                                    <input type="tel" class="hide" id="hiden">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="school_name" class="col-form-label text-md-end">{{ __('School Name') }} <span class="text-primary">*</span></label>
                                    <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" value="{{ $instructorProfileData['school_name'] }}" required maxlength="250">
                                    @error('school_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="native_language" class="col-form-label text-md-end">{{ __('Native Language') }} <span class="text-primary">*</span></label>
                                    <input id="native_language" type="text" class="form-control @error('native_language') is-invalid @enderror" name="native_language" value="{{ $instructorProfileData['native_language'] }}" required maxlength="250">
                                    @error('native_language')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-8 mb-2">
                                    <label for="teaching_experience" class="col-form-label text-md-end">{{ __('Teaching Experience') }} <span class="text-primary">*</span></label>
                                    <input id="teaching_experience" type="text" class="form-control @error('teaching_experience') is-invalid @enderror" name="teaching_experience" value="{{ $instructorProfileData['teaching_experience'] }}">
                                    @error('teaching_experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <h6 class="text-uppercase mb-2 fs-18">Address Info</h6>
                            <hr>
                            <div class="row mb-3">
                            <div class="col-md-6">
                                    <label for="address" class="col-form-label text-md-end">{{ __('Address') }} <span class="text-primary">*</span></label>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $instructorProfileData['address'] }}" required maxlength="250">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="city" class="col-form-label text-md-end">{{ __('City') }} <span class="text-primary">*</span></label>
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $instructorProfileData['city'] }}" required maxlength="50">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="state" class="col-form-label text-md-end">{{ __('State') }} <span class="text-primary">*</span></label>
                                    <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $instructorProfileData['state'] }}" required maxlength="50">
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="zip" class="col-form-label text-md-end">{{ __('Zip') }} <span class="text-primary">*</span></label>
                                    <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ $instructorProfileData['zip'] }}" required maxlength="11">
                                    @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="country" class="col-form-label text-md-end">{{ __('Country') }} <span class="text-primary">*</span></label>
                                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $instructorProfileData['country'] }}" required maxlength="50">
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <h6 class="text-uppercase mb-2 fs-18">Certificate, Photo And Banner Info</h6>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="certificate" class="col-form-label text-md-end">{{ __('Upload Certificate') }} <span class="text-primary">*</span></label>
                                    <div id="crop_certificate" >
                                        <image-crop-component id="certificate" name="certificate" form-url="{{ url("instructor/certificate/upload") }}" instructor-id="{{ $instructorProfileData['id'] }}" instructor-image="{{ $instructorProfileData['certificate'] ?? '' }}"></image-crop-component>
                                    </div>
                                    {{-- <input id="certificate" type="file" class="form-control @error('certificate') is-invalid @enderror" name="certificate"> --}}
                                    @error('certificate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="photo" class="col-form-label text-md-end">{{ __('Upload Profile Photo') }}  </label>
                                    <div id="crop_profile_picture">
                                        <image-crop-component form-url="{{ url("instructor/profile_picture/upload") }}" instructor-id="{{ $instructorProfileData['id'] }}" instructor-image="{{ $instructorProfileData['photo'] ?? '' }}"></image-crop-component>
                                    </div>
                                    
                                    {{-- <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"> --}}
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="banner" class="col-form-label text-md-end">{{ __('Upload Banner') }}</label>
                                    <div id="crop_banner">
                                        <image-crop-component form-url="{{ url("instructor/banner/upload") }}" instructor-id="{{ $instructorProfileData['id'] }}" instructor-image="{{ $instructorProfileData['banner'] ?? '' }}"></image-crop-component>
                                    </div>
                                    {{-- <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"> --}}
                                    @error('banner')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4" style="text-align:center;">
                                    @if($instructorProfileData['certificate'])
                                    <label for="uploadedcertificate" class="col-form-label text-md-end">{{ __('Uploaded Certificate') }}</label>
                                    <div class="mt-3">
                                        {{-- <img src="{{ Storage::url($instructorProfileData['certificate']) }}" width="200"> --}}
                                        <img src="{{ $instructorProfileData['certificate'] }}" width="200">
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-4" style="text-align:center;">
                                    @if($instructorProfileData['photo'])
                                    <label for="uploadedphoto" class="col-form-label text-md-end">{{ __('Uploaded Profile Photo') }}</label>
                                    <div class="mt-3">
                                        <img src="{{ $instructorProfileData['photo'] }}" width="200">
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-4" style="text-align:center;">
                                    @if($instructorProfileData['banner'])
                                    <label for="uploadedbanner" class="col-form-label text-md-end">{{ __('Uploaded Banner') }}</label>
                                    <div class="mt-3">
                                        <img src="{{ $instructorProfileData['banner'] }}" width="200">
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 text-start text-md-center mt-2">
                                    <button style="margin-bottom: 0.2rem !important;" type="submit" class="btn btn-secondary dashboard_btn_lg text-uppercase me-md-3 mb-3 mb-md-0">
                                        Save Changes
                                    </button>
                                    <a class="btn btn-primary text-uppercase dashboard_btn_danger dashboard_btn_lg" style="margin-bottom: 0.2rem !important;" href="{{ route('instructor_profile', $instructorProfileData['id']) }}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
{{-- Init Phone Field Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
<script ></script>
<script>
    $(document).ready(function() {

        $(".close").on('click', function(){
            $(".closemodal").modal('hide');
        });
        // Add Phone Input Mask
        // $('#phone').usPhoneFormat();
        // Define Form Jquary Validator

        $.validator.addMethod("schoolNameRegex", function(value, element) {
        return this.optional(element) || /^(?!^\d+$)^.+$/i.test(value);
        }, "Username must contain only letters, numbers, or dashes.");

        jQuery.validator.addMethod("instructorName", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters"); 

        $("#instructorProfileEditForm").validate({
            rules: {
                name: {
                   // lettersonly: true, 
                    required: true,
                    maxlength: 250,
                    instructorName:true
                },
                phone: {
                    required: true,
                    phoneUS: true,
                    minlength: 12,
                    maxlength: 12
                },
                address: {
                    required: true,
                    maxlength: 250
                },
                city: {
                    required: true,
                    lettersonly: true, 
                    maxlength: 50
                },
                state: {
                    lettersonly: true, 
                    required: true,
                    maxlength: 50
                },
                zip: {
                    required: true,
                    number: true,
                    maxlength: 11
                },
                country: {
                    required: true,
                    lettersonly: true, 
                    maxlength: 50
                },
                school_name: {
                    required: true,
                    maxlength: 250,
                    schoolNameRegex: true,

                },
                native_language: {
                    required: true,
                    lettersonly: true, 
                    maxlength: 250
                },
                teaching_experience: {
                    required: true,
                },
                certificate: {
                    maxsize: 500000
                },
                photo: {
                    maxsize: 500000,
                    extension: "jpg,jpeg,png",
                },
                banner: {
                    maxsize: 500000,
                    extension: "jpg,jpeg,png",
                }
            },
            messages: {
                name: {
                    //lettersonly: "Please use letters to enter a valid name",
                    required: "Name is required",
                    minlength: "Name cannot be more than 250 characters",
                    instructorName: "Please use letters to enter a valid name"
                },
                phone: {
                    required: "Phone is required",
                    phoneUS: "Please specify a valid phone number",
                    minlength: "Phone must be at least 12 characters",
                    maxlength: "Phone cannot be more than 12 characters"
                },
                address: {
                    required: "Please use a combination of numbers and letters to specify your address",
                    maxlength: "Address cannot be more than 250 characters"
                },
                city: {
                    lettersonly: "Please use letters to enter a valid city",
                    required: "City is required",
                    maxlength: "City cannot be more than 50 characters"
                },
                state: {
                    lettersonly: "Please use letters to enter a valid state",
                    required: "State is required",
                    maxlength: "State cannot be more than 50 characters"
                },
                zip: {
                    number: "Please use numbers to enter a valid zip code",
                    required: "Zip is required",
                    maxlength: "Zip cannot be more than 11 characters"
                },
                country: {
                    lettersonly: "Please use letters to enter a valid country",
                    required: "Country is required",
                    maxlength: "Country cannot be more than 50 characters"
                },
                school_name: {

                    schoolNameRegex: "Please use a combination of numbers and letters or only letters to enter a valid school name",
                    required: "Please use a combination of numbers and letters or only letters to enter a valid school name",
                    maxlength: "School name cannot be more than 250 characters"
                },
                native_language: {
                    lettersonly: "Please use letters to enter a valid language",
                    required: "Native Language is required",
                    minlength: "Native Language cannot be more than 250 characters",
                },
                teaching_experience: {
                    required: "Please use a combination of numbers and letters to specify your teaching experience",
                },
                certificate: {
                    maxsize: "The certificate must not be greater than 500 kilobytes."
                },
                photo: {
                    maxsize: "The profile photo must not be greater than 500 kilobytes.",
                    extension: "The profile photo must be a file of type: jpg, jpeg, png."
                },
                banner: {
                    maxsize: "The banner must not be greater than 500 kilobytes.",
                    extension: "The banner must be a file of type: jpg, jpeg, png."
                }
            }
        });

        // Phone Input Fields Script Section
        /* INITIALIZE BOTH INPUTS WITH THE intlTelInput FEATURE*/
        $("#phone").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: true,
            initialCountry: "us",
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
        });

        $("#hiden").intlTelInput({
            initialCountry: "us",
            dropdownContainer: 'body',
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
        });

        /* ADD A MASK IN PHONE1 INPUT (when document ready and when changing flag) FOR A BETTER USER EXPERIENCE */
        var mask1 = $("#phone").attr('placeholder').replace(/[0-9]/g, 0);
        $(document).ready(function () {
            $('#phone').mask(mask1);
        });

        // Get payment form element
        var form = document.getElementById('instructorProfileEditForm');
        // Create a token when the form is submitted.
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            submitInstructorRegisterForm();
        });

        // On Form Submit Check Inputed Form Is Valid
        function submitInstructorRegisterForm() {
            document.getElementById("hiden").value = $("#phone").val().replace(/\s+/g, '');
            if(document.getElementById("hiden").value) {
                if ($("#hiden").intlTelInput("isValidNumber") == true) {
                    form.submit();
                } else {
                    toastr.error('Please enter valid phone number');
                    return false;
                }
            }
        }

        $('input.hide').parent().hide();
    });
</script>
@endpush