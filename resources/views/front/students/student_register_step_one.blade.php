@extends('front.layouts.app')

@section('content')

<!-- START STUDENT REGISTER STEP ONE PAGE HTML -->
<section class="maz__register maz__sections">
  <div class="container">
    <div class="maz__register-wrapper">
      <form method="POST" action="{{ route('post.student.register.step.one') }}" class="maz__register-form" id="registerForm">
        @csrf
        <input type="hidden" name="is_subscribe" value="1">
        <div class="row">
            <!-- LEFT SIDE HTML -->
            <div class="col-lg-6">
              <div class="maz__form-wrapper">
                <a href="{{ route('student.login') }}"><img data-src="{{ asset('assets/front/images/logo.svg') }}" class="lazy mb-4" alt="logo"></a>
                <h4 class="maz__register-title">Let’s get you set up</h4>
                <p class="maz__register-text">You’re moments away from bringing hundreds of workout into your phone, TV or computer, anytime, anywhere.</p>
                <button type="button" class="btn btn-light btn-cmn-social mb-2"><a href="{{ url('auth/google?userRole=student') }}"><div class="d-flex align-items-center justify-content-start"><span><img data-src="{{ asset('assets/front/images/google.svg') }}" class="lazy" alt="google"></span><span class="text-center mx-auto">Signup with Google</span></div></a></button>
                <button type="button" class="btn btn-facebook btn-cmn-facebook"><a href="{{ url('auth/facebook?userRole=student') }}"><div class="d-flex align-items-center justify-content-start"><span><img data-src="{{ asset('assets/front/images/facebook.svg') }}" class="lazy" alt="facebook"></span><span class="text-white text-center mx-auto">Signup with Facebook</span></div></a></button>
                <div>
                  <img data-src="{{ asset('assets/front/images/line1.svg') }}" alt="line" class="lazy ms-4"><span class="maz__signUp-text ms-3 mb-3">Or Signup With</span><img data-src="{{ asset('assets/front/images/line1.svg') }}" alt="line" class="lazy ms-3">
                  <!-- START REGISTRATION FORM FIELDS HTML -->
                  <div class="mb-3">
                    <label for="email" class="maz__cmn-form-lable">Email <span class="text-primary">*</span></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $studentRegisterData->email ?? '' }}" required maxlength="250">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="maz__cmn-form-lable">Password <span class="text-primary">*</span></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required maxlength="20">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label for="password-confirm" class="maz__cmn-form-lable">Confirm Password <span class="text-primary">*</span></label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required maxlength="20">
                  </div>
                  <div class="mb-3">
                    <label for="firstname" class="maz__cmn-form-lable">First Name <span class="text-primary">*</span></label>
                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $studentRegisterData->firstname ?? '' }}" required maxlength="100">
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="lastname" class="maz__cmn-form-lable">Last Name <span class="text-primary">*</span></label>
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $studentRegisterData->lastname ?? '' }}" required maxlength="100">
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  {{-- <button type="submit" class="btn btn-account">Next</button> --}}
                  <!-- END REGISTRATION FORM FIELDS HTML -->
                </div>
              </div>
            </div>
            <!-- RIGHT SIDE HTML -->
            {{-- <div class="col-lg-6">
                <div class="maz__login-banner">
                    <h1 class="maz__login-banner-title">MartialArtsZen.com</h1>
                    <p class="maz__login-banner-text">Try our beginner-level classes in a variety of disciplines and experience the MartialArtsZen magic.</p>
                    <a href="{{ route('student.login') }}" class="btn btn-free  btn-rounded btn-info dashboard_btn_info">Explore For Free</a>
                </div>
            </div> --}}
            <div class="col-lg-6">
                <div class="maz__plan-wrapper">
                    <h4 class="maz__choose-title mb-4">Choose plan and payment option</h4>
                    <div class="dropdown">
                        <button class="btn btn-currency dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><span class="maz__currency-option">Select Currency :</span>USD ($)</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">USD ($)</a></li>
                        <li><a class="dropdown-item" href="#">GBP (£)</a></li>
                        <li><a class="dropdown-item" href="#">Euro (€)</a></li>
                        </ul>
                    </div>
                    <div class="maz__main-wrapper">
                        <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="maz__cmn-plan-box">
                            <h3 class="maz__cmn-plan-title">FREE PLAN</h3>
                            <hr>
                            <p class="maz__free-plan-text">View 10 Free Videos Per Instructor Only</p>
                            <button type="button" class="btn btn-cmn-plan">Select Plan</button>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">  
                            <div class="maz__cmn-plan-box">
                            <h3 class="maz__cmn-plan-title">BRONZE PLAN</h3>
                            <hr>
                            <div class="d-flex align-items-center justify-content-start">
                            <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                            <span class="maz__cmn-plan-price">$19.99/Month</span>
                            </div>
                            <button type="button" class="btn btn-cmn-plan">Select Plan</button>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="maz__cmn-plan-box">
                            <h3 class="maz__cmn-plan-title">SILVER PLAN</h3>
                            <hr>
                            <div class="d-flex align-items-center justify-content-start">
                            <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                            <span class="maz__cmn-plan-price">$29.99/Month</span>
                            </div>
                            <button type="button" class="btn btn-cmn-plan">Select Plan</button>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="maz__cmn-plan-box">
                            <h3 class="maz__cmn-plan-title">GOLD PLAN</h3>
                            <hr>
                            <div class="d-flex align-items-center justify-content-start">
                            <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                            <span class="maz__cmn-plan-price">$39.99/Month</span>
                            </div>
                            <button type="button" class="btn btn-cmn-plan">Select Plan</button>
                            </div>
                        </div>
                        {{-- <div class="maz__check-wrapper">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">Yes, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">No, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                            </div>
                        </div> --}}
                        <!-- <a href="#{{-- route('register-process') --}}" class="btn btn-account">Create Account</a> -->
                        <button type="submit" class="btn btn-account">Next</button>
                        </div>
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
        $("#registerForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    maxlength: 250,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",
                },
                firstname: {
                    required: true,
                    maxlength: 100,
                },
                lastname: {
                    required: true,
                    maxlength: 100,
                }
            },
            messages: {
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
                    required:  "Confirm password is required",
                    equalTo: "Password and confirm password should same"
                },
                firstname: {
                    required: "Firstname is required",
                    maxlength: "Firstname cannot be more than 100 characters"
                },
                lastname: {
                    required: "Lastname is required",
                    maxlength: "Lastname cannot be more than 100 characters"
                }
            }
        });
    });
</script>
@endpush