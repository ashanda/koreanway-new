@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3> Show Class</h3>
        </div>
        <div class="float-end">
            <a class="btn  btn-primary" href="{{ route('lesson.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    @if($lesson->classtype == 'Schedule')
    <p>This is Schedule fields</p>
    @elseif($lesson->classtype == 'Tute')
    <p>This is Tute fields</p>
    @elseif($lesson->classtype == 'Video')
    <p>This is Video fields</p>
    @endif
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Class Title:</label>
            {{ $lesson->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">CLass Type:</label>
            {{ $lesson->classtype }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Payement Type:</label>
            {{ $lesson->paytype }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Teacher ID:</label>
            {{ $lesson->teacher_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Batch Id:</label>
            {{ $lesson->batch_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Course Id:</label>
            {{ $lesson->course_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Lesson:</label>
            {{ $lesson->lesson }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Class Image:</label>
            <img width="100" src="{{ asset('/kycs/img/' . $lesson->image) }}" alt="Class Image">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Class Document:</label>
            <a target="_blank" href="{{ asset('/kycs/doc/' . $lesson->doc) }}">View</a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Link:</label>
            {{ $lesson->link }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Available Days:</label>
            {{ $lesson->available_days }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Number of Views:</label>
            {{ $lesson->no_of_views }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Level:</label>
            {{ $lesson->level }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Password:</label>
            {{ $lesson->password }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Status:</label>
            {{ $lesson->status }}
        </div>
    </div>
</div>

@endsection