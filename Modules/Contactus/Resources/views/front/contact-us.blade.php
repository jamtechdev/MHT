@extends(config('contactus.front_defaultLayout'))
@section('content')
    <!-- Init Google Recaptcha V3 Script -->
    {!! RecaptchaV3::initJs() !!}
    <section class="maz__common_background_banner lozad-background"
        data-background-image="{{ asset('assets/front/images/common-bg-banner.jpg') }}">
        <div class="maz__common-bg-content">
            <h1>Contact Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"> Home </li>
                    <li class="breadcrumb-item" aria-current="page">Contact us</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="maz__sections">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h1>How can We Help?</h1>
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="Search Here.."
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text bg-primary text-white" id="basic-addon2"> <i
                                class="fas fa-search"></i> </span>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-xl-6">
                    <h4 class="mb-5">Submit Your Query</h4>
                    <form class='row g-3' id="contactusForm" method="POST" action="/contactus" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Email <span
                                    class="text-primary">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="email" id="inputEmail4" placeholder="test@info.co.in">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">What is your Query Regarding? <span
                                    class="text-primary">*</span></label>
                            <select id="inputState" class="form-select @error('question_regarding') is-invalid @enderror" name="question_regarding">
                                <option value="">Choose...</option>
                                <option value="Taekwondo">Taekwondo</option>
                                <option value="Karate">Karate</option>
                                <option value="Kung Fu">Kung Fu</option>
                                <option value="Tai chi">Tai chi</option>
                                <option value="Yoga">Yoga</option>
                            </select>
                            @error('question_regarding')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Subject <span
                                    class="text-primary">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputAddress"
                                name="name" placeholder="Gym">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="floatingTextarea2" class="form-label">Description <span
                                    class="text-primary">*</span></label>
                            <textarea class="form-control @error('message') is-invalid @enderror"
                                placeholder="Description here" id="floatingTextarea2" name="message"
                                style="height: 100px"></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input class="form-control @error('question_file') is-invalid @enderror" type="file" name="question_file"
                                id="formFile">
                            @error('question_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <!-- Generate Google Recaptcha V3 Field  -->
                            {!! RecaptchaV3::field('contactus') !!}
                        </div>
                        <div class="col-12">
                            <button type="submit"
                                class="btn btn-info dashboard_btn_sm dashboard_btn_info text-uppercase fw-bold me-3">Submit</button>
                            <button type="reset"
                                class="btn btn-primary dashboard_btn_sm dashboard_btn_danger text-uppercase fw-bold">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $("#contactusForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                question_regarding: {
                    required: true
                },
                name: {
                    required: true,
                },
                message: {
                    required: true,
                    maxlength: 255
                },
                question_file:{
                    maxsize: 500000,
                }
            },
            messages: {
                email: {
                    required: "Email is required",
                    email: "Please enter a valid email",
                },
                question_regarding:{
                    required: "Query is required"
                },
                name: {
                    required: "Subject is required"
                },
                message: {
                    required: "Description is required",
                    maxlength: "Description length must be less than 255 characters"
                },
                question_file:{
                    maxsize: "filesize must be less than 500 kilobytes."
                }
            }
        })
    });
</script>
@endpush
