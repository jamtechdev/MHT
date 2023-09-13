@extends('front.layouts.app')

@section('content')
<section class="maz__register maz__sections">
    <div class="container">
        <div class="maz__register-plan">
            <form method="POST" action="{{ route('stripePayment') }}" class="maz__register-form" id="subscribeVideoForm">
                @csrf
                <input type="hidden" name="plan" id="plan" value="Bronze">
                <input type="hidden" name="plan_id" id="plan" value="{{ isset($result['plan_id']) ? $result['plan_id'] : '' }}">
                <input type="hidden" name="price" id="price" value="{{ isset($result['price']) ? $result['price'] : '' }}">
                <input type="hidden" name="interval" id="interval" value="month">
                <input type="hidden" name="currency" id="currency" value="USD">
                @php
                    $client_secret = Session::get('client_secret');
                @endphp
                <input type="hidden" id="clientSecret" name="client_secret" value="{{ (isset($client_secret) ? $client_secret : '') }}" />
                <input type="hidden" id="is_subscribe" name="is_subscribe" value="1" />
                <div class="row">
                    <!-- SELECT PACKAGE PLAN HTML -->
                    <div class="col-lg-12">
                        <div class="maz__plan-wrapper">
                            <h4 class="maz__choose-title text-center mb-4">Make Payment To Buy This Plan</h4>
                            <div class="maz__main-wrapper pt-0">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 mb-4">
                                        <div class="maz__cmn-plan-box">
                                            <h3 class="maz__cmn-plan-title" style="text-align:center;">{{ isset($result['plan_name']) ? $result['plan_name'] : '' }}</h3>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-center mt-2 mb-2">
                                                {{--<button type="button" class="btn btn-cmn-benifit me-4">Benefits</button>--}}
                                                <span class="maz__cmn-plan-price" >{{ isset($result['price']) ? "$ ".$result['price']." / " : ''}} {{ isset($result['validity']) ? $result['validity'] : ''}}</span>
                                            </div>
                                            {{--<button type="button" class="btn btn-cmn-plan active">Select Plan</button>--}}
                                            <p class="card-text">
                                                @php
                                                    $oldBenefits = explode(",",$result['plan_benefits']);

                                                    if(!empty($result['all_benefits']))
                                                    {
                                                        foreach($result['all_benefits'] as $ab)
                                                        {
                                                            if(in_array($ab->id,$oldBenefits))
                                                            {
                                                                @endphp
                                                                    <i class="fa fa-check me-1"></i> 
                                                                @php 
                                                                echo $ab->benefit;
                                                            }
                                                            else
                                                            {
                                                                @endphp
                                                                    <p>
                                                                    <i class="fa fa-times me-1"></i> 
                                                                @php 
                                                                echo $ab->benefit;
                                                            }
                                                            @endphp
                                                            </p>
                                                            @php
                        
                                                        }
                                                    }
                                                @endphp
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-4">
                                        <!-- Display errors returned by createToken -->
                                        <div id="paymentResponse" class="text-primary"></div>
                                    </div>
                                    
                                    @php
                                        if(!empty($result['credit_card_number']) && !empty($result['credit_card_expiry_date']) && !empty($result['credit_card_type']))
                                        {
                                            @endphp
                                            <div class="col-lg-8 mb-4">
                                                <label>Card Number <span class="text-primary">*</span></label>
                                                <div id="card_number" class="field form-control"></div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <label> <b> Cards On File </b></label>
                                                <div>
                                                    <b>
                                                    @php
                                                        echo "**** **** **** ".$result['credit_card_number'].",".$result['credit_card_expiry_date']." ".$result['credit_card_type'];
                                                    @endphp
                                                    </b>
                                                </div>
                                                
                                            </div>
                                            @php
                                        }
                                        else
                                        {
                                            @endphp
                                            <div class="col-lg-12 mb-4">
                                                <label>Card Number <span class="text-primary">*</span></label>
                                                <div id="card_number" class="field form-control"></div>
                                            </div>
                                            @php
                                        }
                                    @endphp
                                   

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <label>Expiry Date <span class="text-primary">*</span></label>
                                                <div id="card_expiry" class="field form-control"></div>
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <div class="form-group">
                                                    <label>CVC Code <span class="text-primary">*</span></label>
                                                    <div id="card_cvc" class="field form-control"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
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

     $("body").addClass('maz__bg-img-body');

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
                        window.location.href = "{{ route('dashboard')}}";
                    }
                });
            }

            // var selectedPlan = 'Bronze';
            // $("#plan").val('Bronze');
            // $("#price").val('19.99');
            // $("#interval").val('month');
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
            var form = document.getElementById('subscribeVideoForm');

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