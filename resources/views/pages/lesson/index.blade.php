@extends('layouts.app')

@section('content')



    @if (Auth::guard('student')->check())

        <div class="row">
            <div class="col-lg-12">
                <h4 class="item_title">Paper Class</h4>

            </div>
            <div class="col-lg-12">
                <div class="widget-box bg-light mb-2">
                    <form method="post" data-np-autofill-type="other" data-np-checked="1" data-np-watching="1">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                From : <input name="s_month" type="month" class="form-control" id="s_month" value="2023-05">
                            </div>
                            <div class="col-lg-3 col-md-3">
                                To : <input name="e_month" type="month" class="form-control" id="e_month" value="2023-05">
                            </div>
                            <div class="col-lg-3 col-md-3">
                                Class : <select name="fsubject" required="" class="form-control" style="border: 2px solid #ccc;">
                                    <option hidden="yes">Select Class</option>

                                    <option value="387">Science (සිංහල මාධ්‍ය) , අභිමන් සර් [Grade 11]</option>

                                    <option value="386">Science (English Medium) by Abhiman Sir [Grade 11]</option>

                                    <option value="667">Science Paper Revision (EM) by Abhiman Sir [Grade 11]</option>

                                    <option value="669">Science Paper Revision (SM) by අභිමන් සර් [Grade 11]</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <br><button name="fil_bt" type="submit" class="btn btn-dark">Filter</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-12">
                <div class="_14d25">
                    <div class="row">
                        @foreach ( $lessons as $lesson)
                        <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                                <a href="#" class="fcrse_img">
                                    <img src="{{ asset('/kycs/img/' . $lesson->image) }}" class="pro_pick2">
                                    <div class="course-overlay">
                                        <div class="badge_seller"><i class="uil uil-star"></i> May 23, 2023</div>
                                        <div class="crse_reviews">
                                            <i class="fa fa-check-circle"></i> May
                                        </div>

                                        <div class="crse_timer">
                                            Grade 11 - Science Paper Revision (SM) by අභිමන් සර් </div>
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
                                            <a href="#" onclick="openModel({{ $lesson->course_id }}, {{ $lesson->batch_id }},{{ $lesson->teacher_id }})" class="save_btn btn-block payment-here">Payment Here</a>
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
                                            <a href="#" onclick="openModel({{ $lesson->course_id }}, {{ $lesson->batch_id }},{{ $lesson->teacher_id }})" class="save_btn btn-block payment-here">Payment Here</a>
                                            @endif
                                            @endif




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


<div class="modal" id="paymentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Here</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal content goes here -->
                <form id="paymentForm" action="{{ route('process.payment') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Amount:</label>
                        <input type="text" class="form-control" id="amount" name="amount">
                        <input type="hidden" id="course_id" name="course_id" class="course_id">
                        <input type="hidden" id="batch_id" name="batch_id" class="batch_id">
                        <input type="hidden" id="teacher_id" name="teacher_id" class="teacher_id">

                    </div>
                    <div class="form-group">
                        <label for="file">Upload File:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@else
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h3>Classes</h3>
            </div>
            <div class="float-end">
                <a class="btn btn-sm btn-success" href="{{ route('lesson.create') }}"> Create New Class</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Class Title</th>
                <th>Class Type</th>
                <th>Payement Type</th>
                <th>Teacher ID</th>
                <th>Batch Id</th>
                <td>Course Id</td>
                <th>Lesson</th>
                <th>CLass Image</th>
                <th>Class Doc</th>
                <th>Link</th>
                <th>Available Days</th>
                <th>Number of Views</th>
                <th>Level</th>
                <th>Password</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($lessons as $lesson)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $lesson->title }}</td>
                <td>{{ $lesson->classtype }}</td>
                <td>{{ $lesson->paytype }}</td>
                <td>{{ getTeacherData($lesson->teacher_id)->name }}</td>
                <td>{{ getBatchData($lesson->batch_id)->name }}</td>
                <td>{{ $lesson->course_id }}</td>
                <td>{{ $lesson->lesson }}</td>
                <td><img width="50" src="{{ asset('/kycs/img/' . $lesson->image) }}" alt="Class Image"></td>
                <td><a target="_blank" href="{{ asset('/kycs/doc/' . $lesson->doc) }}">View</a></td>
                <td>{{ $lesson->link }}</td>
                <td>{{ $lesson->available_days }}</td>
                <td>{{ $lesson->no_of_views }}</td>
                <td>{{ $lesson->password }}</td>
                <td>{{ $lesson->status }}</td>
                <td>
                    <form action="{{ route('lesson.destroy',$lesson->id) }}" method="POST">

                        <a class="btn btn-sm btn-info" href="{{ route('lesson.show',$lesson->id) }}">View</a>

                        <a class="btn btn-sm btn-primary" href="{{ route('lesson.edit',$lesson->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </table>
    </div>



{!! $lessons->links() !!}
@endif





@endsection