<!-- Header Start -->
<header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu"> <i class='uil uil-bars'></i> </button>
    <button id="collapse_menu" class="collapse_menu"> <i class="uil uil-bars collapse_menu--icon "></i> <span class="collapse_menu--label"></span> </button>
    <div class="main_logo" id="logo">
        <a href="/profile/student_profile.php"><img src="{{ asset('images/logo.png')}}" alt=""></a>
        <a href="/profile/student_profile.php"><img class="logo-inverse" src="images/ct_logo.png" alt=""></a>
    </div>
    <div class="header_right">
        <ul>
        
            <li class="ui dropdown">
                <a href="#" class="opts_account" title="Account"> 
                <img src="{{ asset('images/hd_dp.jpg')}}" style="object-fit: cover;">
                </a>
                <div class="menu dropdown_account">
                    <div class="channel_my">
                        <div class="profile_link"> <img src="{{ asset('images/hd_dp.jpg')}}" style="object-fit: cover;">
                            <div class="pd_content">
                                <div class="rhte85">
                                    <h6></h6>
                                    <div class="mef78" title="Verify"> <i class='uil uil-check-circle'></i> </div>
                                </div>
                                <span></span>
                            </div>
                        </div> <a href="../index.php" class="dp_link_12">Go Home Page</a> </div>
                    <div class="night_mode_switch__btn">
                        <a href="#" id="night-mode" class="btn-night-mode"> <i class="uil uil-moon"></i> Night mode <span class="btn-night-mode-switch">
                        <span class="uk-switch-button"></span></span>
                        </a>
                    </div> 
                    @if(Auth::guard('student')->check())
                        <a href="{{ route('student_logout') }}" class="item channel_item">Logout</a>
                    @elseif(Auth::guard('teacher')->check())
                        <a href="{{ route('teacher_logout') }}" class="item channel_item">Logout</a>
                    @elseif(Auth::guard('admin')->check())
                        <a href="{{ route('admin_logout') }}" class="item channel_item">Logout</a>
                    @endif
                 </div>
            </li>

        </ul>
    </div>
</header>
<!-- Header End