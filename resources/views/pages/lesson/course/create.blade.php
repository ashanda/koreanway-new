@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h3>Add New Course</h3>
        </div>
        <div class="float-end">
            <a class="btn  btn-primary" href="{{ route('course.index') }}"> Courses</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger mt-2">
    <label class="form-label">Error!</label> <br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('course.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="batch_id" class="form-label">Batch Id:</label>
                <select class="form-select form-select-lg" name="batch_id" id="batch_id">
                    @foreach($batch_data as $data )
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="teacher_id" class="form-label">Teacher ID:</label>
                <select class="form-select form-select-lg" name="teacher_id" id="teacher_id">
                    @foreach($teacher_data as $data )
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Course Name:</label>
                <input type="text" name="name" class="form-control form-control-lg" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select form-select-lg" name="status" id="status">
                    <option>Publish</option>
                    <option>Unpublish</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-end pt-2">
            <button type="submit" class="btn  btn-primary">Submit</button>
        </div>
    </div>

</form>

@endsection