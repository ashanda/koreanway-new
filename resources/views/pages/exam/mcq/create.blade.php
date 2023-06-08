@extends('layouts.app')

@section('content')
<div class="container-fluid">
				    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Add New Exam</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">New Exam</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Add New Exam</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Exam</h4>
                </div>
                <div class="card-body">
                        <form method="POST" action="{{ route('mcq-exams.store') }}" enctype="multipart/form-data" data-np-autofill-type="other" data-np-checked="1" data-np-watching="1">
                            @csrf
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Exam Name</label>
                                    <input name="lms_exam_name" type="text" class="form-control" value="" required="">
                                </div>
                            </div>
                            
                            <div class="col-lg-2 col-md-2 col-sm-12">
                            <div class="form-group">
                                    <label class="form-label">Time Duration (Enter in minutes)</label>
                                    <input name="lms_exam_time_duration" type="text" class="form-control" pattern="\d*" value="" required="">
                            </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Questions Per Paper</label>
                                    <input name="lms_exam_question" type="text" class="form-control" pattern="\d*" value="" required="">
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button name="add_bt" type="submit" class="btn btn-primary">Add Exam</button>
                                <a class="btn btn-light" href="exam.php"><i class="fa fa-times"></i> Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>


@endsection