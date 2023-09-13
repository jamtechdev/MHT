@extends('front.layouts.app')
@section('content')
<!-- Init Google Recaptcha V3 Script -->
{!! RecaptchaV3::initJs() !!}
<style>
    @media only screen and (max-width: 425px) {
   
   .modal-content1 {
     background-color: #fefefe !important;
     margin: auto !important;
     padding: 20px !important;
     border: 1px solid #888 !important;
     width: 88% !important;
     border-radius: 25px !important;
   }
   
   }

   .btn-light:hover {
        color: #000;
        background-color: #e9ecf3 !important;
        border-color: #e8ebf2 !important;
    }
</style>
<section class="maz__login maz__sections">
    <div class="container">
        <div class="maz__box-shadow">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="maz__login-banner">
                        <h1 class="maz__login-banner-title">MartialArtsZen.com</h1>
                        <p class="maz__login-banner-text">Learn an array of disciplines from our wide selection of highly trained certified instructors and train the MartialArtsZen.com way!</p>
                        <a href="{{ route('student.login') }}" class="btn btn-free  btn-rounded btn-info dashboard_btn_info">Explore For Free</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="maz__login-form-wrapper">
                        <a href="{{ route('welcome') }}"><img id="loginFormLogo"data-src="{{ asset('images/newMartialArtsLogo.jpeg') }}" class="lazy maz-logo mb-4" alt="logo" style="width:50%;height:90px;"></a>
                        <h4 class="maz__login-form-title">Hi, Welcome Back</h4>
                        <h3 class="maz__login-form-info font-text">New to this site? <span class="text-primary"><a href="{{ url('softRegister?type=free') }}">Sign Up</a></span></h3>
                        {{-- <h3 class="maz__login-form-info font-text">New to this site? <span class="text-primary"><a href="{{ route('studentregister') }}">Sign Up</a></span></h3> --}}
                        {{-- <h3 class="maz__login-form-info">New to this site? <span class="text-primary"><a href="{{ route('student.register.step.one') }}">Sign Up</a></span></h3> --}}

                            <div class="d-grid gap-2 my-4">
                                <a class="btn btn-light btn-cmn-social" href="{{ url('auth/google?userRole=student&type=softRegister&selectedPlan=1') }}">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <span style="text-align:left;" id="googleSpan"><img id="googleLogin" data-src="{{ asset('images/Google__G__Logo-128.webp') }}" class="lazy" alt="google" style="height:10%; width: 25%;border-radius: 50%;margin-left: 5%;"></span>
                                        <span class="text-center">Sign in with Google</span>
                                    </div>
                                </a>
                                <a class="btn btn-light btn-cmn-facebook" href="{{ url('auth/facebook?userRole=student&type=softRegister&selectedPlan=1') }}" style="border: 1px solid #e5e9f1;background-color: #fff;">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <span id="facebookSpan" style="text-align:left;width: 128px;"><img id="facebookLogin" data-src="{{ asset('images/facebookLogo3.svg') }}" class="lazy" alt="facebook" style="width: 27%;margin-left: 2%;"></span>
                                        <span class="text-center" style="font-weight: 600;color: #000;">Sign in with Facebook</span>
                                    </div>
                                </a>
                            </div>
                            <div class="maz_seprator">
                                <span class="maz__signUp-text">Or Login With</span>
                            </div>
                            
                            
                            <form class="maz__register-form" method="POST" action="{{ route('student.login') }}" id="loginForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="maz__cmn-form-lable">Email <span class="text-primary">*</span></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required maxlength="200">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="maz__cmn-form-lable">Password <span class="text-primary">*</span></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required maxlength="20">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <!-- Generate Google Recaptcha V3 Field  -->
                                    {!! RecaptchaV3::initJs() !!}
                                    {!! RecaptchaV3::field('login') !!}
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-login btn-primary btn-rounded">Login</button>
                                </div>
                                <span class="maz__reset-text"><a href="{{ route('password.request') }}">Forgot Password?</a></span>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $("#loginForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    maxlength: 200,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                }
            },
            messages: {
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 200 characters"
                },
                password: {
                    required: "Password is required",
                    minlength: "Password must be at least 8 characters",
                    maxlength: "Password cannot be more than 20 characters"
                }
            }
        });
    });
</script>
@endpush