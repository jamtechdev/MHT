@extends('front.layouts.app')

@section('content')
    <section class="maz__disciplines_background_banner">
        <div class="container swiper-slider-ex">

            <div class="swiper-slider-ex-inn">
                <div class="swiper-container disiciplines-banner-swiper">
                    <div class="swiper-wrapper">
                        @if (count($disciplineImagesData))
                            @foreach ($disciplineImagesData as $dData)
                                <div class="swiper-slide">
                                    <img src="{{ $dData->photo }}" class="swiper-images" alt="{{ $dData }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- Add Navigation -->
                <div class="discipline-swiper-button-next swiper-button-next maz__swiper__banner-btn-next">
                    <img data-src="{{ asset('assets/front/images/arrow-right.png') }}" class="lazy" alt="arrows">
                </div>
                <div class="discipline-swiper-button-prev swiper-button-prev maz__swiper__banner-btn-prev">
                    <img data-src="{{ asset('assets/front/images/arrow-left.png') }}" class="lazy" alt="arrows">
                </div>
            </div>
        </div>
    </section>
    <section class="pb-5 pt-1">
        <div class="container">
            <div class="text-center">
                <h1 class="text-uppercase diciplin-swiper-slider-title" id="swiperImageTitle"></h1>
                {{-- <p id="swiperImageDesc"></p> --}}
            </div>
        </div>
    </section>
    <section class="maz__bg_gray maz__sections">
        <!-- Schools and Instructors -->
        @if(count($instructorData))
        <div class="categories_swiper__slider-block">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="text-uppercase mb-3 mb-md-0">Schools and Instructors</h2>
                    <hr>
                    <div class="swiper schools_and_instructors mt-4">
                        <div class="swiper-wrapper">
                            @foreach($instructorData as $insData)    
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img data-src="{{ $insData->photo }}" class="lazy" alt="{{ $insData->name }}">
                                    </div>
                                    <div class="maz__swiper_block_discipline-content pb-2">
                                        <h6>{{ $insData->name }}</h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Schools and Instructors end -->

        <!-- Free Videos -->
        @if(count($instructorFreeData))
        <div class="categories_swiper__slider-block">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="text-uppercase mb-3 mb-md-0">Free Videos</h2>
                    <hr>
                    <div class="swiper free_videos mt-4">
                        <div class="swiper-wrapper">
                            @foreach($instructorFreeData as $insFreeData)
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
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                    </div>
                </div>
            </div>
        </div>
        @endif
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
                                        <img data-src="{{ asset('assets/front/images/white-belt-test.jpg') }}"
                                            class="lazy" alt="white-belt-test">
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
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img data-src="{{ asset('assets/front/images/white-belt-test.jpg') }}"
                                            class="lazy" alt="Boxing Advanced 2">
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
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img data-src="{{ asset('assets/front/images/karate-basic.jpg') }}"
                                            class="lazy" alt="Karate Basic Techniques">
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
                                        <p class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                            Aenean
                                            commodo
                                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                            parturient
                                            montes, nascetur ridiculus mus. Donec qu</p>
                                    </div>
                                    <div class="swiper_block_discipline__profile-box">
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
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img data-src="{{ asset('assets/front/images/white-belt-test.jpg') }}"
                                            class="lazy" alt="white-belt-test">
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
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img data-src="{{ asset('assets/front/images/white-belt-test.jpg') }}"
                                            class="lazy" alt="Boxing Advanced 2">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy"
                            alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy"
                            alt="arrows">
                    </div>
                </div>
            </div>

        </div> --}}
        <!-- Recommended for You end -->

        <!-- Bronze Videos -->
        @if(count($instructorBronzeData))
        <div class="categories_swiper__slider-block">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="mb-3 mb-md-0">BRONZE VIDEOS (Beginner)</h2>
                    <hr>
                    <div class="swiper bronze_videos mt-4">
                        <div class="swiper-wrapper">
                            @foreach($instructorBronzeData as $insBronzeData)
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
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                    </div>
                </div>
            </div>

        </div>
        @endif
        <!-- Bronze Videos end -->

        <!-- Silver Video -->
        @if(count($instructorSilverData))
        <div class="categories_swiper__slider-block">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="mb-3 mb-md-0">SILVER VIDEOS (Intermediate)</h2>
                    <hr>
                    <div class="swiper silver_videos mt-4">
                        <div class="swiper-wrapper">
                            @foreach($instructorSilverData as $insSilverData)
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
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Silver Video end -->

        <!-- Gold Video -->
        @if(count($instructorGoldData))
        <div class="categories_swiper__slider-block">
            <div class="container">
                <div class="swiper__main_blocks">
                    <h2 class="mb-3 mb-md-0">GOLD VIDEOS (Advance)</h2>
                    <hr>
                    <div class="swiper gold_videos mt-4">
                        <div class="swiper-wrapper">
                            @foreach($instructorGoldData as $insGoldData)
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
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img data-src="{{ asset('assets/front/images/right-arrow.svg') }}" class="lazy" alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img data-src="{{ asset('assets/front/images/left-arrow.svg') }}" class="lazy" alt="arrows">
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Gold Video end -->
    </section>
@endsection
@push('scripts')
    <script>
        var swiperDisicipline = new Swiper(".disiciplines-banner-swiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            initialSlide: 2,
            slidesPerView: 2,
            loop: true,
            coverflowEffect: {
                rotate: 0,
                // stretch: 45,
                stretch: 45,
                // depth: 330,
                depth: 220,
                modifier: 1,
                slideShadows: true,
            },
            on: {
                init: function() {
                    var currentActiveSlide = JSON.parse($('.swiper-slide-active img').attr('alt'));
                    $("#swiperImageTitle").text(currentActiveSlide.title);
                    //$("#swiperImageDesc").text(currentActiveSlide.description);
                },
            },
            pagination: false,
            breakpoints: {

                768: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 4,
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
            $("#swiperImageTitle").text(currentActiveSlide.title);
            //$("#swiperImageDesc").text(currentActiveSlide.description);
        });
    </script>
@endpush