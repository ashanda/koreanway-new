@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3>Notice</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-lg btn-success" href="{{ route('messages.create') }}"> Create New Notice</a>
        </div>
    </div>
</div>


<div class="table-responsive mt-2">
    <table id="dataTable" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Course</th>
                <th>Batch</th>
                <th>Message</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
            <tr>
                <td>{{ $message->title }}</td>
                <td>{{ $message->course_id }}</td>
                <td>{{ $message->batch_id }}</td>
                <td>{{ $message->message }}</td>
                @if ($message->status == 1)
                <td>{{ 'Published' }}</td>
                @else
                <td>{{ 'Unpublished' }}</td>
                @endif

                <td>

                    <form action="{{ route('messages.destroy', $message) }}" method="POST">
                        <a class="btn btn-lg btn-info" href="{{ route('messages.show', $message) }}">View</a>
                        <a class="btn btn-lg btn-primary" href="{{ route('messages.edit', $message) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-lg btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection