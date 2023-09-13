<style>
  .txt-edit{
    margin:15px;
    }
    @media only screen and (max-width:767px){
    p.para {
    font-size: 10px;
    margin: 10px !important;
    }
    .txt-edit{
    font-size: 10px;
    }
}
</style>
{{-- Registration Notice Section --}}
@if(Session::get('is_logged_in_user') != 1)
<section id="sectionRegistrationNotice" class="d-none">
  <div id="registrationNoticeBar" class="bg-secondary text-white d-flex align-items-center justify-content-center">
      <p class="m-4 para">Complete your registration to access our training, learning, and certification videos and classes.<a class="text-white" href="{{ url('softRegister?type=free&utm_campaign=retargeting&utm_medium=topbanner') }}"> Continue </a> </p>
      <a href="javascript:void(0);" onclick="event.preventDefault(); $('#registrationNoticeBar').remove();"><i class="fa fa-xmark text-white txt-edit" aria-hidden="true"></i></a>
  </div>
</section>
@elseif(Session::get('is_accepted_bronze_plan') == 2)
{{-- Registration Notice Section --}}
<section id="sectionRegistrationNotice" class="d-none">
  <div id="registrationNoticeBar" class="bg-secondary text-white d-flex align-items-center justify-content-center">
      {{--<p class="m-4 para">As one of our earliest customers we encourage you to redeem the $1 Bronze Lifetime promotion. Once available you can expect future features and offerings in Bronze to include: increased access to higher level videos, ability to build your skills in over 10 disciplines, opportunities to test and start earning belts.<a class="text-white" href="{{ route('bronzePlanStripe') }}"> Redeem Now </a> </p>--}}
      <p class="m-4 para">As one of our earliest customers we encourage you to redeem the $1 Bronze Lifetime promotion. Once available you can expect future features and offerings in Bronze to include: increased access to higher level videos, ability to build your skills in over 10 disciplines, opportunities to test and start earning belts.<a class="text-white" href="{{ route('acceptBronzPlan') }}"> Redeem Now </a> </p>
      <a class="m-3" href="javascript:void(0);" onclick="event.preventDefault(); $('#registrationNoticeBar').remove();"><i class="fa fa-xmark text-white txt-edit" aria-hidden="true"></i></a>
  </div>
</section>
@elseif(Session::get('is_first_time_on_step_two') == 2)
{{-- Registration Notice Section --}}
<section id="sectionRegistrationNotice" class="d-none">
  <div id="registrationNoticeBar" class="bg-secondary text-white d-flex align-items-center justify-content-center">
      <p class="m-4 para">Complete your survey to gain access to personalized videos and classes. <a class="text-white" href="{{ route('dashboard')}}"> Continue </a> </p>
      <a href="javascript:void(0);" onclick="event.preventDefault(); $('#registrationNoticeBar').remove();"><i class="fa fa-xmark text-white txt-edit" aria-hidden="true"></i></a>
  </div>
</section>
@endif
<!-- <div id="redeem_row_banner" style="display: none;">
  <section id="sectionRegistrationNotice" class="d-none">
    <div id="registrationNoticeBar" class="bg-secondary text-white d-flex align-items-center justify-content-center">
        {{--<p class="m-4 para">As one of our earliest customers we encourage you to redeem the $1 Bronze Lifetime promotion. Once available you can expect future features and offerings in Bronze to include: increased access to higher level videos, ability to build your skills in over 10 disciplines, opportunities to test and start earning belts.<a class="text-white" href="{{ route('bronzePlanStripe') }}"> Redeem Now </a> </p>--}}
        <p class="m-4 para">As one of our earliest customers we encourage you to redeem the $1 Bronze Lifetime promotion. Once available you can expect future features and offerings in Bronze to include: increased access to higher level videos, ability to build your skills in over 10 disciplines, opportunities to test and start earning belts.<a class="text-white" href="{{ route('acceptBronzPlan') }}"> Redeem Now </a> </p>
        <a class="m-3" href="javascript:void(0);" onclick="event.preventDefault(); $('#registrationNoticeBar').remove();"><i class="fa fa-xmark text-white txt-edit" aria-hidden="true"></i></a>
    </div>
  </section>
</div> -->

<div id="redeemBronzePlan" hidden>
  <section id="redeemBronzePlan" class="redeemBronzePlan">
    <div id="registrationNoticeBar" class="bg-secondary text-white d-flex align-items-center justify-content-center">
        {{--<p class="m-4 para">As one of our earliest customers we encourage you to redeem the $1 Bronze Lifetime promotion. Once available you can expect future features and offerings in Bronze to include: increased access to higher level videos, ability to build your skills in over 10 disciplines, opportunities to test and start earning belts.<a class="text-white" href="{{ route('bronzePlanStripe') }}"> Redeem Now </a> </p>--}}
        <p class="m-4 para">Complete the payment and registration process to gain access to the increased services and features offered in the {{ Session::get('planName') }} plan. <a class="text-white" href="{{ route('bronzePlanStripe') }}"> Continue </a> </p>
        <a class="m-3" href="javascript:void(0);" onclick="event.preventDefault(); $('#registrationNoticeBar').remove();"><i class="fa fa-xmark text-white txt-edit" aria-hidden="true"></i></a>
    </div>
  </section>
</div>

<div id="verifyEmailBanner" hidden>
  <section id="redeemBronzePlan" class="redeemBronzePlan">
    <div id="registrationNoticeBar" class="bg-secondary text-white d-flex align-items-center justify-content-center">
        {{--<p class="m-4 para">As one of our earliest customers we encourage you to redeem the $1 Bronze Lifetime promotion. Once available you can expect future features and offerings in Bronze to include: increased access to higher level videos, ability to build your skills in over 10 disciplines, opportunities to test and start earning belts.<a class="text-white" href="{{ route('bronzePlanStripe') }}"> Redeem Now </a> </p>--}}
        <p class="m-4 para">Verify your email and complete the registration process to gain access to our training, learning, and certification videos and classes. <a class="text-white" href="{{ url('verify-email') }}"> Continue </a> </p>
        <a class="m-3" href="javascript:void(0);" onclick="event.preventDefault(); $('#registrationNoticeBar').remove();"><i class="fa fa-xmark text-white txt-edit" aria-hidden="true"></i></a>
    </div>
  </section>
</div>

<input type="hidden" id="is_logged_in_user" value="{{Session::get('is_logged_in_user')}}">
<input type="hidden" id="is_accepted_bronze_plan" value="{{Session::get('is_accepted_bronze_plan')}}">
<input type="hidden" id="is_first_time_on_step_two" value="{{Session::get('is_first_time_on_step_two')}}">
<input type="hidden" id="subscription_id1" value="{{ Auth::user()->subscription_id ?? ''}}">
<input type="hidden" id="payment_status" value="{{ Auth::user()->payment_status ?? ''}}">
<input type="hidden" id="email_verified" value="{{ Auth::user()->email_verified_at ?? ''}}">
<input type="hidden" id="first_time_user" value="{{ Auth::user()->is_first_time_user ?? ''}}">
<input type="hidden" id="userLoggedInOrNot" value="{{ Auth::user() }}">

{{-- Header Section --}}
<header class="maz__header" id="header-scroll">
  <nav class="navbar navbar-expand-xl navbar-light bg-top">
    <div class="container-fluid g-0">
      @if(Session::get('isLandingPage') == 'register')
      <a class="navbar-brand" href="{{ route('register') }}"><img src="{{ asset('images/newMartialArtsLogo.jpeg') }}" alt="MartialArtZenLogo" width="100%" height="100%"></a>
      @elseif(Session::get('isLandingPage') == 'register499')
      <a class="navbar-brand" href="{{ route('register499') }}"><img src="{{ asset('images/newMartialArtsLogo.jpeg') }}" alt="MartialArtZenLogo" width="100%" height="100%"></a>
      @elseif(Session::get('isLandingPage') == 'free')
      <a class="navbar-brand" href="{{ route('softRegister') }}"><img id="headerLogo" src="{{ asset('images/newMartialArtsLogo.jpeg') }}" alt="MartialArtZenLogo" width="100%" height="100%"></a>
      @else
      <a class="navbar-brand" href="{{ route('welcome') }}"><img id="headerLogo" src="{{ asset('images/newMartialArtsLogo.jpeg') }}" alt="MartialArtZenLogo" width="100%" height="100%"></a>
      @endif

      <div class="offcanvas offcanvas-start maz__offcanvas__header-top" id="navbar-maz">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MartialArtZen</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="menu-center">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
                @if(Session::get('isLandingPage') == 'register')
                <a class="nav-link {{ isActiveRoute(['welcome', 'free', 'register', 'register499']) }}" aria-current="page" href="{{ route('register') }}">Home</a>
                @elseif(Session::get('isLandingPage') == 'register499')
                <a class="nav-link {{ isActiveRoute(['welcome', 'free', 'register', 'register499']) }}" aria-current="page" href="{{ route('register499') }}">Home</a>
                @elseif(Session::get('isLandingPage') == 'free')
                <a class="nav-link {{ isActiveRoute(['welcome', 'free', 'register', 'register499']) }}" aria-current="page" href="{{ route('softRegister') }}">Home</a>
                @else
                <a class="nav-link {{ isActiveRoute(['welcome', 'free', 'register', 'register499']) }}" aria-current="page" href="{{ route('welcome') }}">Home</a>
                @endif
            </li>
           {{-- @if(!Session::get('isLandingPage'))--}}
            <li class="nav-item">
                <a class="nav-link {{ isActiveRoute(['disciplines']) }}" href="{{ route('disciplines',['id'=>2]) }}">Disciplines</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isActiveRoute(['schools-and-instructors', 'schools-and-instructors-detail']) }}" href="{{ route('schools-and-instructors') }}">Schools & Instructors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isActiveRoute(['our-classes']) }}" href="{{ url("our-classes?selIns=All&level=2") }}">Classes</a>
            </li>
            {{--<li class="nav-item">
                <a class="nav-link" href="{{ route('beltificationDashboard')}}">Beltifications ™</a>
            </li>--}}

            {{--@endif
            {{-- @if(Auth::id() || isset(Auth::guard('instructor')->user()->id)) 
              <li class="nav-item">
                  <a class="nav-link {{ isActiveRoute(['instructor-video']) }}" href="{{ url('instructor-video?type=All Instructor') }}">Videos</a> 
                @auth
                  <a class="nav-link {{ isActiveRoute(['instructor-video', 'instructor-wistia-free-video']) }}" href="{{ url('instructor-video') }}">Videos</a>
                @else
                <a class="nav-link {{ isActiveRoute(['instructor-video', 'instructor-wistia-free-video']) }}" href="javascript:void(0)" onclick="loginMessage()">Videos</a>
                @endauth
              </li>--}}
            {{-- @endif --}}
          </ul>
        </div>
      </div>

      <ul class="list-unstyled d-flex mb-0 ms-auto ms-md-auto ms-lg-auto me-2">
        {{-- Right Side Student Menu Icon --}}
        <li class="dropdown">
          @if(Auth::id())
            @if(!isset(Auth::guard('instructor')->user()->id))
              <a href="javascript:void(0);" class="maz___nav-icon dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-tie text-white fs-5"></i><span>STUDENT</span></a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>
                  <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </li>
              </ul>
            @endif
          @else
            @if(!isset(Auth::guard('instructor')->user()->id))
              <a href="{{ route('student.login') }}" class="maz___nav-icon" title="Student Login"><i class="fas fa-user-tie text-white fs-5"></i><span>STUDENT</span></a>
            @endif
          @endif
        </li>
        {{-- Right Side School Menu Icon --}}
        <li class="dropdown ms-2">
          @if(isset(Auth::guard('instructor')->user()->id))
            <a href="javascript:void(0);" class="maz___nav-icon dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-school text-white fs-5"></i><span>SCHOOL</span></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item" href="{{ route('instructor_dashboard') }}">Dashboard</a></li>
              <li>
                <a href="{{ route('instructor_logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('instructor-logout-form').submit();">Logout</a>
                <form id="instructor-logout-form" action="{{ route('instructor_logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
            </ul>
          @else
            @if(!Auth::id())
              <a href="{{ route('instructor_login') }}" class="maz___nav-icon"><i class="fas fa-school text-white fs-5" title="Instructor Login"></i><span>SCHOOL</span></a>
            @endif
          @endif
        </li>
      </ul>

      {{-- Menu Icon --}}
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-maz" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
  </nav>
</header>
@push('scripts')
<script src="https://kit.fontawesome.com/1009e4fb26.js" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/lozad"></script> -->
<script>
  $(function() {

      var is_logged_in_user = $('#is_accepted_bronze_plan').val();
      var is_accepted_bronze_plan = $('#is_accepted_bronze_plan').val();

      var subscription_id = $('#subscription_id1').val();
      var payment_status = $('#payment_status').val();
      var email_verified = $('#email_verified').val();
      var first_time_user = $('#first_time_user').val();
      var userLoggedInOrNot = $('#userLoggedInOrNot').val();

      var is_first_time_on_step_two = $('#is_first_time_on_step_two').val();

      if (typeof(Storage) !== "undefined") {
        if(localStorage.useremail || localStorage.userfirstname || localStorage.userlastname || localStorage.userphone) {
          $("#sectionRegistrationNotice").removeClass('d-none');
        }
      }
      
      
      if(is_accepted_bronze_plan == 2)
      {
          $("#sectionRegistrationNotice").removeClass('d-none');
      }

      //if(is_first_time_on_step_two == 2 && payment_status != 0)
      if(is_first_time_on_step_two == 2)
      {
          $("#sectionRegistrationNotice").removeClass('d-none');
      }

      if(subscription_id != 1 && payment_status == 0 && email_verified != '' && first_time_user == 2)
      {
          $("#redeemBronzePlan").removeAttr('hidden');
      }

      if(email_verified == '' && userLoggedInOrNot != '' && first_time_user == 2)
      {
        $ ("#verifyEmailBanner").removeAttr('hidden');
      }
  });
</script>
<script>
        function loginMessage()
        {
            Swal.fire({
            title: '<h5>Please <a href="{{ url('softRegister?type=free') }}"> Sign Up </a> To Gain Access</h5>',
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
@endpush