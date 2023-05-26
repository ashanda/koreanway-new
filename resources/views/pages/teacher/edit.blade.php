@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h4>Edit Teacher</h4>
        </div>
        <div class="float-end">
            <a class="btn btn-primary" href="{{ route('teacher.index') }}"> Back</a>
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

<form action="{{ route('teacher.update',$teacher->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Teacher Name:</label>
                <input type="text" name="name" value="{{ $teacher->name }}" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Teacher Email:</label>
                <input type="text" name="email" value="{{ $teacher->email }}" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <label class="form-label">Teacher Password:</label>
                <input type="text" name="password" value="{{ $teacher->password }}" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-end mt-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection