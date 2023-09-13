@extends('front.layouts.app') @section('content')
@include('front.include.student_alert_box')
<!-- maz main wrapper -->
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.student_header')
            </div>
            <div class="wrapper-content">
                <h4 class="dashboard_titles">My Belt Test</h4>
                <div class="row">
                    <div class="col-md-7 col-lg-8 col-xl-7 col-xxl-8">
                        <div class="maz__belt-detail-box">
                            <img data-src="{{
                                    asset('assets/front/images/belt-info.png')
                                }}" alt="belt-info" class="lazy" />

                            <div class="ms-4">
                                <h4 class="maz__belt-box-title mt-sm-4">
                                    Decipline :
                                    <span class="maz__belt-cat">Kung Fu</span>
                                </h4>
                                <h4 class="maz__belt-box-title mt-lg-4">
                                    Belt Name :
                                    <span class="maz__belt-cat">Whit Yellow 1</span>
                                </h4>
                                <h4 class="maz__belt-box-title mt-lg-4">
                                    Belt Level:
                                    <span class="maz__belt-cat">Bronze (Biginners)</span>
                                    <span class="maz__belt-box-title ms-xl-0 ms-xxl-4">Price:</span>
                                    <span class="maz__belt-cat">$25.00</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="maz__belt-button-box">
                            <div class="maz__belt-button-wrapper">
                                <a href="#" class="btn btn-info dashboard_btn_lg dashboard_btn_info btn-find-belt mb-4">Find Other
                                    Belts</a>
                                <a href="#" class="btn btn-primary dashboard_btn_lg dashboard_btn_danger btn-portal">Back to
                                    Student Portal</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-11 col-xl-12 col-xxl-11">
                        <div class="maz__instruction-wrapper">
                            <h4 class="text-dark text-uppercase">
                                Instructions :
                            </h4>
                            <div class="maz__instructor-box">
                                <div class="maz___instructor-belt-wrapper">
                                    <img data-src="{{
                                            asset(
                                                'assets/front/images/belt-girl-karate.jpg'
                                            )
                                        }}" alt="belt-girl" class="lazy" />

                                    <div>
                                        <h5 class="maz__instructor-belt-info mt-4 ms-md-3">
                                            Decipline :
                                            <span class="maz__instructor-belt-text">In your submitted test video,
                                                perform the following forms in
                                                order.</span>
                                        </h5>
                                        <h5 class="maz__instructor-belt-info mt-4 ms-md-3">
                                            Step:1
                                            <span class="maz__instructor-belt-text">Basic horse Stance</span>
                                        </h5>
                                        <h5 class="maz__instructor-belt-info mt-4 ms-md-3">
                                            Step:2
                                            <span class="maz__instructor-belt-text">Horse Stance squats</span>
                                        </h5>
                                        <h5 class="maz__instructor-belt-info mt-4 ms-md-3">
                                            Step:3
                                            <span class="maz__instructor-belt-text">Horse Stance defance</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-5 col-xxxl-4">
                        <div class="maz__belt-user-box">
                            <div class="maz__belt-user-wrapper">
                                <img data-src="{{
                                        asset(
                                            'assets/front/images/belt-karate-mom.jpg'
                                        )
                                    }}" alt="belt-karate-mom" class="lazy" />
                                <div>
                                    <h4 class="maz__belt-user-title ms-2">
                                        Jesica
                                    </h4>
                                    <h4 class="maz__belt-user-title ms-2 text-info">
                                        Exercise Super Mom!
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 col-xl-6 col-xxl-6 col-xxxl-7">
                        <div class="maz__belt-video-box">
                            <div class="maz__belt-video-wrapper">
                                <label for="file-input">
                                    <img data-src="{{
                                            asset(
                                                'assets/front/images/upload.png'
                                            )
                                        }}" alt="upload-icon" class="lazy" />
                                </label>
                                <input id="file-input" type="file" />
                            </div>

                            <h5 class="maz__belt-video-text text-center">
                                Click here to upload your test video
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-11 col-xl-12 col-xxl-11">
                        <div class="maz__belt-comment-box">
                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="5">Comment to your instructor</textarea>
                        </div>
                        <div class="maz__submit-button-wrapper">
                            <a href="#" class="btn btn-success btn-submit-test">Submit my test</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection