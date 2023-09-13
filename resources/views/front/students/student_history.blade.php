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
                <h4 class="dashboard_titles">Purchase History</h4>
                <div class="row">
                    <div class="col-lg-12 col-xl-12 col-xxl-11 my-4">
                        <div class="maz__cmn-history-box">
                            <div class="maz__cmn-history-wrapper">
                                <img data-src="{{ asset('assets/front/images/kunfu-lady.jpg') }}" alt="kunfu-lady" class="lazy">
                                <div>
                                    <h5 class="maz__cmn-history-title ms-sm-4">Kung Fu Yellow Belt  <span class="maz__cmn-history-text ms-sm-0 ms-md-4 mt-xl-3">January 1, 2022</span></h5>
                                    <h5 class="maz__cmn-history-total ms-sm-4 mt-xxxl-4">Total</h5>  
                                    <h5 class="text-info ms-sm-4 mt-xl-1">$48.68</h5>
                                    <div class="maz__cmn-history-btn mt-4 ms-sm-4 ms-md-0">
                                      <a href="#" class="fw-bold btn btn-primary dashboard_btn_danger mb-3 mb-md-0 ms-md-4">Archive Order</a>  
                                      <a href="#" class="fw-bold btn btn-secondary ms-md-4 mt-lg-0">Submit Feedback</a>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-12 col-xxl-11">
                        <div class="maz__cmn-history-box">
                            <div class="maz__cmn-history-wrapper">
                                <img data-src="{{ asset('assets/front/images/kunfu-lady.jpg') }}" alt="kunfu-lady" class="lazy">
                                <div>
                                    <h5 class="maz__cmn-history-title ms-sm-4">Kung Fu Yellow Belt  <span class="maz__cmn-history-text ms-sm-0 ms-md-4">January 2, 2022</span></h5>
                                    <h5 class="maz__cmn-history-total ms-sm-4 mt-xxxl-4">Total</h5>  
                                    <h5 class="text-info ms-sm-4 mt-xl-1">$33.15</h5>
                                    <div class="maz__cmn-history-btn mt-4 ms-sm-4 ms-md-0">
                                      <a href="#" class="fw-bold btn btn-primary dashboard_btn_danger mb-3 mb-md-0 ms-md-4">Archive Order</a>  
                                      <a href="#" class="fw-bold btn btn-secondary ms-md-4 mt-lg-0">Submit Feedback</a>  
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
@endsection