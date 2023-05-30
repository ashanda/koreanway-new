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
    @csrf
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="form-group mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Notice Title">
            
        </div>
    </div>
    <div class="mb-3 row">
        <label for="course" class="col-md-4 col-form-label-lg text-md-end text-start">Course</label>
        <div class="col-md-6">
            <select class="form-select form-select-lg @error('course') is-invalid @enderror" name="course" id="course">
                @foreach ( $courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach


            </select>
            @if ($errors->has('course'))
            <span class="text-danger">{{ $errors->first('course') }}</span>
            @endif
        </div>
    </div>
    <div class="mb-3 row">
        <label for="batch" class="col-md-4 col-form-label-lg text-md-end text-start">Batch</label>
        <div class="col-md-6">
            <select class="form-select form-select-lg @error('batch') is-invalid @enderror" name="batch" id="batch">
            </select>
            @if ($errors->has('batch'))
            <span class="text-danger">{{ $errors->first('batch') }}</span>
            @endif
        </div>
    </div>
    <div class="mb-3 row">
        <label for="course" class="col-md-4 col-form-label-lg text-md-end text-start">Message</label>
        <div class="col-md-6">
        <textarea name="message"></textarea>
         </div>
        </div>
        <div class="mb-3 row">
            <label for="image" class="col-md-4 col-form-label-lg text-md-end text-start">Image</label>
            <div class="col-md-6">
                <input type="file" name="image" id="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
</form>

@endsection