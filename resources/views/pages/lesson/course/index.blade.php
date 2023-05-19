@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="container">
                <a href="{{ route('admin_dashboard') }}">Dashboard</a>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="float-start">
                            <h3>Courses</h3>
                        </div>
                        <div class="float-end">
                            <a class="btn btn-sm btn-success" href="{{ route('course.create') }}"> Create New Course</a>
                        </div>
                    </div>
                </div>
            
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
            
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Batch ID</th>
                        <th>Teacher</th>
                        <th>Course Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($courses as $course)
                    @php
                        $i=1;
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ getBatchData($course->batch_id)->name }}</td>
                        <td>{{ getTeacherData($course->teacher_id)->name }}</td>
                        <td>{{ $course->name}}</td>
                        <td>{{ $course->status }}</td>
                        <td>
                            <form action="{{ route('course.destroy',$course->id) }}" method="POST">
            
                                <a class="btn btn-sm btn-info" href="{{ route('course.show',$course->id) }}">View</a>
            
                                <a class="btn btn-sm btn-primary" href="{{ route('course.edit',$course->id) }}">Edit</a>
            
                                @csrf
                                @method('DELETE')
            
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>           


@endsection