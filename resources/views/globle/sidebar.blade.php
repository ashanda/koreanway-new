<!-- Left Sidebar Start -->
<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-5 d-none d-sm-inline">Menu</span>
    </a>
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        @if (Auth::guard('student')->check())


        <li class="menu--item">
            <a href="student_profile.php" class="menu--link"> <i class='uil uil-book-alt menu--icon'></i> <span class="menu--label">Main Menu</span> </a>
        </li>
        <li class="menu--item">
            <a href="edit_profile.php" class="menu--link"> <i class='uil uil-analysis menu--icon'></i> <span class="menu--label">Edit My Profile</span> </a>
        </li>

        <div class="line_section">
        </div>
        <li class="menu--item">
            <a href="free_class.php" class="menu--link"> <i class='uil uil-award menu--icon'></i> <span class="menu--label">Free Live Classes</span> </a>
        </li>
        <li class="menu--item">
            <a href="free_class_tutes.php" class="menu--link"> <i class='uil uil-star menu--icon'></i> <span class="menu--label">Download Free Class
                    Tutes</span> </a>
        </li>
        <li class="menu--item">
            <a href="exam_list.php?type=0" class="menu--link"> <i class='uil uil-star menu--icon'></i> <span class="menu--label">Free Exams</span> </a>
        </li>


        <div class="line_section">
        </div>

        <li class="menu--item">
            <a href="{{ route('lesson', ['lessontype' => 'paid-online']) }}" class="menu--link"> <i class='bi-house menu--icon'></i> <span class="menu--label">Paid Live Classes</span> </a>
        </li>
        <li class="menu--item">
            <a href="online_class_tutes.php" class="menu--link"> <i class='uil uil-comments menu--icon'></i> <span class="menu--label">Download Paid Class
                    Tutes</span> </a>
        </li>
        <li class="menu--item">
            <a href="paper_class.php" class="menu--link"> <i class='uil uil-bell menu--icon'></i> <span class="menu--label">Paid Paper Classes</span> </a>
        </li>
        <li class="menu--item">
            <a href="paper_class_tutes.php" class="menu--link"> <i class='uil uil-bell menu--icon'></i> <span class="menu--label">Download Paid Paper Class Tutes</span> </a>
        </li>
        <li class="menu--item">
            <a href="exam_list.php?type=1" class="menu--link"> <i class='uil uil-star menu--icon'></i> <span class="menu--label">Paid Exams</span> </a>
        </li>
        <div class="line_section">
        </div>

        <li class="menu--item">
            <a href="paid_lesson.php" class="menu--link"> <i class='uil uil-award menu--icon'></i> <span class="menu--label">This Month's Recordings</span> </a>
        </li>
        <li class="menu--item">
            <a href="old_video_lessons.php" class="menu--link"> <i class='uil uil-award menu--icon'></i> <span class="menu--label">All Previous Recordings</span> </a>
        </li>
        <li class="menu--item">
            <a href="free_lesson.php" class="menu--link"> <i class='uil uil-award menu--icon'></i> <span class="menu--label">Free Recorded Classes</span> </a>
        </li>

        <div class="line_section">
        </div>

        <li class="menu--item">
            <a href="paper_exam_list.php" class="menu--link"> <i class='uil uil-star menu--icon'></i> <span class="menu--label">Paper Exams</span> </a>
        </li>
        <div class="line_section">
        </div>
        <li class="menu--item">
            <a href="reviews.php" class="menu--link"> <i class='uil uil-star menu--icon'></i> <span class="menu--label">Rate Your Learning Experience</span> </a>
        </li>
        <div class="line_section">
        </div>

        <li class="menu--item">
            <a href="bank_payment.php" class="menu--link"> <i class='uil uil-dollar-sign menu--icon'></i> <span class="menu--label">Bank Payments History</span> </a>
        </li>
        <li class="menu--item">
            <a href="card_payment.php" class="menu--link"> <i class='uil uil-dollar-sign menu--icon'></i> <span class="menu--label">Card Payments History</span> </a>
        </li>
        <li class="menu--item">
            <a href="manual_payment.php" class="menu--link"> <i class='uil uil-dollar-sign menu--icon'></i> <span class="menu--label">Manual Payments History</span> </a>
        </li>
        <div class="line_section">
        </div>
        <li class="menu--item">
            <a href="../logout.php" class="menu--link"> <i class='uil uil-wallet menu--icon'></i> <span class="menu--label">Logout</span> </a>
        </li>


        @elseif(Auth::guard('admin')->check())

        <li>
            <a href="/" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
        </li>
        <li>
            <a href="/" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Admin</span> </a>
        </li>

        <li>
            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Filters</span> </a>
            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{ route('batch.index') }}" class="nav-link px-0"> <span class="d-none d-sm-inline"></span> Batches </a>
                </li>
                <li>
                    <a href="{{ route('course.index') }}" class="nav-link px-0"> <span class="d-none d-sm-inline"></span> Courses </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Students</span> </a>
        </li>
        <li>
            <a href="{{ route('teacher.index') }}" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Teachers</span> </a>
        </li>
        <li>
            <a href="#" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Class Schedule</span> </a>
        </li>
        <li>
            <a href="#" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Class Tute</span> </a>
        </li>
        <li>
            <a href="#" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Video Lessons</span> </a>
        </li>
        <li>
            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Payments</span></a>
            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="#" class="nav-link px-0">Manual <span class="d-none d-sm-inline">Payments </span></a>
                </li>
                <li>
                    <a href="#" class="nav-link px-0"> Pending <span class="d-none d-sm-inline"> Bank Payments </span></a>
                </li>
                <li>
                    <a href="#" class="nav-link px-0"> Paid <span class="d-none d-sm-inline"> Bank Payments </span></a>
                </li>
                <li>
                    <a href="#" class="nav-link px-0"> Reject <span class="d-none d-sm-inline">Bank Payments </span></a>
                </li>
                <li>
                    <a href="#" class="nav-link px-0"> Online <span class="d-none d-sm-inline">Payments </span></a>
                </li>
                <li>
                    <a href="#" class="nav-link px-0"> Teacher <span class="d-none d-sm-inline">Payments </span></a>
                </li>
                <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Payments </span> Report</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Mcq Exams</span> </a>
            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Exam </span> Details</a>
                </li>
                <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Exam </span> Results</a>
                </li>
                
            </ul>
        </li>
        <li>
            <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Online Paper Exams</span> </a>
            <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"> Add Online </span> Exams </a>
                </li>
                <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"> Student </span> Submitted </a>
                </li>
                
            </ul>
        </li>
        <li>
            <a href="#" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Reviews</span> </a>
        </li>
        <li>
            <a href="#" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Gallery</span> </a>
        </li>
        <li>
            <a href="#" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">SMS</span> </a>
        </li>
        <li>
            <a href="#" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Payment Getway Settings</span> </a>
        </li>
        <li>
            <a href="#" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Settings</span> </a>
        </li>


        @elseif(Auth::guard('teacher')->check())

        <li class="menu--item">
            <a href="/" class="menu--link"> <i class='bi-house menu--icon'></i> <span class="menu--label">Dashboard</span> </a>
        </li>
        <li class="menu--item">
            <a href="{{ route('teacher.index') }}" class="menu--link"> <i class='bi-house menu--icon'></i> <span class="menu--label">Teachers</span> </a>
        </li>
        <li class="menu--item">
            <a href="javascript:void()" class="menu--link"> <i class='bi-house menu--icon'></i> <span class="menu--label">Filters</span>
            </a>
            <ul>
                <li class="menu--item">
                    <a href="{{ route('batch.index') }}" class="menu--link"> <i class='bi-house menu--icon'></i> <span class="menu--label">Batches</span> </a>
                </li>
                <li class="menu--item">
                    <a href="{{ route('course.index') }}" class="menu--link"> <i class='bi-house menu--icon'></i> <span class="menu--label">Courses</span> </a>
                </li>
            </ul>
        </li>
        <li class="menu--item">
            <a href="{{ route('lmsclass.index') }}" class="menu--link"> <i class='bi-house menu--icon'></i> <span class="menu--label">Class</span> </a>
        </li>

        @endif
    </ul>
</div>

<!-- Left Sidebar End -->