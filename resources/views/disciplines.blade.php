
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="4GWNiedl7X8NaBH5dIh6FEy7pMKQ5gZrQq9vYNRf">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="http://127.0.0.1:8000/assets/mailimages/favicon.ico">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/front/css/other.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.css"/>
        
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TTGP534');</script>
    <!-- End Google Tag Manager -->
    <!-- <style>
    #wistia_simple_video_123{
        height: auto !important;
        max-width: 40% !important;
        margin: 0px auto !important;
    }
    </style> -->
    <style>
/* The Modal (background) */
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  z-index: 9999;
}

/* Modal Content */
.modal-content1 {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
  border-radius: 25px;
}

/* The Close Button */
.close1 {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}


</style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TTGP534"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="app" class="maz__app__content">
        <style>
  .txt-edit{
    margin:15px;
    }
    @media  only screen and (max-width:767px){
    p.para {
    font-size: 10px;
    margin: 10px !important;
    }
    .txt-edit{
    font-size: 10px;
    }
}
</style>

<section id="sectionRegistrationNotice" class="d-none">
  <div id="registrationNoticeBar" class="bg-secondary text-white d-flex align-items-center justify-content-center">
      <p class="m-4 para">Complete your registration to access our training, learning, and certification videos and classes.<a class="text-white" href="http://127.0.0.1:8000/softRegister?type=free&amp;utm_campaign=retargeting&amp;utm_medium=topbanner"> Continue </a> </p>
      <a href="javascript:void(0);" onclick="event.preventDefault(); $('#registrationNoticeBar').remove();"><i class="fa fa-xmark text-white txt-edit" aria-hidden="true"></i></a>
  </div>
</section>
<!-- <div id="redeem_row_banner" style="display: none;">
  <section id="sectionRegistrationNotice" class="d-none">
    <div id="registrationNoticeBar" class="bg-secondary text-white d-flex align-items-center justify-content-center">
        
        <p class="m-4 para">As one of our earliest customers we encourage you to redeem the $1 Bronze Lifetime promotion. Once available you can expect future features and offerings in Bronze to include: increased access to higher level videos, ability to build your skills in over 10 disciplines, opportunities to test and start earning belts.<a class="text-white" href="http://127.0.0.1:8000/acceptBronzPlan"> Redeem Now </a> </p>
        <a class="m-3" href="javascript:void(0);" onclick="event.preventDefault(); $('#registrationNoticeBar').remove();"><i class="fa fa-xmark text-white txt-edit" aria-hidden="true"></i></a>
    </div>
  </section>
</div> -->

<div id="redeemBronzePlan" hidden>
  <section id="redeemBronzePlan" class="redeemBronzePlan">
    <div id="registrationNoticeBar" class="bg-secondary text-white d-flex align-items-center justify-content-center">
        
        <p class="m-4 para">Complete the payment and registration process to gain access to the increased services and features offered in the  plan. <a class="text-white" href="http://127.0.0.1:8000/bronzePlanStripe"> Continue </a> </p>
        <a class="m-3" href="javascript:void(0);" onclick="event.preventDefault(); $('#registrationNoticeBar').remove();"><i class="fa fa-xmark text-white txt-edit" aria-hidden="true"></i></a>
    </div>
  </section>
</div>

<div id="verifyEmailBanner" hidden>
  <section id="redeemBronzePlan" class="redeemBronzePlan">
    <div id="registrationNoticeBar" class="bg-secondary text-white d-flex align-items-center justify-content-center">
        
        <p class="m-4 para">Verify your email and complete the registration process to gain access to our training, learning, and certification videos and classes. <a class="text-white" href="http://127.0.0.1:8000/verify-email"> Continue </a> </p>
        <a class="m-3" href="javascript:void(0);" onclick="event.preventDefault(); $('#registrationNoticeBar').remove();"><i class="fa fa-xmark text-white txt-edit" aria-hidden="true"></i></a>
    </div>
  </section>
</div>

<input type="hidden" id="is_logged_in_user" value="">
<input type="hidden" id="is_accepted_bronze_plan" value="">
<input type="hidden" id="is_first_time_on_step_two" value="">
<input type="hidden" id="subscription_id1" value="">
<input type="hidden" id="payment_status" value="">
<input type="hidden" id="email_verified" value="">
<input type="hidden" id="first_time_user" value="">
<input type="hidden" id="userLoggedInOrNot" value="">


<header class="maz__header" id="header-scroll">
  <nav class="navbar navbar-expand-xl navbar-light bg-top">
    <div class="container-fluid g-0">
            <a class="navbar-brand" href="http://127.0.0.1:8000"><img id="headerLogo" src="http://127.0.0.1:8000/images/newMartialArtsLogo.jpeg" alt="MartialArtZenLogo" width="100%" height="100%"></a>
      
      <div class="offcanvas offcanvas-start maz__offcanvas__header-top" id="navbar-maz">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MartialArtZen</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="menu-center">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="http://127.0.0.1:8000">Home</a>
                            </li>
           
            <li class="nav-item">
                <a class="nav-link active" href="http://127.0.0.1:8000/disciplines/2">Disciplines</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="http://127.0.0.1:8000/schools-and-instructors">Schools & Instructors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="http://127.0.0.1:8000/our-classes?selIns=All&amp;level=2">Classes</a>
            </li>
            

            
            
          </ul>
        </div>
      </div>

      <ul class="list-unstyled d-flex mb-0 ms-auto ms-md-auto ms-lg-auto me-2">
        
        <li class="dropdown">
                                        </li>
        
        <li class="dropdown ms-2">
                      <a href="javascript:void(0);" class="maz___nav-icon dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-school text-white fs-5"></i><span>SCHOOL</span></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item" href="http://127.0.0.1:8000/instructor_dashboard">Dashboard</a></li>
              <li>
                <a href="http://127.0.0.1:8000/instructor_logout" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('instructor-logout-form').submit();">Logout</a>
                <form id="instructor-logout-form" action="http://127.0.0.1:8000/instructor_logout" method="POST" class="d-none">
                    <input type="hidden" name="_token" value="4GWNiedl7X8NaBH5dIh6FEy7pMKQ5gZrQq9vYNRf">                </form>
              </li>
            </ul>
                  </li>
      </ul>

      
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-maz" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
  </nav>
</header>
        
        <!-- Begin page content -->
        <main class="maz__main__webcontent">
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
    /* @media  only screen and (max-width: 575px){
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

    @media  only screen and (max-width:990px){
        .swiper-3d, .swiper-3d.swiper-css-mode .swiper-wrapper {
            perspective: 735px !important;
        }
    }

    @media  only screen and (max-width:767px){
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

    @media  only screen and (max-width:500px){
        .swiper-3d, .swiper-3d.swiper-css-mode .swiper-wrapper {
        perspective: 1850px !important;
    }
    @media  only screen and (max-width:550px){
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

    @media  only screen and (min-width: 1400px) {
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


    @media  only screen and (min-width: 320px) {
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

@media  only screen and (min-width: 350px) {
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

@media  only screen and (min-width: 583px) {
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

@media  only screen and (min-width: 775px) {
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

@media  only screen and (min-width: 1024px) {
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

@media  only screen and (min-width: 1240px) {
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

@media  only screen and (min-width: 1400px) {
  .maz__swiper_slider_common_block1 .maz__swiper_block_discipline-img img {
    /* min-height: 318px;
    height: 318px; */
    min-height: auto;
    height: auto;
    object-fit: cover;
    max-width: 100%;
    max-height: 302px;
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

    <input type="hidden" id="selectedTileId" value="2">
    <input type="hidden" id="currentDisciplineId" value="2">
    <section class="maz__disciplines_background_banner">
        <div class="container swiper-slider-ex">
            <div class="swiper-slider-ex-inn">
                <div class="swiper-container disiciplines-banner-swiper">
                    <div class="swiper-wrapper">
                                                                                    <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/1-discipline-1677185343.png" class="swiper-images" alt="{&quot;id&quot;:1,&quot;title&quot;:&quot;Taekwondo&quot;,&quot;description&quot;:&quot;Taekwondo has been developing with the 5000-year long history of Korea and it incorporates the abrupt linear movements of Karate and the flowing, circular patterns of Kung-fu with native kicking techniques.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/1-discipline-1677185343.png&quot;,&quot;desktop_sequence&quot;:1,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/2-discipline-1677185184.png" class="swiper-images" alt="{&quot;id&quot;:2,&quot;title&quot;:&quot;Karate&quot;,&quot;description&quot;:&quot;Karate is a Japanese martial art whose physical aspects seek the development of defensive and counterattacking body movements. The themes of traditional karate training are fighting and self-defense, though its mental and moral aspects target the overall improvement of the individual.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/2-discipline-1677185184.png&quot;,&quot;desktop_sequence&quot;:2,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/19-discipline-1677184660.png" class="swiper-images" alt="{&quot;id&quot;:19,&quot;title&quot;:&quot;International Taekwon-Do Federation&quot;,&quot;description&quot;:&quot;The International Taekwon-Do Federation is an international taekwondo organization founded on March 22, 1966, by General Choi Hong Hi in Seoul, South Korea. The ITF was founded to promote and encourage the growth of the Korean martial art of Taekwon-Do&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/19-discipline-1677184660.png&quot;,&quot;desktop_sequence&quot;:3,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/3-discipline-1677046913.png" class="swiper-images" alt="{&quot;id&quot;:3,&quot;title&quot;:&quot;Kung Fu&quot;,&quot;description&quot;:&quot;Kung Fu is a general term which includes hundreds of styles of Chinese martial arts. With a number of movement sets, boxing styles, weapon skills and some fighting stunts, Kung Fu keeps its original function of self-defense.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/3-discipline-1677046913.png&quot;,&quot;desktop_sequence&quot;:4,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/5-discipline-1677048873.png" class="swiper-images" alt="{&quot;id&quot;:5,&quot;title&quot;:&quot;Yoga&quot;,&quot;description&quot;:&quot;Yoga is a physical, mental and spiritual practice that originated in ancient India and aims to create union between body, mind and spirit, as well as between the individual self and universal consciousness.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/5-discipline-1677048873.png&quot;,&quot;desktop_sequence&quot;:5,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/4-discipline-1677048983.png" class="swiper-images" alt="{&quot;id&quot;:4,&quot;title&quot;:&quot;Tai chi&quot;,&quot;description&quot;:&quot;Tai chi, short for T&#039;ai chi ch&#039;\u00fcan or T\u00e0ij\u00ed qu\u00e1n, is an internal Chinese martial art practiced for defense training, health benefits, and meditation. The term taiji is a Chinese cosmological concept for the flux of yin and yang, and &#039;quan&#039; means fist.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/4-discipline-1677048983.png&quot;,&quot;desktop_sequence&quot;:6,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/7-discipline-1677049065.png" class="swiper-images" alt="{&quot;id&quot;:7,&quot;title&quot;:&quot;Jeet Kune DO&quot;,&quot;description&quot;:&quot;Unlike more traditional martial arts, Jeet Kune Do is not fixed or patterned and is a philosophy with guiding ideas. Named for the Wing Chun concept of interception or attacking when one&#039;s opponent is about to attack, Jeet Kune Do&#039;s practitioners believe in minimal effort with maximum effect and extreme speed.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/7-discipline-1677049065.png&quot;,&quot;desktop_sequence&quot;:7,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/8-discipline-1677049132.png" class="swiper-images" alt="{&quot;id&quot;:8,&quot;title&quot;:&quot;Fitness&quot;,&quot;description&quot;:&quot;Fitness is repetitive physical activity performed in order to improve or maintain physical fitness or health.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/8-discipline-1677049132.png&quot;,&quot;desktop_sequence&quot;:8,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/9-discipline-1677049168.png" class="swiper-images" alt="{&quot;id&quot;:9,&quot;title&quot;:&quot;Boxing&quot;,&quot;description&quot;:&quot;Boxing is a combat sport in which two people, usually wearing protective gloves, throw punches at each other for a predetermined amount of time in a boxing ring. Amateur boxing is both an Olympic and Commonwealth Games sport and is a standard fixture in most international games - it also has its own World Championships.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/9-discipline-1677049168.png&quot;,&quot;desktop_sequence&quot;:9,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/20-discipline-1677048339.png" class="swiper-images" alt="{&quot;id&quot;:20,&quot;title&quot;:&quot;Rugby&quot;,&quot;description&quot;:&quot;Rugby is a game played by two teams of 13 or 15 players, using an oval ball which may be kicked or carried. Teams try to put the ball over the other team\u2019s line.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/20-discipline-1677048339.png&quot;,&quot;desktop_sequence&quot;:10,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/17-discipline-1677050104.png" class="swiper-images" alt="{&quot;id&quot;:17,&quot;title&quot;:&quot;Dance For Children&quot;,&quot;description&quot;:&quot;Physical health benefits of dance for young children: improved condition of heart and lungs; increased muscular strength, endurance and aerobic fitness; better coordination, agility and flexibility; healthy blood pressure; improved overall balance; and improved spatial awareness.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/17-discipline-1677050104.png&quot;,&quot;desktop_sequence&quot;:11,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/16-discipline-1677050051.png" class="swiper-images" alt="{&quot;id&quot;:16,&quot;title&quot;:&quot;Dance&quot;,&quot;description&quot;:&quot;Dance is a performing art form consisting of purposefully selected sequences of human movement. This movement has aesthetic and symbolic value, and is acknowledged as dance by performers and observers within a particular culture.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/16-discipline-1677050051.png&quot;,&quot;desktop_sequence&quot;:12,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/10-discipline-1677049251.png" class="swiper-images" alt="{&quot;id&quot;:10,&quot;title&quot;:&quot;Mixed Martial Arts&quot;,&quot;description&quot;:&quot;Mixed martial arts (MMA), sometimes referred to as cage fighting, is a full-contact combat sport based on striking, grappling and ground fighting, made up from various combat sports and martial arts from around the world.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/10-discipline-1677049251.png&quot;,&quot;desktop_sequence&quot;:13,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/11-discipline-1677049294.png" class="swiper-images" alt="{&quot;id&quot;:11,&quot;title&quot;:&quot;Martial Arts For Kids&quot;,&quot;description&quot;:&quot;7 Benefits of Martial Arts for Kids: get active; build self-esteem and confidence; work on goal-setting and self-Improvement; learn respect and listening skills; encourage teamwork and belonging; get physical in a safe environment; and learn about conflict resolution.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/11-discipline-1677049294.png&quot;,&quot;desktop_sequence&quot;:14,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/13-discipline-1677049692.png" class="swiper-images" alt="{&quot;id&quot;:13,&quot;title&quot;:&quot;Meditation&quot;,&quot;description&quot;:&quot;Meditation is a practice where an individual uses a technique \u2013 such as mindfulness, or focusing the mind on a particular object, thought, or activity \u2013 to train attention and awareness, and achieve a mentally clear and emotionally calm and stable state.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/13-discipline-1677049692.png&quot;,&quot;desktop_sequence&quot;:15,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/12-discipline-1677049333.png" class="swiper-images" alt="{&quot;id&quot;:12,&quot;title&quot;:&quot;Jiu Jitsu&quot;,&quot;description&quot;:&quot;Brazilian Jiu-Jitsu focuses on getting an opponent to the ground in order to neutralize possible strength or size advantages through ground fighting techniques and submission holds involving joint-locks and chokeholds. On the ground, physical strength can be offset or enhanced through proper grappling techniques.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/12-discipline-1677049333.png&quot;,&quot;desktop_sequence&quot;:16,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/14-discipline-1677049984.png" class="swiper-images" alt="{&quot;id&quot;:14,&quot;title&quot;:&quot;Fitness For Children&quot;,&quot;description&quot;:&quot;Regular exercise has lots of health benefits for children and young people, such as: improving fitness, providing an opportunity to socialize; increasing concentration; improving academic scores; building a stronger heart, bones and healthier muscles; encouraging healthy growth and development; improving self-esteem and more.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/14-discipline-1677049984.png&quot;,&quot;desktop_sequence&quot;:17,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/6-discipline-1677043243.png" class="swiper-images" alt="{&quot;id&quot;:6,&quot;title&quot;:&quot;Arial Yoga&quot;,&quot;description&quot;:&quot;Aerial Yoga is a type of yoga which uses a hammock or yoga swing suspended from the ceiling allowing students to perform postures that they may not ordinarily be able to attempt on the yoga mat.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/6-discipline-1677043243.png&quot;,&quot;desktop_sequence&quot;:18,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/18-discipline-1677050151.png" class="swiper-images" alt="{&quot;id&quot;:18,&quot;title&quot;:&quot;Body Building&quot;,&quot;description&quot;:&quot;Bodybuilding is the use of progressive resistance exercise to control and develop one&#039;s musculature for aesthetic purposes. An individual who engages in this activity is referred to as a bodybuilder.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/18-discipline-1677050151.png&quot;,&quot;desktop_sequence&quot;:19,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/22-discipline-1677048040.png" class="swiper-images" alt="{&quot;id&quot;:22,&quot;title&quot;:&quot;Martial Arts for Special Needs &amp; Neural Diverse&quot;,&quot;description&quot;:&quot;Martial Arts is uniquely suited to the developmental needs of people who are neural diverse or with special needs. Martial Arts training is a great therapeutic practice that can help with the physical and\/or intellectual delays, disabilities, and challenges someone with these conditions may be facing.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/22-discipline-1677048040.png&quot;,&quot;desktop_sequence&quot;:20,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/23-discipline-1677050549.png" class="swiper-images" alt="{&quot;id&quot;:23,&quot;title&quot;:&quot;Running&quot;,&quot;description&quot;:&quot;Running is a method of movement allowing humans to move rapidly on foot. Performed in a professional setting or as a healthy habit in leisure it is a freeing exercise that produces positive benefits physically and mentally.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/23-discipline-1677050549.png&quot;,&quot;desktop_sequence&quot;:21,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/15-discipline-1677047511.png" class="swiper-images" alt="{&quot;id&quot;:15,&quot;title&quot;:&quot;Judo&quot;,&quot;description&quot;:&quot;Judo is a modern form of martial art which needs great balance upon one&#039;s body and mind. The word Judo means gentle way. The person who practices judo is called judoka. The main objective of a judoka is to pin down his opponent to the ground and immobilize him through locking body&#039;s joint parts or by choking him.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/15-discipline-1677047511.png&quot;,&quot;desktop_sequence&quot;:22,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/24-discipline-1677048231.png" class="swiper-images" alt="{&quot;id&quot;:24,&quot;title&quot;:&quot;Women&#039;s Self Defense&quot;,&quot;description&quot;:&quot;Women\u2019s Self-Defense teaches self-defense options to women to use if confronted by an aggressor. Those options, when used correctly, will allow potential victims to escape their attacker. This knowledge can help women test their skills in a crisis and discover their own special strengths and talents.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/24-discipline-1677048231.png&quot;,&quot;desktop_sequence&quot;:23,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                            <div class="swiper-slide">
                                    <img src="https://martialartszenweb.s3.amazonaws.com/discipline/21-discipline-1677047925.png" class="swiper-images" alt="{&quot;id&quot;:21,&quot;title&quot;:&quot;Gymnastics&quot;,&quot;description&quot;:&quot;Gymnastics is a sport that includes a number of individual exercises that require a combination of strength, agility, coordination, balance, and grace.&quot;,&quot;photo&quot;:&quot;https:\/\/martialartszenweb.s3.amazonaws.com\/discipline\/21-discipline-1677047925.png&quot;,&quot;desktop_sequence&quot;:24,&quot;main_coming_soon_image&quot;:null,&quot;video_coming_soon_image&quot;:null}">
                                </div>
                                                                        </div>
                </div>
                <!-- Add Navigation -->
                <div class="discipline-swiper-button-next swiper-button-next maz__swiper__banner-btn-next">
                    <img src="http://127.0.0.1:8000/assets/front/images/next.png" class="lazy-arrow" alt="arrows">
                </div>
                <div class="discipline-swiper-button-prev swiper-button-prev maz__swiper__banner-btn-prev">
                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png" class="lazy-arrow" alt="arrows">
                </div>
            </div>
        </div>
    </section>
    <section class="pb-5 pt-1">
        <div class="container px-5">
            <div>
                <h1 class="text-uppercase diciplin-swiper-slider-title mb-2 text-center" id="swiperImageTitle" style="margin-top:5px; z-index:1000 !important;"></h1>
                      
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
                                                                                    <div class="swiper-slide">
                                    <a href="http://127.0.0.1:8000/schools-and-instructors-detail/1">   
                                        <div class="maz__swiper_slider_common_block1">
                                            <div class="maz__swiper_block_discipline-img">
                                                                                            <img src="https://martialartszenweb.s3.amazonaws.com/InstructorPhoto/1-instructor-1667197768.png"  alt="Kimber Hill">
                                                                                        </div>
                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                <h6 style="font-weight:600;">Kimber Hill</h6>
                                                <h6 style="font-weight:600;">Kimber Martial Arts - American Karate</h6>
                                            </div>
                                            <!-- <div class="logo-background">
                                                <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                            </div> -->
                                        </div>
                                    </a> 
                                </div>
                                                            <div class="swiper-slide">
                                    <a href="http://127.0.0.1:8000/schools-and-instructors-detail/2">   
                                        <div class="maz__swiper_slider_common_block1">
                                            <div class="maz__swiper_block_discipline-img">
                                                                                            <img src="https://martialartszenweb.s3.amazonaws.com/InstructorPhoto/2-instructor-1667560378.png"  alt="Frank Blenman">
                                                                                        </div>
                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                <h6 style="font-weight:600;">Frank Blenman</h6>
                                                <h6 style="font-weight:600;">Frank Blenman Martial Arts - Global Karate</h6>
                                            </div>
                                            <!-- <div class="logo-background">
                                                <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                            </div> -->
                                        </div>
                                    </a> 
                                </div>
                                                                                                                    <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                                                                         <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                                                                                    </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                                                            <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                                                                         <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                                                                                    </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                                                            <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                                                                         <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                                                                                    </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                                                            <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                                                                         <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                                                                                    </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                                                            <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                                                                         <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                                                                                    </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                                                            <div class="swiper-slide">
                                            <div class="maz__swiper_slider_common_block1">
                                                <div class="maz__swiper_block_discipline-img">
                                                                                                         <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                                                                                    </div>
                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                    <h6 style="font-weight:600">Coming Soon</h6>
                                                </div>
                                            </div>
                                        </div>
                                        
                        </div>
                    </div>
                    <div class="category-swiper-button-next swiper-button-next maz__swiper_btn-next">
                        <img src="http://127.0.0.1:8000/assets/front/images/next.png" alt="arrows">
                    </div>
                    <div class="category-swiper-button-prev swiper-button-prev maz__swiper_btn-prev">
                        <img src="http://127.0.0.1:8000/assets/front/images/previous.png" alt="arrows">
                    </div>
                </div>
            </div>
        </div>
            
        <!-- <div id="video_section">  -->
        <!-- Schools and Instructors end -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


        {{-- <style>
            html,
            body {
              position: relative;
              height: 100%;
            }
        
            body {
              background: #eee;
              font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
              font-size: 14px;
              color: #000;
              margin: 0;
              padding: 0;
            }
        
            .swiper {
              width: 100%;
              height: 100%;
            }
        
            .swiper-slide {
              text-align: center;
              font-size: 18px;
              background: #fff;
              display: flex;
              justify-content: center;
              align-items: center;
            }
        
            .swiper-slide img {
              display: block;
              width: 100%;
              height: 100%;
              object-fit: cover;
            }
        </style> --}}

        {{-- <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">Slide 1</div>
              <div class="swiper-slide">Slide 2</div>
              <div class="swiper-slide">Slide 3</div>
              <div class="swiper-slide">Slide 4</div>
              <div class="swiper-slide">Slide 5</div>
              <div class="swiper-slide">Slide 6</div>
              <div class="swiper-slide">Slide 7</div>
              <div class="swiper-slide">Slide 8</div>
              <div class="swiper-slide">Slide 9</div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <script>
            var swiper = new Swiper(".mySwiper", {
              slidesPerView: 4,
              spaceBetween: 30,
              pagination: {
                el: ".swiper-pagination",
                clickable: true,
              },
            });
        </script> --}}


        <div class="container">
            <div class="swiper mySwiper1">
                <h2 class="text-uppercase mb-3 mb-md-0">Free Videos</h2>
                <hr>
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <a href="javascript::void(0)" onclick="loginSignupModal()">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                
                                <img src="https://embed-ssl.wistia.com/deliveries/288128b0fcb5f21fb683f9feebae14c6.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=38" alt="Attention and Bow White Belt">
                                <div class="badge-dark-video-time">01:16</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Attention and Bow White Belt</h6>
                                <h6 style="margin-bottom:0;font-weight:600;">Kimber Hill</h6>
                                
                            </div>
                            <!-- <div class="logo-background">
                                <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                            </div> -->
                        </div>
                    </a>
                  </div>
                  <div class="swiper-slide">
                    <a href="javascript::void(0)" onclick="loginSignupModal()">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                
                                <img src="https://embed-ssl.wistia.com/deliveries/72a67af92970181a3b719f03b2cd23d5.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=115" alt="Forward Stance">
                                <div class="badge-dark-video-time">03:51</div>
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Forward Stance</h6>
                                <h6 style="margin-bottom:0;font-weight:600;">Frank Blenman</h6>
                                
                            </div>
                            <!-- <div class="logo-background">
                                <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                            </div> -->
                        </div>
                    </a>
                  </div>
                  <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                  </div>
                </div>
                {{-- <div class="swiper-pagination"></div> --}}
                <div class="swiper-button-next-1 maz__swiper_btn-prev">
                    <img src="http://127.0.0.1:8000/assets/front/images/next.png" alt="arrows">
                </div>
                <div class="swiper-button-prev-1 maz__swiper_btn-next">
                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png" alt="arrows">
                </div>
            </div>
            
            <script>
                var swiper = new Swiper(".mySwiper1", {
                    slidesPerView: 4,
                    spaceBetween: 10,
                    pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next-1",
                        prevEl: ".swiper-button-prev-1",
                    },
                });
            </script>

            <div class="swiper mySwiper2">
                <h2 class="text-uppercase mb-3 mb-md-0">RECOMMENDED VIDEOS</h2>
                <hr>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                            <div class="maz__swiper_slider_common_block">
                                <div class="maz__swiper_block_discipline-img">
                                    
                                    <img src="https://embed-ssl.wistia.com/deliveries/288128b0fcb5f21fb683f9feebae14c6.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=38" alt="Attention and Bow White Belt">
                                    <div class="badge-dark-video-time">01:16</div>
                                </div>
                                <div class="maz__swiper_block_discipline-content pb-2">
                                    <h6 style="font-weight:600;">Attention and Bow White Belt</h6>
                                    <h6 style="margin-bottom:0;font-weight:600;">Kimber Hill</h6>
                                    
                                </div>
                                <!-- <div class="logo-background">
                                    <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                </div> -->
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                            <div class="maz__swiper_slider_common_block">
                                <div class="maz__swiper_block_discipline-img">
                                    
                                    <img src="https://embed-ssl.wistia.com/deliveries/2df96c5d42f21bd566ec30e0fa5cd9e3.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=44" alt="Punch Combo">
                                    <div class="badge-dark-video-time">01:29</div>
                                </div>
                                <div class="maz__swiper_block_discipline-content pb-2">
                                    <h6 style="font-weight:600;">Punch Combo</h6>
                                    <h6 style="margin-bottom:0;font-weight:600;">Frank Blenman</h6>
                                    
                                </div>
                                <!-- <div class="logo-background">
                                    <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                </div> -->
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="swiper-pagination"></div> --}}
                <div class="swiper-button-next-2 maz__swiper_btn-prev">
                    <img src="http://127.0.0.1:8000/assets/front/images/next.png" alt="arrows">
                </div>
                <div class="swiper-button-prev-2 maz__swiper_btn-next">
                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png" alt="arrows">
                </div>
            </div>
            <script>
                var swiper = new Swiper(".mySwiper2", {
                slidesPerView: 4,
                spaceBetween: 10,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next-2",
                    prevEl: ".swiper-button-prev-2",
                },
                });
            </script>

            <div class="swiper mySwiper3">
                <h2 class="text-uppercase mb-3 mb-md-0">BRONZE VIDEOS</h2>
                <hr>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                            <div class="maz__swiper_slider_common_block">
                                <div class="maz__swiper_block_discipline-img">
                                    
                                    <img src="https://embed-ssl.wistia.com/deliveries/d0bab3a08b665423935fe536206d0dae.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=100" alt="Punches">
                                    <div class="badge-dark-video-time">03:20</div>
                                </div>
                                <div class="maz__swiper_block_discipline-content pb-2">
                                    <h6 style="font-weight:600;">Punches</h6>
                                    <h6 style="margin-bottom:0;font-weight:600;">Kimber Hill</h6>
                                    
                                </div>
                                <!-- <div class="logo-background">
                                    <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                </div> -->
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                            <div class="maz__swiper_slider_common_block">
                                <div class="maz__swiper_block_discipline-img">
                                    
                                    <img src="https://embed-ssl.wistia.com/deliveries/1ddc7636c8b9463469da1bc52e1dd71c.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=122" alt="Reverse punch">
                                    <div class="badge-dark-video-time">04:05</div>
                                </div>
                                <div class="maz__swiper_block_discipline-content pb-2">
                                    <h6 style="font-weight:600;">Reverse punch</h6>
                                    <h6 style="margin-bottom:0;font-weight:600;">Frank Blenman</h6>
                                    
                                </div>
                                <!-- <div class="logo-background">
                                    <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                </div> -->
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="maz__swiper_slider_common_block">
                            <div class="maz__swiper_block_discipline-img">
                                <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                            </div>
                            <div class="maz__swiper_block_discipline-content pb-2">
                                <h6 style="font-weight:600;">Coming Soon</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="swiper-pagination"></div> --}}
                <div class="swiper-button-next-3 maz__swiper_btn-prev">
                    <img src="http://127.0.0.1:8000/assets/front/images/next.png" alt="arrows">
                </div>
                <div class="swiper-button-prev-3 maz__swiper_btn-next">
                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png" alt="arrows">
                </div>
            </div>
            <script>
                var swiper = new Swiper(".mySwiper3", {
                slidesPerView: 4,
                spaceBetween: 10,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next-3",
                    prevEl: ".swiper-button-prev-3",
                },
                });
            </script>
            
            <div class="swiper mySwiper4">
                <h2 class="text-uppercase mb-3 mb-md-0">SILVER VIDEOS</h2>
                <hr>
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                </div>
                {{-- <div class="swiper-pagination"></div> --}}
                <div class="swiper-button-next-4 maz__swiper_btn-prev">
                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png" alt="arrows">
                </div>
                <div class="swiper-button-prev-4 maz__swiper_btn-next">
                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png" alt="arrows">
                </div>
            </div>
            <script>
                var swiper = new Swiper(".mySwiper4", {
                slidesPerView: 4,
                spaceBetween: 10,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next-4",
                    prevEl: ".swiper-button-prev-4",
                },
                });
            </script>

            <div class="swiper mySwiper5">
                <h2 class="text-uppercase mb-3 mb-md-0">GOLD VIDEOS</h2>
                <hr>
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="maz__swiper_slider_common_block">
                        <div class="maz__swiper_block_discipline-img">
                            <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                        </div>
                        <div class="maz__swiper_block_discipline-content pb-2">
                            <h6 style="font-weight:600;">Coming Soon</h6>
                        </div>
                    </div>
                </div>
                </div>
                {{-- <div class="swiper-pagination"></div> --}}
                <div class="swiper-button-next-5 maz__swiper_btn-prev">
                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png" alt="arrows">
                </div>
                <div class="swiper-button-prev-5 maz__swiper_btn-next">
                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png" alt="arrows">
                </div>
            </div>
            <script>
                var swiper = new Swiper(".mySwiper5", {
                slidesPerView: 4,
                spaceBetween: 10,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next-5",
                    prevEl: ".swiper-button-prev-5",
                },
                });
            </script>

            @auth
                @if(count($levels))
                    @foreach($levels as $l)
                        <div class="swiper mySwiper5">
                            <h2 class="text-uppercase mb-3 mb-md-0">{{ $l['level_name'] }} Videos</h2>
                            <hr>
                            <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                    </div>
                                    <div class="maz__swiper_block_discipline-content pb-2">
                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                    </div>
                                    <div class="maz__swiper_block_discipline-content pb-2">
                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                    </div>
                                    <div class="maz__swiper_block_discipline-content pb-2">
                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                    </div>
                                    <div class="maz__swiper_block_discipline-content pb-2">
                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                    </div>
                                    <div class="maz__swiper_block_discipline-content pb-2">
                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                    </div>
                                    <div class="maz__swiper_block_discipline-content pb-2">
                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                    </div>
                                    <div class="maz__swiper_block_discipline-content pb-2">
                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="maz__swiper_slider_common_block">
                                    <div class="maz__swiper_block_discipline-img">
                                        <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg" alt="">
                                    </div>
                                    <div class="maz__swiper_block_discipline-content pb-2">
                                        <h6 style="font-weight:600;">Coming Soon</h6>
                                    </div>
                                </div>
                            </div>
                            </div>
                            {{-- <div class="swiper-pagination"></div> --}}
                            <div class="swiper-button-next-5 maz__swiper_btn-prev">
                                <img src="http://127.0.0.1:8000/assets/front/images/previous.png" alt="arrows">
                            </div>
                            <div class="swiper-button-prev-5 maz__swiper_btn-next">
                                <img src="http://127.0.0.1:8000/assets/front/images/previous.png" alt="arrows">
                            </div>
                        </div>
                        <script>
                            var swiper = new Swiper(".mySwiper5", {
                            slidesPerView: 4,
                            spaceBetween: 10,
                            pagination: {
                                el: ".swiper-pagination",
                                clickable: true,
                            },
                            navigation: {
                                nextEl: ".swiper-button-next-5",
                                prevEl: ".swiper-button-prev-5",
                            },
                            });
                        </script>
                    @endforeach
                @endif
            @else
            @endauth

        </div>

        
         
                            
                <script>
                    var total_count_row = parseInt("5");
                </script>
{{--                 
                                    <!--Dynamic Videos-->
                    <div class="categories_swiper__slider-block">
                        <div class="container">
                            <div class="swiper__main_blocks">
                                <h2 class="text-uppercase mb-3 mb-md-0">Free Videos</h2>
                                <hr>
                                <div class="swiper-container swiper-0 free_videos mt-4">
                                    <div class="swiper-wrapper free_videos1" id="video_section_1">
                                                                                       
                                                                                                    <div class="swiper-slide">
                                                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                    
                                                                    <img src="https://embed-ssl.wistia.com/deliveries/288128b0fcb5f21fb683f9feebae14c6.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=38"  alt="Attention and Bow White Belt">
                                                                    <div class="badge-dark-video-time">01:16</div>
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Attention and Bow White Belt</h6>
                                                                    <h6 style="margin-bottom:0;font-weight:600;">Kimber Hill</h6>
                                                                
                                                                </div>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                                                </div> -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    
                                               
                                                                                                    <div class="swiper-slide">
                                                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                    
                                                                    <img src="https://embed-ssl.wistia.com/deliveries/72a67af92970181a3b719f03b2cd23d5.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=115"  alt="Forward Stance">
                                                                    <div class="badge-dark-video-time">03:51</div>
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Forward Stance</h6>
                                                                    <h6 style="margin-bottom:0;font-weight:600;">Frank Blenman</h6>
                                                                
                                                                </div>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                                                </div> -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    
                                                                                                                                                                                    <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                    
                                    </div>
                                </div>
                               
                                <div class="swiper-button-next maz__swiper_btn-next swiper-next-0">
                                    <img src="http://127.0.0.1:8000/assets/front/images/next.png"  alt="arrows">
                                </div>
                                <div class="swiper-button-prev maz__swiper_btn-prev swiper-prev-0">
                                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png"  alt="arrows">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dynamic Videos end -->
                                    <!--Dynamic Videos-->
                    <div class="categories_swiper__slider-block">
                        <div class="container">
                            <div class="swiper__main_blocks">
                                <h2 class="text-uppercase mb-3 mb-md-0">Recommended Videos</h2>
                                <hr>
                                <div class="swiper-container swiper-1 free_videos mt-4">
                                    <div class="swiper-wrapper free_videos1" id="video_section_5">
                                                                                       
                                                                                                    <div class="swiper-slide">
                                                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                    
                                                                    <img src="https://embed-ssl.wistia.com/deliveries/288128b0fcb5f21fb683f9feebae14c6.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=38"  alt="Attention and Bow White Belt">
                                                                    <div class="badge-dark-video-time">01:16</div>
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Attention and Bow White Belt</h6>
                                                                    <h6 style="margin-bottom:0;font-weight:600;">Kimber Hill</h6>
                                                                
                                                                </div>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                                                </div> -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    
                                               
                                                                                                    <div class="swiper-slide">
                                                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                    
                                                                    <img src="https://embed-ssl.wistia.com/deliveries/2df96c5d42f21bd566ec30e0fa5cd9e3.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=44"  alt="Punch Combo">
                                                                    <div class="badge-dark-video-time">01:29</div>
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Punch Combo</h6>
                                                                    <h6 style="margin-bottom:0;font-weight:600;">Frank Blenman</h6>
                                                                
                                                                </div>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                                                </div> -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    
                                                                                                                                                                                    <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                    
                                    </div>
                                </div>
                               
                                <div class="swiper-button-next maz__swiper_btn-next swiper-next-1">
                                    <img src="http://127.0.0.1:8000/assets/front/images/next.png"  alt="arrows">
                                </div>
                                <div class="swiper-button-prev maz__swiper_btn-prev swiper-prev-1">
                                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png"  alt="arrows">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dynamic Videos end -->
                                    <!--Dynamic Videos-->
                    <div class="categories_swiper__slider-block">
                        <div class="container">
                            <div class="swiper__main_blocks">
                                <h2 class="text-uppercase mb-3 mb-md-0">Bronze Videos</h2>
                                <hr>
                                <div class="swiper-container swiper-2 free_videos mt-4">
                                    <div class="swiper-wrapper free_videos1" id="video_section_2">
                                                                                       
                                                                                                    <div class="swiper-slide">
                                                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                    
                                                                    <img src="https://embed-ssl.wistia.com/deliveries/d0bab3a08b665423935fe536206d0dae.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=100"  alt="Punches">
                                                                    <div class="badge-dark-video-time">03:20</div>
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Punches</h6>
                                                                    <h6 style="margin-bottom:0;font-weight:600;">Kimber Hill</h6>
                                                                
                                                                </div>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                                                </div> -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    
                                               
                                                                                                    <div class="swiper-slide">
                                                        <a href="javascript::void(0)" onclick="loginSignupModal()">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                    
                                                                    <img src="https://embed-ssl.wistia.com/deliveries/1ddc7636c8b9463469da1bc52e1dd71c.jpg?&amp;image_quality=100&amp;ssl=true&amp;video_still_time=122"  alt="Reverse punch">
                                                                    <div class="badge-dark-video-time">04:05</div>
                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Reverse punch</h6>
                                                                    <h6 style="margin-bottom:0;font-weight:600;">Frank Blenman</h6>
                                                                
                                                                </div>
                                                                <!-- <div class="logo-background">
                                                                    <img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">
                                                                </div> -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    
                                                                                                                                                                                    <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                    
                                    </div>
                                </div>
                               
                                <div class="swiper-button-next maz__swiper_btn-next swiper-next-2">
                                    <img src="http://127.0.0.1:8000/assets/front/images/next.png"  alt="arrows">
                                </div>
                                <div class="swiper-button-prev maz__swiper_btn-prev swiper-prev-2">
                                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png"  alt="arrows">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dynamic Videos end -->
                                    <!--Dynamic Videos-->
                    <div class="categories_swiper__slider-block">
                        <div class="container">
                            <div class="swiper__main_blocks">
                                <h2 class="text-uppercase mb-3 mb-md-0">Silver Videos</h2>
                                <hr>
                                <div class="swiper-container swiper-3 free_videos mt-4">
                                    <div class="swiper-wrapper free_videos1" id="video_section_3">
                                                                                       
                                                                                                    <div class="swiper-slide">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                                                                                           <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                        </div>
                                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                                <h6  style="font-weight:600">Coming Soon</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                               
                                                                                                    <div class="swiper-slide">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                                                                                           <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                        </div>
                                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                                <h6  style="font-weight:600">Coming Soon</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                                                                                                                                                    <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                    
                                    </div>
                                </div>
                               
                                <div class="swiper-button-next maz__swiper_btn-next swiper-next-3">
                                    <img src="http://127.0.0.1:8000/assets/front/images/next.png"  alt="arrows">
                                </div>
                                <div class="swiper-button-prev maz__swiper_btn-prev swiper-prev-3">
                                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png"  alt="arrows">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dynamic Videos end -->
                                    <!--Dynamic Videos-->
                    <div class="categories_swiper__slider-block">
                        <div class="container">
                            <div class="swiper__main_blocks">
                                <h2 class="text-uppercase mb-3 mb-md-0">Gold Videos</h2>
                                <hr>
                                <div class="swiper-container swiper-4 free_videos mt-4">
                                    <div class="swiper-wrapper free_videos1" id="video_section_4">
                                                                                       
                                                                                                    <div class="swiper-slide">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                                                                                           <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                        </div>
                                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                                <h6  style="font-weight:600">Coming Soon</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                               
                                                                                                    <div class="swiper-slide">
                                                        <div class="maz__swiper_slider_common_block">
                                                            <div class="maz__swiper_block_discipline-img">
                                                                                                                           <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                        </div>
                                                            <div class="maz__swiper_block_discipline-content pb-2">
                                                                <h6  style="font-weight:600">Coming Soon</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                                                                                                                                                    <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            <div class="swiper-slide">
                                                            <div class="maz__swiper_slider_common_block">
                                                                <div class="maz__swiper_block_discipline-img">
                                                                                                                                   <img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="">
                                                                                                                                </div>
                                                                <div class="maz__swiper_block_discipline-content pb-2">
                                                                    <h6 style="font-weight:600;">Coming Soon</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                    
                                    </div>
                                </div>
                               
                                <div class="swiper-button-next maz__swiper_btn-next swiper-next-4">
                                    <img src="http://127.0.0.1:8000/assets/front/images/next.png"  alt="arrows">
                                </div>
                                <div class="swiper-button-prev maz__swiper_btn-prev swiper-prev-4">
                                    <img src="http://127.0.0.1:8000/assets/front/images/previous.png"  alt="arrows">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dynamic Videos end -->
                     
                         --}}
        
        
        <!-- </div> -->
        <!--Free Videos-->
        
        
        
        <!-- Free Videos end -->

        <!-- Recommended for You -->
        
        <!-- Recommended for You end -->

        <!-- Bronze Videos -->
       
        
        
        <!-- Bronze Videos end -->

        <!-- Silver Video -->
       
        
    </section>
        </main>

        <footer class="maz__footer">
    <section class="maz__footer-bg maz__sections" style="padding: 4.375rem 0 !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3 mb-4 mb-lg-0" style="padding-left:2%;">
                    <a href="http://127.0.0.1:8000/softRegister">
                        <img src="http://127.0.0.1:8000/images/newMartialArtsLogo.jpeg" id="footerLogo" alt="MAZ Logo" width="80%;" height="97px;">
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="maz__quick-links">
                        <ul class="list-unstyled">
                            <li class="fw-bold text-uppercase mb-2"><span>Students</span></li>
                                                            
                                <li><a href="http://127.0.0.1:8000/login">Free Videos</a></li>
                                                    </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="maz__quick-links">
                        <ul class="list-unstyled">
                            <li class="fw-bold text-uppercase mb-2"><span>Instructors</span></li>
                            <li><a href="http://127.0.0.1:8000/softRegister?#educators-section">Teach</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="maz__quick-links">
                        <ul class="list-unstyled">
                            <li class="fw-bold text-uppercase mb-2"><span>Legal</span></li>
                            <li><a href="http://127.0.0.1:8000/terms">Terms and Conditions</a></li>
                            <li><a href="http://127.0.0.1:8000/privacy-policy">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="maz__quick-links">
                        <ul class="list-unstyled">
                            <li class="fw-bold text-uppercase mb-2"><span>Contact Us</span></li>
                            <li><a href="javascript:void(0)" onclick="contactUsModal()" id="myBtn"> Contact Us </a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="maz__quick-links">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="maz__copyright-bg">
        <p class="maz__footer-text">©2022 ExperiZen, LLC</p>
    </div>
    <!-- The Modal -->
<div id="myModal" class="modal1">

    <!-- Modal content -->
    <div class="modal-content1">
    
    <div class="container text-center">
    <span class="close1">&times;</span>
        <h3>Contact Us</h3>
        <hr>
        <div class="contactForm">
            <form action="http://127.0.0.1:8000/contactUsForm" method="post">
                <input type="hidden" name="_token" value="4GWNiedl7X8NaBH5dIh6FEy7pMKQ5gZrQq9vYNRf">                <div class="col-md-12">
                    <div class="form-group row mb-2">
                        <div class="col-sm-12">
                            <select name="topic" id="topic" class="form-control" required>
                                <option value="">Select Topic</option>
                                <option value="1">Student Related Topic</option>
                                <option value="2">Instructor Related Topic</option>
                                <option value="3">Other Topic</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-sm-12">
                        <input type="email" name="email" class="form-control" id="staticEmail" placeholder="email@example.com" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email@example.com'" required />
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-sm-12">
                            <textarea name="message" class="form-control" id="message" cols="30" rows="5" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12" style="text-align:right;">
                        <button class="btn btn-danger" type="button" onclick="closeContactForm()">Cancel</button>
                        <button class="btn btn-info" type="submit">Submit</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    </div>

</div>
    <script>
        function loginMessage()
        {
            Swal.fire({
            title: '<h5>Please <a href="http://127.0.0.1:8000/free?type=free"> Sign Up </a> To Gain Access</h5>',
            // icon: 'info',
            iconHtml: '<img src="http://127.0.0.1:8000/images/infoIcon1.png">',
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
    
</footer>
        <script src="http://127.0.0.1:8000/assets/front/js/other.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.js" ></script>
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

            var url = 'http://127.0.0.1:8000/login?:id';

            url = url.replace(':id',currentDisciplineId);
            
            window.location.href = url;
        }

        function upgradePlanModal()
        {
    

            Swal.fire({
            title: '<h5> Upgrade to Bronze plan to view content </h5>',
            iconHtml: '<img src="http://127.0.0.1:8000/images/infoIcon1.png">',
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

                    var url = 'http://127.0.0.1:8000/bronzePlanStripe?:id';

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

            var url = 'http://127.0.0.1:8000/login?:id';


            url = url.replace(':id',currentDisciplineId);

            Swal.fire({
            title: '<h5>Please log in or sign up to gain access </h5>',
            iconHtml: '<img src="http://127.0.0.1:8000/images/infoIcon1.png">',
            //icon: 'info',
            html:
            '<a type="button" style="outline:none !important;" href="'+ url +'" class="customSwalBtn">' + 'Log In' + '</a>' +
            '<a type="button" style="outline:none !important;" href="http://127.0.0.1:8000/softRegister?type=free" class="customSwalBtn">' + 'Sign Up' + '</a>',
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
        var totoalDisciplineCount = 23;

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
        swiperDisicipline.on('slideChangeTransitionStart', function() {
           
            var currentActiveSlide = JSON.parse($('.swiper-slide-active img').attr('alt'));
            var disciplineSequence = currentActiveSlide.id;
            $("#currentDisciplineId").val(disciplineSequence);
            
            $(".schools_and_instructors1").empty();
             $(".free_videos1").empty();
             $(".recommended_videos1").empty();
            // $(".silver_videos1").empty();
            // $(".gold_videos1").empty();
         
            var userDetails = null;
          
            $.ajax({
                    url:"http://127.0.0.1:8000/getInstructorsOfCurrrentDiscipline",
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

                        if(result.currentDiscipline.main_coming_soon_image !== null && result.currentDiscipline.main_coming_soon_image !== '')
                        {
                            var mainComingSoon = '<img src="'+result.currentDiscipline.main_coming_soon_image+'"  alt="Coming Soon">';
                        }
                        else
                        {
                            var mainComingSoon = '<img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="Coming Soon">';
                        }
                        
                        if(result.currentDiscipline.video_coming_soon_image !== null && result.currentDiscipline.video_coming_soon_image !== '')
                        {
                            var videoComingSoon = '<img src="'+result.currentDiscipline.video_coming_soon_image+'"  alt="Coming Soon">';
                        }
                        else
                        {
                            var videoComingSoon = '<img src="http://127.0.0.1:8000/assets/front/images/download.jpeg"  alt="Coming Soon">';
                        }

                        var instructorData = result.instructorData;
                        
                        if(instructorData.length > 0)
                        {
                           
                            for(var i = 0; i < instructorData.length; i++)
                            {
                                var instructor_id = "http://127.0.0.1:8000/schools-and-instructors-detail/"+instructorData[i].id;

                                if(instructorData[i].photo != null)
                                {
                                    var instructor_profile = '<img src="'+instructorData[i].photo.replace('image_crop_resized=200x120','')+'"  alt="'+instructorData[i].name+'">';
                                }
                                else
                                {
                                    var instructor_profile = '<img src="http://127.0.0.1:8000/assets/front/images/avtar.png"  alt="'+instructorData[i].name+'">';
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
                                                var free_videos_id = "http://127.0.0.1:8000/playInstructorVideo?video_id="+videos[two_videos_count].video_id;

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
                                                    var free_videos_id = "http://127.0.0.1:8000/playInstructorVideo?video_id="+videos[two_videos_count].video_id;

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
                                                                                    //     '<img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">'+
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
                                                    var free_videos_id = "http://127.0.0.1:8000/playInstructorVideo?video_id="+videos[two_videos_count].video_id;

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
                                                                            //     '<img class="reward-logo" src="http://127.0.0.1:8000/assets/front/images/rewards.png">'+
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
                    }
            });

            $("#swiperImageTitle").text(currentActiveSlide.title);
            $("#swiperImageDescription").text(currentActiveSlide.description);
        });


        // var free_videos = new Swiper(".free_videos, .schools_and_instructors, .recommended_for_you, .bronze_videos, .silver_videos, .gold_videos", {
           
            
        // });

        var swiper = new Swiper('.swiper-container.swiper-wrapper.schools_and_instructors', {
      navigation: {
        nextEl: '.maz__swiper_btn-next',
        prevEl: '.maz__swiper_btn-prev',
      },
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

        for(int_row=0; int_row < total_count_row; int_row++) {
            var swiper = new Swiper('.swiper-' + int_row, {
            navigation: {
                nextEl: '.swiper-next-' + int_row,
                prevEl: '.swiper-prev-' + int_row,
            },
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

            }
            });
        }
    </script>
<script src="https://kit.fontawesome.com/1009e4fb26.js" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/lozad"></script> -->
<script>
  $(function() {

      var is_logged_in_user = $('#is_accepted_bronze_plan').val();
      var is_accepted_bronze_plan = $('#is_accepted_bronze_plan').val();

      var subscription_id = $('#subscription_id1').val();
      var payment_status = $('#payment_status').val();
      var email_verified = $('#email_verified').val();
      var first_time_user = $('#first_time_user').val();
      var userLoggedInOrNot = $('#userLoggedInOrNot').val();

      var is_first_time_on_step_two = $('#is_first_time_on_step_two').val();

      if (typeof(Storage) !== "undefined") {
        if(localStorage.useremail || localStorage.userfirstname || localStorage.userlastname || localStorage.userphone) {
          $("#sectionRegistrationNotice").removeClass('d-none');
        }
      }
      
      
      if(is_accepted_bronze_plan == 2)
      {
          $("#sectionRegistrationNotice").removeClass('d-none');
      }

      //if(is_first_time_on_step_two == 2 && payment_status != 0)
      if(is_first_time_on_step_two == 2)
      {
          $("#sectionRegistrationNotice").removeClass('d-none');
      }

      if(subscription_id != 1 && payment_status == 0 && email_verified != '' && first_time_user == 2)
      {
          $("#redeemBronzePlan").removeAttr('hidden');
      }

      if(email_verified == '' && userLoggedInOrNot != '' && first_time_user == 2)
      {
        $ ("#verifyEmailBanner").removeAttr('hidden');
      }
  });
</script>
<script>
        function loginMessage()
        {
            Swal.fire({
            title: '<h5>Please <a href="http://127.0.0.1:8000/softRegister?type=free"> Sign Up </a> To Gain Access</h5>',
            // icon: 'info',
            iconHtml: '<img src="http://127.0.0.1:8000/images/infoIcon1.png">',
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
<script>
    function contactUsModal()
    {
        // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 

  modal.style.display = "block";


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

span.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
    }


function closeContactForm()
{

    $('#topic').val('');
    $('#staticEmail').val('');
    $('#message').val('');

    var modal = document.getElementById("myModal");
    
    modal.style.display = "none";
}
</script>
    </div>
</body>

</html>