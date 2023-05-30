@extends('layouts.app')

@section('content')

@if (Auth::guard('admin')->check())
<div class="dash_sec">
        <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="widget-stat card bg-main-col">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-people-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Students</p>
                                                        <h3 class="text-white">{{ getStudentcount() }}</h3>
                                                        <div class="progress mt-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2 mt-sm-0">
                        <div class="widget-stat card bg-main-col">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-microsoft-teams"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Teachers</p>
                                                        <h3 class="text-white">{{ getTeachercount() }}</h3>
                                                        <div class="progress mt-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2 mt-lg-0">
                        <div class="widget-stat card bg-main-col">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-mortarboard-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Courses</p>
                                                        <h3 class="text-white">{{ getCoursecount() }}</h3>
                                                        <div class="progress mt-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-main-col">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-book-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Class Team</p>
                                                        <h3 class="text-white">{{ getBatchcount() }}</h3>
                                                        <div class="progress mt-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-main-col">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-file-play-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Video Lessons</p>
                                                        <h3 class="text-white">{{ getVideoLessoncount() }}</h3>
                                                        <div class="progress mt-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-main-col">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-journal-bookmark-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total live Lessons</p>
                                                        <h3 class="text-white">{{ getLiveLessoncount() }}</h3>
                                                        <div class="progress mt-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-main-col">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-credit-card-2-back-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Payments</p>
                                                        <h3 class="text-white">{{ getTotalpayment() }}</h3>
                                                        <div class="progress mt-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-main-col">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-person-fill-lock"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Admin Users</p>
                                                        <h3 class="text-white">{{ getAdmincount() }}</h3>
                                                        <div class="progress mt-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-main-col">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-cash"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Revenue current Month</p>
                                                        <h3 class="text-white">Rs {{ thisMonthEarn() }}</h3>
                                                        <div class="progress mt-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <p class="h4 my-3 fw-bold">Class Team Wise Total Student Couting</p>

        <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="widget-stat card bg-main-col">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-people-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Course 1</p>
                                                        <h3 class="text-white">Total Students - [123]</h3>
                                                        <div class="progress mt-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2 mt-sm-0">
                        <div class="widget-stat card bg-main-col">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-people-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Course 2</p>
                                                        <h3 class="text-white">Total Students - [456]</h3>
                                                        <div class="progress mt-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>


@elseif(Auth::guard('teacher')->check())

Teacher Dashboard

@elseif (Auth::guard('student')->check())

<!-- Ui section -->

<div id="carouselExampleCaptions" class="carousel slide mb-2" data-bs-ride="carousel">
        <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('{{ asset('images/student/slide1.jpg')}}');">
                        <div class="carousel-caption">
                                <p class="h2 text-white">Special Notice</p>
                                <p class="h4 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                </div>
                <div class="carousel-item" style="background-image: url('{{ asset('images/student/slide2.jpg')}}');">
                        <div class="carousel-caption">
                                <p class="h2 text-white">Special Notice</p>
                                <p class="h4 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                </div>
                <div class="carousel-item" style="background-image: url('{{ asset('images/student/slide3.jpg')}}');">
                        <div class="carousel-caption">
                                <p class="h2 text-white">Special Notice</p>
                                <p class="h4 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
        </button>
</div>

<div class="row">
        <div class="col-sm-12">
                <div class="sm_cl mb-2" style="background-image: url('{{ asset('images/student/ai.jpg')}}');">
                        <a href="{{ route('smart-class-room') }}">
                                <div class="ban_cap text-center">
                                        <p class="h1">SMART CLASS ROOM</p>
                                </div>
                        </a>
                </div>
        </div>
        <div class="col-md-6">
                <div class="id_card px-2" style="background-image: url('{{ asset('images/student/id_back.jpg')}}');">
                        <div class="row">
                                <div class="col-4">
                                        <div class="text-center">
                                                <a class="text-decoration-none" href="{{ route('profile') }}">
                                                        <p class="h2 id_title">ID REPORT</p>
                                                </a>
                                                <img class="w-100 user_img" src="{{ asset('images/student/user.png')}}" alt="">
                                                <p class="h5 id_date text-dark mb-0">registered user</p>
                                                <p class="h4 id_crtext">korean course</p>
                                        </div>
                                </div>
                                <div class="col-8">
                                        <div class="text-end">
                                                <p class="h4 text-dark text-uppercase">class team 10</p>
                                                <p class="h5 fw-bold text-dark text-uppercase">reg | kw.65789</p>
                                        </div>
                                        <div class="per_data px-2">
                                                <p>Name: Madush Jayasekara</p>
                                                <p>Contact: 0776000878 (User Name)</p>
                                                <p>Address: 27/Gampaha</p>
                                                <p>Gmail: dilshan@gmail.com</p>
                                                <p>Watsapp: </p>
                                                <p>2 nd Mobile:</p>
                                        </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-1">
                                        <div class="ver_text">
                                                <p class="h3">11111</p>
                                        </div>
                                </div>
                                <div class="col-11">
                                        <div class="table_sec">
                                                <p class="h4 text-danger text-uppercase">Education investment plan A/B/C</p>
                                                <table class="table table-bordered">
                                                        <thead>
                                                                <tr>
                                                                        <th rowspan="2">AMOUNT</th>
                                                                        <th rowspan="2">STATUS</th>
                                                                        <th colspan="2">Valid Period</th>
                                                                </tr>
                                                                <tr>
                                                                        <th>From</th>
                                                                        <th>To</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <th>1</th>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                        <td>@mdo</td>
                                                                </tr>
                                                                <tr>
                                                                        <th>2</th>
                                                                        <td>Jacob</td>
                                                                        <td>Thornton</td>
                                                                        <td>@fat</td>
                                                                </tr>
                                                                <tr>
                                                                        <th>3</th>
                                                                        <td>Larry the Bird</td>
                                                                        <td>@twitter</td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                        </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-5">
                                        <div class="text-center">
                                                <a href="" class="btn btn-danger">Edit Profile</a>
                                        </div>
                                </div>
                                <div class="col-7">
                                        <div class="text-center">
                                                <a href="" class="btn btn-secondry"></a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <div class="col-md-6">
                Investment Zone
        </div>
</div>
<!-- Ui section -->

@endif


@endsection