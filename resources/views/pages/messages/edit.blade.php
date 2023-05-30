@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-start">
            <h3>Edit Notice</h3>
        </div>
    </div>
</div>
<form action="{{ route('messages.update', $message) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{ $message->title }}" class="form-control" placeholder="Notice Title">
            
        </div>
    </div>
    <div>
        <label for="course_id">Course:</label>
        <input type="text" name="course_id" id="course_id" value="{{ $message->course_id }}" readonly>
    </div>
    <div>
        <label for="batch_id">Batch:</label>
        <input type="text" name="batch_id" id="batch_id" value="{{ $message->batch_id }}" readonly>
    </div>
    <div>
        <label for="message">Message:</label>
        <textarea name="message" id="message">{{ $message->message }}</textarea>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control form-control-lg">
            <img width="100" src="{{ asset('/notice/img/' . $lesson->image) }}" alt="Class Image">
        </div>
    </div>
    <div>
        <label for="message">Status:</label>
        <select name="status">
            @php
               $status = $message->status;
            @endphp
            @if ($status == 1)
             
             <option value="1">Publish</option>
             <option value="2">Unpublish</option>
            @else
            
            <option value="2">Unpublish</option>
            <option value="1">Publish</option>
            @endif
        </select>
    </div>
    <button type="submit">Update</button>
</form>

<a href="{{ route('messages.index') }}">Back to Messages</a>


@endsection