@extends('front.layouts.app')
@section('content')

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belt Grade Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('beltificationcss/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('beltificationcss/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('beltificationcss/style.css') }}">
    
</head>
<body class="mt-5 mb-5">
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
                        <p class="school_name">MightyFist</p>
                        <p class="b_portal">View Belt</p>
                    </div>
                    <img class="float-end img-fluid" src="{{ asset('beltificationimages/banner-images.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
  
    <section class="mt-5">
        <div class="backttoschool-wrap">
                <div class="container" >
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="" style="margin-bottom:24px; text-align:right;">
                                <a href="{{ route('instructorBeltification') }}" class="back-btn"> Back to My SCHOOL Belt</a>
                            </div>    
                            <div class="row">
                                <div class="col-md-4">
                                    
                                    <div >
                                        <img class="img-changes" src="{{ asset('beltificationimages/Layer_49.png')}}">
                                        <p class="text mb-2 ">Taekwondo</p>
                                        <h6>BELT TEST INTRO VIDEO</h6>
                                        <img class="video-bigger" src="{{ asset('beltificationimages/Layer_52.png')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <img class="mb-5" src="{{ asset('beltificationimages/5-layers.png')}}">
                                        
                                       
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
                                <div class="col-md-4 px-5">
                                    
                                     
                                    
                                    <h6 style="margin-top:95px;">DESCRIPTION</h6>
                                    <p class="para">There are three essential skills I will be looking at in this Belification Test: speed, power and technique. This quick test focuses on leg strength, punching speed and balance all three skills canbe evaluated quickly and honestly and are easy to revisit as your training progresses.</p>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <section class="student-videos-and-instructions pt-3 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h5>STUDENT VIDEOS</h5>
                    <div class="row rowSpace">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"> 
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row rowtext-whiteSpace">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p>Intro Video</p>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p>Lesson 1</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p>Lesson 2</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
        
                                <div class="carousel-item">
                                    <div class="row rowtext-whiteSpace">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p>Lesson 3</p>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p>Lesson 4</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p>Lesson 5</p>
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
                <div class="col-md-4 instructions">
                    <h5>INSTRUCTIONS</h5>
                    <p>In your Submitted test videos, perform the following forms in orders.</p>
                    <p><span class="steps">Steps 1</span>: Basic Horse Stance</p>
                    <p><span class="steps">Steps 2</span>: Balanced Horse Stance Squats</p>
                    <p><span class="steps">Steps 3</span>: First  Form with Staff</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-4" >
                    
                    <a class="btn edit-btn mb-5" href="{{ route('editBeltDetails') }}">EDIT BELT</a>
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
                        <img data-src="{{ asset('assets/front/images/logo.svg')}}" class="lazy md-fade"
                            alt="MAZ Logo" width="auto" height="auto"
                            src="{{ asset('assets/front/images/logo.svg')}}" data-loaded="true">
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