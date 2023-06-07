@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Show Batch</h3>
            <a class="btn btn-primary" href="{{ route('batch.index') }}">Back</a>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title mb-3 fw-bold">Batch Details</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Batch Name:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $batch->name }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Batch Fee:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $batch->fee }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Status:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $batch->status == 1 ? 'Published' : 'Unpublished' }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Visibility:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $batch->visible == 1 ? 'Visible' : 'Unvisible' }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection