@extends('front.layouts.app')

@section('content')
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
            <form method="POST" action="{{ route('post-plan-register') }}" class="maz__register-form" id="registerStepOneForm">
                @csrf
                <input type="hidden" name="plan" id="plan" value="Bronze">
                <input type="hidden" name="price" id="price" value="19.99">
                <input type="hidden" name="interval" id="interval" value="month">
                <input type="hidden" name="currency" id="currency" value="USD">
                <input type="hidden" name="is_subscribe" value="1">
                @php
                    $client_secret = Session::get('client_secret');
                @endphp
                <input type="hidden" id="clientSecret" name="client_secret" value="{{ (isset($client_secret) ? $client_secret : '') }}" />
                <div class="row">
                    <!-- SELECT PACKAGE PLAN HTML -->
                    <div class="col-lg-12">
                        <div class="maz__plan-wrapper">
                            <h4 class="maz__choose-title text-center mb-4">Choose plan and payment option</h4>
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
            var selectedPlan = 'Bronze';
            $("#plan").val('Bronze');
            $("#price").val('19.99');
            $("#interval").val('month');
            // Set Stripe API Key
            var stripe = Stripe('{{config("services.stripe.key")}}');
            // Create an instance of elements
            var elements = stripe.elements();

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
        });
    </script>
@endpush