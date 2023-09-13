@extends('front.layouts.app')
@section('content')
<!-- <!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belt Search</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('beltificationcss/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('beltificationcss/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('beltificationcss/style.css') }}">
    <style>
        a.carousel-control-prev {
            z-index: -1;
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
    <style>
        
    </style>

    <section class="top-section">
        <div class="container">
            <div class="row">
                <div class="col-md-11 blue-baner-section">
                    <div class="school-name border">
                        <p class="school_name">Belt Search</p>
                        <!-- <p class="b_portal">Belt Search</p> -->
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
                                <select class="select-disp" id="discipline">
                                    <option selected value="0" class="fw-light">Discipline Name</option>
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
                            <div class="col-md-6" style="float: right; margin-top:16px;">
                                <label class="fw-bold" for="">SCHOOL</label>
                                <select class="select-disp" id="our_schools">
                                    <option selected class="fw-light">Our Schools</option>
                                    <option value="1" >Kimber Martial Arts</option>
                                    <option value="2">Frank Blenman</option>
                                    <option value="3">Brigitte Morris</option>
                                    <option value="4">Jason Morris</option>
                                    <option value="5">Alice Roveda</option>
                                    <option value="6">Sam Palumbo</option>
                                    <option value="7">Lindsay Johnson</option>
                                    <option value="8">Anastasya Zinchenko</option>
                                    <option value="9">Rebecca Parisi</option>
                                    <option value="10">Kyle Colletti</option>
                                    <option value="11">Nicole Butterfield</option>
                                    <option value="12">Lisa Watson</option>
                                    <option value="13">Marcie Lemieux</option>
                                    <option value="14">Courtney Nicole Gains</option>
                                    <option value="15">Will Coix</option>
                                    <option value="16">Victoria Paul</option>
                                    <option value="17">Crystal Boyd</option>
                                    <option value="18">Kelly Bokios</option>
                                    <option value="19">Herman Polonski</option>
                                    <option value="20">Raya Radeva</option>
                                    <option value="21">Alina Anzorova</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="client-section my-4" id="all_disciplines">
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>Kimber Martial Arts</h5>
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
    
    <section class="client-section my-4" id="all_disciplines1">
        <div class="container px-3"> 
            <div class="row mb-2">
                <div class="col">
                    <h5>MightyFist</h5>
                </div>
            </div>
            <div class="row rowSpace earns-belt-wrap">
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
                                            <p>ORANGE</p>
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
                                            <p>GREEN</p>
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
    <section class="client-section my-4" id="karate_discipline" hidden>
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>Kimber Martial Arts</h5>
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
                                            <p>ORANGE</p>
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
                                            <p>GREEN</p>
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

            <div class="row mb-2">
                <div class="col">
                    <h5>Frank Blenman</h5>
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
                                            <p>ORANGE</p>
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
                                            <p>GREEN</p>
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
    <section class="client-section my-4" id="kung_fu_discipline" hidden>
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>Sam Palumbo</h5>
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
                                            <p>ORANGE</p>
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
                                            <p>GREEN</p>
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
    <section class="client-section my-4" id="tai_chi_discipline" hidden>
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>Alice Roveda</h5>
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
                                            <p>ORANGE</p>
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
                                            <p>GREEN</p>
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
    <section class="client-section my-4" id="yoga_discipline" hidden>
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>Lindsay</h5>
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
                                            <p>ORANGE</p>
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
                                            <p>GREEN</p>
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

            <div class="row mb-2">
                <div class="col">
                    <h5>Anastasiya</h5>
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
                                            <p>ORANGE</p>
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
                                            <p>GREEN</p>
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

    <!-- // our schools -->

    <section class="client-section my-4" id="kimber_school" hidden>
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>Kimber Martial Arts</h5>
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
                                            <p>ORANGE</p>
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
                                            <p>GREEN</p>
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

    <section class="client-section my-4" id="frank_school" hidden>
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>Frank Blenman</h5>
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
                                            <p>ORANGE</p>
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
                                            <p>GREEN</p>
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

    <section class="client-section my-4" id="brigitte_school" hidden>
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>Brigitte Morris</h5>
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
                                            <p>Level:<span style="color: #E7000E;">Biginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>YELLOW</p>
                                            <p>Level:<span style="color: #E7000E;">Biginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BROWN</p>
                                            <p>Level:<span style="color: #E7000E;">Biginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>ORANGE</p>
                                            <p>Level:<span style="color: #E7000E;">Biginner</span></p>
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
                                            <p>Level:<span style="color: #E7000E;">Biginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLUE</p>
                                            <p>Level:<span style="color: #E7000E;">Biginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLACK 1</p>
                                            <p>Level:<span style="color: #E7000E;">Biginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <div class="inner-wrap">
                                            <p>BLACK 2</p>
                                            <p>Level:<span style="color: #E7000E;">Biginner</span></p>
                                            <a href="{{ route('studentBeltification') }}" class="btn btn-info costom-button">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <a class="carousel-control-prev" type="button" href="#myCarousel1" data-bs-target="#myCarousel1"
                            data-bs-slide="prev">
                            <img src="{{ asset('beltificationimages/2-layers (1).png')}}" class="background p-1 carousel-control "
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

    <section class="client-section my-4" id="json_school" hidden>
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>Json Morris</h5>
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
                                            <p>ORANGE</p>
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

    <section class="client-section my-4" id="alice_school" hidden>
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <h5>Alice Roveda</h5>
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
                                            <p>ORANGE</p>
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
                                            <p>GREEN</p>
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
    

   
    <script src="{{ asset('beltificationjs/jquery.min.js')}}"></script>
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



    <script src="https://kit.fontawesome.com/1009e4fb26.js" crossorigin="anonymous"></script>
    <script src="{{ asset('beltificationjs/bootstrap.bundle.js')}}"></script>
    <script src="{{ asset('beltificationjs/bootstrap.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/popper.min.js')}}"></script>
</body>

</html> -->
@push('scripts')
<script>
    $(document).ready(function () {
        $(function() {
                $("#discipline").change(function() {
                    //alert( $('option:selected', this).val() );
                    
                    if($('option:selected', this).val() == 'Discipline Name')
                    {
                        $("#all_disciplines").show();
                        $("#all_disciplines1").show();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').attr('hidden',true);
                        $('#frank_school').attr('hidden',true);
                        $('#brigitte_school').attr('hidden',true);
                        $('#json_school').attr('hidden',true);
                        $('#alice_school').attr('hidden',true);
                    }

                    if($('option:selected', this).val() == 1)
                    {
                        $("#all_disciplines").hide();
                        $("#all_disciplines1").hide();
                        $('#karate_discipline').removeAttr('hidden');
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                    }

                    if($('option:selected', this).val() == 2)
                    {
                        $("#all_disciplines").show();
                        $("#all_disciplines1").show();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').attr('hidden',true);
                        $('#frank_school').attr('hidden',true);
                        $('#brigitte_school').attr('hidden',true);
                        $('#json_school').attr('hidden',true);
                        $('#alice_school').attr('hidden',true);
                    }

                    if($('option:selected', this).val() == 3)
                    {
                        $("#all_disciplines").hide();
                        $("#all_disciplines1").hide();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').removeAttr('hidden');
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').attr('hidden',true);
                        $('#frank_school').attr('hidden',true);
                        $('#brigitte_school').attr('hidden',true);
                        $('#json_school').attr('hidden',true);
                        $('#alice_school').attr('hidden',true);
                    }
                    if($('option:selected', this).val() == 4)
                    {
                        $("#all_disciplines").hide();
                        $("#all_disciplines1").hide();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').removeAttr('hidden');
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').attr('hidden',true);
                        $('#frank_school').attr('hidden',true);
                        $('#brigitte_school').attr('hidden',true);
                        $('#json_school').attr('hidden',true);
                        $('#alice_school').attr('hidden',true);
                    }
                    if($('option:selected', this).val() == 5)
                    {
                        $("#all_disciplines").hide();
                        $("#all_disciplines1").hide();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').removeAttr('hidden');
                        $('#kimber_school').attr('hidden',true);
                        $('#frank_school').attr('hidden',true);
                        $('#brigitte_school').attr('hidden',true);
                        $('#json_school').attr('hidden',true);
                        $('#alice_school').attr('hidden',true);
                    }

                    if($('option:selected', this).val() == 6 || $('option:selected', this).val() == 7 || $('option:selected', this).val() == 8
                    || $('option:selected', this).val() == 9 || $('option:selected', this).val() == 10 || $('option:selected', this).val() == 11
                    || $('option:selected', this).val() == 12 || $('option:selected', this).val() == 13 || $('option:selected', this).val() == 14
                    || $('option:selected', this).val() == 15 || $('option:selected', this).val() == 16 || $('option:selected', this).val() == 17
                    || $('option:selected', this).val() == 18)
                    {
                        $("#all_disciplines").hide();
                        $("#all_disciplines1").hide();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').attr('hidden',true);
                        $('#frank_school').attr('hidden',true);
                        $('#brigitte_school').attr('hidden',true);
                        $('#json_school').attr('hidden',true);
                        $('#alice_school').attr('hidden',true);
                    }

                    
                });

                $("#our_schools").change(function() {
                   // alert( $('option:selected', this).val() );
                    $('#discipline option[value="0"]').attr("selected",true);
                    if($('option:selected', this).val() == 'Our Schools')
                    {
                        $("#all_disciplines").show();
                        $("#all_disciplines1").show();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').attr('hidden',true);
                        
                    }

                    if($('option:selected', this).val() == 1)
                    {
                        $("#all_disciplines").hide();
                        $("#all_disciplines1").hide();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').removeAttr('hidden');
                    }

                    if($('option:selected', this).val() == 2)
                    {
                        $("#all_disciplines").hide();
                        $("#all_disciplines1").hide();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').attr('hidden',true);
                        $('#frank_school').removeAttr('hidden');
                        
                    }

                    if($('option:selected', this).val() == 3)
                    {
                        $("#all_disciplines").hide();
                        $("#all_disciplines1").hide();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').attr('hidden',true);
                        $('#frank_school').attr('hidden',true);
                        $('#brigitte_school').removeAttr('hidden');
                    }
                    if($('option:selected', this).val() == 4)
                    {
                        $("#all_disciplines").hide();
                        $("#all_disciplines1").hide();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').attr('hidden',true);
                        $('#frank_school').attr('hidden',true);
                        $('#brigitte_school').attr('hidden',true);
                        $('#json_school').removeAttr('hidden');
                    }
                    if($('option:selected', this).val() == 5)
                    {
                        $("#all_disciplines").hide();
                        $("#all_disciplines1").hide();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').attr('hidden',true);
                        $('#frank_school').attr('hidden',true);
                        $('#brigitte_school').attr('hidden',true);
                        $('#json_school').attr('hidden',true);
                        $('#alice_school').removeAttr('hidden');
                    }

                    if($('option:selected', this).val() == 6 || $('option:selected', this).val() == 7 || $('option:selected', this).val() == 8
                    || $('option:selected', this).val() == 9 || $('option:selected', this).val() == 10 || $('option:selected', this).val() == 11 
                    || $('option:selected', this).val() == 12 || $('option:selected', this).val() == 13 || $('option:selected', this).val() == 14
                    || $('option:selected', this).val() == 15 || $('option:selected', this).val() == 16 || $('option:selected', this).val() == 17
                    || $('option:selected', this).val() == 18 || $('option:selected', this).val() == 19 || $('option:selected', this).val() == 21 
                    )
                    {
                        $("#all_disciplines").hide();
                        $("#all_disciplines1").hide();
                        $('#karate_discipline').attr('hidden',true);
                        $('#kung_fu_discipline').attr('hidden',true);
                        $('#tai_chi_discipline').attr('hidden',true);
                        $('#yoga_discipline').attr('hidden',true);
                        $('#kimber_school').attr('hidden',true);
                        $('#frank_school').attr('hidden',true);
                        $('#brigitte_school').attr('hidden',true);
                        $('#json_school').attr('hidden',true);
                        $('#alice_school').attr('hidden',true);
                    }

                    
                });
            });

            
    });
</script>
@endpush