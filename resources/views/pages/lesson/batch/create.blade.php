@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="container">
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
                                <label>Fee:</label>
                                <input type="text" name="fee" class="form-control" placeholder="Fee">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="1">Publish</option>
                                    <option value="0">Unpublish</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-control" name="visible" id="visible">
                                    <option value="1">Visible</option>
                                    <option value="0">Unvisible</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
</div>           


@endsection