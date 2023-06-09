@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3>Edit Batch</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-lg btn-primary" href="{{ route('batch.index') }}"><i class="bi bi-caret-left-fill"></i> Batchs</a>
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

<form action="{{ route('batch.update',$batch->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Batch Name:</label>
                <input type="text" name="name" value="{{ $batch->name }}" class="form-control form-control-lg" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Batch Fee:</label>
                <input type="text" name="fee" value="{{ $batch->fee }}" class="form-control form-control-lg" placeholder="Fee">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Status:</label>
                <select class="form-select form-select-lg" name="status" id="status">
                    <option value="1" {{ $batch->status == '1' ? 'selected' : '' }}>Publish</option>
                    <option value="0" {{ $batch->status == '0' ? 'selected' : '' }}>Unpublish</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group mb-3">
                <label class="form-label">Register Form visibility:</label>
                <select class="form-select form-select-lg" name="visible" id="visible">
                    <option value="1" {{ $batch->visible == '1' ? 'selected' : '' }}>Visible</option>
                    <option value="0" {{ $batch->visible == '0' ? 'selected' : '' }}>Unvisible</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-end pt-2">
            <button type="submit" class="btn btn-lg btn-primary">Update</button>
        </div>
    </div>

</form>

@endsection