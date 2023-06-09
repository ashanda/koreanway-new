@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3>Edit Class</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-lg btn-primary" href="{{ route('lessons.index') }}"><i class="bi bi-caret-left-fill"></i> Classes</a>
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

<form action="{{ route('lessons.update',$lesson->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- <div class="row">
        @if($lesson->classtype == 'Schedule')
        <p>This is Schedule inputs</p>
        @elseif($lesson->classtype == 'Tute')
        <p>This is Tute inputs</p>
        @elseif($lesson->classtype == 'Video')
        <p>This is Video inputs</p>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Class Title</label>
                <input type="text" name="title" value="{{ $lesson->title }}" class="form-control form-control-lg" placeholder="Class Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="classtype" class="form-label">Class Type:</label>
                <select class="form-select form-select-lg" name="classtype" id="classtype">
                    <option value="Schedule" {{ $lesson->classtype == 'Schedule' ? 'selected' : '' }}>Class Schedule</option>
                    <option value="Tute" {{ $lesson->classtype == 'Tute' ? 'selected' : '' }}>Class Tute</option>
                    <option value="Video" {{ $lesson->classtype == 'Video' ? 'selected' : '' }}>Video Lesson</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="paytype" class="form-label">Payment Type:</label>
                <select class="form-select form-select-lg" name="paytype" id="paytype">
                    <option value="Paid" {{ $lesson->paytype == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Free" {{ $lesson->paytype == 'Free' ? 'selected' : '' }}>Free</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="teacher_id" class="form-label">Teacher ID:</label>
                <select class="form-select form-select-lg" name="teacher_id" id="teacher_id">
                    @foreach($teacher_data as $data)
                    <option value="{{$data->id}}" {{ $data->id == $lesson->teacher_id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="batch_id" class="form-label">Batch Id:</label>
                <select class="form-select form-select-lg" name="batch_id" id="batch_id">
                    @foreach($batch_data as $data)
                    <option value="{{$data->id}}" {{ $data->id == $lesson->batch_id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="course_id" class="form-label">Course Id:</label>
                <select class="form-select form-select-lg" name="course_id" id="course_id">
                    @foreach($course_data as $data)
                    <option value="{{$data->id}}" {{ $data->id == $lesson->course_id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Class Lesson</label>
                <input type="text" name="lesson" value="{{ $lesson->lesson }}" class="form-control form-control-lg" placeholder="Class Lesson">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Class Image</label>
                <input type="file" name="image" class="form-control form-control-lg">
                <img width="100" src="{{ asset('/kycs/img/' . $lesson->image) }}" alt="Class Image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Class Document</label>
                <input type="file" name="doc" class="form-control form-control-lg">
                <a target="_blank" href="{{ asset('/kycs/doc/' . $lesson->doc) }}">View</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Class Link</label>
                <input type="text" name="link" value="{{ $lesson->link }}" class="form-control form-control-lg" placeholder="Class Link">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Available Days</label>
                <input type="text" name="available_days" value="{{ $lesson->available_days }}" class="form-control form-control-lg" placeholder="Available Days">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Number of Views</label>
                <input type="text" name="no_of_views" value="{{ $lesson->no_of_views }}" class="form-control form-control-lg" placeholder="Number of Views">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Select Level</label>
                <select class="form-select form-select-lg" name="level" id="level">
                    <option value="1" {{ $lesson->level == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $lesson->level == '2' ? 'selected' : '' }}>2</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Password</label>
                <input type="text" name="no_of_views" value="{{ $lesson->password }}" class="form-control form-control-lg" placeholder="Password">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select form-select-lg" name="status" id="status">
                    <option value="1" {{ $lesson->status == '1' ? 'selected' : '' }}>Publish</option>
                    <option value="0" {{ $lesson->status == '0' ? 'selected' : '' }}>Unpublish</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-end pt-2">
            <button type="submit" class="btn btn-lg btn-primary">Update</button>
        </div>
    </div> -->
    <div class="row pb-2 border-bottom mb-4">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Lesson Title</label>
                <input type="text" value="{{ $lesson->lecture_title }}" name="lesson_title" class="form-control form-control-lg">
                <input type="hidden" name="lesson_id" value=" {{ $uniqueRandomNumber }}" readonly>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="teacher_id" class="form-label">Teacher:</label>
                <select class="form-control form-control-lg" name="teacher_id-live" id="teacher_id">
                    @foreach($teacher_data as $data)
                    <option value="{{$data->id}}" {{ $data->id == $lesson->teacher_id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="batch_id" class="form-label">Batch:</label>
                <select class="form-control form-control-lg" name="batch_id-live" id="batch_id">
                    @foreach($batch_data as $data)
                    <option value="{{$data->id}}" {{ $data->id == $lesson->batch_id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="course_id" class="form-label">Course:</label>
                <select class="form-control form-control-lg" name="course_id-live" id="course_id">
                    @foreach($course_data as $data )
                    <option value="{{$data->id}}" {{ $data->id == $lesson->course_id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Background Image</label>
                <br>
                <img class="img-fluid w-50" src="{{ asset('/lesson/img/' . $lesson->background_image) }}" alt="Background Image">
                <input type="file" name="image" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Thumbnail</label>
                <br>
                <img class="img-fluid w-50" src="{{ asset('/lesson/thumbnail/' . $lesson->thumbnail) }}" alt="Thumbnail Image">
                <input type="file" name="thumbnail" class="form-control form-control-lg">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Pubished date</label>
                <input type="date" value="{{ $lesson->published_date }}" name="published_date-live" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-control form-control-lg" name="status-live" id="status">
                    <option value="1" {{ $lesson->status == '1' ? 'selected' : '' }}>Publish</option>
                    <option value="2" {{ $lesson->status == '2' ? 'selected' : '' }}>Unpublish</option>
                </select>
            </div>
        </div>
    </div>
    <!---------------------Live Lessons------------------------>
    <div class="row pb-2 border-bottom mb-4">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
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
                <input type="text" value="{{ $lesson->live_title }}" name="live_title" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="classtype" class="form-label">Live Lesson Description</label>
                <textarea name="live_description" class="form-control form-control-lg">{{ $lesson->live_description }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Live Lesson Link</label>
                <br>
                <a class="btn btn-lg btn-primary" target="_blank" href="{{ $lesson->live_link }}">Open Tute in new Tab</a>
                <input type="text" value="{{ $lesson->live_link }}" name="link_live" class="form-control form-control-lg">
            </div>
        </div>
    </div>
    <!---------------------Video Lessons------------------------>
    <div class="row pb-2 border-bottom mb-4">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
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
                <input type="text" value="{{ $lesson->video_title }}" name="title_video" class="form-control form-control-lg">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="classtype" class="form-label">Video Lesson Description</label>
                <textarea class="form-control form-control-lg" name="video_description">{{ $lesson->video_description }}</textarea>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Video Lesson Link</label>
                <br>
                <iframe class="embed-responsive-item" src="{{ $lesson->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <input type="text" value="{{ $lesson->video_link }}" name="link_video" class="form-control form-control-lg">
            </div>
        </div>
    </div>
    <!---------------------MCQ Lessons------------------------>
    <div class="row pb-2 border-bottom mb-4">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
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
                    <option value="123">MCQ1</option>
                    <option value="124">MCQ2</option>
                </select>
            </div>
        </div>
    </div>
    <!---------------------Paper Exam------------------------>
    <div class="row pb-2 border-bottom mb-4">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
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
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
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
                <br>
                <a class="btn btn-lg btn-primary" target="_blank" href="{{ asset('/lesson/tute/' . $lesson->tute) }}">Open Tute in new Tab</a>
                <input type="file" name="tute" class="form-control form-control-lg">
            </div>
        </div>
    </div>
    <!---------------------Audio------------------------>
    <div class="row pb-2 border-bottom mb-4">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
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
                <br>
                <audio class="w-100" controls>
                    <source src="{{ asset('/lesson/audio/' . $lesson->audio) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
                <input type="file" name="audio" class="form-control form-control-lg">
            </div>
        </div>
    </div>
    <!---------------------Extra Video Lesson------------------------>
    <div class="row pb-2 border-bottom mb-4">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
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
                <br>
                <iframe class="embed-responsive-item" src="{{ $lesson->extra_video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <input type="text" value="{{ $lesson->extra_video }}" name="link_extra_video" class="form-control form-control-lg">
            </div>
        </div>
    </div>
    <!---------------------Extra Youtube Video Lesson------------------------>
    <div class="row pb-2 border-bottom mb-4">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
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
                <br>
                <iframe class="embed-responsive-item" src="{{ $lesson->extra_youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <input type="text" value="{{ $lesson->extra_youtube }}" name="link_extra_youtube_video" class="form-control form-control-lg">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-end">
            <button class="btn btn-lg btn-success" type="submit" id="submit">Update</button>
        </div>
    </div>

</form>



@endsection