@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h4>Teachers</h4>
        </div>
        <div class="float-end">
            <a class="btn btn-sm btn-success" href="{{ route('teacher.create') }}"> Create New Teacher</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Teacher Name</th>
            <th>Teacher Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        @foreach ($teachers as $teacher)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->password }}</td>
            <td>
                <form action="{{ route('teacher.destroy',$teacher->id) }}" method="POST">

                    <a class="btn btn-sm btn-info mb-1" href="{{ route('teacher.show',$teacher->id) }}">View</a>

                    <a class="btn btn-sm btn-primary mb-1" href="{{ route('teacher.edit',$teacher->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

{!! $teachers->links() !!}

@endsection