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
                <div class="text-end py-2">
                    <a href="{{ route('instructor_biography') }}" class="btn btn-dark shadow" id="addBiographyButton">Back</a>
                </div>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <iframe
                            src="https://player.vdocipher.com/v2/?otp={{ $response['otp'] }}&playbackInfo={{ $response['playbackInfo'] }}"
                            style="border:5px outset rgba(0,0,0,0.175);width:100%;height:500px"
                            allow="encrypted-media"
                            allowfullscreen
                        ></iframe>
                        <p>
                            <h5>{{ $video->title }}</h5>
                            <small>
                                {{ ucfirst($video->description) }}
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
