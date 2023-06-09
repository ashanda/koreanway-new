@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <h4 class="card-title">Questions List</h4>
                </div>
                <div class="float-end">
                    <a href="{{ url('mcq-exams/add_question/'.$exam->id)  }}" class="btn btn-dark">New questions</a>
                </div>
            </div>
            <div class="card-body">
                Questions: {{ $exam->exam_question }}
                <br><em class="text-danger">All questions are not completed for the exam.</em>
                <table class="table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#No</th>
                                <th>Answer</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $question)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $question->answer }}</td>
                                <!-- <td>Add actions for each question here</td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection