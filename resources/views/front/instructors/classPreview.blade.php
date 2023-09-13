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

</style>

<input type="hidden" id="instructorId" value="{{ request()->segment(2) }}">
{{--<section class="maz__common_background_banner maz__instructor_detail_banner lozad-background bg-primary" @if($instructorDetailData['banner'] != '') data-background-image="{{ $instructorDetailData['banner'] }}" @endif>--}}
{{--  data-background-image="{{ asset('assets/front/images/instructor-detail-banner.jpg') }}" --}}
    <div class="container mt-5">
        <div class="maz__common-bg-content row">
            <div class="col-md-6">
                <h1>{{ $classData['class_name'] }}</h1>
                {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"> Home </li>
                        <li class="breadcrumb-item"> Disciplines </li>
                        <li class="breadcrumb-item"> karate </li>
                        <li class="breadcrumb-item" aria-current="page">Kimber Martial Arts</li>
                    </ol>
                </nav> --}}
            </div>
        </div>
    </div>
</section>

<section class="maz__bg_gray maz__sections">
    <div class="categories_swiper__slider-block">
        <div class="container">
            <div class="swiper__main_blocks">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <input type="hidden" value="{{$firstVedio->video_id ?? ''}}" id="video_id">
                        <div class="embed-responsive embed-responsive-16by9 swiper-slide" id="demonstartionVideoSection">
                            @if(isset($firstVedio->video_id))
                                <div class="embed-responsive-item wistia_embed wistia_async_{{ $firstVedio->video_id }} resumable=true playlistLinks=auto qualityMin=1080 autoPlay=false endVideoBehavior=loop videoFoam=true muted=false controlsVisibleOnLoad=false fullscreenButton=true"></div>
                            @else
                                <img class="img-responsive img-fluid" src="{{ asset('assets/front/images/no_video.png') }}" />
                            @endif
                        </div>
                    </div>
                </div>
                {{--<div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                    <img data-src="{{ asset('assets/front/images/next.png') }}" class="lazy" alt="arrows">
                </div>
                <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                    <img data-src="{{ asset('assets/front/images/previous.png') }}" class="lazy" alt="arrows">
                </div>--}}
            </div>
        </div>
    </div>
    <div class="col-m-12 mt-3 mb-3">
        <div class="text-center">
            <h2 id="video_name">{{ $firstVedio->title }}</h2>
        </div>
    </div>
    <!--Schools and Instructors-->
        <div class="categories_swiper__slider-block pt-5">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="mb-1 mb-md-0">Class Videos</h2>
                    <div class="swiper schools_and_instructors mt-2">
                        <div class="swiper-wrapper schools_and_instructors1">
                        @if(count($instructorClassVideos))
                            @foreach($instructorClassVideos as $insData)
                          
                                <div class="swiper-slide">
                                    <a href="#wistia_{{$insData['video_id']}}" onclick="changeVideoName('{{ $insData['title'] }}' , '{{ $insData['video_id'] }}')">
                                        <div class="maz__swiper_slider_common_block">
                                            <div class="maz__swiper_block_discipline-img">
                                                <img data-src="{{ str_replace('image_crop_resized=200x120','',$insData['photo']) ?? '' }}" class="lazy" alt="{{ $insData['name'] }}">
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
                        {{--@php
                            $schools_count = count($instructorClassVideos);
                            
                            if($schools_count == 0)
                            {
                                for($j = 0;$j < 4;$j++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if(isset($disciplineDetails->video_coming_soon_image) && !empty($disciplineDetails->video_coming_soon_image))
                                                        <img data-src="{{ $disciplineDetails->video_coming_soon_image}}" class="lazy" alt="">
                                                    @else
                                                        <img data-src="{{asset('assets/front/images/download.jpeg')}}" class="lazy" alt="">
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
                                for($i = 0;$i < 3;$i++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if(isset($disciplineDetails->video_coming_soon_image) && !empty($disciplineDetails->video_coming_soon_image))
                                                        <img data-src="{{ $disciplineDetails->video_coming_soon_image}}" class="lazy" alt="">
                                                    @else
                                                        <img data-src="{{asset('assets/front/images/download.jpeg')}}" class="lazy" alt="">
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
                                for($i = 0;$i < 2;$i++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                @if(isset($disciplineDetails->video_coming_soon_image) && !empty($disciplineDetails->video_coming_soon_image))
                                                    <img data-src="{{ $disciplineDetails->video_coming_soon_image}}" class="lazy" alt="">
                                                @else
                                                    <img data-src="{{asset('assets/front/images/download.jpeg')}}" class="lazy" alt="">
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
                                for($i = 0;$i < 1;$i++)
                                {
                                    @endphp
                                        <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block">
                                                <div class="maz__swiper_block_discipline-img">
                                                    @if(isset($disciplineDetails->video_coming_soon_image) && !empty($disciplineDetails->video_coming_soon_image))
                                                        <img data-src="{{ $disciplineDetails->video_coming_soon_image}}" class="lazy" alt="">
                                                    @else
                                                        <img data-src="{{asset('assets/front/images/download.jpeg')}}" class="lazy" alt="">
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
                           
                        @endphp --}}   
                        </div>
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img data-src="{{ asset('assets/front/images/next.png') }}" class="lazy" alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img data-src="{{ asset('assets/front/images/previous.png') }}" class="lazy" alt="arrows">
                    </div>
                </div>
            </div>
        </div>
    <!-- Schools and Instructors end -->
                      

</section>
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

        function changeVideoName(title, video_id)
        {
            $("#video_name").empty();
            $("#video_name").text(title);

            $("#video_id").empty();
            $("#video_id").text(video_id);
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
                                                                                '<img src="'+instructorBiographyData[i].photo+'" class="lazy" alt="'+instructorBiographyData[i].name+'">'+
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
                                                                    '<img src="'+instructorFreeVideoData[j].lession_thumbnail+'" class="lazy" alt="'+instructorFreeVideoData[j].title+'">'+
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
                                                                    '<img src="'+instructorBronzeVideoData[k].lession_thumbnail+'" class="lazy" alt="'+instructorBronzeVideoData[k].title+'">'+
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
        var video_id = $('#video_id').val();
        window._wq = window._wq || [];

        _wq.push({ id: video_id, onReady: function(video) {

            if(video.height() > 627)
            {
                video.height(627);
            }
        }});
    </script>
    
@endpush
