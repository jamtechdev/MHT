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
        top: 66%;
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
        /* width:87%; */
    }
    .maz__swiper_block_discipline-content.pb-2 h6 {
        font-weight: 600 !important;
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




.maz__swiper_slider_common_block .maz__swiper_block_discipline-img img {
  width: 100%;
  min-height: 155px !important;
  height: 155px !important;
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
}

.tooltip {  
  position: relative;
  display: inline-block;
  /* border-bottom: 1px dotted black; */
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 127px;
  padding:20px;
  background-color: #f1f1f1;
  color: #000;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  font-family: "Roboto";
  bottom: 100%;
  left: 50%;
  margin-left: -60px;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  padding:9px;
  /* box-shadow: 2px 2px 0px 0px #f248482e; */
}

.tooltip .tooltiptext1 {
  visibility: hidden;
  width: 127px;
  padding:20px;
  background-color: #f1f1f1;
  color: #000;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  font-family: "Roboto";
  bottom: 55%;
  left: 50%;
  margin-left: -60px;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext1 {
  visibility: visible;
  padding:9px;
  /* box-shadow: 2px 2px 0px 0px #f248482e; */
}

.tooltip .tooltiptext2 {
  visibility: hidden;
  width: 127px;
  padding:20px;
  background-color: #f1f1f1;
  color: #000;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  font-family: "Roboto";
  bottom: 72%;
  left: 50%;
  margin-left: -60px;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext2 {
  visibility: visible;
  padding:9px;
  /* box-shadow: 2px 2px 0px 0px #f248482e; */
}

.tooltip .tooltiptext3 {
  visibility: hidden;
  width: 127px;
  padding:20px;
  background-color: #f1f1f1;
  color: #000;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  font-family: "Roboto";
  bottom: 0%;
  left: 45%;
  margin-left: -60px;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext3 {
  visibility: visible;
  padding:9px;
  /* box-shadow: 2px 2px 0px 0px #f248482e; */
}

.tooltip .tooltiptext4 {
  visibility: hidden;
  width: 127px;
  padding:20px;
  background-color: #f1f1f1;
  color: #000;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  font-family: "Roboto";
  bottom: 20%;
  left: 37%;
  margin-left: -60px;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext4 {
  visibility: visible;
  padding:9px;
  /* box-shadow: 2px 2px 0px 0px #f248482e; */
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

    @media (min-width: 425px){
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
<section class="maz__common_background_banner maz__instructor_detail_banner lozad-background bg-primary" @if($instructorDetailData['banner'] != '') data-background-image="{{ $instructorDetailData['banner'] }}" @endif>
{{--  data-background-image="{{ asset('assets/front/images/instructor-detail-banner.jpg') }}" --}}
    <div class="container">
        <div class="maz__common-bg-content row">
            <div class="col-md-6">
                <h1>{{ $instructorDetailData['name'] }}</h1>
                {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"> Home </li>
                        <li class="breadcrumb-item"> Disciplines </li>
                        <li class="breadcrumb-item"> karate </li>
                        <li class="breadcrumb-item" aria-current="page">Kimber Martial Arts</li>
                    </ol>
                </nav> --}}
            </div>
            <div class="col-md-6 inst_review maz__titl-block align-items-center">
                <span class="review-summ text-dark">
                    @if($instructorDetailData['rating'] == 1)
                        <span class="me-2">0.5</span>
                        <i class="fa fa-star-half-o text-warning me-1 tooltip" ><span class="tooltiptext" id="description"><b>Coming Soon</b></span></button></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                    @elseif($instructorDetailData['rating'] == 2)
                        <span class="me-2">1.0</span>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                    @elseif($instructorDetailData['rating'] == 3)
                        <span class="me-2">1.5</span>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fa fa-star-half-o text-warning me-1 tooltip" ><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                    @elseif($instructorDetailData['rating'] == 4)
                        <span class="me-2">2.0</span>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                    @elseif($instructorDetailData['rating'] == 5)
                        <span class="me-2">2.5</span>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fa fa-star-half-o text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                    @elseif($instructorDetailData['rating'] == 6)
                        <span class="me-2">3.0</span>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                    @elseif($instructorDetailData['rating'] == 7)
                        <span class="me-2">3.5</span>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fa fa-star-half-o text-warning me-1 tooltip" ><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                    @elseif($instructorDetailData['rating'] == 8)
                        <span class="me-2">4.0</span>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                    @elseif($instructorDetailData['rating'] == 9)
                        <span class="me-2">4.5</span>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fa fa-star-half-o text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                    @elseif($instructorDetailData['rating'] == 10)
                        <span class="me-2">5.0</span>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                    @else
                        <span class="me-2">0.0</span>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                        <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                    @endif
                    
                    <span class="ms-2 me-2">5 Product ratings</span>
                    <a href="#review">View All Ratings</a>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- banner video section start -->
<!-- <section class="maz__banner-video p-0">
<div class="maz__banner-wrapper">
    <div class="maz__banner-video-bg">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe src="https://fast.wistia.net/embed/iframe/dhfw984g04?autoplay=1" width="100%" height="982" autoplay="false" allowfullscreen title="MartialArtZen"></iframe>
            <img src="{{ asset('assets/front/images/banner.jpg') }}"  alt="MartialArtZen-Banner" width="100%" height="100%">
            <div class="embed-responsive-item wistia_embed wistia_async_{{ $banner_id ?? '' }} resumable=true autoPlay=true endVideoBehavior=loop videoFoam=true muted=false controlsVisibleOnLoad=false fullscreenButton=true"></div>
        </div>
    </div>
</div>
</section> -->


<section class="maz__bg_gray maz__sections">

    <!-- <div class="container">
        <div class="embed-responsive embed-responsive-16by9 ">

         <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
        
           <div class="embed-responsive-item wistia_embed wistia_async_rpzrs4lf1w resumable=true autoPlay=false endVideoBehavior=loop videoFoam=true muted=false controlsVisibleOnLoad=false fullscreenButton=false"></div>
    
            
         @if(count($instructorBiographyData) && isset($instructorBiographyData[0]['video_id']))
            <div class="embed-responsive-item wistia_embed wistia_async_{{$instructorBiographyData[0]['video_id']}} resumable=true playlistLinks=auto autoPlay=false endVideoBehavior=loop videoFoam=true muted=false controlsVisibleOnLoad=false fullscreenButton=true"></div>
        @else
            <img class="img-responsive" src="{{ asset('assets/front/images/no_video.png') }}" />
        @endif
        </div>
    </div> -->


    @if((count($instructorBiographyData) > 0) and (!empty($instructorBiographyData[0]['dacast_video_asset_id'])))
        <script src="https://player.dacast.com/js/player.js?contentId={{ $instructorBiographyData[0]['dacast_video_asset_id'] }}"></script>
    @endif
    {{-- @dd($instructorBiographyData, $instructorDemonstrationData) --}}
    <div class="categories_swiper__slider-block">
        <div class="container">
            <div class="swiper__main_blocks">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <input type="hidden" value="{{$instructorBiographyData[0]['video_id'] ?? ''}}" id="video_id">
                        <div class="embed-responsive embed-responsive-16by9 swiper-slide" id="demonstartionVideoSection">
                            <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe> -->
        
                            <!-- <div class="embed-responsive-item wistia_embed wistia_async_rpzrs4lf1w resumable=true autoPlay=false endVideoBehavior=loop videoFoam=true muted=false controlsVisibleOnLoad=false fullscreenButton=false"></div>
                            -->
                            @if(count($instructorBiographyData) && isset($instructorBiographyData[0]['video_id']))
                                @if(isset($instructorBiographyData[0]['is_dacast_video']) and ($instructorBiographyData[0]['is_dacast_video'] == 1))
                                    <div id="bio-demo-dacast-video-player"></div>
                                    <script>
                                        var CONTENT_ID = "{{ @$instructorBiographyData[0]['dacast_video_asset_id'] }}";
                                        var is_dacast_video = 1;
                                    </script>
                                @else
                                    <div class="embed-responsive-item wistia_embed wistia_async_{{$instructorBiographyData[0]['video_id']}} resumable=true playlistLinks=auto qualityMin=1080 autoPlay=false endVideoBehavior=loop videoFoam=true muted=false controlsVisibleOnLoad=false fullscreenButton=true"></div>
                                    <script>
                                        var CONTENT_ID = "";
                                        var is_dacast_video = 0;
                                    </script>
                                @endif
                            @elseif(count($instructorDemonstrationData) && isset($instructorDemonstrationData[0]['video_id']))
                                @if(isset($instructorDemonstrationData[0]['is_dacast_video']) and ($instructorDemonstrationData[0]['is_dacast_video'] == 1))
                                    <div id="bio-demo-dacast-video-player"></div>
                                    <script>
                                        var CONTENT_ID = "{{ @$instructorBiographyData[0]['instructorDemonstrationData'] }}";
                                        var is_dacast_video = 1;
                                    </script>
                                @else
                                    <div class="embed-responsive-item wistia_embed wistia_async_{{$instructorDemonstrationData[0]['video_id']}} resumable=true playlistLinks=auto qualityMin=1080 autoPlay=false endVideoBehavior=loop videoFoam=true muted=false controlsVisibleOnLoad=false fullscreenButton=true"></div>
                                    <script>
                                        var CONTENT_ID = "";
                                        var is_dacast_video = 0;
                                    </script>
                                @endif     
                            @else
                                <img class="img-responsive img-fluid" src="{{ asset('assets/front/images/no_video.png') }}" />
                            @endif
                        </div>
                    </div>
                </div>
                {{--<div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                    <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                </div>
                <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                    <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                </div>--}}
            </div>
        </div>
    </div>

    <!-- <div class="maz__instructor_video-block">
        <div class="container-fluid">
            <div class="maz__intstructor_video">
                <div class="embed-responsive embed-responsive-16by9">
                    {{-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe> --}}
                    @if(count($instructorBiographyData) && isset($instructorBiographyData[0]['video_id']))
                        <div class="embed-responsive-item wistia_embed wistia_async_{{$instructorBiographyData[0]['video_id']}} resumable=true autoPlay=false endVideoBehavior=loop videoFoam=true muted=false controlsVisibleOnLoad=false fullscreenButton=false"></div>
                    @else
                        <img src="{{ asset('assets/front/images/no_video.png') }}" />
                    @endif
                </div>
            </div>
        </div>
    </div> -->


    <!--Schools and Instructors-->
        <div class="categories_swiper__slider-block pt-5">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="mb-1 mb-md-0">Instructor Biography & Demonstrations</h2>
                    <div class="container text-end">
                        <button class="btn btn-primary view-more-school-btn" onclick="">View All</button>
                    </div>
                    <div class="swiper schools_and_instructors mt-2">
                        <div class="swiper-wrapper schools_and_instructors1">
                        @if(count($instructorDemonstrationData))
                            @foreach($instructorDemonstrationData as $insData)
                          
                                <div class="swiper-slide">
                                    <a href="#wistia_{{$insData['video_id']}}">
                                        <div class="maz__swiper_slider_common_block">
                                            <div class="maz__swiper_block_discipline-img">
                                                <img src="{{ str_replace('image_crop_resized=200x120','',$insData['photo']) ?? '' }}"  alt="{{ $insData['name'] }}">
                                                <div class="Play-btn">
                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                </div>
                                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insData['video_duration'])->format('i:s'); }}</div>
                                            </div>
                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                <h6>{{ $insData['name'] }}</h6>   
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
                            $schools_count = count($instructorDemonstrationData);
                            
                            if($schools_count == 0)
                            {
                                for($j = 0;$j < 8;$j++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                    @else
                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    @endif
                                                    <div class="Play-btn">
                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                    </div>
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                </div>
                                                <!-- <div class="logo-background">
                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                </div> -->
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
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                    @else
                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    @endif
                                                    <div class="Play-btn">
                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                    </div>
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                </div>
                                                <!-- <div class="logo-background">
                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                </div> -->
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
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                    @else
                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    @endif
                                                    <div class="Play-btn">
                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                    </div>
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                </div>
                                                <!-- <div class="logo-background">
                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                </div> -->
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
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                    @else
                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    @endif
                                                    <div class="Play-btn">
                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                    </div>
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                </div>
                                                <!-- <div class="logo-background">
                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                </div> -->
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
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                    @else
                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    @endif
                                                    <div class="Play-btn">
                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                    </div>
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                </div>
                                                <!-- <div class="logo-background">
                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                </div> -->
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
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                    @else
                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    @endif
                                                    <div class="Play-btn">
                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                    </div>
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                </div>
                                                <!-- <div class="logo-background">
                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                </div> -->
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
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                    @else
                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    @endif
                                                    <div class="Play-btn">
                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                    </div>
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                </div>
                                                <!-- <div class="logo-background">
                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                </div> -->
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
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                    @else
                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                    @endif
                                                    <div class="Play-btn">
                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                    </div>
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                </div>
                                                <!-- <div class="logo-background">
                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                </div> -->
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
    <!-- Schools and Instructors end -->
    
    <!-- Dynamic Video Section-->

    @php
        $classId = 0;
        $class_within_id = 0;
    @endphp
    
    @auth 
        @if(count($levels))
            @foreach($levels as $l)
                @if($l['level_id'] == 1 )
                <div class="categories_swiper__slider-block">
                    <div class="container">
                        <div class="swiper__main_blocks">
                            <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Videos</h2>
                            <hr>
                            <div class="swiper custom-swiper{{ $classId }} bronze_videos_ mt-4">
                                <div class="swiper-wrapper bronze_videos1">
                                @if(count($l['videoData']))
                                    @foreach($l['videoData'] as $insFreeData)
                                    <div class="swiper-slide">
                                        <a href="{{ route('playInstructorVideo',['video_id'=>$insFreeData['video_id']]) }}">
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] }}">
                                                    <div class="Play-btn">
                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                    </div>
                                                    {{-- <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div> --}}
                                                    <div class="badge-dark-video-time">{{ $insFreeData['video_duration'] }}</div>
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600;">{{ $insFreeData['title'] }}</h6>
                                                    <!-- <div class="logo-background">
                                                        <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                    </div> -->
                                                {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                </div>
                                                {{--<div class="swiper_block_discipline__profile-box">
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
                                                </div>--}}
                                            </div>
                                        </a>    
                                    </div>
                                    @endforeach
                                    @endif
                                    @php
                                        $free_count = count($l['videoData']);
                                        if($free_count == 0)
                                        {
                                            for($a = 0;$a < 8;$a++)
                                            {
                                                @endphp
                                                    <div class="swiper-slide">
                                                    
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                    <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                    <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                    <div class="swiper-slide">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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

                            <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                            </div>
                            
                            <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                            </div>

                            {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                            </div>
                            <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                            </div> --}}
                        </div>
                    </div>
                </div>
                @elseif($l['level_id'] == 5)
                <div class="categories_swiper__slider-block">
                    <div class="container">
                        <div class="swiper__main_blocks">
                            <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} For You</h2>
                            <hr>
                            <div class="swiper bronze_videos mt-4">
                                <div class="swiper-wrapper bronze_videos1">
                                @if(count($l['videoData']))
                                    @foreach($l['videoData'] as $insFreeData)
                                    <div class="swiper-slide">
                                        <a href="{{ route('playInstructorVideo',['video_id'=>$insFreeData['video_id']]) }}">
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] }}">
                                                    <div class="Play-btn">
                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                    </div>
                                                    {{-- <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div> --}}
                                                    <div class="badge-dark-video-time">{{ $insFreeData['video_duration'] }}</div>
                                                </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600;">{{ $insFreeData['title'] }}</h6>
                                                    <!-- <div class="logo-background">
                                                        <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                    </div> -->
                                                {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                </div>
                                                {{--<div class="swiper_block_discipline__profile-box">
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
                                                </div>--}}
                                            </div>
                                        </a>    
                                    </div>
                                    @endforeach
                                    @endif
                                    @php
                                        $free_count = count($l['videoData']);
                                        if($free_count == 0)
                                        {
                                            for($a = 0;$a < 8;$a++)
                                            {
                                                @endphp
                                                    <div class="swiper-slide">
                                                    
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                    <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                    <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                                                    <div class="swiper-slide">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                            @else
                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                            @endif
                                                            <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
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
                            @if($l['level_id'] != 1)
                                @if(Auth::user()->subscription_id != 1 && Auth::user()->payment_status == 1 && $isDisputedUser != "Disputed")
                                    
                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                    <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>
                                @else
                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                        <img  onclick="upgradePlanModal()" src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img  onclick="upgradePlanModal()" src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                    <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>
                                @endif
                            @else
                                {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                    <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                </div>
                                <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                    <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                </div> --}}
                                <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                    <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                </div>
                                
                                <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                    <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                </div>
                            @endif    
                        </div>
                    </div>
                </div>
                @else
                    @if(Auth::user()->subscription_id != 1 && Auth::user()->payment_status == 1 && $isDisputedUser != "Disputed")
                        <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper__main_blocks">
                                    <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Teaching Videos {{ $l['description'] }}</h2>
                                    <hr>
                                    <div class="swiper bronze_videos mt-4">
                                        <div class="swiper-wrapper bronze_videos1">
                                        @if(count($l['videoData']))
                                            @foreach($l['videoData'] as $insFreeData)
                                            <div class="swiper-slide">
                                                <a href="{{ route('playInstructorVideo',['video_id'=>$insFreeData['video_id']]) }}">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                            <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] }}">
                                                            <div class="Play-btn">
                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                            </div>
                                                            {{-- <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div> --}}
                                                            <div class="badge-dark-video-time">{{ $insFreeData['video_duration'] }}</div>
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">{{ $insFreeData['title'] }}</h6>
                                                            <!-- <div class="logo-background">
                                                                <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                            </div> -->
                                                        {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                        </div>
                                                        {{--<div class="swiper_block_discipline__profile-box">
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
                                                        </div>--}}
                                                    </div>
                                                </a>    
                                            </div>
                                            @endforeach
                                            @endif
                                            @php
                                                $free_count = count($l['videoData']);
                                                if($free_count == 0)
                                                {
                                                    for($a = 0;$a < 7;$a++)
                                                    {
                                                        @endphp
                                                            <div class="swiper-slide">
                                                            
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                            <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                    for($a = 0;$a < 6;$a++)
                                                    {
                                                        @endphp
                                                            <div class="swiper-slide">
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                            <div class="swiper-slide">
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                    @if($l['level_id'] != 1)
                                        @if(Auth::user()->subscription_id != 1 && Auth::user()->payment_status == 1 && $isDisputedUser != "Disputed")
                                            <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                                <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                            </div>
                                            
                                            <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                                <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                            </div>
                                            {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                                <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                            </div>
                                            <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                                <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                            </div> --}}
                                        @else
                                            <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                                <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                            </div>
                                            
                                            <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                                <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                            </div>
                                            {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                                <img  onclick="upgradePlanModal()" src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                            </div>
                                            <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                                <img  onclick="upgradePlanModal()" src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                            </div> --}}
                                        @endif
                                    @else
                                        <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                            <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                        </div>
                                        
                                        <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div>
                                        {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                            <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                        </div>
                                        <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div> --}}
                                    @endif    
                                </div>
                            </div>
                        </div>
                    

                        <!--Bronze classes static -->
                        <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper__main_blocks">
                                    <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Classes {{ $l['description'] }}</h2>
                                    <hr>
                                    <div class="swiper bronze_videos mt-4">
                                        <div class="swiper-wrapper bronze_videos1">
                                            @if(count($l['classData']))
                                                @foreach($l['classData'] as $insFreeData)
                                                <div class="swiper-slide">
                                                    <a href="{{ route('ourClassDetail',$insFreeData['class_id']) }}">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                                <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['class_name'] }}">
                                                                <div class="Play-btn">
                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                </div>
                                                                {{--<div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>--}}
                                                            </div>
                                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                                <h6 style="font-weight:600;">{{ $insFreeData['class_name'] }}</h6>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                </div> -->
                                                            {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                            </div>
                                                            {{--<div class="swiper_block_discipline__profile-box">
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
                                                            </div>--}}
                                                        </div>
                                                    </a>    
                                                </div>
                                                @endforeach
                                            @endif
                                            @php
                                                $free_count = count($l['classData']);
                                                if($free_count == 0)
                                                {
                                                    for($a = 0;$a < 8;$a++)
                                                    {
                                                        @endphp
                                                            <div class="swiper-slide">
                                                            
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                            <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                            <div class="swiper-slide">
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                    <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>
                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <!--End Bronze classes static -->

                        <!--Bronze Beltification static -->
                        <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper__main_blocks">
                                    <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Beltification<sup style="top: -1rem;font-size: 11px;">TM</sup> Videos {{ $l['description'] }}</h2>
                                    <hr>
                                    <div class="swiper bronze_videos mt-4">
                                        <div class="swiper-wrapper bronze_videos1">
                                            @php
                                                for($a = 0;$a < 8;$a++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                        
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                        <div class="Play-btn">
                                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                                        <h6 style="font-weight:600;">Coming Soon</h6>

                                                                    </div>
                                                                    <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                </div> -->
                                                                </div>
                                                            
                                                        </div>
                                                    @php
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>
                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <!--End Bronze Beltification static -->
                    @else
                        <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper__main_blocks">
                                    <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Teaching Videos {{ $l['description'] }}</h2>
                                    <hr>
                                    <div class="swiper bronze_videos mt-4">
                                        <div class="swiper-wrapper bronze_videos1">
                                        @if(count($l['videoData']))
                                            @foreach($l['videoData'] as $insFreeData)
                                            <div class="swiper-slide">
                                                <a href="javascript::void(0)" onclick="upgradePlanModal()">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                            <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] }}">
                                                            <div class="Play-btn">
                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                            </div>
                                                            <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">{{ $insFreeData['title'] }}</h6>
                                                        {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                        </div>
                                                        {{--<div class="swiper_block_discipline__profile-box">
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
                                                        </div>--}}
                                                    </div>
                                                </a>    
                                            </div>
                                            @endforeach
                                            @endif
                                            @php
                                                $free_count = count($l['videoData']);
                                                if($free_count == 0)
                                                {
                                                    for($a = 0;$a < 8;$a++)
                                                    {
                                                        @endphp
                                                            <div class="swiper-slide">
                                                            
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                            <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                            <div class="swiper-slide">
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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

                                    <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>

                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                        <img  onclick="upgradePlanModal()" src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img  onclick="upgradePlanModal()" src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                       
                                </div>
                            </div>
                        </div>
                    

                        <!--Bronze classes static -->
                        <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper__main_blocks">
                                    <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Classes {{ $l['description'] }}</h2>
                                    <hr>
                                    <div class="swiper bronze_videos mt-4">
                                        <div class="swiper-wrapper bronze_videos1">
                                            @if(count($l['classData']))
                                                @foreach($l['classData'] as $insFreeData)
                                                <div class="swiper-slide">
                                                    <a href="{{ route('ourClassDetail',$insFreeData['class_id']) }}">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                                <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['class_name'] }}">
                                                                <div class="Play-btn">
                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                </div>
                                                                {{--<div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>--}}
                                                            </div>
                                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                                <h6 style="font-weight:600;">{{ $insFreeData['class_name'] }}</h6>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                </div> -->
                                                            {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                            </div>
                                                            {{--<div class="swiper_block_discipline__profile-box">
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
                                                            </div>--}}
                                                        </div>
                                                    </a>    
                                                </div>
                                                @endforeach
                                            @endif
                                            @php
                                                $free_count = count($l['classData']);
                                                if($free_count == 0)
                                                {
                                                    for($a = 0;$a < 8;$a++)
                                                    {
                                                        @endphp
                                                            <div class="swiper-slide">
                                                            
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                            <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                            <div class="swiper-slide">
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                        <img onclick="upgradePlanModal()" src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img onclick="upgradePlanModal()" src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                    <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Bronze classes static -->

                        <!--Bronze Beltification static -->
                        <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper__main_blocks">
                                    <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Beltification<sup style="top: -1rem;font-size: 11px;">TM</sup> Videos {{ $l['description'] }}</h2>
                                    <hr>
                                    <div class="swiper bronze_videos mt-4">
                                        <div class="swiper-wrapper bronze_videos1">
                                            @php
                                                for($a = 0;$a < 8;$a++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                        
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                        <div class="Play-btn">
                                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                                        <h6 style="font-weight:600;">Coming Soon</h6>

                                                                    </div>
                                                                    <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                </div> -->
                                                                </div>
                                                            
                                                        </div>
                                                    @php
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                        <img onclick="upgradePlanModal()" src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img onclick="upgradePlanModal()" src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                    <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Bronze Beltification static -->
                    @endif                       
                @endif
            @endforeach
        @endif
    @else
        @if(count($levels))
            @foreach($levels as $main_key => $l)
                
                @if(($main_key ==0) or ($main_key == 1))
                    @if($l['level_id'] == 1)
                    <div class="categories_swiper__slider-block">
                        <div class="container">
                            <div class="swiper__main_blocks">
                                <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Videos</h2>
                                <hr>
                                <div class="swiper custom-swiper{{ $classId }} bronze_videos_ mt-4">
                                    <div class="swiper-wrapper bronze_videos1">
                                    @if(count($l['videoData']))
                                        @foreach($l['videoData'] as $insFreeData)
                                        <div class="swiper-slide">
                                            <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                <div class="maz__swiper_slider_common_block">
                                                    <div class="maz__swiper_block_discipline-img">
                                            
                                                    <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] ?? '' }}">
                                                        {{--<img src="{{ $insFreeData['video_thumbnail'] }}"  alt="{{ $insFreeData['title'] }}">--}}
                                                        <div class="Play-btn">
                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                        </div>
                                                        <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                                    </div>
                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                        <h6 style="font-weight:600;">{{ $insFreeData['title'] }}</h6>
                                                        <!-- <div class="logo-background">
                                                            <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                        </div> -->
                                                    {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                    </div>
                                                    {{--<div class="swiper_block_discipline__profile-box">
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
                                                    </div>--}}
                                                </div>
                                            </a>    
                                        </div>
                                        @endforeach
                                        @endif
                                        @php
                                            $free_count = count($l['videoData']);
                                            if($free_count == 0)
                                            {
                                                for($a = 0;$a < 8;$a++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                        
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                        <div class="Play-btn">
                                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                        </div>
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
                                                                @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                    <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                <div class="Play-btn">
                                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                        </div>
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
                                                                @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                    <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                <div class="Play-btn">
                                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                        </div>
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
                                                                @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                    <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                <div class="Play-btn">
                                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                        </div>
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
                                                                @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                    <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                <div class="Play-btn">
                                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                        </div>
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
                                                                @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                    <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                <div class="Play-btn">
                                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                        </div>
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
                                                                @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                    <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                <div class="Play-btn">
                                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                        </div>
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
                                                        <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                    <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                @else
                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                @endif
                                                                <div class="Play-btn">
                                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                        </div>
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

                                <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                    <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                </div>
                                
                                <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                    <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                </div>
                                {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                
                                    <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                                    
                                </div>
                                <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                    <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @elseif($l['level_id'] == 5)
                    <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper__main_blocks">
                                    <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} For You</h2>
                                    <hr>
                                    <div class="swiper custom-swiper{{ $classId }} bronze_videos_ mt-4">
                                        <div class="swiper-wrapper bronze_videos1">
                                        @if(count($l['videoData']))
                                            @foreach($l['videoData'] as $insFreeData)
                                            <div class="swiper-slide">
                                                <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        
                                                        <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] ?? '' }}">
                                                            {{--<img src="{{ $insFreeData['video_thumbnail'] }}"  alt="{{ $insFreeData['title'] }}">--}}
                                                            <div class="Play-btn">
                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                            </div>
                                                            <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">{{ $insFreeData['title'] }}</h6>
                                                            <!-- <div class="logo-background">
                                                                <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                            </div> -->
                                                        {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                        </div>
                                                        {{--<div class="swiper_block_discipline__profile-box">
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
                                                        </div>--}}
                                                    </div>
                                                </a>    
                                            </div>
                                            @endforeach
                                            @endif
                                            @php
                                                $free_count = count($l['videoData']);
                                                if($free_count == 0)
                                                {
                                                    for($a = 0;$a < 8;$a++)
                                                    {
                                                        @endphp
                                                            <div class="swiper-slide">
                                                            
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                            <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                            <div class="swiper-slide">
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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

                                    <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>
                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                
                                    <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                                    
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper__main_blocks">
                                    <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Teaching Videos {{ $l['description'] }}</h2>
                                    <hr>
                                    <div class="swiper custom-swiper{{ $classId }} bronze_videos_ mt-4">
                                        <div class="swiper-wrapper bronze_videos1">
                                        @if(count($l['videoData']))
                                            @foreach($l['videoData'] as $insFreeData)
                                            <div class="swiper-slide">
                                                <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                        
                                                        <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] ?? '' }}">
                                                            {{--<img src="{{ $insFreeData['video_thumbnail'] }}"  alt="{{ $insFreeData['title'] }}">--}}
                                                            <div class="Play-btn">
                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                            </div>
                                                            <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">{{ $insFreeData['title'] }}</h6>
                                                            <!-- <div class="logo-background">
                                                                <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                            </div> -->
                                                        {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                        </div>
                                                        {{--<div class="swiper_block_discipline__profile-box">
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
                                                        </div>--}}
                                                    </div>
                                                </a>    
                                            </div>
                                            @endforeach
                                            @endif
                                            @php
                                                $free_count = count($l['videoData']);
                                                if($free_count == 0)
                                                {
                                                    for($a = 0;$a < 8;$a++)
                                                    {
                                                        @endphp
                                                            <div class="swiper-slide">
                                                            
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                            <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                            <div class="swiper-slide">
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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

                                    <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>

                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                
                                    <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                                    
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <!--Bronze classes static -->
                        <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper__main_blocks">
                                    <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Classes {{ $l['description'] }}</h2>
                                    <hr>
                                    <div class="swiper custom-swiper{{ $classId }} bronze_videos_ mt-4">
                                        <div class="swiper-wrapper bronze_videos1">
                                            @if(count($l['classData']))
                                                @foreach($l['classData'] as $insFreeData)
                                                <div class="swiper-slide">
                                                    <a href="{{ route('ourClassDetail',$insFreeData['class_id']) }}">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                                <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['class_name'] }}">
                                                                <div class="Play-btn">
                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                </div>
                                                                {{--<div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>--}}
                                                            </div>
                                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                                <h6 style="font-weight:600;">{{ $insFreeData['class_name'] }}</h6>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                </div> -->
                                                            {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                            </div>
                                                            {{--<div class="swiper_block_discipline__profile-box">
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
                                                            </div>--}}
                                                        </div>
                                                    </a>    
                                                </div>
                                                @endforeach
                                            @endif
                                            @php
                                                $free_count = count($l['classData']);
                                                if($free_count == 0)
                                                {
                                                    for($a = 0;$a < 8;$a++)
                                                    {
                                                        @endphp
                                                            <div class="swiper-slide">
                                                            
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                            <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                            <div class="swiper-slide">
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                    <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Bronze classes static -->

                        <!--Bronze Beltification static -->
                        <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper__main_blocks">
                                    <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Beltification<sup style="top: -1rem;font-size: 11px;">TM</sup> Videos {{ $l['description'] }}</h2>
                                    <hr>
                                    <div class="swiper custom-swiper{{ $classId }} bronze_videos_ mt-4">
                                        <div class="swiper-wrapper bronze_videos1">
                                            @php
                                                for($a = 0;$a < 8;$a++)
                                                {
                                                    @endphp
                                                        <div class="swiper-slide">
                                                        
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                            @else
                                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                            @endif
                                                                        <div class="Play-btn">
                                                                            <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="maz__swiper_block_discipline-content pb-2">
                                                                        <h6 style="font-weight:600;">Coming Soon</h6>

                                                                    </div>
                                                                    <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                </div> -->
                                                                </div>
                                                            
                                                        </div>
                                                    @php
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                    <div class="category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Bronze Beltification static -->                          
                    @endif
                @else
                    <div class="load-more-school-content" style="display: none;">
                        @if($l['level_id'] == 1)
                        <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper__main_blocks">
                                    <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Videos</h2>
                                    <hr>
                                    <div class="swiper swiper-within-custom-swiper{{ $class_within_id }} bronze_videos_ mt-4">
                                        <div class="swiper-wrapper bronze_videos1">
                                        @if(count($l['videoData']))
                                            @foreach($l['videoData'] as $insFreeData)
                                            <div class="swiper-slide">
                                                <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <div class="maz__swiper_block_discipline-img">
                                                
                                                        <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] ?? '' }}">
                                                            {{--<img src="{{ $insFreeData['video_thumbnail'] }}"  alt="{{ $insFreeData['title'] }}">--}}
                                                            <div class="Play-btn">
                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                            </div>
                                                            <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                                        </div>
                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                            <h6 style="font-weight:600;">{{ $insFreeData['title'] }}</h6>
                                                            <!-- <div class="logo-background">
                                                                <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                            </div> -->
                                                        {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                        </div>
                                                        {{--<div class="swiper_block_discipline__profile-box">
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
                                                        </div>--}}
                                                    </div>
                                                </a>    
                                            </div>
                                            @endforeach
                                            @endif
                                            @php
                                                $free_count = count($l['videoData']);
                                                if($free_count == 0)
                                                {
                                                    for($a = 0;$a < 8;$a++)
                                                    {
                                                        @endphp
                                                            <div class="swiper-slide">
                                                            
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                            <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                                            <div class="swiper-slide">
                                                                <div class="maz__swiper_slider_common_block">
                                                                    <div class="maz__swiper_block_discipline-img">
                                                                    @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                        <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                    @else
                                                                        <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                    @endif
                                                                    <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
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
                                    {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                    
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                                        
                                    </div>
                                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div> --}}
                                    <div class="under-category-swiper-button-next-{{$classId}} swiper-button-next maz__swiper_btn-next">
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                    </div>
                                    
                                    <div class="under-category-swiper-button-prev-{{$classId}} swiper-button-prev maz__swiper_btn-prev">
                                        <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                    </div>
                                </div>
                            </div>
                            @php
                                $class_within_id++;
                            @endphp
                        </div>
                        @elseif($l['level_id'] == 5)
                        <div class="categories_swiper__slider-block">
                                <div class="container">
                                    <div class="swiper__main_blocks">
                                        <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} For You</h2>
                                        <hr>
                                        <div class="swiper swiper-within-custom-swiper{{ $class_within_id }} bronze_videos_ mt-4">
                                            <div class="swiper-wrapper bronze_videos1">
                                            @if(count($l['videoData']))
                                                @foreach($l['videoData'] as $insFreeData)
                                                <div class="swiper-slide">
                                                    <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                            
                                                            <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] ?? '' }}">
                                                                {{--<img src="{{ $insFreeData['video_thumbnail'] }}"  alt="{{ $insFreeData['title'] }}">--}}
                                                                <div class="Play-btn">
                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                </div>
                                                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                                            </div>
                                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                                <h6 style="font-weight:600;">{{ $insFreeData['title'] }}</h6>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                </div> -->
                                                            {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                            </div>
                                                            {{--<div class="swiper_block_discipline__profile-box">
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
                                                            </div>--}}
                                                        </div>
                                                    </a>    
                                                </div>
                                                @endforeach
                                                @endif
                                                @php
                                                    $free_count = count($l['videoData']);
                                                    if($free_count == 0)
                                                    {
                                                        for($a = 0;$a < 8;$a++)
                                                        {
                                                            @endphp
                                                                <div class="swiper-slide">
                                                                
                                                                        <div class="maz__swiper_slider_common_block">
                                                                            <div class="maz__swiper_block_discipline-img">
                                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                            @else
                                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                            @endif
                                                                                <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                <div class="swiper-slide">
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                        {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                    
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                                        
                                        </div>
                                        <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div> --}}
                                        <div class="under-category-swiper-button-next-{{$class_within_id}} swiper-button-next maz__swiper_btn-next">
                                            <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                        </div>
                                        
                                        <div class="under-category-swiper-button-prev-{{$class_within_id}} swiper-button-prev maz__swiper_btn-prev">
                                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $class_within_id++;
                                @endphp
                            </div>
                        @else
                            <div class="categories_swiper__slider-block">
                                <div class="container">
                                    <div class="swiper__main_blocks">
                                        <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Teaching Videos {{ $l['description'] }}</h2>
                                        <hr>
                                        <div class="swiper swiper-within-custom-swiper{{ $class_within_id }} bronze_videos_ mt-4">
                                            <div class="swiper-wrapper bronze_videos1">
                                            @if(count($l['videoData']))
                                                @foreach($l['videoData'] as $insFreeData)
                                                <div class="swiper-slide">
                                                    <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                            
                                                            <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['title'] ?? '' }}">
                                                                {{--<img src="{{ $insFreeData['video_thumbnail'] }}"  alt="{{ $insFreeData['title'] }}">--}}
                                                                <div class="Play-btn">
                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                </div>
                                                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                                                            </div>
                                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                                <h6 style="font-weight:600;">{{ $insFreeData['title'] }}</h6>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                </div> -->
                                                            {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                            </div>
                                                            {{--<div class="swiper_block_discipline__profile-box">
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
                                                            </div>--}}
                                                        </div>
                                                    </a>    
                                                </div>
                                                @endforeach
                                                @endif
                                                @php
                                                    $free_count = count($l['videoData']);
                                                    if($free_count == 0)
                                                    {
                                                        for($a = 0;$a < 8;$a++)
                                                        {
                                                            @endphp
                                                                <div class="swiper-slide">
                                                                
                                                                        <div class="maz__swiper_slider_common_block">
                                                                            <div class="maz__swiper_block_discipline-img">
                                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                            @else
                                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                            @endif
                                                                                <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                <div class="swiper-slide">
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                        {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                    
                                        <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                                        
                                        </div>
                                        <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div> --}}

                                        <div class="under-category-swiper-button-next-{{ $class_within_id }} swiper-button-next maz__swiper_btn-next">
                                            <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                        </div>
                                        
                                        <div class="under-category-swiper-button-prev-{{ $class_within_id }} swiper-button-prev maz__swiper_btn-prev">
                                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $class_within_id++;
                                @endphp
                            </div>

                            <!--Bronze classes static -->
                            <div class="categories_swiper__slider-block">
                                <div class="container">
                                    <div class="swiper__main_blocks">
                                        <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Classes {{ $l['description'] }}</h2>
                                        <hr>
                                        <div class="swiper swiper-within-custom-swiper{{ $class_within_id }} bronze_videos_ mt-4">
                                            <div class="swiper-wrapper bronze_videos1">
                                                @if(count($l['classData']))
                                                    @foreach($l['classData'] as $insFreeData)
                                                    <div class="swiper-slide">
                                                        <a href="{{ route('ourClassDetail',$insFreeData['class_id']) }}">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                    <img src="{{ str_replace('image_crop_resized=200x120','',$insFreeData['video_thumbnail']) ?? '' }}"  alt="{{ $insFreeData['class_name'] }}">
                                                                    <div class="Play-btn">
                                                                        <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                    </div>
                                                                    {{--<div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>--}}
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">{{ $insFreeData['class_name'] }}</h6>
                                                                    <!-- <div class="logo-background">
                                                                        <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                    </div> -->
                                                                {{--<p class="description">{{ $insBronzeData['description'] }}</p>--}}
                                                                </div>
                                                                {{--<div class="swiper_block_discipline__profile-box">
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
                                                                </div>--}}
                                                            </div>
                                                        </a>    
                                                    </div>
                                                    @endforeach
                                                @endif
                                                @php
                                                    $free_count = count($l['classData']);
                                                    if($free_count == 0)
                                                    {
                                                        for($a = 0;$a < 8;$a++)
                                                        {
                                                            @endphp
                                                                <div class="swiper-slide">
                                                                
                                                                        <div class="maz__swiper_slider_common_block">
                                                                            <div class="maz__swiper_block_discipline-img">
                                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                                <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                            @else
                                                                                <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                            @endif
                                                                                <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                                                <div class="swiper-slide">
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                        @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                            <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                        @else
                                                                            <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                        @endif
                                                                        <div class="Play-btn">
                                                                                    <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                                </div>
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
                                        {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                            <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                        </div>
                                        <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div> --}}
                                        <div class="under-category-swiper-button-next-{{$class_within_id}} swiper-button-next maz__swiper_btn-next">
                                            <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                        </div>
                                        
                                        <div class="under-category-swiper-button-prev-{{$class_within_id}} swiper-button-prev maz__swiper_btn-prev">
                                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $class_within_id++;
                                @endphp
                            </div>
                            <!--End Bronze classes static -->

                            <!--Bronze Beltification static -->
                            <div class="categories_swiper__slider-block">
                                <div class="container">
                                    <div class="swiper__main_blocks">
                                        <h2 class="mb-3 mb-md-0">{{ $l['level_name'] }} Beltification<sup style="top: -1rem;font-size: 11px;">TM</sup> Videos {{ $l['description'] }}</h2>
                                        <hr>
                                        <div class="swiper swiper-within-custom-swiper{{ $class_within_id }} bronze_videos_ mt-4">
                                            <div class="swiper-wrapper bronze_videos1">
                                                @php
                                                    for($a = 0;$a < 8;$a++)
                                                    {
                                                        @endphp
                                                            <div class="swiper-slide">
                                                            
                                                                    <div class="maz__swiper_slider_common_block">
                                                                        <div class="maz__swiper_block_discipline-img">
                                                                            @if(isset($instructorDisciplineDetails->video_coming_soon_image) && !empty($instructorDisciplineDetails->video_coming_soon_image))
                                                                                    <img src="{{ $instructorDisciplineDetails->video_coming_soon_image }}"  alt="">
                                                                                @else
                                                                                    <img src="{{asset('assets/front/images/download.jpeg')}}"  alt="">
                                                                                @endif
                                                                            <div class="Play-btn">
                                                                                <i class="fa-regular fa-circle-play fa-2xl"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="maz__swiper_block_discipline-content pb-2">
                                                                            <h6 style="font-weight:600;">Coming Soon</h6>

                                                                        </div>
                                                                        <!-- <div class="logo-background">
                                                                        <img class="reward-logo" src="{{ asset('assets/front/images/rewards.png') }}">
                                                                    </div> -->
                                                                    </div>
                                                                
                                                            </div>
                                                        @php
                                                    }
                                                @endphp
                                            </div>
                                        </div>
                                        {{-- <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                                            <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                        </div>
                                        <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div> --}}
                                        <div class="under-category-swiper-button-next-{{$class_within_id}} swiper-button-next maz__swiper_btn-next">
                                            <img src="{{ asset('assets/front/images/next.png') }}"  alt="arrows">
                                        </div>
                                        
                                        <div class="under-category-swiper-button-prev-{{$class_within_id}} swiper-button-prev maz__swiper_btn-prev">
                                            <img src="{{ asset('assets/front/images/previous.png') }}"  alt="arrows">
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $class_within_id++;
                                @endphp
                            </div>
                            <!--End Bronze Beltification static -->                          
                        @endif
                    </div>
                @endif
                @php
                    $classId++;   
                @endphp
            @endforeach
        @endif
    @endauth                       
    <!-- End Dynamic Video Section-->                               

</section>


<!-- Instructor review start -->
<section class="maz__sections" id="review">
    <div class="container">
        <div class="ms-5x maz__titl-block d-flex align-items-center">
            <h2 class="text-uppercase mb-0">
                Reviews
            </h2>
            <span class="review-summ ms-4 text-dark">
            @if($instructorDetailData['rating'] == 1)
                <i class="fa fa-star-half-o text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <span class="me-2">0.5 (5 Product ratings)</span>
            @elseif($instructorDetailData['rating'] == 2)
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <span class="me-2">1.0</span>
            @elseif($instructorDetailData['rating'] == 3)
                <i class="fas fa-star text-warning me-1 tooltip><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fa fa-star-half-o text-warning me-1 tooltip" ><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <span class="me-2">1.5 (5 Product ratings)</span>
            @elseif($instructorDetailData['rating'] == 4)
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <span class="me-2">2.0 (5 Product ratings)</span>
            @elseif($instructorDetailData['rating'] == 5)
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fa fa-star-half-o text-warning me-1 tooltip" ><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <span class="me-2">2.5</span>
            @elseif($instructorDetailData['rating'] == 6)
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <span class="me-2">3.0 (5 Product ratings)</span>
            @elseif($instructorDetailData['rating'] == 7)
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fa fa-star-half-o text-warning me-1 tooltip" ><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <span class="me-2">3.5</span>
            @elseif($instructorDetailData['rating'] == 8)
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <span class="me-2">4.0 (5 Product ratings)</span>
            @elseif($instructorDetailData['rating'] == 9)
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fa fa-star-half-o text-warning me-1 tooltip" ><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <span class="me-2">4.5 (5 Product ratings)</span>
            @elseif($instructorDetailData['rating'] == 10)
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="fas fa-star text-warning me-1 tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <span class="me-2">5.0 (5 Product ratings)</span>
            @else
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <i class="far fa-star instructor-rating tooltip"><span class="tooltiptext" id="description"><b>Coming Soon</b></span></i>
                <span class="me-2">0.0 (5 Product ratings)</span>
            @endif
            </span>
        </div>
        <div class="maz_leave-comment-block">
            <!-- <label for="" class="">Your rating <span class="text-danger">*</span></label>
            <span class="star-rating">
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </span> -->

            <div class="review-form-block-wrapper mb-5">
                
                <div class="review-form-block-2">
                    <div class="maz__instructor-rating-box">
                        <div class="star-review-rating">
                            <!-- <div class="text-center font-text h1">4.5 <span class="fas fa-star"></span></div>
                            <div class="maz__instructor-rating-title h5 mb-4 text-center fw-normal">5 Ratings & 0 Reviews</div> -->
                            <div class="d-flex align-items-center">
                                <span class="text-dark d-flex align-items-center justify-content-stat">5
                                    <img src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                </span>
                                <div class="progress cmn-progress-bar ms-2">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <span class="maz__cmn-rating-percentage ms-3">75%</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="text-dark d-flex align-items-center justify-content-stat">4
                                    <img src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                </span>
                                <div class="progress cmn-progress-bar ms-2">
                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <span class="maz__cmn-rating-percentage ms-3">60%</span>
                            </div>

                            <div class="d-flex align-items-center">
                                <span class="text-dark d-flex align-items-center justify-content-stat">3
                                    <img src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                </span>
                                <div class="progress cmn-progress-bar ms-2">
                                    <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <span class="maz__cmn-rating-percentage ms-3">40%</span>
                            </div>

                            <div class="d-flex align-items-center">
                                <span class="text-dark d-flex align-items-center justify-content-stat">2
                                    <img src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                </span>
                                <div class="progress cmn-progress-bar ms-2">
                                    <div class="progress-bar" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <span class="maz__cmn-rating-percentage ms-4">0%</span>
                            </div>

                            <div class="d-flex align-items-center">
                                <span class="text-dark d-flex align-items-center justify-content-stat">1
                                    <img src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                </span>
                                <div class="progress cmn-progress-bar ms-2">
                                    <div class="progress-bar" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <span class="maz__cmn-rating-percentage ms-4">0%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-form-block-1">
                    <div class="row">
                        <label for="" class="">Your rating <span class="text-danger">*</span></label>
                        <div id='rating' class="tooltip">
                            <button class="tooltiptext4 btn" id="description"><b>Coming Soon</b></button>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                           
                        </div>
                        <div class="col-md-6 mb-1 tooltip">
                            <label class="col-form-label fw-normal" for="">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" readonly>
                            <span class="tooltiptext1" id="description"><b>Coming Soon</b></span>
                        </div>
                        <div class="col-md-6 mb-1 tooltip">
                            <label class="col-form-label fw-normal" for="">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control tooltip" readonly>
                            <span class="tooltiptext1" id="description"><b>Coming Soon</b></span>
                        </div>
                        <div class="col-lg-12 mb-1 tooltip">
                            <label class="col-form-label fw-normal" for="">How's your overall learning experience? <span class="text-danger">*</span></label>
                            <select name="" id="" class="form-control tooltip" disabled>
                                <option value="select" class="active">Select</option>
                                <option value="">Excellent</option>
                                <option value="">Good</option>
                                <option value="">Ok</option>
                                <option value="">Poor</option>
                            </select>
                            <span class="tooltiptext1" id="description"><b>Coming Soon</b></span>
                        </div>
                        <div class="col-lg-12 mb-3 tooltip">
                            <label class="col-form-label fw-normal" for="">Enter your detailed reviews here <span class="text-danger">*</span></label>
                            <textarea class="form-control h-100p tooltip" name="" id="" cols="30" rows="10" readonly></textarea>
                            <span class="tooltiptext2" id="description"><b>Coming Soon</b></span>
                        </div>
                        <div class="col-lg-12 tooltip">
                            <button class="btn btn-primary btn-lg fw-bold btn-add-review font-title tooltip disabled">Add Review</button>
                            <span class="tooltiptext3" id="description"><b>Coming Soon</b></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="maz__instructor-title-block">
                <h4 class="fw-bold">Top Reviews</h4>
                <div class="maz__cmn-dropdown ms-4">
                    <select class="form-select">
                        <option selected>ALL</option>
                    </select>
                </div>
            </div>

            <div class="maz__instructor-top-review">

                <figure class="maz__reve-fig">
                    <img src="{{ asset('assets/front/images/no-image.png') }}" alt="review-image" >
                </figure>
                <div class="maz__reve-content">
                    <h5 class="mb-0">I love it too! <span class="maz__instructor-review-date ms-2">October 20, 2021</span></h5>
                    <p class="mb-0">Beautiful theme. Love it. Keep update & improve</p>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="far fa-star instructor-rating"></span>
                    <span class="text-dark fs-6 ms-2">4.0</span>
                </div>

            </div>

            <div class="maz__instructor-top-review">

                <figure class="maz__reve-fig">
                    <img src="{{ asset('assets/front/images/no-image.png') }}" alt="review-image" >
                </figure>
                <div class="maz__reve-content">
                    <h5 class="mb-0">I love it too! <span class="maz__instructor-review-date ms-2">October 20, 2021</span></h5>
                    <p class="mb-0">Beautiful theme. Love it. Keep update & improve</p>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="far fa-star instructor-rating"></span>
                    <span class="text-dark fs-6 ms-2">4.0</span>
                </div>

            </div>

            <div class="maz__instructor-top-review">

                <figure class="maz__reve-fig">
                    <img src="{{ asset('assets/front/images/no-image.png') }}" alt="review-image" >
                </figure>
                <div class="maz__reve-content">
                    <h5 class="mb-0">I love it too! <span class="maz__instructor-review-date ms-2">October 20, 2021</span></h5>
                    <p class="mb-0">Beautiful theme. Love it. Keep update & improve</p>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="fas fa-star instructor-rating"></span>
                    <span class="far fa-star instructor-rating"></span>
                    <span class="text-dark fs-6 ms-2">4.0</span>
                </div>

            </div>


        </div>
    </div>
</section>
<!-- Instructor Review end -->
@endsection

@push('scripts')
    <script>
        $("body").addClass('instructor-detail-body');

        function redirectto()
        {
            window.location.href = "{{ route('student.login') }}";
        }

        $(function() {
            if(screen.width >= 1600)
            {
                $(".swiper-button-next").removeClass("swiper-button-disabled");
            }
        });
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
                   
                    $("#disciplineId").val(currentActiveSlide.id);
                    $("#swiperImageTitle").text(currentActiveSlide.title);
                    $("#swiperImageDescription").text(currentActiveSlide.description);
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

                        var instructorBiographyData = result.instructorBiographyData;
                      
                        if(instructorBiographyData.length > 0)
                        {
                           
                            for(var i = 0; i < instructorBiographyData.length; i++)
                            {
                                console.log(instructorBiographyData[i].name);
                               $(".schools_and_instructors1").append('<div class="swiper-slide">'+
                                                                        '<div class="maz__swiper_slider_common_block">'+
                                                                            '<div class="maz__swiper_block_discipline-img">'+
                                                                                '<img src="'+instructorBiographyData[i].photo+'"  alt="'+instructorBiographyData[i].name+'">'+
                                                                            '</div>'+
                                                                            '<div class="maz__swiper_block_discipline-content pb-2">'+
                                                                                '<h6>'+instructorBiographyData[i].name+'</h6>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'    
                                                                    );
                            }
                        }
                        
                        var instructorFreeVideoData = result.instructorFreeVideoData;

                        if(instructorFreeVideoData.length > 0)
                        {
                            for(var j = 0; j < instructorFreeVideoData.length; j++)
                            {
                               $(".free_videos1").append('<div class="swiper-slide">'+
                                                            '<div class="maz__swiper_slider_common_block">'+
                                                                '<div class="maz__swiper_block_discipline-img">'+
                                                                    '<img src="'+instructorFreeVideoData[j].lession_thumbnail+'"  alt="'+instructorFreeVideoData[j].title+'">'+
                                                                '</div>'+
                                                                '<div class="maz__swiper_block_discipline-content">'+
                                                                    '<h6>'+instructorFreeVideoData[j].title+'</h6>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'    
                                                        );
                            }
                        }

                        var instructorBronzeVideoData = result.instructorBronzeVideoData;

                        if(instructorBronzeVideoData.length > 0)
                        {
                            for(var k = 0; k < instructorBronzeVideoData.length; k++)
                            {
                               $(".bronze_videos1").append('<div class="swiper-slide">'+
                                                            '<div class="maz__swiper_slider_common_block">'+
                                                                '<div class="maz__swiper_block_discipline-img">'+
                                                                    '<img src="'+instructorBronzeVideoData[k].lession_thumbnail+'"  alt="'+instructorBronzeVideoData[k].title+'">'+
                                                                '</div>'+
                                                                '<div class="maz__swiper_block_discipline-content">'+
                                                                    '<h6>'+instructorBronzeVideoData[k].title+'</h6>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'    
                                                        );
                            }
                        }

                        
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
        document.querySelector('#rating').addEventListener('click', function (e) {
            let action = 'add';
            for (const span of this.children) {
                span.classList[action]('active');
                if (span === e.target) action = 'remove';
            }
        });

        function upgradePlanModal()
        {
            Swal.fire({
            title: '<h5> Upgrade to Bronze plan to view content </h5>',
            iconHtml: '<img src="{{ asset('images/infoIcon1.png') }}">',
            //icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'

            }).then((result) => {
                if (result.value) {
                    var instructorId = $("#instructorId").val();

                    var currentInstructorId = 'lastPage=schools-and-instructors-detail/'+instructorId;

                    var url = '{{ route("bronzePlanStripe",":id") }}';

                    url = url.replace(':id',currentInstructorId);
            
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
            var instructorId = $("#instructorId").val();

            var currentInstructorId = 'lastPage=schools-and-instructors-detail/'+instructorId;

            var url = '{{ route("student.login",":id") }}';

            url = url.replace(':id',currentInstructorId);

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
        
        function changeVideo(videoId)
        {
            if(videoId)
            {
               // $("#demonstartionVideoSection").empty();

                $("#demonstartionVideoSection").append('<div class="embed-responsive-item wistia_embed wistia_async_'+videoId+' resumable=true playlistLinks=auto qualityMin=1080 autoPlay=false endVideoBehavior=loop videoFoam=true muted=false controlsVisibleOnLoad=false fullscreenButton=true"></div>');
            }
        }
    </script>
    <script>
        if((is_dacast_video == 1) && (CONTENT_ID !='')){
            var myPlayer = dacast(CONTENT_ID, 'bio-demo-dacast-video-player', { 
                width: '100%', 
                height: 700,
                // player: "flow7"
            });
        }
        else{
            var video_id = $('#video_id').val();
            window._wq = window._wq || [];

            _wq.push({ id: video_id, onReady: function(video) {

                if(video.height() > 627)
                {
                    video.height(627);
                }
            }});
        }

        $("button.view-more-school-btn").click(function(){
            var $this = $(this);
            if($this.text() == 'View All'){
                $('div.load-more-school-content').show();
                $this.text('Hide');
            }
            else{
                $('div.load-more-school-content').hide();
                $this.text('View All');
            }
        });

        total_levels = parseInt("{{ count($levels) }}");
        for(j=0;j< total_levels; j++){
            var swiper2 = new Swiper(".custom-swiper"+j, {
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

        // /*
            var total_under_levels = $('.load-more-school-content .categories_swiper__slider-block .swiper__main_blocks .swiper').length
            console.log(total_under_levels);
            for(j=0;j< total_under_levels; j++){
                var swiper2 = new Swiper(".load-more-school-content .categories_swiper__slider-block .swiper__main_blocks .swiper.swiper-within-custom-swiper"+j, {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    cssMode: true,
                    navigation: {
                        nextEl: ".under-category-swiper-button-next-"+j,
                        prevEl: ".under-category-swiper-button-prev-"+j,
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
        // */
    </script>
    
@endpush
