@extends('admin.layouts.app')
@section('title', 'Instructor')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>All Tab Password</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/admins') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>All Tab Password</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5 class="card-title mb-0">All Tab Password</h5>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('admin::post.all.tab.password') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{ @$tab_password->id }}">
                        <div class="form-group my-2">
                            <label for="">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ @$tab_password->username }}" placeholder="Enter username">

                            @if ($errors->has('username'))
                                <div class="my-2 text-danger">{{ $errors->first('username') }}</div>
                            @endif
                        </div>
                        
                        <div class="form-group mt-2">
                            <label for="">Password <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                {{-- <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"> --}}
                                <button class="btn btn-outline-secondary" type="button" id="change-password-btn"><i class="fa fa-eye"></i></button>
                              </div>
                            @if ($errors->has('password'))
                                <div class="my-1 text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        
                        @if($tab_password)
                            <button class="btn btn-primary mt-2">Update</button>
                        @else
                            <button class="btn btn-primary mt-2">Create</button>
                        @endif
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="addFaqHeading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form class="headingFormSubmit" action="{{ route('admin::store.faq.heading') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add FAQ Heading</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group my-2">
                        <label class="mb-2" for="heading">Enter Heading <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="heading" id="heading" placeholder="Enter heading">
                        <p class="heading_error my-2 text-danger"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
@endsection
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>
    $(document).ready(function(){
        $('button#change-password-btn').click(function(){
            var $this = $(this);
            var $password = $("input#password");
            if($password.attr('type') == 'password'){
                $password.attr('type','text');
                $this.html('<i class="fa fa-eye-slash"></i>');
            }
            else{
                $password.attr('type','password');
                $this.html('<i class="fa fa-eye"></i>');
            }
        });
    });
</script>
@endpush
