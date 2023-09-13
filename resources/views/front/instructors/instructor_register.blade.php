@extends('front.layouts.app')
<style>
    label#phone-error {
        position: absolute;
    }

    .btn-light:hover {
        color: #000;
        background-color: #e9ecf3 !important;
        border-color: #e8ebf2 !important;
    }
</style>

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
                                    id="loginFormLogo" data-src="{{ asset('images/newMartialArtsLogo.jpeg') }}"
                                            class="lazy maz-logo mb-5" alt="logo" style="width:50%;height:80px;"></a>
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
                                                <span style="text-align:left;" id="googleSpan"><img id="googleLogin" data-src="{{ asset('images/Google__G__Logo-128.webp') }}"
                                                        class="lazy" alt="google" style="height:10%; width: 25%;border-radius: 50%;margin-left: 5%;"></span><span
                                                    class="text-center">Signup with Google</span>
                                            </div>
                                        </a>


                                        <a class="btn btn-light btn-facebook btn-cmn-facebook" href="{{ url('auth/facebook?userRole=instructor') }}" style="border: 1px solid #e5e9f1;background-color: #fff;">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <span style="text-align:left;width: 128px;" id="facebookSpan">
                                                    <img id="facebookLogin" data-src="{{ asset('images/facebookLogo3.svg') }}"  class="lazy" alt="facebook" style="width: 27%;margin-left: 2%;">
                                                </span>
                                                <span class="text-center" style="font-weight: 600;color: #000;">Signup with Facebook</span>
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
                                        <div class="input-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required maxlength="20">
                                            <span class="input-group-text">  
                                                <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>
                                            </span> 
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="password-confirm" class="col-form-label">Confirm Password
                                            <span class="text-primary">*</span></label>
                                        <div class="input-group">
                                            <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required maxlength="20">
                                            <span class="input-group-text">  
                                                <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password1"></span>
                                            </span> 
                                        </div> 
                                    </div>
                                    <div class="mb-2">
                                        <label for="phone" class="col-form-label">Phone <span class="text-primary">*</span></label><br/>
                                        {{-- <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required maxlength="12" placeholder="xxx-xxx-xxxx" autocomplete="off"> --}}
                                        <input type="tel" name ="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required maxlength="12" autocomplete="off">
                                        <input type="tel" class="hide" id="hiden">
                                        @error('phone')
                                        <span class="invalid-feedback"  role="alert">
                                            <strong >{{ $message }}</strong>
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

        jQuery.validator.addMethod("validate_email", function(value, element) {

        if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
        return true;
        } else {
        return false;
        }
        }, "Please enter a valid Email.");


        jQuery.validator.addMethod("validate_password", function(value, element) {
        if (/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%&]).*$/.test(value)) {
        return true;
        } else {
        return false;
        }
        }, "Please enter a valid password.");

        jQuery.validator.addMethod("noSpace", function(value, element) { 
        return value.indexOf(" ") < 0 && value != ""; 
        }, "No space please and don't leave it empty");


        // Define Form Jquary Validator
        $("#instructorRegisterForm").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 250,
                    lettersonly: true 
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 250,
                    validate_email: true
                },
                 password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    validate_password : true,
                    noSpace:true
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
                    lettersonly: true,
                    required: true,
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
                    lettersonly: true,
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
                    required: "NAME IS REQUIRED",
                    maxlength: "NAME CANNOT BE MORE THAN 250 CHARACTERS",
                    lettersonly: "PLEASE USE ONLY ALPHABETICAL LETTERS"
                },
                email: {
                    required: "EMAIL IS REQUIRED",
                    email: "WRONG OR INVALID EMAIL ADDRESS. PLEASE CORRECT AND TRY AGAIN.",
                    maxlength: "EMAIL CANNOT BE MORE THAN 250 CHARACTERS",
                    validate_email: "WRONG OR INVALID EMAIL ADDRESS. PLEASE CORRECT AND TRY AGAIN.",
                },
                password: {
                    required: "PASSWORD IS REQUIRED",
                    minlength: "PASSWORD MUST BE AT LEAST 8 CHARACTERS",
                    maxlength: "PASSWORD CANNOT BE MORE THAN 20 CHARACTERS",
                    validate_password: "PASSWORD MUST BE AT LEAST 8 CHARACTERS.<br>PASSWORD CANNOT BE MORE THAN 20 CHARACTERS.<br>PASSWORD MUST BE INCLUDES UPPERCASE, LOWERCASE LETTERS, SPECIAL SYMBOLS & NUMBERS.",
                    noSpace : "NO SPACE ALLOWED"
                },
                password_confirmation: {
                    required: "CONFIRM PASSWORD IS REQUIRED",
                    equalTo: "PASSWORD MUST BE AT LEAST 8 CHARACTERS.<br>PASSWORD CANNOT BE MORE THAN 20 CHARACTERS.<br>PASSWORD MUST BE INCLUDES UPPERCASE, LOWERCASE LETTERS, SPECIAL SYMBOLS & NUMBERS.<br>(PASSWORD AND CONFIRM PASSWORD SHOULD BE THE SAME)",
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
                    required: "Zip is required",
                    maxlength: "Zip cannot be more than 10 characters"
                },
                country: {
                    lettersonly: "Please use letters to enter a valid country",
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
            },
            
            errorPlacement: function ( error, element ) 
            {
                if(element.parent().hasClass('input-group')){
                error.insertAfter( element.parent() );
                }else{
                    error.insertAfter( element );
                }
            },
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

<script type="text/javascript">
$("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});

</script>
<script type="text/javascript">

$("body").on('click', '.toggle-password1', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#password-confirm");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});

</script>

@endpush