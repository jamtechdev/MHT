@extends('front.layouts.app')

@section('content')

@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="dashboard_titles mt-1">My Profile</h4>
                    <a href="{{ route('instructor_profile_edit', $instructorProfileData['id']) }}" class="btn btn-secondary dashboard_btn_lg text-uppercase mb-3">Edit Profile</a>
                </div>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                            <h6 class="text-uppercase mb-2 fs-18">Personal Info</h6>
                            <hr>
                            <div class="personal_info__table">
                                <div class="profile__details"><label class="info_title">Name :</label>
                                    <p>{{ $instructorProfileData['name'] }}</p>
                                </div>
                                <div class="profile__details"><label class="info_title">Email :</label>
                                    <p>{{ $instructorProfileData['email'] }}</p>
                                </div>
                                <div class="profile__details"><label class="info_title">Phone :</label>
                                    <p>{{ $instructorProfileData['phone'] }}</p>
                                </div>
                                <div class="profile__details"><label class="info_title"> School Name :</label>
                                    <p>{{ $instructorProfileData['school_name'] }}</p>
                                </div>
                                <div class="profile__details"><label class="info_title">Native Language :</label>
                                    <p>{{ $instructorProfileData['native_language'] }}</p>
                                </div>
                                <div class="profile__details"><label class="info_title">Teaching Experience :</label>
                                    <p>{{ $instructorProfileData['teaching_experience']}}</p>
                                </div>
                            </div>
                            <h6 class="text-uppercase mb-2 fs-18">Address Info</h6>
                            <hr>
                            <div class="personal_info__table">
                                <div class="profile__details">
                                    <label class="info_title">Address :</label>
                                    <p>{{ $instructorProfileData['address'] }}</p>
                                </div>
                                <div class="profile__details">
                                    <label class="info_title">City :</label>
                                    <p>{{ $instructorProfileData['city'] }}</p>
                                </div>
                                <div class="profile__details">
                                    <label class="info_title">State :</label>
                                    <p>{{ $instructorProfileData['state'] }}</p>
                                </div>
                                <div class="profile__details">
                                    <label class="info_title">Zip :</label>
                                    <p>{{ $instructorProfileData['zip'] }}</p>
                                </div>
                                <div class="profile__details">
                                    <label class="info_title">Country :</label>
                                    <p>{{ $instructorProfileData['country'] }}</p>
                                </div>
                            </div>
                            <h6 class="text-uppercase mb-2 fs-18">Certificate & Banner</h6>
                            <hr>
                            <div class="personal_info__table">
                                <img class="m-2" src="{{ $instructorProfileData['certificate'] }}" width="200">
                                <img class="m-2" src="{{ $instructorProfileData['banner'] }}" width="200">
                                {{-- <img src="{{ Storage::url($instructorProfileData['certificate']) }}" width="200"> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
