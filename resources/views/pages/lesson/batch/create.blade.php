@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h3>Add New Batch</h3>
        </div>
        <div class="float-end">
            <a class="btn  btn-primary" href="{{ route('batch.index') }}">Batches</a>
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
                <input type="text" name="fee" class="form-control form-control-lg" placeholder="Name">
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
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label for="status" class="form-label">visible:</label>
                <select class="form-select form-select-lg" name="status" id="status">
                    <option value="1">Visible</option>
                    <option value="0">Unvisible</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-end pt-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>


@endsection