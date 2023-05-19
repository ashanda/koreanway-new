@extends('layouts.app')

@section('content')
<div class="pt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h3>Add New Batch</h3>
            </div>
            <div class="float-end">
                <a class="btn btn-sm btn-primary" href="{{ route('batch.index') }}">Batches</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <label>Error!</label> <br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('batch.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Batch Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-control" name="status" id="status">
                        <option>Publish</option>
                        <option>Unpublish</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-end pt-2">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>

    </form>


</div>


@endsection