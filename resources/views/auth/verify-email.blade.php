@extends('front.layouts.app')

@section('content')
<section class="maz__login maz__sections">
    <div class="container">
        <div class="maz__box-shadow">
            <div class="row g-0">
                <div class="col-lg-6">

                    <div class="maz__login-banner">
                        <h1 class="maz__login-banner-title">MartialArtsZen.com</h1>
                        <p class="maz__login-banner-text">Get a feel of the classes offered in a variety of disciplines and experience the difference of MartialArtsZen learning.</p>
                        {{-- <a href="{{ route('verification.notice') }}" class="btn btn-free  btn-rounded btn-info dashboard_btn_info">Explore For Free</a> --}}
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <div class="maz__login-form-wrapper">
                        <a href="{{ route('student.login') }}"><img data-src="{{ asset('assets/front/images/logo.svg') }}" class="lazy maz-logo mb-4" alt="logo"></a>
                        <h4 class="maz__login-form-title">Verify Email</h4>
                        <h3 class="maz__login-form-info">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </h3>
                        @if (session('status') == 'verification-link-sent')
                        <h3 class="maz__login-form-info">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </h3>
                        @endif
                        <form method="POST" action="{{ route('verification.send') }}" class="maz__register-form">
                            @csrf
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-login btn-primary btn-rounded mb-2">{{ __('Resend Verification Email') }}</button>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('logout') }}" class="maz__register-form">
                            @csrf
                            <div class="d-grid">
                                <button type="submit" class="btn btn-login btn-dark btn-rounded">{{ __('Logout') }}
                            </div>
                        </form>
                    <div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection