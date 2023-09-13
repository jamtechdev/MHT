@if(Auth::guard('instructor')->user()->name == '' || Auth::guard('instructor')->user()->photo == '')
<div class="maz__complete_profile-warning">
    <div class="maz__alert-box">
        <div class="maz__dashboard-container maz__alert-content" role="alert">
            <div class="image">
                <img data-src="{{ asset('assets/front/images/alert.png') }}" class="lazy" alt="warning">
            </div>
            <div class="content">
                <h4>Complete Your Profile</h4>
                <p class="mb-0">Complete your profile so people can know more about you! Go to Profile <a href="{{ route('instructor_profile', Auth::guard('instructor')->user()->id) }}" class="maz__text-blue">Settings</a></p>
            </div>
        </div>
    </div>
    <div class="maz__complete-progress maz__dashboard-container">
        <div class="row">
        @if(Auth::guard('instructor')->user()->name != '' && Auth::guard('instructor')->user()->photo == '')
            <div class="col-xl-4">
                <p>50% Complete, You are almost done!</p>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        @elseif(Auth::guard('instructor')->user()->name != '' && Auth::guard('instructor')->user()->photo != '')
            <div class="col-xl-4">
                <p>100% Complete, You are almost done!</p>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        @endif
        </div>
        <div class="set-proflie-remains">
            <ul class="list-inline text-dark">
                @if(Auth::guard('instructor')->user()->name == '' && Auth::guard('instructor')->user()->photo != '')
                <li>Set Your <b>Name</b></li>
                @endif
                @if(Auth::guard('instructor')->user()->name != '' && Auth::guard('instructor')->user()->photo == '')
                    <li>Set Your <b>Profile Photo</b></li>
                @endif
                <!-- <li>Set Your <b>Withdraw Method</b></li> -->
            </ul>
        </div>
        <hr>
    </div>
</div>
@endif

<!-- maz dashboard profile box -->
<div class="maz__dashboard-container">
    <div class="maz__dashboard__profie-box">
        <div class="rounded-profile">
            @if(Auth::guard('instructor')->user()->photo != '')
                <img data-src="{{ Auth::guard('instructor')->user()->photo }}" class="lazy" alt="profile-picture">
            @else
                <img data-src="{{ asset('assets/front/images/avatar.png') }}" class="lazy" alt="profile-picture">
            @endif
        </div>
        <div class="profile-details">
            <div class="desc">
                <h3>{{ Auth::guard('instructor')->user()->name }}</h3>
                <div class="star-rating">
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                    <span class="ms-2">0 (0 Ratings)</span>
                </div>
            </div>
            {{--<a href="{{ route('instructor_add_course') }}" class="btn btn-secondary dashboard_btn_lg text-uppercase">Add a new course</a>--}}
            {{-- <a href="{{ route('instructor_add_course_lession', 1) }}" class="btn btn-secondary dashboard_btn_lg text-uppercase">Add course lession</a> --}}
        </div>
    </div>
</div>
