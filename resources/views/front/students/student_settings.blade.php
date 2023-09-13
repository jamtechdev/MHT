@extends('front.layouts.app')

@section('content')
@include('front.include.student_alert_box')
<!-- maz main wrapper -->
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.student_header')
            </div>
            <div class="wrapper-content">
                <h4 class="dashboard_titles">Settings</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body d-flex flex-column justify-content-between p-4 maz__profile-content">
                        <div class="row">
                            <div class="col-sm-6 col-lg-5 col-xxl-3">
                                <div class="maz__language-wrapper">
                                   <h5 class="mb-4">Language Select</h5>
                                    <div class="form-check maz__checkbox_group">
                                    <input class="form-check-input maz__checkbox_info" type="checkbox" value="" id="flexCheckDefault" checked>
                                    <label class="form-check-label" for="flexCheckDefault">
                                    English
                                    </label>
                                    </div>
                                    <div class="form-check maz__checkbox_group">
                                    <input class="form-check-input maz__checkbox_info" type="checkbox" value="" id="flexCheckDefault1">
                                    <label class="form-check-label" for="flexCheckDefault1">
                                    Spanish
                                    </label>
                                    </div>
                                    <div class="form-check maz__checkbox_group">
                                    <input class="form-check-input maz__checkbox_info" type="checkbox" value="" id="flexCheckDefault2">
                                    <label class="form-check-label" for="flexCheckDefault2">
                                    Chinese
                                    </label>
                                    </div>
                                    <div class="form-check maz__checkbox_group">
                                    <input class="form-check-input maz__checkbox_info" type="checkbox" value="" id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">
                                    Japanese
                                    </label>
                                    </div>   
                                    <div class="form-check maz__checkbox_group">
                                    <input class="form-check-input maz__checkbox_info" type="checkbox" value="" id="flexCheckDefault4">
                                    <label class="form-check-label" for="flexCheckDefault4">
                                    Italian
                                    </label>
                                    </div>
                                    <div class="form-check maz__checkbox_group">
                                    <input class="form-check-input maz__checkbox_info" type="checkbox" value="" id="flexCheckDefault5">
                                    <label class="form-check-label" for="flexCheckDefault5">
                                    Portugese
                                    </label>
                                    </div>   
                                    <div class="form-check maz__checkbox_group">
                                    <input class="form-check-input maz__checkbox_info" type="checkbox" value="" id="flexCheckDefault6">
                                    <label class="form-check-label" for="flexCheckDefault6">
                                    French
                                    </label>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-5 col-xxl-3">
                              <div class="maz__notification-wrapper">
                                 <h5 class="mb-4">Notification</h5>
                                    <div class="form-check maz__checkbox_group">
                                    <input class="form-check-input maz__checkbox_info" type="radio" name="flexRadioDefault" id="flexRadioOn" checked>
                                    <label class="form-check-label" for="flexRadioOn">
                                      ON
                                    </label>
                                    </div>
                                    <div class="form-check maz__checkbox_group">
                                    <input class="form-check-input maz__checkbox_info" type="radio" name="flexRadioDefault" id="flexRadioOff">
                                    <label class="form-check-label" for="flexRadioOff">
                                      OFF
                                    </label>
                                    </div>
                              </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection