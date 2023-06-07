<!-- Left Sidebar Start -->

<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-3 text-white min-vh-100">
    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-5 d-none d-sm-inline fw-bold">Main Menu</span>
    </a>
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
        @if (Auth::guard('student')->check())
        <li>
            <a href="{{ route('dashboard') }}" class="nav-link px-0 align-middle"> <i class="fs-4 bi bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
        </li>
        <li>
            <a href="{{ route('smart-class-room') }}" class="nav-link px-0 align-middle"> <i class="fs-4 bi bi-book"></i> <span class="ms-1 d-none d-sm-inline">Smart Class Room</span> </a>
        </li>
        <li>
            <a href="{{ route('profile') }}" class="nav-link px-0 align-middle"> <i class="fs-4 bi bi-person"></i> <span class="ms-1 d-none d-sm-inline">Profile</span> </a>
        </li>
        <li>
            <a href="{{ route('investment') }}" class="nav-link px-0 align-middle"> <i class="fs-4 bi bi-cash-coin"></i> <span class="ms-1 d-none d-sm-inline">Investment</span> </a>
        </li>


        <!-- <li>
            <a href="student_profile.php" class="nav-link px-0 align-middle"> <i class='uil uil-book-alt menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Main Menu</span> </a>
        </li>
        <li>
            <a href="edit_profile.php" class="nav-link px-0 align-middle"> <i class='uil uil-analysis menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Edit My Profile</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'free-live-today']) }}" class="nav-link px-0 align-middle"> <i class='uil uil-award menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Today Free Live Classes</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'free-live-next-day']) }}" class="nav-link px-0 align-middle"> <i class='uil uil-award menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Next Month's Free Live Classes</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'free-paper-this-month']) }}" class="nav-link px-0 align-middle"> <i class='uil uil-star menu--icon'></i> <span class="ms-1 d-none d-sm-inline">This Month's Free Class
                    Paper</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'free-paper-previous-month']) }}" class="nav-link px-0 align-middle"> <i class='uil uil-star menu--icon'></i> <span class="ms-1 d-none d-sm-inline">All Previous Free Class
                    Paper</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'free-video-this-month']) }}" class="nav-link px-0 align-middle"> <i class='uil uil-award menu--icon'></i> <span class="ms-1 d-none d-sm-inline">This Month's Free Recorded Classes</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'free-video-previous-month']) }}" class="nav-link px-0 align-middle"> <i class='uil uil-award menu--icon'></i> <span class="ms-1 d-none d-sm-inline">All Previous Free Recorded Classes</span> </a>
        </li>
        <li>
            <a href="exam_list.php?type=0" class="nav-link px-0 align-middle"> <i class='uil uil-star menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Free Exams</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'paid-live-today']) }}" class="nav-link px-0 align-middle"> <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Today Paid Live Classes</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'paid-live-next-day']) }}" class="nav-link px-0 align-middle"> <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Next Month's Paid Live Classes</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'paid-paper-this-month']) }}" class="nav-link px-0 align-middle"> <i class='uil uil-bell menu--icon'></i> <span class="ms-1 d-none d-sm-inline">This Month's Paid Paper Classes</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'paid-paper-previous-month']) }}" class="nav-link px-0 align-middle"> <i class='uil uil-bell menu--icon'></i> <span class="ms-1 d-none d-sm-inline">All Previous Paid Paper Classes</span> </a>
        </li>
        <li>
            <a href="exam_list.php?type=1" class="nav-link px-0 align-middle"> <i class='uil uil-star menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Paid Exams</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'paid-video-this-month']) }}" class="nav-link px-0 align-middle"> <i class='uil uil-award menu--icon'></i> <span class="ms-1 d-none d-sm-inline">This Month's Recordings</span> </a>
        </li>
        <li>
            <a href="{{ route('lesson', ['lessontype' => 'paid-video-previous-month']) }}" class="nav-link px-0 align-middle"> <i class='uil uil-award menu--icon'></i> <span class="ms-1 d-none d-sm-inline">All Previous Recordings</span> </a>
        </li>
        <li>
            <a href="paper_exam_list.php" class="nav-link px-0 align-middle"> <i class='uil uil-star menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Paper Exams</span> </a>
        </li>
        <li>
            <a href="reviews.php" class="nav-link px-0 align-middle"> <i class='uil uil-star menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Rate Your Learning Experience</span> </a>
        </li>
        <li>
            <a href="bank_payment.php" class="nav-link px-0 align-middle"> <i class='uil uil-dollar-sign menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Bank Payments History</span> </a>
        </li>
        <li>
            <a href="card_payment.php" class="nav-link px-0 align-middle"> <i class='uil uil-dollar-sign menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Card Payments History</span> </a>
        </li>
        <li>
            <a href="manual_payment.php" class="nav-link px-0 align-middle"> <i class='uil uil-dollar-sign menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Manual Payments History</span> </a>
        </li>
        <li>
            <a href="../logout.php" class="nav-link px-0 align-middle"> <i class='uil uil-wallet menu--icon'></i> <span class="ms-1 d-none d-sm-inline">Logout</span> </a>
        </li>
        <li>
            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle"> <i class="fs-4 bi bi-credit-card"></i> <span class="ms-1 d-none d-sm-inline">Payments</span>
            </a>
            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{ route('payment', ['paytype' => 'pending-bank-tranfer']) }}" class="nav-link px-0">Pending Bank<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'paid-bank-tranfer']) }}" class="nav-link px-0">Paid Bank<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'paid-manual-payments']) }}" class="nav-link px-0">Paid Manaul<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'paid-online-payments']) }}" class="nav-link px-0">Paid Online<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'reject-bank-tranfer']) }}" class="nav-link px-0">Reject Bank<span class="d-none d-sm-inline"></span> </a>
                </li>
            </ul>
        </li> -->

        @elseif(Auth::guard('admin')->check())


        <li>
            <a href="{{ route('admin_dashboard') }}" class="nav-link px-0 align-middle"> <i class="fs-4 bi bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
        </li>
        <li>
            <a href="{{ route('teacher.index') }}" class="nav-link px-0 align-middle"> <i class="fs-4 bi bi-microsoft-teams"></i> <span class="ms-1 d-none d-sm-inline">Teachers</span> </a>
        </li>

        <li>
            <a href="{{ route('messages.index') }}" class="nav-link px-0 align-middle"> <i class="fs-4 bi bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Notice</span> </a>
        </li>
        <li>
            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <i class="fs-4 bi bi-filter"></i> <span class="ms-1 d-none d-sm-inline">Filters</span> </a>
            <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{ route('batch.index') }}" class="nav-link px-0"> <span class="d-none d-sm-inline"></span> Batches </a>
                </li>
                <li>
                    <a href="{{ route('course.index') }}" class="nav-link px-0"> <span class="d-none d-sm-inline"></span> Courses </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <i class="fs-4 bi bi-book"></i> <span class="ms-1 d-none d-sm-inline">Lesson</span>
            </a>
            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{ route('lessons.index') }}" class="nav-link px-0">All<span class="d-none d-sm-inline"> Lessons</span> </a>
                </li>
                <li class="w-100">
                    <a href="{{ route('lessons.create') }}" class="nav-link px-0">Create<span class="d-none d-sm-inline"> Lesson</span> </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle"> <i class="fs-4 bi bi-credit-card"></i> <span class="ms-1 d-none d-sm-inline">Payments</span>
            </a>
            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{ route('payment', ['paytype' => 'pending-bank-tranfer']) }}" class="nav-link px-0">Pending Bank<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'paid-bank-tranfer']) }}" class="nav-link px-0">Paid Bank<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'paid-manual-payments']) }}" class="nav-link px-0">Paid Manaul<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'paid-online-payments']) }}" class="nav-link px-0">Paid Online<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'reject-bank-tranfer']) }}" class="nav-link px-0">Reject Bank<span class="d-none d-sm-inline"></span> </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <i class="fs-4 bi bi-book"></i> <span class="ms-1 d-none d-sm-inline">Exams</span>
            </a>
            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{ route('mcq-exams.index') }}" class="nav-link px-0">All<span class="d-none d-sm-inline"> MCQ</span> </a>
                </li>
                <li class="w-100">
                    <a href="{{ route('lessons.create') }}" class="nav-link px-0">All<span class="d-none d-sm-inline"> Paper</span> </a>
                </li>

            </ul>
        </li>
        <!-- <li>
                    <a href="attendence.php" aria-expanded="false">
                        <i class="la la-file-text"></i>
                        <span class="nav-text">Students Attendence</span>
                    </a>
                </li>
                <li>
                    <a href="teachers.php" aria-expanded="false">
                        <i class="la la-black-tie"></i>
                        <span class="nav-text">Teachers</span>
                    </a>
                </li>
                <li>
                    <a href="class_schedule.php" aria-expanded="false">
                        <i class="la la-slideshare"></i>
                        <span class="nav-text">Class Schedule</span>
                    </a>
                </li>
                <li>
                    <a href="class_tute.php" aria-expanded="false">
                        <i class="la la-book"></i>
                        <span class="nav-text">Class Tute</span>
                    </a>
                </li>

                <li>
                    <a href="video_lessons.php" aria-expanded="false">
                        <i class="la la-play-circle-o"></i>
                        <span class="nav-text">Video Lessons</span>
                    </a>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-money"></i>
                        <span class="nav-text">Payments</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="manual_payments.php">Manual Payments</a></li>
                        <li><a href="bank_payaments.php">Pending - Bank Payments</a></li>
                        <li><a href="paid_bank_payaments.php">Paid - Bank Payments</a></li>
                        <li><a href="reject_bank_payaments.php">Reject - Bank Payments</a></li>
                        <li><a href="online_payments.php">Online Payments</a></li>
                        <li><a href="teacher_payment.php">Teacher Payment</a></li>
                        <li><a href="payment_report.php">Payment Report</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-leanpub"></i>
                        <span class="nav-text">Mcq Exams</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="exam.php">Exam Details</a></li>
                        <li><a href="exam_results.php">Exam Results</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-leanpub"></i>
                        <span class="nav-text">Online Paper Exams</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="online_exams.php">Add Online Exams</a></li>
                        <li><a href="submissions.php">Student Submitted</a></li>
                    </ul>
                </li>
                <li><a href="reviews.php" aria-expanded="false">
                        <i class="la la-comments-o"></i>
                        <span class="nav-text">Reviews</span>
                    </a>
                </li>
                <li><a href="gallery.php" aria-expanded="false">
                        <i class="la la-camera-retro"></i>
                        <span class="nav-text">Gallery</span>
                    </a>
                </li>
                <li>
                    <a href="sms.php" aria-expanded="false">
                        <i class="la la-envelope-o"></i>
                        <span class="nav-text">SMS</span>
                    </a>
                </li>
                <li>
                    <a href="getway.php" aria-expanded="false">
                        <i class="la la-university"></i>
                        <span class="nav-text">Payment Getway Settings</span>
                    </a>
                </li>
                <li>
                    <a href="settings.php" aria-expanded="false">
                        <i class="la la-cog"></i>
                        <span class="nav-text">Settings</span>
                    </a>
                </li> -->


        @elseif(Auth::guard('teacher')->check())

        <li>
            <a href="{{ route('teacher_dashboard') }}" class="nav-link px-0 align-middle"> <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
        </li>

        <li>
            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <i class="fs-4 bi bi-book"></i> <span class="ms-1 d-none d-sm-inline">Lesson</span>
            </a>
            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{ route('lesson', ['lessontype' => 'free-live-today']) }}" class="nav-link px-0">Today Free Live<span class="d-none d-sm-inline"> Classes</span> </a>
                </li>
                <li>
                    <a href="{{ route('lesson', ['lessontype' => 'free-live-next-day']) }}" class="nav-link px-0">Next Month's Free Live<span class="d-none d-sm-inline"> Classes</span> </a>
                </li>
                <li>
                    <a href="{{ route('lesson', ['lessontype' => 'free-paper-this-month']) }}" class="nav-link px-0">Next Month's Free <span class="d-none d-sm-inline"> Class
                            Paper</span> </a>
                </li>
                <li>
                    <a href="{{ route('lesson', ['lessontype' => 'free-paper-previous-month']) }}" class="nav-link px-0">All Previous Free<span class="d-none d-sm-inline"> Class
                            Paper</span> </a>
                </li>
                <li>
                    <a href="{{ route('lesson', ['lessontype' => 'free-video-this-month']) }}" class="nav-link px-0">This Month's Free Recorded<span class="d-none d-sm-inline"> Classes</span> </a>
                </li>
                <li>
                    <a href="{{ route('lesson', ['lessontype' => 'free-video-previous-month']) }}" class="nav-link px-0">All Previous Free Recorded<span class="d-none d-sm-inline"> Classes</span> </a>
                </li>
                <li>
                    <a href="{{ route('lesson', ['lessontype' => 'paid-live-today']) }}" class="nav-link px-0">Today Paid Live<span class="d-none d-sm-inline"> Classes</span> </a>
                </li>
                <li>
                    <a href="{{ route('lesson', ['lessontype' => 'paid-live-next-day']) }}" class="nav-link px-0">Next Month's Paid Live<span class="d-none d-sm-inline"> Classes</span> </a>
                </li>
                <li>
                    <a href="{{ route('lesson', ['lessontype' => 'paid-paper-this-month']) }}" class="nav-link px-0">This Month's Paid Paper<span class="d-none d-sm-inline"> Classes</span> </a>
                </li>
                <li>
                    <a href="{{ route('lesson', ['lessontype' => 'paid-paper-previous-month']) }}" class="nav-link px-0">All Previous Paid Paper<span class="d-none d-sm-inline"> Classes</span> </a>
                </li>
                <li>
                    <a href="{{ route('lesson', ['lessontype' => 'paid-video-this-month']) }}" class="nav-link px-0">This Month's Recordings<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('lesson', ['lessontype' => 'paid-video-previous-month']) }}" class="nav-link px-0">All Previous Recordings<span class="d-none d-sm-inline"></span> </a>
                </li>
            </ul>
        <li>
            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle"> <i class="fs-4 bi bi-credit-card"></i> <span class="ms-1 d-none d-sm-inline">Payments</span>
            </a>
            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{ route('payment', ['paytype' => 'pending-bank-tranfer']) }}" class="nav-link px-0">Pending Bank<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'paid-bank-tranfer']) }}" class="nav-link px-0">Paid Bank<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'paid-manual-payments']) }}" class="nav-link px-0">Paid Manaul<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'paid-online-payments']) }}" class="nav-link px-0">Paid Online<span class="d-none d-sm-inline"></span> </a>
                </li>
                <li>
                    <a href="{{ route('payment', ['paytype' => 'reject-bank-tranfer']) }}" class="nav-link px-0">Reject Bank<span class="d-none d-sm-inline"></span> </a>
                </li>
            </ul>
        </li>

        </li>

        @endif
    </ul>
</div>


<!-- Left Sidebar End -->