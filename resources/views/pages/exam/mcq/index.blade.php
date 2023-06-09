@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3>MCQ Exams</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-lg btn-success" href="{{ route('mcq-exams.create') }}">Create New Exam</a>
        </div>
    </div>
</div>


@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive mt-2">
    <table id="dataTable" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Exam Name</th>
                <th>Time Duration (minutes)</th>
                <th>Questions Per Paper</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $exam->title }}</td>
                <td>{{ $exam->exam_time_duration }}</td>
                <td>{{ $exam->exam_question }}</td>
                <td>
                    <form action="{{ route('mcq-exams.destroy', $exam->id) }}" method="POST" style="display: inline-block;">
                        <a class="btn btn-lg btn-info" href="{{ route('mcq-exams.show', $exam->id) }}">Add Questions</a>
                        <a class="btn btn-lg btn-primary" href="{{ route('mcq-exams.edit', $exam->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-lg btn-danger" onclick="return confirm('Are you sure you want to delete this exam?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection