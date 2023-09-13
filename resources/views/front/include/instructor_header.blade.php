<nav class="navbar navbar-expand-xl navbar-light flex-wrap h-100 pb-0 pt-0 mb-3">
    <div class="maz__dashboard-content">
        <span class="text-white fw-bold font-title">Instructor Dashboard</span>
        <button class="navbar-toggler border-0 ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#left-sidebar-instructor" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="nav-dashboard-icon fas fa-bars fs-4 text-white"></span>
        </button>
    </div>
    <div class="offcanvas offcanvas-start maz__offcanvas h-100" id="left-sidebar-instructor">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Instructor Dashboard</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body h-100 p-0">
            <ul class="list-group list-inline maz__dashboard-header" id="menu">
                <li>
                    <a href="{{ route('instructor_dashboard') }}" class="list-group-item list-group-item-action  {{ isActiveRoute(['instructor_dashboard']) }}">
                        <i class="fas fa-tachometer-alt"></i> <span class="ms-2">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('instructor_profile', Auth::guard('instructor')->user()->id) }}" class="list-group-item list-group-item-action  {{ isActiveRoute(['instructor_profile', 'instructor_profile_edit']) }}">
                        <i class="fas fa-user-alt" aria-hidden="true"></i> <span class="ms-2">My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('instructor_changepassword', Auth::guard('instructor')->user()->id) }}" class="list-group-item list-group-item-action  {{ isActiveRoute(['instructor_changepassword']) }}">
                        <i class="fas fa-eye" aria-hidden="true"></i><span class="ms-2">Change Password</span>
                    </a>
                </li>
               {{-- <li>
                    <a href="{{ route('instructor_profile_course') }}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_profile_course', 'instructor_add_course', 'instructor_course_details', 'instructor_add_course_lession']) }}">
                        <i class="fas fa-rocket" aria-hidden="true"></i><span class="ms-2">My Courses</span>
                    </a>
                </li>--}}
                <li>
                    <a href="{{ route('instructor_biography')}}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_biography', 'instructor_add_biography','editBiographyVideo']) }}">
                        <i class="fas fa-video" aria-hidden="true"></i><span class="ms-2">Biography Video</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('instructor_demonstration')}}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_demonstration', 'instructor_add_demonstration','editDemonstrationVideo']) }}">
                        <i class="fas fa-video" aria-hidden="true"></i><span class="ms-2">Demonstrations Video</span>
                    </a>
                </li>
                {{--<li>
                    <a href="{{ route('instructor_recommended')}}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_recommended', 'instructor_add_recommended']) }}">
                        <i class="fas fa-video" aria-hidden="true"></i><span class="ms-2">Recommended Video</span>
                    </a>
                </li>--}}
                <li>
                    <a href="{{ route('instructor_videos')}}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_videos', 'instructor_add_videos']) }}">
                        <i class="fas fa-video" aria-hidden="true"></i><span class="ms-2">Teaching Video</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('instructor_classes')}}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_classes', 'instructor_add_classes']) }}">
                        <i class="fas fa-video" aria-hidden="true"></i><span class="ms-2">Add Classes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('instructor_announcement')}}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_announcement', 'instructor_add_announcement']) }}">
                        <i class="fas fa-bullhorn" aria-hidden="true"></i><span class="ms-2">Announcement</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="{{ route('instructor_announcement')}}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_announcement', 'instructor_add_announcement']) }}">
                        <i class="fas fa-bullhorn" aria-hidden="true"></i><span class="ms-2">Announcement</span>
                    </a>
                </li> -->
                <li>
                    <a href="{{ route('instructor_reviews', Auth::guard('instructor')->user()->id) }}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_reviews']) }}">
                        <i class="fas fa-star" aria-hidden="true"></i><span class="ms-2">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('instructor_profile_grade', Auth::guard('instructor')->user()->id) }}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_profile_grade']) }}">
                        <i class="fas fa-file" aria-hidden="true"></i><span class="ms-2">Belt Test Grades(7)</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('instructor_profile_questions', Auth::guard('instructor')->user()->id) }}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_profile_questions', 'instructor_profile_add_questions']) }}">
                        <i class="fas fa-question-circle" aria-hidden="true"></i><span class="ms-2">Question & Answer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('instructor_settings') }}" class="list-group-item list-group-item-action {{ isActiveRoute(['instructor_settings']) }}">
                        <i class="fas fa-cog" aria-hidden="true"></i><span class="ms-2">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="javscript:void(0)" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#logoutPopupInstructor"><i class="fas fa-sign-out-alt"></i> <span class="ms-2">Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal fade" id="logoutPopupInstructor" tabindex="-1" aria-labelledby="logoutPopupInstructorLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"> 
      <div class="modal-body text-center">
      <div class="text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
        <div class="body-content my-5">
       <h4> Do you really want to logout?</h4>
        </div>
      <div class="button-groups mb-5">
      <a href="{{ route('instructor_logout') }}" class="btn btn-secondary dashboard_btn_sm text-uppercase me-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Continue</a>
        <form id="logout-form" action="{{ route('instructor_logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <a href="javscript:void(0)" class="btn btn-primary dashboard_btn_sm dashboard_btn_danger text-uppercase" data-bs-dismiss="modal">Cancel</a>
      </div>
      </div> 
    </div>
  </div>
</div>