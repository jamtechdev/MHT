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
                <h4 class="dashboard_titles">Manage Payments</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body d-flex flex-column justify-content-between p-4 maz__profile-content">
                        <div class="col-md-12 justify-content-center mb-5">
                            <div class="card text-center">
                                <div class="card-header">
                                <b> Current Plan </b>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Plan Name :- {{  isset($subscriptionData['plan_name']) ? $subscriptionData['plan_name'] : '' }}</h5>
                                    <p class="card-text">Benefits :- </p>
                                    <p class="card-text">Validity :- 
                                        @php 
                                        $validity = "";

                                        if(isset($subscriptionData['validity_type']))
                                        {
                                            if($subscriptionData['validity_type'] == 1)
                                            {
                                                $validity = date("Y-m-d",strtotime($studentProfileData->created_at. ' + '.$subscriptionData->validity.' days'));
                                            } 
                                            if($subscriptionData['validity_type'] == 2)
                                            {
                                                $validity = date("Y-m-d",strtotime($studentProfileData->created_at. ' + '.$subscriptionData->validity.' months'));
                                            } 
                                            if($subscriptionData['validity_type'] == 3)
                                            {
                                                $validity = date("Y-m-d",strtotime($studentProfileData->created_at. ' + '.$subscriptionData->validity.' years'));
                                            } 
                                            if($subscriptionData['validity_type'] == 4)
                                            {
                                                $validity = "Lifetime";
                                            } 
                                        }
                                       
                                        echo $validity;
                                        @endphp
                                    </p>
                                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changePlanModal">Change Plan</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-5 border border-3" style="height:10%;width:100%;">
                             <div class="row">
                                 <div class="col-md-6">
                                 <span class="d-flex justify-content-center align-items-center mt-3">
                                    Visa Ending in 0820, Expires10/2023
                                 </span>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                        <button class="btn btn-primary me-md-2" type="button">Change Card Details</button>

                                    </div>
                                 </div>
                             </div>           
                        </div>
                        <div class="col-md-12 justify-content-center mb-3">
                            <div class="card text-center">
                                <div class="card-header">
                                <b> Subscription Plan Purchase History </b>
                                </div>
                                <div class="card-body">
                                    <table id="subscription_members" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th scope="col" style="border-top:1px solid">#</th>
                                            <th scope="col" style="border-top:1px solid">Date</th>
                                            <th scope="col" style="border-top:1px solid">Plan</th>
                                            <th scope="col" style="border-top:1px solid">Price</th>
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
                                    $oldBenefits = array();

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

<script>
   $(function () {
    
    var table = $('#subscription_members').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('student_subscription_history',Auth::id()) }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'date', name: 'date'},
            {data: 'plan_name', name: 'plan_name'},
            {data: 'price', name: 'price'},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endpush
