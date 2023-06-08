@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>MCQ Exams</h1>
        <a class="btn btn-primary mb-3" href="{{ route('mcq-exams.create') }}">Add Exam</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
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
                            <a class="btn btn-primary" href="{{ route('mcq-exams.show', $exam->id) }}">Add Question</a>
                            <a class="btn btn-primary" href="{{ route('mcq-exams.edit', $exam->id) }}">Edit</a>
                            <form action="{{ route('mcq-exams.destroy', $exam->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this exam?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
