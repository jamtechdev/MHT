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
                    <h5 class="card-title mb-0">Create FAQ Queston Answer in <strong>{{ $faq->heading }}</strong></h5>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('admin::faq.store.heading.data') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="heading" class="my-1">Select FAQ Heading <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="heading" id="heading">
                                <option value="">-- Select FAQ heading --</option>
                                @forelse($faqs as $key => $f)
                                    <option @if($f->id == $faq->id) selected @endif value="{{ $f->id }}">{{ $f->heading }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        
                        <div class="form-group my-3">
                            <label for="question" class="my-1">Enter Question <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="question" id="question" placeholder="Enter question"></textarea>
                        </div>
                        
                        <div class="form-group my-3">
                            <label for="answer" class="my-1">Enter answer <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="answer" id="answer" placeholder="Enter answer" rows="10"></textarea>
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
