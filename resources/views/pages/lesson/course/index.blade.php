@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h3>Courses</h3>
        </div>
        <div class="float-end">
            <a class="btn  btn-success" href="{{ route('course.create') }}"> Create New Course</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="table-responsive mt-2">
    <table id="dataTable" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Batch ID</th>
                <th>Teacher</th>
                <th>Course Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            @php
            $i=1;
            @endphp
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $course->batch_id }}</td>
                <td>{{ $course->teacher_id }}</td>
                <td>{{ $course->name}}</td>
                <td>{{ $course->status }}</td>
                <td>
                    <form action="{{ route('course.destroy',$course->id) }}" method="POST">

                        <a class="btn  btn-info" href="{{ route('course.show',$course->id) }}">View</a>

                        <a class="btn  btn-primary" href="{{ route('course.edit',$course->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn  btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @php
            $i++;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>

@endsection