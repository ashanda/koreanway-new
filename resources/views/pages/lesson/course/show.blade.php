@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Show Course</h3>
            <a class="btn btn-lg btn-primary" href="{{ route('batch.index') }}">Back</a>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title mb-3 fw-bold">Course Details</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Batch ID:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $course->batch_id }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Teacher ID:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $course->teacher_id }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Course Name:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $course->name }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Status:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $course->status }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection