@extends('front.layouts.app')
@section('content')

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create belt</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet">
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
                        <p class="school_name">MightyFist</p>
                        <p class="b_portal">Create your new Belt</p>
                    </div>
                    <img class="float-end img-fluid" src="{{ asset('beltificationimages/banner-images.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="create-new-belt py-4 my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mt-4">
                    <label for="Belt Name">Belt Name:</label>
                    <input type="text" class="form-control input" name="" id="" placeholder="Enter Belt Name">
                </div>
                <div class="col-md-3 mt-4">
                    <label for="enter price">Enter Price:</label>
                    <input type="text" class="form-control input" name="" id="" placeholder="$00.00">
                </div>
                <div class="col-md-3 mt-4">
                    <label for="Belt Name">Select Discipline:</label>
                    <select class="form-select select" aria-label=".form-select-lg example">
                        <option selected>Select</option>
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
                <div class="col-md-3 mt-4">
                    <label for="Belt Name">Select Level:</label>
                    <select class="form-select select" aria-label=".form-select-lg example">
                        <option selected>Select</option>
                        <option value="1">Bronze (Beginner)</option>
                        <option value="2">Silver (Intermediate)</option>
                        <option value="3">Gold (Expert)</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-4">
                    <label for="discription">Description :</label>
                    <textarea class="form-control textarea" name="" id="" rows="2  " placeholder="Enter Description..."></textarea>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-md-6 mt-4">
                    <label for="instructions">Instructions :</label>
                    <textarea class="form-control textarea" name="" id="" rows="9" placeholder="Enter Instructions..."></textarea>
                    <div class="row">
                        <div class="col-md-11 mt-5">
                            <label class="custom-file-upload form-control">
                                <input class="input-none" type="file"/>
                                BROWN BELT INTRO VIDEO
                            </label>
                        </div>
                        <div class="col-md-1 mt-5">
                            <button class="btn btn-success upload-search-btn2"><img style="width: 23px;" class="" src="{{ asset('beltificationimages/Layer_67.png')}}" alt=""></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                
                    <h5 class="heading" style="display: inline-block;">Available TEACHING Videos</h5>
                    <button class="btn btn-success upload-search-btn search1"><img class="img-fluid" src="{{ asset('beltificationimages/Layer_68_copy.png')}}" alt=""></button>
                    
                    <div class="row">
                        <div class="col-md-12 select-section py-2">
                            <div class="row mb-3">
                                <div class="col-md-1">
                                    <input class=" w-100 h-100" type="checkbox" name="" id="">
                                </div>
                                <div class="col-md-11">
                                    <label for="">Select All</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <input class=" w-100 h-100" type="checkbox" name="" id="">
                                </div>
                                <div class="col-md-11">
                                    <label class="chkbox-main-label" for="">Stance 1, Beginner Moves</label>
                                    <label class="opacity-50 d-block" for="">Correct Form</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <input class=" w-100 h-100" type="checkbox" name="" id="">
                                </div>
                                <div class="col-md-11">
                                    <label class="chkbox-main-label" for="">Stance 1, Beginner Moves</label>
                                    <label class="opacity-50 d-block" for="">Correct Form</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <input class=" w-100 h-100" type="checkbox" name="" id="">
                                </div>
                                <div class="col-md-11">
                                    <label class="chkbox-main-label" for="">Stance 1, Beginner Moves</label>
                                    <label class="opacity-50 d-block" for="">Correct Form</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <input class=" w-100 h-100" type="checkbox" name="" id="">
                                </div>
                                <div class="col-md-11">
                                    <label class="chkbox-main-label" for="">Stance 1, Beginner Moves</label>
                                    <label class="opacity-50 d-block" for="">Correct Form</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <input class="btn btn-success float-end mt-3" type="button" value="ADD VIDEO">
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
                    <h5>TEACHING VIDEOS</h5>
                </div>
            </div>
            <div class="row rowSpace" style="padding: 0 22px;">
                <div id="myCarousel1" class="carousel slide" data-bs-ride="carousel"> 
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row rowtext-whiteSpace">
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <p>Intro Video</p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <p>Lesson 1</p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <p>Lesson 2</p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <p>Lesson 3</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="carousel-item">
                            <div class="row rowtext-whiteSpace">
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <p>Lesson 4</p>
                                    </div>
                                </div>
                
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <p>Lesson 5</p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <p>Lesson 6</p>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="card">
                                        <img class="img-fluid" src="{{ asset('beltificationimages/Layer_74.png')}}" alt="">
                                        <p>Lesson 7</p>
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
    <section class="btn-section mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <a href="{{ route('instructorBeltification')}}" class="w-100 btn btn-danger cancel-btn" type="button" value="CANCEL">CANCEL</a>
                </div>
                <div class="col-md-2">
                    <input class="w-100 btn btn-warning preview-btn" type="button" value="PREVIEW BELT">
                </div>
                <div class="col-md-2">
                    <input class="w-100 btn btn-info publish-btn" type="button" value="PUBLISH BELT">
                </div>
                <div class="col-md-2">
                    <a href="{{ route('viewBeltDetails')}}" class="w-100 btn btn-success save-btn" type="button" value="SAVE BELT">SAVE BELT</a>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

    <script src="{{ asset('beltificationjs/bootstrap.bundle.js')}}"></script>
    <script src="{{ asset('beltificationjs/bootstrap.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/popper.min.js')}}"></script>
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