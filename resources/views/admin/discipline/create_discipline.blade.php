@extends('admin.layouts.app')
@section('title', 'Create Discipline')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Create Discipline</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admins') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Create Discipline</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Create Discipline</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="disciplineCreateForm" class='form-horizontal' method="POST"
                            action="{{ url('admins/discipline') }}" enctype="multipart/form-data">
                            @csrf
                            @include("admin.discipline._form")

                            <div class="form-group mt-2 mb-4">
                                <label for="discipline-img">Discipline Image</label>
                                <input type="file" name="discipline_img" id="discipline-img" class="form-control">
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
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            // Define Form Jquary Validator
            $("#disciplineCreateForm").validate({
                rules: {
                    title: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    photo: {
                        required: true,
                        maxsize: 500000,
                        extension: "jpg,jpeg,png",
                    }
                },
                messages: {
                    title: {
                        required: "Title is required",
                    },
                    description: {
                        required: "Description is required",
                    },
                    photo: {
                        required: "Photo is required",
                        maxsize: "Photo must not be greater than 500 kilobytes.",
                        extension: "Photo must be a file of type: jpg, jpeg, png."
                    }
                }
            })
        });
    </script>
@endpush
