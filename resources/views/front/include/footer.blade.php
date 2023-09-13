<footer class="maz__footer">
    <section class="maz__footer-bg maz__sections" style="padding: 4.375rem 0 !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3 mb-4 mb-lg-0" style="padding-left:2%;">
                    <a href="{{ route('softRegister') }}">
                        <img src="{{ asset('images/newMartialArtsLogo.jpeg') }}" id="footerLogo" alt="MAZ Logo" width="80%;" height="97px;">
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="maz__quick-links">
                        <ul class="list-unstyled">
                            <li class="fw-bold text-uppercase mb-2"><span>Students</span></li>
                            @auth
                               {{-- <li><a href="#">Disciplines</a></li>
                                <li><a href="{{ route('schools-and-instructors') }}">Schools & Instructors</a></li>
                                <li><a href="{{ url("our-classes?selIns=All&selDesc=All") }}">Classes</a></li>
                                <li><a href="#">Beltification™</a></li> --}}
                                <li><a href="{{ route('disciplines',['id'=>2]) }}">Free Videos</a></li>
                            @else
                                {{-- <li><a href="javascript:void(0)" onclick="loginMessage()">Disciplines</a></li>
                                <li><a href="javascript:void(0)" onclick="loginMessage()">Schools & Instructors</a></li>
                                <li><a href="javascript:void(0)" onclick="loginMessage()">Classes</a></li>
                                <li><a href="javascript:void(0)" onclick="loginMessage()">Beltification™</a></li> --}}
                                <li><a href="{{ route('student.login') }}">Free Videos</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="maz__quick-links">
                        <ul class="list-unstyled">
                            <li class="fw-bold text-uppercase mb-2"><span>Instructors</span></li>
                            <li><a href="{{ route('softRegister','#educators-section') }}">Teach</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="maz__quick-links">
                        <ul class="list-unstyled">
                            <li class="fw-bold text-uppercase mb-2"><span>Legal</span></li>
                            <li><a href="{{ route('terms') }}">Terms and Conditions</a></li>
                            <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="maz__quick-links">
                        <ul class="list-unstyled">
                            <li class="fw-bold text-uppercase mb-2"><span>Contact Us</span></li>
                            <li><a href="javascript:void(0)" onclick="contactUsModal()" id="myBtn"> Contact Us </a></li>
                        </ul>
                    </div>
                </div>
                {{--<div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="maz__quick-links">
                        <ul class="list-unstyled">
                            <li class="fw-bold text-uppercase mb-2"><span>Customer Support</span></li>
                            <li><a href="{{ route('schools-and-instructors') }}">Students</a></li>
                            <li><a href="{{ route('schools-and-instructors') }}">Instructors</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                           <li class="fw-bold text-uppercase mb-2"><span>Customer Support</span></li>
                            <li><a href="#">Students</a></li>
                            <li><a href="#">Instructors</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>--}}
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="maz__quick-links">
                        {{--<ul class="list-unstyled">
                             <li class="fw-bold text-uppercase mb-2"><span>About Us</span></li>
                            <li><a href="javascript:;">Origin Story</a></li>
                            <li><a href="javascript:;">Mission & Vision</a></li> 
                            <li class="fw-bold text-uppercase mb-2"><span>About Us</span></li>
                            <li><a href="javascript:;">Origin Story</a></li>
                            <li><a href="javascript:;">Mission & Vision</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li class="fw-bold text-uppercase mb-2"><span>Affiliates & Partners</span></li>
                            <li><a href="#">Revenue Opportunities</a></li>
                        </ul>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="maz__copyright-bg">
        <p class="maz__footer-text">©2022 ExperiZen, LLC</p>
    </div>
    <!-- The Modal -->
<div id="myModal" class="modal1">

    <!-- Modal content -->
    <div class="modal-content1">
    
    <div class="container text-center">
    <span class="close1">&times;</span>
        <h3>Contact Us</h3>
        <hr>
        <div class="contactForm">
            <form action="{{ route('contactUsForm') }}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="form-group row mb-2">
                        <div class="col-sm-12">
                            <select name="topic" id="topic" class="form-control" required>
                                <option value="">Select Topic</option>
                                <option value="1">Student Related Topic</option>
                                <option value="2">Instructor Related Topic</option>
                                <option value="3">Other Topic</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-sm-12">
                        <input type="email" name="email" class="form-control" id="staticEmail" placeholder="email@example.com" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email@example.com'" required />
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-sm-12">
                            <textarea name="message" class="form-control" id="message" cols="30" rows="5" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12" style="text-align:right;">
                        <button class="btn btn-danger" type="button" onclick="closeContactForm()">Cancel</button>
                        <button class="btn btn-info" type="submit">Submit</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    </div>

</div>
    <script>
        function loginMessage()
        {
            Swal.fire({
            title: '<h5>Please <a href="{{ url('free?type=free') }}"> Sign Up </a> To Gain Access</h5>',
            // icon: 'info',
            iconHtml: '<img src="{{ asset('images/infoIcon1.png') }}">',
            })

            $(".swal2-modal h5").css('font-size', '1rem');
            $(".swal2-modal img").css('height', '67px');
            $(".swal2-modal").css('border-radius', '15px');
            $(".swal2-modal").css('height', 'auto');
            $(".swal2-modal").css('background', 'auto');
            $(".swal2-modal").css('width', 'auto');
            $(".swal2-icon").css('height', '3rem');
            $(".swal2-icon").css('width', '3rem');
            $(".swal2-icon .swal2-icon-content").css('font-size', '1.75rem');
            $(".swal2-close").css('font-size', '2.0em');
            $(".swal2-icon").css('border-color', '#ff1648');
            $(".swal2-icon").css('color', '#ff1648');
            $(".swal2-confirm").css('background-color', '#ff1648');
            $(".swal2-confirm").css('border-radius', '2.25rem');
            $(".swal2-confirm").css('width', '5rem');
        }   
    </script>
    
</footer>
@push('scripts')
<script>
    function contactUsModal()
    {
        // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 

  modal.style.display = "block";


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

span.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
    }


function closeContactForm()
{

    $('#topic').val('');
    $('#staticEmail').val('');
    $('#message').val('');

    var modal = document.getElementById("myModal");
    
    modal.style.display = "none";
}
</script>
@endpush