@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h4> Show Teacher</h4>
        </div>
        <div class="float-end">
            <a class="btn btn-primary" href="{{ route('teacher.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Teacher Name:</label>
            {{ $teacher->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Email:</label>
            {{ $teacher->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label class="form-label">Password:</label>
            {{ $teacher->password }}
        </div>
    </div>
</div>
@endsection