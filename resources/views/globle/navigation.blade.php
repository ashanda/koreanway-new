<!-- Header Start -->
<header class="header clearfix">

    <div class="main_logo" id="logo">
        <a href="/profile/student_profile.php">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
        <a href="/profile/student_profile.php">
            <img class="logo-inverse" src="{{ asset('images/ct_logo.png') }}" alt="">
        </a>
    </div>
    <div class="header_right">
        <ul class="nav">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-fluid user_icon" src="{{ asset('images/hd_dp.jpg') }}">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                    <li class="nav-item dropdown-item">
                        <a href="../index.php">Go Home Page</a>
                    </li>
                    @if(Auth::guard('student')->check())
                    <li class="nav-item dropdown-item">
                        <a href="{{ route('student_logout') }}">Logout</a>
                    </li>
                    @elseif(Auth::guard('teacher')->check())
                    <li class="nav-item dropdown-item">
                        <a href="{{ route('teacher_logout') }}">Logout</a>
                    </li>
                    @elseif(Auth::guard('admin')->check())
                    <li class="nav-item dropdown-item">
                        <a href="{{ route('admin_logout') }}">Logout</a>
                    </li>
                    @endif
                </ul>
            </li>
           
        </ul>
    </div>
</header>
<!-- Header End -->