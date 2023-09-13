@extends('front.layouts.app')

@section('content')

<section class="maz__common_background_banner lozad-background" data-background-image="{{ asset('assets/front/images/common-bg-banner.jpg') }}">
    <div class="maz__common-bg-content">
        <h1>Frequently Asked Questions</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"> Home </li>
                <li class="breadcrumb-item" aria-current="page"> FAQ </li>
            </ol>
        </nav>
    </div>
</section>
<section class="maz__sections">
    <div class="container">
        <div class="row faq-block">
            <div class="col-lg-3">
                <h2 class="faq-title">Martial Arts Zen</h2>
            </div>
            <div class="col-lg-9">
                <!-- Accordian start -->
                <div class="accordion accordion-flush" id="accordionMartialArtsZen">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-1" aria-expanded="false" aria-controls="flush-collapse-1">
                                What is MartialArtsZen.com?
                            </button>
                        </h2>
                        <div id="flush-collapse-1" class="accordion-collapse collapse" aria-labelledby="flush-heading-1" data-bs-parent="#accordionMartialArtsZen">
                            <div class="accordion-body">
                                At MartialArtsZen.com we believe in the lifelong pursuit of physical education. Our website provides access to exclusive content from certified instructors around the world. Learn proper technique and even certify your skills all while getting an excellent workout. Our videos are perfect for in-home and on-the-go workouts, and offer learners the ability to track progress against physical education goals. 
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-2" aria-expanded="false" aria-controls="flush-collapse-2">
                                How do I use MartialArtsZen.com?
                            </button>
                        </h2>
                        <div id="flush-collapse-2" class="accordion-collapse collapse" aria-labelledby="flush-heading-2" data-bs-parent="#accordionMartialArtsZen">
                            <div class="accordion-body">
                                Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-3" aria-expanded="false" aria-controls="flush-collapse-3">
                                How do I find Content I Love on MartialArtsZen.com?
                            </button>
                        </h2>
                        <div id="flush-collapse-3" class="accordion-collapse collapse" aria-labelledby="flush-heading-3" data-bs-parent="#accordionMartialArtsZen">
                            <div class="accordion-body">
                                Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-4" aria-expanded="false" aria-controls="flush-collapse-4">
                                How does MartialArtsZen.com compare to a traditional brick and mortar school?
                            </button>
                        </h2>
                        <div id="flush-collapse-4" class="accordion-collapse collapse" aria-labelledby="flush-heading-4" data-bs-parent="#accordionMartialArtsZen">
                            <div class="accordion-body">
                                Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-5" aria-expanded="false" aria-controls="flush-collapse-5">
                                How well do virtual martial arts and fitness classes really work?
                            </button>
                        </h2>
                        <div id="flush-collapse-5" class="accordion-collapse collapse" aria-labelledby="flush-heading-5" data-bs-parent="#accordionMartialArtsZen">
                            <div class="accordion-body">
                                Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-6" aria-expanded="false" aria-controls="flush-collapse-6">
                                Which devices are supported? What equipment do I need?
                            </button>
                        </h2>
                        <div id="flush-collapse-6" class="accordion-collapse collapse" aria-labelledby="flush-heading-6" data-bs-parent="#accordionMartialArtsZen">
                            <div class="accordion-body">
                                Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-7">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-7" aria-expanded="false" aria-controls="flush-collapse-7">
                                What forms of payment do you accept?
                            </button>
                        </h2>
                        <div id="flush-collapse-7" class="accordion-collapse collapse" aria-labelledby="flush-heading-7" data-bs-parent="#accordionMartialArtsZen">
                            <div class="accordion-body">
                                Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-8">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-8" aria-expanded="false" aria-controls="flush-collapse-8">
                                How Easy is it to learn on MartialArtsZen.com?
                            </button>
                        </h2>
                        <div id="flush-collapse-8" class="accordion-collapse collapse" aria-labelledby="flush-heading-8" data-bs-parent="#accordionMartialArtsZen">
                            <div class="accordion-body">
                                Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-9">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-9" aria-expanded="false" aria-controls="flush-collapse-9">
                                How does your service compare to what I find on YouTube?
                            </button>
                        </h2>
                        <div id="flush-collapse-9" class="accordion-collapse collapse" aria-labelledby="flush-heading-9" data-bs-parent="#accordionMartialArtsZen">
                            <div class="accordion-body">
                                Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-10">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-10" aria-expanded="false" aria-controls="flush-collapse-10">
                                What is Beltification?
                            </button>
                        </h2>
                        <div id="flush-collapse-10" class="accordion-collapse collapse" aria-labelledby="flush-heading-10" data-bs-parent="#accordionMartialArtsZen">
                            <div class="accordion-body">
                                Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-11">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-11" aria-expanded="false" aria-controls="flush-collapse-11">
                                What is Kung-Fu?
                            </button>
                        </h2>
                        <div id="flush-collapse-11" class="accordion-collapse collapse" aria-labelledby="flush-heading-11" data-bs-parent="#accordionMartialArtsZen">
                            <div class="accordion-body">
                                Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row faq-block">
            <div class="col-lg-3">
                <h2 class="faq-title">Membership</h2>
            </div>
            <div class="col-lg-9">
                <div class="accordion accordion-flush" id="accordionMembership">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-member-1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-member-1" aria-expanded="false" aria-controls="flush-collapse-member-1">
                                What is a free account and what can I do with it?
                            </button>
                        </h2>
                        <div id="flush-collapse-member-1" class="accordion-collapse collapse" aria-labelledby="flush-heading-member-1" data-bs-parent="#accordionMembership">
                            <div class="accordion-body">
                                Sed porttitor lectus nibh. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-member-2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-member-2" aria-expanded="false" aria-controls="flush-collapse-member-2">
                                What can I do with a paid account?
                            </button>
                        </h2>
                        <div id="flush-collapse-member-2" class="accordion-collapse collapse" aria-labelledby="flush-heading-member-2" data-bs-parent="#accordionMembership">
                            <div class="accordion-body">
                                Sed porttitor lectus nibh. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-member-3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-member-3" aria-expanded="false" aria-controls="flush-collapse-member-3">
                                How much does membership cost?
                            </button>
                        </h2>
                        <div id="flush-collapse-member-3" class="accordion-collapse collapse" aria-labelledby="flush-heading-3" data-bs-parent="#accordionMembership">
                            <div class="accordion-body">
                                Sed porttitor lectus nibh. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row faq-block">
            <div class="col-lg-3">
                <h2 class="faq-title">Instructors</h2>
            </div>
            <div class="col-lg-9">
                <div class="accordion accordion-flush" id="accordionInstructors">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-inst-1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-inst-1" aria-expanded="false" aria-controls="flush-collapse-inst-1">
                                How do I become an instructor?
                            </button>
                        </h2>
                        <div id="flush-collapse-inst-1" class="accordion-collapse collapse" aria-labelledby="flush-heading-inst-1" data-bs-parent="#accordionInstructors">
                            <div class="accordion-body">
                                Sed porttitor lectus nibh. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-inst-2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-inst-2" aria-expanded="false" aria-controls="flush-collapse-inst-2">
                                How to get help on setting up my classes?
                            </button>
                        </h2>
                        <div id="flush-collapse-inst-2" class="accordion-collapse collapse" aria-labelledby="flush-heading-inst-2" data-bs-parent="#accordionInstructors">
                            <div class="accordion-body">
                                Sed porttitor lectus nibh. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading-inst-3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-inst-3" aria-expanded="false" aria-controls="flush-collapse-inst-3">
                                How to replace a video I have already uploaded?
                            </button>
                        </h2>
                        <div id="flush-collapse-inst-3" class="accordion-collapse collapse" aria-labelledby="flush-heading-inst-3" data-bs-parent="#accordionInstructors">
                            <div class="accordion-body">
                                Sed porttitor lectus nibh. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection