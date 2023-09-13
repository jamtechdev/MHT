@extends('front.layouts.app')

@section('content')

{{-- Init Phone Field CSS  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />

<section class="maz__login maz__sections">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-9 col-xl-10 col-md-12">
                <div class="maz__register-box-shadow">
                    <div class="maz__register-form-wrapper">
                        <form class="maz__register-form p-0" method="POST" action="{{ route('instructor_edit', $id) }}" id="instructorEditForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-around">
                                <div class="col-md-5 col-custom">
                                    <a href="#"><img data-src="{{ asset('assets/front/images/logo.svg') }}" class="lazy maz-logo mb-5" alt="logo"></a>
                                    <h3 class="mb-4 ">Instructor Edit</h3>
                                    <div class="mb-2">
                                        <label for="phone" class="col-form-label">Phone <span class="text-primary">*</span></label>
                                        {{-- <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required maxlength="12" placeholder="xxx-xxx-xxxx" autocomplete="off"> --}}
                                        <input type="tel" name ="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required maxlength="12" autocomplete="off">
                                        <input type="tel" class="hide" id="hiden">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="address" class="col-form-label">Address <span class="text-primary">*</span></label>
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required maxlength="250">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="city" class="col-form-label">City <span class="text-primary">*</span></label>
                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required maxlength="50">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="mb-2">
                                        <label for="state" class="col-form-label">State <span class="text-primary">*</span></label>
                                        <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required maxlength="50">
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="zip" class="col-form-label">Zip <span class="text-primary">*</span></label>
                                        <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required maxlength="11">
                                        @error('zip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="country" class="col-form-label">Country <span class="text-primary">*</span></label>
                                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required maxlength="50">
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="school_name" class="col-form-label">School Name <span class="text-primary">*</span></label>
                                        <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" value="{{ old('school_name') }}" required maxlength="250">
                                        @error('school_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="certificate" class="col-form-label">Upload Certificate <span class="text-primary">*</span></label>
                                        <input id="certificate" type="file" class="form-control @error('certificate') is-invalid @enderror" name="certificate" required>
                                        @error('certificate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <div class="d-flex align-item-center justify-content-center">
                                             <button type="submit" class="btn btn-danger dashboard_btn_sm mt-3">{{__('Save') }}</button>
                                        </div>
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
    $(document).ready(function() {
        // Add Phone Input Mask
        // $('#phone').usPhoneFormat();
        // Initialize Max File Size Jquery Validator
        jQuery.validator.addMethod("filesize_max", function(value, element, param) {
            var isOptional = this.optional(element),
                file;
            
            if(isOptional) {
                return isOptional;
            }
            
            if ($(element).attr("type") === "file") {
                
                if (element.files && element.files.length) {
                    
                    file = element.files[0];            
                    return ( file.size && file.size <= param ); 
                }
            }
            return false;
        }, "File size is too large.");

        // Define Form Jquary Validator
        $("#instructorEditForm").validate({
            rules: {
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
        var form = document.getElementById('instructorEditForm');
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