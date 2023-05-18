<!-- Left Sidebar Start -->
<nav class="vertical_nav">
    <div class="left_section menu_left" id="js-menu">
        <div class="left_section">
            <ul>
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
                    <a href="online_class.php" class="menu--link"> <i class='uil uil-plus-circle menu--icon'></i> <span class="menu--label">Paid Live Classes</span> </a>
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


                <li class="menu--item">Main Menu</li>
                <li class="menu--item"><a href="home.php" class="menu--link" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a class="ai-icon" href="admin.php" class="menu--link" aria-expanded="false">
                        <i class="la la-user-secret"></i>
                        <span class="nav-text">Admin</span>
                    </a>'
                </li>
                <li class="menu--item"><a class="has-arrow" class="menu--link" href="javascript:void()" aria-expanded="false">
                        <i class="la la-th-list"></i>
                        <span class="nav-text">Filters</span>
                    </a>
                    <ul aria-expanded="false">
                        <li class="menu--item">
                            <a href="{{ route('batch.index') }}">Batch</a>
                        </li>
                        <li class="menu--item">
                            <a href="{{ route('course.index') }}">Course</a>
                        </li>
                    </ul>
                </li>

                <li class="menu--item"><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-users"></i>
                        <span class="nav-text">Students</span>
                    </a>
                    <ul aria-expanded="false">
                        <li class="menu--item">
                            <a href="students.php" aria-expanded="false">
                                <i class="la la-users"></i>
                                <span class="nav-text">Students</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="student_grade.php" aria-expanded="false">
                                <i class="la la-users"></i>
                                <span class="nav-text">Grade wise Students</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="student_import.php" aria-expanded="false">
                                <i class="la la-users"></i>
                                <span class="nav-text">Student Import</span>
                            </a>

            
            </li>
        </ul>
    </li>
    <li class="menu--item">
    <a href="attendence.php" aria-expanded="false">
            <i class="la la-file-text"></i>
            <span class="nav-text">Students Attendence</span>
        </a>
    </li>
    <li class="menu--item">	
    <a href="teachers.php" aria-expanded="false">
            <i class="la la-black-tie"></i>
            <span class="nav-text">Teachers</span>
        </a>
    </li>
    <li class="menu--item">
    <a href="{{ route('lesson.index') }}" aria-expanded="false">
            <i class="la la-slideshare"></i>
            <span class="nav-text">Class Schedule</span>
          </a>
    </li>
    <li class="menu--item">
    <a href="class_tute.php" aria-expanded="false">
            <i class="la la-book"></i>
            <span class="nav-text">Class Tute</span>
          </a>
    </li>
    
    <li class="menu--item">
   <a href="video_lessons.php" aria-expanded="false">
            <i class="la la-play-circle-o"></i>
            <span class="nav-text">Video Lessons</span>
        </a>
    </li>
    <li class="menu--item"><a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="la la-money"></i>
            <span class="nav-text">Payments</span>
        </a>
        <ul aria-expanded="false">
            <li class="menu--item"><a href="manual_payments.php">Manual Payments</a></li>
            <li class="menu--item"><a href="bank_payaments.php">Pending - Bank Payments</a></li>
            <li class="menu--item"><a href="paid_bank_payaments.php">Paid - Bank Payments</a></li>
            <li class="menu--item"><a href="reject_bank_payaments.php">Reject - Bank Payments</a></li>
            <li class="menu--item"><a href="online_payments.php">Online Payments</a></li>
            <li class="menu--item"><a href="teacher_payment.php">Teacher Payment</a></li>
            <li class="menu--item"><a href="payment_report.php">Payment Report</a></li>
        </ul>
    </li>
    <li class="menu--item"><a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="la la-leanpub"></i>
            <span class="nav-text">Mcq Exams</span>
        </a>
        <ul aria-expanded="false">
            <li class="menu--item"><a href="exam.php">Exam Details</a></li>
            <li class="menu--item"><a href="exam_results.php">Exam Results</a></li>
        </ul>
    </li>
    <li class="menu--item"><a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="la la-leanpub"></i>
            <span class="nav-text">Online Paper Exams</span>
        </a>
        <ul aria-expanded="false">
            <li class="menu--item"><a href="online_exams.php">Add Online Exams</a></li>
            <li class="menu--item"><a href="submissions.php">Student Submitted</a></li>
        </ul>
    </li>
    <li class="menu--item"><a href="reviews.php" aria-expanded="false">
            <i class="la la-comments-o"></i>
            <span class="nav-text">Reviews</span>
        </a>
    </li>
    <li class="menu--item"><a href="gallery.php" aria-expanded="false">
            <i class="la la-camera-retro"></i>
            <span class="nav-text">Gallery</span>
        </a>
    </li>
    <li class="menu--item">
    <a href="sms.php" aria-expanded="false">
            <i class="la la-envelope-o"></i>
            <span class="nav-text">SMS</span>
         </a>
    </li>
    <li class="menu--item">
    <a href="getway.php" aria-expanded="false">
            <i class="la la-university"></i>
            <span class="nav-text">Payment Getway Settings</span>
         </a>
    </li>
    <li class="menu--item">
   <a href="settings.php" aria-expanded="false">
         <i class="la la-cog"></i>
         <span class="nav-text">Settings</span>
      </a>
    </li>


                @elseif(Auth::guard('teacher')->check())

                <li class="menu--item">Main Menu</li>
                <li class="menu--item"><a href="home.php" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="class_schedule.php" aria-expanded="false">
                        <i class="la la-slideshare"></i>
                        <span class="nav-text">Class Schedule</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="class_tute.php" aria-expanded="false">
                        <i class="la la-book"></i>
                        <span class="nav-text">Class Tute</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="video_lessons.php" aria-expanded="false">
                        <i class="la la-play-circle-o"></i>
                        <span class="nav-text">Video Lessons</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="attendence.php" aria-expanded="false">
                        <i class="la la-file-text"></i>
                        <span class="nav-text">Students Attendence</span>
                    </a>

                </li>
                <li class="menu--item"><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-leanpub"></i>
                        <span class="nav-text">Mcq Exams</span>
                    </a>
                    <ul aria-expanded="false">
                        <li class="menu--item"><a href="exam.php">Exam Details</a></li>
                        <li class="menu--item"><a href="exam_results.php">Exam Results</a></li>
                    </ul>
                </li>
                <li class="menu--item"><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-money"></i>
                        <span class="nav-text">Payments</span>
                    </a>
                    <ul aria-expanded="false">
                        <li class="menu--item"><a href="payment_list.php?type=Manual">Manual Payments</a></li>
                        <li class="menu--item"><a href="payment_list.php?type=Bank">Bank Payments</a></li>
                        <li class="menu--item"><a href="payment_list.php?type=Card">Online Payments</a></li>
                    </ul>
                </li>


                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- Left Sidebar End -->