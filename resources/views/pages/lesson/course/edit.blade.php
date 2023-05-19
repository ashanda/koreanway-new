@extends('layouts.app')

@section('content')
<div class="pt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h3>Edit Batch</h3>
            </div>
            <div class="float-end">
                <a class="btn btn-sm btn-primary" href="{{ route('course.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <label>Error!</label> <br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('course.update',$course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="course_id" class="form-label">Batch:</label>
                    <select class="form-control" name="batch_id" id="batch_id">
                        @foreach($batch_data as $data)
                        <option value="{{$data->id}}" {{ $data->id == $course->batch_id ? 'selected' : '' }}>{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="teacher_id" class="form-label">Teacher:</label>
                    <select class="form-control" name="teacher_id" id="teacher_id">
                        @foreach($teacher_data as $data)
                        <option value="{{$data->id}}" {{ $data->id == $course->teacher_id ? 'selected' : '' }}>{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Course Name:</label>
                    <input type="text" name="name" value="{{ $course->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Status:</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1" {{ $course->status == '1' ? 'selected' : '' }}>Publish</option>
                        <option value="2" {{ $course->status == '0' ? 'selected' : '' }}>Unpublish</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-end pt-2">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>

    </form>

</div>


@endsection