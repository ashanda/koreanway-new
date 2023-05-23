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

<div class="table-responsive mt-2">
  <table id="dataTable" class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Student Name</th>
        <th>Course</th>
        <th>Batch</th>
        <th>Teacher</th>
        <th>Payment Type</th>
        <th>Amount</th>
        @if ($paytype == 'paid-manual-payments' || $paytype == 'paid-online-payments')

        @else
        <th>Slip</th>
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
        <td>{{ getUserData($payment->student_id)->fullname }}</td>
        <td>{{ getCourseData($payment->course_id)->name }}</td>
        <td>{{ getBatchData($payment->batch_id)->name }}</td>
        <td>{{ $payment->amount }}</td>
        <td>{{ $payment->payment_type }}</td>
        <td>{{ $payment->payment_type }}</td>
        @if ($paytype == 'paid-manual-payments' || $paytype == 'paid-online-payments')

        @else
        <td><a target="_blank" href="{{ asset('/payments/slips/' . $payment->file_name) }}">View</a></td>
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

            <a class="btn btn-sm btn-info" href="{{ route('lesson.show',$payment->id) }}">View</a>

            <a class="btn btn-sm btn-primary edit-btn" @if($paytype !='paid-manual-payments' || $paytype !='paid-online-payments' ) data-image="{{ asset('/payments/slips/' . $payment->file_name) }}" @endif data-id="{{ $payment->id }}" data-amount="{{ $payment->amount }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
          <div class="form-group">
            <label for="paymentImage">Payment Image:</label>
            <br>
            <img src="" class="paymentImage" alt="Preview Image" style="max-width: 400px;">
          </div>


          <input type="hidden" class="paymentId" name="paymentId" readonly>


          <div class="form-group">
            <label for="paymentAmount">Payment Amount:</label>
            <input type="text" class="form-control paymentAmount" name="paymentAmount">
          </div>
          <div class="form-group">
            <label for="paymentAmount">Start Date:</label>
            <input type="date" class="form-control " name="paymentstart">
          </div>
          <div class="form-group">
            <label for="paymentAmount">End Date:</label>
            <input type="date" class="form-control" name="paymentend">
          </div>

          <div class="form-group">
            <label for="paymentType">Payment Status:</label>
            <select class="form-control" id="paymentType" name="paymentstatus">
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

@endsection