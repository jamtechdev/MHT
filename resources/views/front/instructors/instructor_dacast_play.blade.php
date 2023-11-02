@extends('front.layouts.app')
@section('content')
{{-- Include Wistia Css --}}
<link rel="stylesheet" href="//fast.wistia.com/assets/external/uploader.css" />
<script src="https://player.dacast.com/js/player.js?{{ $video['asset_id'] }}"></script>

<style>
    p.dacast-title {
        font-weight: bold;
        font-size: x-large;
    }
    p.dacast-description {
        font-size: medium;
        text-indent: 30px;
    }
</style>

{{-- Include Instructor Complete Profile Header --}}
@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="dashboard_titles">Video : {{ $video['title'] }}</h4>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('dacastVideoAPI') }}">Video List</a>
                    </div>
                </div>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div id="myDiv"></div>
                        <p class="dacast-title font-title my-2">{{ $video['title'] }}</p>
                        <p class="dacast-description">{{ $video['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
{{-- <script src="//fast.wistia.com/assets/external/api.js" async></script> --}}
<script>
    window.addEventListener("load", function(){
        var CONTENT_ID = "{{ $video['asset_id'] }}"
        var myPlayer = dacast(CONTENT_ID, 'myDiv', { 
            width: 800, 
            height: 600,
            // player: "flow7"
        });
    });

</script>
@endpush