@extends('front.layouts.app')

@section('content')
<section class="maz__login maz__sections">
    <div class="container">
        <div class="maz__box-shadow">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="maz__login-banner">
                        <h1 class="maz__login-banner-title">MartialArtsZen.com</h1>
                        <p class="maz__login-banner-text">Try our beginner-level classes in a variety of disciplines and experience the MartialArtsZen magic.</p>
                        <a href="{{ route('student.login') }}" class="btn btn-free  btn-rounded btn-info dashboard_btn_info">Explore For Free</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="maz__login-form-wrapper">
                        <a href="{{ route('student.login') }}"><img data-src="{{ asset('assets/front/images/logo.svg') }}" class="lazy maz-logo mb-4" alt="logo"></a>
                        <h4 class="maz__login-form-title">Reset Password</h4>
                        <h3 class="maz__login-form-info">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h3>
                    <div>
                    <form class="maz__register-form" method="POST" action="{{ route('password.email') }}" id="resetPasswordForm">
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
                        <div class="d-grid">
                            <button type="submit" class="btn btn-login btn-primary btn-rounded">Email Password Reset Link</button>
                        </div>
                        <div class="mt-4 text-center">
                            Already have an account?
                            <a href="{{ route('student.login') }}" class="">Login Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $("#resetPasswordForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    maxlength: 200,
                }
            },
            messages: {
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 200 characters"
                }
            }
        });
    });
</script>
@endpush