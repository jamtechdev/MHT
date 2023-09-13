@extends('front.layouts.app')
@section('content')
{{-- Include Wistia Css --}}
<!-- <link rel="stylesheet" href="//fast.wistia.com/assets/external/uploader.css" /> -->
<link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.css">
<link rel="stylesheet" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css">
<style>
    .main {
    width: 50%;
    margin: 50px auto;
    }

    /* Bootstrap 4 text input with search icon */

    .has-search .form-control {
        padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }


ul, ol, li {
    margin: 0;
    padding: 0;
    list-style: none;
}
.reorder_link {
    color: #3675B4;
    border: solid 2px #3675B4;
    border-radius: 3px;
    text-transform: uppercase;
    background: #fff;
    font-size: 18px;
    padding: 10px 20px;
    margin: 15px 15px 15px 0px;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.35s;
    -moz-transition: all 0.35s;
    -webkit-transition: all 0.35s;
    -o-transition: all 0.35s;
    white-space: nowrap;
}
.reorder_link:hover {
    color: #fff;
    border: solid 2px #3675B4;
    background: #3675B4;
    box-shadow: none;
}
#reorder-helper{
    margin: 18px 10px;
    padding: 10px;
}
.light_box {
    background: #efefef;
    padding: 20px;
    margin: 15px 0;
    text-align: center;
    font-size: 1.2em;
}

/* image gallery */
.gallery{
    width:100%;
    float:left;
    margin-top:15px;
}
.gallery ul{
    margin:0;
    padding:0;
    list-style-type:none;
}
.gallery ul li{
    padding:7px;
    border:2px solid #ccc;
    float:left;
    margin:10px 7px;
    background:none;
    width:auto;
    height:auto;
}
.gallery img{
    width:250px;
}

/* notice box */
.notice, .notice a{
    color: #fff !important;
}
.notice {
    z-index: 8888;
    padding: 10px;
    margin-top: 20px;
}
.notice a {
    font-weight: bold;
}
.notice_error {
    background: #E46360;
}
.notice_success {
    background: #657E3F;
}
.ui-sortable-handle i.fa-solid.fa-xmark {
    position: absolute;
    background: red;
    width: 24px;
    height: 24px;
    border-radius: 47%;
    padding: 6px 6px 6px 8px;
    top: -64px;
    right: 2px;
    color: #FFF;
    font-size: 14px;
}
.ui-sortable-handle a.image_link {
    position: relative;
}

</style>
{{-- Include Instructor Complete Profile Header --}}
@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content mt-0">
                <h4 class="dashboard_titles">Update Class</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST" id="editClassForm" action=" class="maz__register-form" id="addBiographyVideoForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $classDetails->main_category_id }}" id="selectedLevel">
                                     <input type="hidden" value="{{ $classDetails->discipline_id }}" id="selectedDiscipline">
                                     <input type="hidden" value="{{ $classDetails->id }}" id="classId">
                                    <div class="maz__question-add-wrapper">
                                        <div class="col-lg-6 mb-3">
                                            <div class="mb-3">
                                                <label for="title" class="col-form-label text-md-end">{{ __('Class Name') }} <span class="text-primary">*</span></label>
                                                <input id="class_name" type="text" class="form-control @error('title') is-invalid @enderror" name="class_name" value="{{ $classDetails->class_name ?? '' }}" maxlength="50">
                                                <span class="text-danger" id="class_name_error"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="col-form-label text-md-end">{{ __('Select Level') }} <span class="text-primary">*</span></label>
                                                <select id="main_course_category_id" name="main_course_category_id" class="form-control">
                                                    <option value="">Select Level</option>
                                                    @if(count($mainCourseCategories))
                                                        @foreach($mainCourseCategories as $mc)
                                                            @if($classDetails->main_category_id == $mc->id)
                                                                <option value="{{ $mc->id }}" selected>{{ $mc->name }}</option>
                                                            @else
                                                                <option value="{{ $mc->id }}">{{ $mc->name }}</option>
                                                            @endif     
                                                        @endforeach
                                                    @endif    
                                                </select>
                                                <span class="text-danger" id="level_error"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="col-form-label text-md-end">{{ __('Select Discipline') }} <span class="text-primary">*</span></label>
                                                <select name="discipline_id" class="form-control" id="discipline">
                                                    <option value="">Select Discipline</option>
                                                    
                                                    @if(count($disciplineData))
                                                        @foreach($disciplineData as $dc)
                                                            @if($dc->id == $classDetails->discipline_id)
                                                                <option value="{{ $dc->id }}" selected>{{ $dc->title }}</option>
                                                            @else
                                                                <option value="{{ $dc->id }}">{{ $dc->title }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif 
                                                </select>
                                                <span class="text-danger" id="discipline_error"></span>
                                            </div>
                                        </div>
                                        <div class="table-responsive mb-3" id="videos" style="padding:10px;width:100%;">
                                            <table id="videos-datatable" class="table table-striped table-hover w-100">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Title</th>
                                                        <th style="width: 194px;text:center;">Video_thumbnail</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <hr>
                                            <span class="text-danger" id="video_error"></span>
                                        <!-- <div class="d-inline mt-2">
                                            <button type="button" class="btn btn-success dashboard_btn_lg text-uppercase me-3" onclick="sortVideos()">Sort Videos</button>
                                        </div> -->
                                        </div>

                                        <div class="sortVideos mb-2">
                                            <div class="gallery">
                                                <ul class="reorder_ul reorder-photos-list"  id="thumbnails">
                                                    @if(!empty($selectedVideos))
                                                        @foreach($selectedVideos as $video)
                                                        <li id="image_li_{{ $video['id'] }}" class="ui-sortable-handle">
                                                            <a href="javascript:void(0);" style="float:none;" class="image_link">
                                                                <img src="{{ $video['video_thumbnail'] }}" alt="">
                                                                <i class="fa-solid fa-xmark showVideoDatatable" data-id="{{ $video['id'] }}"></i>
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        
                                       <hr>
                                        <div class="d-inline">
                                            <button type="submit" class="btn btn-secondary dashboard_btn_lg text-uppercase me-3">Save Classes</button>
                                            <a class="btn btn btn-primary text-uppercase dashboard_btn_danger dashboard_btn_lg" href="{{ route('instructor_classes') }}" style="min-width: 129px !important;">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                           
                        </div>
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<!-- <script src="//fast.wistia.com/assets/external/api.js" async></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
<!-- <script src="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.js"></script> -->
<script src="{{asset('js/dataTables.checkboxes.min.js')}}"></script>
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        
        var selectedVediosArray = [];

        var videos = <?php echo json_encode($selectedVideos); ?>;

        if(videos)
        {
            for(var v = 0; v < videos.length; v++)
            {
                selectedVediosArray.push(videos[v].id);
            }
            
        }

        var oTable = $('#videos-datatable').DataTable({
                    //processing: true,
                    serverSide: true,
                    responsive: true,
                    searching: true,
                    ordering: false,
                    scrollY: '400px',
                    scrollCollapse: true,
                    paging: false,
                    ajax: {
                        url: "{!! 'getEditClassesVideosDatatable' !!}",
                        data:{'level':$("#selectedLevel").val(),'discipline':$("#selectedDiscipline").val(),'classId':$("#classId").val()},
                    },
                    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        if(jQuery.inArray(aData[0], selectedVediosArray) !== -1)
                        {
                            $(nRow).attr('id', aData[0]).css("display","none");
                        }
                        else
                        {
                            $(nRow).attr('id', aData[0]);
                        }     
                    },
                    'columnDefs': [
                                    {
                                    'targets': 0, 
                                    'render': function (data, type, full, row) {
                                             return '<input type="checkbox" value="'+data+'" id="video_'+data+'" class="editor-active">';
                                                                
                                    },
                                    'checkboxes': {
                                    //   'selectAllRow': true,
                                      'selectRow': true,
                                      'selectAll': false
                                      },
                                      
                                    }
                                  ],
                    'select': {
                      'style': 'multi',
                      'selector': 'td:first-child'
                    },
                    'order': [[1, 'asc']],
                });

        });

        $("#videos-datatable").on('change',"input[type='checkbox']",function(e){
                // alert($(this).val());
            selectedVediosArray.push($(this).val());

            var currentLevel = $("#main_course_category_id").val();
            var currentDiscipline = $("#discipline").val();

            var iddd = $(this).val();

            setTimeout(function() {
                $('#'+iddd).hide();
                // alert(iddd);
            }, 500);
            
            $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
            $('.image_link').attr("href","javascript:void(0);");
            $('.image_link').css("cursor","move");

            $.ajax({
                url:"{{route('getSelctedVideos')}}",
                method:"POST",
                async:false,
                data:{videos:selectedVediosArray},
                success:function(data)
                {
                    $("#thumbnails").empty();

                    var result = JSON.parse(data);
                    if(result)
                    {
                        for(var i = 0; i < result.length; i++)
                        {
                            $("#thumbnails").append('<li id="image_li_'+result[i].id+'" class="ui-sortable-handle">'+
                                '<a href="javascript:void(0);" style="float:none;" class="image_link">'+
                                    '<img src="'+result[i].video_thumbnail+'" alt="">'+
                                    '<i class="fa-solid fa-xmark showVideoDatatable" data-id="'+result[i].id+'"></i>'+
                                '</a>'+
                            '</li>');
                        }
                    }
                }
            });

            $(".showVideoDatatable").click(function(){
                var removeId = $(this).attr('data-id');

                selectedVediosArray = jQuery.grep(selectedVediosArray, function(value) {
                    return value != removeId;
                });

                $("#"+removeId).show();
                $("#image_li_"+removeId).remove();
                $("#video_"+removeId).prop('checked', false);
            });  
        });

        var selectedVediosArray = [];

        var videos = <?php echo json_encode($selectedVideos); ?>;

        if(videos)
        {
            for(var v = 0; v < videos.length; v++)
            {
                selectedVediosArray.push(videos[v].id);
            }
            
        }

        $(".showVideoDatatable").click(function(){
            var removeId = $(this).attr('data-id');

            selectedVediosArray = jQuery.grep(selectedVediosArray, function(value) {
                return value != removeId;
            });
            
            $("#"+removeId).show();
            $("#image_li_"+removeId).remove();
            $("#video_"+removeId).prop('checked', false);
        });  

    $("#discipline").change(function(){
            if($("#selectedDiscipline").val() == $(this).val())
            {
                location.reload();
            }

            var selectedVediosArray = [];
            
            $("#thumbnails").empty();

            $('#videos-datatable').DataTable().destroy();

            var level = $("#main_course_category_id").val();

            if(level)
            {
                var oTable = $('#videos-datatable').DataTable({
                    //processing: true,
                    serverSide: true,
                    responsive: true,
                    searching: true,
                    ordering: false,
                    scrollY: '400px',
                    scrollCollapse: true,
                    paging: false,
                    ajax: {
                        url: "{!! 'getEditClassesVideosDatatable' !!}",
                        data:{'level':level,'discipline':$(this).val()},
                    },
                    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        if(jQuery.inArray(aData[0], selectedVediosArray) !== -1)
                        {
                            $(nRow).attr('id', aData[0]).css("display","none");
                        }
                        else
                        {
                            $(nRow).attr('id', aData[0]);
                        }     
                    },
                    'columnDefs': [
                                    {
                                    'targets': 0, 
                                    'render': function (data, type, full, row) {
                                             return '<input type="checkbox" value="'+data+'" id="video_'+data+'" class="editor-active">';
                                                                
                                    },
                                    'checkboxes': {
                                    //   'selectAllRow': true,
                                      'selectRow': true
                                      },
                                      
                                    }
                                  ],
                    'select': {
                      'style': 'multi',
                      'selector': 'td:first-child'
                    },
                    'order': [[1, 'asc']],
                });
            }
            else
            {
                $(this).val("");
                alert("Please select level first");
            }

            $("#videos-datatable").on('change',"input[type='checkbox']",function(e){
                // alert($(this).val());
                selectedVediosArray.push($(this).val());

                var currentLevel = $("#main_course_category_id").val();
                var currentDiscipline = $("#discipline").val();

                var iddd = $(this).val();

                setTimeout(function() {
                    $('#'+iddd).hide();
                    // alert(iddd);
                }, 500);
                
                $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
                $('.image_link').attr("href","javascript:void(0);");
                $('.image_link').css("cursor","move");

                $.ajax({
                    url:"{{route('getSelctedVideos')}}",
                    method:"POST",
                    async:false,
                    data:{videos:selectedVediosArray},
                    success:function(data)
                    {
                        $("#thumbnails").empty();

                        var result = JSON.parse(data);
                        if(result)
                        {
                            for(var i = 0; i < result.length; i++)
                            {
                                console.log(result[i].id);

                                $("#thumbnails").append('<li id="image_li_'+result[i].id+'" class="ui-sortable-handle">'+
                                    '<a href="javascript:void(0);" style="float:none;" class="image_link">'+
                                        '<img src="'+result[i].video_thumbnail+'" alt="">'+
                                        '<i class="fa-solid fa-xmark showVideoDatatable" data-id="'+result[i].id+'"></i>'+
                                    '</a>'+
                                '</li>');
                            }

                            $('.sortVideos').removeAttr('hidden');
                        }
                    }
                });

                $(".showVideoDatatable").click(function(){

                    var removeId = $(this).attr('data-id');

                    selectedVediosArray = jQuery.grep(selectedVediosArray, function(value) {
                        return value != removeId;
                    });

                    $("#"+removeId).show();
                    $("#image_li_"+removeId).remove();
                    $("#video_"+removeId).prop('checked', false);
                });  
            });
    });

   
    $('#editClassForm').on('submit', function(event){
        event.preventDefault();
        
        var videos = [];
        $("ul.reorder-photos-list li").each(function() {
            videos.push($(this).attr('id').substr(9));
        });

        var class_name = $('#class_name').val();
        var level = $('#main_course_category_id').val();
        var discipline = $('#discipline').val();
        var classId = $('#classId').val();


        $.ajax({
            url: "{{ route('instructor_edit_class') }}",
            type: "POST",
            data:{
                class_name:class_name,
                level:level,
                discipline:discipline,
                videos:videos,
                classId:classId
            },
            success: function(response){
                toastr.success(response.message);
                
                setTimeout(function() {
                    window.location.href = "{{ route('instructor_classes')}}";
                }, 2000);
                
            },
            error: function(response) {
                $('#class_name_error').text(response.responseJSON.errors.class_name);
                $('#level_error').text(response.responseJSON.errors.level);
                $('#discipline_error').text(response.responseJSON.errors.discipline);
                $('#video_error').text(response.responseJSON.errors.videos);
            }
        });

    
    });
</script>
@endpush