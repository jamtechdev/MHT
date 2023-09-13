@extends('front.layouts.app')
@section('content')
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Belts</title>
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
                            <li><img src="{{ asset('beltificationimages/Layer_3.png') }}" alt=""></li>
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
                        <p class="b_portal">My Beltification Portals</p>
                    </div>
                    <img class="float-end img-fluid" src="{{ asset('beltificationimages/banner-images.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>


    <section class="mt-5">
        <div class="background-section">
            <div class="color-section">
            </div>
            <div class="container-fluid box-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body alignment" style="padding: 18px;">
                                        <a style="text-decoration:none;" href="{{ route('beltGradeDashboard') }}">
                                         <p class="card-text" style="text-decoration:none !important; color:#000">PENDING TESTS: <span>2</span></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body alignment">
                                        <p class="card-text">BELT OFFERED: <span style="margin-left: 40px;color: #e7000e;">10</span></p>
                                        <p class="card-text">BELT ISSUED: <span style="margin-left: 40px;color: #e7000e;">18</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body alignment">
                                        <p class="card-text">CLASSES: <span style="margin-left: 40px;color: #e7000e;">53</span></p>
                                        <p class="card-text">VIDEOS: <span style="margin-left: 40px;color: #e7000e;">1152</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card" >
                                    <a href="{{ route('createNewBelt') }}" class="card-body alignment btn text-center" style="text-decoration: none;padding: 18px;">
                                        CREATE NEW BELT
                                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="client-Section py-5">
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>BRONZE (BEGINNER) BELT</h5>
                </div>
            </div>
            <div class="row rowSpace" >
                <div id="myCarousel1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" style="padding:10px;">
                        <div class="carousel-item active">
                            <div class="row rowtext-whiteSpace">
                                <div class="col-md-3">
                                    <div class="container card-body1">
                                        <h5 class="card-titl">White Belt</h5>
                                        <hr>
                                        <p class="card-para">Show your progress and earn your White Belt!</p>
                                        <h5 class="card-titl">price</h5>
                                        <p class="card-price" style="color:#ff002c">$ 25</p>
                                        <a href="{{ route('viewBeltDetails') }}" class="btn btn-info costom-button">VIEW DETAILS</a>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="container card-body1">
                                        <h5 class="card-titl">Orange Belt</h5>
                                        <hr>
                                        <p class="card-para">Show your progress and earn your Orange Belt!</p>
                                        <h5 class="card-titl">price</h5>
                                        <p class="card-price" style="color:#ff002c">$ 25</p>
                                        <a href="{{ route('viewBeltDetails') }}" class="btn btn-info costom-button">VIEW DETAILS</a>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="container card-body1">
                                        <h5 class="card-titl">Blue Belt</h5>
                                        <hr>
                                        <p class="card-para">Show your progress and earn your Blue Belt!</p>
                                        <h5 class="card-titl">price</h5>
                                        <p class="card-price" style="color:#ff002c">$ 25</p>
                                        <a href="{{ route('viewBeltDetails') }}" class="btn btn-info costom-button">VIEW DETAILS</a>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="container card-body1">
                                        <h5 class="card-titl">Yellow Belt</h5>
                                        <hr>
                                        <p class="card-para">Show your progress and earn your Yellow Belt!</p>
                                        <h5 class="card-titl">price</h5>
                                        <p class="card-price" style="color:#ff002c">$ 25</p>
                                        <a href="{{ route('viewBeltDetails') }}" class="btn btn-info costom-button">VIEW DETAILS</a>
                                    </div>
                                </div>

                                
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row rowSpace">
                                <div class="col-md-3">
                                    <div class="container card-body1">
                                        <h5 class="card-titl">Green Belt</h5>
                                        <hr>
                                        <p class="card-para">Show your progress and earn your Green Belt!</p>
                                        <h5 class="card-titl">price</h5>
                                        <p class="card-price" style="color:#ff002c">$ 25</p>
                                        <a href="{{ route('viewBeltDetails') }}" class="btn btn-info costom-button">VIEW DETAILS</a>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="container card-body1">
                                        <h5 class="card-titl">Brown Belt</h5>
                                        <hr>
                                        <p class="card-para">Show your progress and earn your Brown Belt!</p>
                                        <h5 class="card-titl">price</h5>
                                        <p class="card-price" style="color:#ff002c">$ 25</p>
                                        <a href="{{ route('viewBeltDetails') }}" class="btn btn-info costom-button">VIEW DETAILS</a>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="container card-body1">
                                        <h5 class="card-titl">Black Belt 1</h5>
                                        <hr>
                                        <p class="card-para">Show your progress and earn your Black Belt 1!</p>
                                        <h5 class="card-titl">price</h5>
                                        <p class="card-price" style="color:#ff002c">$ 25</p>
                                        <a href="{{ route('viewBeltDetails') }}" class="btn btn-info costom-button">VIEW DETAILS</a>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="container card-body1">
                                        <h5 class="card-titl">Black Belt 2</h5>
                                        <hr>
                                        <p class="card-para">Show your progress and earn your Black Belt 2!</p>
                                        <h5 class="card-titl">price</h5>
                                        <p class="card-price">$ 25</p>
                                        <a href="{{ route('viewBeltDetails') }}" class="btn btn-info costom-button">VIEW DETAILS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <a class="carousel-control-prev" type="button" href="#myCarousel1" data-bs-target="#myCarousel1"
                            data-bs-slide="prev">
                            <img src="{{ asset('beltificationimages/2-layers (1).png')}}" class="background p-1 carousel-control arrow1"
                                aria-hidden="true">
                        </a>
                        <a class="carousel-control-next " type="button" href="#myCarousel1"
                            data-bs-target="#myCarousel1" data-bs-slide="next">
                            <img src="{{ asset('beltificationimages/2-layers.png')}}" class="background p-1 carousel-control arrow"
                                aria-hidden="true">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


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

    </footer> -->
    <script src="{{ asset('beltificationjs/bootstrap.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.dataTables.min.js')}}"></script>
@endsection


    <!-- <script src="{{ asset('beltificationjs/bootstrap.bundle.js')}}"></script>
    <script src="{{ asset('beltificationjs/bootstrap.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/popper.min.js')}}"></script> -->
