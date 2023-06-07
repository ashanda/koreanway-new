@extends('layouts.app')

@section('content')
<div class="container-fluid">
				    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Questions List</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Questions List</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Questions List</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Questions List</h4>
                    <a href="{{ url('mcq-exams/add_question/'.$exam->id)  }}" class="btn btn-dark">New questions</a>							</div>
                <div class="card-body">
            
                                            
Questions: {{ $exam->exam_question }}								
<br><em class="text-danger">All questions are not completed for the exam.</em>								
<table class="table">
    <table class="table">
        <thead>
            <tr>
                <th>#No</th>
                <th>Answer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $question->answer }}</td>
                <td><!-- Add actions for each question here --></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</table>

                    
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection