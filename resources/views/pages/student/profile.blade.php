@extends('layouts.app')

@section('content')
<form action="{{ route('update-profile', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3 row">
        <label for="stnumber" class="col-md-4 col-form-label-lg text-md-end text-start">Student Number</label>
        <div class="col-md-6">
            <input type="text" class="form-control form-control-lg" id="stnumber" name="stnumber" value="{{ $student->stnumber }}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-md-4 col-form-label-lg text-md-end text-start">Email Address</label>
        <div class="col-md-6">
            <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ $student->email }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="fullname" class="col-md-4 col-form-label-lg text-md-end text-start">Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control form-control-lg" id="fullname" name="fullname" value="{{ $student->fullname }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="dob" class="col-md-4 col-form-label-lg text-md-end text-start">Birthday</label>
        <div class="col-md-6">
            <input type="date" class="form-control form-control-lg" id="dob" name="dob" value="{{ $student->dob }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="gender" class="col-md-4 col-form-label-lg text-md-end text-start">Gender</label>
        <div class="col-md-6">
            <select class="form-select form-select-lg" name="gender" id="gender">
                <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $student->gender == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="district" class="col-md-4 col-form-label-lg text-md-end text-start">District</label>
        <div class="col-md-6">
            <select class="form-select form-select-lg" name="district" id="district">
                <option value="Colombo" {{ $student->district == 'Colombo' ? 'selected' : '' }}>Colombo</option>
                <option value="Gampaha" {{ $student->district == 'Gampaha' ? 'selected' : '' }}>Gampaha</option>
                <!-- Add other district options here -->
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="town" class="col-md-4 col-form-label-lg text-md-end text-start">Town</label>
        <div class="col-md-6">
            <input type="text" class="form-control form-control-lg" id="town" name="town" value="{{ $student->town }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="contactnumber" class="col-md-4 col-form-label-lg text-md-end text-start">Contact Number</label>
        <div class="col-md-6">
            <input type="text" class="form-control form-control-lg" id="contactnumber" name="contactnumber" value="{{ $student->contactnumber }}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="address" class="col-md-4 col-form-label-lg text-md-end text-start">Address</label>
        <div class="col-md-6">
            <input type="text" class="form-control form-control-lg" id="address" name="address" value="{{ $student->address }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="course" class="col-md-4 col-form-label-lg text-md-end text-start">Course</label>
        <div class="col-md-6">
            <select class="form-select form-select-lg" name="course" id="course">
                @foreach ($courses as $course)
                <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="batch" class="col-md-4 col-form-label-lg text-md-end text-start">Batch</label>
        <div class="col-md-6">
            <select class="form-select form-select-lg" name="batch" id="batch">
                @foreach ($batches as $batch)
                <option value="{{ $batch->id }}" {{ $student->batch_id == $batch->id ? 'selected' : '' }}>{{ $batch->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="password" class="col-md-4 col-form-label-lg text-md-end text-start">Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control form-control-lg" id="password" name="password">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="password_confirmation" class="col-md-4 col-form-label-lg text-md-end text-start">Confirm Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-md-6 offset-md-4">
            <input type="submit" class="btn btn-primary" value="Update">
        </div>
    </div>
</form>


@endsection