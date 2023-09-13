
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

    <section style="margin-top:8%;">
        <div class="container mt-4 mb-4">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mb-4" >
                    <div class="card" style="background-color:#ff1648;">
                        <a href="{{ route('studentSubmitedTest') }}" style="color:#fff;" type="button" class="btn btn-sm">For Student</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="background-color:#212529;">
                        <a href="{{ route('instructorBeltification') }}" style="color:#fff;" type="button" class="btn btn-sm">For Instructor</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="top-section">
        <div class="container">
            <div class="row">
                <div class="col-md-11 blue-baner-section">
                    <div class="school-name border">
                        <p class="school_name">MightyFist</p>
                        <p class="b_portal">Belt Test Dashboard</p>
                    </div>
                    <img class="float-end img-fluid" src="{{ asset('beltificationimages/banner-images.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="background-section">
                <div class="container-fluid box-content" >
                    <div class="row">
                        <div class="col-md-12">    
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body alignment">
                                            <p class="card-text">TEST NEEDING GRADING: <span>12</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body alignment">
                                            <p class="card-text">TRY AGAIN TESTS RESUBMITTED: <span>8</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body alignment">
                                            <p class="card-text">ENGAGED STUDENTS: <span>150</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="text-decoration: none;">
                                    <a class="back-button" href="{{ route('instructorBeltification') }}" style="text-decoration: none; float:right; color: #ff002c;"><i class="fa-solid fa-chevron-left"></i>BACK TO MY SCHOOL BELT</a>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <section class="table-section my-5">
        <div class="container-fluid">
            <div class="row">
                <h4 class="heading">Bronze (Beginner)</h4>
            </div>
            <table class="table table-striped">
                <thead class="table-dark">
                  <tr>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Belt</td>
                    <td>Date Submitted</td>
                    <td>Status</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Vanessa</td>
                    <td>Lason</td>
                    <td>White Yellow 1</td>
                    <td>5/1/2021</td>
                    <td><a href="{{ route('gradeBeltTest') }}" class="btn btn-warning" type="button" value="NEEDS GRADING">NEEDS GRADING</a></td>
                  </tr>
                  <tr>
                    <td>Jose</td>
                    <td>Lason</td>
                    <td>White Yellow 2</td>
                    <td>5/2/2021</td>
                    <td><a href="{{ route('gradeBeltTest') }}" class="btn btn-warning" type="button" value="NEEDS GRADING">NEEDS GRADING</a></td>
                  </tr>
                  <tr>
                    <td>Bob</td>
                    <td>Lason</td>
                    <td>White Yellow 3</td>
                    <td>5/3/2021</td>
                    <td><input class="btn btn-danger" type="button" value="TRY AGAIN"></td>
                  </tr>
                  <tr>
                    <td>Kimber</td>
                    <td>Lason</td>
                    <td>White Yellow 4</td>
                    <td>5/4/2021</td>
                    <td><input class="btn btn-success" type="button" value="PASS"></td>
                  </tr>
                  <tr>
                    <td>Vanessa</td>
                    <td>Lason</td>
                    <td>White Yellow 5</td>
                    <td>5/5/2021</td>
                    <td><input class="btn btn-success" type="button" value="PASS"></td>
                  </tr>
                </tbody>
              </table>
        </div>
        
    </section> -->

    <!-- <footer class="maz__footer">
      <section class="maz__footer-bg maz__sections"  style="padding: 12px 0px 50px 0px !important;">
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



  @endsection
  <!-- <script src="{{ asset('beltificationjs/bootstrap.bundle.js')}}"></script>
    <script src="{{ asset('beltificationjs/bootstrap.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/jquery.min.js')}}"></script>
    <script src="{{ asset('beltificationjs/popper.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/1009e4fb26.js" crossorigin="anonymous"></script> -->
@push('scripts')
    <script>
        $('.responsive').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
    </script>
@endpush
<!-- </body>
</html> -->