<nav class="navbar navbar-expand-xl navbar-light flex-wrap h-100 pb-0">
    <div class="maz__dashboard-content">
        <span class="text-white fw-bold font-title">Student Dashboard</span>
        <button class="navbar-toggler border-0 ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#left-sidebar-student" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="nav-dashboard-icon fas fa-bars fs-4 text-white"></span>
        </button>
    </div>
    <div class="offcanvas offcanvas-start maz__offcanvas h-100" id="left-sidebar-student">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Student Dashboard</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body  h-100 p-0">
            <ul class="list-group list-inline maz__dashboard-header" id="menu">
                {{-- <li>
                    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ isActiveRoute(['dashboard']) }}">
                        <i class="fas fa-tachometer-alt"></i><span class="ms-2">Dashboard</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('student_profile') }}" class="list-group-item list-group-item-action {{ isActiveRoute(['student_profile', 'student_profile_edit']) }}">
                        <i class="fas fa-user-alt" aria-hidden="true"></i><span class="ms-2">My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_subscription_manage') }}" class="list-group-item list-group-item-action {{ isActiveRoute(['student_subscription_manage', 'student_subscription_manage_edit']) }}">
                        <i class="fas fa-user-alt" aria-hidden="true"></i><span class="ms-2">Subscription</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_changepassword') }}" class="list-group-item list-group-item-action {{ isActiveRoute(['student_changepassword']) }}">
                        <i class="fas fa-eye" aria-hidden="true"></i><span class="ms-2">Change Password</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('student_enroll', Auth::id()) }}" class="list-group-item list-group-item-action {{ isActiveRoute(['student_enroll', 'student_enroll']) }}">
                        <i class="fas fa-graduation-cap" aria-hidden="true"></i><span class="ms-2">Enrolled Cources</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_wishlist', Auth::id()) }}" class="list-group-item list-group-item-action {{ isActiveRoute(['student_wishlist', 'student_wishlist']) }}">
                        <i class="fas fa-bookmark" aria-hidden="true"></i><span class="ms-2">Whishlist</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_belt', Auth::id()) }}" class="list-group-item list-group-item-action {{ isActiveRoute(['student_belt', 'student_belt']) }}">
                        <i class="fas fa-file" aria-hidden="true"></i><span class="ms-2">My Belt Test</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_history', Auth::id()) }}" class="list-group-item list-group-item-action {{ isActiveRoute(['student_history', 'student_history']) }}">
                        <i class="fas fa-shopping-cart" aria-hidden="true"></i><span class="ms-2">Purchase History</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_settings', Auth::id()) }}" class="list-group-item list-group-item-action {{ isActiveRoute(['student_settings', 'student_settings']) }}">
                        <i class="fas fa-cog" aria-hidden="true"></i><span class="ms-2">Settings</span>
                    </a>
                </li> --}}
                <li>
                    <a class="list-group-item list-group-item-action" href="javscript:void(0)" data-bs-toggle="modal" data-bs-target="#logoutPopup"> <i class="fas fa-sign-out-alt"></i> <span class="ms-2">Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="logoutPopup" tabindex="-1" aria-labelledby="logoutPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="body-content my-5">
                    <h4> Do you really want to logout?</h4>
                </div>
                <div class="button-groups mb-5">
                    <a href="{{ route('logout') }}" class="btn btn-secondary dashboard_btn_sm text-uppercase me-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Continue</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a href="javscript:void(0)" class="btn btn-primary dashboard_btn_danger dashboard_btn_sm text-uppercase" data-bs-dismiss="modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>