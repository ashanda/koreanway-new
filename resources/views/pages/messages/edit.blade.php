@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-start">
            <h3>Edit Notice</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-lg btn-primary" href="{{ route('messages.index') }}"> Back</a>
        </div>
    </div>
</div>
<form action="{{ route('messages.update', $message) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $message->title }}" class="form-control form-control-lg" placeholder="Notice Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label" for="course_id">Course:</label>
                <input class="form-control form-control-lg" type="text" name="course_id" id="course_id" value="{{ $message->course_id }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label" for="batch_id">Batch:</label>
                <input class="form-control form-control-lg" type="text" name="batch_id" id="batch_id" value="{{ $message->batch_id }}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label" for="message">Message:</label>
                <textarea class="form-control form-control-lg" name="message" id="message">{{ $message->message }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Image</label>
                <img width="100" src="{{ asset('/notice/img/' . $message->image) }}" alt="Class Image">
                <input type="file" name="image" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label" for="message">Status:</label>
                <select class="form-select form-select-lg" name="status">
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
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-end pt-2">
            <button class="btn btn-lg btn-primary" type="submit">Update</button>
        </div>
    </div>
</form>


@endsection