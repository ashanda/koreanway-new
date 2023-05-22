@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-start">
            <h3>Batches</h3>
        </div>
        <div class="float-end">
            <a class="btn btn-success btn-sm" href="{{ route('batch.create') }}"> Create New Batch</a>
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
                <th>Batch Name</th>
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

                        <a class="btn btn-info btn-sm" href="{{ route('batch.show',$batch->id) }}">View</a>

                        <a class="btn btn-primary btn-sm" href="{{ route('batch.edit',$batch->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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