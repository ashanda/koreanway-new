@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3>Batches</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-lg btn-success" href="{{ route('batch.create') }}"> Create New Batch</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<div class="table-responsive mt-2">
    <table id="dataTable" class="table table-bordered">
        <thead class="thead-dark">

            <tr>
                <th>No</th>
                <th>Batch Name</th>
                <th>Fee</th>
                <th>Status</th>
                <th>Form Visibility</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($batches as $batch)
            @php
            $i=1;
            @endphp

            <tr>
                <td>{{ $i }}</td>
                <td>{{ $batch->name }}</td>
                <td>{{ $batch->fee }}</td>
                @if ($batch->status == 1)
                <td>{{ 'Published' }}</td>
                @else
                <td>{{ 'Unpublished' }}</td>
                @endif

                @if ($batch->visible == 1)
                <td>{{ 'Visible' }}</td>
                @else
                <td>{{ 'Unvisible' }}</td>
                @endif
                <td>
                    <form action="{{ route('batch.destroy',$batch->id) }}" method="POST">

                        <a class="btn btn-lg btn-info" href="{{ route('batch.show',$batch->id) }}">View</a>

                        <a class="btn btn-lg btn-primary" href="{{ route('batch.edit',$batch->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-lg btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            @php
            $i ++;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>


@endsection