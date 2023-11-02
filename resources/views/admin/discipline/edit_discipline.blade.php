@extends('admin.layouts.app')
@section('title', 'Edit Discipline')
@push('styles')
    <style>
        .fit-cover {
            object-fit: cover;
        }

        .main-box {
            width: 250px;
            height: 45px;
            align-items: center;
        }

        .box-title {
            width: 60%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .preview-box {
            width: 20%;
        }

        .image-style {
            object-fit: cover;
            width: 100%;
            height: 25px;
        }

        .text-box {
            width: 20%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

    </style>
@endpush
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Discipline</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admins') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Edit Discipline</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Edit Discipline</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form id="disciplineEditForm" class='form-horizontal' method="POST"
                            action="{{ url('admins/discipline/' . $result['id']) }}" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            @include("admin.discipline._form")

                            <div class="form-group mt-2 mb-4">
                                <label for="discipline-img">Discipline Image</label>
                                <input type="file" name="discipline_img" id="discipline-img" class="form-control">

                                @if($result['is_stored_system'] == 1)
                                    <img class="mt-3" src="{{ asset($result['photo']) }}" alt="" width="300px" height="200px">
                                @else
                                    <img class="mt-3" src="{{ $result['photo'] }}" alt="" width="300px" height="200px">
                                @endif
                            </div>
                            <div class="text-center">
                                <a href="{{ url('admins/discipline') }}" class="btn btn-white btn-sm">Cancel</a>
                                <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-check"></i>
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h3>Discipline Photo Upload</h3>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content" id="logo_upload">
                        <image-crop-component form-url="{{ url("admins/discipline/photo/upload") }}" discipline-id="{{ $result['id'] }}" discipline-logo="{{ $result['photo'] ?? '' }}"></image-crop-component>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(".close").on('click', function(){
            $("#modal").modal('hide');
        });
        $(document).ready(function() {
            // Define Form Jquary Validator
            $("#disciplineEditForm").validate({
                rules: {
                    title: {
                        required: true,
                    },
                    description: {
                        required: true,
                    }
                },
                messages: {
                    title: {
                        required: "Title is required",
                    },
                    description: {
                        required: "Description is required",
                    }
                }
            })
        });
    </script>
@endpush
