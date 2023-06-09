@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3>Edit Teacher</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-lg btn-primary" href="{{ route('teacher.index') }}"><i class="bi bi-caret-left-fill"></i> Teachers</a>
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
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Teacher Name:</label>
                <input type="text" name="name" value="{{ $teacher->name }}" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Teacher Email:</label>
                <input type="text" name="email" value="{{ $teacher->email }}" class="form-control form-control-lg">
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Teacher Password:</label>
                <input type="text" name="password" value="{{ $teacher->password }}" class="form-control form-control-lg">
            </div>
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-end mt-2">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection