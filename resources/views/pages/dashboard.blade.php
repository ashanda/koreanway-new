@extends('layouts.app')

@section('content')

@if (Auth::guard('admin')->check())
<div class="dash_sec">
        <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-people-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Students</p>
                                                        <h3 class="text-white">1</h3>
                                                        <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2 mt-sm-0">
                        <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-microsoft-teams"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Teachers</p>
                                                        <h3 class="text-white">2</h3>
                                                        <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2 mt-lg-0">
                        <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-mortarboard-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Grades</p>
                                                        <h3 class="text-white">3</h3>
                                                        <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-book-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Subjects</p>
                                                        <h3 class="text-white">4</h3>
                                                        <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-file-play-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Video Lessons</p>
                                                        <h3 class="text-white">5</h3>
                                                        <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-journal-bookmark-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total class Schedules</p>
                                                        <h3 class="text-white">6</h3>
                                                        <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-credit-card-2-back-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Payments</p>
                                                        <h3 class="text-white">7</h3>
                                                        <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-person-fill-lock"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Admin Users</p>
                                                        <h3 class="text-white">8</h3>
                                                        <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2">
                        <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-cash"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Total Revenue</p>
                                                        <h3 class="text-white">9</h3>
                                                        <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <p class="h4 my-3 fw-bold">Grade Wise Total Student Couting</p>

        <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-people-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Korean Course</p>
                                                        <h3 class="text-white">Total Students - [123]</h3>
                                                        <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mt-2 mt-sm-0">
                        <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="icon">
                                                                <i class="bi bi-people-fill"></i>
                                                        </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-lg-8 col-xl-9">
                                                        <p class="mb-0 text-white">Other Course</p>
                                                        <h3 class="text-white">Total Students - [456]</h3>
                                                        <div class="progress">
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

Student Dashboard

@endif


@endsection