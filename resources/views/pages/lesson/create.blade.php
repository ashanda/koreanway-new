@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h3>Add New Class</h3>
        </div>
        <div class="float-end">
            <a class="btn  btn-primary" href="{{ url()->previous() }}">Classes</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger mt-2">
    <label class="form-label">Error!</label> <br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@php
$uniqueRandomNumber = uniqid();
@endphp
<div class="row">

    <div class="select_sec">
        <!-- Schedule -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="lessonCheck1" onclick="checkSchedule()" checked>
            <label class="form-check-label" for="lessonCheck1"> Schedule</label>
        </div>

        <!-- Tute -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="lessonCheck2" onclick="checkTute()" checked>
            <label class="form-check-label" for="lessonCheck2"> Tute</label>
        </div>

        <!-- Video -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="lessonCheck3" onclick="checkVideo()" checked>
            <label class="form-check-label" for="lessonCheck3"> Video</label>
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
        </div>
    </div>


    <div id="schedule">
        schedule
    </div>
    <div id="tute">
        tute
    </div>
    <div id="video">
        video
    </div>

    <form id="form1" action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Lesson Title</label>
                <input type="text" name="lesson_title" class="form-control form-control-lg" placeholder="Class Title">
                <input type="hidden" name="lesson_id" value=" {{ $uniqueRandomNumber }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label for="paytype" class="form-label">Payement Type:</label>
                <select class="form-control form-control-lg" name="paytype-live" id="paytype">
                    <option value="Paid">Paid</option>
                    <option value="Free">Free</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label for="teacher_id" class="form-label">Teacher ID:</label>
                <select class="form-control form-control-lg" name="teacher_id-live" id="teacher_id">
                    @foreach($teacher_data as $data )
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label for="batch_id" class="form-label">Batch Id:</label>
                <select class="form-control form-control-lg" name="batch_id-live" id="batch_id">
                    @foreach($batch_data as $data )
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label for="course_id" class="form-label">Course Id:</label>
                <select class="form-control form-control-lg" name="course_id-live" id="course_id">
                    @foreach($course_data as $data )
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!---------------------Live Lessons------------------------>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Class Title</label>
                <input type="text" name="live_title" class="form-control form-control-lg" placeholder="Class Title">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label for="classtype" class="form-label">Lesson Type:</label>
                <input type="text" name="live" class="form-control form-control-lg" value="Live" readonly>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Class Lesson</label>
                <input type="text" name="lesson-live" class="form-control form-control-lg" placeholder="Class Lesson">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Class Image</label>
                <input type="file" name="image-live" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Class Link</label>
                <input type="text" name="link-live" class="form-control form-control-lg" placeholder="Class Link">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Password</label>
                <input type="text" name="password-live" class="form-control form-control-lg" placeholder="Password">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Pubished date</label>
                <input type="date" name="published_date-live" class="form-control form-control-lg" placeholder="published date">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-control form-control-lg" name="status-live" id="status">
                    <option value="1">Publish</option>
                    <option value="0">Unpublish</option>
                </select>
            </div>
        </div>


        <!---------------------Video Lessons------------------------>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Class Title</label>
                <input type="text" name="title-video" class="form-control form-control-lg" placeholder="Class Title">
                <input type="hidden" name="lesson_id-video" value=" {{ $uniqueRandomNumber }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label for="classtype" class="form-label">Lesson Type:</label>
                <input type="text" class="form-control form-control-lg" name="lesson_type-video" value="Video" readonly>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Class Lesson</label>
                <input type="text" name="lesson-video" class="form-control form-control-lg" placeholder="Class Lesson">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Class Image</label>
                <input type="file" name="image-video" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Available Days</label>
                <input type="text" name="available_days-video" class="form-control form-control-lg" placeholder="Available Days">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Number of Views</label>
                <input type="text" name="no_of_views-video" class="form-control form-control-lg" placeholder="Number of Views">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Pubished date</label>
                <input type="date" name="published_date-video" class="form-control form-control-lg" placeholder="published date">
            </div>
        </div>




        <!---------------------Paper Lessons------------------------>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Class Title</label>
                <input type="text" name="title-paper" class="form-control form-control-lg" placeholder="Class Title">
                <input type="hidden" name="lesson_id-paper" value=" {{ $uniqueRandomNumber }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label for="classtype" class="form-label">Lesson Type:</label>
                <input type="text" class="form-control form-control-lg" name="lesson-type-paper" value="Paper" readonly>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Class Lesson</label>
                <input type="text" name="lesson-paper" class="form-control form-control-lg" placeholder="Class Lesson">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Class Image</label>
                <input type="file" name="image-paper" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Class Document</label>
                <input type="file" name="doc-paper" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Pubished date</label>
                <input type="date" name="published_date-paper" class="form-control form-control-lg" placeholder="published date">
            </div>
        </div>

        <button type="submit" id="submit">Save Lesson</button>

    </form>
</div>

<script>
    function checkSchedule() {
        var checkBox = document.getElementById("lessonCheck1");
        var formSec = document.getElementById("schedule");
        if (checkBox.checked == true) {
            formSec.style.display = "block";
        } else {
            formSec.style.display = "none";
        }
    }

    function checkTute() {
        var checkBox = document.getElementById("lessonCheck2");
        var formSec = document.getElementById("tute");
        if (checkBox.checked == true) {
            formSec.style.display = "block";
        } else {
            formSec.style.display = "none";
        }
    }

    function checkVideo() {
        var checkBox = document.getElementById("lessonCheck3");
        var formSec = document.getElementById("video");
        if (checkBox.checked == true) {
            formSec.style.display = "block";
        } else {
            formSec.style.display = "none";
        }
    }
</script>



@endsection