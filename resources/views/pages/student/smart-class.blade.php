@extends('layouts.app')

@section('content')

<div class="row">
    @foreach ($lessonsPaginated as $lesson)
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="cl_vid">
            <div class="card p-0">
                <div class="vid_sec">
                    <img class="card-img-top" src="{{ asset('/lesson/img/' . $lesson->background_image) }}" alt="Card image cap">
                    @if (StudentPaymentCheck($lesson->course_id,$lesson->batch_id ) == null)
                    <div class="bg-lock">
                        <i class="bi bi-lock"></i>
                    </div>
                    @endif
                </div>
                <div class="card-body p-0">
                    <div class="alert alert-light text-center m-0 fw-bold">{{ $lesson->lecture_title }}</div>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    @if (StudentPaymentCheck($lesson->course_id,$lesson->batch_id ) == null)
                    <button onclick="openModel({{ $lesson->course_id }}, {{ $lesson->batch_id }},{{ $lesson->teacher_id }})" class="btn btn-danger w-100 fw-bold">No Acess | Payment Here</button>
                    @else
                    @if (StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->status == 1 && StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->end_date >= now()->toDateString() && StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->end_date >= $lesson->published_date)
                    @php

                    $encryptedLessonid = encrypt(['id' => $lesson->id]);
                    @endphp
                    <a href="{{ route('smartClassData',$encryptedLessonid ) }}" class="btn btn-secondary w-100">GET LESSEONS CLICK HERE</a>
                    <div class="alert alert-info text-center m-0"> VALID PERIODE : {{ StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->start_date .'-'. StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->end_date }}</div>
                    {{-- <a href="{{ route('single-lesson', ['lessontype' => $encryptedLessontype, 'id' => $encryptedLessonid]) }}" class="save_btn btn-block">Watch Lesson</a> --}}
                    @elseif (StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->status == 2)
                    <div class="alert alert-warning text-center m-0">Your Payment is Pending</div>
                    @else
                    <button onclick="openModel({{ $lesson->course_id }}, {{ $lesson->batch_id }},{{ $lesson->teacher_id }})" class="btn btn-success w-100">Payment Here</button>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Display lesson information -->


<!-- Add more fields as needed -->



<div class="modal" id="paymentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Here</h5>
                <button type="button" onclick="closeModel()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal content goes here -->
                <form id="paymentForm" action="{{ route('process.payment') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Amount:</label>
                        <input type="text" class="form-control form-control-lg" id="amount" name="amount">
                        <input type="hidden" id="course_id" name="course_id" class="course_id">
                        <input type="hidden" id="batch_id" name="batch_id" class="batch_id">
                        <input type="hidden" id="teacher_id" name="teacher_id" class="teacher_id">

                    </div>
                    <div class="form-group mb-3">
                        <label for="file">Upload File:</label>
                        <input type="file" name="image" class="form-control form-control-lg">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="closeModel()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection