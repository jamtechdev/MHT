@extends('front.layouts.app')

@section('content')
@include('front.include.student_alert_box')
<!-- maz main wrapper -->
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/1009e4fb26.js" crossorigin="anonymous"></script>
<style>
      #blur {
        color: transparent;
        text-shadow: 0 0 3px #000;
      }
      
</style>
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.student_header')
            </div>
            <div class="wrapper-content">
                <h4 class="dashboard_titles">My Subscription</h4>
                <div class="card maz__dashboard__card">
                    <input type="hidden" id="user_id" value="{{$studentProfileData->id}}">
                    <input type="hidden" id="plan_id" value="{{$studentProfileData->subscription_id}}">

                    <input type="hidden" id="cust_id" value="{{$studentProfileData->customer_id}}">
                    <input type="hidden" id="stripe_plan_id" value="{{$studentProfileData->plan_id}}">

                    <div class="card-body d-flex flex-column justify-content-between p-4 maz__profile-content">
                        <div class="col-md-12 justify-content-center mb-5">
                            <div class="card text-center">
                                <div class="card-header">
                                <b> Current Plan </b>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Plan Name: {{  isset($subscriptionData['plan_name']) ? $subscriptionData['plan_name'] : '' }}</h5>
                                    <p style="text-align:left;" class="card-text"> <b> Benefits: </b></p>
                                    <ul style="text-align:left;">
                                        @if($oldPlanBenfits)
                                           

                                            @foreach($oldPlanBenfits as $b)
                                                <li>{{ $b }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    @if($subscriptionData['id'] == 1)
                                        <p class="card-text">Validity: Free Always</p>
                                    @else
                                        <p class="card-text">Validity: {{  $validity->subscription_end_date ?? ''}}</p>
                                    @endif
                                   
                                    <!-- <button id="cancel" type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cancelPlanModal" >Cancel</button> --> <!-- for model-->
                                    @if(Auth::user()->subscription_id != 1 && isset($validity->status) ? $validity->status != "cancelled" : '')
                                        <button id="cancel" type="button"  class="btn btn-primary">Cancel</button>
                                    @endif
                                        <a type="button" class="btn btn-primary" href="{{ route('changePlanPage') }}">Change Plan</a>
                                    @if($benefit_number)
                                        <h5>Referral Benefit : {{ $benefit_number }} $5 Beltification<sup>tm</sup> @if($benefit_count > 1) tests @else test @endif available</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{--<div class="col-md-12 mb-5 border border-3" style="height:10%;width:100%;">
                             <div class="row">
                                 <div class="col-md-6">
                                 <span class="d-flex justify-content-center align-items-center mt-3">
                                    Visa Ending in 0820, Expires10/2023
                                 </span>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">

                                        <a href="{{route('student_manage_payment_methods')}}" class="btn btn-primary me-md-2">Change Card Details</a>
                                    </div>
                                 </div>
                             </div>           
                        </div>--}}
                        <div class="col-md-12 justify-content-center mb-3">
                            <div class="card text-center">
                                <div class="card-header">
                                <b> Subscription Plan Purchase History </b>
                                </div>
                                <div class="card-body">
                                    <table id="subscription_members" class="table table-striped table-bordered" style="width:100%;">
                                        <thead>
                                            <tr>
                                            <th scope="col" style="border-top:1px solid">#</th>
                                            <th scope="col" style="border-top:1px solid">Subscription Plan</th>
                                            <th scope="col" style="border-top:1px solid">Purchased At</th>
                                            <th scope="col" style="border-top:1px solid">Renews At</th>
                                            <th scope="col" style="border-top:1px solid">Ends At</th>
                                            <th scope="col" style="border-top:1px solid">Price</th>
                                            <th scope="col" style="border-top:1px solid">Download Receipt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>    
                            </div>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- cancel plan model-->
<!-- Modal -->
<div class="modal fade" id="cancelPlanModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cancel Plan</h4>
        </div>
        <div class="modal-body">
          <p>Before you go are you sure you want to give away over 100+ teaching videos, advanced services, and more?</p>
          <button id="cancel_yes" type="button">Yes</button>
          <button id="cancel_no" type="button">No</button>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!--cancel plan model end-->
<!-- Change Plan Modal -->
<div class="modal fade" id="changePlanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Your Plan Change</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <div class="col-md-12">
                <div class="row">
                <div class="col-md-4">
                    <div class="card current">
                        <div class="card-header" style="text-align:center;">
                            <b> Current Plan </b>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="text-align:center;">{{  isset($subscriptionData['plan_name']) ? $subscriptionData['plan_name'] : '' }}</h5>
                            <p class="card-text" style="text-align:center;"> 
                                $ {{  isset($subscriptionData['price']) ? $subscriptionData['price'] : '' }} / 
                                @php
                                    $validity_type = ""; 
                                    
                                    if(isset($subscriptionData['validity_type']))
                                    {
                                        if($subscriptionData['validity_type'] == 1)
                                        {
                                            $validity_type = $subscriptionData['validity']." "."Day";
                                        }
                                        if($subscriptionData['validity_type'] == 2)
                                        {
                                            $validity_type = $subscriptionData['validity']." "."Month";
                                        }
                                        if($subscriptionData['validity_type'] == 3)
                                        {
                                            $validity_type = $subscriptionData['validity']." "."Year";
                                        }  
                                        if($subscriptionData['validity_type'] == 4)
                                        {
                                            $validity_type = "Lifetime";
                                        }    
                                    }
                                    
                                    
                                    echo $validity_type;
                                @endphp                
                            </p>
                            <p class="card-text">
                                @php
                                    $oldBenefits = explode(",",$studentPlanBenefits);

                                    if(!empty($allBenefits))
                                    {
                                        foreach($allBenefits as $ab)
                                        {
                                            if(in_array($ab->id,$oldBenefits))
                                            {
                                                @endphp
                                                    <i class="fa fa-check me-1"></i> 
                                                @php 
                                                echo 'hi';
                                                echo $ab->benefit;
                                            }
                                            else
                                            {
                                                @endphp
                                                    <p>
                                                    <i class="fa fa-times me-1"></i> 
                                                @php 
                                                echo 'hi';
                                                echo $ab->benefit;
                                            }
                                            @endphp
                                                </p>    
                                            @php
        
                                        }
                                    }
                                @endphp
                            </p>
                        </div>
                    </div>                                   
                </div>
                
                

                @php
                     if(!empty($newPlans))
                     {
                         foreach($newPlans as $n)
                         {
                            @endphp
                                <div class="col-md-4">
                                    <div class="card new">
                                        <div class="card-header text-center">
                                            Other Plan
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title" style="text-align:center;">{{ $n['plan_name'] }}</h5>
                                            <p class="card-text" style="text-align:center;"> 
                                                $ {{  $n['price'] }} / 
                                                @php
                                                    $validity_type = ""; 

                                                    if($n['validity_type'] == 1)
                                                    {
                                                        $validity_type = $n['validity']." "."Day";
                                                    }
                                                    if($n['validity_type'] == 2)
                                                    {
                                                        $validity_type = $n['validity']." "."Month";
                                                    }
                                                    if($n['validity_type'] == 3)
                                                    {
                                                        $validity_type = $n['validity']." "."Year";
                                                    } 
                                                    if($n['validity_type'] == 4)
                                                    {
                                                        $validity_type = "Lifetime";
                                                    }       
                                                    
                                                    echo $validity_type;
                                                @endphp                
                                            </p>
                                            <p class="card-text">
                                                @php
                                                    $oldBenefits = explode(",",$n['benefits']);

                                                    if(!empty($allBenefits))
                                                    {
                                                        foreach($allBenefits as $ab)
                                                        {
                                                            if(in_array($ab->id,$oldBenefits))
                                                            {
                                                                @endphp
                                                                    <i class="fa fa-check me-1"></i> 
                                                                @php 
                                                                echo $ab->benefit;
                                                            }
                                                            else
                                                            {
                                                                @endphp
                                                                    <p>
                                                                    <i class="fa fa-times me-1"></i> 
                                                                @php 
                                                                echo $ab->benefit;
                                                            }
                                                            @endphp
                                                            </p>
                                                            @php
                        
                                                        }
                                                    }
                                                @endphp
                                            </p>
                                            <div class="text-center">
                                            <a href="{{ route('buyPlan',$n['id']) }}" class="btn btn-primary">Buy Now</a>
                                            </div>       
                                        </div>
                                    </div>
                                </div>    
                             @php
                         }
                     }       
                @endphp
            </div>
            </div>
      </div>
       {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>

@endsection
@push("scripts")
 <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></link>
<script>
    $(document).ready(function() {

    //  setTimeout(function(){
    //    $("#success1").remove();
    // }, 30000 ); // 5 secs
});
</script>
<script>
   $(function () {
    
    var table = $('#subscription_members').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        responsive: true,
        // scrollY: true,
        ajax: "{{ route('student_subscription_history',Auth::id()) }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'plan_name', name: 'plan_name'},
            {data: 'date', name: 'date'},
            {data: 'renew_date', name: 'renew_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'price', name: 'price'},
            {
                data: 'receipt_url', 
                name: 'receipt_url',
                
                
                render:function (data, type, full, meta) {
                        if(full.receipt_url)
                        {
                            return "<a href="+full.receipt_url+"><i class='fa fa-list'></i></a>";
                        }
                        else
                        {
                            return "<a href='javascript::void(0)'></a>";
                        }
                            
                    }
            },
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>

<!-- This code is when we use model for cancel plan-->
<script>
    $('#cancel_yes').click(function(){

        
        var plan_id=$('#plan_id').val();
        var user_id=$('#user_id').val();

        var cust_id=$('#cust_id').val();
        var stripe_plan_id=$('#stripe_plan_id').val();

        // alert(cust_id);
        // alert(stripe_plan_id);

        $.ajax({
                    url:'plan_cancel',
                    method:'post',
                    data:{plan_id:plan_id,user_id:user_id},
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data)
                    {
                        alert(data.msg);
                    }
        })

        
    });

    $('#cancel_no').click(function(){

        
        alert('Your plan is safe');
    });
</script>

<!-- Author kalyani-->
<!-- code end for model through cancel-->

<!-- code start without model cancel plan-->
<script>
    $('#cancel').click(function(){
        
        Swal.fire({
            title: '<h5>Before you go are you sure you want to give away over 100+ teaching videos,<br> personalized services, and more?</h5>',
            //showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            // icon:'info',
            iconHtml: '<img src="{{ asset('images/infoIcon1.png') }}">',
            
            //denyButtonText: `No`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) 
            {

                var plan_id=$('#plan_id').val();
                var user_id=$('#user_id').val();
                var cust_id=$('#cust_id').val();
                var stripe_plan_id=$('#stripe_plan_id').val();

                // alert(cust_id);
                // alert(stripe_plan_id);

                $.ajax({
                            url:'plan_cancel',
                            method:'post',
                            data:{plan_id:plan_id,user_id:user_id,cust_id:cust_id,stripe_plan_id:stripe_plan_id},
                            headers:{
                                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                            },
                            success:function(data)
                            {
                               // $.toaster({ priority :'success', title :'Title', message :'Your message here'});
                                //alert(data.msg);
                                if(data.status==1)
                                {
                                    toastr.success(data.msg).delay(5000);


                                    setTimeout(() => {
                                        window.location.href="student_subscription_manage";
                                    }, 5000);
                                }
                                else
                                {
                                    toastr.error('ERROR');
                                }

                                
                                // swal.fire({
                                //             title:data.msg,
                                //             type:"success",
                                //             confirmButtonText: 'Confirm',
                                //         }).then ((result)=>{
                                //             if(result.isConfirmed)
                                //              {
                                //
                                //              }
                                //         });
                            }
                         })
            } 
            else if (result.isDenied) 
            {
                Swal.fire('Your Plan is Safe', '', 'info')
            }
        })

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
            $(".swal2-confirm").css('width', '6rem');

            $(".swal2-cancel").css('background-color', '#ff1648');
            $(".swal2-cancel").css('border-radius', '2.25rem');
            $(".swal2-cancel").css('width', '5rem');
        
    });
</script>
<!--code end-->
@endpush
