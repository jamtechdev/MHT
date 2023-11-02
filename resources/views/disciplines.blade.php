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
        top: 42%;
    }
    .category-swiper-button-prev.swiper-button-prev.maz__swiper_btn-prev {
        top: 42%;
    }

    .logo-background {
        position: absolute;
        width: 46px;
        height: 30px;
        background-color: #60605e;
        top: 65%;
        left: 82%;
        border-radius: 50%;
    }
    img.reward-logo {
        width: 36px;
        margin-left: 5px;
        margin-top: -2px;
    }
    

    .maz__swiper_block_discipline-content.pb-2 {
        min-height: 89px;
        /* width:87%; */
    }
    .maz__swiper_block_discipline-content.pb-2 h6 {
        font-weight: 100;
        font-size: 16px;
        
    }
    .maz__swiper_block_discipline-content.pb-2 h6:nth-child(2){
        margin-bottom:0;
    }
    
    .maz__swiper_slider_common_block .maz__swiper_block_discipline-img img {
        width: 100%;
        min-height: 155px !important;
        /* height: 155px !important; */
        height: 192px !important;
        object-fit: cover !important;
    }

    .maz__swiper_slider_common_block1 {
        background-color: #fff;
        box-shadow: 0px 2px 30px rgba(50, 53, 61, 0.2);
        cursor: pointer;
        border-radius: 6px;
        margin-bottom: 1.5rem;
    }

    .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img {
        position: relative;
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
    }

    .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img img {
        width: 100%;
        min-height: 240px;
        height: 240px;
        /* object-fit: cover; */
        /* -o-object-fit: cover;
        object-fit: cover;
        border-top-left-radius: 6px;
        border-top-right-radius: 6px; */
    }

    .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img::after {
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* background: rgba(0, 0, 0, 0.25); */
        /* border-top-left-radius: 6px;
        border-top-right-radius: 6px; */
        z-index: 1;
        }

        .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img .badge-dark-video-time {
        position: absolute;
        bottom: 10px;
        background: rgba(0, 0, 0, 0.6);
        border-radius: 4px;
        padding: 0.25rem 0.75rem;
        font-size: 0.875rem;
        color: #fff;
        font-weight: 600;
        z-index: 2;
        right: 10px;
        }

        .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img.maz__lock-video {
        overflow: hidden;
        }

        .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img.maz__lock-video img {
        filter: blur(10px);
        }

        .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img.maz__lock-video .maz__lock-block {
        position: absolute;
        z-index: 3;
        width: 50px;
        height: 50px;
        background-color: rgba(255, 22, 72, 0.8);
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        border-radius: 50%;
        }

        .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-content {
        padding: 1rem;
        padding-bottom: 0;
        }

        .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-content .maz__swiper__block-title {
        min-height: 53px;
        }

        .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-content .description {
        font-size: 0.875rem;
        min-height: 110px;
        height: 100%;
        }

        .maz__swiper_slider_common_block1 .swiper_block_discipline__profile-box {
        display: flex;
        align-items: center;
        padding: 1rem;
        justify-content: space-between;
        padding-top: 0;
        }

        .maz__swiper_slider_common_block1 .swiper_block_discipline__profile-box .badge-icons {
        padding: 0.5rem;
        display: flex;
        justify-content: space-around;
        align-items: center;
        border: 1px solid #d9d9d9;
        border-radius: 4px;
        min-width: 80px;
        height: 41px;
        }

        .maz__swiper_slider_common_block1 .swiper_block_discipline__profile-box .badge-icons span {
            color: #34353f;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .maz__swiper_slider_common_block1 .logo-background {
            position: absolute;
            width: 46px;
            height: 30px;
            background-color: #60605e;
            top: 74%;
            left: 82%;
            border-radius: 50%;
        }

    @media only screen and (min-width: 1400px) {
        .logo-background {
            position: absolute;
            width: 46px;
            height: 30px;
            background-color: #60605e;
            top: 70%;
            left: 82%;
            border-radius: 50%;
        }

        .maz__swiper_slider_common_block .maz__swiper_block_discipline-img img {
            min-height: 200px !important;
            height: 200px !important;
            /* border: 10px solid black; */
        }

        .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img1 img {
            min-height: 280px !important;
            height: 280px !important;
            /* border: 10px solid black; */
        }

        .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img img {
            width: 100%;
            min-height: 280px;
            height: 280px;
            /* object-fit: cover; */
            /* -o-object-fit: cover;
            object-fit: cover;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px; */
        }
    }


    @media only screen and (min-width: 320px) {
        .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img img {
            /* min-height: 442px;
            height: 442px; */
            min-height: auto;
            height: auto;
            object-fit: cover;
            max-width: 100%;
            max-height: 285px;
            /* border: 10px solid black; */
        }
    }

    @media only screen and (min-width: 350px) {
    .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img img {
        /* min-height: 351px;
        height: 351px; */
        min-height: auto;
        height: auto;
        object-fit: cover;
        max-width: 100%;
        max-height: 350px;
        /* border: 10px solid black; */
    }
    }

    @media only screen and (min-width: 583px) {
    .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img img {
        /* min-height: 254px;
        height: 254px; */
        min-height: auto;
        height: auto;
        object-fit: cover;
        max-width: 100%;
        max-height: 327px;
        /* border: 10px solid black; */
    }
    }

    @media only screen and (min-width: 775px) {
    .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img img {
        /* min-height: 344px;
        height: 344px; */
        min-height: auto;
        height: auto;
        object-fit: cover;
        max-width: 100%;
        max-height: 305px;
        /* border: 10px solid black; */
    }
    }

    @media only screen and (min-width: 1024px) {
    .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img img {
        /* min-height: 307px;
        height: 307px; */
        min-height: auto;
        height: auto;
        object-fit: cover;
        max-width: 100%;
        max-height: 290px;
        /* border: 10px solid black; */
    }
    }

    @media only screen and (min-width: 1240px) {
    .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img img {
        /* min-height: 273px;
        height: 273px; */
        min-height: auto;
        height: auto;
        object-fit: cover;
        max-width: 100%;
        max-height: 271px;
        /* border: 10px solid black; */
    }
    }

    @media only screen and (min-width: 1400px) {
    .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img img {
        /* min-height: 318px;
        height: 318px; */
        min-height: 302px;
        height: 182px;
        object-fit: cover;
        max-width: 100%;
        max-height: 155px;
        /* border: 10px solid black; */
    }
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

        .discipline-swiper-button-next.swiper-button-next.maz__swiper__banner-btn-next {
            top: 50%;
        }

        .discipline-swiper-button-prev.swiper-button-prev.maz__swiper__banner-btn-prev {
            top: 50%;
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
            top: 41%;
        }

        .swiper-button-next.maz__swiper_btn-next {
            right: -44px;
        }

        .category-swiper-button-prev.swiper-button-prev.maz__swiper_btn-prev {
            top: 41%;
        }

        .swiper-button-prev.maz__swiper_btn-prev {
            left: -42px;
        }

        .discipline-swiper-button-next.swiper-button-next.maz__swiper__banner-btn-next {
            top: 51%;
        }

        .discipline-swiper-button-prev.swiper-button-prev.maz__swiper__banner-btn-prev {
            top: 51%;
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

        .discipline-swiper-button-next.swiper-button-next.maz__swiper__banner-btn-next {
            top: 48%;
        }

        .discipline-swiper-button-prev.swiper-button-prev.maz__swiper__banner-btn-prev {
            top: 48%;
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

        .discipline-swiper-button-next.swiper-button-next.maz__swiper__banner-btn-next {
            top: 47%;
        }

        .discipline-swiper-button-prev.swiper-button-prev.maz__swiper__banner-btn-prev {
            top: 47%;
        }
    }
</style>
    {{-- @dd($disciplineImagesData->toArray()) --}}
    {{-- <input type="hidden" id="selectedTileId" value="{{ request()->segment(2) }}"> --}}
    <input type="hidden" id="selectedTileId" value="{{ $disciplineImagesData[0]['display_order'] }}">
    <input type="hidden" id="currentDisciplineId" value="{{ $disciplineImagesData[0]['display_order'] }}">
    <section class="maz__disciplines_background_banner">
        <div class="container swiper-slider-ex">
            <div class="swiper-slider-ex-inn">
                <div class="swiper-container disiciplines-banner-swiper">
                    <div class="swiper-wrapper">
                        @if (count($disciplineImagesData))
                            @foreach ($disciplineImagesData as $dData)
                                <div class="swiper-slide">
                                    @if($dData->is_stored_system == 1)
                                        <img src="{{ asset($dData->photo) }}" class="swiper-images" alt="{{ $dData }}">
                                    @else
                                        <img src="{{ $dData->photo }}" class="swiper-images" alt="{{ $dData }}">
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- Add Navigation -->
                <div class="discipline-swiper-button-next swiper-button-next maz__swiper__banner-btn-next">
                    <img src="{{ asset('assets/front/images/next.png') }}" class="lazy-arrow" alt="arrows">
                </div>
                <div class="discipline-swiper-button-prev swiper-button-prev maz__swiper__banner-btn-prev">
                    <img src="{{ asset('assets/front/images/previous.png') }}" class="lazy-arrow" alt="arrows">
                </div>
            </div>
        </div>
    </section>
    <section class="pb-5 pt-1">
        <div class="container px-5">
            <div>
                <h1 class="text-uppercase diciplin-swiper-slider-title mb-2 text-center" id="swiperImageTitle" style="margin-top:5px; z-index:1000 !important;"></h1>
                {{-- <p id="swiperImageDesc"></p> --}}      
                <div class="container">
                    <p style="margin-left:2px;text-align:justify;" id="swiperImageDescription"></p>
                </div>
            </div>
        </div>
    </section>

    <section class="maz__bg_gray maz__sections">
        <!--Schools and Instructors-->
           
        <div class="categories_swiper__slider-block">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="text-uppercase mb-3 mb-md-0">Schools & Instructors</h2>
                    <hr>
                    <div class="swiper schools_and_instructors mt-4">
                        <div class="swiper-wrapper schools_and_instructors1">
                        @if(count($instructorData))
                            @foreach($instructorData as $insData)
                                <div class="swiper-slide">
                                    <a href="{{ route('schools-and-instructors-detail',['instructorId'=>$insData->id]) }}">   
                                        <div class="maz__swiper_slider_common_block1">
                                            <div class="maz__swiper_block_discipline-img">
                                            @if($insData->photo != '')
                                                <img src="{{ $insData->photo }}"  alt="{{ $insData->name }}">
                                            @else
                                                <img src="{{ asset('assets/front/images/avtar.png') }}" alt="{{ $insData->name }}">
                                            @endif
                                            </div>
                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                <h6 style="font-weight:600;">{{ $insData->name }}</h6>
                                                <h6 style="font-weight:600;">{{ $insData->school_name }}</h6>
                                            </div>
                                            <!-- <div class="logo-background">
                                                <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                            </div> -->
                                        </div>
                                    </a> 
                                </div>
                            @endforeach
                        @endif
                        @php
                            $schools_count = count($instructorData);
                            
                            if($schools_count == 0)
                            {
                                for($j = 0;$j < 8;$j++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                @if(isset($currentDiscipline->main_coming_soon_image) && !empty($currentDiscipline->main_coming_soon_image))
                                                    <img src="{{ $currentDiscipline->main_coming_soon_image }}" alt="">
                                                @else
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}" alt="">
                                                @endif
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @php
                                }
                            }

                            if($schools_count == 1)
                            {
                                for($i = 0;$i < 7;$i++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                 @if(isset($currentDiscipline->main_coming_soon_image) && !empty($currentDiscipline->main_coming_soon_image))
                                                    <img src="{{ $currentDiscipline->main_coming_soon_image }}" alt="">
                                                @else
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}" alt="">
                                                @endif
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @php
                                }
                            }

                            if($schools_count == 2)
                            {
                                for($i = 0;$i < 6;$i++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                     @if(isset($currentDiscipline->main_coming_soon_image) && !empty($currentDiscipline->main_coming_soon_image))
                                                    <img src="{{ $currentDiscipline->main_coming_soon_image }}" alt="">
                                                    @else
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}" alt="">
                                                    @endif
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @php
                                }
                            }

                            if($schools_count == 3)
                            {
                                for($i = 0;$i < 5;$i++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                 @if(isset($currentDiscipline->main_coming_soon_image) && !empty($currentDiscipline->main_coming_soon_image))
                                                    <img src="{{ $currentDiscipline->main_coming_soon_image }}" alt="">
                                                @else
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}" alt="">
                                                @endif
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @php
                                }
                            }

                            if($schools_count == 4)
                            {
                                for($i = 0;$i < 4;$i++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                 @if(isset($currentDiscipline->main_coming_soon_image) && !empty($currentDiscipline->main_coming_soon_image))
                                                    <img src="{{ $currentDiscipline->main_coming_soon_image }}" alt="">
                                                @else
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}" alt="">
                                                @endif
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @php
                                }
                            }

                            if($schools_count == 5)
                            {
                                for($i = 0;$i < 3;$i++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                 @if(isset($currentDiscipline->main_coming_soon_image) && !empty($currentDiscipline->main_coming_soon_image))
                                                    <img src="{{ $currentDiscipline->main_coming_soon_image }}" alt="">
                                                @else
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}" alt="">
                                                @endif
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @php
                                }
                            }

                            if($schools_count == 6)
                            {
                                for($i = 0;$i < 2;$i++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                 @if(isset($currentDiscipline->main_coming_soon_image) && !empty($currentDiscipline->main_coming_soon_image))
                                                    <img src="{{ $currentDiscipline->main_coming_soon_image }}" alt="">
                                                @else
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}" alt="">
                                                @endif
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @php
                                }
                            }
                            
                            if($schools_count == 7)
                            {
                                for($i = 0;$i < 1;$i++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                 @if(isset($currentDiscipline->main_coming_soon_image) && !empty($currentDiscipline->main_coming_soon_image))
                                                    <img src="{{ $currentDiscipline->main_coming_soon_image }}" alt="">
                                                @else
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}" alt="">
                                                @endif
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @php
                                }
                            }
                        @endphp    
                        </div>
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img src="{{ asset('assets/front/images/next.png') }}" alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img src="{{ asset('assets/front/images/previous.png') }}" alt="arrows">
                    </div>
                </div>
            </div>
        </div>
            
        <!-- <div id="video_section">  -->
        <!-- Schools and Instructors end -->


        @auth
            @if(count($levels))
                @foreach($levels as $l)
                    <!--Dynamic Videos-->
                    <div class="categories_swiper__slider-block">
                        <div class="container">
                            <div class="swiper__main_blocks">
                                <h2 class="text-uppercase mb-3 mb-md-0">{{ $l['level_name'] }} Videos</h2>
                                <hr>
                                <div class="swiper free_videos mt-4">
                                    <div class="swiper-wrapper free_videos1" id="video_section_{{ $l['level_id'] }}">
                                        @if($l['level_id'] == 1)
                                            @if(count($l['videoData']))
                                                @foreach($l['videoData'] as $insFreeData)   
                                                    @if($insFreeData['video_id'])
                                                        <div class="swiper-slide">
                                                            <a href="{{ route('playInstructorVideo',['video_id'=>$insFreeData['video_id'] ?? '']) }}">
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                        <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] ?? '' }}">
                                                                        <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                                                    </div>
                                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                                        <h6 style="font-weight:600;">{{ $insFreeData['title'] ?? ''}}</h6>
                                                                        <h6 style="font-weight:600;">{{ $insFreeData['instructor_name'] }}</h6>
                                                                    {{-- <p class="description">{{ $insFreeData['description'] }}</p>--}}
                                                                    </div>
                                                                    <!-- <div class="logo-background">
                                                                        <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                    </div> -->
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <div class="swiper-slide">
                                                                
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                   @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                        <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    </div>
                                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                                        <h6 style="font-weight:600">Coming Soon</h6>
                                                                    </div>
                                                                </div>
                                                            
                                                        </div>
                                                    @endif    
                                                @endforeach
                                            @endif
                                        @else
                                            @if(Auth::user()->subscription_id != 1 && Auth::user()->payment_status == 1 && $isDisputedUser != "Disputed")
                                                @if(count($l['videoData']))
                                                    @foreach($l['videoData'] as $insFreeData)   
                                                        @if($insFreeData['video_id'])
                                                            <div class="swiper-slide">
                                                                <a href="{{ route('playInstructorVideo',['video_id'=>$insFreeData['video_id'] ?? '']) }}">
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                            <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] ?? '' }}">
                                                                            <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                                                        </div>
                                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                                            <h6 style="font-weight:600;">{{ $insFreeData['title'] ?? ''}}</h6>
                                                                            <h6>{{ $insFreeData['instructor_name'] }}</h6>
                                                                        {{-- <p class="description">{{ $insFreeData['description'] }}</p>--}}
                                                                        </div>
                                                                        <!-- <div class="logo-background">
                                                                            <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                        </div> -->
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div class="swiper-slide">
                                                                    
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                       @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                            <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        </div>
                                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                                            <h6 style="font-weight:600">Coming Soon</h6>
                                                                        </div>
                                                                    </div>
                                                                
                                                            </div>
                                                        @endif    
                                                    @endforeach
                                                @endif
                                            @else
                                                @if(count($l['videoData']))
                                                    @foreach($l['videoData'] as $insFreeData)   
                                                        @if($insFreeData['video_id'])
                                                            <div class="swiper-slide">
                                                                <a href="javascript::void(0)" onclick="upgradePlanModal()">
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                            <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] ?? '' }}">
                                                                            <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                                                        </div>
                                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                                            <h6 style="font-weight:600;">{{ $insFreeData['title'] ?? ''}}</h6>
                                                                            <h6 style="font-weight:600;">{{ $insFreeData['instructor_name'] }}</h6>
                                                                        {{-- <p class="description">{{ $insFreeData['description'] }}</p>--}}
                                                                        </div>
                                                                        <!-- <div class="logo-background">
                                                                            <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                        </div> -->
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div class="swiper-slide">
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                   @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                        <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    </div>
                                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                                        <h6 style="font-weight:600">Coming Soon</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif    
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endif

                                        @php
                                            $video_count = count($l['videoData']);
                                    
                                            if($video_count == 0)
                                            {
                                                for($k = 0;$k < 8;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                   @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                        <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    </div>
                                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                                        <h6 style="font-weight:600">Coming Soon</h6>
                                                                    </div>
                                                                </div>
                                                            
                                                        </div>
                                                    @php
                                                }
                                            }

                                            if($video_count == 1)
                                            {
                                                for($k = 0;$k < 7;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }

                                            if($video_count == 2)
                                            {
                                                for($k = 0;$k < 6;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }

                                            if($video_count == 3)
                                            {
                                                for($k = 0;$k < 5;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }

                                            if($video_count == 4)
                                            {
                                                for($k = 0;$k < 4;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }

                                            if($video_count == 5)
                                            {
                                                for($k = 0;$k < 3;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }

                                            if($video_count == 6)
                                            {
                                                for($k = 0;$k < 2;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }

                                            if($video_count == 7)
                                            {
                                                for($k = 0;$k < 1;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }
                                        @endphp  
                                    
                                    </div>
                                </div>

                                @if($l['level_id'] != 1)
                                    @if(Auth::user()->subscription_id != 1 && Auth::user()->payment_status == 1 && $isDisputedUser != "Disputed")
                                        
                                        <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                            <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                        </div>
                                        <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div>
                                    @else
                                        <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                            <img  onclick="upgradePlanModal()" src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                        </div>
                                        <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                            <img  onclick="upgradePlanModal()" src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div>
                                    @endif
                                @else
                                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>
                                @endif    
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dynamic Videos end -->
                @endforeach     
            @endif
        @else 
            @if(count($levels))
                @foreach($levels as $l)
                    <!--Dynamic Videos-->
                    <div class="categories_swiper__slider-block">
                        <div class="container">
                            <div class="swiper__main_blocks">
                                <h2 class="text-uppercase mb-3 mb-md-0">{{ $l['level_name'] }} Videos</h2>
                                <hr>
                                <div class="swiper free_videos mt-4">
                                    <div class="swiper-wrapper free_videos1" id="video_section_{{ $l['level_id'] }}">
                                        @if(count($l['videoData']))
                                            @foreach($l['videoData'] as $insFreeData)   
                                                @if($insFreeData['video_id'])
                                                    <div class="swiper-slide">
                                                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                    {{--<img src="{{ $insFreeData['video_thumbnail'] ?? '' }}"  alt="{{ $insFreeData['title'] ?? '' }}">--}}
                                                                    <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] ?? '' }}">
                                                                    <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">{{ $insFreeData['title'] ?? ''}}</h6>
                                                                    <h6 style="margin-bottom:0;font-weight:600;">{{ $insFreeData['instructor_name'] }}</h6>
                                                                {{-- <p class="description">{{ $insFreeData['description'] }}</p>--}}
                                                                </div>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                </div> -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="swiper-slide">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                           @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            </div>
                                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                                <h6  style="font-weight:600">Coming Soon</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif    
                                            @endforeach
                                        @endif
                                        @php
                                            $video_count = count($l['videoData']);
                                    
                                            if($video_count == 0)
                                            {
                                                for($k = 0;$k < 8;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                   @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                        <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    </div>
                                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                                        <h6  style="font-weight:600">Coming Soon</h6>
                                                                    </div>
                                                                </div>
                                                            
                                                        </div>
                                                    @php
                                                }
                                            }

                                            if($video_count == 1)
                                            {
                                                for($k = 0;$k < 7;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
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

                                            if($video_count == 2)
                                            {
                                                for($k = 0;$k < 6;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
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

                                            if($video_count == 3)
                                            {
                                                for($k = 0;$k < 5;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }
                                            if($video_count == 4)
                                            {
                                                for($k = 0;$k < 4;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }

                                            if($video_count == 5)
                                            {
                                                for($k = 0;$k < 3;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }

                                            if($video_count == 6)
                                            {
                                                for($k = 0;$k < 2;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }

                                            if($video_count == 7)
                                            {
                                                for($k = 0;$k < 1;$k++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                               @if(isset($currentDiscipline->video_coming_soon_image) && !empty($currentDiscipline->video_coming_soon_image))
                                                                    <img src="{{ $currentDiscipline->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @php
                                                }
                                            }
                                        @endphp  
                                    
                                    </div>
                                </div>
                               
                                <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                    <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                </div>
                                <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                    <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dynamic Videos end -->
                @endforeach     
            @endif
            
        @endauth

        
        <!-- </div> -->
        <!--Free Videos-->
        
        {{--<div class="categories_swiper__slider-block">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="text-uppercase mb-3 mb-md-0">Free Videos</h2>
                    <hr>
                    <div class="swiper free_videos mt-4">
                        <div class="swiper-wrapper free_videos1">
                            @if(count($instructorFreeData))
                                @foreach($instructorFreeData as $insFreeData)

                                <div class="swiper-slide">
                                    <a href="{{ route('playInstructorVideo',['video_id'=>$insFreeData['video_id']]) }}">
                                        <div class="maz__swiper_slider_common_block">
                                            <div class="maz__swiper_block_discipline-img">
                                                <img src="{{ $insFreeData['lession_thumbnail'] }}"  alt="{{ $insFreeData['title'] }}">
                                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                            </div>
                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                <h6 style="font-weight:600">{{ $insFreeData['title'] }}</h6>
                                            <p class="description">{{ $insFreeData['description'] }}</p>
                                            </div>
                                            <div class="logo-background">
                                                <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                            </div>
                                            <div class="swiper_block_discipline__profile-box">
                                                <div class="badge-icons">
                                                    <img src="{{ asset('assets/front/images/medal.svg') }}"  alt="icon group">
                                                    <span>Bronze</span>
                                                </div>
                                                <div class="badge-icons">
                                                    <img src="{{ asset('assets/front/images/video.svg') }}"  alt="icon group">
                                                    <span>123</span>
                                                </div>
                                                <div class="badge-icons">
                                                    <img src="{{ asset('assets/front/images/belt.svg') }}"  alt="icon group">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            @endif
                            @php
                                $free_count = count($instructorFreeData);
                                if($free_count == 0)
                                {
                                    for($k = 0;$k < 4;$k++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                               
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600">Coming Soon</h6>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        @php
                                    }
                                }

                                if($free_count == 1)
                                {
                                    for($k = 0;$k < 3;$k++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600">Coming Soon</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @php
                                    }
                                }

                                if($free_count == 2)
                                {
                                    for($k = 0;$k < 2;$k++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600">Coming Soon</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @php
                                    }
                                }

                                if($free_count == 3)
                                {
                                    for($k = 0;$k < 1;$k++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600">Coming Soon</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @php
                                    }
                                }

                                
                            @endphp  
                        </div>
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                    </div>
                </div>
            </div>
        </div>--}}
        
        <!-- Free Videos end -->

        <!-- Recommended for You -->
        {{-- <div class="categories_swiper__slider-block">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="text-uppercase mb-3 mb-md-0">Recommended for You</h2>
                    <hr>
                    <div class="swiper recommended_for_you mt-4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="{{ asset('assets/front/images/white-belt-test.jpg') }}"
                                             alt="white-belt-test">
                                        <div class="badge-dark-video-time">32:04</div>
                                    </div>
                                    <div class="maz__swiper_block_discipline-content">
                                        <h6>1st Level White Belt</h6>
                                        <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                            Aenean
                                            commodo
                                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                            parturient
                                            montes, nascetur ridiculus mus. Donec qu</p>
                                    </div>
                                    <div class="swiper_block_discipline__profile-box">
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/medal.svg') }}"
                                                 alt="icon group">
                                            <span>Bronze</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/video.svg') }}"
                                                 alt="icon group">
                                            <span>123</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/belt.svg') }}"
                                                 alt="icon group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="{{ asset('assets/front/images/white-belt-test.jpg') }}"
                                             alt="Boxing Advanced 2">
                                        <div class="badge-dark-video-time">32:04</div>
                                    </div>
                                    <div class="maz__swiper_block_discipline-content">
                                        <h6>01 White Belt</h6>
                                        <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                            Aenean
                                            commodo
                                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                            parturient
                                            montes, nascetur ridiculus mus. Donec qu</p>
                                    </div>
                                    <div class="swiper_block_discipline__profile-box">
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/medal.svg') }}"
                                                 alt="icon group">
                                            <span>Bronze</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/video.svg') }}"
                                                 alt="icon group">
                                            <span>123</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/belt.svg') }}"
                                                 alt="icon group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="{{ asset('assets/front/images/karate-basic.jpg') }}"
                                             alt="Karate Basic Techniques">
                                        <div class="badge-dark-video-time">32:04</div>
                                    </div>
                                    <div class="maz__swiper_block_discipline-content">
                                        <h6>Karate Basic Techniques</h6>
                                        <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                            Aenean
                                            commodo
                                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                            parturient
                                            montes, nascetur ridiculus mus. Donec qu</p>
                                    </div>
                                    <div class="swiper_block_discipline__profile-box">
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/medal.svg') }}"
                                                 alt="icon group">
                                            <span>Bronze</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/video.svg') }}"
                                                 alt="icon group">
                                            <span>123</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/belt.svg') }}"
                                                 alt="icon group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="{{ asset('assets/front/images/trap.jpg') }}" 
                                            alt="Arm trap and roll v2">
                                        <div class="badge-dark-video-time">32:04</div>
                                    </div>
                                    <div class="maz__swiper_block_discipline-content">
                                        <h6>Arm trap and roll v2</h6>
                                        <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                            Aenean
                                            commodo
                                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                            parturient
                                            montes, nascetur ridiculus mus. Donec qu</p>
                                    </div>
                                    <div class="swiper_block_discipline__profile-box">
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/medal.svg') }}"
                                                 alt="icon group">
                                            <span>Bronze</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/video.svg') }}"
                                                 alt="icon group">
                                            <span>123</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/belt.svg') }}"
                                                 alt="icon group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="{{ asset('assets/front/images/white-belt-test.jpg') }}"
                                             alt="white-belt-test">
                                        <div class="badge-dark-video-time">32:04</div>
                                    </div>
                                    <div class="maz__swiper_block_discipline-content">
                                        <h6>Kimber Martial Arts</h6>
                                        <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                            Aenean
                                            commodo
                                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                            parturient
                                            montes, nascetur ridiculus mus. Donec qu</p>
                                    </div>
                                    <div class="swiper_block_discipline__profile-box">
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/medal.svg') }}"
                                                 alt="icon group">
                                            <span>Bronze</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/video.svg') }}"
                                                 alt="icon group">
                                            <span>123</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/belt.svg') }}"
                                                 alt="icon group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="{{ asset('assets/front/images/white-belt-test.jpg') }}"
                                             alt="Boxing Advanced 2">
                                        <div class="badge-dark-video-time">32:04</div>
                                    </div>
                                    <div class="maz__swiper_block_discipline-content">
                                        <h6>01 White Belt</h6>
                                        <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                            Aenean
                                            commodo
                                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                            parturient
                                            montes, nascetur ridiculus mus. Donec qu</p>
                                    </div>
                                    <div class="swiper_block_discipline__profile-box">
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/medal.svg') }}"
                                                 alt="icon group">
                                            <span>Bronze</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/video.svg') }}"
                                                 alt="icon group">
                                            <span>123</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/belt.svg') }}"
                                                 alt="icon group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img src="{{ asset('assets/front/images/next.png') }}" 
                            alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img src="{{ asset('assets/front/images/previous.png') }}" 
                            alt="arrows">
                    </div>
                </div>
            </div>

        </div> --}}
        <!-- Recommended for You end -->

        <!-- Bronze Videos -->
       
        {{--<div class="categories_swiper__slider-block">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="mb-3 mb-md-0">BRONZE VIDEOS</h2>
                    <hr>
                    <div class="swiper bronze_videos mt-4">
                        <div class="swiper-wrapper bronze_videos1">
                        @if(count($instructorBronzeData))
                            @foreach($instructorBronzeData as $insBronzeData)
                            <div class="swiper-slide">
                                <a href="{{ route('playInstructorVideo',['video_id'=>$insBronzeData['video_id']]) }}">
                                    <div class="maz__swiper_slider_common_block">
                                        <div class="maz__swiper_block_discipline-img">
                                            <img src="{{ $insBronzeData['lession_thumbnail'] }}"  alt="{{ $insBronzeData['title'] }}">
                                            <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insBronzeData['video_duration'])->format('i:s'); }}</div>
                                        </div>
                                        <div class="maz__swiper_block_discipline-content pb-2">
                                            <h6>{{ $insBronzeData['title'] }}</h6>
                                        <p class="description">{{ $insBronzeData['description'] }}</p>
                                        </div>
                                        <div class="logo-background">
                                            <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                        </div>
                                        <div class="swiper_block_discipline__profile-box">
                                            <div class="badge-icons">
                                                <img src="{{ asset('assets/front/images/medal.svg') }}"  alt="icon group">
                                                <span>Bronze</span>
                                            </div>
                                            <div class="badge-icons">
                                                <img src="{{ asset('assets/front/images/video.svg') }}"  alt="icon group">
                                                <span>123</span>
                                            </div>
                                            <div class="badge-icons">
                                                <img src="{{ asset('assets/front/images/belt.svg') }}"  alt="icon group">
                                            </div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
                            @endforeach
                            @endif
                            @php
                                $bronze_count = count($instructorBronzeData);
                                
                                if($bronze_count == 0)
                                {
                                    for($l = 0;$l < 4;$l++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600">Coming Soon</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @php
                                    }
                                }

                                if($bronze_count == 1)
                                {
                                    for($l = 0;$l < 3;$l++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @php
                                    }
                                }

                                if($bronze_count == 2)
                                {
                                    for($l = 0;$l < 2;$l++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @php
                                    }
                                }

                                if($bronze_count == 3)
                                {
                                    for($l = 0;$l < 1;$l++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
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
                        </div>
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                    </div>
                </div>
            </div>

        </div>--}}
        
        <!-- Bronze Videos end -->

        <!-- Silver Video -->
       
        {{--<div class="categories_swiper__slider-block">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="mb-3 mb-md-0">SILVER VIDEOS </h2>
                    <hr>
                    <div class="swiper silver_videos mt-4">
                        <div class="swiper-wrapper silver_videos1">
                        @if(count($instructorSilverData))
                            @foreach($instructorSilverData as $insSilverData)
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="{{ $insSilverData['lession_thumbnail'] }}"  alt="{{ $insSilverData['title'] }}">
                                        <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insSilverData['video_duration'])->format('i:s'); }}</div>
                                    </div>
                                    <div class="maz__swiper_block_discipline-content pb-2">
                                        <h6>{{ $insSilverData['title'] }}</h6>
                                        <p class="description">{{ $insSilverData['description'] }}</p>
                                    </div>
                                    <div class="logo-background">
                                        <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                    </div>
                                    <div class="swiper_block_discipline__profile-box">
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/medal.svg') }}"  alt="icon group">
                                            <span>Bronze</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/video.svg') }}"  alt="icon group">
                                            <span>123</span>
                                        </div>
                                        <div class="badge-icons">
                                            <img src="{{ asset('assets/front/images/belt.svg') }}"  alt="icon group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                            @php
                                $silver_count = count($instructorSilverData);
                                
                                if($silver_count == 0)
                                {
                                    for($m = 0;$m < 4;$m++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @php
                                    }
                                }

                                if($silver_count == 1)
                                {
                                    for($m = 0;$m < 3;$m++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @php
                                    }
                                }

                                if($silver_count == 2)
                                {
                                    for($m = 0;$m < 2;$m++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @php
                                    }
                                }

                                if($silver_count == 3)
                                {
                                    for($m = 0;$m < 1;$m++)
                                    {
                                        @endphp
                                            <div class="swiper-slide">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
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
                        </div>
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                    </div>
                </div>
            </div>
        </div>--}}
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

        setTimeout(function(){
        $("#success1").remove();
        }, 30000 ); // 5 secs
    });
    </script>
    <script>
        function redirectto()
        {
            var currentDiscipline = $("#currentDisciplineId").val();
            var currentDisciplineId = 'lastPage=disciplines/'+currentDiscipline;
            //alert(currentDisciplineId);

            var url = '{{ route("student.login",":id") }}';

            url = url.replace(':id',currentDisciplineId);
            
            window.location.href = url;
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

                    var currentDisciplineId = 'lastPage=disciplines/'+currentDiscipline;

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

        function loginSignupModal()
        {
            var currentDiscipline = $("#currentDisciplineId").val();

            var currentDisciplineId = 'lastPage=disciplines/'+currentDiscipline;

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
    </script>
    <script>
        var selected = $("#selectedTileId").val();
        let timeoutId;
        var totoalDisciplineCount = <?php echo count($disciplineImagesData) - 1; ?>;

        //var firstSlide = selected - 1;
         //console.log(firstSlide);   
       
        firstSlide = 1;

        if(selected == 1)
        {
            firstSlide = 0;
        }
        if(selected == 2)
        {
            firstSlide = 1;
        }
        if(selected == 19)
        {
            firstSlide = 2;
        }
        if(selected == 3)
        {
            firstSlide = 3;
        }
        if(selected == 4)
        {
            firstSlide = 5;
        }
        if(selected == 5)
        {
            firstSlide = 4;
        }
        if(selected == 6)
        {
            firstSlide = 17;
        }
        if(selected == 7)
        {
            firstSlide = 6;
        }
        if(selected == 8)
        {
            firstSlide = 7;
        }
        if(selected == 9)
        {
            firstSlide = 8;
        }
        if(selected == 10)
        {
            firstSlide = 12;
        }
        if(selected == 11)
        {
            firstSlide = 13;
        }
        if(selected == 12)
        {
            firstSlide = 15;
        }
        if(selected == 13)
        {
            firstSlide = 14;
        }
        if(selected == 14)
        {
            firstSlide = 16;
        }
        if(selected == 15)
        {
            firstSlide = 11;
        }
        if(selected == 16)
        {
            firstSlide = 10;
        }
        if(selected == 17)
        {
            firstSlide = 18;
        }
        if(selected == 18)
        {
            firstSlide = 9;
        }
        if(selected == 20)
        {
            firstSlide = 19;
        }
        if(selected == 21)
        {
            firstSlide = 20;
        }
        if(selected == 22)
        {
            firstSlide = 21;
        }
        if(selected == 23)
        {
            firstSlide = 22;
        }
        if(selected == 24)
        {
            firstSlide = 23;
        }
       
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
            slidesPerView: 'auto',
            loopedSlides: totoalDisciplineCount,
            // draggable: true,
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
                   
                    $("#disciplineId").val(currentActiveSlide.id);
                    $("#swiperImageTitle").text(currentActiveSlide.title);
                    $("#swiperImageDescription").text(currentActiveSlide.description);
                },
            },
            pagination: false,
            breakpoints: {
                768: {
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

        function getDisciplines(disciplineSequence,userDetails){
            // if (lastAjaxRequest) {
            //     lastAjaxRequest.abort();
            // }
            // Clear the previous timeout, if any
            clearTimeout(timeoutId);

            // Set a new timeout to run the AJAX request after 1 second
            timeoutId = setTimeout(function() {
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
                    beforeSend: function(){
                        $('div.main-loader-please-wait').show();
                    },
                    success: function( data ) {
                        
                        var result1 = JSON.stringify(data);
                        var result = JSON.parse(result1);

                        if(result.currentDiscipline.main_coming_soon_image !== null && result.currentDiscipline.main_coming_soon_image !== '')
                        {
                            var mainComingSoon = '<img src="'+result.currentDiscipline.main_coming_soon_image+'"  alt="Coming Soon">';
                        }
                        else
                        {
                            var mainComingSoon = '<img src="{{asset('assets/front/images/download.jpeg')}}"  alt="Coming Soon">';
                        }
                        
                        if(result.currentDiscipline.video_coming_soon_image !== null && result.currentDiscipline.video_coming_soon_image !== '')
                        {
                            var videoComingSoon = '<img src="'+result.currentDiscipline.video_coming_soon_image+'"  alt="Coming Soon">';
                        }
                        else
                        {
                            var videoComingSoon = '<img src="{{asset('assets/front/images/download.jpeg')}}"  alt="Coming Soon">';
                        }

                        var instructorData = result.instructorData;
                        
                        if(instructorData.length > 0)
                        {
                            
                            for(var i = 0; i < instructorData.length; i++)
                            {
                                var instructor_id = "{{url('schools-and-instructors-detail') }}/"+instructorData[i].id;

                                if(instructorData[i].photo != null)
                                {
                                    var instructor_profile = '<img src="'+instructorData[i].photo.replace('image_crop_resized=200x120','')+'"  alt="'+instructorData[i].name+'">';
                                }
                                else
                                {
                                    var instructor_profile = '<img src="{{ asset('assets/front/images/avtar.png') }}"  alt="'+instructorData[i].name+'">';
                                }
                                
                                $(".schools_and_instructors1").append('<div class="swiper-slide">'+
                                                                        '<a href="'+instructor_id+'">'+
                                                                        '<div class="maz__swiper_slider_common_block1">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                                instructor_profile+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6 style="font-weight:600;">'+instructorData[i].name+'</h6>'+
                                                                                '<h6 style="font-weight:600;">'+instructorData[i].school_name+'</h6>'+
                                                                            '</div>'+
                                                                
                                                                        '</div>'+
                                                                        '</a>'+
                                                                    '</div>'    
                                                                    );
                            }
                        }

                        if(instructorData.length == 0)
                        {
                            
                            for(var i = 0; i < 8; i++)
                            {
                                $(".schools_and_instructors1").append('<div class="swiper-slide">'+
                                                                        '<div class="maz__swiper_slider_common_block1">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                                mainComingSoon+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'    
                                                                    );
                            }
                        }

                        if(instructorData.length == 1)
                        {
                            
                            for(var i = 0; i < 7; i++)
                            {
                                $(".schools_and_instructors1").append('<div class="swiper-slide">'+
                                                                        '<div class="maz__swiper_slider_common_block1">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                                mainComingSoon+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'    
                                                                    );
                            }
                        }

                        if(instructorData.length == 2)
                        {
                            
                            for(var i = 0; i < 6; i++)
                            {
                                $(".schools_and_instructors1").append('<div class="swiper-slide">'+
                                                                        '<div class="maz__swiper_slider_common_block1">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                                mainComingSoon+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'    
                                                                    );
                            }
                        }
                        if(instructorData.length == 3)
                        {
                            
                            for(var i = 0; i < 5; i++)
                            {
                                $(".schools_and_instructors1").append('<div class="swiper-slide">'+
                                                                        '<div class="maz__swiper_slider_common_block1">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                                mainComingSoon+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'    
                                                                    );
                            }
                        }

                        if(instructorData.length == 4)
                        {
                            
                            for(var i = 0; i < 4; i++)
                            {
                                $(".schools_and_instructors1").append('<div class="swiper-slide">'+
                                                                        '<div class="maz__swiper_slider_common_block1">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                                mainComingSoon+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'    
                                                                    );
                            }
                        }
                        
                        if(instructorData.length == 5)
                        {
                            
                            for(var i = 0; i < 5; i++)
                            {
                                $(".schools_and_instructors1").append('<div class="swiper-slide">'+
                                                                        '<div class="maz__swiper_slider_common_block1">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                                mainComingSoon+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'    
                                                                    );
                            }
                        }
                        
                        if(instructorData.length == 6)
                        {
                            
                            for(var i = 0; i < 2; i++)
                            {
                                $(".schools_and_instructors1").append('<div class="swiper-slide">'+
                                                                        '<div class="maz__swiper_slider_common_block1">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                                mainComingSoon+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'    
                                                                    );
                            }
                        }

                        if(instructorData.length == 7)
                        {
                            
                            for(var i = 0; i < 1; i++)
                            {
                                $(".schools_and_instructors1").append('<div class="swiper-slide">'+
                                                                        '<div class="maz__swiper_slider_common_block1">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                                mainComingSoon+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'    
                                                                    );
                            }
                        }

                        var video_levels = result.levels;

                        if(video_levels.length > 0)
                        {
                            for(var z=0; z < video_levels.length; z++)
                            {
                                $("#video_section_"+video_levels[z].level_id).empty();
                                //$("#level_wise_section_"+video_levels[z].level_id).empty();
                                
                                var videos = video_levels[z].videoData;
                                
                                if(userDetails)
                                {
                                    if(video_levels[z].level_id == 1)
                                    {
                                        for(var two_videos_count = 0; two_videos_count < videos.length; two_videos_count++)
                                        {
                                            if(videos[two_videos_count].video_id != '')
                                            {
                                                var free_videos_id = "{{url('playInstructorVideo') }}?video_id="+videos[two_videos_count].video_id;

                                                $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                                                        '<a href="'+free_videos_id+'">'+
                                                                        '<div class="maz__swiper_slider_common_block">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                                '<img src="'+videos[two_videos_count].video_thumbnail.replace('image_crop_resized=200x120','')+'"  alt="">'+
                                                                                '<div class="badge-dark-video-time">'+videos[two_videos_count].video_duration+'</div>'+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6 style="font-weight:600;">'+videos[two_videos_count].title+'</h6>'+
                                                                                '<h6 style="font-weight:600">'+videos[two_videos_count].instructor_name+'</h6>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                        '</a>'+
                                                                    '</div>'    
                                                                    );
                                            }
                                            else
                                            {
                                                $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                                                        '<div class="maz__swiper_slider_common_block">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                            videoComingSoon+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'    
                                                                    );
                                            }
                                        } 
                                    }
                                    else
                                    {
                                        if(userDetails['subscription_id'] != 1 && userDetails['payment_status'] == 1)
                                        {
                                            for(var two_videos_count = 0; two_videos_count < videos.length; two_videos_count++)
                                            {
                                                if(videos[two_videos_count].video_id != '')
                                                {
                                                    var free_videos_id = "{{url('playInstructorVideo') }}?video_id="+videos[two_videos_count].video_id;

                                                    $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                                                            '<a href="'+free_videos_id+'">'+
                                                                            '<div class="maz__swiper_slider_common_block">'+
                                                                                '<div class="maz__swiper_block_discipline-img">'+
                                                                                    '<img src="'+videos[two_videos_count].video_thumbnail.replace('image_crop_resized=200x120','')+'"  alt="">'+
                                                                                    '<div class="badge-dark-video-time">'+videos[two_videos_count].video_duration+'</div>'+
                                                                                '</div>'+
                                                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                    '<h6 style="font-weight:600;">'+videos[two_videos_count].title+'</h6>'+
                                                                                    '<h6 style="font-weight:600">'+videos[two_videos_count].instructor_name+'</h6>'+
                                                                                    // ' <div class="logo-background">'+
                                                                                    //     '<img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">'+
                                                                                    // '</div>'+
                                                                                '</div>'+
                                                                            '</div>'+
                                                                            '</a>'+
                                                                        '</div>'    
                                                                        );
                                                }
                                                else
                                                {
                                                    $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                                                            '<div class="maz__swiper_slider_common_block">'+
                                                                                '<div class="maz__swiper_block_discipline-img">'+
                                                                                videoComingSoon+
                                                                                '</div>'+
                                                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                    '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                                '</div>'+
                                                                            '</div>'+
                                                                        '</div>'    
                                                                        );
                                                }
                                            } 
                                        }
                                        else
                                        {
                                            for(var two_videos_count = 0; two_videos_count < videos.length; two_videos_count++)
                                            {
                                                if(videos[two_videos_count].video_id != '')
                                                {
                                                    var free_videos_id = "{{url('playInstructorVideo') }}?video_id="+videos[two_videos_count].video_id;

                                                    $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                                                            '<a href="javascript::void(0)" onclick="upgradePlanModal()">'+
                                                                            '<div class="maz__swiper_slider_common_block">'+
                                                                                '<div class="maz__swiper_block_discipline-img">'+
                                                                                    '<img src="'+videos[two_videos_count].video_thumbnail.replace('image_crop_resized=200x120','')+'"  alt="">'+
                                                                                    '<div class="badge-dark-video-time">'+videos[two_videos_count].video_duration+'</div>'+
                                                                                '</div>'+
                                                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                    '<h6 style="font-weight:600;">'+videos[two_videos_count].title+'</h6>'+
                                                                                    '<h6 style="font-weight:600">'+videos[two_videos_count].instructor_name+'</h6>'+
                                                                                '</div>'+
                                                                            '</div>'+
                                                                            '</a>'+
                                                                        '</div>'    
                                                                        );
                                                }
                                                else
                                                {
                                                    $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                                                            '<div class="maz__swiper_slider_common_block">'+
                                                                                '<div class="maz__swiper_block_discipline-img">'+
                                                                                videoComingSoon+
                                                                                '</div>'+
                                                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                    '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                                '</div>'+
                                                                            '</div>'+
                                                                        '</div>'    
                                                                        );
                                                }
                                            } 
                                        }
                                        
                                    }
                                    
                                }
                                else
                                {
                                    for(var two_videos_count = 0; two_videos_count < videos.length; two_videos_count++)
                                    {
                                        if(videos[two_videos_count].video_id != '')
                                        {
                                            $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                                                    '<a href="javascript::void(0)" onclick="loginSignupModal()">'+
                                                                    '<div class="maz__swiper_slider_common_block">'+
                                                                        '<div class="maz__swiper_block_discipline-img">'+
                                                                            '<img src="'+videos[two_videos_count].video_thumbnail.replace('image_crop_resized=200x120','')+'"  alt="">'+
                                                                            '<div class="badge-dark-video-time">'+videos[two_videos_count].video_duration+'</div>'+
                                                                        '</div>'+
                                                                        '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                            '<h6 style="font-weight:600;">'+videos[two_videos_count].title+'</h6>'+
                                                                            '<h6 style="font-weight:600">'+videos[two_videos_count].instructor_name+'</h6>'+
                                                                            // ' <div class="logo-background">'+
                                                                            //     '<img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">'+
                                                                            // '</div>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                    '</a>'+
                                                                '</div>'    
                                                                );
                                        }
                                        else
                                        {
                                            $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                                                    '<div class="maz__swiper_slider_common_block">'+
                                                                        '<div class="maz__swiper_block_discipline-img">'+
                                                                        videoComingSoon+
                                                                        '</div>'+
                                                                        '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                            '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</div>'    
                                                                );
                                        }
                                    } 
                                }                    
                                
                                if(videos.length == 0)
                                {
                                    for(var j = 0; j < 8; j++)
                                    {
                                        $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                            '<div class="maz__swiper_slider_common_block">'+
                                                '<div class="maz__swiper_block_discipline-img">'+
                                                videoComingSoon+
                                                '</div>'+
                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                    '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'    
                                        );
                                    }
                                }

                                if(videos.length == 1)
                                {
                                    for(var j = 0; j < 7; j++)
                                    {
                                        $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                            '<div class="maz__swiper_slider_common_block">'+
                                                '<div class="maz__swiper_block_discipline-img">'+
                                                videoComingSoon+
                                                '</div>'+
                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                    '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'    
                                        );
                                    }
                                }

                                if(videos.length == 2)
                                {
                                    for(var j = 0; j < 6; j++)
                                    {
                                        $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                            '<div class="maz__swiper_slider_common_block">'+
                                                '<div class="maz__swiper_block_discipline-img">'+
                                                videoComingSoon+
                                                '</div>'+
                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                    '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'    
                                        );
                                    }
                                }

                                if(videos.length == 3)
                                {
                                    for(var j = 0; j < 5; j++)
                                    {
                                        $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                            '<div class="maz__swiper_slider_common_block">'+
                                                '<div class="maz__swiper_block_discipline-img">'+
                                                videoComingSoon+
                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                    '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'    
                                        );
                                    }
                                }

                                if(videos.length == 4)
                                {
                                    for(var j = 0; j < 4; j++)
                                    {
                                        $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                            '<div class="maz__swiper_slider_common_block">'+
                                                '<div class="maz__swiper_block_discipline-img">'+
                                                videoComingSoon+
                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                    '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'    
                                        );
                                    }
                                }

                                if(videos.length == 5)
                                {
                                    for(var j = 0; j < 3; j++)
                                    {
                                        $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                            '<div class="maz__swiper_slider_common_block">'+
                                                '<div class="maz__swiper_block_discipline-img">'+
                                                videoComingSoon+
                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                    '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'    
                                        );
                                    }
                                }

                                if(videos.length == 6)
                                {
                                    for(var j = 0; j < 2; j++)
                                    {
                                        $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                            '<div class="maz__swiper_slider_common_block">'+
                                                '<div class="maz__swiper_block_discipline-img">'+
                                                videoComingSoon+
                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                    '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'    
                                        );
                                    }
                                }

                                if(videos.length == 7)
                                {
                                    for(var j = 0; j < 1; j++)
                                    {
                                        $("#video_section_"+video_levels[z].level_id).append('<div class="swiper-slide">'+
                                            '<div class="maz__swiper_slider_common_block">'+
                                                '<div class="maz__swiper_block_discipline-img">'+
                                                videoComingSoon+
                                                '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                    '<h6 style="font-weight:600;">Coming Soon</h6>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'    
                                        );
                                    }
                                }
                            }
                        }
                    },
                    complete: function(){
                        $('div.main-loader-please-wait').hide();
                    },
                });
            }, 1000); // Adjust the delay (in milliseconds) as needed
        }

        swiperDisicipline.on('slideChangeTransitionStart', function() {
           
            var currentActiveSlide = JSON.parse($('.swiper-slide-active img').attr('alt'));
            var disciplineSequence = currentActiveSlide.id;
            $("#currentDisciplineId").val(disciplineSequence);
            
            $(".schools_and_instructors1").empty();
             $(".free_videos1").empty();
             $(".recommended_videos1").empty();
            // $(".silver_videos1").empty();
            // $(".gold_videos1").empty();
         
            var userDetails = <?php echo json_encode(Auth::user()) ?>;
          
            getDisciplines(disciplineSequence,userDetails);

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
@endpush