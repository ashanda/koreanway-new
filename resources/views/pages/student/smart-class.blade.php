@extends('layouts.app')

@section('content')

<div class="row">
    @foreach ($lessonsPaginated as $lesson)
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card">
            <img class="card-img-top" src="{{ asset('/lesson/img/' . $lesson->image) }}" alt="Card image cap">
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
                <a href="{{ route('smartClassData',$lesson->id ) }}" class="btn btn-primary">GET LESSEONS CLICK HERE</a>
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
    </div>
    @endforeach
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="cl_vid">
            <div class="card p-0">
                <!-- <img class="card-img-top" src="{{ asset('/lesson/img/' . $lesson->image) }}" alt="Card image cap"> -->
                <iframe class="" id="ytplayer" type="text/html" src="https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&origin=http://example.com" frameborder="0"></iframe>
                <div class="card-body p-0">
                    <a href="#" onclick="" class="btn btn-primary w-100">No Acess | Payment Here</a>
                    <a href="{{ route('smartClassData',$lesson->id ) }}" class="btn btn-secondary w-100">GET LESSEONS CLICK HERE</a>
                    <div class="alert alert-light text-center mb-0" role="alert">
                        Title
                    </div>
                    <div class="alert alert-primary text-center mb-0" role="alert">
                        VALID PERIODE
                    </div>
                    <div class="alert alert-warning text-center mb-0" role="alert">
                        Your Payment is Pending
                    </div>

                    <a href="#" onclick="" class="btn btn-success w-100">Payment Here</a>
                    {{-- <a href="{{ route('single-lesson', ['lessontype' => $encryptedLessontype, 'id' => $encryptedLessonid]) }}" class="save_btn btn-block">Watch Lesson</a> --}}
                </div>
            </div>
        </div>

    </div>

</div>



<!-- Display lesson information -->


<!-- Add more fields as needed -->



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