@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="float-start">
      <h3>{{ $title }}</h3>
    </div>

  </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if ($paytype == 'paid-manual-payments')
<form action="{{ route('manual-pay') }}" method="POST">
  @csrf
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="form-group mb-3">
        <label class="form-label" for="student-name">Student Name:</label>
        <select class="form-select form-select-lg" id="student-name" name="student_name" required>

          <option value="">Select a student</option>
          @foreach (getAllUsers() as $getAllUser)
          <option value="{{ $getAllUser->id }}">{{ $getAllUser->fullname .'-'. $getAllUser->contactnumber}}</option>
          @endforeach


          <!-- Add more options as needed -->
        </select>
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="form-group mb-3">
        <label class="form-label" for="course-id">Course:</label>
        <select class="form-select form-select-lg" id="course-id" name="course_id" required>
          <option value="">Select a course</option>
        </select>
      </div>
    </div>

    <input type="hidden" id="teacher-id" name="teacher_id" value="" required>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="form-group mb-3">
        <label class="form-label" for="batch-id">Batch:</label>
        <select class="form-select form-select-lg" id="batch-id" name="batch_id" required>
          <option value="">Select a Batch</option>
        </select>
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="form-group mb-3">
        <label class="form-label" for="amount">Amount:</label>
        <input class="form-control form-control-lg" type="text" id="amount" name="amount" required>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="form-group mb-3">
        <label class="form-label" for="plan">Plan:</label>
        <select class="form-select form-select-lg" id="plan" name="plan" required>
          <option value="">Select a plan</option>
          <option value="A">Plan A</option>
          <option value="B">Plan B</option>
          <option value="C">Plan C</option>
        </select>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="form-group mb-3">
        <label class="form-label" for="start-date">Start Date:</label>
        <input class="form-control form-control-lg" type="date" id="start-date" name="start_date" required>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="form-group mb-3">
        <label class="form-label" for="end-date">End Date:</label>
        <input class="form-control form-control-lg" type="date" id="end-date" name="end_date" required>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-end">
      <input type="submit" class="btn btn-primary" value="Submit">
    </div>
  </div>
</form>
@endif
<div class="table-responsive mt-2">
  <table id="dataTable" class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Student Name</th>
        <th>Course</th>
        <th>Batch</th>
        <th>Teacher</th>
        <th>Amount</th>
        <th>Payment Type</th>
        <th>Amount</th>
        @if ($paytype == 'paid-manual-payments' || $paytype == 'paid-online-payments')

        @else
        <th>Slip</th>
        @endif
        @if ($paytype == 'paid-manual-payments' || $paytype == 'paid-bank-payments' || $paytype == 'reject-bank-tranfer')
        <th>Checked Admin</th>
        @else

        @endif

        <th>Status</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($payments as $payment)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ getUserData($payment->student_id)->fullname }} <br> {{ getUserData($payment->student_id)->address }} <br> {{ getUserData($payment->student_id)->contactnumber }}<br> {{ getUserData($payment->student_id)->email }} </td>
        <td>{{ getCourseData($payment->course_id)->name }}</td>
        <td>{{ getBatchData($payment->batch_id)->name }}</td>
        <td>{{ getTeacherData($payment->teacher_id)->name }}</td>
        <td>{{ $payment->amount }}</td>
        <td>{{ $payment->payment_type }}</td>
        <td>{{ $payment->payment_type }}</td>
        @if ($paytype == 'paid-manual-payments' || $paytype == 'paid-online-payments')

        @else
        <td><a target="_blank" href="{{ asset('/payments/slips/' . $payment->file_name) }}">View</a></td>
        @endif
        @if ($paytype == 'paid-manual-payments' || $paytype == 'paid-bank-payments' || $paytype == 'reject-bank-tranfer')
        <th>{{ $payment->admin_name }}</th>
        @else
        @endif
        @if ($payment->status == 1)
        <td>{{ 'Paid' }}</td>
        @elseif ($payment->status == 2)
        <td>{{ 'Pending' }}</td>
        @else
        <td>{{ 'reject' }}</td>
        @endif
        <td>{{ $payment->start_date }}</td>
        <td>{{ $payment->end_date }}</td>
        <td>
          <form action="{{ route('lesson.destroy',$payment->id) }}" method="POST">

            <a id="payment-history-btn" data-id="{{ $payment->student_id }}" class="btn payment-history-btn btn-info">Payment History</a>


            <a class="btn  btn-primary edit-btn" @if($paytype !='paid-manual-payments' || $paytype !='paid-online-payments' ) data-image="{{ asset('/payments/slips/' . $payment->file_name) }}" @endif data-id="{{ $payment->id }}" data-amount="{{ $payment->amount }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn  btn-danger">Delete</button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>



{!! $payments->links() !!}

<!-- Modal -->
<div class="modal" id="editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group mb-3">
            <label class="form-label" for="paymentImage">Payment Image:</label>
            <br>
            <img src="" class="paymentImage" alt="Preview Image" style="max-width: 400px;">
          </div>


          <input type="hidden" class="paymentId" name="paymentId" readonly>


          <div class="form-group mb-3">
            <label class="form-label" for="paymentAmount">Payment Amount:</label>
            <input type="text" class="form-control form-control-lg paymentAmount" name="paymentAmount">
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="paymentAmount">Start Date:</label>
            <input type="date" class="form-control form-control-lg " name="paymentstart">
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="paymentAmount">End Date:</label>
            <input type="date" class="form-control form-control-lg" name="paymentend">
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="plan">Plan:</label>
            <select class="form-select form-select-lg" name="plan" required>
              <option value="">Select a plan</option>
              <option value="A">Plan A</option>
              <option value="B">Plan B</option>
              <option value="C">Plan C</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="paymentType">Payment Status:</label>
            <select class="form-select form-select-lg" id="paymentType" name="paymentstatus">
              <option value="1">Approve</option>
              <option value="2">Pending</option>
              <option value="3">Reject</option>
              <!-- Add more options as needed -->
            </select>
          </div>

          <!-- Add more form fields for editing payment data -->

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Payment History Modal -->

<div class="modal fade" id="payment-history-modal" tabindex="-1" role="dialog" aria-labelledby="payment-history-modal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="payment-history-modal-label">Payment History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="payment-history-table" class="table">
          <thead>
            <tr>
              <th>Course</th>
              <th>Batch</th>
              <th>Teacher</th>
              <th>Plan</th>
              <th>Payment Type</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <!-- Payment history rows will be dynamically added here -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection