@extends('front.layouts.app')

@section('content')

{{-- Init Phone Field CSS  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />

@include('front.include.student_alert_box')
<!-- maz main wrapper -->
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.student_header')
            </div>
            <div class="wrapper-content">
                <h4 class="dashboard_titles">Edit Profile</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <form method="POST" action="{{ route('student_profile_edit_post', $studentProfileData['id']) }}" id="studentProfileEditForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="firstname" class="col-form-label text-md-end">{{ __('First Name') }} <span class="text-primary">*</span></label>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $studentProfileData['firstname'] }}" required maxlength="100">
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="lastname" class="col-form-label text-md-end">{{ __('Last Name') }} <span class="text-primary">*</span></label>
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $studentProfileData['lastname'] }}" required maxlength="100">
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="col-form-label text-md-end">{{ __('Email') }} <span class="text-primary">*</span></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $studentProfileData['email'] }}" required maxlength="250">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="phone" class="col-form-label text-md-end">Phone <span class="text-primary">*</span></label>
                                    {{-- <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $studentProfileData['phone'] }}" required maxlength="12" placeholder="xxx-xxx-xxxx" autocomplete="off"> --}}
                                    <input type="tel" name ="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $studentProfileData['phone'] }}" required maxlength="12" autocomplete="off">
                                    <input type="tel" class="hide" id="hiden">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="age_group" class="col-form-label text-md-end">Age Group <span class="text-primary">*</span></label>
                                    <select class="form-select @error('age_group') is-invalid @enderror" aria-label="Select Age Group" name="age_group" required>
                                        <option value="">Select Age Group</option>
                                        <option value="Under 10" @if ($studentProfileData['age_group']=='Under 10' ) selected="selected" @endif>Under 10</option>
                                        <option value="10-13" @if ($studentProfileData['age_group']=='10-13' ) selected="selected" @endif>10-13</option>
                                        <option value="14-17" @if ($studentProfileData['age_group']=='14-17' ) selected="selected" @endif>14-17</option>
                                        <option value="18-20" @if ($studentProfileData['age_group']=='18-20' ) selected="selected" @endif>18-20</option>
                                        <option value="21-29" @if ($studentProfileData['age_group']=='21-29' ) selected="selected" @endif>21-29</option>
                                        <option value="30-39" @if ($studentProfileData['age_group']=='30-39' ) selected="selected" @endif>30-39</option>
                                        <option value="40-49" @if ($studentProfileData['age_group']=='40-49' ) selected="selected" @endif>40-49</option>
                                        <option value="50-59" @if ($studentProfileData['age_group']=='50-59' ) selected="selected" @endif>50-59</option>
                                        <option value="60+" @if ($studentProfileData['age_group']=='60+' ) selected="selected" @endif>60+</option>
                                    </select>
                                    @error('age_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="gender" class="col-form-label text-md-end">Gender <span class="text-primary">*</span></label>
                                    <select class="form-select @error('gender') is-invalid @enderror" aria-label="Select Gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male" @if ($studentProfileData['gender']=='Male' ) selected="selected" @endif>Male</option>
                                        <option value="Female" @if ($studentProfileData['gender']=='Female' ) selected="selected" @endif>Female</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="profile_picture" class="col-form-label text-md-end">Profile Picture</label> <span class="text-primary">*</span></label>
                                    <input class="form-control @error('profile_picture') is-invalid @enderror" type="file" id="profile_picture" name="profile_picture">
                                    @if($studentProfileData['profile_picture'] == '')
                                        <span style="color:red;font-size: 0.8rem;">* Upload Profile Picture</span>
                                    @endif
                                    @error('profile_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                @if($studentProfileData['profile_picture'])
                                <div class="col-md-4 mt-3">
                                    {{-- <img src="{{ Storage::url($studentProfileData['profile_picture']) }}" alt="Profile-Picture" width="150"></img> --}}
                                    <img src="{{asset('students_profile_pictures')}}/{{$studentProfileData['profile_picture']}}"  alt="Profile-Picture" width="150">
                                </div>
                                @endif
                            </div>
                            <div class="row mt-5 mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" style="margin-bottom: 0.2rem !important;" class="btn btn-success dashboard_btn_lg text-uppercase me-sm-3 mb-2 mb-sm-0">Save Changes</button>
                                    <a class="btn btn btn-danger text-uppercase dashboard_btn_lg dashboard_btn_lg" style="margin-bottom: 0.2rem !important;" href="{{ route('student_profile', $studentProfileData['id']) }}">Cancel</a>
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
<script>
    $(document).ready(function() {
        // Add Phone Input Mask
        // $('#phone').usPhoneFormat();
        // Define Form Jquary Validator
        $("#studentProfileEditForm").validate({
            rules: {
                firstname: {
                    required: true,
                    maxlength: 100,
                },
                lastname: {
                    required: true,
                    maxlength: 100,
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 250,
                },
                phone: {
                    required: true,
                    phoneUS: true,
                    minlength: 12,
                    maxlength: 12,
                },
                age_group: {
                    required: true,
                    maxlength: 10,
                },
                gender: {
                    required: true,
                },
                profile_picture: {
                    // required: true,
                    maxsize: 500000,
                    extension: "jpg,jpeg,png",
                }
            },
            messages: {
                firstname: {
                    required: "First name is required",
                    minlength: "First name cannot be more than 100 characters",
                },
                lastname: {
                    required: "Last name is required",
                    minlength: "Last name cannot be more than 100 characters",
                },
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 250 characters",
                },
                phone: {
                    required: "Phone is required",
                    phoneUS: "Please specify a valid phone",
                    minlength: "Phone must be at least 12 characters",
                    maxlength: "Phone cannot be more than 12 characters",
                },
                age_group: {
                    required: "Age group is required",
                },
                gender: {
                    required: "Gender is required",
                },
                profile_picture: {
                    // required: "Profile picture is required",
                    maxsize: "The Profile picture must not be greater than 500 kilobytes.",
                    extension: "The profile picture must be a file of type: jpg, jpeg, png.",
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
        var form = document.getElementById('studentProfileEditForm');
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