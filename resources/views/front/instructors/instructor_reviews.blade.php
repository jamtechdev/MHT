@extends('front.layouts.app')

@section('content')

@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content">
                <h4 class="dashboard_titles">Reviews</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                           
                            <div class="col-xxl-4 col-md-5">
                              
                                <div class="maz__instructor-rating-box">
                                    <div class="star-review-rating">
                                        <h1 class="text-center">4.5  <span class="fas fa-star"></span></h1>
                                        <h5 class="maz__instructor-rating-title mb-4 text-center">5 Ratings & 0 Reviews</h5>
                                        <div class="d-flex align-items-center">
                                            <span class="text-dark d-flex align-items-center justify-content-stat">5 
                                                <img data-src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                            </span>
                                            <div class="progress cmn-progress-bar ms-2">
                                                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="maz__cmn-rating-percentage ms-3">75%</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-dark d-flex align-items-center justify-content-stat">4 
                                                <img data-src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                            </span>
                                            <div class="progress cmn-progress-bar ms-2">
                                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="maz__cmn-rating-percentage ms-3">60%</span>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <span class="text-dark d-flex align-items-center justify-content-stat">3 
                                                <img data-src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                            </span>
                                            <div class="progress cmn-progress-bar ms-2">
                                                <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="maz__cmn-rating-percentage ms-3">40%</span>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <span class="text-dark d-flex align-items-center justify-content-stat">2 
                                                <img data-src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                            </span>
                                            <div class="progress cmn-progress-bar ms-2">
                                                <div class="progress-bar" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="maz__cmn-rating-percentage ms-4">0%</span>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <span class="text-dark d-flex align-items-center justify-content-stat">1 
                                                <img data-src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                            </span>
                                            <div class="progress cmn-progress-bar ms-2">
                                                <div class="progress-bar" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="maz__cmn-rating-percentage ms-4">0%</span>
                                        </div>                            
                                    </div>       
                                </div>
                            </div>
                           
                            <div class="col-lg-12 mt-24">
                                <div class="maz__instructor-title-block">
                                    <h4>Top Reviews</h4>
                                    <div class="maz__cmn-dropdown ms-4">
                                        <select class="form-select">
                                            <option selected>ALL</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="maz__instructor-top-review">
                                    
                                    <figure class="maz__reve-fig">
                                        <img data-src="{{ asset('assets/front/images/no-image.png') }}" alt="review-image" class="lazy">
                                    </figure>
                                    <div class="maz__reve-content"> 
                                        <h5 class="mb-0">I love it too!  <span class="maz__instructor-review-date ms-2">October 20, 2021</span></h5>
                                        <p class="mb-0">Beautiful theme. Love it. Keep update & improve</p>
                                        <span class="fas fa-star instructor-rating"></span>
                                        <span class="fas fa-star instructor-rating"></span>     
                                        <span class="fas fa-star instructor-rating"></span>     
                                        <span class="fas fa-star instructor-rating"></span>     
                                        <span class="far fa-star instructor-rating"></span>
                                        <span class="text-dark fs-6 ms-2">4.0</span>          
                                    </div>
                                    
                                </div>
                            
                                <div class="maz__instructor-top-review">
                                    
                                    <figure class="maz__reve-fig">
                                        <img data-src="{{ asset('assets/front/images/no-image.png') }}" alt="review-image" class="lazy">
                                    </figure>
                                    <div class="maz__reve-content"> 
                                        <h5 class="mb-0">I love it too!  <span class="maz__instructor-review-date ms-2">October 20, 2021</span></h5>
                                        <p class="mb-0">Beautiful theme. Love it. Keep update & improve</p>
                                        <span class="fas fa-star instructor-rating"></span>
                                        <span class="fas fa-star instructor-rating"></span>     
                                        <span class="fas fa-star instructor-rating"></span>     
                                        <span class="fas fa-star instructor-rating"></span>     
                                        <span class="far fa-star instructor-rating"></span>
                                        <span class="text-dark fs-6 ms-2">4.0</span>          
                                    </div>
                                    
                                </div>
                            
                                <div class="maz__instructor-top-review">
                                    
                                    <figure class="maz__reve-fig">
                                        <img data-src="{{ asset('assets/front/images/no-image.png') }}" alt="review-image" class="lazy">
                                    </figure>
                                    <div class="maz__reve-content"> 
                                        <h5 class="mb-0">I love it too!  <span class="maz__instructor-review-date ms-2">October 20, 2021</span></h5>
                                        <p class="mb-0">Beautiful theme. Love it. Keep update & improve</p>
                                        <span class="fas fa-star instructor-rating"></span>
                                        <span class="fas fa-star instructor-rating"></span>     
                                        <span class="fas fa-star instructor-rating"></span>     
                                        <span class="fas fa-star instructor-rating"></span>     
                                        <span class="far fa-star instructor-rating"></span>
                                        <span class="text-dark fs-6 ms-2">4.0</span>          
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