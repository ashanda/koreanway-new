@extends('layouts.app')

@section('content')

@foreach ($lessonsPaginated as $lesson)
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{ asset('/lesson/img/' . $lesson->thumbnail) }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{ $lesson->title }}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        @if (StudentPaymentCheck($lesson->course_id,$lesson->batch_id ) == null)
        <a href="#" onclick="openModel({{ $lesson->course_id }}, {{ $lesson->batch_id }},{{ $lesson->teacher_id }})" class="save_btn btn-block payment-here">No Acess | Payment Here</a>
        @else
        @if (StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->status == 1 && StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->end_date >= now()->toDateString() && StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->end_date >= $lesson->published_date)
        @php

        $encryptedLessonid = encrypt(['id' => $lesson->id]);
        @endphp
        <a href="{{ route('smartClassData',$encryptedLessonid ) }}" class="btn btn-primary">GET LESSEONS CLICK HERE</a>
        <p> VALID PERIODE {{ StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->start_date .'-'. StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->end_date }}</p>
        {{-- <a href="{{ route('single-lesson', ['lessontype' => $encryptedLessontype, 'id' => $encryptedLessonid]) }}" class="save_btn btn-block">Watch Lesson</a> --}}
        @elseif (StudentPaymentCheck($lesson->course_id,$lesson->batch_id)->status == 2)
        <a href="student_profile.php" class="save_btn btn-block">Your Payment is Pending</a>
        @else
        <a href="#" onclick="openModel({{ $lesson->course_id }}, {{ $lesson->batch_id }},{{ $lesson->teacher_id }})" class="save_btn btn-block payment-here">Payment Here</a>
        @endif
        @endif

    </div>
</div>
<!-- Display lesson information -->


<!-- Add more fields as needed -->
@endforeach


<div class="modal" id="paymentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Here</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection