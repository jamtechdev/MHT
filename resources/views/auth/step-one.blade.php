@extends('front.layouts.app')

@section('content')
<style>
    table {
  border-collapse: collapse;
  inline-size: 100%;
}

tbody {
  color: #3a3030;
}

td {
  padding-block: 0.20em;
}

tfoot {
  border-top: 2px solid #b4b4b4;
  font-weight: bolder;
}
</style>
<section class="maz__register maz__sections">
    <div class="container">
        <div class="maz__register-plan">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <ul class="progress_bar">
                        <li class="completed">Step1</li>
                        <li class="active">Step2</li>
                        <li>Step3</li>
                        <li>Step4</li>
                        <li>Step5</li>
                    </ul>
                    {{-- <h2 class="maz__register-process-title">Student Registration</h2> --}}
                </div>
            </div>
            <form method="POST" action="{{ route('post-step-one') }}" class="maz__register-form" id="registerStepOneForm">
                @csrf
                @if($registerData['request_type'] == 'register499' || $registerData['request_type'] == 'register' || $registerData['request_type'] == 'free')
                    <input type="hidden" name="plan" id="plan" value="{{ $planDetails->id }}">
                    <input type="hidden" name="price" id="price" value="{{ $planDetails->price }}">
                    <input type="hidden" name="interval" id="interval" value="{{ $planDetails->validity_type }}">
                    <input type="hidden" name="currency" id="currency" value="USD">
                @else
                    <input type="hidden" name="plan" id="plan" value="Free">
                    <input type="hidden" name="price" id="price" value="0">
                    <input type="hidden" name="interval" id="interval" value="month">
                    <input type="hidden" name="currency" id="currency" value="USD">
                @endif
                @php
                    $client_secret = Session::get('client_secret');
                @endphp
                <input type="hidden" name="is_subscribe" value="1">
                <input type="hidden" id="clientSecret" name="client_secret" value="{{ (isset($client_secret) ? $client_secret : '') }}" />
                <div class="row">
                    <!-- SELECT PACKAGE PLAN HTML -->
                    @if($registerData['request_type'] == 'normal')
                    <div class="col-lg-12">
                        <div class="maz__plan-wrapper">
                            <h4 class="maz__choose-title text-center mb-4">Choose plan and payment option</h4>
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
                                    <div class="col-md-6 mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title">FREE PLAN</h3>
                                            <hr>
                                            <p class="maz__free-plan-text">View 10 Free Videos Per Instructor Only</p>
                                            <button type="button" class="btn btn-cmn-plan btnPlan active" content="Free-0-month">Select Plan</button>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title">BRONZE PLAN</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                                                <span class="maz__cmn-plan-price">$19.99/Month</span>
                                            </div>
                                            <button type="button" class="btn btn-cmn-plan btnPlan" content="Bronze-19.99-month">Select Plan</button>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-6 mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title">SILVER PLAN</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                                                <span class="maz__cmn-plan-price">$29.99/Month</span>
                                            </div>
                                            <button type="button" class="btn btn-cmn-plan btnPlan" content="Silver-29.99-month">Select Plan</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title">GOLD PLAN</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                                                <span class="maz__cmn-plan-price">$39.99/Month</span>
                                            </div>
                                            <button type="button" class="btn btn-cmn-plan btnPlan" content="Gold-39.99-month">Select Plan</button>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12 mb-4 isPaymentShow">
                                        <!-- Display errors returned by createToken -->
                                        <div id="paymentResponse" class="text-primary"></div>
                                    </div>
                                    <div class="col-lg-12 mb-4 isPaymentShow">
                                        <label>Card Number <span class="text-primary">*</span></label>
                                        <div id="card_number" class="field form-control"></div>
                                    </div>
                                    <div class="col-lg-12 isPaymentShow">
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <div class="form-group">
                                                    <label>Expiry Date <span class="text-primary">*</span></label>
                                                    <div id="card_expiry" class="field form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="form-group">
                                                    <label>CVC Code <span class="text-primary">*</span></label>
                                                    <div id="card_cvc" class="field form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="promocode">Promo Code</label>
                                                <input id="promocode" type="text" class="form-control @error('promocode') is-invalid @enderror" name="promocode" value="{{ old('promocode') }}" placeholder="Promocode" maxlength="20">
                                                @error('promocode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <div class="maz__check-wrapper p-0 pt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe1" value="1" checked>
                                                <label class="form-check-label" for="is_subscribe1">Yes, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe2" value="0">
                                                <label class="form-check-label" for="is_subscribe2">No, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                                            </div>
                                        </div> --}}
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button type="submit" class="btn btn-login btn-primary btn-rounded btn-step-1">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($registerData['request_type'] == 'register')
                    <div class="col-lg-12">
                        <div class="maz__plan-wrapper">
                            <h4 class="maz__choose-title text-center mb-4">Choose plan and payment option</h4>
                            <div class="maz__main-wrapper pt-0">
                                <div class="row">
                                    <div class="col-md-12 text-center mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title">BRONZE PLAN</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                                                <span class="maz__cmn-plan-price">$1/Month</span>
                                            </div>
                                            <button type="button" class="btn btn-cmn-plan active">Select Plan</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <!-- Display errors returned by createToken -->
                                        <div id="paymentResponse" class="text-primary"></div>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label>Card Number <span class="text-primary">*</span></label>
                                        <div id="card_number" class="field form-control"></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <div class="form-group">
                                                    <label>Expiry Date <span class="text-primary">*</span></label>
                                                    <div id="card_expiry" class="field form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="form-group">
                                                    <label>CVC Code <span class="text-primary">*</span></label>
                                                    <div id="card_cvc" class="field form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="promocode">Promo Code</label>
                                                <input id="promocode" type="text" class="form-control @error('promocode') is-invalid @enderror" name="promocode" value="AFEMAZ" placeholder="AFEMAZ" maxlength="20" >
                                                @error('promocode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <div class="maz__check-wrapper p-0 pt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe1" value="1" checked>
                                                <label class="form-check-label" for="is_subscribe1">Yes, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe2" value="0">
                                                <label class="form-check-label" for="is_subscribe2">No, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                                            </div>
                                        </div> --}}
                                        <div class="d-flex  align-items-center justify-content-center">
                                            <button type="submit" class="btn btn-login btn-primary btn-rounded btn-step-1">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($registerData['request_type'] == 'free')
                    <div class="col-lg-12">
                        <div class="maz__plan-wrapper">
                            <h4 class="maz__choose-title text-center mb-4">Your Selected Plan</h4>
                            <div class="maz__main-wrapper pt-0">
                                <div class="row">
                                    <div class="col-md-12 text-center mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title" style="text-transform:uppercase;">{{ $planDetails->plan_name }} Plan</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-center">
                                               {{--<button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>--}}
                                                @php 
                                          
                                                $validity_type = "";

                                                if($planDetails->validity_type == 1)
                                                {
                                                    $validity_type = $planDetails->validity."/Day";
                                                }
                                                if($planDetails->validity_type == 2)
                                                {
                                                    $validity_type = $planDetails->validity."/Month";
                                                }
                                                if($planDetails->validity_type == 3)
                                                {
                                                    $validity_type = $planDetails->validity."/Year";
                                                }
                                                if($planDetails->validity_type == 4)
                                                {
                                                    $validity_type = "Lifetime";
                                                }

                                                @endphp
                                                <span class="maz__cmn-plan-price">$ {{ $planDetails->price }}  {{ $validity_type }}</span>
                                                
                                            </div>
                                            <ul style="text-align:left;">
                                                @if(!empty($benefits))
                                                    @foreach($benefits as $benefit)
                                                    <li>{{ $benefit }}</li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                            {{--<button type="button" class="btn btn-cmn-plan active">Select Plan</button>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h3 class="maz__cmn-plan-title" style="text-transform:uppercase;">Do you have a promo code ?</h3>
                                                </div>
                                                <div class="col-md-5">
                                                    <input id="newPromocode" type="text" class="form-control @error('promocode') is-invalid @enderror" name="promocode" maxlength="20">
                                                    
                                                    <div id="responseMessage"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" onclick="verifyPromocode()" style="width: 100%;"class="btn btn-login btn-primary btn-rounded ">Verify</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title" style="text-transform:uppercase;">Payment Details</h3>
                                            <hr>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <table>
                                                    <tbody>
                                                        <tr>
                                                        <td>Basic Price</td>
                                                        <td align="right">$ {{ $planDetails->price }}</td>
                                                        </tr>
                                                        <tr>
                                                        <td>Discount</td>
                                                        <td align="right" id="discount">$ 0.00</td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                        <td>Total</td>
                                                        <td align="right" id="total">$  {{ $planDetails->price }}</td>
                                                        </tr>
                                                    </tfoot>
                                                    </table>
                                                
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <!-- Display errors returned by createToken -->
                                        <div id="paymentResponse" class="text-primary"></div>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label>Card Number <span class="text-primary">*</span></label>
                                        <div id="card_number" class="field form-control"></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <div class="form-group">
                                                    <label>Expiry Date <span class="text-primary">*</span></label>
                                                    <div id="card_expiry" class="field form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="form-group">
                                                    <label>CVC Code <span class="text-primary">*</span></label>
                                                    <div id="card_cvc" class="field form-control"></div>
                                                </div>
                                            </div>
                                             <div class="col-md-4 mb-4">
                                                <!-- <label for="promocode">Promo Code</label> -->
                                                <input id="promocode1" type="hidden" class="form-control @error('promocode') is-invalid @enderror" name="promocode" maxlength="20">
                                                @error('promocode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <div class="maz__check-wrapper p-0 pt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe1" value="1" checked>
                                                <label class="form-check-label" for="is_subscribe1">Yes, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe2" value="0">
                                                <label class="form-check-label" for="is_subscribe2">No, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                                            </div>
                                        </div> --}}
                                        <div class="d-flex  align-items-center justify-content-center">
                                            <button type="submit" class="mr-1 btn btn-login btn-primary btn-rounded btn-step-1">Next</button>
                                            <button type="button" class="ml-2 btn btn-login btn-primary btn-rounded btn-step-1" onclick="cancelUpgradePlan()">Cancel {{ $planDetails->plan_name }} Plan Upgrade</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($registerData['request_type'] == 'softRegister')
                    <div class="col-lg-12">
                        <div class="maz__plan-wrapper">
                            <h4 class="maz__choose-title text-center mb-4">Your Selected Plan</h4>
                            <div class="maz__main-wrapper pt-0">
                                <div class="row">
                                    <div class="col-md-12 text-center mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title" style="text-transform:uppercase;">{{ $planDetails->plan_name }} Plan</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-center">
                                               {{--<button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>--}}
                                                @php 
                                          
                                                $validity_type = "";

                                                if($planDetails->validity_type == 1)
                                                {
                                                    $validity_type = $planDetails->validity."/Day";
                                                }
                                                if($planDetails->validity_type == 2)
                                                {
                                                    $validity_type = $planDetails->validity."/Month";
                                                }
                                                if($planDetails->validity_type == 3)
                                                {
                                                    $validity_type = $planDetails->validity."/Year";
                                                }
                                                if($planDetails->validity_type == 4)
                                                {
                                                    $validity_type = "Lifetime";
                                                }

                                                @endphp
                                                <span class="maz__cmn-plan-price">$ {{ $planDetails->price }}  {{ $validity_type }}</span>
                                                
                                            </div>
                                            <ul style="text-align:left;">
                                                @if(!empty($benefits))
                                                    @foreach($benefits as $benefit)
                                                    <li>{{ $benefit }}</li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                            {{--<button type="button" class="btn btn-cmn-plan active">Select Plan</button>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h3 class="maz__cmn-plan-title" style="text-transform:uppercase;">Do you have a promo code ?</h3>
                                                </div>
                                                <div class="col-md-5">
                                                    <input id="newPromocode" type="text" class="form-control @error('promocode') is-invalid @enderror" name="promocode" maxlength="20">
                                                    
                                                    <div id="responseMessage"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" onclick="verifyPromocode()" style="width: 100%;"class="btn btn-login btn-primary btn-rounded ">Verify</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title" style="text-transform:uppercase;">Payment Details</h3>
                                            <hr>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <table>
                                                    <tbody>
                                                        <tr>
                                                        <td>Basic Price</td>
                                                        <td align="right">$ {{ $planDetails->price }}</td>
                                                        </tr>
                                                        <tr>
                                                        <td>Discount</td>
                                                        <td align="right" id="discount">$ 0.00</td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                        <td>Total</td>
                                                        <td align="right" id="total">$  {{ $planDetails->price }}</td>
                                                        </tr>
                                                    </tfoot>
                                                    </table>
                                                
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <!-- Display errors returned by createToken -->
                                        <div id="paymentResponse" class="text-primary"></div>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label>Card Number <span class="text-primary">*</span></label>
                                        <div id="card_number" class="field form-control"></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <div class="form-group">
                                                    <label>Expiry Date <span class="text-primary">*</span></label>
                                                    <div id="card_expiry" class="field form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="form-group">
                                                    <label>CVC Code <span class="text-primary">*</span></label>
                                                    <div id="card_cvc" class="field form-control"></div>
                                                </div>
                                            </div>
                                             <div class="col-md-4 mb-4">
                                                <!-- <label for="promocode">Promo Code</label> -->
                                                <input id="promocode1" type="hidden" class="form-control @error('promocode') is-invalid @enderror" name="promocode" maxlength="20">
                                                @error('promocode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <div class="maz__check-wrapper p-0 pt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe1" value="1" checked>
                                                <label class="form-check-label" for="is_subscribe1">Yes, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe2" value="0">
                                                <label class="form-check-label" for="is_subscribe2">No, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                                            </div>
                                        </div> --}}
                                        <div class="d-flex  align-items-center justify-content-center">
                                            <button type="submit" class="mr-1 btn btn-login btn-primary btn-rounded btn-step-1">Next</button>
                                            <button type="button" class="ml-2 btn btn-login btn-primary btn-rounded btn-step-1" onclick="cancelUpgradePlan()">Cancel {{ $planDetails->plan_name }} Plan Upgrade</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($registerData['request_type'] == 'register499')
                        <div class="col-lg-12">
                        <div class="maz__plan-wrapper">
                            <h4 class="maz__choose-title text-center mb-4">Choose plan and payment option</h4>
                            <div class="maz__main-wrapper pt-0">
                                <div class="row">
                                    <div class="col-md-12 text-center mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title">BRONZE PLAN</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>
                                                <span class="maz__cmn-plan-price">$4.99/Month</span>
                                            </div>
                                            <button type="button" class="btn btn-cmn-plan active">Select Plan</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <!-- Display errors returned by createToken -->
                                        <div id="paymentResponse" class="text-primary"></div>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label>Card Number <span class="text-primary">*</span></label>
                                        <div id="card_number" class="field form-control"></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <div class="form-group">
                                                    <label>Expiry Date <span class="text-primary">*</span></label>
                                                    <div id="card_expiry" class="field form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="form-group">
                                                    <label>CVC Code <span class="text-primary">*</span></label>
                                                    <div id="card_cvc" class="field form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="promocode">Promo Code</label>
                                                <input id="promocode" type="text" class="form-control @error('promocode') is-invalid @enderror" name="promocode" value="AFEMAZ499" placeholder="AFEMAZ499" maxlength="20" readonly="true">
                                                @error('promocode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <div class="maz__check-wrapper p-0 pt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe1" value="1" checked>
                                                <label class="form-check-label" for="is_subscribe1">Yes, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_subscribe" id="is_subscribe2" value="0">
                                                <label class="form-check-label" for="is_subscribe2">No, Please send me workout plan, fitness information, inspiration and offers to keep me motivated.</label>
                                            </div>
                                        </div> --}}
                                        <div class="d-flex  align-items-center justify-content-center">
                                            <button type="submit" class="btn btn-login btn-primary btn-rounded btn-step-1">Next</button>
                                        </div>
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
</section>
@endsection
@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(function() {
            // Set Stripe API Key
            var stripe = Stripe('{{config("services.stripe.key")}}');
            // Stripe 3D Secure Confirm Section
            var clientSecret = $("#clientSecret").val();
            if(clientSecret) {
                stripe.confirmCardPayment(clientSecret).then(function(result) {
                    // Handle result.error or result.paymentIntent
                    if(result.error) {
                        toastr.error(result.error.message);
                    }
                    if(result.paymentIntent) {
                        toastr.success("Your subscription has been completed successfully");
                        window.location.href = "{{ route('step-two')}}";
                    }
                });
            }
            // Get Payment Request Type
            var requestType = '{{$registerData["request_type"]}}';
            // Register OR Register 499 User Payment Script
            if(requestType == 'softRegister' || requestType == 'free' || requestType == 'register499') {

                var selectedPlan = 'Bronze';
                $("#plan").val('{{ $planDetails->id }}');
                $("#price").val('{{ $planDetails->price }}');
                $("#interval").val('month');
                // Create an instance of elements
                var elements = stripe.elements();

                var style = {
                    base: {
                        fontWeight: 400,
                        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
                        fontSize: '16px',
                        lineHeight: '1.4',
                        color: '#555',
                        backgroundColor: '#fff',
                        borderRadius:'6px',
                        fontSmoothing: 'antialiased',
                        ':-webkit-autofill': {
                            color: '#fce883',
                        },
                        '::placeholder': {
                            color: '#888',
                        },
                        
                    },
                    
                    invalid: {
                        color: '#eb1c26',
                    }
                };

                var cardElement = elements.create('cardNumber', {
                    style: style
                });
                cardElement.mount('#card_number');

                var exp = elements.create('cardExpiry', {
                    'style': style
                });
                exp.mount('#card_expiry');

                var cvc = elements.create('cardCvc', {
                    'style': style
                });
                cvc.mount('#card_cvc');

                // Validate input of the card elements
                var resultContainer = document.getElementById('paymentResponse');
                cardElement.addEventListener('change', function(event) {
                    if (event.error) {
                        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
                    } else {
                        resultContainer.innerHTML = '';
                    }
                });

                // Get payment form element
                var form = document.getElementById('registerStepOneForm');

                // Create a token when the form is submitted.
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    createToken();
                });

                // Create single-use token to charge the user
                function createToken() {
                    stripe.createToken(cardElement).then(function(result) {
                        if (result.error) {
                            // Inform the user if there was an error
                            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
                        } else {
                            // Send the token to your server
                            stripeTokenHandler(result.token);
                        }
                    });
                }

                // Callback to handle the response from stripe
                function stripeTokenHandler(token) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);
                    // Submit the form
                    form.submit();
                }


            // Normal User Payment Script
            } else {

                var selectedPlan = 'Free';
                $("#plan").val('Free');
                $("#price").val('0');
                $("#interval").val('month');
                $(".isPaymentShow").hide();
                // Plan Section
                $(".btnPlan").click(function() {
                    $(".btnPlan").removeClass('active');
                    $(this).addClass('active');
                    var selData = $(this).attr('content');
                    var selDataArray = selData.split('-');
                    if(selDataArray.length) {
                        selectedPlan = selDataArray[0];
                        $("#plan").val(selDataArray[0]);
                        $("#price").val(selDataArray[1]);
                        $("#interval").val(selDataArray[2]);
                    }

                    // Stripe Section
                    if(selectedPlan != 'Free') {
                        $(".isPaymentShow").show();
                        // Create an instance of elements
                        var elements = stripe.elements();

                        var style = {
                            base: {
                                fontWeight: 400,
                                fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
                                fontSize: '16px',
                                lineHeight: '1.4',
                                color: '#555',
                                backgroundColor: '#fff',
                                borderRadius:'6px',
                                fontSmoothing: 'antialiased',
                                ':-webkit-autofill': {
                                    color: '#fce883',
                                },
                                '::placeholder': {
                                    color: '#888',
                                },
                                
                            },
                            
                            invalid: {
                                color: '#eb1c26',
                            }
                        };

                        var cardElement = elements.create('cardNumber', {
                            style: style
                        });
                        cardElement.mount('#card_number');

                        var exp = elements.create('cardExpiry', {
                            'style': style
                        });
                        exp.mount('#card_expiry');

                        var cvc = elements.create('cardCvc', {
                            'style': style
                        });
                        cvc.mount('#card_cvc');

                        // Validate input of the card elements
                        var resultContainer = document.getElementById('paymentResponse');
                        cardElement.addEventListener('change', function(event) {
                            if (event.error) {
                                resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
                            } else {
                                resultContainer.innerHTML = '';
                            }
                        });

                        // Get payment form element
                        var form = document.getElementById('registerStepOneForm');

                        // Create a token when the form is submitted.
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();
                            createToken();
                        });

                        // Create single-use token to charge the user
                        function createToken() {
                            stripe.createToken(cardElement).then(function(result) {
                                if (result.error) {
                                    // Inform the user if there was an error
                                    resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
                                } else {
                                    // Send the token to your server
                                    stripeTokenHandler(result.token);
                                }
                            });
                        }

                        // Callback to handle the response from stripe
                        function stripeTokenHandler(token) {
                            // Insert the token ID into the form so it gets submitted to the server
                            var hiddenInput = document.createElement('input');
                            hiddenInput.setAttribute('type', 'hidden');
                            hiddenInput.setAttribute('name', 'stripeToken');
                            hiddenInput.setAttribute('value', token.id);
                            form.appendChild(hiddenInput);
                            // Submit the form
                            form.submit();
                        }
                    } else {
                        location.reload();
                        $(".isPaymentShow").hide();
                    }
                });
            }

            // to change first time user flag to 2
            $.ajax({
                type: "POST",
                url: '{{ route("changeIsFirstTimeUserFlag") }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                   
                },
                error:function (error) {
                    toastr.error(error.responseJSON.message);
                }
            });

        });
    </script>
    <script>
        function verifyPromocode()
        {   
            var promocode = $('#newPromocode').val();
            var currentPlanId = $('#plan').val();
            var price = $('#price').val();

            $('#responseMessage').empty();

            if(promocode)
            {
                $.ajax({
                    type: "POST",
                    url: '{{ route("verifyPromocode") }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        promocode : promocode,currentPlanId:currentPlanId
                    },
                    success: function (response) {
                        console.log(response);
                        if(response.status == 1)
                        {
                            $('#responseMessage').html(response.msg).css('color','green');

                            $('#discount').empty();
                            $('#total').empty();
                            $('#promocode1').empty();

                            $('#discount').text("$ "+response.discount);
                            $('#total').text("$ "+response.total);

                            $('#promocode1').val(promocode);
            
                            
                        }
                        else
                        {
                            $('#responseMessage').html(response.msg).css('color','red');
                            
                            $('#discount').empty();
                            $('#total').empty();
                            $('#promocode1').empty();

                            $('#discount').text("$ 0.00");
                            $('#total').text("$ "+price);
                        }
                    },
                    // error:function (error) {
                    //     toastr.error(error.responseJSON.message);
                    // }
                });
            }
        }

        function cancelUpgradePlan()
        {
            Swal.fire({
            title: '<h5> Are you sure want to cancel plan upgrade ?</h5>',
            // icon: 'info',
            iconHtml: '<img src="{{ asset('images/infoIcon1.png') }}">',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'

            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        type: "POST",
                        url: '{{ route("cancelUpgradePlan") }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                       data: {
                           flag:1
                       },
                        success: function (response) {

                            var url = '{{ route("student_profile")}}';
                
                            window.location.href = url;
                        }
                    });
                }
            });

            $(".swal2-modal h5").css('font-size', '1rem');
            $(".swal2-modal img").css('height', '67px');
            $(".swal2-modal").css('border-radius', '15px');
            $(".swal2-modal").css('height', 'auto');
            $(".swal2-modal").css('background', 'auto');
            $(".swal2-modal").css('width', 'auto');
            $(".swal2-icon").css('height', '3rem');
            $(".swal2-icon").css('width', '3rem');
            $(".swal2-icon .swal2-icon-content").css('font-size', '1.75rem');
            $(".swal2-close").css('font-size', '2.0em');
            $(".swal2-icon").css('border-color', '#ff1648');
            $(".swal2-icon").css('color', '#ff1648');
            $(".swal2-confirm").css('background-color', '#ff1648');
            $(".swal2-confirm").css('border-radius', '2.25rem');
            $(".swal2-confirm").css('width', '5rem');
            $(".swal2-cancel").css('background-color', '#ff1648');
            $(".swal2-cancel").css('border-radius', '2.25rem');
            $(".swal2-cancel").css('width', '5rem');
    
        }
    </script>
@endpush