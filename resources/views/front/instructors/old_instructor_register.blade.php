@extends('front.layouts.app')

@section('content')
<!-- Init Google Recaptcha V3 Script -->
{!! RecaptchaV3::initJs() !!}
{{-- Init Phone Field CSS  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />

<section class="maz__login maz__sections">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-9 col-xl-10 col-md-12">
                <div class="maz__register-box-shadow">
                    <div class="maz__register-form-wrapper">
                        <form class="maz__register-form p-0" method="POST" action="{{ route('instructor_register') }}" id="instructorRegisterForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-around">
                                <div class="col-lg-5 col-custom">
                                    <a href="{{ route('instructor_login') }}"><img
                                            data-src="{{ asset('assets/front/images/logo.svg') }}"
                                            class="lazy maz-logo mb-5" alt="logo"></a>
                                    <div class="mb-4 d-flex align-items-center">
                                        <a href="{{ route('instructor_login') }}" class="btn btn-back-icon btn-outline-dark rounded-circle me-3" title="Back">
                                            <i class="fas fa-arrow-left" title="Back"></i>
                                        </a>
                                        <h3 class="mb-0">
                                            Instructor Signup
                                        </h3>
                                    </div>

                                    <div class="d-grid gap-2 my-4">
                                        <a class="btn btn-light btn-cmn-social" href="{{ url('auth/google?userRole=instructor') }}">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <span><img data-src="{{ asset('assets/front/images/google.svg') }}"
                                                        class="lazy" alt="google"></span><span
                                                    class="text-center mx-auto">Signup with Google</span>
                                            </div>
                                        </a>


                                        <a class="btn btn-facebook btn-cmn-facebook" href="{{ url('auth/facebook?userRole=instructor') }}">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <span>
                                                    <img data-src="{{ asset('assets/front/images/facebook.svg') }}"  class="lazy" alt="facebook">
                                                </span>
                                                <span class="text-white text-center mx-auto">Signup with Facebook</span>
                                            </div>
                                        </a>

                                    </div>

                                    <div class="maz_seprator">
                                        <span class="maz__signUp-text">Or Signup With</span>
                                    </div>


                                    <div class="mb-2">
                                        <label for="name" class="col-form-label">Name <span
                                                class="text-primary">*</span></label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required maxlength="250">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="email" class="col-form-label">Email <span class="text-primary">*</span></label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required maxlength="200">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="password" class="col-form-label">Password <span
                                                class="text-primary">*</span></label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required maxlength="20">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="password-confirm" class="col-form-label">Confirm Password
                                            <span class="text-primary">*</span></label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required maxlength="20">
                                    </div>
                                    <div class="mb-2">
                                        <label for="phone" class="col-form-label">Phone <span class="text-primary">*</span></label><br/>
                                        {{-- <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required maxlength="12" placeholder="xxx-xxx-xxxx" autocomplete="off"> --}}
                                        <input type="tel" name ="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required maxlength="12" autocomplete="off">
                                        <input type="tel" class="hide" id="hiden">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="mb-2">
                                        <label for="address" class="col-form-label">Address <span
                                                class="text-primary">*</span></label>
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" required maxlength="250">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="city" class="col-form-label">City <span
                                                class="text-primary">*</span></label>
                                        <input id="city" type="text"
                                            class="form-control @error('city') is-invalid @enderror" name="city"
                                            value="{{ old('city') }}" required maxlength="50">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="state" class="col-form-label">State <span
                                                class="text-primary">*</span></label>
                                        <input id="state" type="text"
                                            class="form-control @error('state') is-invalid @enderror" name="state"
                                            value="{{ old('state') }}" required maxlength="50">
                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="zip" class="col-form-label">Zip <span
                                                class="text-primary">*</span></label>
                                        <input id="zip" type="text"
                                            class="form-control @error('zip') is-invalid @enderror" name="zip"
                                            value="{{ old('zip') }}" required maxlength="11">
                                        @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="country" class="col-form-label">Country <span
                                                class="text-primary">*</span></label>
                                        <input id="country" type="text"
                                            class="form-control @error('country') is-invalid @enderror" name="country"
                                            value="{{ old('country') }}" required maxlength="50">
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="school_name" class="col-form-label">School Name <span
                                                class="text-primary">*</span></label>
                                        <input id="school_name" type="text"
                                            class="form-control @error('school_name') is-invalid @enderror"
                                            name="school_name" value="{{ old('school_name') }}" required
                                            maxlength="250">
                                        @error('school_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="certificate" class="col-form-label">Upload Certificate <span
                                                class="text-primary">*</span></label>
                                        <input id="certificate" type="file"
                                            class="form-control @error('certificate') is-invalid @enderror"
                                            name="certificate" required>
                                        @error('certificate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <!-- Generate Google Recaptcha V3 Field  -->
                                        {!! RecaptchaV3::field('instructor_register') !!}
                                        @error('instructor_register')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="d-grid mt-3">
                                            <button type="submit" class="btn btn-login btn-primary btn-rounded ">{{ __('Register') }}</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
{{-- Init Phone Field Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
<script>
    $(document).ready(function () {
        // Initialize Max File Size Jquery Validator
        jQuery.validator.addMethod("filesize_max", function (value, element, param) {
            var isOptional = this.optional(element),
                file;

            if (isOptional) {
                return isOptional;
            }

            if ($(element).attr("type") === "file") {

                if (element.files && element.files.length) {

                    file = element.files[0];
                    return (file.size && file.size <= param);
                }
            }
            return false;
        }, "File size is too large.");

        // Define Form Jquary Validator
        $("#instructorRegisterForm").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 250
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 250
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
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
                    maxlength: 50
                },
                state: {
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
                    maxlength: 50
                },
                school_name: {
                    required: true,
                    maxlength: 250
                },
                certificate: {
                    required: true,
                    filesize_max: 500000
                }
            },
            messages: {
                name: {
                    required: "Name is required",
                    maxlength: "Name cannot be more than 250 characters"
                },
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 250 characters"
                },
                password: {
                    required: "Password is required",
                    minlength: "Password must be at least 8 characters",
                    maxlength: "Password cannot be more than 20 characters"
                },
                password_confirmation: {
                    required: "Confirm password is required",
                    equalTo: "Password and confirm password should same"
                },
                phone: {
                    required: "Phone is required",
                    phoneUS: "Please specify a valid phone",
                    minlength: "Phone must be at least 12 characters",
                    maxlength: "Phone cannot be more than 12 characters"
                },
                address: {
                    required: "Address is required",
                    maxlength: "Address cannot be more than 250 characters"
                },
                city: {
                    required: "City is required",
                    maxlength: "City cannot be more than 50 characters"
                },
                state: {
                    required: "State is required",
                    maxlength: "State cannot be more than 50 characters"
                },
                zip: {
                    required: "Zip is required",
                    maxlength: "Zip cannot be more than 11 characters"
                },
                country: {
                    required: "Country is required",
                    maxlength: "Country cannot be more than 50 characters"
                },
                school_name: {
                    required: "School name is required",
                    maxlength: "School name cannot be more than 250 characters"
                },
                certificate: {
                    required: "Certificate is required",
                    filesize_max: "The certificate must not be greater than 500 kilobytes."
                }
            }
        });

        // Phone Input Fields Script Section
        /* INITIALIZE BOTH INPUTS WITH THE intlTelInput FEATURE*/
        $("#phone").intlTelInput({
            allowDropdown: false,
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
        var form = document.getElementById('instructorRegisterForm');
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