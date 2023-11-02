@extends('front.layouts.app')

@section('content')
<!-- Init Google Recaptcha V3 Script -->
{!! RecaptchaV3::initJs() !!}

{{-- Init Phone Field CSS  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" /> -->
<link href="{{asset('assets/front/css/intlTelInput.css')}}" rel="stylesheet" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
<style>

.tooltip {  
  position: relative;
  display: inline-block;
  /* border-bottom: 1px dotted black; */
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 250px;
  padding:20px;
  background-color: #f1f1f1;
  color: #000;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  padding:12px;
  /* box-shadow: 2px 2px 0px 0px #f248482e; */
}

select.select {
width: 70%;
padding: 4px 10px;
border-radius: 5px;
}


/* for modal */

.modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
 /* padding-top: 100px;  Location of the box */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  /*overflow: auto;  Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  z-index: 9999;
}

/* Modal Content */
.get-started-button {
    background-color: #ff002c;
    color: #fff;
    padding: 8px 24px;
    border-radius: 24px;
    display: flex;
    justify-content: center;
}
.get-started-button:hover{
    color:#fff;
    background-color: #cc123a;
}
.modal-content2 {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width:96%;
  /* min-height:80%; */
  height: 100vh;
    min-height: 100vh;
    max-height: 100vh;
  border-radius: 25px;
  margin-top: 30px;
}


/* The Close Button */
.close2 {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close2:hover,
.close2:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
button.btn-login.plan-button {
    background-color: #fff;
    width: 108%;
    min-height: 52px;
    font-weight: bolder;
    font-size: 10px;
    height: 100% !important;
    line-height: 14px;
    border: 2px solid red;
    border-radius: 20px 20px;
}
button.btn-login.plan-button:hover {
    background-color: #efefef;

}
@media only screen and (max-width: 767px){
    .modal-content2 {
        width:80%;
        height: auto;  
    }

    button.btn-login.plan-button{
        font-size:10px;
        width:140%;
    }
    .modal-content2 {
        min-height:50%; 
    }
    td.thead {
        font-size: 12px;
    }
    button.btn-login.plan-button{
        width:138%;
        margin-top: 3.2px;
    }
    
}
.fa-xmark{
    color: red;
}
.fa-check{
    color: green !important;
}
thead, tbody, tfoot, tr, td, th{
    border-style: none;
    padding: 12px 16px !important;
}

button.btn-login.plan-button.comming-soon {
    background: #efefef;
}


.fa-check:before{
    color:green !important;
}

.fa-xmark:before{
    color:red !important;
}
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
.custom-form{
    height: 100vh !important;
    max-height: 100vh !important;
    max-height: 100vh !important;
}
</style>
<!-- Start New Registration Page -->
<section class="maz__register maz__sections">
    <div class="container text-center">
        {{--<h5 class="">Should the page not load, please kindly clear your browser on your device and try again. Thanks</h5>--}}
    </div>
    <div class="container">
        <div class="maz__register-wrapper">
            <form method="POST" action="{{ url('studentregister?type='.$registerType) }}" class="maz__register-form" id="studentRegisterForm">
                @csrf
                <input type="hidden" name="request_type" id="request_type" value="{{ $registerType }}">
                <input type="hidden" name="is_subscribe" value="1">
                <input type="hidden" name="subscription_id" id="subscription_id" value="{{ isset($firstPlan->id) ?  $firstPlan->id : ''}}">
                <input type="hidden" name="any_plan" id="any_plan" value="{{ request()->value || request()->type }}">
                
                <div class="row">
                    <!-- LEFT SIDE HTML -->
                    <div class="col-lg-6">
                        <div class="maz__form-wrapper">
                            <a href="{{ route('student.login') }}"><img id="loginFormLogo" data-src="{{ asset('images/newMartialArtsLogo.jpeg') }}" class="lazy mb-4" alt="logo" style="width:45%;height:80px;"></a>
                            <h4 class="maz__register-title">Let's get you set up</h4>
                            <p class="maz__register-text">You're moments away from accessing FREE martial arts, fitness, yoga, and dance training videos.</p>
                            {{-- <p class="maz__register-text">You're moments away from bringing hundreds of workout into your phone, TV or computer, anytime, anywhere.</p> --}}
                            <div class="d-grid gap-2 my-4">
                                <a class="btn btn-light btn-cmn-social" id="changeGoogleUrl" href="{{ url('auth/google?userRole=student&type='.$registerType.'&referral_code='.$referral_code.'&selectedPlan='.$firstPlan->id.'') }}">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <span style="text-align:left;" id="googleSpan"><img id="googleLogin" data-src="{{ asset('images/Google__G__Logo-128.webp') }}" class="lazy" alt="google" style="height:10%; width: 25%;border-radius: 50%;margin-left: 5%;"></span>
                                        <span class="text-center">Signup with Google</span>
                                    </div>
                                </a>
                                <a class="btn btn-light btn-cmn-facebook" id="changeFacebookUrl" href="{{ url('auth/facebook?userRole=student&type='.$registerType.'&referral_code='.$referral_code.'&selectedPlan='.$firstPlan->id.'') }}" style="border: 1px solid #e5e9f1;background-color: #fff;">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <span style="text-align:left;width: 128px;" id="facebookSpan"><img id="facebookLogin" data-src="{{ asset('images/facebookLogo3.svg') }}" class="lazy" alt="facebook" style="width: 27%;margin-left: 2%;"></span>
                                        <span class="text-center" style="font-weight: 600;color: #000;">Signup with Facebook</span>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <div class="maz_seprator">
                                    <span class="maz__signUp-text">Or Signup With</span>
                                </div>

                                <!-- START REGISTRATION FORM FIELDS HTML -->
                                <div class="mb-3">
                                    <label for="email" class="maz__cmn-form-lable">Email <span class="text-primary">*</span></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required maxlength="250">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="maz__cmn-form-lable">Password <span class="text-primary">*</span></label>
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required maxlength="20">
                                        <span class="input-group-text">  
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>    
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password-confirm" class="maz__cmn-form-lable">Confirm Password <span class="text-primary">*</span></label>
                                    <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required maxlength="20">
                                        <span class="input-group-text">  
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password1"></span>    
                                    </div>
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="firstname" class="maz__cmn-form-lable">First Name <span class="text-primary">*</span></label>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required maxlength="100">
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="lastname" class="maz__cmn-form-lable">Last Name <span class="text-primary">*</span></label>
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required maxlength="100">
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="maz__cmn-form-lable">Phone <span class="text-primary">*</span></label><br/>
                                    {{-- <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" maxlength="12" placeholder="xxx-xxx-xxxx" autocomplete="off"> --}}
                                    <input type="tel" name ="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required maxlength="12" autocomplete="off">
                                    <input type="tel" class="hide" id="hiden">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @if($registerType == 'register499')
                                <div class="mb-3">
                                    <label for="promocode" class="maz__cmn-form-lable">Promo Code <span class="text-primary">*</span></label>
                                    <input id="promocode" type="text" class="form-control @error('promocode') is-invalid @enderror" name="promocode" value="AFEMAZ499" placeholder="AFEMAZ499" maxlength="20" readonly="true">
                                    @error('promocode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @endif
                                @if($registerType == 'register')
                                <div class="mb-3">
                                    <label for="promocode" class="maz__cmn-form-lable">Promo Code <span class="text-primary">*</span></label>
                                    <input id="promocode" type="text" class="form-control @error('promocode') is-invalid @enderror" name="promocode" value="AFEMAZ" placeholder="AFEMAZ" maxlength="20" readonly="true">
                                    @error('promocode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @endif
                                <div class="mb-3">
                                    <!-- Generate Google Recaptcha V3 Field  -->
                                    {!! RecaptchaV3::field('studentregister') !!}
                                </div>
                                {{-- @if($registerType == 'normal')
                                <div class="d-grid">
                                    <button type="submit" id="btnSubmit" class="btn btn-login btn-primary btn-rounded">Register</button>
                                </div>
                                @endif --}}
                                <!-- END REGISTRATION FORM FIELDS HTML -->
                            </div>
                        </div>
                    </div>
                    <!-- RIGHT SIDE HTML -->
                    @if($registerType == 'normal')
                    {{-- <div class="col-lg-6 order-lg-2">
                        <div class="maz__login-banner">
                            <h1 class="maz__login-banner-title">MartialArtsZen.com</h1>
                            <p class="maz__login-banner-text">Try our beginner-level classes in a variety of disciplines and experience the MartialArtsZen magic.</p>
                            <a href="{{ route('student.login') }}" class="btn btn-free  btn-rounded btn-info dashboard_btn_info">Explore For Free</a>
                        </div>
                    </div> --}}
                    <div class="col-lg-6">
                        <input type="hidden" name="plan" id="plan" value="Bronze">
                        <input type="hidden" name="price" id="price" value="19.99">
                        <input type="hidden" name="interval" id="interval" value="month">
                        <input type="hidden" name="currency" id="currency" value="USD">
                        <div class="maz__plan-wrapper">
                            <h5 class="maz__choose-title mb-4">Choose plan and payment option</h5>
                            <div class="maz__main-wrapper pt-0">
                                <div class="row">
                                    <div class="col-lg-12 mb-8">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title">BRONZE PLAN</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                                                <span class="maz__cmn-plan-price">$19.99/Month</span>
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
                                        <button type="submit" id="btnSubmit" class="btn btn-login btn-primary btn-rounded">Create Account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($registerType == 'free')
                    <div class="col-lg-6">
                        <input type="hidden" name="plan" id="plan" value="Free">
                        <input type="hidden" name="price" id="price" value="0">
                        <input type="hidden" name="interval" id="interval" value="month">
                        <input type="hidden" name="currency" id="currency" value="USD">
                        <div class="maz__plan-wrapper">
                            <h5 class="maz__choose-title mb-4">Choose plan and payment option</h5>
                            {{-- <div class="maz__cmn-dropdown mx-auto maz__currency-dropdown">
                                        <span class="maz__currency-option ms-2">Select Currency:</span>
                                        <select class="form-select">
                                            <option selected value="USD">USD ($)</option>
                                            <option value="GBP">GBP (£)</option>
                                            <option value="Euro">Euro (€)</option>
                                        </select>
                                    </div> --}}
                            <div class="maz__main-wrapper pt-0">
                                <div class="row">
                                    @if(!empty($referral_code))
                                    <input type="hidden" name="referral_code" value="{{$referral_code}}">
                                    {{--<div class="col-lg-12 mb-8">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title">Referral Code</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-start">
                                                @php
                                                $arr = str_split($referral_code);
                                                @endphp
                                                <input class="m-2 text-center form-control rounded" type="text" name="referral_code[]" id="first" maxlength="1" value="{{ isset($arr[0]) ? $arr[0] : ''}}" readonly/> 
                                                <input class="m-2 text-center form-control rounded" type="text" name="referral_code[]" id="second" maxlength="1" value="{{isset($arr[1]) ? $arr[1] : ''}}" readonly/>
                                                <input class="m-2 text-center form-control rounded" type="text" name="referral_code[]" id="third" maxlength="1" value="{{isset($arr[2]) ? $arr[2] : ''}}" readonly/> 
                                                <input class="m-2 text-center form-control rounded" type="text" name="referral_code[]" id="fourth" maxlength="1" value="{{isset($arr[3]) ? $arr[3] : ''}}" readonly/> 

                                                <button type="button" id="btnSubmit" class="btn btn-login btn-primary btn-rounded">Redeem</button>
                                            </div>
                                        </div>
                                    </div>--}}
                                    @endif
                                    <div class="col-lg-12 mb-8 mt-2">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title" style="text-transform:uppercase;" id="plan_name">{{ isset($firstPlan->plan_name) ?  $firstPlan->plan_name : ''}} Account</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                                                <span class="maz__cmn-plan-price" id="validity">
                                                    @php
                                                        $validity_type = "";

                                                        if(isset($firstPlan->validity_type))
                                                        {
                                                            if($firstPlan->validity_type == 1)
                                                            {
                                                                $validity_type = "Day";
                                                            }
                                                            if($firstPlan->validity_type == 2)
                                                            {
                                                                $validity_type = "Month";
                                                            }
                                                            if($firstPlan->validity_type == 3)
                                                            {
                                                                $validity_type = "Year";
                                                            }
                                                            if($firstPlan->validity_type == 4)
                                                            {
                                                                $validity_type = "Lifetime";
                                                            }
                                                            if($firstPlan->id == 1)
                                                            {
                                                                $validity_type = "Free Always";
                                                            }
                                                        }
                                                        

                                                    @endphp

                                                    @if($firstPlan->id == 1)
                                                        {{ $validity_type}}
                                                    @else
                                                        $ {{ isset($firstPlan->price) ? $firstPlan->price : '' }} /  {{ isset($firstPlan->validity) ? $firstPlan->validity : '' }} {{ $validity_type}}
                                                    @endif

                                                   
                                                </span>
                                            </div>  
                                            <div id="benefits">
                                                @php
                                                    $oldBenefits = array();
                                                    
                                                    if(isset($firstPlan->benefits))
                                                    {
                                                        $oldBenefits = explode(",",$firstPlan->benefits);
                                                    }
                                                    

                                                    if(!empty($benefits))
                                                    {
                                                        foreach($benefits as $ab)
                                                        {
                                                            if(in_array($ab->id,$oldBenefits))
                                                            {
                                                                @endphp
                                                                    <p>
                                                                    <i class="fa fa-check"></i> 
                                                                @php 
                                                                echo $ab->benefit;
                                                            }
                                                            @endphp
                                                            </p>
                                                            @php
                        
                                                        }
                                                    }
                                                @endphp
                                            </div>
      
                                            <!-- <div class="dropdown">
                                                @if(empty($referral_code))
                                                <select name="Change Plan" class="select" id="changePlan">
                                                    <option value="">Change Plan</option>
                                                    @if(!empty($allPlans))
                                                        @foreach($allPlans as $p)
                                                            <option value="{{$p->id}}">{{ $p->plan_name}}</option>
                                                           
                                                        @endforeach
                                                    @endif
                                                    <option value="" disabled>Silver Plan $29.99 (coming soon) </option>
                                                    <option value="" disabled>Gold Plan $39.99 (coming soon) </option>
                                                </select>
                                                @endif
                                                
                                            </div> -->  
                                            <!-- modal section start -->
                                            <div id="myModal2" class="modal2">
                                                
                                                <!-- Modal content -->
                                                <div class="modal-content2">

                                                    <div class="container text-center">
                                                        <span class="close2">&times;</span>
                                                        <h3>Upgrade your plan</h3>
                                                        <hr class="mb-4 mt-3">
                                                        <div class="contactForm custom-form">  
                                                                <div style="overflow:auto; height: 80vh;">
                                                                    <table class="table" id="my-table" style="overflow-x:auto; width:96%;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="thead">Features</th>
                                                                                
                                                                                @if(count($allPlans))
                                                                                    @foreach($allPlans as $plan)
                                                                                        <th>{{ $plan->plan_name }}</th>
                                                                                    @endforeach
                                                                                @endif
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if(count($benefits))
                                                                                @foreach($benefits as $benefit)
                                                                                <tr>
                                                                                    <td class="thead" style="width:40%;">{{ $benefit->benefit }}</td>
                                                                                    @if(count($allPlans))
                                                                                        @foreach($allPlans as $plan)
                                                                                            @php
                                                                                                $planBenefits = explode(",",$plan->benefits);

                                                                                                if(in_array($benefit->id,$planBenefits))
                                                                                                {
                                                                                                    @endphp
                                                                                                        <td><i class="fa-solid fa-check"></i></td>
                                                                                                    @php
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    @endphp
                                                                                                        <td><i class="fa-solid fa-xmark"></i></td>
                                                                                                    @php
                                                                                                }
                                                                                            @endphp
                                                                                        @endforeach
                                                                                    @endif
                                                                                </tr>
                                                                                @endforeach
                                                                            @endif
                                                                            <tr id="planPrices">
                                                                                <td class="thead"></td>
                                                                                @if(count($allPlans))
                                                                                    @foreach($allPlans as $plan)
                                                                                        @php
                                                                                            $validty = "";

                                                                                            if($plan->validity_type == 1)
                                                                                            {
                                                                                                // $validity = $plan->validity." "."Day";
                                                                                                $validity = "Day";
                                                                                            }
                                                                                            elseif($plan->validity_type == 2)
                                                                                            {
                                                                                                // $validity = $plan->validity." "."Month";
                                                                                                $validity = "Month";
                                                                                            }
                                                                                            elseif($plan->validity_type == 3)
                                                                                            {
                                                                                                // $validity = $plan->validity." "."Year";
                                                                                                $validity = "Year";
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                // $validity = $plan->validity." ".'Lifetime';
                                                                                                $validity = 'Lifetime';
                                                                                            }
                                                                                        @endphp
                                                                                    
                                                                                        
                                                                                        @if($plan->id == $firstPlan->id)
                                                                                            <td><button type="button" class="btn-login plan-button" style="background-image: linear-gradient(135deg, #f34079 40%, #fc894d);color: #fff;">Current plan</button></td>
                                                                                        @else
                                                                                            @if($plan->id == 3 || $plan->id == 4)
                                                                                                <td><button type="button" class="btn-login plan-button comming-soon" disabled style="color:#000">{{ $plan->plan_name }} Plan </br> $ {{ $plan->price }} / {{ $validity  }} </br>[ Coming Soon ]</button></td>        
                                                                                            @else
                                                                                                @if($plan->id == 1)
                                                                                                    <td><button type="button" class="btn-login plan-button" onclick="changePlan({{ $plan->id }})">{{ $plan->plan_name }} Plan </br> Free Always </button></td>        
                                                                                                @else
                                                                                                    <td><button type="button" class="btn-login plan-button" onclick="changePlan({{ $plan->id }})">{{ $plan->plan_name }} Plan </br> $ {{ $plan->price }} / {{ $validity  }}</button></td>
                                                                                                @endif
                                                                                            @endif
                                                                                        @endif
                                                                                    
                                                                                    @endforeach
                                                                                @endif 
                                                                             </tr>                   
                                                                           
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                    <div class="get-started mt-5 mb-1">
                                        <a href="javascript:void(0)" onclick="contactUsModal1()" class="get-started-button" id="myBtn">Upgrade Plan</a>
                                    </div>
                                    <div class="d-grid mt-4">
                                        <button type="submit" id="btnSubmit" class="btn btn-login btn-primary btn-rounded">Create Account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($registerType == 'register499')
                    <div class="col-lg-6">
                        <input type="hidden" name="plan" id="plan" value="Bronze">
                        <input type="hidden" name="price" id="price" value="4.99">
                        <input type="hidden" name="interval" id="interval" value="month">
                        <input type="hidden" name="currency" id="currency" value="USD">
                        <div class="maz__plan-wrapper">
                            <h5 class="maz__choose-title mb-4">Choose plan and payment option</h5>
                            <div class="maz__main-wrapper pt-0">
                                <div class="row">
                                    <div class="col-lg-12 mb-8">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title">BRONZE PLAN</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                                                <span class="maz__cmn-plan-price">$4.99/Month</span>
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
                                        <button type="submit" id="btnSubmit" class="btn btn-login btn-primary btn-rounded">Create Account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($registerType == 'register')
                        <div class="col-lg-6">
                            <input type="hidden" name="plan" id="plan" value="Bronze">
                            <input type="hidden" name="price" id="price" value="1">
                            <input type="hidden" name="interval" id="interval" value="month">
                            <input type="hidden" name="currency" id="currency" value="USD">
                            <div class="maz__plan-wrapper">
                                <h5 class="maz__choose-title mb-4">Choose plan and payment option</h5>
                                <div class="maz__main-wrapper pt-0">
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
                                            <button type="submit" id="btnSubmit" class="btn btn-login btn-primary btn-rounded">Create Account</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>

        
    </div>

     <!-- Modal -->
     
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

        if($('#any_plan').val() != "")
        {
            localStorage.removeItem("subscription_id");
            localStorage.removeItem("changePlan");
        }
        // Remove Class Active
        $(".nav-link").removeClass("active");
        // Add Phone Input Mask
        // $('#phone').usPhoneFormat();

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


        // Form Validation Section
        $("#studentRegisterForm").validate({
            rules: {
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
                    equalTo: "#password",
                },
                firstname: {
                    required: true,
                    maxlength: 100,
                    lettersonly: true 
                },
                lastname: {
                    required: true,
                    maxlength: 100,
                    lettersonly: true 
                },
                phone: {
                    required: true,
                    phoneUS: true,
                    //number: true,
                    minlength: 12,
                    maxlength: 12,
                }
            },
            messages: {
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
                firstname: {
                    required: "FIRST NAME IS REQUIRED",
                    maxlength: "FIRSTNAME CANNOT BE MORE THAN 100 CHARACTERS",
                    lettersonly: "PLEASE USE ONLY ALPHABETICAL LETTERS"
                },
                lastname: {
                    required: "LAST NAME IS REQUIRED",
                    maxlength: "LASTNAME CANNOT BE MORE THAN 100 CHARACTERS",
                    lettersonly: "PLEASE USE ONLY ALPHABETICAL LETTERS"
                },
                phone: {
                    required: "PHONE IS REQUIRED",
                    phoneUS: "PLEASE SPECIFY A VALID PHONE",
                    minlength: "PHONE MUST BE AT LEAST 12 CHARACTERS",
                    maxlength: "PHONE CANNOT BE MORE THAN 12 CHARACTERS",
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

        // Form Field Change Event
        $("#email").change(function() {
            localStorage.setItem("useremail", $(this).val());
        });
        $("#firstname").change(function() {
            localStorage.setItem("userfirstname", $(this).val());
        });
        $("#lastname").change(function() {
            localStorage.setItem("userlastname", $(this).val());
        });
        $("#phone").change(function() {
            localStorage.setItem("userphone", $(this).val());
        });
        $('#changePlan').change(function(){
            localStorage.setItem('changePlan', $(this).val());
            localStorage.setItem('subscription_id', $(this).val());
        });
    
        // Set Form Field Value
        if(localStorage.useremail) {
          $("#email").val(localStorage.useremail);
        }
        if(localStorage.userfirstname) {
          $("#firstname").val(localStorage.userfirstname);
        }
        if(localStorage.userlastname) {
          $("#lastname").val(localStorage.userlastname);
        }
        if(localStorage.userphone) {
          $("#phone").val(localStorage.userphone);
        }
        if(localStorage.changePlan) {
          $("#changePlan").val(localStorage.changePlan);
        }
        if(localStorage.subscription_id) {
          $("#subscription_id").val(localStorage.subscription_id);
        }

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
        var form = document.getElementById('studentRegisterForm');
        // Create a token when the form is submitted.
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            // Set Local Storage
            if($("#email").val()) {
                localStorage.setItem("useremail", $("#email").val());
            } else {
                localStorage.setItem("useremail", '');
            }
            if($("#firstname").val()) {
                localStorage.setItem("userfirstname", $("#firstname").val());
            } else {
                localStorage.setItem("userfirstname", '');
            }
            if($("#lastname").val()) {
                localStorage.setItem("userlastname", $("#lastname").val());
            } else {
                localStorage.setItem("userlastname", '');
            }
            if($("#phone").val()) {
                localStorage.setItem("userphone", $("#phone").val());
            } else {
                localStorage.setItem("userphone", '');
            }
            if($("#phone").val()) {
                localStorage.setItem("userphone", $("#phone").val());
            } else {
                localStorage.setItem("userphone", '');
            }
            if($("#changePlan").val()) {
                localStorage.setItem("changePlan", $("#changePlan").val());
            } else {
                localStorage.setItem("changePlan", '');
            }
            if($("#subscription_id").val()) {
                localStorage.setItem("subscription_id", $("#subscription_id").val());
            } else {
                localStorage.setItem("subscription_id", '');
            }
            
            // Call Registration Form Function
            submitStudentRegisterForm();
        });

        // On Form Submit Check Inputed Form Is Valid
        function submitStudentRegisterForm() {
            document.getElementById("hiden").value = $("#phone").val().replace(/\s+/g, '');
            if(document.getElementById("hiden").value) {
                if ($("#hiden").intlTelInput("isValidNumber") == true) {
                    // Remove Local Storage
                    localStorage.removeItem("useremail");
                    localStorage.removeItem("userfirstname");
                    localStorage.removeItem("userlastname");
                    localStorage.removeItem("userphone");
                    localStorage.removeItem("changePlan");
                    localStorage.removeItem("subscription_id");
                    // Submit Form
                    var isvalid = $("#studentRegisterForm").valid();
                    if(isvalid)
                    {
                        form.submit();
                    }    
                } else {
                    toastr.error('Please enter valid phone number');
                    return false;
                }
            }
        }

        $('input.hide').parent().hide();

        if(localStorage.subscription_id)
        {
            var id = $('#changePlan').val();
            
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method:"GET",
                url: 'changePlan/'+id,
                dataType: 'json',
                success: function(res){
                    document.getElementById("subscription_id").value = res[0].id;
                    document.getElementById("plan_name").innerHTML = res[0].plan_name;
                    document.getElementById("description").innerHTML = res[0].description;
                    document.getElementById("validity").innerHTML = res[0].price+ " / " +res[0].validity+ " " +res[0].validity_type;
                    document.getElementById("benefits").innerHTML = "";

                    if(res[0].planBenefits)
                    {
                        for(var i=0;i<res[0].planBenefits.length;i++)
                        {
                            $("#benefits").append('<i class="fa fa-check"></i>'+ " " +res[0].planBenefits[i] +'</br></br>');
                        }
                    }
                }
            });
        }
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
    function changePlan(plan_id){
        var id = plan_id;
        
        document.getElementById("changeGoogleUrl").href="{{ url('auth/google?userRole=student') }}"+"&type=<?php echo $registerType?>"+"&referral_code=<?php echo $referral_code?>"+"&selectedPlan="+id; 
        document.getElementById("changeFacebookUrl").href="{{ url('auth/facebook?userRole=student') }}"+"&type=<?php echo $registerType?>"+"&referral_code=<?php echo $referral_code?>"+"&selectedPlan="+id; 

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method:"GET",
            url: 'changePlan/'+id,
            dataType: 'json',
            success: function(res){
                

                document.getElementById("subscription_id").value = res[0].id;
                document.getElementById("plan_name").innerHTML = res[0].plan_name +" Account";
                document.getElementById("description").innerHTML = res[0].description;
                if(res[0].id == 1)
                {
                    document.getElementById("validity").innerHTML = "Free Always";
                }
                else
                {
                    document.getElementById("validity").innerHTML = res[0].price+ " / " +res[0].validity+ " " +res[0].validity_type;
                }
                
                document.getElementById("benefits").innerHTML = "";

                if(res[0].planBenefits)
                {
                    for(var i=0;i<res[0].planBenefits.length;i++)
                    {
                        $("#benefits").append('<i class="fa fa-check"></i>'+ " " +res[0].planBenefits[i] +'</br></br>');
                    }
                }

                var modal = document.getElementById("myModal2");
                modal.style.display = "none";

                $("#planPrices").empty();
                
                var planPrices = <?php echo json_encode($allPlans); ?>;

                $("#planPrices").append(
                    '<td class="thead"></td>'
                );

                for(var plan = 0; plan < planPrices.length; plan++)
                {
                    var validty = "";

                    if(planPrices[plan].validity_type == 1)
                    {
                        validity = planPrices[plan].validity+" "+"Day";
                    }
                    else if(planPrices[plan].validity_type == 2)
                    {
                        validity = planPrices[plan].validity+" "+"Month";
                    }
                    else if(planPrices[plan].validity_type == 3)
                    {
                        validity = planPrices[plan].validity+" "+"Year";
                    }
                    else
                    {
                        validity = planPrices[plan].validity+" "+'Lifetime';
                    }

                    if(planPrices[plan].id == plan_id)
                    {
                        $("#planPrices").append(
                            ' <td><button type="button" class="btn-login plan-button" style="background-image: linear-gradient(135deg, #f34079 40%, #fc894d);color: #fff;">Current plan</button></td>'
                        );  
                    }
                    else
                    {   
                        if(planPrices[plan].id == 3 || planPrices[plan].id == 4)
                        {
                            $("#planPrices").append(
                                '<td><button type="button" class="btn-login plan-button comming-soon" disabled style="color:#000">'+planPrices[plan].plan_name+' Plan </br> $ '+planPrices[plan].price+' / '+validity+' </br>[ Coming Soon ]</button></td>'
                            ); 
                        }
                        else
                        {
                            if(planPrices[plan].id == 1)
                            {
                                $("#planPrices").append(
                                    '<td><button type="button" class="btn-login plan-button" onclick="changePlan('+planPrices[plan].id+')">'+planPrices[plan].plan_name+' Plan </br> Free Always</button></td>'
                                );
                            }
                            else
                            {
                                $("#planPrices").append(
                                    '<td><button type="button" class="btn-login plan-button" onclick="changePlan('+planPrices[plan].id+')">'+planPrices[plan].plan_name+' Plan </br> $ '+planPrices[plan].price+' / '+validity+'</button></td>'
                                );
                            }
                            
                        }
                    }
                }
                            
            }
        });
    }
    
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
<script>
    function contactUsModal1()
    {
        // Get the modal
var modal = document.getElementById("myModal2");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal 

  modal.style.display = "block";


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

span.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
    }


function closeContactForm()
{
    var modal = document.getElementById("myModal2");
    
    modal.style.display = "none";
}
</script>

@endpush