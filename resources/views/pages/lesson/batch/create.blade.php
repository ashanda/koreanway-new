@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3>Add New Batch</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-lg btn-primary" href="{{ route('batch.index') }}"><i class="bi bi-caret-left-fill"></i> Batchs</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <label class="form-label">Error!</label> <br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('batch.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Batch Name:</label>
                <input type="text" name="name" class="form-control form-control-lg" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Batch Fee:</label>
                <input type="text" name="fee" class="form-control form-control-lg" placeholder="Fee">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-control form-control-lg" name="status" id="status">
                    <option value="1">Publish</option>
                    <option value="0">Unpublish</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="status" class="form-label">Register Form visibility:</label>
                <select class="form-control form-control-lg" name="visible" id="visible">
                    <option value="1">Visible</option>
                    <option value="0">Unvisible</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-end">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </div>

</form>


@endsection