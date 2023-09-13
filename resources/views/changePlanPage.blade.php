@extends('front.layouts.app')

@section('content')

<!-- maz main wrapper -->
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/1009e4fb26.js" crossorigin="anonymous"></script>
<style>
      #blur {
        color: transparent;
        text-shadow: 0 0 3px #000;
      }

      .fa-check:before{
          color:green !important;
      }

      .fa-xmark:before{
          color:red !important;
      }

      .curtrentPlanBtn {
        width: 10em;
        height: 5ex;
        background-image: linear-gradient(135deg, #f34079 40%, #fc894d);
        border: none;
        border-radius: 5px;
        font-weight: bold;
        color: white;
        cursor: pointer;
    }

    .curtrentPlanBtn:active {
        box-shadow: 2px 2px 5px #fc894d;
    }
    .planDetails button, [type=button], [type=reset], [type=submit] {
    
        width: 100% !important;
        font-size: 10px;
        height: 100% !important;
        line-height: 14px;
    }
      
</style>

<section class="planDetails mt-4 mb-4">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="my-table" style="overflow-x:auto; width:96%;">
                        <thead>
                            <tr style="text-align:center;">
                                <th class="thead">Features</th>
                                
                                @if(count($allPlans))
                                    @foreach($allPlans as $plan)
                                        <th>{{ $plan->plan_name }}</th>
                                    @endforeach
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($benefits))
                                @foreach($benefits as $benefit)
                                <tr>
                                    <td class="thead" style="width:30%; text-align:center;">{{ $benefit->benefit }}</td>
                                    @if(count($allPlans))
                                        @foreach($allPlans as $plan)
                                            @php
                                                $planBenefits = explode(",",$plan->benefits);

                                                if(in_array($benefit->id,$planBenefits))
                                                {
                                                    @endphp
                                                        <td style="text-align:center;"><i class="fa-solid fa-check"></i></td>
                                                    @php
                                                }
                                                else
                                                {
                                                    @endphp
                                                        <td style="text-align:center;"><i class="fa-solid fa-xmark"></i></td>
                                                    @php
                                                }
                                            @endphp
                                        @endforeach
                                    @endif
                                </tr>
                                @endforeach
                            @endif
                            <tr id="planPrices" style="text-align:center;">
                                <td class="thead"></td>
                                @if(count($allPlans))
                                    @foreach($allPlans as $plan)
                                        @php
                                            $validty = "";

                                            if($plan->validity_type == 1)
                                            {
                                                $validity = $plan->validity." "."Day";
                                            }
                                            elseif($plan->validity_type == 2)
                                            {
                                                $validity = $plan->validity." "."Month";
                                            }
                                            elseif($plan->validity_type == 3)
                                            {
                                                $validity = $plan->validity." "."Year";
                                            }
                                            else
                                            {
                                                $validity = $plan->validity." ".'Lifetime';
                                            }
                                        @endphp
                                    

                                        @if($plan->id == $firstPlan->id)
                                            <td><button type="button" style="min-height: 52px; border: 2px; padding: 10px; border-radius: 20px 20px;" class="btn-login plan-button curtrentPlanBtn">Current Plan</button></td>
                                        @else
                                            @if($plan->id == 3 || $plan->id == 4)
                                                <td><button type="button" class="btn-login plan-button disabled" style="width: 104%;border: 2px solid red; padding: 10px 0px; border-radius: 20px 20px;pointer-events:none;">{{ $plan->plan_name }} Plan </br> $ {{ $plan->price }} / {{ $validity  }} [ Coming Soon ]</button></td>        
                                            @else
                                                @if($plan->id == 1)
                                                    <td><a href="javascript::void(0)" type="button" style="width: 106%;border: 2px solid red; padding: 10px 0px; border-radius: 20px 20px;" class="btn-login plan-button" onclick="changePlan({{ $plan->id }})">{{ $plan->plan_name }} Plan </br> Free Always</a></td>        
                                                @else
                                                    <td><a href="{{ route('bronzePlanStripe',['lastPage'=>'student_subscription_manage','planId'=>$plan->id, 'sendUpgradeConfirmEmail'=>1]) }}" type="button" style="width: 106%;border: 2px solid red; padding: 10px 0px; border-radius: 20px 20px;" class="btn-login plan-button" onclick="changePlan({{ $plan->id }})">{{ $plan->plan_name }} Plan </br> $ {{ $plan->price }} / {{ $validity  }}</a></td>        
                                                @endif
                                            @endif
                                        @endif
                                    
                                    @endforeach
                                @endif
                                </tr>                   
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push("scripts")
 <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></link>

<script>
   $(function () {
    
    var table = $('#subscription_members').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('student_subscription_history',Auth::id()) }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'plan_name', name: 'plan_name'},
            {data: 'date', name: 'date'},
            {data: 'renew_date', name: 'renew_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'price', name: 'price'},
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
            title: '<h5>Before you go are you sure you want to give away over 100+ teaching videos,<br> advanced services, and more?</h5>',
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
                                    toastr.success(data.msg);
                                    setTimeout(() => {
                                        window.location.href="student_subscription_manage";
                                    }, 2000);
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
