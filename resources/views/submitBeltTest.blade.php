@extends('front.layouts.app')
@section('content')


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('beltificationcss/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('beltificationcss/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('beltificationcss/style.css') }}">
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-light bg-light">
                    <div class="col-md-2">
                        <ul>
                            <li><img src="{{ asset('beltificationimages/Layer_3.png')}}" alt=""></li>
                        </ul>
                    </div>
                    
                    <div class="col-md-8">
                        <ul style="text-align: center;">
                            <li class="nav-item home">Home</li>
                            <li class="nav-item">Disiplines</li>
                            <li class="nav-item">School & Instructor</li>
                            <li class="nav-item">Classes</li>
                            <li class="nav-item">Beltification</li>
                            <li class="nav-item">Digital Dojo</li>
                        </ul>
                    </div>

                    <div class="col-md-2">
                        <ul style="text-align: center;">
                            <li class="nav-item"><img src="{{ asset('beltificationimages/3-layers (1).png')}}" alt=""></li>
                            <li class="nav-item"><img src="{{ asset('beltificationimages/3-layers.png')}}" alt=""></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header> -->

    <link rel="stylesheet" href="{{ asset('beltificationcss/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('beltificationcss/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('beltificationcss/style.css') }}">

    <section class="top-section">
        <div class="container">
            <div class="row">
                <div class="col-md-11 blue-baner-section">
                    <div class="school-name border">
                        <p class="school_name">MightyFIst</p>
                        <p class="b_portal">Submit my Belt Test</p>
                    </div>
                    <img class="float-end img-fluid" src="{{ asset('beltificationimages/banner-images.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="my-4">
        <div class="backtoschool-wrap">
                <div class="container" >
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="" style="text-align:right;">
                                <a href="{{ route('studentSubmitedTest') }}" class="back-btn"> Back to My Belts</a>
                            </div>    
                            <div class="row">
                                <div class="col-md-3">
                                    
                                    <div >
                                        <img style="width: 46%; margin-top: 28px;" src="{{ asset('beltificationimages/Layer_49.png')}}">
                                        <h6 class="text fw-bold" style="font-size: 22px;margin-bottom: 70px;">Taekwondo</h6>
                                        <!-- <h5 class="fw-bold">MESSAGE FOR INSTRUCTOR</h5>
                                        <textarea class="form-control" disabled rows="4" style="width: 72%;"></textarea> -->
                                    </div>
                                </div>
                                <div class="col-md-5" style="line-height: 20px;">
                                    <div class="">
                                        <img class="" style="margin-top: 38px; margin-bottom: 24px;" src="{{asset('beltificationimages/5-layers.png')}}">
                                        
                                        
                                        <span class="text">
                                            <p class="">LEVEL: <span style="margin-left: 16px;color: #e7000e;">BRONZE</span></p>
                                            
                                            <hr>
                                        </span>
                                        <span class="text">
                                            <p class="">TESTS TOTAL FOR THIS SCHOOL: <span style="margin-left: 16px;color: #e7000e;">6</span></p>
                                            
                                            <hr>
                                        </span>
                                        <span class="text">
                                            <p class="">TESTS UNTIL THE STUDENT ACHIEVES THE NEXT MAJOR LEVEL/BELTX: <span style="margin-left: 16px;color: #e7000e;">5</span></p>
                                            <hr>
                                        </span>
                                        <span class="text">
                                            <p class="">PRICE: <span style="margin-left: 16px;color: #e7000e;">$ 35</span></p>
                                            
                                        
                                        </span>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4 px-5 instructions">
                                    <!-- <a href="{{ route('beltTestResult') }}" class="btn btn-success form-control" style="margin-top:80px;margin-bottom: 45px;" type="button" value="SUBMIT MY TEST">SUBMIT MY TEST</a> -->
                                    
                                    <h5 style="margin-bottom: 24px; margin-top: 44px;">INSTRUCTIONS</h5>
                                    <p>In your Submitted test videos, perform the following forms in orders.</p>
                                    <p><span class="steps">Steps 1</span>: Basic Horse Stance</p>
                                    <p><span class="steps">Steps 2</span>: Balanced Horse Stance Squats</p>
                                    <p><span class="steps">Steps 3</span>: First  Form with Staff</p>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
        </div>
    </section>

<!-- intro video section -->
    <section>
        <div class="container mb-4">
            <div class="row" style="text-align: center;">
                <div class="col-md-12">
                    <h6 class="mt-5 fw-bold" style="font-size: 24px;">BROWN BELT INTRO VIDEO</h6>
                    <div class="video-play">
                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_65.png')}}" style="width: 44%;" alt="">
                        <img class="youtube-btn" src="{{ asset('beltificationimages/Layer_66.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="" style="box-shadow: 0 15px rgb(186 186 186 / 30%);">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12">
                    <h5>TEACHING VIDEOS</h5>
                    <div class="row rowSpace earns-belt-wrap">
                        <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel"> 
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row rowtext-whiteSpace" style="padding:0 15px;">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Intro Video</p>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 1</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 2</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 3</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
        
                                <div class="carousel-item">
                                    <div class="row rowtext-whiteSpace">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 4</p>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 5</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 6</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 7</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>  
                            <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1"
                                data-bs-slide="prev">
                                <img src="{{ asset('beltificationimages/2-layers (1).png')}}" class="background p-1 carousel-control arrow1 "
                                    aria-hidden="true">
                            </a>
                            <a class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                                <img src="{{ asset('beltificationimages/2-layers.png')}}" class="background p-1 carousel-control arrow"
                                    aria-hidden="true">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <section class="upload-files-section py-5" >
        <div class="container"> 
            <div class="row">
                <div class="col-md-8">
                    <h2 style="margin-bottom: 18px;">Let's submit your Belt test!</h2>
                    <h5>UPLOAD VIDEOS</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="custom-file-upload form-control">
                                <input class="input-none" type="file">
                                Browse videos
                            </label>
                        </div>
                        <div class="col-md-4">
                            <a class="btn btn-success" href=""><img class="img-fluid" src="{{ asset('beltificationimages/Layer_67.png')}}" alt=""></a>
                            <a class="btn p-0" href=""><img class="img-fluid" src="{{ asset('beltificationimages/plus.png')}}" alt=""></a>
                            <a class="btn p-0" href=""><img src="{{ asset('beltificationimages/minus.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold">MESSAGE FOR INSTRUCTOR</h5>
                    <textarea class="form-control" disabled rows="3" style="width: 90%;"></textarea>
                    <!-- <h2 style="margin-bottom: 21px;">INSTRUCTIONS</h2>
                    <p>In your Submitted test videos, perform the following forms in orders.</p>
                    <p><span class="steps">Steps 1</span>: Basic Horse Stance</p>
                    <p><span class="steps">Steps 2</span>: Balanced Horse Stance Squats</p>
                    <p><span class="steps">Steps 3</span>: First  Form with Staff</p> -->
                    
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-12">
                    <h5>STUDENT VIDEOS</h5>
                    <div class="row rowSpace earns-belt-wrap">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"> 
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row rowtext-whiteSpace" style="padding:0 15px;">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Intro Video</p>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 1</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 2</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 3</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
        
                                <div class="carousel-item">
                                    <div class="row rowtext-whiteSpace">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 4</p>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 5</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 6</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <div class="inner-wrap">
                                                    <p>Lesson 7</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>  
                            <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <img src="{{ asset('beltificationimages/2-layers (1).png')}}" class="background p-1 carousel-control arrow1 "
                                    aria-hidden="true">
                            </a>
                            <a class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <img src="{{ asset('beltificationimages/2-layers.png')}}" class="background p-1 carousel-control arrow"
                                    aria-hidden="true">
                            </a>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="row">
                <div class="col-md-">
                    <a href="{{ route('beltTestResult') }}" class="form-control btn btn-success submit-my-test" type="button" value="SUBMIT MY TEST">SUBMIT MY TEST</a>
                </div>
            </div>
        </div>
    </section>
    
    <script src="{{ asset('beltificationjs/bootstrap.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.dataTables.min.js')}}"></script>
@endsection
    <!-- <footer class="maz__footer">
        <section class="maz__footer-bg maz__sections">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                        <img src="{{ asset('beltificationimages/Layer_3.png')}}" data-loaded="true">
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <div class="maz__quick-links">
                            <ul class="list-unstyled">
                                <li class="fw-bold text-uppercase mb-2"><span>Students</span></li>

                                <li><a href="javascript:void(0)" onclick="loginMessage()">Free Videos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <div class="maz__quick-links">
                            <ul class="list-unstyled">
                                <li class="fw-bold text-uppercase mb-2"><span>Instructors</span></li>
                                <li><a href="javascript:void(0)" onclick="loginMessage()">Teach</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <div class="maz__quick-links">
                            <ul class="list-unstyled">
                                <li class="fw-bold text-uppercase mb-2"><span>Legal</span></li>
                                <li><a href="http://martialartszen.loc/terms">Terms and Conditions</a></li>
                                <li><a href="http://martialartszen.loc/privacy-policy">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <div class="maz__quick-links">
                            <ul class="list-unstyled">
                                <li class="fw-bold text-uppercase mb-2"><span>Contact Us</span></li>
                                <li><a href="javascript:void(0)" onclick="contactUsModal()" id="myBtn"> Contact Us </a>
                                </li>
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

    </footer>


    <script src="{{ asset('beltificationjs/bootstrap.bundle.js')}}"></script>
    <script src="{{ asset('beltificationjs/bootstrap.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/popper.min.js')}}"></script>
</body>
</html> -->