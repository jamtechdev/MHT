@extends('front.layouts.app')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
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


    @media only screen and(max-width:767px){
    .swiper-button-prev.maz__swiper_btn-prev{
        left:-50px !important;
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
    </style>
    
    <section class="maz__common_background_banner lozad-background"
        data-background-image="{{ asset('assets/front/images/common-bg-banner.jpg') }}">
        <div class="maz__common-bg-content">
            <h1>Instructor Video Gallery</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"> Home </li>
                    <li class="breadcrumb-item" aria-current="page">Instructor Videos</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="maz__bg_gray maz__sections">
        <div class="container">
            <div class="col-md-12 mb-3" style="height:auto">
                <!-- <div class="main"> -->
                    <!-- Actual search box -->
                  {{--  <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" id="searchVedio" class="form-control" placeholder="Search" value="{{ isset($text_search) ? $text_search : ''}}">
                    </div>--}}

                    <!-- Another variation with a button -->
                    <form class='form-horizontal' method="POST" action="{{ route('instructor-video1')}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Search , instructors, and classes" value="{{ isset($text_search) ? $text_search : ''}}" required>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                                </button>
                            </div> 
                        </div>
                        <div id="search_list">
                                <ul id="search_list1">

                                </ul>
                            </div>  
                    </form>    
                <!-- </div> -->
            </div>
            <div id="vedios">
                @if (count($instructorFreeVideosData) && count($instructorsData))
                    @foreach ($instructorsData as $insData)
                        <div class="row justify-content-between align-items-center">
                            <div class="col-xxl-8 col-md-7">
                                <h5 class="text-uppercase mb-3 mb-md-0">{{ $insData }}</h5>
                            </div>
                        </div>
                        <hr>
                        <!-- Free Videos -->
                        <div class="categories_swiper__slider-block">
                            <div class="container">
                                <div class="swiper free_videos mt-4">
                                    <div class="swiper-wrapper">
                                        @foreach ($instructorFreeVideosData as $insVideosData)
                                            @if ($insVideosData['employee_name'] == $insData)
                                                <div class="swiper-slide">
                                                    <div class="maz__swiper_slider_common_block">
                                                        <a href="{{ Route('instructor-wistia-free-video', ['id' => $insVideosData['video_id'], 'name' => $insData]) }}">
                                                            <div class="maz__swiper_block_discipline-img">
                                                                <input type="hidden" id="thumbnail_url" value="{{ $insVideosData['thumbnail_url'] }}">
                                                                <input type="hidden" id="video_id" value="{{ $insVideosData['video_id'] }}">
                                                                <img data-src="{{ $insVideosData['thumbnail_url'] }}" class="lazy wistia-thumbnail" alt="{{ str_replace('_', ' ', $insVideosData['title']) }}">
                                                                {{--<div class="embed-responsive embed-responsive-16by9" style="height:100px;"><div class="wistia_embed wistia_async_{{ $insVideosData['video_id'] }} preload=metadata controlsVisibleOnLoad=false endVideoBehavior=loop playButton=false playlistLinks=auto autoPlay=false videoFoam=true" style='transform: scale(1.0);height:2000px;max-width:1496px;position:relative;'>&nbsp;</div></div>--}}
                                                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insVideosData['duration'])->format('i:s'); }}</div>
                                                            </div>
                                                        </a>
                                                        <div class="maz__swiper_block_discipline-content">
                                                            <h6 class="maz__swiper__block-title mt-2">{{ str_replace('_', ' ', $insVideosData['title']) }}</h6>
                                                        </div>
                                                        {{-- <div class="swiper_block_discipline__profile-box">
                                                            <div class="badge-icons">
                                                                <img data-src="{{ asset('assets/front/images/medal.svg') }}"
                                                                    class="lazy" alt="icon group">
                                                                <span>Bronze</span>
                                                            </div>
                                                            <div class="badge-icons">
                                                                <img data-src="{{ asset('assets/front/images/video.svg') }}"
                                                                    class="lazy" alt="icon group">
                                                                <span>123</span>
                                                            </div>
                                                            <div class="badge-icons">
                                                                <img data-src="{{ asset('assets/front/images/belt.svg') }}"
                                                                    class="lazy" alt="icon group">
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next maz__swiper_btn-next">
                                        <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy"
                                            alt="arrows">
                                    </div>
                                    <div class="swiper-button-prev maz__swiper_btn-prev">
                                        <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy"
                                            alt="arrows">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>    
            <!-- Free Videos End -->
        </div>
    </section>
@endsection
@push('scripts')
     


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>                                                           
    <script>
        $(document).ready(function() {
            // Change Instructor Dropdown Than Change Video
            $("#selInstructorName").change(function() {
                window.location.href = $(this).val();
            });

            // Initialize Swiper Free videos Slider
            var freeVideosSwiper = new Swiper(".free_videos", {
                slidesPerView: 1,
                spaceBetween: 20,
                slidesPerGroup: 1,
                cssMode: true,
                lazy: true,
                preloadImages: false,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                lazy: {
                    loadPrevNext: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 24,
                        slidesPerGroup: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 24,
                        slidesPerGroup: 3,
                    },
                    1440: {
                        slidesPerView: 4,
                        slidesPerGroup: 4,
                    },
                },
            });

            // Initialize Swiper Paid videos Slider
            /*var swiper = new Swiper(".schools_and_instructors", {
                slidesPerView: 1,
                spaceBetween: 20,
                slidesPerGroup: 1,
                cssMode: true,
                lazy: true,
                preloadImages: false,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                lazy: {
                    loadPrevNext: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 24,
                        slidesPerGroup: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 24,
                        slidesPerGroup: 3,
                    },
                    1440: {
                        slidesPerView: 4,
                        slidesPerGroup: 4,
                    },
                },
            });*/

            $( "#search" ).autocomplete({
                source: function( request, response ) {
                // Fetch data
                $.ajax({
                    url:"{{route('getSearchText')}}",
                    type: 'post',
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        search: request.term
                    },
                    success: function( data ) {

                        var resp = $.map(data,function(obj){
                            return obj;
                        }); 
            
                        response(resp.slice(0, 10));
                    }
                });
                },
            });

            // $(".maz__swiper_block_discipline-img").mouseover(function(){
            
            //     // $(this).find('img').remove();
               
            //     var video_id = $(this).find('#video_id').val();
               
            //     // $(this).prepend("<div class='embed-responsive embed-responsive-16by9' style='height:200px;'><div class='wistia_embed wistia_async_"+video_id+" playlistLinks=auto autoPlay=true videoFoam=true' style='transform: scale(1.0);height:2000px;max-width:1496px;position:relative;'>&nbsp;</div>");

            //     _wq.push({ id: video_id, onReady: function(video) {
            //         video.mute()
            //        // video.currentTime(1);
            //         video.playbackRate(1.25);
            //         video.play();
            //     }});
              
               
            // });
            // $(".maz__swiper_block_discipline-img").mouseout(function(){
            //     // $(this).find('div').remove();
            //     // var url = $(this).find('#thumbnail_url').val();
            //     // $(this).prepend("<img src="+url+" id='video_preview' class='lazy wistia-thumbnail' alt=''>");
            //     var video_id = $(this).find('#video_id').val();
            //     _wq.push({ id: video_id, onReady: function(video) {
            //         video.pause()
                   
            //     }});
            // });
            
        });
    </script>
@endpush
