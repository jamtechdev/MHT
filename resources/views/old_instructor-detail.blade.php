@extends('front.layouts.app')

@section('content')

<section class="maz__common_background_banner maz__instructor_detail_banner lozad-background bg-primary" @if($instructorDetailData['banner'] != '') data-background-image="{{ $instructorDetailData['banner'] }}" @endif>
{{--  data-background-image="{{ asset('assets/front/images/instructor-detail-banner.jpg') }}" --}}
    <div class="maz__common-bg-content">
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
</section>
<section class="maz__bg_gray maz__sections">

    <div class="maz__instructor_video-block">
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
    </div>

    <!-- Schools and Instructors -->
    @if(count($instructorBiographyData))
    <div class="categories_swiper__slider-block">
        <div class="container">
            <h2 class="text-uppercase mb-3 mb-md-0">Instructor Biography & Demonstrations</h2>
            <hr>
            <div class="swiper schools_and_instructors mt-4">
                <div class="swiper-wrapper">
                    @foreach($instructorBiographyData as $insBiographyData)
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img data-src="{{ $insBiographyData['video_thumbnail'] }}" class="lazy" alt="{{ $insBiographyData['title'] }}">
                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insBiographyData['video_duration'])->format('i:s'); }}</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content">
                                <h6>{{ $insBiographyData['title'] }}</h6>
                                <p class="description">{{ $insBiographyData['description'] }}</p>
                            </div>
                            <div class="swiper_block_discipline__profile-box">
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/medal.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>Bronze</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/video.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>123</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/belt.svg') }}" class="lazy"
                                        alt="icon group">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next maz__swiper_btn-next category-swiper-button-next">
                    <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
                <div class="swiper-button-prev maz__swiper_btn-prev category-swiper-button-prev">
                    <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Schools and Instructors end -->

    <!-- Free Videos -->
    @if(!empty($instructorFreeVideoData))
    <div class="categories_swiper__slider-block">
        <div class="container">
            <h2 class="text-uppercase mb-3 mb-md-0">Free Videos</h2>
            <hr>
            <div class="swiper free_videos mt-4">
                <div class="swiper-wrapper">
                    @foreach($instructorFreeVideoData as $insFreeData)
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img data-src="{{ $insFreeData['lession_thumbnail'] }}" class="lazy" alt="{{ $insFreeData['title'] }}">
                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insFreeData['video_duration'])->format('i:s'); }}</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content">
                                <h6>{{ $insFreeData['title'] }}</h6>
                                <p class="description">{{ $insFreeData['description'] }}</p>
                            </div>
                            <div class="swiper_block_discipline__profile-box">
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/medal.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>Bronze</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/video.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>123</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/belt.svg') }}" class="lazy"
                                        alt="icon group">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next maz__swiper_btn-next category-swiper-button-next">
                    <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
                <div class="swiper-button-prev maz__swiper_btn-prev category-swiper-button-prev">
                    <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
            </div>
        </div>

    </div>
    @endif
    <!-- Free Videos end -->

    <!-- Recommended for You -->
    @if(!empty($instructorRecommendedVideoData))
    <div class="categories_swiper__slider-block">
        <div class="container">
            <h2 class="text-uppercase mb-3 mb-md-0">Recommended for You</h2>
            <hr>
            <div class="swiper recommended_for_you mt-4">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img data-src="{{ asset('assets/front/images/white-belt-test.jpg') }}" class="lazy"
                                    alt="white-belt-test">
                                <div class="badge-dark-video-time">32:04</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content">
                                <h6>1st Level White Belt</h6>
                                <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                    commodo
                                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                    parturient
                                    montes, nascetur ridiculus mus. Donec qu</p>
                            </div>
                            <div class="swiper_block_discipline__profile-box">
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/medal.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>Bronze</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/video.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>123</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/belt.svg') }}" class="lazy"
                                        alt="icon group">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img data-src="{{ asset('assets/front/images/white-belt-test.jpg') }}" class="lazy"
                                    alt="Boxing Advanced 2">
                                <div class="badge-dark-video-time">32:04</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content">
                                <h6>01 White Belt</h6>
                                <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                    commodo
                                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                    parturient
                                    montes, nascetur ridiculus mus. Donec qu</p>
                            </div>
                            <div class="swiper_block_discipline__profile-box">
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/medal.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>Bronze</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/video.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>123</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/belt.svg') }}" class="lazy"
                                        alt="icon group">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img data-src="{{ asset('assets/front/images/karate-basic.jpg') }}" class="lazy"
                                    alt="Karate Basic Techniques">
                                <div class="badge-dark-video-time">32:04</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content">
                                <h6>Karate Basic Techniques</h6>
                                <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                    commodo
                                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                    parturient
                                    montes, nascetur ridiculus mus. Donec qu</p>
                            </div>
                            <div class="swiper_block_discipline__profile-box">
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/medal.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>Bronze</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/video.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>123</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/belt.svg') }}" class="lazy"
                                        alt="icon group">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img data-src="{{ asset('assets/front/images/trap.jpg') }}" class="lazy"
                                    alt="Arm trap and roll v2">
                                <div class="badge-dark-video-time">32:04</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content">
                                <h6>Arm trap and roll v2</h6>
                                <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                    commodo
                                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                    parturient
                                    montes, nascetur ridiculus mus. Donec qu</p>
                            </div>
                            <div class="swiper_block_discipline__profile-box">
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/medal.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>Bronze</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/video.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>123</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/belt.svg') }}" class="lazy"
                                        alt="icon group">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img data-src="{{ asset('assets/front/images/white-belt-test.jpg') }}" class="lazy"
                                    alt="white-belt-test">
                                <div class="badge-dark-video-time">32:04</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content">
                                <h6>Kimber Martial Arts</h6>
                                <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                    commodo
                                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                    parturient
                                    montes, nascetur ridiculus mus. Donec qu</p>
                            </div>
                            <div class="swiper_block_discipline__profile-box">
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/medal.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>Bronze</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/video.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>123</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/belt.svg') }}" class="lazy"
                                        alt="icon group">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img data-src="{{ asset('assets/front/images/white-belt-test.jpg') }}" class="lazy"
                                    alt="Boxing Advanced 2">
                                <div class="badge-dark-video-time">32:04</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content">
                                <h6>01 White Belt</h6>
                                <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                    commodo
                                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                    parturient
                                    montes, nascetur ridiculus mus. Donec qu</p>
                            </div>
                            <div class="swiper_block_discipline__profile-box">
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/medal.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>Bronze</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/video.svg') }}" class="lazy"
                                        alt="icon group">
                                    <span>123</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/belt.svg') }}" class="lazy"
                                        alt="icon group">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next maz__swiper_btn-next category-swiper-button-next">
                    <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
                <div class="swiper-button-prev maz__swiper_btn-prev category-swiper-button-prev">
                    <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
            </div>
        </div>

    </div>
    @endif
    <!-- Recommended for You end -->

    <!-- Bronze Videos -->
    @if(!empty($instructorBronzeVideoData))
    <div class="categories_swiper__slider-block">
        <div class="container">
            <h2 class="mb-3 mb-md-0"><span class="text-uppercase">Bronze Videos</span> (Beginner)</h2>
            <hr>
            <div class="swiper bronze_videos mt-4">
                <div class="swiper-wrapper">
                    @foreach($instructorBronzeVideoData as $insBronzeData)
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img data-src="{{ $insBronzeData['lession_thumbnail'] }}" class="lazy" alt="{{ $insBronzeData['title'] }}">
                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insBronzeData['video_duration'])->format('i:s'); }}</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content">
                                <h6>{{ $insBronzeData['title'] }}</h6>
                                <p class="description">{{ $insBronzeData['description'] }}</p>
                            </div>
                            <div class="swiper_block_discipline__profile-box">
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/medal.svg') }}" class="lazy" alt="icon group">
                                    <span>Bronze</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/video.svg') }}" class="lazy" alt="icon group">
                                    <span>123</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/belt.svg') }}" class="lazy" alt="icon group">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next maz__swiper_btn-next category-swiper-button-next">
                    <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
                <div class="swiper-button-prev maz__swiper_btn-prev category-swiper-button-prev">
                    <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Bronze Videos end -->

    <!-- Silver Video -->
    @if(!empty($instructorSilverVideoData))
    <div class="categories_swiper__slider-block">
        <div class="container">
            <h2 class="mb-3 mb-md-0"><span class="text-uppercase">Silver Videos</span> (Intermediate)</h2>
            <hr>
            <div class="swiper silver_videos mt-4">
                <div class="swiper-wrapper">
                    @foreach($instructorSilverVideoData as $insSilverData)
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img data-src="{{ $insSilverData['lession_thumbnail'] }}" class="lazy" alt="{{ $insSilverData['title'] }}">
                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insSilverData['video_duration'])->format('i:s'); }}</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content">
                                <h6>{{ $insSilverData['title'] }}</h6>
                                <p class="description">{{ $insSilverData['description'] }}</p>
                            </div>
                            <div class="swiper_block_discipline__profile-box">
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/medal.svg') }}" class="lazy" alt="icon group">
                                    <span>Bronze</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/video.svg') }}" class="lazy" alt="icon group">
                                    <span>123</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/belt.svg') }}" class="lazy" alt="icon group">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next maz__swiper_btn-next category-swiper-button-next">
                    <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
                <div class="swiper-button-prev maz__swiper_btn-prev category-swiper-button-prev">
                    <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
            </div>
        </div>

    </div>
    @endif
    <!-- Silver Video end -->

    <!-- Gold Video -->
    @if(!empty($instructorGoldVideoData))
    <div class="categories_swiper__slider-block">
        <div class="container">
            <h2 class="mb-3 mb-md-0"><span class="text-uppercase">Gold Videos</span> (Advance)</h2>
            <hr>
            <div class="swiper gold_videos mt-4">
                <div class="swiper-wrapper">
                    @foreach($instructorGoldVideoData as $insGoldData)
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img data-src="{{ $insGoldData['lession_thumbnail'] }}" class="lazy" alt="{{ $insGoldData['title'] }}">
                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insGoldData['video_duration'])->format('i:s'); }}</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content">
                                <h6>{{ $insGoldData['title'] }}</h6>
                                <p class="description">{{ $insGoldData['description'] }}</p>
                            </div>
                            <div class="swiper_block_discipline__profile-box">
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/medal.svg') }}" class="lazy" alt="icon group">
                                    <span>Bronze</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/video.svg') }}" class="lazy" alt="icon group">
                                    <span>123</span>
                                </div>
                                <div class="badge-icons">
                                    <img data-src="{{ asset('assets/front/images/belt.svg') }}" class="lazy" alt="icon group">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next maz__swiper_btn-next category-swiper-button-next">
                    <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
                <div class="swiper-button-prev maz__swiper_btn-prev category-swiper-button-prev">
                    <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                </div>
            </div>
        </div>

    </div>
    @endif
    <!-- Gold Video end -->
</section>
<section class="maz__sections">
    <div class="container">
        <div class="maz__titl-block d-flex align-items-center">
            <h2 class="text-uppercase fw-ebold mb-0">
                Reviews
            </h2>
            <span class="review-summ ms-4 text-dark">
                <i class="fas fa-star text-warning me-1"></i>
                4.5 (5 Product ratings)
            </span>
        </div>
        <div class="card maz_leave-comment-block">
            <h4 class="fw-sbold mb-2">Leave a comment </h4>
            <p class="mb-4">Your email address will not be published. Required fields are marked *</p>

            <label for="" class="">Your rating <span class="text-danger">*</span></label>
            <span class="star-rating">
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </span>

            <div class="review-form-block-wrapper mb-5">
                <div class="review-form-block-1">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <label class="col-form-label fw-normal" for="">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="col-form-label fw-normal" for="">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="col-lg-12 mb-1">
                            <label class="col-form-label fw-normal" for="">How's your overall experience? <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label class="col-form-label fw-normal" for="">Enter your detailed reviews here <span class="text-danger">*</span></label>
                            <textarea class="form-control h-100p" name="" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-primary btn-rounded btn-lg fw-bold btn-add-review font-title">Add Review</button>
                        </div>
                    </div>
                </div>
                <div class="review-form-block-2">
                    <div class="maz__instructor-rating-box">
                        <div class="star-review-rating">
                            <div class="text-center font-text h1">4.5 <span class="fas fa-star"></span></div>
                            <div class="maz__instructor-rating-title h5 mb-4 text-center fw-normal">5 Ratings & 0 Reviews</div>
                            <div class="d-flex align-items-center">
                                <span class="text-dark d-flex align-items-center justify-content-stat">5
                                    <img data-src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                </span>
                                <div class="progress cmn-progress-bar ms-2">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <span class="maz__cmn-rating-percentage ms-3">75%</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="text-dark d-flex align-items-center justify-content-stat">4
                                    <img data-src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                </span>
                                <div class="progress cmn-progress-bar ms-2">
                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <span class="maz__cmn-rating-percentage ms-3">60%</span>
                            </div>

                            <div class="d-flex align-items-center">
                                <span class="text-dark d-flex align-items-center justify-content-stat">3
                                    <img data-src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                </span>
                                <div class="progress cmn-progress-bar ms-2">
                                    <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <span class="maz__cmn-rating-percentage ms-3">40%</span>
                            </div>

                            <div class="d-flex align-items-center">
                                <span class="text-dark d-flex align-items-center justify-content-stat">2
                                    <img data-src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
                                </span>
                                <div class="progress cmn-progress-bar ms-2">
                                    <div class="progress-bar" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <span class="maz__cmn-rating-percentage ms-4">0%</span>
                            </div>

                            <div class="d-flex align-items-center">
                                <span class="text-dark d-flex align-items-center justify-content-stat">1
                                    <img data-src="{{ asset('assets/front/images/review-star.png') }}" alt="review-star" class="lazy ms-1">
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
                    <img data-src="{{ asset('assets/front/images/no-image.png') }}" alt="review-image" class="lazy">
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
                    <img data-src="{{ asset('assets/front/images/no-image.png') }}" alt="review-image" class="lazy">
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
                    <img data-src="{{ asset('assets/front/images/no-image.png') }}" alt="review-image" class="lazy">
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
@endsection
@push('scripts')
<script>
    $("body").addClass('instructor-detail-body');
    </script>
@endpush
