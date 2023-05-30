@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-start">
            <h3>Notice</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-success " href="{{ route('messages.create') }}"> Create New Notice</a>
        </div>
    </div>
</div>


<table>
    <thead>
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
                    <a href="{{ route('messages.show', $message) }}">View</a>
                    <a href="{{ route('messages.edit', $message) }}">Edit</a>
                    <form action="{{ route('messages.destroy', $message) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection