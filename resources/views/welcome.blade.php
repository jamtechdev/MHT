@extends('front.layouts.app')
@section('content')

<style>
    
    @media only screen and (min-width: 1400px) {
        #dojoSectionImage {
            height: 240px !important;
            /* border: 10px solid black; */
    }
}
</style>
<!-- banner video section start -->
<section class="maz__banner-video p-0">
<div class="maz__banner-wrapper">
{{-- <div class="maz__banner-video-bg"> --}}
<div class="embed-responsive embed-responsive-16by9">
    {{-- <iframe src="https://fast.wistia.net/embed/iframe/dhfw984g04?autoplay=1" width="100%" height="982" autoplay="false" allowfullscreen title="MartialArtZen"></iframe> --}}
    {{-- <img data-src="{{ asset('assets/front/images/banner.jpg') }}" class="lazy" alt="MartialArtZen-Banner" width="100%" height="100%"> --}}
    <div class="embed-responsive-item wistia_embed wistia_async_{{ $banner_id ?? '' }} resumable=true autoPlay=true endVideoBehavior=loop videoFoam=true qualityMin=1080 muted=false controlsVisibleOnLoad=false fullscreenButton=true"></div>
</div>
{{-- <div class="maz__banner-content text-center text-md-start">
    <div class="container">
        <div class="row align-item-center">
            <div class="col-xl-8 col-md-12 col-lg-8">
                <h3 class="maz__banner-subtitle">the healthy life</h3>
                <h1 class="maz__banner-title display-5">Martial Arts ZEN</h1>
                <p class="maz__banner-text mb-4">Try our beginner-level classes in a variety of disciplines and experience the MartialArtsZen magic.</p>
                @if($viewPage == 'register')
                    <a href="{{ url('register?type=register') }}" class="btn btn-cmn btn-primary text-uppercase">Get Started</a>
                @elseif($viewPage == 'register499')
                    <a href="{{ url('register-499?type=register499') }}" class="btn btn-cmn btn-primary text-uppercase">Get Started</a>
                @elseif($viewPage == 'free')
                    <a href="{{ url('free?type=free') }}" class="btn btn-cmn btn-primary text-uppercase">Get Started</a>
                @else
                    <a href="{{ route('studentregister') }}" class="btn btn-cmn btn-primary text-uppercase">Get Started</a>
                @endif
            </div>
        </div>
    </div>
</div> --}}
</div>
</section>

<!-- get started button  -->
<section class="maz_get_started_button">
    <div class="container" style="position:relative; height: 100px;">
        <div class="get-started">
            @if(isset(Auth::guard('instructor')->user()->id))
                <a href="{{ route('instructor_dashboard') }}" class="get-started-button"> GET STARTED </a>
            @elseif(isset(Auth::guard('web')->user()->id))
                <a href="{{ route('student_profile') }}" class="get-started-button"> GET STARTED </a>
            @else    
                <a href="{{ route('softRegister',['type' => 'free']) }}" class="get-started-button"> GET STARTED </a>
            @endif
        </div>    
    </div>    
</section>
<!-- end get started button  -->
<!-- learn section  -->
<section class="learn-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="learn-section-image mx-auto">
                    @if(isset(Auth::guard('instructor')->user()->id))
                        <a href="{{ route('instructor_dashboard')}}"><img data-src="{{ asset('assets/imgdiscipline/compass.png') }}" class="lazy" alt="compass" width="100%" height="100%"></a>
                    @elseif(isset(Auth::guard('web')->user()->id))
                        <a href="{{ route('student_profile')}}"><img data-src="{{ asset('assets/imgdiscipline/compass.png') }}" class="lazy" alt="compass" width="100%" height="100%"></a>
                    @else    
                        <a href="{{ route('softRegister',['type' => 'free']) }}"><img data-src="{{ asset('assets/imgdiscipline/compass.png') }}" class="lazy" alt="compass" width="100%" height="100%"></a>                
                    @endif
                </div>
                @if(isset(Auth::guard('instructor')->user()->id))
                    <a href="{{ route('instructor_dashboard') }}"><h2 class="text-center mb-4" style="color:#F2F2F2;font-size:40px;font-weight:100;">LEARN</h2></a>
                    <a href="{{ route('instructor_dashboard') }}">
                    <ul class="learn-section-ul">
                        <li>
                            <p>
                                Explore All Martial Arts, Yoga, Fitness, & More...
                            </p>
                        </li>
                        <li>
                            <p>
                                Learn Easy-To-Flow Traditional & Modern Techniques Designed For All Shapes, Sizes & Fitness Levels
                            </p>
                        </li>   
                        <li>
                            <p>
                                Follow & Subscribe To High Quality Instructors From Around The World
                            </p>
                        </li>
                    </ul>
                </a>   
                @elseif(isset(Auth::guard('web')->user()->id))
                    <a href="{{ route('student_profile') }}"><h2 class="text-center mb-4" style="color:#F2F2F2;font-size:40px;font-weight:100;">LEARN</h2></a>
                    <a href="{{ route('student_profile') }}">
                    <ul class="learn-section-ul">
                        <li>
                            <p>
                                Explore All Martial Arts, Yoga, Fitness, & More...
                            </p>
                        </li>
                        <li>
                            <p>
                                Learn Easy-To-Flow Traditional & Modern Techniques Designed For All Shapes, Sizes & Fitness Levels
                            </p>
                        </li>   
                        <li>
                            <p>
                                Follow & Subscribe To High Quality Instructors From Around The World
                            </p>
                        </li>
                    </ul>
                </a>   
                @else
                <a href="{{ route('softRegister',['type' => 'free']) }}"><h2 class="text-center mb-4" style="color:#F2F2F2;font-size:40px;font-weight:100;">LEARN</h2></a>
                    <a href="{{ route('softRegister',['type' => 'free']) }}">
                    <ul class="learn-section-ul">
                        <li>
                            <p>
                                Explore All Martial Arts, Yoga, Fitness, & More...
                            </p>
                        </li>
                        <li>
                            <p>
                                Learn Easy-To-Flow Traditional & Modern Techniques Designed For All Shapes, Sizes & Fitness Levels
                            </p>
                        </li>   
                        <li>
                            <p>
                                Follow & Subscribe To High Quality Instructors From Around The World
                            </p>
                        </li>
                    </ul>
                </a>   
                @endif
                 
            </div>
            <div class="col-md-4">
                <div class="learn-section-image mx-auto">
                    @if(isset(Auth::guard('instructor')->user()->id))
                        <a href="{{ route('instructor_dashboard')}}"><img data-src="{{ asset('assets/imgdiscipline/rewards.png') }}" class="lazy" alt="compass" width="100%" height="100%"></a>
                    @elseif(isset(Auth::guard('web')->user()->id))
                        <a href="{{ route('student_profile')}}"><img data-src="{{ asset('assets/imgdiscipline/rewards.png') }}" class="lazy" alt="compass" width="100%" height="100%"></a>
                    @else    
                        <a href="{{ route('softRegister',['type' => 'free']) }}"><img data-src="{{ asset('assets/imgdiscipline/rewards.png') }}" class="lazy" alt="compass" width="100%" height="100%"></a>                
                    @endif  
                </div>
                @if(isset(Auth::guard('instructor')->user()->id))
                <a href="{{ route('instructor_dashboard')}}"><h2 class="text-center mb-4" style="color:#F2F2F2;font-size:40px;font-weight:100;">DIGITAL DOJO</h2></a>
                <a href="{{ route('instructor_dashboard')}}">
                    <ul class="learn-section-ul">
                        <li>
                            <p>
                                Get Motivated & Rewarded To Watch Videos That Are Good For Your Physical & Mental Health 
                            </p>
                        </li>
                        <li>
                            <p>
                                Get Uniquely & Continuously Certified For Your Dedication And Hard Work
                            </p>
                        </li>   
                        <li>
                            <p>
                            Securely Share Your Accomplishments with Families & Friends Around the World
                            </p>
                        </li>
                    </ul>
                </a>
                @elseif(isset(Auth::guard('web')->user()->id))
                <a href="{{ route('student_profile')}}"><h2 class="text-center mb-4" style="color:#F2F2F2;font-size:40px;font-weight:100;">DIGITAL DOJO</h2></a>
                <a href="{{ route('student_profile')}}">
                    <ul class="learn-section-ul">
                        <li>
                            <p>
                                Get Motivated & Rewarded To Watch Videos That Are Good For Your Physical & Mental Health 
                            </p>
                        </li>
                        <li>
                            <p>
                                Get Uniquely & Continuously Certified For Your Dedication And Hard Work
                            </p>
                        </li>   
                        <li>
                            <p>
                            Securely Share Your Accomplishments with Families & Friends Around the World
                            </p>
                        </li>
                    </ul>
                </a>
                @else
                <a href="{{ route('softRegister',['type' => 'free']) }}"><h2 class="text-center mb-4" style="color:#F2F2F2;font-size:40px;font-weight:100;">DIGITAL DOJO</h2></a>
                <a href="{{ route('softRegister',['type' => 'free']) }}">
                    <ul class="learn-section-ul">
                        <li>
                            <p>
                                Get Motivated & Rewarded To Watch Videos That Are Good For Your Physical & Mental Health 
                            </p>
                        </li>
                        <li>
                            <p>
                                Get Uniquely & Continuously Certified For Your Dedication And Hard Work
                            </p>
                        </li>   
                        <li>
                            <p>
                            Securely Share Your Accomplishments with Families & Friends Around the World
                            </p>
                        </li>
                    </ul>
                </a>
                @endif   
            </div>
            <!-- <div class="col-md-4">
                <div class="learn-section-image mx-auto">
                    @if(isset(Auth::guard('instructor')->user()->id))
                        <a href="{{ route('instructor_dashboard')}}"><img data-src="{{ asset('assets/imgdiscipline/learn.png') }}" class="lazy" alt="compass" width="100%" height="100%"></a>
                    @elseif(isset(Auth::guard('web')->user()->id))
                        <a href="{{ route('student_profile')}}"><img data-src="{{ asset('assets/imgdiscipline/learn.png') }}" class="lazy" alt="compass" width="100%" height="100%"></a>
                    @else    
                        <a href="{{ route('softRegister',['type' => 'free']) }}"><img data-src="{{ asset('assets/imgdiscipline/learn.png') }}" class="lazy" alt="compass" width="100%" height="100%"></a>                
                    @endif  
                </div>
                @if(isset(Auth::guard('instructor')->user()->id))
                <a href="{{ route('instructor_dashboard')}}"><h2 class="text-center mb-4"  style="color:#F2F2F2;font-size:40px;font-weight:100;">TEACH</h2></a>
                <a href="{{ route('instructor_dashboard')}}">
                    <ul class="learn-section-ul">
                        <li>
                            <p>
                                Create Your New Digital School That Will Open 24x7
                            </p>
                        </li>
                        <li>
                            <p>
                                Get Algorithmically Matched to Like-Minded Students From Around the World
                            </p>
                        </li>   
                        <li>
                            <p>
                                Earn Incremental & Substantial Revenues In Our Ever-Growing Gig Economy
                            </p>
                        </li>
                    </ul>
                </a>
                @elseif(isset(Auth::guard('web')->user()->id))
                <a href="{{ route('student_profile')}}"><h2 class="text-center mb-4"  style="color:#F2F2F2;font-size:40px;font-weight:100;">TEACH</h2></a>
                <a href="{{ route('student_profile')}}">
                    <ul class="learn-section-ul">
                        <li>
                            <p>
                                Create Your New Digital School That Will Open 24x7
                            </p>
                        </li>
                        <li>
                            <p>
                                Get Algorithmically Matched to Like-Minded Students From Around the World
                            </p>
                        </li>   
                        <li>
                            <p>
                                Earn Incremental & Substantial Revenues In Our Ever-Growing Gig Economy
                            </p>
                        </li>
                    </ul>
                </a>   
                @else
                <a href="{{ route('softRegister',['type' => 'free']) }}"><h2 class="text-center mb-4"  style="color:#F2F2F2;font-size:40px;font-weight:100;">TEACH</h2></a>
                <a href="{{ route('softRegister',['type' => 'free']) }}">
                    <ul class="learn-section-ul">
                        <li>
                            <p>
                                Create Your New Digital School That Will Open 24x7
                            </p>
                        </li>
                        <li>
                            <p>
                                Get Algorithmically Matched to Like-Minded Students From Around the World
                            </p>
                        </li>   
                        <li>
                            <p>
                                Earn Incremental & Substantial Revenues In Our Ever-Growing Gig Economy
                            </p>
                        </li>
                    </ul>
                </a>   
                @endif  
            </div> -->
            <div class="col-md-4">
                <div class="learn-section-image mx-auto">
                        <a href="#educators-section"><img data-src="{{ asset('assets/imgdiscipline/learn.png') }}" class="lazy" alt="compass" width="100%" height="100%"></a>
                </div>
                <a href="#educators-section"><h2 class="text-center mb-4"  style="color:#F2F2F2;font-size:40px;font-weight:100;">TEACH</h2></a>
                <a href="#educators-section">
                    <ul class="learn-section-ul">
                        <li>
                            <p>
                                Create Your New Digital School That Will Open 24x7
                            </p>
                        </li>
                        <li>
                            <p>
                                Get Algorithmically Matched to Like-Minded Students From Around the World
                            </p>
                        </li>   
                        <li>
                            <p>
                                Earn Incremental & Substantial Revenues In Our Ever-Growing Gig Economy
                            </p>
                        </li>
                    </ul>
                </a>   
            </div>
        </div>
    </div>
</section>


<!-- end learn section  -->
<!-- start DOJO Section -->

<section class="dojo-section">
    <div class="container" style="position:relative; height: 100px;">
        <div class="select-dojo">
            <h5 style=" font-weight: 100;font-size:50px;font-family: Arial,Helvetica,sans-serif;color:#000000;"><b>Select Your Dojo</b></h5>
        </div> 
    </div>  
    <div class="container">
        
        <div class="row discipline-row">    
            @php
                function isMobileDevice() {
                return preg_match("/(android|phone|blackberry)/i", $_SERVER["HTTP_USER_AGENT"]);
                }
            @endphp
            @if(isMobileDevice() === 0)
            
            @if(!empty($desktop_disciplines))
                    @foreach($desktop_disciplines as $d)
                        <div class="col-lg-4 col-sm-6 discipline">
                            <a class="discipline-btn" href="{{route('disciplines',['id'=>$d->id])}}" style="text-transform: uppercase;">{{ $d->title }}</a>
                            <img class="img-responsive discipline_image" id="dojoSectionImage" src="{{ $d->photo }}" alt="karate-girl-with-black-belt.jpg" style="width: 107%;height:220px; object-fit: cover; object-position: 50% 50%;">    
                        </div>
                    @endforeach
                @endif
            @endif
            @if(isMobileDevice())
            
                @if(!empty($mobile_disciplines))
                    @foreach($mobile_disciplines as $d)
                        <div class="col-lg-4 col-sm-6 discipline">
                            <a class="discipline-btn" href="{{route('disciplines',['id'=>$d->id])}}" style="text-transform: uppercase;">{{ $d->title }}</a>
                            <img class="discipline_image" id="dojoSectionImage" src="{{ $d->photo }}" alt="karate-girl-with-black-belt.jpg" style="width: 107%; height: 220px; object-fit: cover; object-position: 50% 50%;">    
                        </div>
                    @endforeach
                @endif
            @endif
        </div>   
        
    </div>
</section>
<!-- end DOJO Section -->
<!-- Start For Enthusiasts, Learners and Students section -->
<section style="margin-top:38px;">
    <div class="container-fluid" style="padding-left: var(--bs-gutter-x, 0rem);">
        <div class="col-md-12">
            <div class="container">
                <h2 style="font-size:40px;font-weight: 100;text-align:center">For Enthusiasts, Learners and Students</h2>
            </div>
            <div class="row">
                <div class="col-md-4 explore-for-free">
                    <div>
                        <p>Explore For FREE</p>
                        <h6><b>FREE Select&nbsp;beginner level training videos from top instructors around the world. Get a taste of what we have by watching videos and earn towards redemption.</b></h6>
                    </div>
                    <div>
                        @if(Auth::user())
                            <a class="explore-for-free-btn" href="{{ route('student_profile') }}">EXPLORE FOR FREE</a>  
                        @else
                            <a class="explore-for-free-btn" href="{{ route('softRegister',['type' => 'free']) }}">EXPLORE FOR FREE</a>  
                        @endif  
                    </div>
                </div>
                <div class="col-md-8 explore-for-basic-plan" style="background-image: url({{asset('assets/front/images/ethustic.png')}});">
                    <div>
                        <p>Basic Membership</p>
                        <h6>
                        Learn martial arts, yoga, fitness and more from highly skilled &amp; caring instructors around the world at your own leisure and in your language. Get certified at every level and progress at your own pace. Subscribe today to access all current and future videos at one low monthly price!
                        </h6>
                    </div>
                    <div class="child-1">
                        <h5>$19.99/month</h5>
                        @if(Auth::user())
                            <a class="explore-for-basic-plan-btn" href="{{ route('changePlanPage') }}">SUBSCRIBE NOW</a>
                        @else
                            <a class="explore-for-basic-plan-btn"id="educators-section" href="{{ route('referral_register',['type' => 'free','value'=>'subscribe_bronze']) }}">SUBSCRIBE NOW</a>
                        @endif  
                    </div>
                        
                </div>
            </div>
        </div>
    </div>    
</section>
<!-- EndFor Enthusiasts, Learners and Students section -->
<!-- For Educators, Teachers, and Instructors section -->

<section class="educators-section" style="margin-top: 3%;">
    <div class="container text-center educators">
        <p><h2 class="row-1"  style="font-size:40px;font-weight: 100;">For Educators, Teachers and Instructors</h2></p>
        <p><h2 class="row-2" style="font-size:35px;font-weight: 100;">Teach For FREE </h2></p>
        <p><h2 class="row-3" style="font-size:18px;font-weight: 100;line-height: 2rem;text-align:left;margin-bottom:28px;">The MartialArtsZen.com platform provides you with the marketing tools and progressive teaching structure to create your own DIGITAL DOJO™, translate your teaching videos into multiple languages, so anyone in the world can watch your videos. We will help immediately stand up a digital school and allow you the ability to:</h2></p>
        <p><h2 style="font-size:18px;font-weight: 100;line-height: 2rem;">
        <ul class="row-4" style="padding-left: 10rem;">
            <li style="text-align:left;">
                Share Bio + Demo videos for increased intimacy with students for FREE
            </li>
            <li style="text-align:left;">
                Create free instructional videos with customizable intro and outros of your teaching videos 
            </li>
            <li style="text-align:left;">
                Get upsell revenue to your existing students immediately 
            </li>
            <li style="text-align:left;">
                Increase revenue from new students on the MAZ platform beyond your zip code
            </li>
        </ul>    
        </h2></p>
        <p><h2 class="row-5" style="font-size:20px;font-weight: 700;"></h2></p>
        <p><h1 class="row-6" style="font-size:18px;padding: 0px 60px;font-weight: 100;margin-top:40px;line-height: 2rem;">If you’re a martial arts instructor, yoga guru, or fitness expert use your passion to train the world. Would you like to generate more income, retain, even add new students from around the world? We’re looking for instructors who want to participate in our beta launch.</h1></p>        
    </div>
</section>
<section class="maz_get_started_button">
    <div class="container" style="position:relative; height: 100px;">
        <div class="get-started">
            <a href="javascript:void(0)" onclick="contactUsModal()" class="get-started-button" id="myBtn"> CONTACT US </a>
        </div>     
    </div>    
</section>
<!-- End For Educators, Teachers, and Instructors section -->
<!-- banner video section end -->
<!-- MartialArtZen info section start-->
{{-- <section class="maz__business-info maz__sections">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0 link" onclick="javascript:location.href='{{ url('/disciplines') }}'">
                <div class="cmn-icon-wrapper mb-4">
                    <img data-src="{{ asset('assets/front/images/fit.png') }}" class="lazy" alt="compass" width="100%" height="100%">
                </div>
                <h2 class="text-center mb-4">GET FIT</h2>
                <ul class="list-unstyled">
                    <li class="d-flex">
                        <i class="fas fa-check-circle text-primary fs-5 me-3 mt-1"></i>
                        <p class="maz__cmn-info-text">
                        Train in martial arts and fitness disciplines including Karate, Taekwondo, Kung Fu, Mixed Martial Arts, Yoga, Dance and more
                        </p>
                    </li>
                    <li class="d-flex">
                    <i class="fas fa-check-circle text-primary fs-5 me-3 mt-1"></i>
                        <p class="maz__cmn-info-text">
                        Learn easy-to-follow, traditional and modern techniques designed for all shapes, sizes & fitness levels
                        </p>
                    </li>   
                    <li class="d-flex">
                    <i class="fas fa-check-circle text-primary fs-5 me-3 mt-1"></i>
                        <p class="maz__cmn-info-text">
                        Study proper technique from world renowned and certified instructors
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0 link" onclick="javascript:location.href='#'">
                <div class="cmn-icon-wrapper text-center mb-4">
                    <img data-src="{{ asset('assets/front/images/certified.png') }}" class="lazy" alt="certified" width="100%" height="100%">
                </div>
                <h2 class="text-center mb-4">GET CERTIFIED</h2>
                <ul class="list-unstyled">
                    <li class="d-flex">
                    <i class="fas fa-check-circle text-primary fs-5 me-3 mt-1"></i>
                        <p class="maz__cmn-info-text">
                            Up your game with certification programs in all disciplines
                        </p>
                    </li>
                    <li class="d-flex">
                        <i class="fas fa-check-circle text-primary fs-5 me-3 mt-1"></i>
                        <p class="maz__cmn-info-text">
                            Through our proprietary beltification™ process, achieve nationally-recognized status at each belt level
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 link" onclick="javascript:location.href='#'">
                <div class="cmn-icon-wrapper text-center mb-4">
                    <img data-src="{{ asset('assets/front/images/business.png') }}" class="lazy" alt="business" width="100%" height="100%">
                </div>
                <h2 class="text-center mb-4">GET MORE BUSINESS</h2>
                <ul class="list-unstyled">
                    <li class="d-flex">
                        <i class="fas fa-check-circle text-primary fs-5 me-3 mt-1"></i>
                        <p class="maz__cmn-info-text">
                            Share your expertise by creating your own digital school available to your students 24/7
                        </p>
                    </li>
                    <li class="d-flex">
                        <i class="fas fa-check-circle text-primary fs-5 me-3 mt-1"></i>
                        <p class="maz__cmn-info-text">
                            Attract students that are the perfect match for your program through our advanced algorithms
                        </p>
                    </li>
                    <li class="d-flex">
                        <i class="fas fa-check-circle text-primary fs-5 me-3 mt-1"></i>
                        <p class="maz__cmn-info-text">
                            Reach more students around the world with your videos automatically translated into eight languages (and growing)
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>--}}
<!-- MartialArtZen info section end-->

{{-- @if($viewPage == 'welcome')
<!-- MartialArtZen Image Gallery section start-->
<section class="maz__dojo-gallery maz__sections">
    <div class="container">
        <h2 class="display-5 text-uppercase text-center fw-bold">Select Your Dojo</h2>
         <p class="maz__dojo-info-text mb-4">Lorem ipsum proin gravida nibh vel velit auctor aliquet. Aenean lorem sollicitudin, auci elit nascetur.</p> 
        <div class="row g-0 mt-4">
            @if(count($disciplineData))
                @foreach($disciplineData as $dData)
                    <div class="col-lg-4 col-sm-6">
                        <div class="maz__dojo-cmn-image">
                            <div class="image-overlay">
                            <img data-src="{{ $dData->photo }}" class="lazy image-after" alt="{{ $dData->title }}"></div>
                            <div class="maz__dojo-cmn-btn">
                                    <a href="{{ url('studentregister') }}" class="btn btn-dojo">{{ $dData->title }}</a>
                                <h5 class="maz__dojo-cmn-title">{{ $dData->description }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
 @endif --}}

<!-- MartialArtZen Image Gallery section end-->

<!--  MartialArtZen Subscribe section start-->
{{--<section class="maz__subscribe-info lozad-background" data-background-image="{{ asset('assets/front/images/explore-banner.jpg')}}">
    <div class="container">
        @if($viewPage == 'welcome')
            <div class="row text-center text-md-start">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="maz__subscribe-title text-uppercase fw-bold">FREE VIDEOS</h2>
                    <p class="maz__subscribe-text mb-2 mb-md-4">Try our beginner-level classes in a variety of disciplines and experience the MartialArtsZen magic.</p>
                    <a href="{{ url('maz?type=free') }}" class="btn btn-cmn btn-info text-uppercase mt-2 mt-md-4">FREE VIDEOS</a>
                </div>
                <div class="col-md-6">
                    <h2 class="maz__subscribe-title text-uppercase fw-bold">START YOUR JOURNEY NOW</h2>
                    <p class="maz__membership-text mb-4">Get unlimited access to training videos, classes and Beltification™ certification programs in martial arts, yoga, fitness, dance and more from highly skilled and certified instructors around the world at your own leisure and at your own language.</p>
                    <p class="maz__membership-text mb-2 mb-md-4">Get certified at every level and progress at your own pace. Subscribe today to gain full access to our impressive and ever-growing collection of content at one low monthly price! ​</p>
                    <h3 class="maz__membership-fees">Starting at $19.99 USD Per Month</h3>
                    <a href="{{ url('studentregister') }}" class="btn btn-cmn btn-info text-uppercase mt-2 mt-md-4">Subscribe Now</a>
                </div>
            </div>
        @endif
        @if($viewPage == 'free')
            <div class="row justify-content-center">
                <div class="col-md-4 mb-5 mb-md-0 text-center">
                    <h2 class="maz__subscribe-title text-uppercase fw-bold">FREE VIDEOS</h2>
                    <p class="maz__subscribe-text mb-2 mb-md-4">Try our beginner-level classes in a variety of disciplines and experience the MartialArtsZen magic.</p>
                    <a href="{{ url('free?type=free') }}" class="btn btn-cmn btn-info text-uppercase mt-2 mt-md-4">FREE VIDEOS</a>
                    @auth
                        <a href="{{ route('instructor-video') }}" class="btn btn-cmn btn-info text-uppercase mt-2 mt-md-4">FREE VIDEOS</a>
                    @else  
                        <a href="javascript:void(0)" onclick="loginMessage()" class="btn btn-cmn btn-info text-uppercase mt-2 mt-md-4">FREE VIDEOS</a>
                    @endauth
                </div>
            </div>
        @endif
        @if($viewPage == 'register499')
            <div class="row text-center text-md-start justify-content-center">
                <div class="col-md-6">
                    <h2 class="maz__subscribe-title text-uppercase fw-bold">START YOUR JOURNEY NOW</h2>
                    <p class="maz__membership-text mb-4">Get unlimited access to training videos, classes and Beltification™ certification programs in martial arts, yoga, fitness, dance and more from highly skilled and certified instructors around the world at your own leisure and at your own language.</p>
                    <p class="maz__membership-text mb-2 mb-md-4">Get certified at every level and progress at your own pace. Subscribe today to gain full access to our impressive and ever-growing collection of content at one low monthly price! ​</p>
                    <h3 class="maz__membership-fees">Only $4.99/month</h3>
                    <a href="{{ url('register-499?type=register499') }}" class="btn btn-cmn btn-info text-uppercase mt-2 mt-md-4">Subscribe Now</a>
                </div>
            </div>
        @endif
        @if($viewPage == 'register')
            <div class="row text-center text-md-start justify-content-center">
                <div class="col-md-6">
                    <h2 class="maz__subscribe-title text-uppercase fw-bold">START YOUR JOURNEY NOW</h2>
                    <p class="maz__membership-text mb-4">Get unlimited access to training videos, classes and Beltification™ certification programs in martial arts, yoga, fitness, dance and more from highly skilled and certified instructors around the world at your own leisure and at your own language.</p>
                    <p class="maz__membership-text mb-2 mb-md-4">Get certified at every level and progress at your own pace. Subscribe today to gain full access to our impressive and ever-growing collection of content at one low monthly price! ​</p>
                    <h3 class="maz__membership-fees">Only $1/month</h3>
                    <a href="{{ url('register?type=register') }}" class="btn btn-cmn btn-info text-uppercase mt-2 mt-md-4">Subscribe Now</a>
                </div>
            </div>
        @endif
    </div>
</section>--}}
<!--  MartialArtZen Subscribe Section end-->

<!--  MartialArtZen Instructor Section start-->
{{--<section class="maz__instructor-info maz__sections">
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-7 text-center text-lg-start mb-4 mb-lg-0">
            <h2 class="maz__instructor-title">If you are a martial arts instructor, yoga guru, fitness personal trainer or dance teacher, use your knowledge and passion to train the world!</h2>
            <p class="maz__instructor-text mb-4">For the first time ever, you can leverage our matching algorithms and future Augmented Reality, Virtual Reality and 3-D Hologram technologies to reach new students around the world. Our unique teaching & learning technology platform will help you create, maintain, market and grow your Digital Dojo™ / online school, studio and/or gym! Contact us now so we can help you earn significant income in this ever changing Covid-impacted digital world!</p>
            <a href="{{ route('instructor_register') }}" class="btn btn-cmn btn-primary text-uppercase mt-lg-4">CONTACT US NOW</a>
             @if($viewPage == 'register')
                <a href="{{ url('register?type=register') }}" class="btn btn-cmn btn-primary text-uppercase mt-lg-4">Sign up Now</a>
            @elseif($viewPage == 'register499')
                <a href="{{ url('register-499?type=register499') }}" class="btn btn-cmn btn-primary text-uppercase mt-lg-4">Sign up Now</a>
            @elseif($viewPage == 'free')
                <a href="{{ url('free?type=free') }}" class="btn btn-cmn btn-primary text-uppercase mt-lg-4">Sign up Now</a>
            @else
                <a href="{{ route('studentregister') }}" class="btn btn-cmn btn-primary text-uppercase mt-lg-4">Sign up Now</a>
            @endif 
        </div>
        <div class="col-lg-5">
            <div class="maz__instructor-info-img-block">
                <div class="row ">
                    <div class="col-6 ">
                        <div class="maz__instructor-cmn-box">
                            <img data-src="{{ asset('assets/front/images/instructor1.jpg') }}" class="lazy" alt="instructor1">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="maz__instructor-cmn-box">
                            <img data-src="{{ asset('assets/front/images/instructor2.jpg') }}" class="lazy" alt="instructor2">
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="maz__instructor-cmn-box">
                            <img data-src="{{ asset('assets/front/images/instructor3.jpg') }}" class="lazy" alt="instructor3">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="maz__instructor-cmn-box">
                            <img data-src="{{ asset('assets/front/images/instructor4.jpg') }}" class="lazy" alt="instructor4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
--}}


<script>
        function loginMessage()
        {
            Swal.fire({
            title: '<h5>Please <a href="{{ url('softRegister?type=free') }}"> Sign Up </a> To Gain Access</h5>',
            // icon: 'info',
            iconHtml: '<img src="{{ asset('images/infoIcon1.png') }}">',
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
            $(".swal2-confirm").css('background-color', '#ff1648');
            $(".swal2-confirm").css('border-radius', '2.25rem');
            $(".swal2-confirm").css('width', '5rem');
        }   
</script>

@endsection
