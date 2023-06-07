@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Exam</h1>

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
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Exam Name</label>
                        <input name="lms_exam_name" type="text" class="form-control" value="{{ $exam->title }}" required>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Time Duration (Enter in minutes)</label>
                        <input name="lms_exam_time_duration" type="text" class="form-control" pattern="\d*" value="{{ $exam->exam_time_duration }}" required>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Questions Per Paper</label>
                        <input name="lms_exam_question" type="text" class="form-control" pattern="\d*" value="{{ $exam->exam_question }}" required>
                    </div>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button name="update_bt" type="submit" class="btn btn-primary">Update Exam</button>
                    <a class="btn btn-light" href="exam.php"><i class="fa fa-times"></i> Cancel</a>
                </div>
            </div>
        </form>
        
    </div>
@endsection