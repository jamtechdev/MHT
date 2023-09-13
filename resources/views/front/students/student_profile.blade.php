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
                <h4 class="dashboard_titles">My Profile</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body d-flex flex-column justify-content-between p-4 maz__profile-content">
                        <div class="row">
                            <h6 class="mb-4 fs-18">Personal Info</h6>
                            <input type="hidden" id="is_first_time_user" value="{{  $studentProfileData['is_first_time_user'] }}">
                            <input type="hidden" id="is_accept_bronze_plan" value="{{  $studentProfileData['accept_bronze_plan'] }}">
                            <input type="hidden" id="refered_by" value="{{  $studentProfileData['refered_by'] }}">
                            <input type="hidden" id="anyone_accepts_referral" value="{{  $studentProfileData['anyone_accepts_referral'] }}">
                            <input type="hidden" id="subscription_id" value="{{  $studentProfileData['subscription_id'] }}">
                            <input type="hidden" id="payment_status" value="{{  $studentProfileData['payment_status'] }}">
                            <input type="hidden" id="plan_name" value="{{  $planData['plan_name'] }}">
                            
                            
                            <div class="student_profile__table">
                                <div class="student__details"><label class="profile_title">Name :</label>
                                        <p>{{  $studentProfileData['firstname'] }}</p>
                                 </div>     
                                 <div class="student__details"><label class="profile_title">Last Name :</label>
                                        <p>{{  $studentProfileData['lastname'] }}</p>
                                 </div>     
                                 <div class="student__details"><label class="profile_title">Email :</label>
                                        <p>{{  $studentProfileData['email'] }}</p>
                                 </div> 
                                 <div class="student__details"><label class="profile_title">Phone :</label>
                                        <p>{{  $studentProfileData['phone'] }}</p>
                                 </div>
                                 <div class="student__details"><label class="profile_title">Age Group :</label>
                                        <p>{{  $studentProfileData['age_group'] }}</p>
                                 </div> 
                                 <div class="student__details"><label class="profile_title">Gender :</label>
                                        <p>{{  $studentProfileData['gender'] }}</p>
                                 </div>          
                            </div> 
                                   


                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="{{ route('student_profile_edit') }}"
                                    class="btn btn-secondary dashboard_btn_lg text-uppercase">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="bronzModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-image: linear-gradient(to right, rgb(51, 0, 53), rgb(255, 0, 0));">
                <h5 class="modal-title" style="color:#ffffff;">Welcome to MartialArtsZen.com</h5>
                <!-- <i class="fa-solid fa-xmark btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></i> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p style="padding:24px 0px;">You have earned $1 Bronze lifetime promotion, do you want to redeem this exclusive deal? </p>
                <hr>
                <button type="button" class="btn btn-primary" style="width: 16%;" onclick="acceptPlan(1)">Yes</button>
                <button type="button" class="btn btn-primary" style="width: 16%; margin-left: 4%;" onclick="acceptPlan(2)" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="bronzModal1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-image: linear-gradient(to right, rgb(51, 0, 53), rgb(255, 0, 0));">
                <h5 class="modal-title" style="color:#ffffff;">Welcome to MartialArtsZen.com</h5>
                <!-- <i class="fa-solid fa-xmark btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></i> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p><h4 style="font-size: 1.1rem !important;line-height: 1.4 !important;">Thank you for confirming your referral benefit! You are now subscribed to the Bronze plan for $1 lifetime. <p><sup>*</sup>You will not be charged until full site is launched.</p></h4></p>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="bronzModal2">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-image: linear-gradient(to right, rgb(51, 0, 53), rgb(255, 0, 0));">
                <h5 class="modal-title" style="color:#ffffff;font-size: 1.15rem !important;">Referral redeemed by your friend or family!</h5>
                <!-- <i class="fa-solid fa-xmark btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></i> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p><h4 style="font-size: 1.2rem !important;line-height: 1.4 !important;">Your referral has been accepted! Take your {{ $benefit_number }} Beltification<sup>tm</sup> test for only $5! <p><sup>*</sup>Beltification<sup>tm</sup> function coming soon!</p></h4></p>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        var is_first_time_user = $("#is_first_time_user").val();
        var is_accept_bronze_plan = $("#is_accept_bronze_plan").val();
        var refered_by = $("#refered_by").val();
        var anyone_accepts_referral = $("#anyone_accepts_referral").val();
        var subscription_id = $("#subscription_id").val();
        var payment_status = $("#payment_status").val();
        var plan_name = $("#plan_name").val();

        // if(is_first_time_user == 1 && is_accept_bronze_plan == '')
        // {   
        //     $("#bronzModal").modal('show');
        // }

        if(is_first_time_user == 1 && is_accept_bronze_plan == 1 && refered_by != '')
        {   
            $("#bronzModal1").modal('show');
        }
        if(anyone_accepts_referral == 1)
        {   
            $("#bronzModal2").modal('show');

            $.ajax({
                type: "POST",
                url: '{{ route("changeAnyoneAcceptsReferralFlag") }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                   
                },
                error:function (error) {
                    toastr.error(error.responseJSON.message);
                }
            });
        }

        if(subscription_id != 1 && payment_status == 0)
        {
            Swal.fire({
            title: '<h5> Do you want to continue the plan upgrade to '+ plan_name +' ?</h5>',
            // icon: 'info',
            iconHtml: '<img src="{{ asset('images/infoIcon1.png') }}">',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'

            }).then((result) => {
                if (result.value) {

                            var url = '{{ route("bronzePlanStripe")}}';
                
                            window.location.href = url;
                       
                }
            });

            $(".swal2-modal h5").css('font-size', '1rem');
            $(".swal2-modal img").css('height', '67px');
            $(".swal2-modal").css('border-radius', '15px');
            $(".swal2-modal").css('height', 'auto');
            $(".swal2-modal").css('background', 'auto');
            $(".swal2-modal").css('width', 'auto');
            $(".swal2-icon").css('height', '3rem');
            $(".swal2-icon").css('width', '3rem');
            $(".swal2-icon .swal2-icon-content").css('font-size', '1.75rem');
            $(".swal2-close").css('font-size', '2.0em');
            $(".swal2-icon").css('border-color', '#ff1648');
            $(".swal2-icon").css('color', '#ff1648');
            $(".swal2-confirm").css('background-color', '#ff1648');
            $(".swal2-confirm").css('border-radius', '2.25rem');
            $(".swal2-confirm").css('width', '5rem');
            $(".swal2-cancel").css('background-color', '#ff1648');
            $(".swal2-cancel").css('border-radius', '2.25rem');
            $(".swal2-cancel").css('width', '5rem');
        }

        $.ajax({
                type: "POST",
                url: '{{ route("changeIsFirstTimeUserFlag") }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                   
                },
                error:function (error) {
                    toastr.error(error.responseJSON.message);
                }
            });
    });

    function acceptPlan(value)
    {
        
        if(value == 1)
        {   
            // window.location.href = "{{ route('bronzePlanStripe')}}";
           window.location.href = "{{ route('acceptBronzPlan')}}";
        }

        if(value == 2)
        {
            $("#redeem_row_banner").show();
            $("#sectionRegistrationNotice").removeClass('d-none');
            
            $.ajax({
                type: "POST",
                url: '{{ route("acceptPlan") }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    value: value
                },
                success: function (response) {
                   
                },
                error:function (error) {
                    toastr.error(error.responseJSON.message);
                }
            });
        }
    }

    $('#bronzModal1').on('hidden.bs.modal', function () {
        window.location.href = "{{ route('student_subscription_manage')}}";
    })

    $('#bronzModal2').on('hidden.bs.modal', function () {
        window.location.href = "{{ route('student_subscription_manage')}}";
    })
</script>
@endpush