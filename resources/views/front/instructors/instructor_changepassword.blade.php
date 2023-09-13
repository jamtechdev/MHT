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
                <h4 class="dashboard_titles">Change Password</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body d-flex justify-content-between flex-column">
                        <form method="POST" action="{{ route('instructor_changepassword_post', $result['id']) }}" id="instructorChangePasswordForm">
                            @csrf
                            @include('front.include.changepassword_form')
                            <div class="row mb-0">
                                <div class="col-md-12 text-center text-md-centre">
                                    <button type="submit" class="btn btn-secondary dashboard_btn_lg text-uppercase me-md-3">Update Password</button>
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
        $("#instructorChangePasswordForm").validate({
            rules: {
                currentpassword: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",
                }
            },
            messages: {
                currentpassword: {
                    required: "Current password is required",
                    minlength: "Current password must be at least 8 characters",
                    maxlength: "Current password cannot be more than 20 characters"
                },
                password: {
                    required: "New password is required",
                    minlength: "New password must be at least 8 characters",
                    maxlength: "New password cannot be more than 20 characters"
                },
                password_confirmation: {
                    required:  "Confirm new password is required",
                    equalTo: "New password and confirm new password should be same"
                }
            }
        });
    });
</script>
@endpush