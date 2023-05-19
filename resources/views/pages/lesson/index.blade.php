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
                <h3>Classes</h3>
            </div>
            <div class="float-end">
                <a class="btn btn-sm btn-success" href="{{ route('lesson.create') }}"> Create New Class</a>
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
            <th>Class Title</th>
            <th>Class Type</th>
            <th>Payement Type</th>
            <th>Teacher ID</th>
            <th>Batch Id</th>
            <td>Course Id</td>
            <th>Lesson</th>
            <th>CLass Image</th>
            <th>Class Doc</th>
            <th>Link</th>
            <th>Available Days</th>
            <th>Number of Views</th>
            <th>Level</th>
            <th>Password</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($lessons as $lesson)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $lesson->title }}</td>
            <td>{{ $lesson->classtype }}</td>
            <td>{{ $lesson->paytype }}</td>
            <td>{{ $lesson->teacher_id }}</td>
            <td>{{ $lesson->batch_id }}</td>
            <td>{{ $lesson->course_id }}</td>
            <td>{{ $lesson->lesson }}</td>
            <td><img width="50" src="{{ asset('/kycs/img/' . $lesson->image) }}" alt="Class Image"></td>
            <td><a target="_blank" href="{{ asset('/kycs/doc/' . $lesson->doc) }}">View</a></td>
            <td>{{ $lesson->link }}</td>
            <td>{{ $lesson->available_days }}</td>
            <td>{{ $lesson->no_of_views }}</td>
            <td>{{ $lesson->level }}</td>
            <td>{{ $lesson->password }}</td>
            <td>{{ $lesson->status }}</td>
            <td>
                <form action="{{ route('lesson.destroy',$lesson->id) }}" method="POST">

                                <a class="btn btn-sm btn-info" href="{{ route('lesson.show',$lesson->id) }}">View</a>

                                <a class="btn btn-sm btn-primary" href="{{ route('lesson.edit',$lesson->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </table>
           


{!! $lessons->links() !!}
</div>
</div>


@endsection