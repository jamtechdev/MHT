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
                <h4 class="dashboard_titles">Change Password</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body card-body d-flex flex-column justify-content-between">
                        <form method="POST" action="{{ route('student_changepassword_post', $result['id']) }}" id="studentChangePasswordForm">
                            @csrf
                            @include('front.include.changepassword_form')
                            <div class="row mt-5 mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success dashboard_btn_lg text-uppercase me-3">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        // Define Form Jquary Validator
        $("#studentChangePasswordForm").validate({
            rules: {
                currentpassword: {
                    required: true
                    , minlength: 8
                    , maxlength: 20
                , }
                , password: {
                    required: true
                    , minlength: 8
                    , maxlength: 20
                , }
                , password_confirmation: {
                    required: true
                    , equalTo: "#password"
                , }
            }
            , messages: {
                currentpassword: {
                    required: "Current password is required"
                    , minlength: "Current password must be at least 8 characters"
                    , maxlength: "Current password cannot be more than 20 characters"
                }
                , password: {
                    required: "New password is required"
                    , minlength: "New password must be at least 8 characters"
                    , maxlength: "New password cannot be more than 20 characters"
                }
                , password_confirmation: {
                    required: "Confirm new password is required"
                    , equalTo: "New password and confirm new password should be same"
                }
            }
        });
    });

</script>
@endpush
