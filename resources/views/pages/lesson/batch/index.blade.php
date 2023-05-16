@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="container">
                <a class="btn btn-secondary btn-sm" href="{{ route('admin_dashboard') }}">Back to Dashboard</a>
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
            
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Batch Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($batches as $batch)
                    @php
                        $i=1;
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $batch->name }}</td>
                        <td>{{ $batch->status }}</td>
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
                </table>
            
            </div>
        </div>
    </div>
</div>           


@endsection