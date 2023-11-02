@extends('front.layouts.app')
@section('content')  
<style>
     .customSwalBtn{
		background-color: #ff1648;
    border-left-color: rgba(214,130,47,1.00);
    border-right-color: rgba(214,130,47,1.00);
    border: 0;
    border-radius:2.25rem;
    box-shadow: none;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    font-weight: 500;
    margin: 0px 5px 0px 5px;
    padding: 10px 32px;

	}

    .customSwalBtn:hover{
        color:#fff;
    }

    .review-form-block-1 {
        /* border: 1px solid #f1f1f1; */
        padding: 18px;
        background-color: #f9f9f9;
        border-radius: 24px;
    }
    .maz__instructor-rating-box{
        border: none !important;
    }
    .maz__common_background_banner.maz__instructor_detail_banner{
        padding-bottom: 0.375rem !important;
        background-color: #ffffff !important;
    }
    .maz__common_background_banner .maz__common-bg-content h1, .maz__common_background_banner .maz__common-bg-content .h1{
        color: #000 !important;
    }
    .col-md-6.inst_review.maz__titl-block.align-items-center {
        margin: 12px 0px;
    }
    .col-md-6.inst_review.maz__titl-block.align-items-center a{   
        font-size: 20px;
        color: #606060;
        text-decoration: underline;
        font-weight: 100;
    }
    .instructor-detail-body .maz__sections {
        padding: 12px 0px 50px 0px !important;
    }
    .instructor-detail-body .review-form-block-wrapper .btn-add-review{
        height:auto !important;
    }
    .btn-lg {
        padding: 0.25rem 0.25rem !important;
    }
    button.btn.btn-primary.btn-lg.fw-bold.btn-add-review.font-title {
        border-radius: 12px;
    }
    .Play-btn {
        position: absolute;
        top: 52%;
        left: 43%;
        color: #f0f8ff;
    }
    .instructor-detail-body .review-form-block-wrapper .review-form-block-2{
        padding-top: 0px !important
    }

    /* @media (min-width: 992px)
    {
        .categories_swiper__slider-block .maz__swiper_btn-prev {
            left: -42px!important;
        }

        .categories_swiper__slider-block .maz__swiper_btn-next {
            right: -46px !important;
        }
    } */

    


    

    @media (min-width: 768px)
    {
        .maz__disciplines_background_banner .swiper-slider-ex {
        padding: 0 15px !important;
        }
    }
    @media (min-width: 576px){
        .maz__disciplines_background_banner .swiper-slider-ex .swiper-slider-ex-inn .maz__swiper__banner-btn-next {
            right: -63px !important;
        }
        .maz__disciplines_background_banner .swiper-slider-ex .swiper-slider-ex-inn .maz__swiper__banner-btn-prev {
            left: -63px !important;
        }
    }
    /* @media only screen and (max-width: 575px){
        .maz__disciplines_background_banner .swiper-slider-ex .swiper-slider-ex-inn .maz__swiper__banner-btn-next {
            
            display:none;
        }
        .maz__disciplines_background_banner .swiper-slider-ex .swiper-slider-ex-inn .maz__swiper__banner-btn-prev {
            
            display:none;
        }
    } */
    .main {
    width: 50%;
    margin: 50px auto;
    }

    /* Bootstrap 4 text input with search icon */

    .has-search .form-control {
        padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }

    @media only screen and (max-width:990px){
        .swiper-3d, .swiper-3d.swiper-css-mode .swiper-wrapper {
            perspective: 735px !important;
        }
    }

    @media only screen and (max-width:767px){
    .swiper-button-prev.maz__swiper_btn-prev{
        left:-50px !important;
    }
    .swiper-3d, .swiper-3d.swiper-css-mode .swiper-wrapper {
        perspective: 1308px !important;
    }
    img.lazy.lazy-arrow.md-fade {
        opacity: 20% !important;
        /* width: 100%; */
    }
    }

    @media only screen and (max-width:500px){
        .swiper-3d, .swiper-3d.swiper-css-mode .swiper-wrapper {
        perspective: 1850px !important;
    }
    @media only screen and (max-width:550px){
        .swiper-button-prev.maz__swiper_btn-prev{
            margin-left:50px !important;
    }
        .swiper-button-next.maz__swiper_btn-next{
            margin-right:0px !important; 
    }
    }

    }
    @media (max-width:1200px){
        .swiper-button-next.maz__swiper_btn-next {
            right: -30px;
        }
        .swiper-button-prev.maz__swiper_btn-prev {
            left: -30px;
        }
    }
    .maz__disciplines_background_banner .swiper-slider-ex .disiciplines-banner-swiper{
        padding-top: 2rem !important;
        padding-bottom: 0rem !important;
       
    }
     
    .maz__disciplines_background_banner::before {
        min-height: 140px !important;
    }
    .maz__disciplines_background_banner .swiper-slider-ex .disiciplines-banner-swiper .swiper-slide{
        filter: contrast(0.30);
    }
    .maz__disciplines_background_banner .swiper-slider-ex .disiciplines-banner-swiper .swiper-slide-active{
        filter: none;
    }
    .category-swiper-button-next.swiper-button-next.maz__swiper_btn-next {
        top: 45%;
    }
    .category-swiper-button-prev.swiper-button-prev.maz__swiper_btn-prev {
        top: 45%;
    }
    .logo-background {
        position: absolute;
        width: 46px;
        height: 30px;
        background-color: #60605e;
        top: 76%;
        left: 82%;
        border-radius: 50%;
    }
    img.reward-logo {
        width: 36px;
        margin-left: 5px;
        margin-top: -2px;
    }
    /* span.review-summ.text-dark {
        margin-left: 280px;
    } */

    .maz__swiper_block_discipline-content.pb-2 {
        min-height: 78px !important;
        width:87%;
    }
    .maz__swiper_block_discipline-content.pb-2 h6 {
        font-weight: 600;
        font-size: 16px !important;
        
    }
    .maz__swiper_block_discipline-content.pb-2 h6:nth-child(2){
        margin-bottom:0;
    }


    #rating { font-size: 0; }
    #rating span { font-size: 40px; }
    #rating span::before { content: "☆"; }
    #rating span.active::before {content: "★"; }
    #rating span:hover { cursor: pointer; }
    #rating {
        color: #ffcc34;
    }
    .fa-star:before {
        color: #ffcc34; 
        font-size:24px;
    }
    .swiper__main_blocks h2 {
        font-weight: 600 !important;
    }

    .d-flex.align-items-center {
        line-height: 30px;
    }

    .pagination
    {
        float : right;
    }

    input:focus::placeholder {
        color: transparent;
    }

    textarea:focus::placeholder {
        color: transparent;
      }

      .maz__swiper_slider_common_block .maz__swiper_block_discipline-img img {
    width: 100%;
    min-height: 155px !important;
    height: 155px !important;
}

@media (min-width: 320px){
    .category-swiper-button-next.swiper-button-next.maz__swiper_btn-next {
        top: 44%;
    }
    
    .swiper-button-next.maz__swiper_btn-next {
        right: -2px;
    }

    .category-swiper-button-prev.swiper-button-prev.maz__swiper_btn-prev {
        top: 43%;
    }

    .swiper-button-prev.maz__swiper_btn-prev {
        left: -42px;
    }
}

@media (min-width: 375px){
    .maz__swiper_slider_common_block .maz__swiper_block_discipline-img img {
        width: 100%;
        min-height: 155px !important;
        height: 197px !important;
        object-fit: cover !important;
    }
}

@media (min-width: 425px){
    .maz__swiper_slider_common_block .maz__swiper_block_discipline-img img {
        width: 100%;
        min-height: 155px !important;
        height: 218px !important;
        object-fit: cover !important;
    }

    .category-swiper-button-next.swiper-button-next.maz__swiper_btn-next {
        top: 44%;
    }
    
    .swiper-button-next.maz__swiper_btn-next {
        right: -2px;
    }

    .category-swiper-button-prev.swiper-button-prev.maz__swiper_btn-prev {
        top: 43%;
    }

    .swiper-button-prev.maz__swiper_btn-prev {
        left: -42px;
    }
}

@media (min-width: 768px){
    .maz__swiper_slider_common_block .maz__swiper_block_discipline-img img {
        width: 100%;
        min-height: 155px !important;
        height: 197px !important;
        object-fit: cover !important;
    }

    .category-swiper-button-next.swiper-button-next.maz__swiper_btn-next {
        top: 43%;
    }

    .swiper-button-next.maz__swiper_btn-next {
        right: 3px;
    }

    .category-swiper-button-prev.swiper-button-prev.maz__swiper_btn-prev {
        top: 43%;
    }

    .swiper-button-prev.maz__swiper_btn-prev {
        left: -42px;
    }
}

@media (min-width: 1024px){
    .maz__swiper_slider_common_block .maz__swiper_block_discipline-img img {
        width: 100%;
        min-height: 155px !important;
        height: 182px !important;
        object-fit: cover !important;
    }

    .category-swiper-button-next.swiper-button-next.maz__swiper_btn-next {
        top: 43%;
    }

    .swiper-button-next.maz__swiper_btn-next {
        right: -44px;
    }

    .category-swiper-button-prev.swiper-button-prev.maz__swiper_btn-prev {
        top: 43%;
    }

    .swiper-button-prev.maz__swiper_btn-prev {
        left: -42px;
    }
}

@media (min-width: 1250px){
    .category-swiper-button-next.swiper-button-next.maz__swiper_btn-next {
        top: 42%;
    }

    .swiper-button-next.maz__swiper_btn-next {
        right: -58px;
    }

    .category-swiper-button-prev.swiper-button-prev.maz__swiper_btn-prev {
        top: 42%;
    }

    .swiper-button-prev.maz__swiper_btn-prev {
        left: -53px;
    }
}

@media (min-width: 1440px){
    .category-swiper-button-next.swiper-button-next.maz__swiper_btn-next {
        top: 43%;
    }

    .swiper-button-next.maz__swiper_btn-next {
        right: -58px;
    }

    .category-swiper-button-prev.swiper-button-prev.maz__swiper_btn-prev {
        top: 43%;
    }

    .swiper-button-prev.maz__swiper_btn-prev {
        left: -56px;
    }
}
</style> 
<input type="hidden" id="instructorId" value="{{ request()->segment(2) }}">


<section class="maz__bg_gray maz__sections">
    <div class="container mt-4 mb-4">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 mb-2">
                <h1 class="our-school">Our Classes</h1>
            </div>
            <div class="col-md-3 mb-2">
                <select class="form-select dropdown-list" id="selInstructorDropdown">
                    <option value="All" {{ ($selIns == 'All') ? 'selected' : '' }}>Filter by Discipline ...</option>
                    @if(count($discplineDropdownData))
                        @foreach($discplineDropdownData as $insdropData)
                            <option value="{{ $insdropData->id }}" {{ ($selIns == $insdropData->id) ? 'selected' : '' }}>{{ ucwords($insdropData->title) }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <select class="form-select dropdown-list" id="level">
                    @if(count($levels))
                        @foreach($levels as $l)
                            @if($l->id == 2)
                                <option value="{{ $l->id }}" {{ ($level == $l->id) ? 'selected' : '' }}>{{ ucwords($l->name) }}</option>
                            @else
                            <option value="{{ $l->id }}" {{ ($level == $l->id) ? 'selected' : '' }}>{{ ucwords($l->name) }} [ Coming Soon ]</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>

    <!-- Dynamic Video Section-->
    @php
        $class_id = 0;
    @endphp
    @if(count($disciplineWiseInstructors))
        @foreach($disciplineWiseInstructors as $key => $discipline)
            <div class="categories_swiper__slider-block">
                <div class="container">
                    <div class="swiper__main_blocks">
                        <h2 class="mb-3 mb-md-0">{{ $discipline['discipline_name'] }}</h2>
                        <hr>
                        <div class="swiper bronze_videos{{ $class_id }} mt-4">
                            <div class="swiper-wrapper bronze_videos1">
                            @auth
                                @if(Auth::user()->subscription_id != 1 && Auth::user()->payment_status == 1 && $isDisputedUser != "Disputed")
                                    @if(count($discipline['instructorData']))
                                        @foreach($discipline['instructorData'] as $insFreeData)
                                        <div class="swiper-slide">
                                            <a href="{{ route('ourClassDetail',  $insFreeData['id']) }}">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                        @if($insFreeData['profile'])
                                                        <img src="{{ $insFreeData['profile'] }}"  alt="{{ $insFreeData['class_name'] }}">
                                                        @else
                                                        <img src="{{ asset('assets/front/images/avtar.png') }}"  alt="{{ $insFreeData['class_name'] }}">
                                                        @endif
                                                        <!-- <div class="Play-btn">
                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                        </div> -->
                                                        {{--<div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insBronzeData['video_duration'])->format('i:s'); }}</div>--}}
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600;">{{ $insFreeData['class_name'] }}</h6>
                                                        <!-- <div class="logo-background">
                                                            <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </a>    
                                        </div>
                                        @endforeach
                                    @endif
                                @else
                                    @if(count($discipline['instructorData']))
                                        @foreach($discipline['instructorData'] as $insFreeData)
                                        <div class="swiper-slide">
                                            <a href="javascript::void(0)" onclick="upgradePlanModal()">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                        @if($insFreeData['profile'])
                                                        <img src="{{ $insFreeData['profile'] }}"  alt="{{ $insFreeData['class_name'] }}">
                                                        @else
                                                        <img src="{{ asset('assets/front/images/avtar.png') }}"  alt="{{ $insFreeData['class_name'] }}">
                                                        @endif
                                                        <!-- <div class="Play-btn">
                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                        </div> -->
                                                        {{--<div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insBronzeData['video_duration'])->format('i:s'); }}</div>--}}
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600;">{{ $insFreeData['class_name'] }}</h6>
                                                        <!-- <div class="logo-background">
                                                            <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </a>    
                                        </div>
                                        @endforeach
                                    @endif
                                @endif
                                @php
                                    $free_count = count($discipline['instructorData']);
                                    if($free_count == 0)
                                    {
                                        for($a = 0;$a < 8;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide" >
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 1)
                                    {
                                        for($a = 0;$a < 7;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide" >
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 2)
                                    {
                                        for($a = 0;$a < 6;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide" >
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 3)
                                    {
                                        for($a = 0;$a < 5;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide" >
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 4)
                                    {
                                        for($a = 0;$a < 4;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide" >
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 5)
                                    {
                                        for($a = 0;$a < 3;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide" >
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 6)
                                    {
                                        for($a = 0;$a < 2;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide" >
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 7)
                                    {
                                        for($a = 0;$a < 1;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide" >
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }
                                @endphp
                            @else
                                @if(count($discipline['instructorData']))
                                    @foreach($discipline['instructorData'] as $insFreeData)
                                    <div class="swiper-slide">
                                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if($insFreeData['profile'])
                                                    <img src="{{ $insFreeData['profile'] }}"  alt="{{ $insFreeData['class_name'] }}">
                                                    @else
                                                    <img src="{{ asset('assets/front/images/avtar.png') }}"  alt="{{ $insFreeData['class_name'] }}">
                                                    @endif
                                                    <!-- <div class="Play-btn">
                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                    </div> -->
                                                    {{--<div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insBronzeData['video_duration'])->format('i:s'); }}</div>--}}
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600;">{{ $insFreeData['class_name'] }}</h6>
                                                    <!-- <div class="logo-background">
                                                        <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                    </div> -->
                                                </div>
                                            </div>
                                        </a>    
                                    </div>
                                    @endforeach
                                @endif
                                @php
                                    $free_count = count($discipline['instructorData']);
                                    if($free_count == 0)
                                    {
                                        for($a = 0;$a < 8;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 1)
                                    {
                                        for($a = 0;$a < 7;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 2)
                                    {
                                        for($a = 0;$a < 6;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 3)
                                    {
                                        for($a = 0;$a < 5;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 4)
                                    {
                                        for($a = 0;$a < 4;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 5)
                                    {
                                        for($a = 0;$a < 3;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 6)
                                    {
                                        for($a = 0;$a < 2;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }

                                    if($free_count == 7)
                                    {
                                        for($a = 0;$a < 1;$a++)
                                        {
                                            @endphp
                                                <div class="swiper-slide" >
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        @if(isset($discipline['video_coming_soon_image']) && !empty($discipline['video_coming_soon_image']))
                                                            <img src="{{ $discipline['video_coming_soon_image'] }}"  alt="">
                                                        @else
                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        @endif
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                        }
                                    }
                                @endphp
                            @endauth
                            </div>
                        </div>
                        {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                    
                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                        
                        </div>
                        <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                        </div> --}}
                        <div class="category-swiper-button-next-{{$class_id}} swiper-button-next maz__swiper_btn-next">
                            <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                        </div>
                        <div class="category-swiper-button-prev-{{$class_id}} swiper-button-prev maz__swiper_btn-prev">
                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                        </div>
                    </div>
                </div>
            </div>
            @php
                $class_id++;
            @endphp
        @endforeach
    @endif                  
    <!-- End Dynamic Video Section-->                               
    
    @if($selIns == "All")
    <div class="container">
        {{ $disciplineWiseInstructors->links() }}
    </div>
    @endif
</section>
@endsection

@push('scripts')
    <script>
        $("body").addClass('instructor-detail-body');

        function redirectto()
        {
            window.location.href = "{{ route('student.login') }}";
        }
    </script>
    <script>
        var selected = $("#selectedTileId").val();

        var firstSlide = selected - 1;

        // if(selected == 1)
        // {
        //     firstSlide = 0;
        // }
        // if(selected == 2)
        // {
        //     firstSlide = 1;
        // }
        // if(selected == 3)
        // {
        //     firstSlide = 2;
        // }
        // if(selected == 4)
        // {
        //     firstSlide = 3;
        // }
        // if(selected == 5)
        // {
        //     firstSlide = 4;
        // }
        // if(selected == 6)
        // {
        //     firstSlide = 5;
        // }
        // if(selected == 7)
        // {
        //     firstSlide = 6;
        // }
        // if(selected == 8)
        // {
        //     firstSlide = 7;
        // }
        // if(selected == 9)
        // {
        //     firstSlide = 8;
        // }
        // if(selected == 19)
        // {
        //     firstSlide = 9;
        // }
        // if(selected == 11)
        // {
        //     firstSlide = 10;
        // }
        // if(selected == 10)
        // {
        //     firstSlide = 11;
        // }
        // if(selected == 13)
        // {
        //     firstSlide = 12;
        // }
        // if(selected == 14)
        // {
        //     firstSlide = 13;
        // }
        // if(selected == 12)
        // {
        //     firstSlide = 14;
        // }
        // if(selected == 16)
        // {
        //     firstSlide = 15;
        // }
        // if(selected == 17)
        // {
        //     firstSlide = 16;
        // }
        // if(selected == 18)
        // {
        //     firstSlide = 17;
        // }

        var mySwiper = new Swiper ('#main-carousel', {
            // enable accessibility
            a11y: true,
            keyboardControl: true,

            // pagination dots
            pagination: '.swiper-pagination',

            // navigation arrows
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',

            // adapt height to each slide
            autoHeight: true
        })

        var swiperDisicipline = new Swiper(".disiciplines-banner-swiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            centeredSlidesBounds: true,
            initialSlide:firstSlide,
            slidesPerView: 2,
            loop: true,
            coverflowEffect: {
                rotate: 0,
                // stretch: 45,
                stretch: 150,
                // depth: 330,
                depth: 220,
                modifier: 1,
                slideShadows: true,
            },
            on: {
                init: function() {
                    var currentActiveSlide = JSON.parse($('.swiper-slide-active img').attr('alt'));
                },
            },
            pagination: false,
            breakpoints: {
                500: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },

            },
            navigation: {
                nextEl: ".discipline-swiper-button-next",
                prevEl: ".discipline-swiper-button-prev",
            },
        });
        swiperDisicipline.on('slideChangeTransitionStart', function() {
           
            var currentActiveSlide = JSON.parse($('.swiper-slide-active img').attr('alt'));
            var disciplineSequence = currentActiveSlide.desktop_sequence;
            
            $(".schools_and_instructors1").empty();
            $(".free_videos1").empty();
            $(".bronze_videos1").empty();
            $(".silver_videos1").empty();
            $(".gold_videos1").empty();

            $.ajax({
                    url:"{{route('getInstructorsOfCurrrentDiscipline')}}",
                    type: 'post',
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        disciplineSequence: disciplineSequence
                    },
                    success: function( data ) {
                       
                        var result1 = JSON.stringify(data);
                        var result = JSON.parse(result1);

                     

                        
                    }
            });

            $("#swiperImageTitle").text(currentActiveSlide.title);
            $("#swiperImageDescription").text(currentActiveSlide.description);
        });


        var free_videos = new Swiper(".free_videos, .schools_and_instructors, .recommended_for_you, .bronze_videos, .silver_videos, .gold_videos", {
            breakpoints: {
                500: {
                    slidesPerView: 2,
                    spaceBetween: 8,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 8,
                },
                1250: {
                    slidesPerView: 4,
                    spaceBetween: 8,
                },

            },
            
        });
    </script>
    <script>
        $(function() {
            if(screen.width >= 1600)
            {
                $(".swiper-button-next").removeClass("swiper-button-disabled");
            }
          
            // Instructor Search Dropdown Filter
            $("#selInstructorDropdown").change(function() {
                if($(this).val() != 'All') {
                    var level = $("#level").val();

                    var baseURL = '{{ url("/") }}';
                    window.location.href = baseURL + '/our-classes?selIns='+ $(this).val()+'&level='+level;
                } else {
                    window.location.href = '{{ url("our-classes") }}';
                }
            });

            // Instructor Search Dropdown Filter By level
             $("#level").change(function() {
                if($(this).val() != '') {
                    var discipline = $("#selInstructorDropdown").val();

                    var baseURL = '{{ url("/") }}';
                    window.location.href = baseURL + '/our-classes?selIns='+ discipline+'&level='+$(this).val();
                } else {
                    window.location.href = '{{ url("our-classes") }}';
                }
            });
        });

        function loginSignupModal()
        {
            var currentDiscipline = $("#currentDisciplineId").val();

            var currentDisciplineId = 'lastPage=our-classes?selIns=All&level=2';

            var url = '{{ route("student.login",":id") }}';


            url = url.replace(':id',currentDisciplineId);

            Swal.fire({
            title: '<h5>Please log in or sign up to gain access </h5>',
            iconHtml: '<img src="{{ asset('images/infoIcon1.png') }}">',
            //icon: 'info',
            html:
            '<a type="button" style="outline:none !important;" href="'+ url +'" class="customSwalBtn">' + 'Log In' + '</a>' +
            '<a type="button" style="outline:none !important;" href="{{ route('softRegister',['type'=>'free']) }}" class="customSwalBtn">' + 'Sign Up' + '</a>',
            showCancelButton: false,
            showConfirmButton: false,


            })

            $(".swal2-modal h5").css('font-size', '1rem');
            $(".swal2-modal img").css('height', '67px');
            $(".swal2-modal").css('border-radius', '15px');
            $(".swal2-modal").css('height', 'auto');
            $(".swal2-modal").css('background', 'auto');
            $(".swal2-modal").css('width', 'auto');
            $(".swal2-icon").css('height', '3rem');
            $(".swal2-icon").css('width', '3rem');
            $(".swal2-icon .swal2-icon-content").css('font-size', '1.75rem');
            $(".swal2-close").css('font-size', '2.0em');
            $(".swal2-icon").css('border-color', '#ff1648');
            $(".swal2-icon").css('color', '#ff1648');
        }

        function upgradePlanModal()
        {
            Swal.fire({
            title: '<h5> Upgrade to Bronze plan to view content </h5>',
            iconHtml: '<img src="{{ asset('images/infoIcon1.png') }}">',
            // icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'

            }).then((result) => {
                if (result.value) {
                    var currentDiscipline = $("#currentDisciplineId").val();

                    var currentDisciplineId = 'lastPage=our-classes?selIns=All&level=2';

                    var url = '{{ route("bronzePlanStripe",":id") }}';

                    url = url.replace(':id',currentDisciplineId);
            
                     window.location.href = url;
                }
            });

            $(".swal2-modal h5").css('font-size', '1rem');
            $(".swal2-modal img").css('height', '67px');
            $(".swal2-modal").css('border-radius', '15px');
            $(".swal2-modal").css('height', 'auto');
            $(".swal2-modal").css('background', 'auto');
            $(".swal2-modal").css('width', 'auto');
            $(".swal2-icon").css('height', '3rem');
            $(".swal2-icon").css('width', '3rem');
            $(".swal2-icon .swal2-icon-content").css('font-size', '1.75rem');
            $(".swal2-close").css('font-size', '2.0em');
            $(".swal2-icon").css('border-color', '#ff1648');
            $(".swal2-icon").css('color', '#ff1648');
            $(".swal2-confirm").css('background-color', '#ff1648');
            $(".swal2-confirm").css('border-radius', '2.25rem');
            $(".swal2-confirm").css('width', '5rem');
            $(".swal2-cancel").css('background-color', '#ff1648');
            $(".swal2-cancel").css('border-radius', '2.25rem');
            $(".swal2-cancel").css('width', '5rem');
    
        }

        function registerModal()
        {
            Swal.fire({
            title: '<h5>Register to be a certified instructor<h5>',
            text: 'So we can stay in touch',
            html:'<select class="form-control mb-2" name="topic" id="topic"><option value="">Select Topic </option><option value="1">Student Related Topic</option><option value="2">Instructor Related Topic</option><option value="3">Other Topic</option></select><input type="email" name="email" id="instructor_email" class="form-control" id="staticEmail" placeholder="email@example.com" onfocus="this.placeholder = " onblur="this.placeholder = "email@example.com"" required=""><textarea id="instructor_message" name="message" class="form-control mt-2" id="" cols="30" rows="5" placeholder="Message" onfocus="this.placeholder = """ onblur="this.placeholder = "Message"" required=""></textarea>',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Submit',
            cancelButtonText: 'No',
            preConfirm: () => {
                const topic = Swal.getPopup().querySelector('#topic').value;
                const email = Swal.getPopup().querySelector('#instructor_email').value;
                const message = Swal.getPopup().querySelector('#instructor_message').value;
                if (!topic || !email || !message) {
                    Swal.showValidationMessage(`Please select topic, enter your email and message`)
                }
                return { topic: topic, email: email, message: message }
            },
           
            }).then((result) => {
                if (result.value) {
                    var topic = result.value.topic;
                    var instructorEmail = result.value.email;
                    var instructorMessage = result.value.message;

                    $.ajax({
                            url:"{{route('contactUsForm1')}}",
                            type: 'post',
                            dataType: "json",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            data: {
                                topic:topic,email: instructorEmail,message:instructorMessage
                            },
                            success: function( data ) {
                                toastr.success(data.message);     
                            }
                    });
                }
            });

            $(".swal2-modal h5").css('font-size', '1.5rem');
            $(".swal2-modal").css('border-radius', '15px');
            $(".swal2-modal").css('height', 'auto');
            $(".swal2-modal").css('background', 'auto');
            $(".swal2-modal").css('width', 'auto');
            $(".swal2-icon").css('height', '3rem');
            $(".swal2-icon").css('width', '3rem');
            $(".swal2-icon .swal2-icon-content").css('font-size', '1.75rem');
            $(".swal2-close").css('font-size', '2.0em');
            $(".swal2-icon").css('border-color', '#ff1648');
            $(".swal2-icon").css('color', '#ff1648');
            $(".swal2-confirm").css('background-color', '#ff1648');
            $(".swal2-confirm").css('border-radius', '2.25rem');
            $(".swal2-confirm").css('width', '5.5rem');
            $(".swal2-cancel").css('background-color', '#ff1648');
            $(".swal2-cancel").css('border-radius', '2.25rem');
            $(".swal2-cancel").css('width', '5rem');
            $(".swal2-input").css('width', '80%');
            $(".swal2-input").css('height', '30%');

        }

        total_levels = parseInt("{{ count($disciplineWiseInstructors) }}");
        for(j=0;j< total_levels; j++){
            var swiper2 = new Swiper(".swiper.bronze_videos"+j, {
                slidesPerView: 1,
                spaceBetween: 20,
                cssMode: true,
                navigation: {
                    nextEl: ".category-swiper-button-next-"+j,
                    prevEl: ".category-swiper-button-prev-"+j,
                },
                lazy: {
                    loadPrevNext: true,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 24,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 24,
                    },
                    1440: {
                        slidesPerView: 4,
                    },
                },
            });
        }
    </script>
@endpush
