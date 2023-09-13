@extends('front.layouts.app')
@section('content')
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('beltificationcss/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('beltificationcss/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('beltificationcss/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <style>
        .card.align-border {
            box-shadow: 4px 4px 4px 4px #00000030;
            margin-bottom: 20px;
            border-radius: 16px;
        }
    </style>
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
                        <p class="school_name">MightyFist</p>
                        <p class="b_portal">Belt Test Review</p>
                    </div>
                    <img class="float-end img-fluid" src="{{ asset('beltificationimages/banner-images.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="student-comment-section py-4 my-4">
        <div class="container">
            <div class="row my-4">
                <div class="col-md-2">
                    <div class="profile-image-section">
                        <img class="profile-image" src="{{ asset('beltificationimages/profile.png')}}" alt="">
                        <p class="my-2 student-name">STUDENT NAME</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>STUDENTS COMMENTS</h5>
                    <textarea  class="form-control" cols="10" rows="3" placeholder=""></textarea>
                    <!-- <input type="button" value="SUBMIT" class="my-2 btn btn-success float-end"> -->
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <table class="table">
                        <tr>
                            <td class="fw-bold">BELT NAME:</td>
                            <td>Brown Belt</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">DISIPLINE:</td>
                            <td>TAIKWONDO</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">BELT LEVEL:</td>
                            <td>BRONZE (BEGINNER)</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">PRICE:</td>
                            <td>$25.00</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="student-videos-and-instructions">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h5>STUDENT VIDEOS</h5>
                    <div class="row rowSpace">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"> 
                            <div class="carousel-inner" style="padding:12pxpa">
                                <div class="carousel-item active">
                                    <div class="row rowtext-whiteSpace">
                                        <div class="col-md-4">
                                            <div class="card align-border">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p style="padding: 8px 0px 0px 12px;">Intro Video</p>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-4">
                                            <div class="card align-border">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p style="padding: 8px 0px 0px 12px;">Lesson 1</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card align-border">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p style="padding: 8px 0px 0px 12px;">Lesson 2</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
        
                                <div class="carousel-item">
                                    <div class="row rowtext-whiteSpace">
                                        <div class="col-md-4">
                                            <div class="card align-border">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p style="padding: 8px 0px 0px 12px;">Lesson 3</p>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-4">
                                            <div class="card align-border">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p style="padding: 8px 0px 0px 12px;">Lesson 4</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card align-border">
                                                <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                                <p style="padding: 8px 0px 0px 12px;">Lesson 5</p>
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
            <div class="row instructor-notes my-4">
                <h5>INSTRUCTOR NOTES</h5>
                <textarea class="form-control" rows="5" placeholder="Type your Notes"></textarea>
                <div class="my-2">
                    <a href="{{ route('beltGradeDashboard') }}" type="button" value="PASS" class="btn px-5 btn-success float-end">PASS</a>
                    <a href="{{ route('beltGradeDashboard') }}" type="button" value="TRY AGAIN" class="me-2 px-4 btn btn-danger float-end">TRY AGAIN</a>
                    
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