@extends('front.layouts.app')

@section('content')
@include('front.include.student_alert_box')
<!-- maz main wrapper -->
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.student_header')
            </div>
            <div class="wrapper-content">
                <h3>Dashboard</h3>
                <div class="row">
                    <div class="col-md-6 col-xxl-4 col-xxxl-4">
                        <div class="maz__dashboard__card-box card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="content">
                                        <p class="fs-5">Enrolled Course</p>
                                        <h1>01</h1>
                                    </div>
                                    <div class="icon icon-primary">
                                        <i class="fas fa-file-signature"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xxl-4 col-xxxl-4">
                        <div class="maz__dashboard__card-box card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="content">
                                        <p class="fs-5">Active Courses</p>
                                        <h1>01</h1>
                                    </div>
                                    <div class="icon icon-success">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xxl-4 col-xxxl-4">
                        <div class="maz__dashboard__card-box card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="content">
                                        <p class="fs-5">Completed Course</p>
                                        <h1>00</h1>
                                    </div>
                                    <div class="icon icon-info">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3>Current Plan</h3>
                <hr>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="mb-4 pb-50">
                            <h5>Your Current Plan is <strong>{{ (Auth::user()->plan_amount == 0) ? 'Free' : "Bronze ($".Auth::user()->plan_amount.")" }}</strong> @if(Auth::user()->status != '') and Status is <strong>{{ Auth::user()->status }}</strong>@endif</h5>
                            <span>A simple start for everyone</span>
                        </div>
                        @if(!Auth::user()->plan_amount)
                            <div class="mb-4">
                                <h5>$19.99 Per Month <span class="badge badge-light-primary ms-50">Popular</span></h5>
                                <span>Standard plan for small to medium businesses</span>
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        @if(Auth::user()->plan_amount)
                            <button class="btn btn btn-primary text-uppercase dashboard_btn_danger dashboard_btn_lg" data-bs-toggle="modal" data-bs-target="#cancelSubscriptionConfirmModalDialog" {{ (Auth::user()->status == 'canceled') ? 'disabled="true"' : '' }}>Cancel Subscription</button>
                        @else
                            <button class="btn btn-secondary dashboard_btn_lg text-uppercase me-sm-3 mb-2 mb-sm-0" data-bs-toggle="modal" data-bs-target="#upgradeSubscriptionModalDialog">Upgrade Plan</button>
                        @endif
                    </div>
                </div>
                <h3>Badges</h3>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-lg-2 col-xl-3 col-xxl-2 col-sm-4 col-6">
                        <div class="card mb-3 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex flex-column justify-content-between align-items-center">
                                    <div class="belt-icon mt-3">
                                        <svg width="78" height="40" viewBox="0 0 78 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M33.2746 0.227638C32.6876 0.491849 32.0427 1.27582 31.9138 1.88203C31.8482 2.19065 32.285 4.78852 33.205 9.56181C33.9697 13.5292 34.6303 16.8991 34.6728 17.0507C34.7442 17.3047 35.0836 17.3263 38.9961 17.3263C42.9086 17.3263 43.2479 17.3047 43.3193 17.0507C43.3619 16.8991 44.0212 13.5358 44.7842 9.57661C45.9843 3.35031 46.1505 2.29646 46.0146 1.77496C45.8395 1.10325 45.2369 0.427764 44.5857 0.17363C43.9146 -0.0883775 33.8702 -0.0405104 33.2746 0.227638ZM1.27341 3.47313C0.880915 3.67388 0.526964 4.02123 0.311973 4.41661C-0.0127227 5.01352 -0.0261311 5.1809 0.0188174 8.07447C0.0631565 10.9173 0.0872306 11.1375 0.405832 11.5991C1.11251 12.6229 0.916721 12.6026 10.0786 12.6026H18.3691L22.1308 7.96284C24.1996 5.41094 25.8924 3.28528 25.8924 3.23915C25.8924 3.19301 20.493 3.15522 13.8934 3.15538C2.16614 3.15554 1.88045 3.16262 1.27341 3.47313ZM52.0997 3.23915C52.0997 3.28528 53.7925 5.41094 55.8614 7.96284L59.623 12.6026H67.9388C77.3053 12.6026 76.9698 12.644 77.657 11.4053C77.975 10.832 77.9974 10.6023 77.9998 7.89277C78.0021 5.09083 77.9896 4.97132 77.6256 4.32953C76.9277 3.09901 77.5771 3.15522 64.0575 3.15522C57.4807 3.15522 52.0997 3.19301 52.0997 3.23915ZM20.6357 17.1312C16.5294 22.1972 11.8881 27.9228 10.3216 29.8548C7.20632 33.6975 6.95704 34.1433 7.28707 35.2818C7.43944 35.8071 7.8007 36.2089 9.37527 37.6043C11.4083 39.4058 12.2907 40 12.9328 40C14.0106 40 14.3585 39.6213 22.3354 29.7653C26.5758 24.526 30.1494 20.1159 30.2766 19.9653C30.4854 19.7181 30.3995 19.1265 29.397 13.9032C28.786 10.7197 28.2447 8.07132 28.1939 8.01779C28.1432 7.96425 24.742 12.0652 20.6357 17.1312ZM49.7444 8.06534C49.7069 8.17934 49.1829 10.8416 48.5798 13.9814C47.5898 19.1359 47.5058 19.717 47.7149 19.9648C47.8422 20.1158 51.3891 24.4906 55.5965 29.6866C59.804 34.8827 63.385 39.2573 63.5541 39.4078C64.0789 39.8751 64.9707 40.0746 65.6265 39.8717C66.2388 39.6821 70.04 36.5119 70.4721 35.8306C70.8449 35.2425 70.8893 34.3398 70.5784 33.6687C70.197 32.8455 49.8273 7.81278 49.7444 8.06534Z" fill="#FFB254" />
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <p class="text-dark text-uppercase fw-bold fs-5 mt-3">Kung Fu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-3 col-xxl-2 col-sm-4 col-6">
                        <div class="card mb-3 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex flex-column justify-content-between align-items-center">
                                    <div class="belt-icon mt-3">
                                        <svg width="78" height="40" viewBox="0 0 78 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M33.2746 0.227638C32.6876 0.491849 32.0427 1.27582 31.9138 1.88203C31.8482 2.19065 32.285 4.78852 33.205 9.56181C33.9697 13.5292 34.6303 16.8991 34.6728 17.0507C34.7442 17.3047 35.0836 17.3263 38.9961 17.3263C42.9086 17.3263 43.2479 17.3047 43.3193 17.0507C43.3619 16.8991 44.0212 13.5358 44.7842 9.57661C45.9843 3.35031 46.1505 2.29646 46.0146 1.77496C45.8395 1.10325 45.2369 0.427764 44.5857 0.17363C43.9146 -0.0883775 33.8702 -0.0405104 33.2746 0.227638ZM1.27341 3.47313C0.880915 3.67388 0.526964 4.02123 0.311973 4.41661C-0.0127227 5.01352 -0.0261311 5.1809 0.0188174 8.07447C0.0631565 10.9173 0.0872306 11.1375 0.405832 11.5991C1.11251 12.6229 0.916721 12.6026 10.0786 12.6026H18.3691L22.1308 7.96284C24.1996 5.41094 25.8924 3.28528 25.8924 3.23915C25.8924 3.19301 20.493 3.15522 13.8934 3.15538C2.16614 3.15554 1.88045 3.16262 1.27341 3.47313ZM52.0997 3.23915C52.0997 3.28528 53.7925 5.41094 55.8614 7.96284L59.623 12.6026H67.9388C77.3053 12.6026 76.9698 12.644 77.657 11.4053C77.975 10.832 77.9974 10.6023 77.9998 7.89277C78.0021 5.09083 77.9896 4.97132 77.6256 4.32953C76.9277 3.09901 77.5771 3.15522 64.0575 3.15522C57.4807 3.15522 52.0997 3.19301 52.0997 3.23915ZM20.6357 17.1312C16.5294 22.1972 11.8881 27.9228 10.3216 29.8548C7.20632 33.6975 6.95704 34.1433 7.28707 35.2818C7.43944 35.8071 7.8007 36.2089 9.37527 37.6043C11.4083 39.4058 12.2907 40 12.9328 40C14.0106 40 14.3585 39.6213 22.3354 29.7653C26.5758 24.526 30.1494 20.1159 30.2766 19.9653C30.4854 19.7181 30.3995 19.1265 29.397 13.9032C28.786 10.7197 28.2447 8.07132 28.1939 8.01779C28.1432 7.96425 24.742 12.0652 20.6357 17.1312ZM49.7444 8.06534C49.7069 8.17934 49.1829 10.8416 48.5798 13.9814C47.5898 19.1359 47.5058 19.717 47.7149 19.9648C47.8422 20.1158 51.3891 24.4906 55.5965 29.6866C59.804 34.8827 63.385 39.2573 63.5541 39.4078C64.0789 39.8751 64.9707 40.0746 65.6265 39.8717C66.2388 39.6821 70.04 36.5119 70.4721 35.8306C70.8449 35.2425 70.8893 34.3398 70.5784 33.6687C70.197 32.8455 49.8273 7.81278 49.7444 8.06534Z" fill="#FF1648" />
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <p class="text-dark text-uppercase fw-bold fs-5 mt-3">Yoga</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-3 col-xxl-2 col-sm-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column justify-content-between align-items-center">
                                    <div class="belt-icon mt-3">
                                        <svg width="78" height="40" viewBox="0 0 78 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M33.2746 0.227638C32.6876 0.491849 32.0427 1.27582 31.9138 1.88203C31.8482 2.19065 32.285 4.78852 33.205 9.56181C33.9697 13.5292 34.6303 16.8991 34.6728 17.0507C34.7442 17.3047 35.0836 17.3263 38.9961 17.3263C42.9086 17.3263 43.2479 17.3047 43.3193 17.0507C43.3619 16.8991 44.0212 13.5358 44.7842 9.57661C45.9843 3.35031 46.1505 2.29646 46.0146 1.77496C45.8395 1.10325 45.2369 0.427764 44.5857 0.17363C43.9146 -0.0883775 33.8702 -0.0405104 33.2746 0.227638ZM1.27341 3.47313C0.880915 3.67388 0.526964 4.02123 0.311973 4.41661C-0.0127227 5.01352 -0.0261311 5.1809 0.0188174 8.07447C0.0631565 10.9173 0.0872306 11.1375 0.405832 11.5991C1.11251 12.6229 0.916721 12.6026 10.0786 12.6026H18.3691L22.1308 7.96284C24.1996 5.41094 25.8924 3.28528 25.8924 3.23915C25.8924 3.19301 20.493 3.15522 13.8934 3.15538C2.16614 3.15554 1.88045 3.16262 1.27341 3.47313ZM52.0997 3.23915C52.0997 3.28528 53.7925 5.41094 55.8614 7.96284L59.623 12.6026H67.9388C77.3053 12.6026 76.9698 12.644 77.657 11.4053C77.975 10.832 77.9974 10.6023 77.9998 7.89277C78.0021 5.09083 77.9896 4.97132 77.6256 4.32953C76.9277 3.09901 77.5771 3.15522 64.0575 3.15522C57.4807 3.15522 52.0997 3.19301 52.0997 3.23915ZM20.6357 17.1312C16.5294 22.1972 11.8881 27.9228 10.3216 29.8548C7.20632 33.6975 6.95704 34.1433 7.28707 35.2818C7.43944 35.8071 7.8007 36.2089 9.37527 37.6043C11.4083 39.4058 12.2907 40 12.9328 40C14.0106 40 14.3585 39.6213 22.3354 29.7653C26.5758 24.526 30.1494 20.1159 30.2766 19.9653C30.4854 19.7181 30.3995 19.1265 29.397 13.9032C28.786 10.7197 28.2447 8.07132 28.1939 8.01779C28.1432 7.96425 24.742 12.0652 20.6357 17.1312ZM49.7444 8.06534C49.7069 8.17934 49.1829 10.8416 48.5798 13.9814C47.5898 19.1359 47.5058 19.717 47.7149 19.9648C47.8422 20.1158 51.3891 24.4906 55.5965 29.6866C59.804 34.8827 63.385 39.2573 63.5541 39.4078C64.0789 39.8751 64.9707 40.0746 65.6265 39.8717C66.2388 39.6821 70.04 36.5119 70.4721 35.8306C70.8449 35.2425 70.8893 34.3398 70.5784 33.6687C70.197 32.8455 49.8273 7.81278 49.7444 8.06534Z" fill="#000" />
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <p class="text-dark text-uppercase fw-bold fs-5 mt-3">Tai chi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Cancel Subscription Confirm Modal Dialog --}}
<div class="modal fade" id="cancelSubscriptionConfirmModalDialog" tabindex="-1" aria-labelledby="logoutPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="body-content my-5">
                    <h4> Do you really want to cancel your current subscription?</h4>
                </div>
                <div class="button-groups mb-5">
                    <a href="{{ route('student_cancel_subscription') }}" class="btn btn-secondary dashboard_btn_sm text-uppercase me-3">Continue</a>
                    <a href="javscript:void(0)" class="btn btn-primary dashboard_btn_danger dashboard_btn_sm text-uppercase" data-bs-dismiss="modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Upgrade Subscription Modal Dialog --}}
<div class="modal fade" id="upgradeSubscriptionModalDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-uppercase" id="staticBackdropLabel ">Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="bg-gary p-3 bg-gray-100 mb-3 bg-light rounded">
                    <h6 class="mb-0">BRONZE PLAN: <span class="text-success">$19.99/Month</span></h6>
                </div>
                <form method="POST" action="{{ route('student_upgrade_plan') }}" class="form" id="upgradePlanForm">
                    @csrf
                    <input type="hidden" name="plan" id="plan" value="Bronze">
                    <input type="hidden" name="price" id="price" value="19.99">
                    <input type="hidden" name="interval" id="interval" value="month">
                    <input type="hidden" name="currency" id="currency" value="USD">
                    <input type="hidden" name="is_subscribe" id="is_subscribe" value="1">
                    @php
                        $client_secret = Session::get('client_secret');
                    @endphp
                    <input type="hidden" id="clientSecret" name="client_secret" value="{{ (isset($client_secret) ? $client_secret : '') }}" />
                    <div class="row mb-4">
                        <!-- Display errors returned by createToken -->
                        <div id="paymentResponse" class="text-primary"></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 mb-4">
                            <div class="form-group">
                                <label>Card Number <span class="text-primary">*</span></label>
                                <div id="card_number" class="field form-control"></div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="form-group">
                                <label>Expiry Date <span class="text-primary">*</span></label>
                                <div id="card_expiry" class="field form-control"></div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="form-group">
                                <label>CVC Code <span class="text-primary">*</span></label>
                                <div id="card_cvc" class="field form-control"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary btn-cmn-pdng btn-rounded w-100 fw-bold text-uppercase">Sumbit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
                        window.location.href = "{{ route('dashboard')}}";
                    }
                });
            }

            var selectedPlan = 'Bronze';
            $("#plan").val('Bronze');
            $("#price").val('19.99');
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
            var form = document.getElementById('upgradePlanForm');

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