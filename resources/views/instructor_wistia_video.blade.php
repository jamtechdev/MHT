@extends('front.layouts.app')

@section('content')
<style>
    .w-bottom-bar {
    width: 98% !important;
        left: 0px !important;
    }
    .w-bottom-bar-lower > div:nth-child(1){
        width: 105% !important;
    }
</style>
<section class="maz__common_background_banner maz__instructor_detail_banner lozad-background"
    data-background-image="{{ asset('assets/front/images/instructor-detail-banner.jpg') }}">
    <div class="maz__common-bg-content">
        <h1 class="names">{{ $instructorName }}</h1>
    </div>
</section>
<section class="maz__bg_gray maz__sections">
    <div class="maz__instructor_video-block">
        <div class="container-fluid">
            <div class="maz__intstructor_video mb-5">
                <a href="{{ route('instructor-video') }}" class="maz__close-icon">
                    <i class="fa fa-xmark"></i>
                </a>

                <div class="embed-responsive embed-responsive-16by9">
                    <div class="wistia_embed wistia_async_{{ $instructorVideoId }} playlistLinks=auto autoPlay=true videoFoam=true" style="height:800px;max-width:1496px;position:relative;">&nbsp;</div>
                    {{-- <iframe src="//fast.wistia.net/embed/iframe/{{ $instructorVideoId }}?videoFoam=true&resumable=true&autoPlay=true&playlistLinks=auto" allowtransparency="true" resumable frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe> --}}
                </div>
            </div>
        </div>
        <div class="categories_swiper__slider-block">
            <div class="container">
                <h3 class="text-uppercase mb-3 mb-md-0">Recommended Videos</h3>
                <input type="hidden" id="video_id" value="{{$instructorVideoId}}">

                <hr>
                @if (count($instuctorVideosData))
                    <div class="row text-center mt-5">
                        @foreach ($instuctorVideosData as $insId )
                            <div class="col-lg-4 col-md-6 ">
                                <div class="swiper-slide">
                                    <a href="#wistia_{{$insId['video_id']}}" onclick="changeVideoId('{{$insId['video_id']}}')">
                                        <div class="maz__swiper_slider_common_block">
                                        {{-- <div class="maz__swiper_block_discipline-img" >
                                                
                                                <img data-src="{{ $insId['thumbnail_url'] }}" class="lazy wistia-thumbnail" alt="{{ str_replace('_', ' ', $insId['title']) }}">
                                                
                                            </div>--}}
                                            <div class="maz__swiper_block_discipline-img">
                                                <img src="{{ $insId['thumbnail_url'] }}" alt="{{ str_replace('_', ' ', $insId['title']) }}">
                                                <input type="hidden" id="thumbnail_url" value="{{ $insId['thumbnail_url'] }}">
                                                <input type="hidden" id="video_id1" value="{{ $insId['video_id'] }}">
                                                <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insId['duration'])->format('i:s'); }}</div>
                                            </div>
                                           
                                            <div class="maz__swiper_block_discipline-content">
                                                <h6 class="maz__swiper__block-title mt-2">{{ str_replace('_', ' ', $insId['title']) }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="https://kit.fontawesome.com/1009e4fb26.js" crossorigin="anonymous"></script>
<script>
       // video.height(155);
                // video.width(280);
        function changeVideoId(video_id)
        {
            $('#video_id').val(video_id);
            
            var video_id = $('#video_id').val();
         
            window._wq = window._wq || [];
            _wq.push({ id: video_id, onReady: function(video) {
     
                if (video.aspect() < 1) {
                    if($(window).width() > 1500) 
                    {
                        video.height(570);
                        video.width(1025);
                    }
                    else if($(window).width() > 1280) 
                    {
                        video.height(535);
                        video.width(970);
                    }
                    else if($(window).width() == 1279)
                    {
                        video.height(470);
                        video.width(850);
                    }
                    else if($(window).width() < 1280 && $(window).width() >= 1024)
                    {
                        video.height(375);
                        video.width(680);
                    }
                    else if($(window).width() < 1024 && $(window).width() >= 768)
                    {
                        video.height(290);
                        video.width(510);
                    }
                    else if($(window).width() < 768 && $(window).width() >= 425)
                    {
                        video.height(220);
                        video.width(390);
                    }
                    else if($(window).width() < 425 && $(window).width() >= 375)
                    {
                        video.height(185);
                        video.width(355);
                    }
                    else 
                    {
                        video.height(165);
                        video.width(285);
                    }
                    console.log("vertical video");

                } else if (video.aspect() > 1) {
                    console.log("horizontal video");
                } else {
                    console.log("This video is square.");
                }

                video.bind("cancelfullscreen", function() 
                {

                    _wq.push({ id: video_id, onReady: function(video) {
                        if (video.aspect() < 1) {
                            if($(window).width() > 1500) 
                            {
                                video.height(570);
                                video.width(1025);
                            }
                            else if($(window).width() > 1280) 
                            {
                                video.height(535);
                                video.width(970);
                            }
                            else if($(window).width() == 1279)
                            {
                                video.height(470);
                                video.width(850);
                            }
                            else if($(window).width() < 1280 && $(window).width() >= 1024)
                            {
                                video.height(375);
                                video.width(680);
                            }
                            else if($(window).width() < 1024 && $(window).width() >= 768)
                            {
                                video.height(290);
                                video.width(510);
                            }
                            else if($(window).width() < 768 && $(window).width() >= 425)
                            {
                                video.height(220);
                                video.width(390);
                            }
                            else if($(window).width() < 425 && $(window).width() >= 375)
                            {
                                video.height(185);
                                video.width(355);
                            }
                            else 
                            {
                                video.height(165);
                                video.width(285);
                            }
                            console.log("vertical video");

                        } else if (video.aspect() > 1) {
                            console.log("horizontal video");
                        } else {
                            console.log("This video is square.");
                        }
                    }});
         
                });
            }});
        }

       
        var video_id = $('#video_id').val();

        window._wq = window._wq || [];

        _wq.push({ id: video_id, onReady: function(video) {
      
            if (video.aspect() < 1) 
            {
                if($(window).width() > 1500) 
                {
                    video.height(570);
                    video.width(1025);
                }
                else if($(window).width() > 1280) 
                {
                    video.height(535);
                    video.width(970);
                }
                else if($(window).width() == 1279)
                {
                    video.height(470);
                    video.width(850);
                }
                else if($(window).width() < 1280 && $(window).width() >= 1024)
                {
                    video.height(375);
                    video.width(680);
                }
                else if($(window).width() < 1024 && $(window).width() >= 768)
                {
                    video.height(290);
                    video.width(510);
                }
                else if($(window).width() < 768 && $(window).width() >= 425)
                {
                    video.height(220);
                    video.width(390);
                }
                else if($(window).width() < 425 && $(window).width() >= 375)
                {
                    video.height(185);
                    video.width(355);
                }
                else 
                {
                    video.height(165);
                    video.width(285);
                }
                
               
                console.log("vertical video");

            } else if (video.aspect() > 1) {
                console.log("horizontal video");
            } else {
                console.log("This video is square.");
            }

            video.bind("cancelfullscreen", function() 
            {

                _wq.push({ id: video_id, onReady: function(video) {
                    if (video.aspect() < 1) {
                        if($(window).width() > 1500) 
                        {
                            video.height(570);
                            video.width(1025);
                        }
                        else if($(window).width() > 1280) 
                        {
                            video.height(535);
                            video.width(970);
                        }
                        else if($(window).width() == 1279)
                        {
                            video.height(470);
                            video.width(850);
                        }
                        else if($(window).width() < 1280 && $(window).width() >= 1024)
                        {
                            video.height(375);
                            video.width(680);
                        }
                        else if($(window).width() < 1024 && $(window).width() >= 768)
                        {
                            video.height(290);
                            video.width(510);
                        }
                        else if($(window).width() < 768 && $(window).width() >= 425)
                        {
                            video.height(220);
                            video.width(390);
                        }
                        else if($(window).width() < 425 && $(window).width() >= 375)
                        {
                            video.height(185);
                            video.width(355);
                        }
                        else 
                        {
                            video.height(165);
                            video.width(285);
                        }
                        console.log("vertical video");

                    } else if (video.aspect() > 1) {
                        console.log("horizontal video");
                    } else {
                        console.log("This video is square.");
                    }
                }});
        
            });

            video.bind("end", function() 
            {
                var recommended_videos = @json($instuctorVideosData);
                
                var video_id = $('#video_id').val();

                var video_ids = [];

                if(recommended_videos)
                {
                    for(var i = 0;i<recommended_videos.length;i++)
                    {
                        video_ids.push(recommended_videos[i].video_id);
                    }
                }
                let index = video_ids.indexOf(video_id);

                if(index >= 0 && index<recommended_videos.length)
                {
                    video_id = video_ids[index + 1]
                }

                _wq.push({ id: video_id, onReady: function(video) {
                    if (video.aspect() < 1) {
                        if($(window).width() > 1500) 
                        {
                            video.height(570);
                            video.width(1025);
                        }
                        else if($(window).width() > 1280) 
                        {
                            video.height(535);
                            video.width(970);
                        }
                        else if($(window).width() == 1279)
                        {
                            video.height(470);
                            video.width(850);
                        }
                        else if($(window).width() < 1280 && $(window).width() >= 1024)
                        {
                            video.height(375);
                            video.width(680);
                        }
                        else if($(window).width() < 1024 && $(window).width() >= 768)
                        {
                            video.height(290);
                            video.width(510);
                        }
                        else if($(window).width() < 768 && $(window).width() >= 425)
                        {
                            video.height(220);
                            video.width(390);
                        }
                        else if($(window).width() < 425 && $(window).width() >= 375)
                        {
                            video.height(185);
                            video.width(355);
                        }
                        else 
                        {
                            video.height(165);
                            video.width(285);
                        }
                        console.log("vertical video");

                    } else if (video.aspect() > 1) {
                        console.log("horizontal video");
                    } else {
                        console.log("This video is square.");
                    }
                }});
        
            });

           
        }});

        $(document).ready(function() {
            // $(".maz__swiper_block_discipline-img").mouseover(function(){
            //     $(this).find('img').remove();
            //     var video_id1 = $(this).find('#video_id1').val();
            //     //$(this).prepend("<video width='320' height='240' controls></video>");
            
            //     $(this).prepend("<div class='embed-responsive embed-responsive-16by9' style='height:200px;'><div class='wistia_embed wistia_async_"+video_id1+" playlistLinks=auto autoPlay=true videoFoam=true' style='transform: scale(1.0);height:2000px;max-width:1496px;position:relative;'>&nbsp;</div>");
                
            
            // });
            // $(".maz__swiper_block_discipline-img").mouseout(function(){
            //     $(this).find('div').remove();
            //     var url = $(this).find('#thumbnail_url').val();
            //     $(this).prepend("<img src="+url+" id='video_preview' class='lazy wistia-thumbnail' alt=''>");
               
                
            // });
            
        });
</script>
@endpush