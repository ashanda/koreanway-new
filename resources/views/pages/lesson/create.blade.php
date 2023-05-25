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
<div class="alert alert-danger">
    <label>Error!</label> <br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<!-- Schedule -->
<label for="lessonCheck1">Schedule:</label>
<input type="checkbox" id="lessonCheck1" onclick="checkSchedule()" checked>

<!-- Tute -->
<label for="lessonCheck2">Tute:</label>
<input type="checkbox" id="lessonCheck2" onclick="checkTute()" checked>

<!-- Video -->
<label for="lessonCheck3">Video:</label>
<input type="checkbox" id="lessonCheck3" onclick="checkVideo()" checked>

<div id="schedule">
    <p class="h1">schedule</p>
    <form action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Title</label>
                    <input type="text" name="title" class="form-control form-control-lg" placeholder="Class Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="classtype" class="form-label">Lesson Type:</label>
                    <select class="form-select" name="classtype" id="classtype" onchange="changeInputs()">
                        <option value="Live">Live Lesson</option>
                        <option value="Paper">Paper Lesson</option>
                        <option value="Video">Video Lesson</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="paytype" class="form-label">Payement Type:</label>
                    <select class="form-select" name="paytype" id="paytype">
                        <option value="Paid">Paid</option>
                        <option value="Free">Free</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="teacher_id" class="form-label">Teacher ID:</label>
                    <select class="form-select" name="teacher_id" id="teacher_id">
                        @foreach($teacher_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="batch_id" class="form-label">Batch Id:</label>
                    <select class="form-select" name="batch_id" id="batch_id">
                        @foreach($batch_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="course_id" class="form-label">Course Id:</label>
                    <select class="form-select" name="course_id" id="course_id">
                        @foreach($course_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Lesson</label>
                    <input type="text" name="lesson" class="form-control form-control-lg" placeholder="Class Lesson">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Image</label>
                    <input type="file" name="image" class="form-control form-control-lg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Document</label>
                    <input type="file" name="doc" class="form-control form-control-lg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Link</label>
                    <input type="text" name="link" class="form-control form-control-lg" placeholder="Class Link">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Available Days</label>
                    <input type="text" name="available_days" class="form-control form-control-lg" placeholder="Available Days">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Number of Views</label>
                    <input type="text" name="no_of_views" class="form-control form-control-lg" placeholder="Number of Views">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Pubished date</label>
                    <input type="date" name="published_date" class="form-control form-control-lg" placeholder="published date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" name="password" class="form-control form-control-lg" placeholder="Password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-select" name="status" id="status">
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 text-end pt-2">
                <button type="submit" class="btn  btn-primary">Submit</button>
            </div>


        </div>

    </form>
</div>
<div id="tute">
    <p class="h1">tute</p>
    <form action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Title</label>
                    <input type="text" name="title" class="form-control form-control-lg" placeholder="Class Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="classtype" class="form-label">Lesson Type:</label>
                    <select class="form-select" name="classtype" id="classtype" onchange="changeInputs()">
                        <option value="Live">Live Lesson</option>
                        <option value="Paper">Paper Lesson</option>
                        <option value="Video">Video Lesson</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="paytype" class="form-label">Payement Type:</label>
                    <select class="form-select" name="paytype" id="paytype">
                        <option value="Paid">Paid</option>
                        <option value="Free">Free</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="teacher_id" class="form-label">Teacher ID:</label>
                    <select class="form-select" name="teacher_id" id="teacher_id">
                        @foreach($teacher_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="batch_id" class="form-label">Batch Id:</label>
                    <select class="form-select" name="batch_id" id="batch_id">
                        @foreach($batch_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="course_id" class="form-label">Course Id:</label>
                    <select class="form-select" name="course_id" id="course_id">
                        @foreach($course_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Lesson</label>
                    <input type="text" name="lesson" class="form-control form-control-lg" placeholder="Class Lesson">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Image</label>
                    <input type="file" name="image" class="form-control form-control-lg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Document</label>
                    <input type="file" name="doc" class="form-control form-control-lg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Link</label>
                    <input type="text" name="link" class="form-control form-control-lg" placeholder="Class Link">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Available Days</label>
                    <input type="text" name="available_days" class="form-control form-control-lg" placeholder="Available Days">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Number of Views</label>
                    <input type="text" name="no_of_views" class="form-control form-control-lg" placeholder="Number of Views">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Pubished date</label>
                    <input type="date" name="published_date" class="form-control form-control-lg" placeholder="published date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" name="password" class="form-control form-control-lg" placeholder="Password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-select" name="status" id="status">
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 text-end pt-2">
                <button type="submit" class="btn  btn-primary">Submit</button>
            </div>


        </div>

    </form>
</div>
<div id="video">
    <p class="h1">video</p>
    <form action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Title</label>
                    <input type="text" name="title" class="form-control form-control-lg" placeholder="Class Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="classtype" class="form-label">Lesson Type:</label>
                    <select class="form-select" name="classtype" id="classtype" onchange="changeInputs()">
                        <option value="Live">Live Lesson</option>
                        <option value="Paper">Paper Lesson</option>
                        <option value="Video">Video Lesson</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="paytype" class="form-label">Payement Type:</label>
                    <select class="form-select" name="paytype" id="paytype">
                        <option value="Paid">Paid</option>
                        <option value="Free">Free</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="teacher_id" class="form-label">Teacher ID:</label>
                    <select class="form-select" name="teacher_id" id="teacher_id">
                        @foreach($teacher_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="batch_id" class="form-label">Batch Id:</label>
                    <select class="form-select" name="batch_id" id="batch_id">
                        @foreach($batch_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="course_id" class="form-label">Course Id:</label>
                    <select class="form-select" name="course_id" id="course_id">
                        @foreach($course_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Lesson</label>
                    <input type="text" name="lesson" class="form-control form-control-lg" placeholder="Class Lesson">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Image</label>
                    <input type="file" name="image" class="form-control form-control-lg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Document</label>
                    <input type="file" name="doc" class="form-control form-control-lg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Class Link</label>
                    <input type="text" name="link" class="form-control form-control-lg" placeholder="Class Link">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Available Days</label>
                    <input type="text" name="available_days" class="form-control form-control-lg" placeholder="Available Days">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Number of Views</label>
                    <input type="text" name="no_of_views" class="form-control form-control-lg" placeholder="Number of Views">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Pubished date</label>
                    <input type="date" name="published_date" class="form-control form-control-lg" placeholder="published date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" name="password" class="form-control form-control-lg" placeholder="Password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-select" name="status" id="status">
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 text-end pt-2">
                <button type="submit" class="btn  btn-primary">Submit</button>
            </div>


        </div>

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