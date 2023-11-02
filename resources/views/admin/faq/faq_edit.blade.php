@extends('admin.layouts.app')
@section('title', 'Instructor')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Instructor</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/admins') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>FAQ List</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5 class="card-title mb-0">Edit FAQ Heading</h5>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('admin::post.faq.heading') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $faq->id }}">
                        <div class="form-group my-2">
                            <label for="heading" class="my-1">Select FAQ Heading <span class="text-danger">*</span></label>
                            <input class="form-control" name="heading" id="heading" value="{{ $faq->heading }}" required>
                            @error('heading')
                                <div class="text-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-success">Save</button>
                        <a href="{{ url('admins/faq') }}" class="btn btn-warning">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>

</script>
@endpush
