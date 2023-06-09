@extends('layouts.app')

@section('content')



@if (Auth::guard('student')->check())

<div class="row">
    <div class="col-lg-12">
        <h4 class="item_title">Paper Class</h4>
    </div>
    <div class="col-lg-12">
        <div class="widget-box bg-light mb-2">
            <form method="POST" action="{{ route('filter-lessons', ['lessontype' => $lessontype]) }}" data-np-autofill-type="other" data-np-checked="1" data-np-watching="1">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        From : <input name="s_month" type="date" class="form-control form-control-lg" id="s_month">
                    </div>
                    <div class="col-lg-3 col-md-3">
                        To : <input name="e_month" type="date" class="form-control form-control-lg" id="e_month">
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <br><button name="fil_bt" type="submit" class="btn btn-dark">Filter</button>
                    </div>
                </div>
        </div>
        <div class="col-md-12">
            <div class="_14d25">
                <div class="row">

                    @foreach ( $lessons as $lesson)
                    <div class="col-lg-3 col-md-4">
                        <div class="fcrse_1 mt-30">
                            <a href="#" class="fcrse_img">
                                <img src="{{ asset('/lesson/img/' . $lesson->image) }}" class="pro_pick2">
                                <div class="course-overlay">
                                    <div class="badge_seller"><i class="uil uil-star"></i> Sample Date </div>
                                    <div class="crse_reviews">
                                        <i class="fa fa-check-circle"></i> Sample Month
                                    </div>

                                    <div class="crse_timer">
                                        Sample Date </div>
                                </div>
                            </a>
                            <div class="fcrse_content">
                                <a href="#" class="crse14s">{{ $lesson->title }}</a>
                                <div class="vdtodt">
                                    <span class="vdt14 badge badge-primary" style="font-size:14px;">Start : 08:00:00 PM</span>
                                    <span class="vdt14 badge badge-primary" style="font-size:14px;">End : 10:00:00 PM</span>
                                </div>
                                <div class="auth1lnkprce">
                                    <p class="cr1fot">
                                    </p>
                                    <div class="user-status">
                                        <div class="user-avatar">
                                            <img src="../dashboard/images/teacher/1672646199Abhiman_Sir.jpg" class="pro_pick">
                                        </div>
                                        <p class="user-status-title"><span class="bold">{{ getTeacherData($lesson->teacher_id)->name }}</span></p>
                                        <p class="user-status-tag online">Teacher</p>
                                        <br>
                                        @if (StudentPaymentCheck() == null)
                                        <button onclick="openModel({{ $lesson->course_id }}, {{ $lesson->batch_id }},{{ $lesson->teacher_id }})" class="save_btn btn-block payment-here">Payment Here</button>
                                        @else
                                        @if (StudentPaymentCheck()->status == 1 && StudentPaymentCheck()->end_date >= now()->toDateString() && StudentPaymentCheck()->end_date >= $lesson->published_date)
                                        @php
                                        $encryptedLessontype = encrypt(['lessontype' => $lessontype]);
                                        $encryptedLessonid = encrypt(['id' => $lesson->id]);
                                        @endphp
                                        <a href="{{ route('single-lesson', ['lessontype' => $encryptedLessontype, 'id' => $encryptedLessonid]) }}" class="save_btn btn-block">Watch Lesson</a>
                                        @elseif (StudentPaymentCheck()->status == 2)
                                        <a href="student_profile.php" class="save_btn btn-block">Your Payment is Pending</a>
                                        @else
                                        <button onclick="openModel({{ $lesson->course_id }}, {{ $lesson->batch_id }},{{ $lesson->teacher_id }})" class="save_btn btn-block payment-here">Payment Here</button>
                                        @endif
                                        @endif

                                    </div>

                                    <div class="crse_timer">
                                        Sample Date </div>
                                </div>
                                </a>
                                <div class="fcrse_content">
                                    <a href="#" class="crse14s">{{ $lesson->title }}</a>
                                    <div class="vdtodt">
                                        <span class="vdt14 badge badge-primary" style="font-size:14px;">Start : 08:00:00 PM</span>
                                        <span class="vdt14 badge badge-primary" style="font-size:14px;">End : 10:00:00 PM</span>
                                    </div>
                                    <div class="auth1lnkprce">
                                        <p class="cr1fot">
                                        </p>
                                        <div class="user-status">
                                            <div class="user-avatar">
                                                <img src="../dashboard/images/teacher/1672646199Abhiman_Sir.jpg" class="pro_pick">
                                            </div>
                                            <p class="user-status-title"><span class="bold">{{ getTeacherData($lesson->teacher_id)->name }}</span></p>
                                            <p class="user-status-tag online">Teacher</p>
                                            <br>
                                            @if (StudentPaymentCheck() == null)
                                            <button onclick="openModel({{ $lesson->course_id }}, {{ $lesson->batch_id }},{{ $lesson->teacher_id }})" class="save_btn btn-block payment-here">Payment Here</button>
                                            @else
                                            @if (StudentPaymentCheck()->status == 1 && StudentPaymentCheck()->end_date >= now()->toDateString() && StudentPaymentCheck()->end_date >= $lesson->published_date)
                                            @php
                                            $encryptedLessontype = encrypt(['lessontype' => $lessontype]);
                                            $encryptedLessonid = encrypt(['id' => $lesson->id]);
                                            @endphp
                                            <a href="{{ route('single-lesson', ['lessontype' => $encryptedLessontype, 'id' => $encryptedLessonid]) }}" class="save_btn btn-block">Watch Lesson</a>
                                            @elseif (StudentPaymentCheck()->status == 2)
                                            <a href="student_profile.php" class="save_btn btn-block">Your Payment is Pending</a>
                                            @else
                                            <button onclick="openModel({{ $lesson->course_id }}, {{ $lesson->batch_id }},{{ $lesson->teacher_id }})" class="save_btn btn-block payment-here">Payment Here</button>
                                            @endif
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

@else
<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3>Classes</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-lg btn-success" href="{{ route('lessons.create') }}"> Create New Class</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="table-responsive mt-2">
    <table id="dataTable" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>lesson Title</th>
                <th>Teacher</th>
                <th>Batch</th>
                <th>Course</th>
                <th>Lesson Image</th>
                <th>Publishing Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)

            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $lesson->lecture_title }}</td>
                <td>{{ getTeacherData($lesson->teacher_id)->name }}</td>
                <td>{{ getBatchData($lesson->batch_id)->name }}</td>
                <td>{{ getCourseData($lesson->course_id)->name }}</td>
                <td><img width="50" src="{{ asset('/lesson/img/' . $lesson->background_image) }}" alt="Class Image"></td>
                <td>{{ $lesson->published_date }}</td>

                <td>{{ $lesson->status }}</td>
                <td>
                    <form action="{{ route('lessons.destroy',$lesson->id) }}" method="POST">

                        <a class="btn btn-lg btn-info" href="{{ route('lessons.show',$lesson->id) }}">View</a>

                        <a class="btn btn-lg btn-primary" href="{{ route('lessons.edit',$lesson->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-lg btn-danger">Delete</button>
                    </form>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>
</div>



{!! $lessons->links() !!}
@endif





@endsection