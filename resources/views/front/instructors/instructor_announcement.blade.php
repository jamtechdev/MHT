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
                            
                            <div class="col-xxl-10">
                                <div class="maz__profile-announcement-wrapper">
                                   <div class="maz__profile-dropdown-btn">
                                        <div class="maz__announcement-dropdown mb-2 mt-1">
                                            <select class="form-select">
                                                <option selected>ALL</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-outline-secondary btn-search mb-2 mb-lg-0"><span class="maz__btn-search-text">Search</span><span><img data-src="{{ asset('assets/front/images/search.png') }}" alt="" class="lazy"></span></button>
                                        <div class="d-flex align-items-center mb-2 mb-lg-0">
                                            <div class="maz__announcement-cmn-icon-box"><img data-src="{{ asset('assets/front/images/lock.png') }}" alt="" class="lazy"></div>
                                            <div class="maz__announcement-cmn-icon-box"><img data-src="{{ asset('assets/front/images/trash.png') }}" alt="" class="lazy"></div>
                                        </div>
                                   </div>
                                   <div class="maz__btn-announcement">
                                       <a href="{{ route('instructor_add_announcement')}}" class="btn btn-info btn-question d-flex align-items-center justify-content-center ms-xl-2"><img data-src="{{ asset('assets/front/images/plus.png') }}" alt="" class="lazy me-2">Announcement</a>
                                   </div>
                                   
                                </div>
                            </div>

                            <div class="col-lg-12 mt-24">
                                <div class="maz__profile-cmn-announcement-box">
                                   
                                    <div class="form-check maz__checkbox_group maz__announcement-content">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input maz__checkbox_info m-0" type="checkbox" value="" id="flexCheckDefault">
                                            <img data-src="{{ asset('assets/front/images/profile-announce.jpg') }}" alt="profile-announcement" class="lazy">
                                        </div>
                                        <div>
                                            <h5 class="maz__cmn-announce-title">New Course Launched!</h5>
                                            <h6 class="maz__cmn-announce-post-title">Posted On : <span class="maz__cmn-announce-date-title">Oct 20, 2021 at 11:00 am</span></h6>  
                                         </div>
                                    </div>
                                </div>         
                                <div class="maz__profile-cmn-announcement-box">
                                   
                                   <div class="form-check maz__checkbox_group maz__announcement-content m-0 p-0 ms-3">
                                     <div class="d-flex align-items-center">
                                       <input class="form-check-input maz__checkbox_info m-0" type="checkbox" value="" id="flexCheckDefault">
                                       <img data-src="{{ asset('assets/front/images/profile-announce.jpg') }}" alt="profile-announcement" class="lazy">
                                     </div>  
                                       <div>
                                           <h5 class="maz__cmn-announce-title">Join us for Yoga in the park!</h5>
                                           <h6 class="maz__cmn-announce-post-title">Posted On : <span class="maz__cmn-announce-date-title">Oct 20, 2021 at 11:00 am</span></h6>  
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
</div>    

@endsection