@extends('front.layouts.app')

@section('content')
<section class="maz__common_background_banner lozad-background" data-background-image="{{ asset('assets/front/images/common-bg-banner.jpg') }}">
    <div class="maz__common-bg-content">
        <h1>Classes</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"> Home </li>
                <li class="breadcrumb-item" aria-current="page">Classes</li>
            </ol>
        </nav>
    </div>
</section>
<section class="maz__bg_gray maz__sections">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-xxl-4 col-md-5">
                <h1 class="text-uppercase mb-3 mb-md-0">Our Classes</h1>
            </div>
            <div class="col-xxl-5 col-md-7">
                <div class="row">
                    <div class="mb-3 mb-md-0 col-md-4 col-xxl-4">
                        <select class="form-select" id="selDiscplineDropdown">
                            <option value="All" {{ ($selDesc == 'All') ? 'selected' : '' }}>ALL</option>
                            @if(count($discplineDropdownData))
                                @foreach($discplineDropdownData as $discDropData)
                                    <option value="{{ $discDropData->id }}" {{ ($selDesc == $discDropData->id) ? 'selected' : '' }}>{{ ucwords($discDropData->title) }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3 mb-md-0 col-md-5 col-xxl-5">
                        <select class="form-select" id="selInstructorDropdown">
                            <option value="All" {{ ($selIns == 'All') ? 'selected' : '' }}>ALL</option>
                            @if(count($instructorDropdownData))
                                @foreach($instructorDropdownData as $insdropData)
                                    <option value="{{ $insdropData->id }}" {{ ($selIns == $insdropData->id) ? 'selected' : '' }}>{{ ucwords($insdropData->name) }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3 mb-md-0 col-md-3 col-xxl-3">
                        <button class="btn btn-info btn-clear" id="btnClear">Clear <span class="fas fa-times"></span></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            @if(count($instructorCourseLessionData))
                @foreach($instructorCourseLessionData as $insCourseLessionData)
                <div class="col-md-6 col-xl-4 col-xxl-3">
                    <div class="maz__our__class_selection__block">
                        <div class="maz__ourclass-img">
                            <img data-src="{{ $insCourseLessionData->lession_thumbnail }}" class="lazy" alt="{{ $insCourseLessionData->title }}">
                            <div class="badge-dark-video-time">{{ Carbon\Carbon::parse($insCourseLessionData->video_duration)->format('i:s'); }}</div>
                        </div>
                        <div class="maz__ourclass-content">
                            <h5 class="text-primary">{{ $insCourseLessionData->title }}</h5>
                            <p class="description">{{ $insCourseLessionData->description }}</p>
                        </div>
                        <div class="ourclass__profile-box">
                            @if($insCourseLessionData->photo != '')
                                <img data-src="{{ $insCourseLessionData->photo }}" class="lazy" alt="{{ $insCourseLessionData->name }}">
                            @else
                                <img data-src="{{ asset('assets/front/images/avatar.png') }}" class="lazy" alt="{{ $insCourseLessionData->name }}">
                            @endif
                            <span>{{ ucwords($insCourseLessionData->name) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        {{-- <div class="row mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-lg justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true" class="fas fa-angle-double-left align-middle"></span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true" class="fas fa-angle-double-right align-middle"></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div> --}}
    </div>
</section>
@endsection
@push('scripts')
    <script>
        $(function() {
            var baseURL = '{{ url("/") }}';
            // Instructor Search Dropdown Filter
            $("#selInstructorDropdown").change(function() {
                var selDesc = $("#selDiscplineDropdown").val();
                window.location.href = baseURL + '/our-classes?selIns=' + $(this).val() + '&selDesc=' + selDesc;
            });

            // Descpline Search Dropdown Filter
            $("#selDiscplineDropdown").change(function() {
                var selIns = $("#selInstructorDropdown").val();
                window.location.href = baseURL + '/our-classes?selIns=' + selIns + '&selDesc=' + $(this).val();
            });

            // Clear Search Filter
            $("#btnClear").click(function() {
                window.location.href = baseURL + '/our-classes?selIns=All&selDesc=All';
            });
        });
    </script>
@endpush
