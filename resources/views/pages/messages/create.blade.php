@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-start">
            <h3>Notice</h3>
        </div>
    </div>
</div>

<form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
    <div class="row">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control form-control-lg" placeholder="Notice Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="course" class="form-label">Course</label>
            <select class="form-select form-select-lg @error('course') is-invalid @enderror" name="course" id="course">
                @foreach ( $courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('course'))
            <span class="text-danger">{{ $errors->first('course') }}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="batch" class="form-label">Batch</label>
            <select class="form-select form-select-lg @error('batch') is-invalid @enderror" name="batch" id="batch">
            </select>
            @if ($errors->has('batch'))
            <span class="text-danger">{{ $errors->first('batch') }}</span>
            @endif

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <label for="course" class="form-label">Message</label>
            <textarea class="form-control form-control-lg" name="message"></textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <label for="image" class="form-label">Image</label>
        <input class="form-control form-control-lg" type="file" name="image" id="image">
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-end">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>

@endsection