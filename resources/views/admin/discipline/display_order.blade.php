@extends('admin.layouts.app')
@section('title', 'Instructor')
@section('content')

<style>
  
    /* image dimension */
    img {
      height: 200px;
      width: 350px;
    }
  
    /* imagelistId styling */
    #imageListId {
      margin: 0;
      padding: 0;
      list-style-type: none;
    }
  
    #imageListId > div {
      margin: 8px;
      padding: 0.4em;
      display: inline-block;
      box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
    }
  
    /* Output order styling */
    #outputvalues {
      margin: 0 2px 2px 2px;
      padding: 0.4em;
      padding-left: 1.5em;
      width: 250px;
      border: 2px solid dark-green;
      background: gray;
    }
  
    .listitemClass {
      /* border: 1px solid #006400;*/
        width: 350px;
        margin: 10px;
        padding: 10px;
        background-color: #f0f0f0;
        border: 1px dashed #ccc;
        cursor: grab;
    }

    .listitemClass:active{
        cursor: grabbing;
    }

    .listitemClass img{
        min-height: auto;
        height: auto;
        object-fit: cover;
        max-width: 100%;
        max-height: 144px;
    }

    .listitemClass h4{
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
  
    .height {
      height: 10px;
    }
  </style>
  {{-- <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet"> --}}
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Instructor</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/admins') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Instructor List</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5 class="card-title mb-0">Set Disciplines Display Order</h5>
                </div>
                <div class="ibox-content">
                    {{-- <div class="form-group discipline-input-container">
                        <label for="disciplines" class="my-2 font-weight-bold">Select Disciplines <span class="text-danger">*</span></label>
                        <select name="disciplines" id="disciplines" class="form-control">
                            <option value="">-- Select disciplines --</option>
                            @forelse($disciplines as $key => $discipline)
                                <option value="{{ $discipline->id }}"> {{ $discipline->title }} </option>
                            @empty
                            @endforelse
                        </select>
                    </div> --}}

                    <div class="discipline-container my-4 py-2">
                        <div id="imageListId">
                            @forelse($discipline as $key => $data)
                              <div id="{{ $data->id }}" class="card listitemClass" style="width: 18rem;">
                                @if($data->is_stored_system == 1)
                                    <img src="{{ asset($data->photo) }}" class="card-img-top" alt="{{ $data->title }}">
                                @else
                                    <img src="{{ $data->photo }}" class="card-img-top" alt="{{ $data->title }}">
                                @endif
                                <div class="card-body">
                                  <h3 class="card-title">{{ $data->title }}</h3>
                                </div>
                              </div>
                            @empty
                            @endforelse
                        </div>
                          
                        <div class="my-3">
                            <form action="{{ route('admin::discipline.save.display.order') }}" method="POST">
                              @csrf
                              <input type="hidden" name="order" id="outputvalues">
                              <button class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $(function() {
            $("#imageListId").sortable({
            update: function(event, ui) {
                getIdsOfImages();
            } //end update  
            });
        });
        
        function getIdsOfImages() {
            var values = [];
            $('.listitemClass').each(function(index) {
            values.push($(this).attr("id"));
            });
            $('#outputvalues').val(values);
        }
	});

</script>
@endpush
