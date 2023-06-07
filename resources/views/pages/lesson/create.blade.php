@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
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

    <form id="form1" action="{{ route('lessons.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row pb-2 border-bottom mb-4">
            @csrf
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Lesson Title</label>
                    <input type="text" name="lesson_title" class="form-control form-control-lg" placeholder="Class Title">
                    <input type="hidden" name="lesson_id" value=" {{ $uniqueRandomNumber }}" readonly>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="teacher_id" class="form-label">Teacher:</label>
                    <select class="form-control form-control-lg" name="teacher_id-live" id="teacher_id">
                        @foreach($teacher_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="batch_id" class="form-label">Batch:</label>
                    <select class="form-control form-control-lg" name="batch_id-live" id="batch_id">
                        @foreach($batch_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="course_id" class="form-label">Course:</label>
                    <select class="form-control form-control-lg" name="course_id-live" id="course_id">
                        @foreach($course_data as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Background Image</label>
                    <input type="file" name="image" class="form-control form-control-lg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control form-control-lg">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Pubished date</label>
                    <input type="date" name="published_date-live" class="form-control form-control-lg" placeholder="published date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-control form-control-lg" name="status-live" id="status">
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select>
                </div>
            </div>
        </div>
        <!---------------------Live Lessons------------------------>
        <div class="row pb-2 border-bottom mb-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="is_live_lesson" class="form-label">Is Live Lesson:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_live_lesson" id="live_lesson_true" value="1" checked>
                        <label class="form-label ms-2" for="live_lesson_true">
                            True
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_live_lesson" id="live_lesson_false" value="0">
                        <label class="form-label ms-2" for="live_lesson_false">
                            False
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Live Lesson Title</label>
                    <input type="text" name="live_title" class="form-control form-control-lg" placeholder="Class Title">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="classtype" class="form-label">Live Lesson Description</label>
                    <textarea name="live_description" class="form-control form-control-lg"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Live Lesson Link</label>
                    <input type="text" name="link_live" class="form-control form-control-lg" placeholder="Class Link">
                </div>
            </div>
        </div>
        <!---------------------Video Lessons------------------------>
        <div class="row pb-2 border-bottom mb-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="is_video_lesson" class="form-label">Is Video Lesson:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_video_lesson" id="video_lesson_true" value="1" checked>
                        <label class="ms-2 form-label" for="video_lesson_true">
                            True
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_video_lesson" id="video_lesson_false" value="0">
                        <label class="ms-2 form-label" for="video_lesson_false">
                            False
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Video Lesson Title</label>
                    <input type="text" name="title_video" class="form-control form-control-lg" placeholder="Class Title">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="classtype" class="form-label">Video Lesson Description</label>
                    <textarea class="form-control form-control-lg" name="video_description"></textarea>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Video Lesson Link</label>
                    <input type="text" name="link_video" class="form-control form-control-lg" placeholder="Video Link">
                </div>
            </div>
        </div>
        <!---------------------MCQ Lessons------------------------>
        <div class="row pb-2 border-bottom mb-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="is_mcq_exam" class="form-label">Is MCQ Exam:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_mcq_exam" id="mcq_exam_true" value="1" checked>
                        <label class="form-label ms-2" for="mcq_exam_true">
                            True
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_mcq_exam" id="mcq_exam_false" value="0">
                        <label class="form-label ms-2" for="mcq_exam_false">
                            False
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="mcq_id" class="form-label">Add MCQ:</label>
                    <select class="form-control form-control-lg" name="mcq_id" id="mcq_id">
                        @foreach ( $exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                        @endforeach
                        
                        
                    </select>
                </div>
            </div>
        </div>
        <!---------------------Paper Exam------------------------>
        <div class="row pb-2 border-bottom mb-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="is_paper_exam" class="form-label">Is Paper Exam:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_paper_exam" id="paper_exam_true" value="1" checked>
                        <label class="form-label ms-2" for="paper_exam_true">
                            True
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_paper_exam" id="paper_exam_false" value="0">
                        <label class="form-label ms-2" for="paper_exam_false">
                            False
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="mcq_id" class="form-label">Add Paper:</label>
                    <select class="form-control form-control-lg" name="mcq_id" id="mcq_id">
                        <option value="123">Paper 1</option>
                        <option value="124">Paper 2</option>
                    </select>
                </div>
            </div>
        </div>
        <!---------------------tute------------------------>
        <div class="row pb-2 border-bottom mb-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="is_tute" class="form-label">Is Tute:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_tute" id="tute_true" value="1" checked>
                        <label class="form-label ms-2" for="tute_true">
                            True
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_tute" id="tute_false" value="0">
                        <label class="form-label ms-2" for="tute_false">
                            False
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Tute</label>
                    <input type="file" name="tute" class="form-control form-control-lg">
                </div>
            </div>
        </div>
        <!---------------------Audio------------------------>
        <div class="row pb-2 border-bottom mb-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="is_audio" class="form-label">Is Audio :</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_audio" id="audio_true" value="1" checked>
                        <label class="form-label ms-2" for="audio_true">
                            True
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_audio" id="audio_false" value="0">
                        <label class="form-label ms-2" for="audio_false">
                            False
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Audio File</label>
                    <input type="file" name="audio" class="form-control form-control-lg">
                </div>
            </div>
        </div>
        <!---------------------Extra Video Lesson------------------------>
        <div class="row pb-2 border-bottom mb-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="is_extra_video_lesson" class="form-label">Is Extra Video Lesson:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_extra_video_lesson" id="extra_video_lesson_true" value="1" checked>
                        <label class="ms-2 form-label" for="extra_video_lesson_true">
                            True
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_extra_video_lesson" id="extra_video_lesson_false" value="0">
                        <label class="ms-2 form-label" for="extra_video_lesson_false">
                            False
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Extra Video Lesson Link</label>
                    <input type="text" name="link_extra_video" class="form-control form-control-lg" placeholder="Extra Video Link">
                </div>
            </div>
        </div>
        <!---------------------Extra Youtube Video Lesson------------------------>
        <div class="row pb-2 border-bottom mb-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="is_extra_youtube_video_lesson" class="form-label">Is Extra Youtube Video Lesson:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_extra_youtube_video_lesson" id="extra_youtube_video_lesson_true" value="1" checked>
                        <label class="ms-2 form-label" for="extra_youtube_video_lesson_true">
                            True
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_extra_youtube_video_lesson" id="extra_youtube_video_lesson_false" value="0">
                        <label class="ms-2 form-label" for="extra_youtube_video_lesson_false">
                            False
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group mb-3">
                    <label class="form-label">Extra Youtube Video Lesson Link</label>
                    <input type="text" name="link_extra_youtube_video" class="form-control form-control-lg" placeholder="Extra Youtube Video Link">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-end">
                <button class="btn btn-success" type="submit" id="submit">Save Lesson</button>
            </div>
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
</script>


@endsection