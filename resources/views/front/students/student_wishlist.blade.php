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
                <h4 class="dashboard_titles">Enrolled Courses</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body  maz__profile-content">
                            <div class="maz__courses-wrapper d-flex justify-content-start">
                                
                                    <img data-src="{{ asset('assets/front/images/student-enroll.jpg') }}" alt="student-enroll" class="lazy"> 
                                
                                <div class="maz__wishlist-content">
                                    <div class="maz__wishlist-wrapper">
                                        <div>
                                            <div class="star-rating">
                                                <span class="far fa-star"></span>
                                                <span class="far fa-star"></span>
                                                <span class="far fa-star"></span>
                                                <span class="far fa-star"></span>
                                                <span class="far fa-star"></span>
                                            </div>
                                        
                                            <h4 class="maz__enroll-title mt-2">Children’s Dance: Ballet 101</h4>
                                            <div class="maz__lesson-content">
                                                <span class="mt-2">Total Lessons : 2</span>  
                                                <span class="ms-xl-3 mt-xl-2">Completed Lessons : 1/2</span>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <a href="#" class="btn btn-primary dashboard_btn_danger">Remove <img data-src="{{ asset('assets/front/images/Trash-alt.png') }}" alt="trash" class="lazy ms-2"> </a>
                                        </div>
                                    </div>
                                    <div class="progress-bar-wrapper">
                                        <div class="progress mt-4">
                                        <div class="progress-bar progress-bar" role="progressbar" style="width:25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="mt-3 ms-xxxl-4">25% Complete</div>
                                    </div>
                                </div>       
                            </div>
                            <div class="maz__courses-wrapper d-flex justify-content-start">
                               
                                    <img data-src="{{ asset('assets/front/images/student-enroll.jpg') }}" alt="student-enroll" class="lazy"> 
                               
                                    <div class="maz__wishlist-content">
                                    <div class="maz__wishlist-wrapper">
                                        <div>
                                            <div class="star-rating">
                                                <span class="far fa-star"></span>
                                                <span class="far fa-star"></span>
                                                <span class="far fa-star"></span>
                                                <span class="far fa-star"></span>
                                                <span class="far fa-star"></span>
                                            </div>
                                        
                                            <h4 class="maz__enroll-title mt-2">Children’s Dance: Ballet 101</h4>
                                            <span class="mt-2">Total Lessons : 2</span>  <span class="ms-xl-3 mt-xl-2">Completed Lessons : 1/2</span>
                                        </div>
                                        <div class="mt-3">
                                            <a href="#" class="btn btn-primary dashboard_btn_danger">Remove <img data-src="{{ asset('assets/front/images/Trash-alt.png') }}" alt="trash" class="lazy ms-2"> </a>
                                        </div>
                                    </div>
                                    <div class="progress-bar-wrapper">
                                        <div class="progress mt-4">
                                        <div class="progress-bar progress-bar" role="progressbar" style="width:25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="mt-3 ms-xxxl-4">25% Complete</div>
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