@extends('front.layouts.app')

@section('content')

<!-- maz dashboard profile box -->
@include('front.include.instructor_complete_profile')
<!-- main wrapper start -->
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <h4 class="dashboard_titles">Dashboard</h4>
                <div class="row">
                    <div class="col-xxl-4 col-md-6">
                        <div class="maz__dashboard__card-box card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="content">
                                        <p class="fs-5">Total Students</p>
                                        <h1>51</h1>
                                    </div>
                                    <div class="icon icon-primary">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="maz__dashboard__card-box card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="content">
                                        <p class="fs-5">Total Courses</p>
                                        <h1>22</h1>
                                    </div>
                                    <div class="icon icon-success">
                                        <i class="fas fa-rocket"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="maz__dashboard__card-box card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="content">
                                        <p class="fs-5">Total Earnings</p>
                                        <h1>$5000</h1>
                                    </div>
                                    <div class="icon icon-info">
                                        <i class="fas fa-money-bill-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="maz__dashboard__card-box card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="content">
                                        <p class="fs-5">Belt Tests Awaiting Approval</p>
                                        <h1>07</h1>
                                    </div>
                                    <div class="icon icon-default">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="maz__dashboard__card-box card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="content">
                                        <p class="fs-5">Total Test Belt Submitted</p>
                                        <h1>22</h1>
                                    </div>
                                    <div class="icon icon-secondary">
                                        <i class="fas fa-paper-plane"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="maz__dashboard__card-box card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="content">
                                        <p class="fs-5">Students Satisfaction</p>
                                        <h1><i class="far fa-star text-warning"></i> 4.5</h1>
                                    </div>
                                    <div class="icon icon-warning">
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="dashboard_titles">Most Popular Courses</h4>
                <div class="row">
                    <div class="col-12">
                        <table class="table maz__dashboard__table table-bordered">
                            <thead>
                              <tr> 
                                <th scope="col">Course Name</th>
                                <th scope="col">Enrolled</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td data-column="Course Name">Childrens Dance: Ballet 101</td>
                                <td data-column="Enrolled">1</td>
                                <td data-column="Status"><button class="btn btn-success">Published</button></td>
                              </tr>
                              <tr>
                                <td data-column="Course Name">Childrens Dance: Ballet 101</td>
                                <td data-column="Enrolled">1</td>
                                <td data-column="Status"><button class="btn btn-success">Published</button></td>
                              </tr>
                              <tr>
                                <td data-column="Course Name">Childrens Dance: Ballet 101</td>
                                <td data-column="Enrolled">1</td>
                                <td data-column="Status"><button class="btn btn-success">Published</button></td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection