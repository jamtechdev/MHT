<!-- maz alert -->
@if(Auth::user()->firstname == '' || Auth::user()->lastname == '' || Auth::user()->profile_picture == '')
<div class="maz__complete_profile-warning">
    <div class="maz__alert-box">
        <div class="maz__dashboard-container maz__alert-content" role="alert">
            <div class="image">
                <img data-src="{{ asset('assets/front/images/alert.png') }}" class="lazy" alt="warning">
            </div>
            <div class="content">
                <h4>Complete Your Profile</h4>
                <p class="mb-0">Complete your profile so people can know more about you! Go to Profile <a href="{{ route('student_profile_edit') }}" class="maz__text-blue">Settings</a></p>
            </div>
        </div>
    </div>
    <div class="maz__complete-progress maz__dashboard-container">
        <div class="row">
            @if(Auth::user()->firstname != '' && Auth::user()->lastname == '' && Auth::user()->profile_picture == '')
            <div class="col-xl-4">
                <p>33% Complete, You are almost done!</p>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            @elseif((Auth::user()->firstname != '' && Auth::user()->lastname == '' && Auth::user()->profile_picture != ''))
            <div class="col-xl-4">
                <p>67% Complete, You are almost done!</p>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            @elseif((Auth::user()->firstname != '' && Auth::user()->lastname != '' && Auth::user()->profile_picture == ''))
            <div class="col-xl-4">
                <p>67% Complete, You are almost done!</p>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            @elseif(Auth::user()->firstname != '' && Auth::user()->lastname != '' && Auth::user()->profile_picture != '')
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
                @if(Auth::user()->firstname != '' && Auth::user()->lastname == '' && Auth::user()->profile_picture == '')
                    <li>Set Your <b>Last Name</b></li>
                    <li>Set Your <b>Profile Photo</b></li>
                @elseif((Auth::user()->firstname == '' && Auth::user()->lastname != '' && Auth::user()->profile_picture != ''))
                    <li>Set Your <b>First Name</b></li>
                @elseif((Auth::user()->firstname != '' && Auth::user()->lastname == '' && Auth::user()->profile_picture != ''))
                    <li>Set Your <b>Last Name</b></li>
                @elseif((Auth::user()->firstname != '' && Auth::user()->lastname != '' && Auth::user()->profile_picture == ''))
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
            @if(Auth::user()->profile_picture != '')
                {{-- <img data-src="{{ Storage::url(Auth::user()->profile_picture) }}" class="lazy" alt="profile-picture"> --}}
                <img src="{{asset('students_profile_pictures')}}/{{Auth::user()->profile_picture}}"  alt="Profile-Picture" width="150">
            @else
                <img src="{{ asset('assets/front/images/avatar.png') }}" alt="profile-picture">
            @endif
        </div>
        <div class="profile-details">
            <div class="desc">
                <h3>{{ Auth::user()->name }}</h3>
                <div class="star-rating">
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                    <span class="ms-2">0 (0 Ratings)</span>
                </div>
           </div>
           {{-- <a href="#" class="btn btn-secondary dashboard_btn text-uppercase">Become an Instructor</a> --}}
        </div>
    </div>
</div>