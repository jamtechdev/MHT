@extends('front.layouts.app')

@section('content')
<!-- Init Google Recaptcha V3 Script -->
{!! RecaptchaV3::initJs() !!}
<!-- Start New Registration Page -->
<section class="maz__register maz__sections">
  <div class="container">
    <div class="maz__register-wrapper maz__register-wrapper-plan">
      <form method="POST" action="{{ route('register') }}" class="maz__register-form" id="registerForm">
        @csrf
        <input type="hidden" name="is_subscribe" value="1">
        <div class="row">
          <!-- LEFT SIDE HTML -->
          <div class="col-lg-6">
            <div class="maz__form-wrapper">
              <a href="{{ route('student.login') }}"><img data-src="{{ asset('assets/front/images/logo.svg') }}" class="lazy mb-4" alt="logo"></a>
              <h4 class="maz__register-title">Let’s get you set</h4>
              <p class="maz__register-text">You’re moments away from bringing hundreds of workout into your phone, TV or computer, anytime, anywhere.</p>
              <div class="d-grid gap-2 my-4">
                <a  class="btn btn-light btn-cmn-social" href="{{ url('auth/google?userRole=student') }}"><div class="d-flex align-items-center justify-content-start"><span><img data-src="{{ asset('assets/front/images/google.svg') }}" class="lazy" alt="google"></span><span class="text-center mx-auto">Signup with Google</span></div></a>
                <a class="btn btn-cmn-facebook" href="{{ url('auth/facebook?userRole=student') }}"><div class="d-flex align-items-center justify-content-start"><span><img data-src="{{ asset('assets/front/images/facebook.svg') }}" class="lazy" alt="facebook"></span><span class="text-white text-center mx-auto">Signup with Facebook</span></div></a>
              </div>
              <div>
              <div class="maz_seprator">
                  <span class="maz__signUp-text">Or Signup With</span>
                </div>
                <!-- START REGISTRATION FORM FIELDS HTML -->
                <div class="mb-3">
                  <label for="email" class="maz__cmn-form-lable">Email <span class="text-primary">*</span></label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" maxlength="250">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="maz__cmn-form-lable">Password <span class="text-primary">*</span></label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" maxlength="20">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="password-confirm" class="maz__cmn-form-lable">Confirm Password <span class="text-primary">*</span></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" maxlength="20">
                </div>
                <div class="mb-3">
                  <label for="firstname" class="maz__cmn-form-lable">First Name <span class="text-primary">*</span></label>
                  <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" maxlength="100">
                  @error('firstname')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="lastname" class="maz__cmn-form-lable">Last Name <span class="text-primary">*</span></label>
                  <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" maxlength="100">
                  @error('lastname')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="promocode" class="maz__cmn-form-lable">Promo Code <span class="text-primary">*</span></label>
                  <input id="promocode" type="text" class="form-control @error('promocode') is-invalid @enderror" name="promocode" value="AFEMAZ" placeholder="AFEMAZ" maxlength="20" readonly="true">
                  @error('promocode')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <!-- Generate Google Recaptcha V3 Field  -->
                  {!! RecaptchaV3::field('register') !!}
                </div>
                <!-- END REGISTRATION FORM FIELDS HTML -->
              </div>
            </div>
          </div>
          <!-- RIGHT SIDE HTML -->
          <div class="col-lg-6">
            <input type="hidden" name="plan" id="plan" value="Bronze">
            <input type="hidden" name="price" id="price" value="1">
            <input type="hidden" name="interval" id="interval" value="month">
            <input type="hidden" name="currency" id="currency" value="USD">
            <div class="maz__plan-wrapper">
              <h5 class="maz__choose-title mb-4">Choose plan and payment option</h5>
              <div class="maz__cmn-dropdown mx-auto maz__currency-dropdown">
                  <span class="maz__currency-option ms-2">Select Currency:</span>
                  <select class="form-select">
                      <option selected value="USD">USD ($)</option>
                      {{-- <option value="GBP">GBP (£)</option>
                      <option value="Euro">Euro (€)</option> --}}
                  </select>
              </div>
              <div class="maz__main-wrapper">
                <div class="row">
                  <div class="col-lg-12 mb-8">
                    <div class="maz__cmn-plan-box">
                        <h3 class="maz__cmn-plan-title">BRONZE PLAN</h3>
                        <hr>
                        <div class="d-flex align-items-center justify-content-start">
                          <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                          <span class="maz__cmn-plan-price">$1/Month</span>
                        </div>
                        <button type="button" class="btn btn-cmn-plan active">Select Plan</button>
                    </div>
                  </div>
                  {{-- <div class="maz__check-wrapper">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe1" value="1" checked>
                        <label class="form-check-label" for="is_subscribe1">Yes, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe2" value="0">
                        <label class="form-check-label" for="is_subscribe2">No, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                    </div>
                  </div> --}}
                  <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-login btn-primary btn-rounded">Create Account</button>
                  </div>
                  
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
                },
                promocode: {
                  required: true,
                  maxlength: 20,
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
                },
                promocode: {
                  required: "Promo Code is required",
                  maxlength: "Promo Code cannot be more than 20 characters"
                }
            }
        });
    });
</script>
@endpush