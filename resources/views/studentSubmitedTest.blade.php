@extends('front.layouts.app')
@section('content')
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Submitted belt</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap"
        rel="stylesheet">
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
                        <p class="school_name">My Belt</p>
                
                    </div>
                    <img class="float-end img-fluid" src="{{ asset('beltificationimages/banner-images.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>



    <section class="mt-5 mb-5">
        <div class="background-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 select-discipline">
                                <label class="fw-bold" for="">DISCIPLINE</label>
                                <select class="select-disp">
                                    <option selected class="fw-light">Discipline Name</option>
                                    <option value="1">Karate</option>
                                    <option value="2">Taekwondo</option>
                                    <option value="3">Kung-fu</option>
                                    <option value="4">Tai chi</option>
                                    <option value="5">Yoga</option>
                                    <option value="6">Aerial Yoga</option>
                                    <option value="7">Jeet Kune Do</option>
                                    <option value="8">Fitness</option>
                                    <option value="9">Boxing</option>
                                    <option value="10">Rugby</option>
                                    <option value="11">Martial Arts For Kids</option>
                                    <option value="12">Mixed Martial Arts</option>
                                    <option value="13">Meditation</option>
                                    <option value="14">Fitness For Children</option>
                                    <option value="15">Jiu Jitsu</option>
                                    <option value="16">Dance</option>
                                    <option value="17">Dance For Children</option>
                                    <option value="18">Body Building</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="float: right;">
                                <div class="search-box">
                                    <a href="{{ route('beltSearch') }}" class="search-btn"><i class="fa fa-search"></i></a>
                                    <input class="search-input" type="text" placeholder="FIND OTHER BELTS">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="client-section my-4">
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>Belts I'm Interested In</h5>
                </div>
            </div>
            <div class="row rowSpace earns-belt-wrap">
                <div id="myCarousel14" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row rowtext-whiteSpace">
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>WHITE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>ORANGE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>YELLOW</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BROWN</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row rowtext-whiteSpace">
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>PURPLE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLUE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLACK 1</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLACK 2</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <a class="carousel-control-prev" type="button" href="#myCarousel14" data-bs-target="#myCarousel14"
                            data-bs-slide="prev">
                            <img src="{{ asset('beltificationimages/2-layers (1).png')}}" class="background p-1 carousel-control arrow1"
                                aria-hidden="true">
                        </a>
                        <a class="carousel-control-next " type="button" href="#myCarousel14"
                            data-bs-target="#myCarousel14" data-bs-slide="next">
                            <img src="{{ asset('beltificationimages/2-layers.png')}}" class="background p-1 carousel-control arrow"
                                aria-hidden="true">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="client-section my-4">
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>EARNED BELTS</h5>
                </div>
            </div>
            <div class="row rowSpace earns-belt-wrap">
                <div id="myCarousel1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row rowtext-whiteSpace">
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>WHITE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-success costom-button">MY RESULT</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BROWN</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-success costom-button">MY RESULT</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>ORANGE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-success costom-button">MY RESULT</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>YELLOW</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-success costom-button">MY RESULT</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row rowtext-whiteSpace">
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>PURPLE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-success costom-button">MY RESULT</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLUE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-success costom-button">MY RESULT</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLACK 1</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-success costom-button">MY RESULT</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLACK 2</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-success costom-button">MY RESULT</a>
                                        </div>
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
                        <a class="carousel-control-next" type="button" href="#myCarousel1"
                            data-bs-target="#myCarousel1" data-bs-slide="next">
                            <img src="{{ asset('beltificationimages/2-layers.png')}}" class="background p-1 carousel-control arrow"
                                aria-hidden="true">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="client-section my-4">
        <div class="container px-3"> 
            <div class="row mb-2">
                <div class="col">
                    <h5>TRY AGAIN</h5>
                </div>
            </div>
            <div class="row rowSpace earns-belt-wrap1">
                <div id="myCarousel12" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row rowtext-whiteSpace">
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>WHITE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                           
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-warning costom-button">FEEDBACK</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BROWN</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-warning costom-button">FEEDBACK</a>                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>YELLOW</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-warning costom-button">FEEDBACK</a>                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>ORANGE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-warning costom-button">FEEDBACK</a>                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row rowtext-whiteSpace">
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>PURPLE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-warning costom-button">FEEDBACK</a>                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLUE</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-warning costom-button">FEEDBACK</a>                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLACK 1</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-warning costom-button">FEEDBACK</a>                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLACK 2</p>
                                            <p>Level:<span style="color: #E7000E;">Beginner</span></p>
                                            <a href="{{ route('beltTestResult') }}" class="btn btn-warning costom-button">FEEDBACK</a>                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <a class="carousel-control-prev" type="button" href="#myCarousel12" data-bs-target="#myCarousel12"
                            data-bs-slide="prev">
                            <img src="{{ asset('beltificationimages/2-layers (1).png')}}" class="background p-1 carousel-control arrow1"
                                aria-hidden="true">
                        </a>
                        <a class="carousel-control-next" type="button" href="#myCarousel12"
                            data-bs-target="#myCarousel12" data-bs-slide="next">
                            <img src="{{ asset('beltificationimages/2-layers.png')}}" class="background p-1 carousel-control arrow"
                                aria-hidden="true">
                        </a>
                    </div>
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