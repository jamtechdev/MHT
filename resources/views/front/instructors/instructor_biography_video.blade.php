@extends('front.layouts.app')

@section('content')

@include('front.include.instructor_complete_profile')

<style>
        .toggle-class {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 55px;
        height: 25px;
        display: inline-block;
        position: relative;
        border-radius: 50px;
        overflow: hidden;
        outline: none;
        border: none;
        cursor: pointer;
        background-color: #707070;
        transition: background-color ease 0.3s;
        }

        .toggle-class:before {
        content: "";
        display: block;
        position: absolute;
        z-index: 2;
        width: 21px;
        height: 20px;
        background: #fff;
        left: 2px;
        top: 3px;
        border-radius: 50%;
        font: 10px/28px Helvetica;
        text-transform: uppercase;
        font-weight: bold;
        text-indent: -22px;
        word-spacing: 9px;
        color: #fff;
        text-shadow: -1px -1px rgba(0,0,0,0.15);
        white-space: nowrap;
        box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        transition: all cubic-bezier(0.3, 1.5, 0.7, 1) 0.3s;
        }

        .toggle-class:checked {
        background-color: #1667a5;
        }

        .toggle-class:checked:before {
        left: 32px;
        }

        @media (min-width: 320px){
            #addBiographyButton{
                padding: 0.5rem 0.5rem;
                font-size: 0.8rem;
            }
        }

        @media (min-width: 375px){
            #addBiographyButton{
                padding: 0.5rem 0.3rem;
                font-size: 0.9rem;
            }
        }

        @media (min-width: 425px){
            #addBiographyButton{
                padding: 0.5rem 1.5rem;
                font-size: 0.9rem;
            }
        }

        @media (min-width: 768px){
            #addBiographyButton{
                padding: 0.7rem 1.6rem;
                font-size: 0.9rem;
            }
        }
    </style>
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="dashboard_titles mt-1">Biography Videos</h4>
                    <a href="{{ route('instructor_add_biography') }}" class="btn btn-secondary dashboard_btn_lg text-uppercase mb-3" id="addBiographyButton">Add Biography Video</a>
                </div>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row text-center mt-2">
                            @foreach ($instructorBiographyVideoData as $biographyData)
                                <div class="col-lg-4 col-md-6 ">
                                    <div class="maz__recommdate-video">
                                    <a class="maz__edit-icon" href="{{ route('editBiographyVideo',['video_id'=>$biographyData['id']])}}"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="maz__del-icon" href="javscript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteInstructorBiographyVideo" onclick="deleteInstructorBiographyVideo('{{$biographyData['title']}}', '{{$biographyData['id']}}');"><i class="fas fa-trash-alt"></i></a>
                                        <div class="wistia_embed wistia_async_{{$biographyData['video_id']}} popover=true popoverContent=html" style="display:block; white-space:nowrap;" id="wistia-{{$biographyData['video_id']}}-{{$biographyData['id']}}">
                                            <div class="maz__recommdate-video-block">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <img src="{{ $biographyData['video_thumbnail'] }}" alt="{{ $biographyData['title'] }}">
                                                </div>
                                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($biographyData['video_duration'])->format('i:s'); }}</div>
                                            </div>
                                        </div>
                                        <div class="maz__recommdate-video-content" style="padding-bottom: 9px;">
                                            @if($biographyData['status'] == 1)
                                                <div class='custom-control custom-switch'>
                                                     <div class="row">
                                                        <div class="col-md-9" style="text-align:left;">
                                                            <h6 class="maz__swiper__block-title" style="float:left;">{{ $biographyData['title'] }}</h6>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input style="float:right;" data-id="+full.id+" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" checked onclick="changevideostatus('{{ $biographyData['id'] }}')" value='0' id="videoStatus_{{ $biographyData['id'] }}">
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                </div>
                                              
                                            @else
                                                <div class='custom-control custom-switch'>
                                                    <div class="row">
                                                        <div class="col-md-9" style="text-align:left;">
                                                        <h6 class="maz__swiper__block-title" style="float:left;">{{ $biographyData['title'] }}</h6>
                                                        </div>
                                                        <div class="col-md-3">
                                                        <input style="float:right;" data-id="+full.id+" class='toggle-class' type='checkbox' data-onstyle='success' data-offstyle='danger' data-toggle='toggle' data-on='Active' data-off='InActive' value='1' onclick="changevideostatus('{{ $biographyData['id'] }}')" id="videoStatus_{{ $biographyData['id'] }}">
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                </div>
                                              
                                            @endif

                                            {{--<h6 class="maz__swiper__block-title" style="float:left;">{{ $biographyData['description'] }}</h6>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Delete Instructor Biography Video Confirmation Modal Dialog --}}
<div class="modal fade" id="deleteInstructorBiographyVideo" tabindex="-1" aria-labelledby="deleteInstructorBiographyVideoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="body-content my-5">
                    <h4>Are you sure do you want to delete <span id="deleteBiographyTitle">this biography video</span>?</h4>
                </div>
                <div class="button-groups mb-5">
                    <a id="deleteBiographyYesLink" href="javscript:void(0);" class="btn btn-secondary dashboard_btn_sm text-uppercase me-3">Yes</a>
                    <a href="javscript:void(0);" class="btn btn-primary dashboard_btn_sm dashboard_btn_danger text-uppercase" data-bs-dismiss="modal">No</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        changevideostatus = (classId) => {
            var id = classId;
            var value = $('#videoStatus_'+id).val();
 
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method:"POST",
                url: 'biographystatus/'+id,
                data:{value:value},
                dataType: 'json',
                success: function(res){
                    toastr.success(res.message);

                    setTimeout(function () {
                        location.reload();
                 }, 900);
                    
                    
                },
                error: function(response){
                    toastr.error(response.message);
                }

            });
        }       

        function deleteInstructorBiographyVideo(title, id) {
            $("#deleteBiographyTitle").text(title);
            var baseURL = '{{ url("/") }}';
            var deleteBiographyURL = baseURL + '/delete_instructor_biography/'+id;
            $("#deleteBiographyYesLink").attr("href", deleteBiographyURL);
        }
    </script>
@endpush