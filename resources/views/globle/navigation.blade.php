<!-- Header Start -->
<header class="header clearfix">

    <div class="main_logo" id="logo">
        @if(Auth::guard('student')->check())
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
        <a href="{{ route('dashboard') }}">
            <img class="logo-inverse" src="{{ asset('images/ct_logo.png') }}" alt="">
        </a>
        
        @elseif(Auth::guard('teacher')->check())
        <a href="{{ route('teacher_dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
        <a href="{{ route('teacher_dashboard') }}">
            <img class="logo-inverse" src="{{ asset('images/ct_logo.png') }}" alt="">
        </a>
                
        @elseif(Auth::guard('admin')->check())
        <a href="{{ route('admin_dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
        <a href="{{ route('admin_dashboard') }}">
            <img class="logo-inverse" src="{{ asset('images/ct_logo.png') }}" alt="">
        </a>
                
        @endif
       
    </div>
    <div class="header_right">
        <ul class="nav">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-fluid user_icon" src="{{ asset('images/hd_dp.jpg') }}">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                    <li class="nav-item dropdown-item">
                        @if(Auth::guard('student')->check())
                        <a href="{{ route('dashboard') }}">Go Home Page</a>
                        @elseif(Auth::guard('teacher')->check())
                        <a href="{{ route('teacher_dashboard') }}">Go Home Page</a>
                        @elseif(Auth::guard('admin')->check())
                        <a href="{{ route('admin_dashboard') }}">Go Home Page</a>
                        @endif
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