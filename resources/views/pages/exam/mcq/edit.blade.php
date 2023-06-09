@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3>Edit Exam</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-lg btn-primary" href="{{ url()->previous() }}"><i class="bi bi-caret-left-fill"></i> Exams</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('mcq-exams.update', $exam->id) }}" enctype="multipart/form-data" data-np-autofill-type="other" data-np-checked="1" data-np-watching="1">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Exam Name</label>
                <input name="lms_exam_name" type="text" class="form-control form-control-lg" value="{{ $exam->title }}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Time Duration (Enter in minutes)</label>
                <input name="lms_exam_time_duration" type="text" class="form-control form-control-lg" pattern="\d*" value="{{ $exam->exam_time_duration }}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Questions Per Paper</label>
                <input name="lms_exam_question" type="text" class="form-control form-control-lg" pattern="\d*" value="{{ $exam->exam_question }}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-end pt-2">
            <button type="submit" class="btn btn-lg btn-primary">Update</button>
        </div>
    </div>
</form>


@endsection