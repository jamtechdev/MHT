@extends('front.layouts.app')

@section('content')

@include('front.include.instructor_complete_profile')
<div class="maz__dashboard__wrapper">
    <div class="maz__dashboard-container">
        <div class="sub-wrapper">
            <div class="left-sidebar">
                @include('front.include.instructor_header')
            </div>
            <div class="wrapper-content">
                <h4 class="dashboard_titles fw-ebold">Elda Potter Kung-Fu Q&A</h4>
                <div class="card maz__dashboard__card">
                    <div class="card-body maz__profile-content">
                        <div class="d-flex flex-sm-row flex-column justify-content-sm-between align-items-sm-center mb-4">
                            <a href="{{ route('instructor_profile_add_questions')}}" class="btn btn-info dashboard_btn_lg btn-question fw-bold text-uppercase">Add Questions</a>
                            <a href="#" class="text-info fw-med f-20 mt-3 mt-md-0">Expand All/Collapse All</a>
                        </div>

                        <!-- Accordian start -->
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-1" aria-expanded="false" aria-controls="flush-collapse-1">
                                        How do I find Content I Love on MartialArtsZen.com?	
                                    </button>
                                </h2>
                                <div id="flush-collapse-1" class="accordion-collapse collapse" aria-labelledby="flush-heading-1" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Sed porttitor lectus nibh.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-2" aria-expanded="false" aria-controls="flush-collapse-2">
                                        How does MartialArtsZen.com compare to a traditional brick and mortar school?
                                    </button>
                                </h2>
                                <div id="flush-collapse-2" class="accordion-collapse collapse" aria-labelledby="flush-heading-2" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Sed porttitor lectus nibh.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-3" aria-expanded="false" aria-controls="flush-collapse-3">
                                        How well do virtual martial arts and fitness classes really work?
                                    </button>
                                </h2>
                                <div id="flush-collapse-3" class="accordion-collapse collapse" aria-labelledby="flush-heading-3" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Sed porttitor lectus nibh.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-4" aria-expanded="false" aria-controls="flush-collapse-4">
                                        Which devices are supported? What equipment do I need?
                                    </button>
                                </h2>
                                <div id="flush-collapse-4" class="accordion-collapse collapse" aria-labelledby="flush-heading-4" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Sed porttitor lectus nibh.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-5" aria-expanded="false" aria-controls="flush-collapse-5">
                                        What forms of payment do you accept?
                                    </button>
                                </h2>
                                <div id="flush-collapse-5" class="accordion-collapse collapse" aria-labelledby="flush-heading-5" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Sed porttitor lectus nibh.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-6" aria-expanded="false" aria-controls="flush-collapse-6">
                                        How Easy is it to learn on MartialArtsZen.com?
                                    </button>
                                </h2>
                                <div id="flush-collapse-6" class="accordion-collapse collapse" aria-labelledby="flush-heading-6" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Sed porttitor lectus nibh.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-7">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-7" aria-expanded="false" aria-controls="flush-collapse-7">
                                        How does your service compare to what I find on YouTube?
                                    </button>
                                </h2>
                                <div id="flush-collapse-7" class="accordion-collapse collapse" aria-labelledby="flush-heading-7" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Sed porttitor lectus nibh.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-8">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-8" aria-expanded="false" aria-controls="flush-collapse-8">
                                        What is Beltification?
                                    </button>
                                </h2>
                                <div id="flush-collapse-8" class="accordion-collapse collapse" aria-labelledby="flush-heading-8" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Sed porttitor lectus nibh.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-9">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-9" aria-expanded="false" aria-controls="flush-collapse-9">
                                        What is Kung-Fu?
                                    </button>
                                </h2>
                                <div id="flush-collapse-9" class="accordion-collapse collapse" aria-labelledby="flush-heading-9" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Sed porttitor lectus nibh.
                                    </div>
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