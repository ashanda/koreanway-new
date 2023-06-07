@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Show Notice</h3>
            <a class="btn btn-primary" href="{{ route('messages.index') }}">Back</a>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title mb-3 fw-bold">Notice Details</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Course ID:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $message->course_id }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Batch ID:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $message->batch_id }}" readonly>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Message:</label>
                    <textarea class="form-control form-control-lg" rows="2" readonly>{{ $message->message }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection