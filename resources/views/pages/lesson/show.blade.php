@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Show Class</h3>
            <a class="btn btn-lg btn-primary" href="{{ route('lessons.index') }}">Back</a>
        </div>
    </div>
</div>


<!-- @if($lesson->classtype == 'Schedule')
    <p>This is Schedule fields</p>
    @elseif($lesson->classtype == 'Tute')
    <p>This is Tute fields</p>
    @elseif($lesson->classtype == 'Video')
    <p>This is Video fields</p>
    @endif
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Class Title:</label>
            {{ $lesson->lecture_title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">CLass Type:</label>
            {{ $lesson->classtype }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Payement Type:</label>
            {{ $lesson->paytype }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Teacher ID:</label>
            {{ $lesson->teacher_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Batch Id:</label>
            {{ $lesson->batch_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Course Id:</label>
            {{ $lesson->course_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Lesson:</label>
            {{ $lesson->lesson }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Class Image:</label>
            <img width="100" src="{{ asset('/kycs/img/' . $lesson->image) }}" alt="Class Image">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Class Document:</label>
            <a target="_blank" href="{{ asset('/kycs/doc/' . $lesson->doc) }}">View</a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Link:</label>
            {{ $lesson->link }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Available Days:</label>
            {{ $lesson->available_days }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Number of Views:</label>
            {{ $lesson->no_of_views }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Level:</label>
            {{ $lesson->level }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Password:</label>
            {{ $lesson->password }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Status:</label>
            {{ $lesson->status }}
        </div>
    </div> -->
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title mb-3 fw-bold">Class Details</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">ID:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->id }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Lesson ID:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->lesson_id }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Lecture Title:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->lecture_title }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Thumbnail Image:</label>
                    <br>
                    <img class="img-fluid w-50" src="{{ asset('/lesson/thumbnail/' . $lesson->thumbnail) }}" alt="Thumbnail Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Background Image:</label>
                    <br>
                    <img class="img-fluid w-50" src="{{ asset('/lesson/img/' . $lesson->background_image) }}" alt="Background Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Teacher ID:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->teacher_id }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Batch ID:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->batch_id }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Course ID:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->course_id }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Video:</label>

                    <iframe class="embed-responsive-item w-100" src="{{ $lesson->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Video Title:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->video_title }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Video Description:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->video_description }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Live Link:</label>
                    <br>
                    <a class="btn btn-lg btn-info" target="_blank" href="{{ $lesson->live_link }}">Click Here to Open in a New Tab</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Live Title:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->live_title }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Live Description:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->live_description }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">MCQ ID:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->mcq_id }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Paper ID:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->paper_id }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Tute:</label>
                    <br>
                    <a class="btn btn-lg btn-primary" target="_blank" href="{{ asset('/lesson/tute/' . $lesson->tute) }}">Open Tute in new Tab</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Audio:</label>
                    <br>
                    <audio class="w-100" controls>
                        <source src="{{ asset('/lesson/audio/' . $lesson->audio) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Extra Video:</label>

                    <iframe class="embed-responsive-item w-100" src="{{ $lesson->extra_video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Extra YouTube:</label>

                    <iframe class="embed-responsive-item w-100" src="{{ $lesson->extra_youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Status:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $lesson->status == 1 ? 'Published' : 'Unpublished' }}" readonly>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection