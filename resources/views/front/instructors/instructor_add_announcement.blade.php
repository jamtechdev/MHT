@extends('front.layouts.app')

@section('content')

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content">
                <h4 class="dashboard_titles">Reviews</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="row">
                           
                           <div class="col-lg-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control mb-4" id="exampleFormControlInput1" placeholder="Topic Title">
                                </div>
                           </div>
                           
                           <div class="col-lg-12">
                               <textarea class="maz__editer-textarea">Next, use our Get Started docs to setup Tiny!</textarea>
                               <div class="mt-4">
                                  <h5>OPTIONS</h5>
                                        <div class="form-check form-check-inline maz__checkbox_group maz__checkbox_group_inline">
                                            <input class="form-check-input maz__checkbox_info" type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">Delay Posting</label>
                                        </div>
                                        <div class="form-check form-check-inline maz__checkbox_group maz__checkbox_group_inline">
                                            <input class="form-check-input maz__checkbox_info" type="checkbox" id="inlineCheckbox2" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">Allow Users to comment</label>
                                        </div>
                                        <div class="form-check form-check-inline maz__checkbox_group maz__checkbox_group_inline">
                                            <input class="form-check-input maz__checkbox_info" type="checkbox" id="inlineCheckbox3" value="option3">
                                            <label class="form-check-label" for="inlineCheckbox3">User Must post before seeing replies</label>
                                        </div>
                                        <div class="form-check form-check-inline maz__checkbox_group maz__checkbox_group_inline">
                                            <input class="form-check-input maz__checkbox_info" type="checkbox" id="inlineCheckbox4" value="option4">
                                            <label class="form-check-label" for="inlineCheckbox4">Allow Liking</label>
                                        </div>
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
    <script>
        tinymce.init({
            selector:'.maz__editer-textarea'
        });
    </script>
@endpush