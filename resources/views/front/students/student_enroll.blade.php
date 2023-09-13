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
                <h4 class="dashboard_titles">Enrolled Courses</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                            <ul
                                class="nav nav-tabs ms-3"
                                id="myTab"
                                role="tablist"
                            >
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link nav-cmn-course active"
                                        id="courses-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#home"
                                        type="button"
                                        role="tab"
                                        aria-controls="home"
                                        aria-selected="true"
                                    >
                                        All Courses
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link nav-cmn-course"
                                        id="active-course-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#profile"
                                        type="button"
                                        role="tab"
                                        aria-controls="profile"
                                        aria-selected="false"
                                    >
                                        Active Courses
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link nav-cmn-course"
                                        id="complete-course-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#contact"
                                        type="button"
                                        role="tab"
                                        aria-controls="contact"
                                        aria-selected="false"
                                    >
                                        Completed Courses
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div
                                    class="tab-pane fade show active"
                                    id="home"
                                    role="tabpanel"
                                    aria-labelledby="courses-tab"
                                >
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div
                                                class="maz__courses-wrapper"
                                            >
                                                <img
                                                    data-src="{{
                                                        asset(
                                                            'assets/front/images/student-enroll.jpg'
                                                        )
                                                    }}"
                                                    alt="student-enroll"
                                                    class="lazy"
                                                />

                                                <div
                                                    class="maz__wishlist-content"
                                                >
                                                    <div class="star-rating">
                                                        <span
                                                            class="far fa-star"
                                                        ></span>
                                                        <span
                                                            class="far fa-star"
                                                        ></span>
                                                        <span
                                                            class="far fa-star"
                                                        ></span>
                                                        <span
                                                            class="far fa-star"
                                                        ></span>
                                                        <span
                                                            class="far fa-star"
                                                        ></span>
                                                    </div>
                                                    <h4
                                                        class="maz__enroll-title mt-2"
                                                    >
                                                        Children’s Dance: Ballet
                                                        101
                                                    </h4>
                                                    <div class="maz__lesson-content">
                                                    <span class="mt-2"
                                                        >Total Lessons : 2</span
                                                    >
                                                    <span class="ms-xl-3 mt-xl-2"
                                                        >Completed Lessons :
                                                        1/2</span
                                                    >
                                                    </div>
                                                   
                                                    <div class="progress-bar-wrapper">
                                                        <div
                                                            class="progress mt-4"
                                                        >
                                                            <div
                                                                class="progress-bar progress-bar"
                                                                role="progressbar"
                                                                style="
                                                                    width: 25%;
                                                                "
                                                                aria-valuenow="25"
                                                                aria-valuemin="0"
                                                                aria-valuemax="100"
                                                            ></div>
                                                        </div>
                                                        <div class="mt-3 ms-xxxl-4">
                                                            25% Complete
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="maz__courses-wrapper"
                                            >
                                                <img
                                                    data-src="{{
                                                        asset(
                                                            'assets/front/images/student-enroll.jpg'
                                                        )
                                                    }}"
                                                    alt="student-enroll"
                                                    class="lazy"
                                                />

                                                <div
                                                    class="maz__wishlist-content"
                                                >
                                                    <div class="star-rating">
                                                        <span
                                                            class="far fa-star"
                                                        ></span>
                                                        <span
                                                            class="far fa-star"
                                                        ></span>
                                                        <span
                                                            class="far fa-star"
                                                        ></span>
                                                        <span
                                                            class="far fa-star"
                                                        ></span>
                                                        <span
                                                            class="far fa-star"
                                                        ></span>
                                                    </div>
                                                    <h4
                                                        class="maz__enroll-title mt-2"
                                                    >
                                                        Children’s Dance: Ballet
                                                        101
                                                    </h4>
                                                    <div class="maz__lesson-content">
                                                    <span class="mt-2"
                                                        >Total Lessons : 2</span
                                                    >
                                                    <span class="ms-xl-3 mt-xl-2"
                                                        >Completed Lessons :
                                                        1/2</span
                                                    >
                                                    </div>
                                                    <div class="progress-bar-wrapper">
                                                        <div
                                                            class="progress mt-4"
                                                        >
                                                            <div
                                                                class="progress-bar progress-bar"
                                                                role="progressbar"
                                                                style="
                                                                    width: 25%;
                                                                "
                                                                aria-valuenow="25"
                                                                aria-valuemin="0"
                                                                aria-valuemax="100"
                                                            ></div>
                                                        </div>
                                                        <div class="mt-3 ms-xxxl-4">
                                                            25% Complete
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="tab-pane fade"
                                    id="profile"
                                    role="tabpanel"
                                    aria-labelledby="active-course-tab"
                                >
                                    <div class="row">
                                        <div
                                            class="maz__courses-wrapper"
                                        >
                                            <img
                                                data-src="{{
                                                    asset(
                                                        'assets/front/images/student-enroll.jpg'
                                                    )
                                                }}"
                                                alt="student-enroll"
                                                class="lazy"
                                            />

                                            <div class="maz__wishlist-content">
                                                <div class="star-rating">
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                </div>
                                                <h4
                                                    class="maz__enroll-title mt-2"
                                                >
                                                    Children’s Dance: Ballet 101
                                                </h4>
                                                <div class="maz__lesson-content">
                                                <span class="mt-2"
                                                    >Total Lessons : 2</span
                                                >
                                                <span class="ms-xl-3 mt-xl-2"
                                                    >Completed Lessons :
                                                    1/2</span
                                                >
                                                </div>
                                                <div class="progress-bar-wrapper">
                                                    <div class="progress mt-4">
                                                        <div
                                                            class="progress-bar progress-bar"
                                                            role="progressbar"
                                                            style="width: 25%"
                                                            aria-valuenow="25"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"
                                                        ></div>
                                                    </div>
                                                    <div class="mt-3">
                                                        25% Complete
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="maz__courses-wrapper"
                                        >
                                            <img
                                                data-src="{{
                                                    asset(
                                                        'assets/front/images/student-enroll.jpg'
                                                    )
                                                }}"
                                                alt="student-enroll"
                                                class="lazy"
                                            />

                                            <div class="maz__wishlist-content">
                                                <div class="star-rating">
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                </div>
                                                <h4
                                                    class="maz__enroll-title mt-2"
                                                >
                                                    Children’s Dance: Ballet 101
                                                </h4>
                                                <div class="maz__lesson-content">
                                                <span class="mt-2"
                                                    >Total Lessons : 2</span
                                                >
                                                <span class="ms-xl-3 mt-xl-2"
                                                    >Completed Lessons :
                                                    1/2</span
                                                >
                                                </div>
                                                <div class="progress-bar-wrapper">
                                                    <div class="progress mt-4">
                                                        <div
                                                            class="progress-bar progress-bar"
                                                            role="progressbar"
                                                            style="width: 25%"
                                                            aria-valuenow="25"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"
                                                        ></div>
                                                    </div>
                                                    <div class="mt-3 ms-xxxl-4">
                                                        25% Complete
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="tab-pane fade"
                                    id="contact"
                                    role="tabpanel"
                                    aria-labelledby="complete-course-tab"
                                >
                                    <div class="row">
                                        <div
                                            class="maz__courses-wrapper"
                                        >
                                            <img
                                                data-src="{{
                                                    asset(
                                                        'assets/front/images/student-enroll.jpg'
                                                    )
                                                }}"
                                                alt="student-enroll"
                                                class="lazy"
                                            />

                                            <div class="maz__wishlist-content">
                                                <div class="star-rating">
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                </div>
                                                <h4
                                                    class="maz__enroll-title mt-2"
                                                >
                                                    Children’s Dance: Ballet 101
                                                </h4>
                                                <div class="maz__lesson-content">
                                                <span class="mt-2"
                                                    >Total Lessons : 2</span
                                                >
                                                <span class="ms-xl-3 mt-xl-2"
                                                    >Completed Lessons :
                                                    1/2</span
                                                >
                                                </div>
                                                <div class="progress-bar-wrapper">
                                                    <div class="progress mt-4">
                                                        <div
                                                            class="progress-bar progress-bar"
                                                            role="progressbar"
                                                            style="width: 25%"
                                                            aria-valuenow="25"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"
                                                        ></div>
                                                    </div>
                                                    <div class="mt-3 ms-xxl-4">
                                                        25% Complete
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="maz__courses-wrapper"
                                        >
                                            <img
                                                data-src="{{
                                                    asset(
                                                        'assets/front/images/student-enroll.jpg'
                                                    )
                                                }}"
                                                alt="student-enroll"
                                                class="lazy"
                                            />

                                            <div class="maz__wishlist-content">
                                                <div class="star-rating">
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                    <span
                                                        class="far fa-star"
                                                    ></span>
                                                </div>
                                                <h4
                                                    class="maz__enroll-title mt-2"
                                                >
                                                    Children’s Dance: Ballet 101
                                                </h4>
                                                <div class="maz__lesson-content">
                                                <span class="mt-2"
                                                    >Total Lessons : 2</span
                                                >
                                                <span class="ms-xl-3 mt-xl-2"
                                                    >Completed Lessons :
                                                    1/2</span
                                                >
                                                </div>
                                                <div class="progress-bar-wrapper">
                                                    <div class="progress mt-4">
                                                        <div
                                                            class="progress-bar progress-bar"
                                                            role="progressbar"
                                                            style="width: 25%"
                                                            aria-valuenow="25"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"
                                                        ></div>
                                                    </div>
                                                    <div class="mt-3 ms-xxxl-4">
                                                        25% Complete
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
        </div>
    </div>
    @endsection
</div>
