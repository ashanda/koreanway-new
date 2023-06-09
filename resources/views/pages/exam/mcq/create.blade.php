@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3>Add New Exam</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-lg btn-secondary" href="{{ route('mcq-exams.index') }}"><i class="bi bi-caret-left-fill"></i> Exams</a>
        </div>
    </div>
</div>


<form method="POST" action="{{ route('mcq-exams.store') }}" enctype="multipart/form-data" data-np-autofill-type="other" data-np-checked="1" data-np-watching="1">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Exam Name</label>
                <input name="lms_exam_name" type="text" class="form-control form-control-lg" value="" required="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Time Duration (Enter in minutes)</label>
                <input name="lms_exam_time_duration" type="text" class="form-control form-control-lg" pattern="\d*" value="" required="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Questions Per Paper</label>
                <input name="lms_exam_question" type="text" class="form-control form-control-lg" pattern="\d*" value="" required="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-end">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </div>
</form>




@endsection